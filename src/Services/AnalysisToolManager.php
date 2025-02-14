<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Services;

use InvalidArgumentException;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Symfony\Component\Process\Process;
use SAC\EloquentModelGenerator\Exceptions\ModelGeneratorException;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Output\OutputInterface;
use Carbon\Carbon;
use Illuminate\Support\Str;

class AnalysisToolManager {
    private const MAX_HISTORY = 3;
    private const OUTPUT_DIR = 'build';
    private const SUMMARY_FILE = 'summary.json';
    private const OUTPUT_FORMAT = 'json';
    private const ANALYSIS_DIR = 'analysis';
    private const FIXES_DIR = 'fixes';
    private const BASELINE_DIR = 'baseline';
    private const ERROR_MESSAGES = [
        'json_parse' => 'Failed to parse JSON output from %s: %s',
        'empty_output' => 'Empty output from %s',
        'invalid_tool' => 'Unknown tool: %s',
        'invalid_format' => 'Invalid output format from %s: %s',
        'missing_data' => 'Missing required data in %s output: %s',
        'parallel_error' => 'Error running parallel processes: %s',
        'tool_error' => 'Error running tool %s: %s',
        'missing_target' => 'Target directory not set. Call setTargetDir() first.',
        'missing_analysis' => 'No analysis found for %s, skipping...',
        'no_issues' => 'No issues found for %s, skipping...',
        'no_tools' => 'No tools to run fixes for.',
        'process_error' => 'Error running %s: %s',
    ];

    private string $projectRoot;
    private ?string $phpstanConfigPath = null;
    private ?string $targetDir = null;
    private ?OutputInterface $output = null;

    /**
     * List of supported analysis tools.
     *
     * @var array<int, string>
     */
    private array $tools = [
        'phpstan',
        'phpmd',
        'psalm',
        'metrics',
        'class-leak',
        'type-coverage',
        'rector',
    ];

    /**
     * @var array<string, array{success: bool, output: string, command: string, files: array<string>}>
     */
    private array $results = [];

    /**
     * Tool output directories.
     */
    private const TOOL_DIRS = [
        'phpstan' => 'phpstan',
        'phpmd' => 'phpmd',
        'psalm' => 'psalm',
        'metrics' => 'metrics',
        'class-leak' => 'class-leak',
        'type-coverage' => 'type-coverage',
        'rector' => 'rector',
    ];

    /**
     * Tool output formats.
     */
    private const TOOL_FORMATS = [
        'phpstan' => ['format' => 'json', 'file' => 'phpstan.json'],
        'phpmd' => ['format' => 'json', 'file' => 'phpmd.json'],
        'psalm' => ['format' => 'json', 'file' => 'psalm.json'],
        'metrics' => ['format' => 'json', 'file' => 'metrics.json'],
        'class-leak' => ['format' => 'json', 'file' => 'class-leak.json'],
        'type-coverage' => ['format' => 'json', 'file' => 'type-coverage.json'],
        'rector' => ['format' => 'json', 'file' => 'rector.json'],
    ];

    /**
     * Handle and log error messages.
     */
    private function handleError(string $key, string ...$params): void {
        if (!$this->output) {
            return;
        }

        $message = sprintf(self::ERROR_MESSAGES[$key], ...$params);
        $this->output->writeln(sprintf(
            '<%s>%s</>',
            str_starts_with($key, 'no_') ? 'info' : 'error',
            $message
        ));
    }

    public function __construct(string $projectRoot = null) {
        $this->projectRoot = $projectRoot ?? dirname(__DIR__, 2);
    }

    public function setProjectRoot(string $path): self {
        $this->projectRoot = $path;
        return $this;
    }

    public function getProjectRoot(): string {
        return $this->projectRoot;
    }

    public function registerTool(string $name): self {
        if (!in_array($name, $this->tools, true)) {
            $this->tools[] = $name;
        }
        return $this;
    }

    public function getAvailableTools(): array {
        return $this->tools;
    }

