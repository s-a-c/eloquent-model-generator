<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use SAC\EloquentModelGenerator\Config\AnalysisConfig;
use SAC\EloquentModelGenerator\Services\AnalysisToolManager;
use Symfony\Component\Yaml\Yaml;

class AnalyzeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'analyze
        {--levels=* : Analysis levels to run (default: 4)}
        {--tools=* : Additional tools to run (rector, psalm, phpmd)}
        {--dry-run : Run tools without making changes}
        {--directory= : Directory to analyze}
        {--output-format=json : Output format (json, console)}
        {--stan-error-format=prettyjson : PHPStan error format (table, json, prettyJson, raw, checkstyle, junit, github, gitlab)}
        {--fix : Apply changes suggested by Rector}
        {--phpmd-rulesets=* : PHPMD rulesets to use (cleancode,codesize,controversial,design,naming,unusedcode)}
        {--debug : Show debug output}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run static analysis tools (always includes PHPStan)';

    private readonly AnalysisToolManager $toolManager;

    private string $projectRoot;

    private ?AnalysisConfig $config = null;

    private ?string $phpstanConfigPath = null;

    private const OUTPUT_DIR = 'build/analysis';

    private const TOOL_DIRS = [
        'phpstan' => 'phpstan',
        'rector' => 'rector',
        'psalm' => 'psalm',
        'phpmd' => 'phpmd',
    ];

    // Add new property for Larastan extension path
    private const LARASTAN_EXTENSION = 'vendor/larastan/larastan/extension.neon';

    // Add new constants for PHPMD
    private const PHPMD_FORMATS = [
        'text',
        'html',
        'xml',
        'json',
        'ansi',
    ];

    private const PHPMD_RULESETS = [
        'cleancode',
        'codesize',
        'controversial',
        'design',
        'naming',
        'unusedcode',
    ];

    /**
     * Create a new command instance.
     */
    public function __construct(AnalysisToolManager $toolManager)
    {
        $this->toolManager = $toolManager;
        parent::__construct();

        // Get the absolute path to the package root
        $packageRoot = dirname(__DIR__, 4);  // src/Console/Commands -> package root

        // Ensure we're in the EloquentModelGenerator directory
        if (! str_contains($packageRoot, 'EloquentModelGenerator')) {
            $packageRoot = dirname($packageRoot).'/EloquentModelGenerator';
        }

        $this->projectRoot = $packageRoot;
        $this->toolManager->setProjectRoot($this->projectRoot);
    }

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        try {
            // Get and validate command options
            $tools = $this->option('tools') ?: self::DEFAULT_TOOLS;
            $levels = $this->option('levels') ?: [self::DEFAULT_LEVEL];
            $debug = (bool) $this->option('debug');

            // Set target directory relative to package root
            $targetDir = $this->option('directory')
                ?: $this->projectRoot.'/src';

            // Ensure target directory includes StandAloneComplex
            if (! str_contains($targetDir, 'StandAloneComplex')) {
                $parts = explode('/packages/', $targetDir);
                if (count($parts) === 2) {
                    $targetDir = $parts[0].'/packages/StandAloneComplex/'.$parts[1];
                }
            }

            // Configure tool manager
            $this->toolManager
                ->setProjectRoot($this->projectRoot)
                ->setTargetDir($targetDir)
                ->setDebug($debug);

            if ($debug) {
                $this->output->writeln('<info>Debug mode enabled</info>');
                $this->output->writeln("<info>Target directory: {$targetDir}</info>");
                $this->output->writeln("<info>Project root: {$this->projectRoot}</info>");
                $this->output->writeln('<info>Tools: '.implode(', ', (array) $tools).'</info>');
                $this->output->writeln('<info>Levels: '.implode(', ', (array) $levels).'</info>');
            }

            // Configure PHPMD if it's being used
            if (in_array('phpmd', (array) $tools)) {
                $timestamp = Carbon::now()->format('Y-m-d_H-i-s');
                $outputDir = $this->projectRoot.'/build/analysis/phpmd';

                // Create output directory
                if (! File::exists($outputDir)) {
                    File::makeDirectory($outputDir, 0755, true);
                }

                // Configure PHPMD
                $phpmdConfig = [
                    'paths' => [$targetDir],
                    'rulesets' => $this->option('phpmd-rulesets') ?: implode(',', self::PHPMD_RULESETS),
                    'reportfile' => $outputDir."/report_{$timestamp}_phpmd.json",
                    'errorfile' => $outputDir."/errors_{$timestamp}_phpmd.txt",
                ];

                $this->toolManager->setToolConfig('phpmd', $phpmdConfig);
            }

            // Run analysis
            $this->toolManager->analyze(
                implode(',', (array) $levels),
                (array) $tools,
                $this->output
            );

            return self::SUCCESS;
        } catch (\Throwable $e) {
            $this->error($e->getMessage());
            if ($debug) {
                $this->error($e->getTraceAsString());
            }

            return self::FAILURE;
        }
    }

    /**
     * Create temporary PHPStan config file.
     */
    private function createPhpstanConfig(string $targetDir, string $level, string $errorFormat): void
    {
        // Check if Xdebug is loaded
        $xdebugEnabled = extension_loaded('xdebug');

        $config = [
            'parameters' => [
                'level' => $level,
                'paths' => [$targetDir],
                'errorFormat' => $errorFormat,
                'tmpDir' => $this->projectRoot.'/build/phpstan',
                'parallel' => [
                    'maximumNumberOfProcesses' => 1,
                    'processTimeout' => 300.0,
                ],
            ],
            'includes' => [],
        ];

        // Add Larastan extension if available
        $larastanPath = $this->projectRoot.'/'.self::LARASTAN_EXTENSION;
        if (File::exists($larastanPath)) {
            $config['includes'][] = $larastanPath;
        } else {
            $this->warn('Larastan extension not found at: '.$larastanPath);
        }

        // Save PHPStan configuration in the project's build directory
        $configPath = $this->projectRoot.'/build/phpstan/phpstan.neon';
        File::put($configPath, Yaml::dump($config, 4));
        $this->phpstanConfigPath = $configPath;

        // Configure PHPStan for analysis
        $phpstanConfig = [
            'output-format' => $errorFormat,
            'level' => $level,
            'paths' => [$targetDir],
            'xdebug' => $xdebugEnabled,
            'configuration' => $configPath,
        ];

        // Set tool configuration
        $this->toolManager->setToolConfig('phpstan', $phpstanConfig);

        // Show Xdebug status
        if ($xdebugEnabled) {
            $this->info('Xdebug detected - PHPStan will run with Xdebug support');
        }
    }

    /**
     * Set up the environment for analysis.
     */
    private function setupEnvironment(): void
    {
        // Create all required directories
        $directories = [
            $this->projectRoot.'/'.self::OUTPUT_DIR,
            $this->projectRoot.'/build/phpstan',
            $this->projectRoot.'/build/rector/cache',
            $this->projectRoot.'/build/phpmd/cache',
        ];

        // Add tool-specific output directories
        foreach (self::TOOL_DIRS as $toolDir) {
            $directories[] = $this->projectRoot.'/'.self::OUTPUT_DIR.'/'.$toolDir;
        }

        // Create all directories
        foreach ($directories as $dir) {
            if (! File::isDirectory($dir)) {
                File::makeDirectory($dir, 0755, true);
            }
        }
    }

    /**
     * Save tool output to appropriate directory.
     */
    private function saveToolOutput(string $tool, string $output): void
    {
        $timestamp = Carbon::now()->format('Y-m-d_H-i-s');
        $outputDir = $this->getToolOutputDir($tool);
        $mode = $this->isFixMode() ? 'fix' : 'analyze';

        // Ensure directory exists
        if (! File::isDirectory($outputDir)) {
            File::makeDirectory($outputDir, 0755, true);
        }

        // For PHPMD, we already have the output files configured
        if ($tool === 'phpmd') {
            return;
        }

        // Save raw output with metadata
        $rawData = [
            'timestamp' => $timestamp,
            'tool' => $tool,
            'command' => implode(' ', $_SERVER['argv']),
            'mode' => $mode,
            'output' => $output,
        ];

        $rawOutputPath = sprintf(
            '%s/%s_%s_%s_%s.json',
            $outputDir,
            $mode,
            'raw',
            $timestamp,
            $tool
        );
        File::put($rawOutputPath, json_encode($rawData, JSON_PRETTY_PRINT));

        // Save parsed output if possible
        try {
            $data = json_decode($output, true, 512, JSON_THROW_ON_ERROR);
            $analysisData = [
                'timestamp' => $timestamp,
                'tool' => $tool,
                'command' => implode(' ', $_SERVER['argv']),
                'data' => $data,
            ];

            $jsonOutputPath = sprintf(
                '%s/analysis_%s_%s.json',
                $outputDir,
                $timestamp,
                $tool
            );
            File::put($jsonOutputPath, json_encode($analysisData, JSON_PRETTY_PRINT));
        } catch (\JsonException $e) {
            // Skip JSON analysis save if output is not valid JSON
        }

        // Clean up old files (keep last 5)
        $this->cleanupOldFiles($outputDir, 5);
    }

    /**
     * Get the output directory for a specific tool.
     */
    private function getToolOutputDir(string $tool): string
    {
        return sprintf(
            '%s/%s/%s',
            $this->projectRoot,
            self::OUTPUT_DIR,
            self::TOOL_DIRS[$tool] ?? $tool
        );
    }

    /**
     * Clean up old output files, keeping the specified number of most recent files.
     */
    private function cleanupOldFiles(string $directory, int $keep = 5): void
    {
        $files = collect(File::files($directory))
            ->sortByDesc(function ($file) {
                return $file->getMTime();
            });

        if ($files->count() > $keep) {
            $files->slice($keep)->each(function ($file) {
                File::delete($file->getPathname());
            });
        }
    }

    /**
     * Display Rector analysis results in a readable format.
     */
    private function displayRectorResults(string $output): void
    {
        try {
            $data = json_decode($output, true, 512, JSON_THROW_ON_ERROR);

            if (empty($data['file_diffs'])) {
                $this->info('No changes suggested by Rector.');

                return;
            }

            $isFixing = ! $this->option('dry-run');
            $actionWord = $isFixing ? 'Applied' : 'Suggested';

            $this->info(sprintf(
                "\nRector %s changes in %d files:",
                $actionWord,
                count($data['file_diffs'])
            ));

            foreach ($data['file_diffs'] as $fileDiff) {
                $this->line("\n".str_repeat('-', 80));
                $this->info('File: '.$fileDiff['file']);

                if (! empty($fileDiff['applied_rectors'])) {
                    $this->line("\n{$actionWord} improvements:");
                    foreach ($fileDiff['applied_rectors'] as $rector) {
                        $this->line('• '.$this->formatRectorName($rector));
                    }
                }

                if (! empty($fileDiff['diff'])) {
                    $this->line("\n".($isFixing ? 'Applied' : 'Proposed').' changes:');
                    $this->line($fileDiff['diff']);
                }
            }

            if (isset($data['totals'])) {
                $this->line("\n".str_repeat('=', 80));
                $this->info('Summary:');
                $this->line('• Changed files: '.($data['totals']['changed_files'] ?? 0));
                $this->line('• Total errors: '.($data['totals']['errors'] ?? 0));
                if ($isFixing) {
                    $this->info("\nAll changes have been applied to the files.");
                } else {
                    $this->info("\nRun with --fix to apply these changes.");
                }
            }
        } catch (\JsonException $e) {
            $this->error('Failed to parse Rector output');
            $this->line($output);
        }
    }

    /**
     * Format rector class name for display.
     */
    private function formatRectorName(string $rector): string
    {
        // Extract just the class name without namespace
        $parts = explode('\\', $rector);
        $name = end($parts);

        // Convert from PascalCase to sentence case
        // e.g., "AddTypeToConstRector" -> "Add Type To Const Rector"
        $name = preg_replace('/(?<!^)[A-Z]/', ' $0', $name);

        // Remove "Rector" suffix if present
        return str_replace(' Rector', '', $name);
    }

    /**
     * Display PHPStan analysis results in a readable format.
     */
    private function displayPhpstanResults(string $output): void
    {
        $errorFormat = strtolower($this->option('stan-error-format'));

        if ($errorFormat === 'table' || $errorFormat === 'raw') {
            $this->line($output);

            return;
        }

        try {
            $data = json_decode($output, true, 512, JSON_THROW_ON_ERROR);

            if (isset($data['files'])) {
                foreach ($data['files'] as $file => $errors) {
                    $this->info("\nFile: ".$file);

                    if (! empty($errors['messages'])) {
                        $this->line("\nIssues found:");
                        foreach ($errors['messages'] as $error) {
                            $this->line(sprintf(
                                '- Line %d: %s',
                                $error['line'] ?? 0,
                                $error['message'] ?? 'Unknown error'
                            ));
                        }
                    }

                    $this->line("\n".str_repeat('-', 80)."\n");
                }

                if (isset($data['totals'])) {
                    $this->info("\nSummary:");
                    $this->line('- Total errors: '.($data['totals']['errors'] ?? 0));
                    $this->line('- Files with errors: '.($data['totals']['files'] ?? 0));
                }
            }
        } catch (\JsonException $e) {
            // If JSON parsing fails, just output the raw content
            $this->line($output);
        }
    }

    /**
     * Display PHPMD analysis results in a readable format.
     */
    private function displayPhpmdResults(string $output, string $errorFile, string $reportFile): void
    {
        // Display any errors that occurred during analysis
        if (File::exists($errorFile) && File::size($errorFile) > 0) {
            $this->error("\nPHPMD Analysis Errors:");
            $this->line(File::get($errorFile));
        }

        try {
            $report = json_decode(File::get($reportFile), true, 512, JSON_THROW_ON_ERROR);

            if (empty($report['files'])) {
                $this->info('No issues found by PHPMD.');

                return;
            }

            $totalViolations = 0;
            $fileCount = count($report['files']);

            $this->info(sprintf(
                "\nPHPMD analyzing %d files...",
                $fileCount
            ));

            foreach ($report['files'] as $file) {
                if (empty($file['violations'])) {
                    continue;
                }

                $this->line("\n".str_repeat('-', 80));
                $this->info('File: '.$file['file']);
                $violations = $file['violations'];
                $totalViolations += count($violations);

                // Group violations by priority
                $byPriority = collect($violations)->groupBy('priority')->sortKeys();

                foreach ($byPriority as $priority => $priorityViolations) {
                    $this->line(sprintf(
                        "\nPriority %d Issues (%d):",
                        $priority,
                        count($priorityViolations)
                    ));

                    foreach ($priorityViolations as $violation) {
                        $this->line(sprintf(
                            "\n• Rule: %s\n  Lines: %d-%d\n  %s",
                            $violation['rule'],
                            $violation['beginLine'],
                            $violation['endLine'],
                            $violation['description']
                        ));
                    }
                }
            }

            // Show summary
            $this->line("\n".str_repeat('=', 80));
            $this->info('Analysis Summary:');
            $this->line(sprintf(
                "• Files analyzed: %d\n• Total violations: %d",
                $fileCount,
                $totalViolations
            ));

            // Store report location for fix command
            $this->storeReportLocation('phpmd', $reportFile);
        } catch (\JsonException $e) {
            $this->error('Failed to parse PHPMD report');
            $this->line($output);
        }
    }

    /**
     * Store the analysis configuration.
     */
    private function storeConfiguration(): void
    {
        if (! $this->config) {
            return;
        }

        $this->config->toFile($this->projectRoot.'/build/analysis-config.json');
    }

    /**
     * Add helper method to determine if we're in fix mode
     */
    private function isFixMode(): bool
    {
        return ! $this->option('dry-run');
    }

    /**
     * Store report locations for fix command
     */
    private function storeReportLocation(string $tool, string $reportFile): void
    {
        $reportsIndex = $this->projectRoot.'/build/analysis/reports.json';

        $reports = [];
        if (File::exists($reportsIndex)) {
            try {
                $reports = json_decode(File::get($reportsIndex), true, 512, JSON_THROW_ON_ERROR);
            } catch (\JsonException $e) {
                // Start fresh if the file is corrupted
            }
        }

        $reports[$tool] = [
            'timestamp' => Carbon::now()->toIso8601String(),
            'report' => $reportFile,
        ];

        File::put($reportsIndex, json_encode($reports, JSON_PRETTY_PRINT));
    }

    // Add method to handle exclude paths
    private function getExcludePaths(string $targetDir): string
    {
        $defaultExcludes = ['vendor', 'build'];

        // Only include 'tests' in excludes if we're not analyzing the tests directory
        if (! str_contains($targetDir, '/tests')) {
            $defaultExcludes[] = 'tests';
        }

        return implode(',', $defaultExcludes);
    }
}
