<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use SAC\EloquentModelGenerator\Exceptions\ModelGeneratorException;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Process\Process;

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

    private const VENDOR_BIN = 'vendor/bin';

    // Add constants for common paths and file extensions
    private const ANALYSIS_SUBDIR = 'analysis';

    private const CACHE_SUBDIR = 'cache';

    private const JSON_EXT = '.json';

    private const NEON_EXT = '.neon';

    private const XML_EXT = '.xml';

    // Add more constants for common values
    private const DEFAULT_PERMISSIONS = 0755;

    private const DEFAULT_MEMORY_LIMIT = '2G';

    private const DEFAULT_PRIORITY = 1;

    private const BUILD_DIR = 'build';

    private const CACHE_DIR = 'cache';

    private const TXT_EXT = '.txt';

    // Add new constants for path handling
    private const PATH_SEPARATORS = ['\\', '/'];

    private const PATH_SEPARATOR = '/';

    private const TIMESTAMP_FORMAT = 'Y-m-d_H-i-s';

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
     * Tool configurations.
     */
    private array $toolConfigs = [];

    // Add debug flag property
    private bool $debug = false;

    /**
     * Handle and log error messages.
     */
    private function handleError(string $key, string ...$params): void {
        if (! $this->output) {
            return;
        }

        $message = sprintf(self::ERROR_MESSAGES[$key], ...$params);
        $this->output->writeln(sprintf(
            '<%s>%s</>',
            str_starts_with($key, 'no_') ? 'info' : 'error',
            $message
        ));
    }

    public function __construct(?string $projectRoot = null) {
        // Default to package root if not provided
        if (! $projectRoot) {
            // Get the absolute path to the package root
            $packageRoot = dirname(__DIR__, 2);  // src/Services -> package root

            // Ensure we're in the EloquentModelGenerator directory
            if (! str_contains($packageRoot, 'EloquentModelGenerator')) {
                $packageRoot = dirname($packageRoot) . '/EloquentModelGenerator';
            }

            $projectRoot = $packageRoot;
        }

        $this->projectRoot = rtrim($projectRoot, '/');
    }

    public function setProjectRoot(string $projectRoot): self {
        $this->projectRoot = rtrim($projectRoot, '/');
        $this->debug("Project root set to: {$this->projectRoot}");

        return $this;
    }

    public function getProjectRoot(): string {
        return $this->projectRoot;
    }

    public function registerTool(string $name): self {
        if (! in_array($name, $this->tools, true)) {
            $this->tools[] = $name;
        }

        return $this;
    }

    public function getAvailableTools(): array {
        return $this->tools;
    }

    public function runTool(string $tool, string $targetDir, array $options = []): array {
        $this->debug("\n=== Running {$tool} ===");
        $this->debug("Target Directory: {$targetDir}");
        $this->debug('Options: ' . json_encode($options));

        if (! in_array($tool, $this->tools, true)) {
            $this->debug("❌ Invalid tool: {$tool}");
            $this->handleError('invalid_tool', $tool);

            return ['success' => false, 'output' => '', 'command' => '', 'files' => []];
        }

        $command = $this->buildCommand($tool, $targetDir, $options);
        $this->debug("\nWorking Directory: {$this->projectRoot}");

        $process = new Process($command);
        $process->setTimeout(null);
        $process->setWorkingDirectory($this->projectRoot);

        try {
            $this->debug("\nExecuting Process...");
            $process->run();

            $output = $process->getOutput() . $process->getErrorOutput();
            $this->debug("\nProcess Output: " . ($output ?: '<empty>'));

            if ($tool === 'phpmd' && isset($this->toolConfigs[$tool]['reportfile'])) {
                $reportFile = $this->toolConfigs[$tool]['reportfile'];
                $this->debug("\nChecking PHPMD Report: {$reportFile}");

                if (File::exists($reportFile)) {
                    $this->debug('✅ Report file found');
                    $output = File::get($reportFile);
                    $this->debug('Report Contents: ' . ($output ?: '<empty>'));
                } else {
                    $this->debug('❌ Report file not found');
                    $dir = dirname($reportFile);
                    if (File::exists($dir)) {
                        $this->debug('Directory Contents:');
                        foreach (File::files($dir) as $file) {
                            $this->debug('- ' . $file->getFilename());
                        }
                    } else {
                        $this->debug("❌ Directory not found: {$dir}");
                    }
                }
            }

            $success = $process->isSuccessful();
            $this->debug("\nProcess " . ($success ? '✅ Succeeded' : '❌ Failed'));

            return [
                'success' => $success,
                'output' => $output,
                'command' => implode(' ', $command),
                'files' => $this->extractAffectedFiles($tool, $output),
            ];
        } catch (\Exception $e) {
            $this->debug("\n❌ Process Error: " . $e->getMessage());
            $this->handleError('process_error', $tool, $e->getMessage());

            return [
                'success' => false,
                'output' => $e->getMessage(),
                'command' => implode(' ', $command),
                'files' => [],
            ];
        }
    }

    public function runToolsInParallel(array $tools, string $targetDir, array $options = []): array {
        $processes = [];
        $errors = [];

        foreach ($tools as $name) {
            if (! in_array($name, $this->tools, true)) {
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

        if (! empty($errors)) {
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
            return isset($this->results[$tool]) && ! $this->results[$tool]['success'];
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

    public function setTargetDir(string $targetDir): self {
        $this->targetDir = rtrim($targetDir, '/');

        // Ensure path includes StandAloneComplex
        if (! str_contains($this->targetDir, 'StandAloneComplex')) {
            $parts = explode('/packages/', $this->targetDir);
            if (count($parts) === 2) {
                $this->targetDir = $parts[0] . '/packages/StandAloneComplex/' . $parts[1];
            }
        }

        // Validate target directory exists
        if (! File::isDirectory($this->targetDir)) {
            throw new \RuntimeException("Target directory does not exist: {$this->targetDir}");
        }

        $this->debug("Target directory set to: {$this->targetDir}");

        return $this;
    }

    public function setToolConfig(string $tool, array $config): void {
        $this->toolConfigs[$tool] = $config;
    }

    protected function buildCommand(string $tool, string $targetDir, array $options = []): array {
        // Ensure target directory is absolute and normalized
        $targetDir = $this->ensureAbsolutePath($targetDir);

        return match ($tool) {
            'phpmd' => $this->buildPhpmdCommand($this->toolConfigs[$tool]),
            'phpstan' => $this->buildPhpstanCommand($targetDir, $options),
            'psalm' => $this->buildPsalmCommand($targetDir),
            'metrics' => $this->buildMetricsCommand($targetDir),
            'class-leak' => $this->buildClassLeakCommand($targetDir),
            'type-coverage' => $this->buildTypeCoverageCommand($targetDir),
            'rector' => $this->buildRectorCommand($targetDir, $options['level'] ?? null),
            default => throw new \InvalidArgumentException("Unknown tool: {$tool}")
        };
    }

    private function buildPhpmdCommand(array $config): array {
        $this->debug("\n=== PHPMD Command Building ===");
        $this->debug("Config: " . json_encode($config, JSON_PRETTY_PRINT));

        // Get binary path
        $binary = $this->getToolBinary('phpmd');
        $this->debug("Binary: {$binary}");

        // Build command array
        $command = [
            $binary,
            $config['paths'][0],  // target directory
            'json',               // format
            $config['rulesets'],  // rulesets
            '--strict',
            '--color',
        ];

        // Add report file if specified
        if (isset($config['reportfile'])) {
            $command[] = '--report-file';
            $command[] = $config['reportfile'];
        }

        // Add error file if specified
        if (isset($config['errorfile'])) {
            $command[] = '--error-file';
            $command[] = $config['errorfile'];
        }

        $this->debug("Full Command: " . implode(' ', $command));
        return $command;
    }

    private function buildPhpstanCommand(string $targetDir, array $options): array {
        $command = [
            $this->projectRoot . '/' . self::VENDOR_BIN . '/phpstan',
            'analyse',
        ];

        if (isset($options['level'])) {
            $command[] = '--level=' . $options['level'];
        }

        if (isset($this->phpstanConfigPath)) {
            $command[] = '--configuration=' . $this->phpstanConfigPath;
        }

        $command[] = '--no-progress';
        $command[] = '--no-interaction';
        $command[] = '--memory-limit=' . self::DEFAULT_MEMORY_LIMIT;
        $command[] = '--error-format=' . self::OUTPUT_FORMAT;
        $command[] = '--generate-baseline=' . self::OUTPUT_DIR . '/phpstan/baseline.neon';
        $command[] = '--debug';
        $command[] = '--';
        $command[] = $targetDir;

        return $command;
    }

    private function buildPsalmCommand(string $targetDir): array {
        return [
            $this->projectRoot . '/' . self::VENDOR_BIN . '/psalm',
            '--show-info=true',
            $targetDir,
            '--output-format=' . self::OUTPUT_FORMAT,
            '--report=' . self::OUTPUT_DIR . '/psalm/current.json',
            '--use-baseline=' . self::OUTPUT_DIR . '/psalm/baseline.xml',
        ];
    }

    private function buildMetricsCommand(string $targetDir): array {
        return [
            $this->projectRoot . '/' . self::VENDOR_BIN . '/phpmetrics',
            '--config=' . $this->projectRoot . '/.phpmetrics.json',
            '--report-html=' . self::OUTPUT_DIR . '/metrics/html',
            '--report-json=' . self::OUTPUT_DIR . '/metrics/current.json',
            $targetDir,
        ];
    }

    private function buildClassLeakCommand(string $targetDir): array {
        return [
            $this->projectRoot . '/' . self::VENDOR_BIN . '/class-leak-detector',
            'detect',
            $targetDir,
            '--format=' . self::OUTPUT_FORMAT,
            '--output=' . self::OUTPUT_DIR . '/class-leak/current.json',
        ];
    }

    private function buildTypeCoverageCommand(string $targetDir): array {
        return [
            $this->projectRoot . '/' . self::VENDOR_BIN . '/psalm',
            '--show-info=true',
            '--stats',
            $targetDir,
            '--output-format=' . self::OUTPUT_FORMAT,
            '--report=' . self::OUTPUT_DIR . '/type-coverage/current.json',
        ];
    }

    private function buildRectorCommand(string $targetDir, ?string $level = null): array {
        $config = $this->toolConfigs['rector'] ?? [];
        $command = [
            $this->projectRoot . '/' . self::VENDOR_BIN . '/rector',
            'process',
        ];

        // Always use --dry-run for analyze command (when level is provided)
        // Otherwise use the config value for fix command
        if ($level !== null || ($config['dry-run'] ?? false)) {
            $command[] = '--dry-run';
        }

        $command[] = '--no-progress-bar';

        if (isset($config['output-format'])) {
            $command[] = '--output-format=' . $config['output-format'];
        }

        $command[] = $targetDir;

        return $command;
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

        $this->debug("\n=== Starting Analysis ===");
        $this->debug("Timestamp: {$timestamp}");
        $this->debug("Project Root: {$this->projectRoot}");
        $this->debug("Target Directory: {$this->targetDir}");
        $this->debug('Tools: ' . ($tools ? implode(', ', $tools) : 'all'));
        $this->debug('Levels: ' . ($levels ?? 'default'));

        if (! $this->targetDir) {
            $this->debug('❌ ERROR: Target directory not set');
            throw new \RuntimeException('Target directory not set. Call setTargetDir() first.');
        }

        // Validate target directory
        if (! File::exists($this->targetDir)) {
            $this->debug("❌ ERROR: Target directory does not exist: {$this->targetDir}");
            throw new \RuntimeException("Target directory does not exist: {$this->targetDir}");
        }
        $this->debug('✅ Target directory exists');

        // Run tools
        $this->runTools(
            $tools,
            $levels,
            $this->targetDir,
            'Analysis',
            $output,
            function (string $tool, string $output) use ($timestamp) {
                $this->debug("\n=== Tool Output: {$tool} ===");
                $this->debug('Raw output length: ' . strlen($output));

                try {
                    $this->saveOutput($tool, $output, $timestamp, 'analysis');
                    $this->debug('✅ Output saved successfully');
                } catch (\Exception $e) {
                    $this->debug('❌ Failed to save output: ' . $e->getMessage());
                }
            }
        );

        $this->debug("\n=== Analysis Complete ===");
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

        if (! $this->targetDir) {
            throw new \RuntimeException('Target directory not set. Call setTargetDir() first.');
        }

        foreach ($tools as $tool) {
            $latestAnalysis = $this->getLatestOutput($tool, 'analysis');
            if (! $latestAnalysis) {
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

        $this->debug("\n=== Running Tools ===");
        $this->debug("Action: {$action}");
        $this->debug('Tools to run: ' . implode(', ', $tools));

        foreach ($tools as $tool) {
            $this->debug("\n--- Running {$tool} ---");

            if (! in_array($tool, $this->tools, true)) {
                $this->debug("❌ Invalid tool: {$tool}");
                $this->handleError('invalid_tool', $tool);

                continue;
            }

            try {
                $command = $this->buildCommand($tool, $targetDir, ['level' => $levels]);
                $this->debug('Command: ' . implode(' ', $command));

                $result = $this->runTool($tool, $targetDir, ['level' => $levels]);

                if (! $result['success']) {
                    $this->debug('❌ Tool failed');
                    $this->debug('Error output: ' . $result['output']);
                    $errors[] = sprintf('Tool %s failed: %s', $tool, $result['output']);

                    continue;
                }

                $this->debug('✅ Tool completed successfully');
                $callback($tool, $result['output']);
            } catch (\Exception $e) {
                $this->debug('❌ Exception occurred: ' . $e->getMessage());
                $this->handleError('tool_error', $tool, $e->getMessage());
                $errors[] = $e->getMessage();
            }
        }

        if (! empty($errors)) {
            $this->debug("\n❌ Errors occurred:");
            foreach ($errors as $error) {
                $this->debug("- {$error}");
            }
            throw new ModelGeneratorException(
                sprintf("Errors occurred while running tools:\n%s", implode("\n", $errors))
            );
        }

        $this->debug("\n✅ All tools completed");
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

        $outputPath = $this->getToolOutputPath($tool, $type, $timestamp);
        File::put($outputPath, $content);

        // Retain only the latest MAX_HISTORY files
        $this->cleanupOldFiles($this->ensureToolOutputDir($tool));
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
        if (! File::isDirectory($dir)) {
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
        if (! File::isDirectory($dir)) {
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
            if (! isset($data['files'])) {
                $this->handleError('missing_data', 'PHPStan', 'files array');

                return [];
            }
        } catch (\JsonException $e) {
            $this->handleError('json_parse', 'PHPStan', $e->getMessage());

            return [];
        }

        foreach ($data['files'] ?? [] as $file => $fileInfo) {
            if (! isset($fileInfo['messages'])) {
                $this->handleError('missing_data', 'PHPStan', 'messages array');

                continue;
            }
            foreach ($fileInfo['messages'] as $message) {
                if (! isset($message['line'], $message['message'])) {
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
            if (! isset($data['files'])) {
                $this->handleError('missing_data', 'Psalm', 'files array');

                return [];
            }
        } catch (\JsonException $e) {
            $this->handleError('json_parse', 'Psalm', $e->getMessage());

            return [];
        }

        foreach ($data['files'] ?? [] as $file => $fileInfo) {
            if (! isset($fileInfo['messages'])) {
                $this->handleError('missing_data', 'Psalm', 'messages array');

                continue;
            }
            foreach ($fileInfo['messages'] as $message) {
                if (! isset($message['line_from'], $message['severity'], $message['message'])) {
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
            if (! isset($data['files'])) {
                $this->handleError('missing_data', 'PHPMD', 'files array');

                return [];
            }
        } catch (\JsonException $e) {
            $this->handleError('json_parse', 'PHPMD', $e->getMessage());

            return [];
        }

        foreach ($data['files'] ?? [] as $filename => $violations) {
            foreach ($violations as $violation) {
                if (! isset($violation['rule'], $violation['priority'], $violation['description'])) {
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

            // Check if Rector found any changes
            if (isset($data['totals']['changed_files']) && $data['totals']['changed_files'] > 0) {
                // Process file diffs
                foreach ($data['file_diffs'] ?? [] as $fileDiff) {
                    $file = $fileDiff['file'] ?? null;
                    if (! $file) {
                        continue;
                    }

                    // Extract applied rectors as rules
                    $rules = $fileDiff['applied_rectors'] ?? [];
                    foreach ($rules as $rule) {
                        $issues[$file][] = [
                            'line' => 0, // Rector doesn't provide line numbers in JSON output
                            'rule' => $rule,
                            'message' => "Rule '$rule' can be applied",
                        ];
                    }
                }
            }
        } catch (\JsonException $e) {
            $this->handleError('json_parse', 'Rector', $e->getMessage());

            return [];
        }

        return $issues;
    }

    private function ensureToolOutputDir(string $tool): string {
        $dir = $this->projectRoot . '/' . self::OUTPUT_DIR . '/' . self::TOOL_DIRS[$tool];
        if (! File::isDirectory($dir)) {
            File::makeDirectory($dir, 0755, true);
        }

        return $dir;
    }

    /**
     * Ensure path is absolute.
     */
    private function ensureAbsolutePath(string $path): string {
        if (! str_starts_with($path, '/')) {
            $path = $this->projectRoot . '/' . $path;
        }

        return str_replace('\\', '/', $path);
    }

    // Add method to handle file paths consistently
    private function resolvePath(string|array $paths, bool $makeDirectory = false): string|array {
        if (is_array($paths)) {
            return array_map(fn($path) => $this->resolvePath($path, $makeDirectory), $paths);
        }

        // Normalize path separators
        $path = str_replace(self::PATH_SEPARATORS, self::PATH_SEPARATOR, $paths);

        // Make absolute if relative
        if (! str_starts_with($path, self::PATH_SEPARATOR)) {
            $path = $this->projectRoot . self::PATH_SEPARATOR . $path;
        }

        // Create directory if needed
        if ($makeDirectory && ! str_contains(basename($path), '.')) {
            File::ensureDirectoryExists($path, self::DEFAULT_PERMISSIONS);
        }

        return $path;
    }

    // Add method to build tool output paths
    private function buildToolPath(string $tool, string $type, ?string $filename = null): string {
        $components = [
            $this->projectRoot,
            self::OUTPUT_DIR,
            $type,
            self::TOOL_DIRS[$tool],
        ];

        if ($filename) {
            $components[] = $filename;
        }

        return $this->resolvePath(implode(self::PATH_SEPARATOR, $components), true);
    }

    // Add method to generate timestamped filename
    private function generateTimestampedFilename(string $prefix, string $tool, string $extension): string {
        return sprintf(
            '%s_%s_%s%s',
            $prefix,
            Carbon::now()->format(self::TIMESTAMP_FORMAT),
            $tool,
            $extension
        );
    }

    // Update findLatestPhpmdReport to fix path handling
    private function findLatestPhpmdReport(): ?string {
        $analysisDir = $this->projectRoot . '/' . self::BUILD_DIR . '/analysis/phpmd';
        if (! File::exists($analysisDir)) {
            return null;
        }

        $pattern = $analysisDir . '/report_*_phpmd' . self::JSON_EXT;
        $files = glob($pattern);
        if (empty($files)) {
            return null;
        }

        // Sort by modification time descending
        usort($files, fn($a, $b) => filemtime($b) - filemtime($a));

        return $files[0];
    }

    // Add method to clean up old files
    private function cleanupOldFiles(string $directory): void {
        collect(File::files($directory))
            ->sortByDesc(fn($file) => $file->getMTime())
            ->slice(self::MAX_HISTORY)
            ->each(fn($file) => File::delete($file->getPathname()));
    }

    // Add method to get tool binary path
    private function getToolBinary(string $tool): string {
        // First check in the package's vendor directory
        $packageVendorPath = $this->projectRoot . '/vendor/bin/' . $tool;
        if (File::exists($packageVendorPath)) {
            $this->debug("Found tool binary at: {$packageVendorPath}");

            return $packageVendorPath;
        }

        // Then check in the parent project's vendor directory
        $parentVendorPath = dirname($this->projectRoot, 3) . '/vendor/bin/' . $tool;
        if (File::exists($parentVendorPath)) {
            $this->debug("Found tool binary at: {$parentVendorPath}");

            return $parentVendorPath;
        }

        // Finally check for global installation
        $globalPaths = [
            '/usr/local/bin/' . $tool,
            '/usr/bin/' . $tool,
            getenv('HOME') . '/.composer/vendor/bin/' . $tool,
        ];

        foreach ($globalPaths as $path) {
            if (File::exists($path)) {
                $this->debug("Found tool binary at: {$path}");

                return $path;
            }
        }

        throw new \RuntimeException(
            "Tool binary not found: {$tool}. Please ensure it is installed via composer:\n" .
                'composer require --dev phpmd/phpmd'
        );
    }

    // Add method to ensure directory exists
    private function ensureDirectory(string $path): void {
        if (! File::isDirectory($path)) {
            File::makeDirectory($path, self::DEFAULT_PERMISSIONS, true, true);
        }
    }

    // Add method to validate paths
    private function validatePath(string $path): string {
        $path = str_replace('\\', '/', $path);
        if (! str_starts_with($path, '/')) {
            $path = $this->projectRoot . '/' . $path;
        }

        return $path;
    }

    // Add method to ensure output directory exists and return absolute path
    private function ensureOutputDirectory(string $tool, string $type): string {
        $path = implode('/', [
            rtrim($this->projectRoot, '/'),
            self::OUTPUT_DIR,
            $type,
            self::TOOL_DIRS[$tool],
        ]);

        if (! File::exists($path)) {
            File::makeDirectory($path, self::DEFAULT_PERMISSIONS, true);
        }

        return $path;
    }

    // Add method to set debug mode
    public function setDebug(bool $debug): self {
        $this->debug = $debug;

        return $this;
    }

    // Add debug helper method
    private function debug(string $message): void {
        if (! $this->debug || ! $this->output) {
            return;
        }

        // Add timestamp to debug output
        $timestamp = Carbon::now()->format('H:i:s');
        $this->output->writeln(sprintf(
            '<fg=gray>[%s]</> <info>%s</info>',
            $timestamp,
            $message
        ));
    }
}