    public function runTool(string $tool, string $targetDir, array $options = []): array {
        if (!in_array($tool, $this->tools, true)) {
            $this->handleError('invalid_tool', $tool);
            return ['success' => false, 'output' => '', 'command' => '', 'files' => []];
        }

        $command = $this->buildCommand($tool, $targetDir, $options);
        $process = new Process($command);
        $process->setTimeout(null);
        try {
            $process->run();
        } catch (\Exception $e) {
            $this->handleError('process_error', $tool, $e->getMessage());
            return ['success' => false, 'output' => $e->getMessage(), 'command' => implode(' ', $command), 'files' => []];
        }

        $output = $process->getOutput() . $process->getErrorOutput();
        $success = $process->isSuccessful();

        if (empty($output) && !$success) {
            $this->handleError('empty_output', $tool);
        }

        $this->results[$tool] = [
            'success' => $success,
            'output' => $output,
            'command' => implode(' ', $command),
            'files' => $this->extractAffectedFiles($tool, $output),
        ];

        return $this->results[$tool];
    }

    public function runToolsInParallel(array $tools, string $targetDir, array $options = []): array {
        $processes = [];
        $errors = [];

        foreach ($tools as $name) {
            if (!in_array($name, $this->tools, true)) {
                $this->handleError('invalid_tool', $name);
                continue;
            }

            $command = $this->buildCommand($name, $targetDir, $options);
            try {
                $processes[$name] = new Process($command);
                $processes[$name]->setWorkingDirectory($this->projectRoot);
                $processes[$name]->setEnv([
                    'XDEBUG_MODE' => 'off',
                    'PHPSTAN_NO_PROGRESS' => '1',
                    'PHPSTAN_DEBUG' => '1',
                ]);
                $processes[$name]->start();
            } catch (\Exception $e) {
                $this->handleError('tool_error', $name, $e->getMessage());
                $errors[] = $e->getMessage();
                continue;
            }
        }

        if (!empty($errors)) {
            throw new ModelGeneratorException(
                sprintf("Errors occurred while starting parallel processes:\n%s", implode("\n", $errors))
            );
        }

        foreach ($processes as $name => $process) {
            try {
                $output = '';
                $process->wait(function ($type, string $buffer) use (&$output): void {
                    $output .= $buffer;
                });
            } catch (\Exception $e) {
                $this->handleError('parallel_error', $e->getMessage());
                continue;
            }

            $this->results[$name] = array_merge($this->results[$name], [
                'success' => $process->isSuccessful(),
                'output' => "Running command: {$process->getCommandLine()}\n\n" . $output,
                'files' => $this->extractAffectedFiles($name, $output),
            ]);
        }

        return $this->results;
    }

    public function getResults(?string $tool = null): array {
        if ($tool) {
            return $this->results[$tool] ?? [];
        }

        return $this->results;
    }

    public function hasIssues(?string $tool = null): bool {
        if ($tool) {
            return isset($this->results[$tool]) && !$this->results[$tool]['success'];
        }

        return collect($this->results)->contains('success', false);
    }

    public function getAffectedFiles(?string $tool = null): array {
        if ($tool) {
            return $this->results[$tool]['files'] ?? [];
        }

        return collect($this->results)
            ->pluck('files')
            ->flatten()
            ->unique()
            ->values()
            ->toArray();
    }

    public function setPhpstanConfigPath(string $path): self {
        $this->phpstanConfigPath = $path;
        return $this;
    }

    public function setTargetDir(string $dir): self {
        $this->targetDir = $dir;
        return $this;
    }

    protected function buildCommand(string $tool, string $targetDir, array $options = []): array {
        // Ensure target directory is absolute and normalized
        $targetDir = str_replace('\\', '/', realpath($targetDir));

        return match ($tool) {
            'phpmd' => $this->buildPhpmdCommand($targetDir),
            'phpstan' => $this->buildPhpstanCommand($targetDir, $options),
            'psalm' => $this->buildPsalmCommand($targetDir),
            'metrics' => $this->buildMetricsCommand($targetDir),
            'class-leak' => $this->buildClassLeakCommand($targetDir),
            'type-coverage' => $this->buildTypeCoverageCommand($targetDir),
            'rector' => $this->buildRectorCommand($targetDir),
            default => throw new \InvalidArgumentException("Unknown tool: {$tool}")
        };
    }

    private function buildPhpmdCommand(string $targetDir): array {
        $command = ['vendor/bin/phpmd'];
        $command[] = $targetDir;
        $command[] = self::OUTPUT_FORMAT;
        $command[] = 'cleancode,codesize,design,naming,unusedcode';
        $command[] = '--ignore-violations-on-exit';
        $command[] = '--reportfile=' . self::OUTPUT_DIR . '/phpmd/current.json';
        return $command;
    }

