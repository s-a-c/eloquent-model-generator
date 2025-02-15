<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Yaml;
use SAC\EloquentModelGenerator\Config\AnalysisConfig;
use SAC\EloquentModelGenerator\Services\AnalysisToolManager;

use function Laravel\Prompts\text;

class FixCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fix
        {--levels=* : Fix levels to run}
        {--tools=* : Specific tools to run (rector, phpmd)}
        {--directory= : Directory to fix}
        {--dry-run : Show changes without applying them}
        {--phpmd-rulesets=* : PHPMD rulesets to use (cleancode,codesize,controversial,design,naming,unusedcode)}';

    protected $description = 'Apply fixes from static analysis tools';

    private readonly AnalysisToolManager $toolManager;

    private string $projectRoot;

    private ?AnalysisConfig $config = null;

    // Add constants for common values
    private const DEFAULT_LEVEL = '8';

    private const DEFAULT_DIRECTORY = 'src';

    private const DEFAULT_TOOLS = ['rector'];

    // Add constants for file paths and patterns
    private const BUILD_DIR = 'build';

    private const ANALYSIS_DIR = 'analysis';

    private const REPORT_PATTERN = 'report_*_phpmd.json';

    public function __construct(AnalysisToolManager $toolManager)
    {
        $this->toolManager = $toolManager;
        parent::__construct();

        // Set project root to package root
        $this->projectRoot = dirname(__DIR__, 4);  // src/Console/Commands -> package root
        $this->toolManager->setProjectRoot($this->projectRoot);
    }

    public function handle(): int
    {
        try {
            // Get and validate command options
            $tools = $this->option('tools') ?: self::DEFAULT_TOOLS;
            $levels = $this->option('levels') ?: [self::DEFAULT_LEVEL];
            $targetDir = $this->option('directory') ?: $this->projectRoot.'/'.self::DEFAULT_DIRECTORY;
            $dryRun = $this->option('dry-run') ?? false;

            // Validate tools
            $invalidTools = array_diff($tools, array_keys($this->getValidTools()));
            if (! empty($invalidTools)) {
                throw new \InvalidArgumentException(
                    'Invalid tools specified: '.implode(', ', $invalidTools).
                        '. Valid tools are: '.implode(', ', array_keys($this->getValidTools()))
                );
            }

            // Create and validate config
            $this->config = new AnalysisConfig(
                targetDir: $targetDir,
                levels: $levels,
                tools: $tools,
                parallel: false,
                dryRun: $dryRun
            );
            $this->config->validate();

            // Set target directory in tool manager
            $this->toolManager->setTargetDir($this->config->getTargetDir());

            // Run fixes
            $this->info('Starting fixes...');

            foreach ($tools as $tool) {
                $this->runToolFixes($tool, $dryRun, $levels);
            }

            $this->info('Fixes complete.');
            $this->storeConfiguration();

            return self::SUCCESS;
        } catch (\Throwable $e) {
            $this->error($e->getMessage());
            if ($this->output->isVerbose()) {
                $this->error($e->getTraceAsString());
            }

            return self::FAILURE;
        }
    }

    /**
     * Configure Rector with specific settings.
     */
    private function configureRector(bool $dryRun): void
    {
        $rectorConfig = [
            'output-format' => 'json',
            'dry-run' => $dryRun,
            'paths' => [$this->config->getTargetDir()],
            'sets' => [
                'code-quality',
                'dead-code',
                'type-declaration',
                'php80',
                'php81',
                'php82',
                'php83',
            ],
            'parallel' => false,
            'no-progress-bar' => true,
        ];
        $this->toolManager->setToolConfig('rector', $rectorConfig);
    }

    /**
     * Display Rector fix results in a readable format.
     */
    private function displayRectorResults(string $output): void
    {
        try {
            $data = json_decode($output, true, 512, JSON_THROW_ON_ERROR);

            if (isset($data['file_diffs'])) {
                foreach ($data['file_diffs'] as $fileDiff) {
                    $this->info("\nFile: ".$fileDiff['file']);

                    if (isset($fileDiff['applied_rectors'])) {
                        $this->line("\nApplied fixes:");
                        foreach ($fileDiff['applied_rectors'] as $rector) {
                            $this->line('- '.$this->formatRectorName($rector));
                        }
                    }

                    if (isset($fileDiff['diff'])) {
                        $this->line("\nChanges made:");
                        $this->line($fileDiff['diff']);
                    }

                    $this->line("\n".str_repeat('-', 80)."\n");
                }

                if (isset($data['totals'])) {
                    $this->info("\nSummary:");
                    $this->line('- Files changed: '.($data['totals']['changed_files'] ?? 0));
                    $this->line('- Errors encountered: '.($data['totals']['errors'] ?? 0));
                }
            }
        } catch (\JsonException $e) {
            $this->error('Failed to parse Rector output: '.$e->getMessage());
            $this->line($output);
        }
    }

    /**
     * Format rector class name for display.
     */
    private function formatRectorName(string $rector): string
    {
        $parts = explode('\\', $rector);
        $name = end($parts);

        return preg_replace('/(?<!^)[A-Z]/', ' $0', $name);
    }

    /**
     * Store the current configuration.
     */
    private function storeConfiguration(): void
    {
        if ($this->config) {
            $configPath = $this->projectRoot.'/build/configs/fix_'.
                Carbon::now()->format('Y-m-d_H-i-s').'.json';

            if (! file_exists(dirname($configPath))) {
                mkdir(dirname($configPath), 0755, true);
            }

            $this->config->toFile($configPath);
        }
    }

    /**
     * Get the target directory for analysis.
     */
    private function getTargetDirectory(): string
    {
        $defaultDir = $this->projectRoot.'/src';
        $targetDir = $this->option('directory');

        // If no directory specified and interactive mode is enabled
        if (! $targetDir && ! $this->option('no-interaction')) {
            $targetDir = text(
                label: 'Which directory would you like to analyze?',
                placeholder: $defaultDir,
                default: $defaultDir,
                required: true
            );
        }

        // Use default if no directory specified
        $targetDir = $targetDir ?: $defaultDir;

        // Convert to absolute path if relative
        if (! str_starts_with($targetDir, '/')) {
            $targetDir = $this->projectRoot.'/'.$targetDir;
        }

        // Ensure directory exists and normalize path
        if (! File::exists($targetDir)) {
            throw new \RuntimeException("Target directory does not exist: {$targetDir}");
        }

        return str_replace('\\', '/', realpath($targetDir));
    }

    /**
     * Create temporary PHPStan config file.
     */
    private function createPhpstanConfig(string $targetDir, ?string $level): void
    {
        $config = [
            'includes' => [
                'vendor/larastan/larastan/extension.neon',
            ],
            'parameters' => [
                'level' => $level ?? 8,
                'tmpDir' => $this->projectRoot.'/build/phpstan',
                'rootDir' => $this->projectRoot,
                'customRulesetUsed' => true,
                'bootstrapFiles' => [],
                'autoload_files' => [],
                'autoload_directories' => [],
                'scanFiles' => [],
                'scanDirectories' => [],
                'checkModelProperties' => true,
                'checkPhpDocMissingReturn' => true,
                'checkUnionTypes' => true,
                'reportUnmatchedIgnoredErrors' => false,
                'treatPhpDocTypesAsCertain' => false,
                'parallel' => [
                    'maximumNumberOfProcesses' => 1,
                ],
                'excludePaths' => [
                    'tests/tmp/*',
                    'tests/*',
                    'build/*',
                    'vendor/*',
                    '*.blade.php',
                ],
            ],
        ];

        $configPath = $this->projectRoot.'/build/phpstan.'.uniqid().'.neon';
        File::ensureDirectoryExists(dirname($configPath));
        File::put($configPath, Yaml::dump($config, 4));

        // Store config path for use in buildCommand
        $this->phpstanConfigPath = $configPath;

        // Register cleanup on shutdown
        register_shutdown_function(function () use ($configPath) {
            if (File::exists($configPath)) {
                File::delete($configPath);
            }
        });
    }

    /**
     * Configure PHPMD with specific settings.
     */
    private function configurePhpmd(array $rulesets): void
    {
        $phpmdConfig = [
            'rulesets' => $rulesets,
            'exclude' => [
                'tests/*',
                'build/*',
                'vendor/*',
                '*.blade.php',
            ],
            'minimum-priority' => 5,
            'target-directory' => $this->config->getTargetDir(),
            'report-file' => $this->projectRoot.'/build/phpmd.xml',
        ];
        $this->toolManager->setToolConfig('phpmd', $phpmdConfig);
    }

    /**
     * Get build paths
     */
    private function getBuildPath(string $type, ?string $tool = null): string
    {
        $path = $this->projectRoot.'/'.self::BUILD_DIR;

        if ($type === 'analysis' && $tool) {
            $path .= '/'.self::ANALYSIS_DIR.'/'.$tool;
        } else {
            $path .= '/'.$type;
        }

        return $path;
    }

    /**
     * Find the latest PHPMD report file.
     */
    private function findLatestPhpmdReport(): ?string
    {
        $phpmdDir = $this->getBuildPath('analysis', 'phpmd');
        if (! File::isDirectory($phpmdDir)) {
            return null;
        }

        $reports = collect(File::glob($phpmdDir.'/'.self::REPORT_PATTERN))
            ->sortByDesc(fn ($file) => filemtime($file));

        return $reports->first();
    }

    /**
     * Run PHPMD fixes based on the analysis report.
     */
    private function runPhpmdFixes(bool $dryRun): array
    {
        $this->info('Running PHPMD fixes...');
        $reportPath = $this->findLatestPhpmdReport();

        if (! $reportPath) {
            $this->warn('No PHPMD analysis report found. Run analyze command first.');

            return ['success' => false, 'message' => 'No analysis report found'];
        }

        try {
            $report = json_decode(File::get($reportPath), true, 512, JSON_THROW_ON_ERROR);

            if (empty($report['files'])) {
                $this->info('No PHPMD issues to fix.');

                return ['success' => true, 'message' => 'No issues to fix'];
            }

            $results = $this->processPhpmdFixes($report, $dryRun);

            return array_merge(['success' => true], $results);
        } catch (\JsonException $e) {
            $this->error('Failed to parse PHPMD report: '.$e->getMessage());

            return ['success' => false, 'message' => 'Failed to parse report: '.$e->getMessage()];
        }
    }

    /**
     * Process PHPMD fixes based on the analysis report.
     */
    private function processPhpmdFixes(array $report, bool $dryRun): array
    {
        $totalViolations = 0;
        $fixedViolations = 0;
        $modifiedFiles = [];
        $fixes = [];

        foreach ($report['files'] as $fileData) {
            if (empty($fileData['violations'])) {
                continue;
            }

            $this->line("\n".str_repeat('-', 80));
            $this->info('Processing: '.$fileData['file']);

            $violations = $fileData['violations'];
            $totalViolations += count($violations);

            if (! File::exists($fileData['file'])) {
                $this->warn('File not found: '.$fileData['file']);

                continue;
            }

            [$modified, $fixed, $fileFixes] = $this->applyPhpmdFileFixes(
                $fileData['file'],
                $violations,
                $dryRun
            );

            if ($modified) {
                $modifiedFiles[] = $fileData['file'];
            }
            $fixedViolations += $fixed;
            $fixes = array_merge($fixes, $fileFixes);
        }

        // Show summary
        $this->displayPhpmdSummary($totalViolations, $fixedViolations, $modifiedFiles, $dryRun);

        return [
            'total_violations' => $totalViolations,
            'fixed_violations' => $fixedViolations,
            'modified_files' => $modifiedFiles,
            'fixes' => $fixes,
            'dry_run' => $dryRun,
        ];
    }

    /**
     * Apply PHPMD fixes to a single file.
     */
    private function applyPhpmdFileFixes(string $filePath, array $violations, bool $dryRun): array
    {
        $fileContent = File::get($filePath);
        $modified = false;
        $fixedCount = 0;
        $fixes = [];

        foreach ($violations as $violation) {
            $fix = $this->getPhpmdFix($violation);
            if (! $fix) {
                $this->displayManualFixNeeded($violation);

                continue;
            }

            if ($dryRun) {
                $this->displayPotentialFix($violation, $fix);
            } else {
                $fileContent = $this->applyPhpmdFix($fileContent, $violation, $fix);
                $fixedCount++;
                $modified = true;
                $this->displayAppliedFix($violation, $fix);
                $fixes[] = $fix;
            }
        }

        if ($modified && ! $dryRun) {
            File::put($filePath, $fileContent);
        }

        return [$modified, $fixedCount, $fixes];
    }

    /**
     * Display PHPMD summary.
     */
    private function displayPhpmdSummary(int $total, int $fixed, array $files, bool $dryRun): void
    {
        $this->line("\n".str_repeat('=', 80));
        $this->info('PHPMD Fix Summary:');
        $this->line(sprintf(
            "• Total violations found: %d\n• %s: %d\n• Files modified: %d",
            $total,
            $dryRun ? 'Fixable violations' : 'Violations fixed',
            $fixed,
            count($files)
        ));
    }

    /**
     * Get appropriate fix for PHPMD violation.
     */
    private function getPhpmdFix(array $violation): ?array
    {
        // Map of known PHPMD issues to their fixes
        $fixes = [
            'UnusedPrivateField' => [
                'pattern' => '/private\s+\$\w+\s*;/',
                'replacement' => '',
                'description' => 'Removed unused private field',
            ],
            'UnusedPrivateMethod' => [
                'pattern' => '/private\s+function\s+\w+\s*\([^)]*\)\s*{[^}]*}/',
                'replacement' => '',
                'description' => 'Removed unused private method',
            ],
            'ShortVariable' => [
                'pattern' => '/\$([a-z])\b/',
                'replacement' => '$\1Variable',
                'description' => 'Expanded short variable name',
            ],
            // Add more fix patterns as needed
        ];

        return $fixes[$violation['rule']] ?? null;
    }

    /**
     * Apply PHPMD fix.
     */
    private function applyPhpmdFix(string $content, array $violation, array $fix): string
    {
        $lines = explode("\n", $content);
        $affectedLines = array_slice(
            $lines,
            $violation['beginLine'] - 1,
            $violation['endLine'] - $violation['beginLine'] + 1
        );

        $segment = implode("\n", $affectedLines);
        $fixed = preg_replace($fix['pattern'], $fix['replacement'], $segment);

        array_splice(
            $lines,
            $violation['beginLine'] - 1,
            $violation['endLine'] - $violation['beginLine'] + 1,
            [$fixed]
        );

        return implode("\n", $lines);
    }

    /**
     * Display potential fix.
     */
    private function displayPotentialFix(array $violation, array $fix): void
    {
        $this->line(sprintf(
            '• Potential fix: %s (Lines %d-%d): %s',
            $violation['rule'],
            $violation['beginLine'],
            $violation['endLine'],
            $fix['description']
        ));
    }

    /**
     * Display manual fix needed.
     */
    private function displayManualFixNeeded(array $violation): void
    {
        $this->warn(sprintf(
            '• Manual fix needed for %s (Lines %d-%d): %s',
            $violation['rule'],
            $violation['beginLine'],
            $violation['endLine'],
            $violation['description']
        ));
    }

    /**
     * Display applied fix.
     */
    private function displayAppliedFix(array $violation, array $fix): void
    {
        $this->line(sprintf(
            '• Fixed %s (Lines %d-%d): %s',
            $violation['rule'],
            $violation['beginLine'],
            $violation['endLine'],
            $fix['description']
        ));
    }

    /**
     * Run fixes for a specific tool.
     */
    private function runToolFixes(string $tool, bool $dryRun, array $levels): void
    {
        $this->info("Running {$tool} fixes...");

        match ($tool) {
            'rector' => $this->runRectorFixes($dryRun, $levels),
            'phpmd' => $this->handlePhpmdFixes($dryRun),
            default => $this->warn("Unsupported tool for fixes: {$tool}")
        };
    }

    /**
     * Run Rector fixes.
     */
    private function runRectorFixes(bool $dryRun, array $levels): void
    {
        $this->info('Running Rector fixes...');
        $this->configureRector($dryRun);
        $result = $this->toolManager->runTool('rector', $this->config->getTargetDir(), [
            'level' => $levels[0] ?? '8',
            'fix' => true,
        ]);

        if ($result['success']) {
            if ($dryRun) {
                $this->info('Rector found potential fixes (dry-run):');
            } else {
                $this->info('Rector applied fixes:');
            }
            $this->displayRectorResults($result['output']);
        } else {
            $this->info('No Rector fixes needed.');
        }
    }

    // Add new method to handle PHPMD fixes
    private function handlePhpmdFixes(bool $dryRun): void
    {
        $reportPath = $this->findLatestPhpmdReport();

        if (! $reportPath) {
            $this->warn('No PHPMD analysis report found. Run analyze command first.');

            return;
        }

        $this->runPhpmdFixes($reportPath, $dryRun);
    }

    // Add method to get valid tools
    private function getValidTools(): array
    {
        return [
            'rector' => 'Rector (PHP code refactoring)',
            'phpmd' => 'PHP Mess Detector (code quality analysis)',
        ];
    }

    // Add method to store fix results
    private function storeFixResults(string $tool, array $results): void
    {
        $timestamp = Carbon::now()->format('Y-m-d_H-i-s');
        $outputPath = $this->getBuildPath('analysis', $tool)."/fixes_{$timestamp}.json";

        File::ensureDirectoryExists(dirname($outputPath));
        File::put($outputPath, json_encode([
            'timestamp' => $timestamp,
            'tool' => $tool,
            'results' => $results,
            'command' => implode(' ', $_SERVER['argv']),
        ], JSON_PRETTY_PRINT));
    }
}