    private function buildPhpstanCommand(string $targetDir, array $options): array {
        $command = ['vendor/bin/phpstan', 'analyse'];

        if (isset($options['level'])) {
            $command[] = '--level=' . $options['level'];
        }

        if (isset($this->phpstanConfigPath)) {
            $command[] = '--configuration=' . $this->phpstanConfigPath;
        }

        $command[] = '--no-progress';
        $command[] = '--no-interaction';
        $command[] = '--memory-limit=2G';
        $command[] = '--error-format=' . self::OUTPUT_FORMAT;
        $command[] = '--generate-baseline=' . self::OUTPUT_DIR . '/phpstan/baseline.neon';
        $command[] = '--debug';
        $command[] = '--';
        $command[] = $targetDir;
        return $command;
    }

    private function buildPsalmCommand(string $targetDir): array {
        return [
            'vendor/bin/psalm',
            '--show-info=true',
            $targetDir,
            '--output-format=' . self::OUTPUT_FORMAT,
            '--report=' . self::OUTPUT_DIR . '/psalm/current.json',
            '--use-baseline=' . self::OUTPUT_DIR . '/psalm/baseline.xml'
        ];
    }

    private function buildMetricsCommand(string $targetDir): array {
        return [
            'vendor/bin/phpmetrics',
            '--config=' . $this->projectRoot . '/.phpmetrics.json',
            '--report-html=' . self::OUTPUT_DIR . '/metrics/html',
            '--report-json=' . self::OUTPUT_DIR . '/metrics/current.json',
            $targetDir
        ];
    }

    private function buildClassLeakCommand(string $targetDir): array {
        return [
            'vendor/bin/class-leak-detector',
            'detect',
            $targetDir,
            '--format=' . self::OUTPUT_FORMAT,
            '--output=' . self::OUTPUT_DIR . '/class-leak/current.json'
        ];
    }

    private function buildTypeCoverageCommand(string $targetDir): array {
        return [
            'vendor/bin/psalm',
            '--show-info=true',
            '--stats',
            $targetDir,
            '--output-format=' . self::OUTPUT_FORMAT,
            '--report=' . self::OUTPUT_DIR . '/type-coverage/current.json'
        ];
    }

    private function buildRectorCommand(string $targetDir): array {
        return [
            'vendor/bin/rector',
            'process',
            '--dry-run',
            '--no-progress-bar',
            $targetDir,
            '--output-format=' . self::OUTPUT_FORMAT,
            '--output-file=' . self::OUTPUT_DIR . '/rector/current.json'
        ];
    }

    private function getCurrentTool(): string {
        $trace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 4);
        foreach ($trace as $call) {
            if (isset($call['function']) && in_array($call['function'], ['runTool', 'runToolsInParallel'])) {
                return $call['args'][0] ?? '';
            }
        }
        return '';
    }

    private function extractAffectedFiles(string $tool, string $output): array {
        // Try to parse JSON output first
        try {
            $data = json_decode($output, true, 512, JSON_THROW_ON_ERROR);
            return match ($tool) {
                'phpstan' => array_keys($data['files'] ?? []),
                'phpmd' => array_keys($data['files'] ?? []),
                'psalm' => array_keys($data['files'] ?? []),
                'rector' => array_keys($data['file_diffs'] ?? []),
                default => []
            };
        } catch (\JsonException $e) {
            // Fallback to regex for non-JSON output
            $escapedDir = preg_quote($this->projectRoot . '/', '/');
            preg_match_all(sprintf('/%s\/[^:]+/', $escapedDir), $output, $matches);
            return array_unique($matches[0] ?? []);
        }
    }

    /**
     * Run analysis tools with progress indicator and save output.
     *
     * @throws ModelGeneratorException
     */
    public function analyze(?string $levels = null, ?array $tools = null, ?OutputInterface $output = null): void {
        $this->output = $output;  // Store output for use in other methods
        $timestamp = Carbon::now()->format('Y-m-d_H-i-s');
        $summary = [];

        if ($output) {
            // Debug the actual command that will be used
            $output->writeln("<info>Using PHPStan config: " . ($this->phpstanConfigPath ?? 'none') . "</info>");
            $output->writeln("<info>Project root: " . $this->projectRoot . "</info>");
        }

        if (!$this->targetDir) {
            throw new \RuntimeException('Target directory not set. Call setTargetDir() first.');
        }

        if ($output) {
            $output->writeln("<info>Target directory: " . $this->targetDir . "</info>");
        }

        $this->runTools($tools, $levels, $this->targetDir, 'Analyzing', $output, function (string $tool, string $output) use ($timestamp, &$summary) {
            $issues = $this->parseToolOutput($tool, $output);
            $summary[$tool] = [
                'timestamp' => $timestamp,
                'issues' => $issues,
                'total' => count($issues),
            ];

            $this->saveOutput($tool, $output, $timestamp, 'analysis');
        });

        // Save analysis summary
        $this->saveSummary($summary, $timestamp, 'analysis');

        if ($output) {
            $this->displaySummary($summary, $output);
        }
    }

    /**
     * Run fix tools with progress indicator using latest analysis.
     *
     * @throws ModelGeneratorException
     */
    public function fix(?string $levels = null, ?array $tools = null, ?OutputInterface $output = null): void {
        $this->output = $output;  // Store output for use in other methods
        $tools = $tools ?? array_keys($this->tools);
        $timestamp = Carbon::now()->format('Y-m-d_H-i-s');
        $summary = [];
        $skipped = [];

        if (!$this->targetDir) {
            throw new \RuntimeException('Target directory not set. Call setTargetDir() first.');
        }

        foreach ($tools as $tool) {
            $latestAnalysis = $this->getLatestOutput($tool, 'analysis');
            if (!$latestAnalysis) {
                $skipped[] = $tool;
                if ($output) {
                    $output->writeln(sprintf('<comment>No analysis found for %s, skipping...</comment>', $tool));
                }
                continue;
            }

            $issues = $this->parseToolOutput($tool, $latestAnalysis);
            if (empty($issues)) {
                $skipped[] = $tool;
                if ($output) {
                    $output->writeln(sprintf('<info>No issues found for %s, skipping...</info>', $tool));
                }
                continue;
            }
        }

        $tools = array_diff($tools, $skipped);
        if (empty($tools)) {
            if ($output) {
                $output->writeln('<info>No tools to run fixes for.</info>');
            }
            return;
        }

        $this->runTools($tools, $levels, $this->targetDir, 'Fixing', $output, function (string $tool, string $output) use ($timestamp, &$summary) {
            $fixes = $this->parseToolOutput($tool, $output);
            $summary[$tool] = [
                'timestamp' => $timestamp,
                'fixes' => $fixes,
                'total' => count($fixes),
            ];

            $this->saveOutput($tool, $output, $timestamp, 'fixes');
        });

        // Save fix summary
        $this->saveSummary($summary, $timestamp, 'fixes');

        if ($output) {
            $this->displaySummary($summary, $output, 'fixes');
        }
    }

    /**
     * Run tools with progress indicator.
     */
    private function runTools(?array $tools, ?string $levels, string $targetDir, string $action, ?OutputInterface $output, callable $callback): void {
        $tools = $tools ?? array_keys($this->tools);
        $errors = [];

        if ($output) {
            $output->writeln("<info>Running {$action} tools...</info>");
        }

        foreach ($tools as $tool) {
            if (!in_array($tool, $this->tools, true)) {
                $this->handleError('invalid_tool', $tool);
                continue;
            }

            if ($output) {
                $output->writeln("<info>Running {$tool}...</info>");
                $command = $this->buildCommand($tool, $targetDir, ['level' => $levels]);
                $output->writeln("<info>Command to be executed: " . implode(' ', $command) . "</info>");
            }

            try {
                $result = $this->runTool($tool, $targetDir, ['level' => $levels]);
                if (!$result['success']) {
                    $errors[] = sprintf('Tool %s failed: %s', $tool, $result['output']);
                    continue;
                }
                $callback($tool, $result['output']);
            } catch (\Exception $e) {
                $this->handleError('tool_error', $tool, $e->getMessage());
                $errors[] = $e->getMessage();
            }
        }

        if (!empty($errors)) {
            throw new ModelGeneratorException(
                sprintf("Errors occurred while running tools:\n%s", implode("\n", $errors))
            );
        }
    }

    /**
     * Save tool output to a timestamped file.
     */
    private function saveOutput(string $tool, string $content, string $timestamp, string $type): void {
        // Validate JSON before saving
        try {
            json_decode($content, true, 512, JSON_THROW_ON_ERROR);
        } catch (\JsonException $e) {
            if ($this->output) {
                $this->output->writeln("<error>Invalid JSON output from {$tool}: {$e->getMessage()}</error>");
            }
            return;
        }

        $baseDir = $this->ensureToolDirectory($tool, $type);
        $timestampDir = $baseDir . '/' . $timestamp;
        File::makeDirectory($timestampDir, 0755, true);

        $filename = sprintf('%s/%s', $timestampDir, self::TOOL_FORMATS[$tool]['file']);
        File::put($filename, $content);

        // Retain only the latest MAX_HISTORY files
        collect(File::directories($baseDir))
            ->sortByDesc(fn($file) => $file->getMTime())
            ->slice(self::MAX_HISTORY)
            ->each(fn($file) => File::delete($file->getPathname()));
    }

    /**
     * Get the latest output file for a tool.
     */
    private function getLatestOutput(string $tool, string $type): ?string {
        $dir = sprintf(
            '%s/%s/%s',
            base_path(self::OUTPUT_DIR),
            self::TOOL_DIRS[$tool],
            $type
        );
        if (!File::isDirectory($dir)) {
            return null;
        }

        $latest = collect(File::files($dir))
            ->sortByDesc(fn($file) => $file->getMTime())
            ->first();

        return $latest ? File::get($latest->getPathname()) : null;
    }

    /**
     * Parse tool output to extract issues/fixes.
     *
     * @return array<string, array<string, mixed>>
     */
    private function parseToolOutput(string $tool, string $output): array {
        if (empty($output)) {
            $this->handleError('empty_output', $tool);
            return [];
        }

        return match ($tool) {
            'phpstan' => $this->parsePhpstanOutput($output),
            'psalm' => $this->parsePsalmOutput($output),
            'phpmd' => $this->parsePhpmdOutput($output),
            'rector' => $this->parseRectorOutput($output),
            default => throw new \InvalidArgumentException(sprintf(self::ERROR_MESSAGES['invalid_tool'], $tool))
        };
    }

    /**
     * Save analysis/fix summary.
     */
    private function saveSummary(array $summary, string $timestamp, string $type): void {
        $dir = sprintf('%s/%s', base_path(self::OUTPUT_DIR), $type);
        if (!File::isDirectory($dir)) {
            File::makeDirectory($dir, 0755, true);
        }

        $filename = sprintf('%s/%s_%s', $dir, $timestamp, self::SUMMARY_FILE);
        File::put($filename, json_encode($summary, JSON_PRETTY_PRINT));

        // Retain only latest summaries
        collect(File::glob($dir . '/*_' . self::SUMMARY_FILE))
            ->sortByDesc(fn($file) => filemtime($file))
            ->slice(self::MAX_HISTORY)
            ->each(fn($file) => File::delete($file));
    }

    /**
     * Display summary in console with improved formatting.
     */
    private function displaySummary(array $summary, OutputInterface $output, string $type = 'analysis'): void {
        $output->writeln('');
        $output->writeln(sprintf('<info>%s Summary:</info>', Str::title($type)));
        $output->writeln('');

        foreach ($summary as $tool => $data) {
            $output->writeln(sprintf('  <comment>%s:</comment>', $tool));
            $output->writeln(sprintf('    Total: %d', $data['total']));

            if ($data['total'] > 0) {
                $output->writeln('    Details:');
                foreach ($data[$type === 'analysis' ? 'issues' : 'fixes'] as $file => $items) {
                    $relativePath = str_replace(base_path() . '/', '', $file);
                    $output->writeln(sprintf(
                        '      <options=bold>%s</>: %d %s',
                        $relativePath,
                        count($items),
                        Str::plural($type === 'analysis' ? 'issue' : 'fix', count($items))
                    ));

                    // Show first few issues/fixes as examples
                    $examples = array_slice($items, 0, 3);
                    foreach ($examples as $item) {
                        $message = isset($item['line'])
                            ? sprintf('Line %d: %s', $item['line'], $item['message'])
                            : $item['message'];
                        $output->writeln(sprintf('        - %s', $message));
                    }

                    if (count($items) > 3) {
                        $output->writeln(sprintf('        ... and %d more', count($items) - 3));
                    }
                }
            }

            $output->writeln('');
        }
    }

    /**
     * Parse PHPStan output.
     *
     * @return array<string, array<int, array{line: int, message: string}>>
     */
    private function parsePhpstanOutput(string $output): array {
        $issues = [];
        try {
            $data = json_decode($output, true, 512, JSON_THROW_ON_ERROR);
            if (!isset($data['files'])) {
                $this->handleError('missing_data', 'PHPStan', 'files array');
                return [];
            }
        } catch (\JsonException $e) {
            $this->handleError('json_parse', 'PHPStan', $e->getMessage());
            return [];
        }

        foreach ($data['files'] ?? [] as $file => $fileInfo) {
            if (!isset($fileInfo['messages'])) {
                $this->handleError('missing_data', 'PHPStan', 'messages array');
                continue;
            }
            foreach ($fileInfo['messages'] as $message) {
                if (!isset($message['line'], $message['message'])) {
                    $this->handleError('invalid_format', 'PHPStan', 'missing line or message');
                    continue;
                }
                $issues[$file][] = [
                    'line' => $message['line'],
                    'message' => $message['message'],
                ];
            }
        }

        return $issues;
    }

    /**
     * Parse Psalm output.
     *
     * @return array<string, array<int, array{line: int, severity: string, message: string}>>
     */
    private function parsePsalmOutput(string $output): array {
        $issues = [];
        try {
            $data = json_decode($output, true, 512, JSON_THROW_ON_ERROR);
            if (!isset($data['files'])) {
                $this->handleError('missing_data', 'Psalm', 'files array');
                return [];
            }
        } catch (\JsonException $e) {
            $this->handleError('json_parse', 'Psalm', $e->getMessage());
            return [];
        }

        foreach ($data['files'] ?? [] as $file => $fileInfo) {
            if (!isset($fileInfo['messages'])) {
                $this->handleError('missing_data', 'Psalm', 'messages array');
                continue;
            }
            foreach ($fileInfo['messages'] as $message) {
                if (!isset($message['line_from'], $message['severity'], $message['message'])) {
                    $this->handleError('invalid_format', 'Psalm', 'missing line, severity or message');
                    continue;
                }
                $issues[$file][] = [
                    'line' => $message['line_from'],
                    'severity' => $message['severity'],
                    'message' => $message['message'],
                ];
            }
        }

        return $issues;
    }

    /**
     * Parse PHPMD output.
     *
     * @return array<string, array<int, array{rule: string, priority: int, message: string}>>
     */
    private function parsePhpmdOutput(string $output): array {
        $issues = [];
        if (empty($output)) {
            $this->handleError('empty_output', 'PHPMD');
            return [];
        }

        try {
            $data = json_decode($output, true, 512, JSON_THROW_ON_ERROR);
            if (!isset($data['files'])) {
                $this->handleError('missing_data', 'PHPMD', 'files array');
                return [];
            }
        } catch (\JsonException $e) {
            $this->handleError('json_parse', 'PHPMD', $e->getMessage());
            return [];
        }

        foreach ($data['files'] ?? [] as $filename => $violations) {
            foreach ($violations as $violation) {
                if (!isset($violation['rule'], $violation['priority'], $violation['description'])) {
                    $this->handleError('invalid_format', 'PHPMD', 'missing rule, priority or description');
                    continue;
                }
                $issues[$filename][] = [
                    'rule' => $violation['rule'],
                    'priority' => $violation['priority'],
                    'message' => $violation['description'],
                ];
            }
        }

        return $issues;
    }

    /**
     * Parse Rector output.
     *
     * @return array<string, array<int, array{line: int, rule: string, message: string}>>
     */
    private function parseRectorOutput(string $output): array {
        $issues = [];
        try {
            $data = json_decode($output, true, 512, JSON_THROW_ON_ERROR);
            if (!isset($data['file_diffs'])) {
                $this->handleError('missing_data', 'Rector', 'file_diffs array');
                return [];
            }
        } catch (\JsonException $e) {
            $this->handleError('json_parse', 'Rector', $e->getMessage());
            return [];
        }

        foreach ($data['file_diffs'] ?? [] as $file => $changes) {
            if (!isset($changes['diffs'])) {
                $this->handleError('missing_data', 'Rector', 'diffs array');
                continue;
            }
            foreach ($changes['diffs'] as $diff) {
                if (!isset($diff['line'], $diff['type'], $diff['message'])) {
                    $this->handleError('invalid_format', 'Rector', 'missing line, type or message');
                    continue;
                }
                $issues[$file][] = [
                    'line' => $diff['line'],
                    'rule' => $diff['type'],
                    'message' => $diff['message'],
                ];
            }
        }

        return $issues;
    }

    /**
     * Ensure tool output directory exists.
     */
    private function ensureToolDirectory(string $tool, string $type): string {
        $dir = sprintf(
            '%s/%s/%s',
            base_path(self::OUTPUT_DIR),
            self::TOOL_DIRS[$tool],
            $type
        );

        if (!File::isDirectory($dir)) {
            File::makeDirectory($dir, 0755, true);
        }

        return $dir;
    }
}
