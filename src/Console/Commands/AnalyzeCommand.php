<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Console\Commands;

use function Laravel\Prompts\confirm;
use function Laravel\Prompts\multiselect;
use function Laravel\Prompts\select;
use function Laravel\Prompts\text;
use function Laravel\Prompts\progress;
use function Laravel\Prompts\spin;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use SAC\EloquentModelGenerator\Config\AnalysisConfig;
use SAC\EloquentModelGenerator\Services\AnalysisToolManager;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Yaml\Yaml;
use Carbon\Carbon;

class AnalyzeCommand extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'analyze
        {--levels= : Specify analysis levels}
        {--tools=* : Specific tools to run}
        {--parallel : Run tools in parallel}
        {--directory= : Directory to analyze}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run code analysis tools';

    private readonly AnalysisToolManager $toolManager;
    private string $projectRoot;
    private string $reportsDir;
    private ?AnalysisConfig $config = null;
    private ?string $phpstanConfigPath = null;

    /**
     * Create a new command instance.
     */
    public function __construct(AnalysisToolManager $toolManager) {
        $this->toolManager = $toolManager;
        parent::__construct();
        $this->projectRoot = dirname(__DIR__, 3);  // src/Console/Commands -> src
        $this->reportsDir = $this->projectRoot . '/build/reports';
    }

    /**
     * Execute the console command.
     */
    public function handle(): int {
        try {
            // Get command options
            $levels = $this->option('levels');
            $tools = $this->option('tools');
            $parallel = $this->option('parallel');

            // Get target directory - let's debug this
            $targetDir = $this->getTargetDirectory();
            $this->info("Target directory: " . $targetDir); // Debug line

            // Set target directory in tool manager
            $this->toolManager->setTargetDir($targetDir);

            // Only create PHPStan config if we're running PHPStan
            if (empty($tools) || in_array('phpstan', $tools)) {
                $this->createPhpstanConfig($targetDir, $levels);
                $this->info("PHPStan config created at: " . $this->phpstanConfigPath);
            }

            if (empty($tools)) {
                $tools = null; // Use all available tools
            }

            if ($parallel) {
                $this->toolManager->runToolsInParallel(
                    $tools ?? $this->toolManager->getAvailableTools(),
                    $targetDir,
                    ['level' => $levels]
                );
            } else {
                $this->toolManager->analyze($levels, $tools, $this->output);
            }

            return self::SUCCESS;
        } catch (\Throwable $e) {
            $this->error($e->getMessage());
            $this->error($e->getTraceAsString()); // Add stack trace for debugging
            return self::FAILURE;
        }
    }

    /**
     * Create temporary PHPStan config file.
     */
    private function createPhpstanConfig(string $targetDir, ?string $level): void {
        $config = [
            'includes' => [
                'vendor/larastan/larastan/extension.neon',
            ],
            'parameters' => [
                'level' => $level ?? 8,
                'tmpDir' => $this->projectRoot . '/build/phpstan',
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

        $configPath = $this->projectRoot . '/build/phpstan.' . uniqid() . '.neon';
        File::ensureDirectoryExists(dirname($configPath));
        File::put($configPath, Yaml::dump($config, 4));

        // Store config path for use in buildCommand
        $this->phpstanConfigPath = $configPath;
        $this->toolManager->setPhpstanConfigPath($configPath);

        // Register cleanup on shutdown
        register_shutdown_function(function () use ($configPath) {
            if (File::exists($configPath)) {
                File::delete($configPath);
            }
        });
    }

    /**
     * Set up the environment for analysis.
     */
    private function setupEnvironment(): void {
        if (!is_dir($this->reportsDir)) {
            File::makeDirectory($this->reportsDir, 0755, true);
        }
        File::cleanDirectory($this->reportsDir);
    }

    /**
     * Get the target directory for analysis.
     */
    private function getTargetDirectory(): string {
        $defaultDir = $this->projectRoot . '/src';
        $targetDir = $this->option('directory');

        // Debug directory selection
        $this->info("Default directory: " . $defaultDir); // Debug line
        $this->info("Directory option: " . ($targetDir ?? 'not set')); // Debug line

        // If no directory specified and interactive mode is enabled
        if (!$targetDir && !$this->option('no-interaction')) {
            $targetDir = text(
                label: 'Which directory would you like to analyze?',
                placeholder: $defaultDir,
                default: $defaultDir,
                required: true
            );
            $this->info("User selected directory: " . $targetDir); // Debug line
        }

        // Use default if no directory specified
        $targetDir = $targetDir ?: $defaultDir;
        $this->info("Final target directory before normalization: " . $targetDir); // Debug line

        // Convert to absolute path if relative
        if (!str_starts_with($targetDir, '/')) {
            $targetDir = $this->projectRoot . '/' . $targetDir;
            $this->info("Converted to absolute path: " . $targetDir); // Debug line
        }

        // Ensure directory exists and normalize path
        if (!File::exists($targetDir)) {
            throw new \RuntimeException("Target directory does not exist: {$targetDir}");
        }

        $normalizedPath = str_replace('\\', '/', realpath($targetDir));
        $this->info("Final normalized path: " . $normalizedPath); // Debug line

        return $normalizedPath;
    }

    /**
     * Get the analysis levels to run.
     *
     * @return array<int>
     */
    private function getAnalysisLevels(): array {
        $defaultLevels = range(0, 8);
        $optionLevels = $this->option('levels');

        if (!$optionLevels && !$this->option('no-interaction')) {
            $selectedLevels = multiselect(
                label: 'Which PHPStan levels would you like to run?',
                options: array_combine($defaultLevels, array_map(fn($l) => "Level {$l}", $defaultLevels)),
                default: ['0', '1', '2'],
                required: true
            );
            return array_map('intval', $selectedLevels);
        }

        return $optionLevels ? array_map('intval', explode(',', $optionLevels)) : [0, 1, 2];
    }

    /**
     * Run the analysis tools.
     *
     * @param array<int> $levels
     */
    private function runAnalysis(array $levels): bool {
        $foundIssues = false;

        // Run PHPStan for each level
        $progress = progress(label: 'Running PHPStan analysis', steps: count($levels));
        foreach ($levels as $level) {
            $progress->label("Running PHPStan Level {$level}...");
            $result = $this->toolManager->runTool('phpstan', $this->config->targetDir, ['level' => $level]);
            $foundIssues = $foundIssues || !$result['success'];

            // Generate report for this level immediately
            $this->generateReports($level);

            $progress->advance();
        }
        $progress->finish();

        // Run additional tools if requested
        if (!$this->option('no-interaction') && confirm('Would you like to run additional tools?', true)) {
            $selectedTools = $this->getSelectedTools();
            if (!empty($selectedTools)) {
                $progress = progress(label: 'Running additional tools', steps: count($selectedTools));
                foreach ($selectedTools as $tool) {
                    $progress->label("Running {$tool}...");
                    $result = $this->toolManager->runTool($tool, $this->config->targetDir);
                    $foundIssues = $foundIssues || !$result['success'];
                    $progress->advance();
                }
                $progress->finish();

                // Generate report for additional tools
                $this->generateReports();
            }
        }

        return $foundIssues;
    }

    /**
     * Get selected additional tools to run.
     *
     * @return array<string>
     */
    private function getSelectedTools(): array {
        $tools = array_diff($this->toolManager->getAvailableTools(), ['phpstan']);

        // Add Rector to the available tools
        $tools = array_merge($tools, ['rector']);

        $selected = multiselect(
            label: 'Select additional tools to run:',
            options: array_combine($tools, array_map(function ($tool) {
                return match ($tool) {
                    'rector' => 'Rector (Code Analysis & Automated Refactoring)',
                    'phpmd' => 'PHPMD (Mess Detector)',
                    'psalm' => 'Psalm',
                    'metrics' => 'PHP Metrics',
                    'class-leak' => 'Class Leak Detector',
                    'type-coverage' => 'Type Coverage Analyzer',
                    default => $tool
                };
            }, $tools)),
            default: $tools
        );

        return $selected;
    }

    /**
     * Store the analysis configuration.
     */
    private function storeConfiguration(): void {
        if (!$this->config) {
            return;
        }

        $this->config->toFile($this->reportsDir . '/analysis-config.json');
    }

    /**
     * Generate analysis reports.
     */
    private function generateReports(?int $level = null): void {
        $format = $this->option('format');
        $reportGenerator = match ($format) {
            'json' => fn() => $this->generateJsonReport($level),
            'text' => fn() => $this->generateTextReport($level),
            default => fn() => $this->generateHtmlReport($level),
        };

        spin($reportGenerator, 'Generating reports...');
    }

    /**
     * Generate JSON report.
     */
    private function generateJsonReport(?int $level = null): void {
        $results = $this->toolManager->getResults();

        // Special handling for Rector results
        if (isset($results['rector']) && $level === null) {
            $results['rector']['suggestions'] = [];
        }

        // If level is specified, only include results for that level
        if ($level !== null) {
            $results = array_filter($results, function ($key) use ($level) {
                return $key === "phpstan_level_{$level}";
            }, ARRAY_FILTER_USE_KEY);
        }

        $report = [
            'config' => $this->config,
            'results' => $results,
            'summary' => [
                'hasIssues' => $this->toolManager->hasIssues(),
                'affectedFiles' => $this->toolManager->getAffectedFiles(),
            ],
        ];

        $filename = $level !== null ? "report_level_{$level}.json" : 'report_additional.json';
        File::put(
            $this->reportsDir . '/' . $filename,
            json_encode($report, JSON_PRETTY_PRINT)
        );
    }

    /**
     * Generate text report.
     */
    private function generateTextReport(?int $level = null): void {
        $report = [
            "Static Analysis Report" . ($level !== null ? " - Level {$level}" : " - Additional Tools"),
            str_repeat("=", 50),
            "",
            "Configuration:",
            "- Target Directory: {$this->config->targetDir}",
            "- PHPStan Levels: " . implode(', ', $this->config->levels),
            "",
            "Results:",
        ];

        $results = $this->toolManager->getResults();
        if ($level !== null) {
            $results = array_filter($results, function ($key) use ($level) {
                return $key === "phpstan_level_{$level}";
            }, ARRAY_FILTER_USE_KEY);
        }

        foreach ($results as $tool => $result) {
            $report[] = "\n{$tool}:";
            $report[] = "- Status: " . ($result['success'] ? 'Success' : 'Issues Found');
            if (!empty($result['files'])) {
                $report[] = "- Affected Files:";
                foreach ($result['files'] as $file) {
                    $report[] = "  - {$file}";
                }
            }
        }

        $filename = $level !== null ? "report_level_{$level}.txt" : 'report_additional.txt';
        File::put($this->reportsDir . '/' . $filename, implode("\n", $report));
    }

    /**
     * Generate HTML report.
     */
    private function generateHtmlReport(?int $level = null): void {
        $template = File::get($this->getHtmlTemplate());

        $title = "Static Analysis Report" . ($level !== null ? " - Level {$level}" : " - Additional Tools");

        $results = $this->toolManager->getResults();
        if ($level !== null) {
            $results = array_filter($results, function ($key) use ($level) {
                return $key === "phpstan_level_{$level}";
            }, ARRAY_FILTER_USE_KEY);
        }

        $report = str_replace(
            [
                '%title%',
                '%summary%',
                '%results%',
            ],
            [
                $title,
                $this->getHtmlSummary($level),
                $this->getHtmlResults($results),
            ],
            $template
        );

        $filename = $level !== null ? "report_level_{$level}.html" : 'report_additional.html';
        File::put($this->reportsDir . '/' . $filename, $report);
    }

    /**
     * Get the HTML template path.
     */
    private function getHtmlTemplate(): string {
        return $this->projectRoot . '/resources/templates/analysis-report.html';
    }

    /**
     * Get HTML summary section.
     */
    private function getHtmlSummary(?int $level = null): string {
        $results = $this->toolManager->getResults();
        if ($level !== null) {
            $results = array_filter($results, function ($key) use ($level) {
                return $key === "phpstan_level_{$level}";
            }, ARRAY_FILTER_USE_KEY);
        }

        $hasIssues = collect($results)->contains('success', false);

        return "
            <div class='summary'>
                <h2>Analysis Summary" . ($level !== null ? " - Level {$level}" : " - Additional Tools") . "</h2>
                <p>Target Directory: {$this->config->targetDir}</p>
                " . ($level !== null ? "<p>PHPStan Level: {$level}</p>" : "") . "
                <p>Status: " . ($hasIssues ? 'Issues Found' : 'Success') . "</p>
            </div>
        ";
    }

    /**
     * Get HTML results section.
     */
    private function getHtmlResults(array $results): string {
        $output = '';
        foreach ($results as $tool => $result) {
            $output .= "
                <div class='tool-result'>
                    <h3>{$tool}</h3>
                    <p class='" . ($result['success'] ? 'success' : 'error') . "'>
                        Status: " . ($result['success'] ? 'Success' : 'Issues Found') . "
                    </p>
            ";

            // Special handling for Rector results
            if ($tool === 'rector' && !empty($result['suggestions'])) {
                $output .= "<div class='rector-suggestions'><h4>Suggested Improvements:</h4><ul>";
                foreach ($result['suggestions'] as $suggestion) {
                    $output .= "<li>{$suggestion}</li>";
                }
                $output .= "</ul></div>";
            }

            if (!empty($result['files'])) {
                $output .= "<div class='affected-files'><h4>Affected Files:</h4><ul>";
                foreach ($result['files'] as $file) {
                    $output .= "<li>{$file}</li>";
                }
                $output .= "</ul></div>";
            }

            $output .= "</div>";
        }

        return $output;
    }

    public function analyze(?string $levels = null, ?array $tools = null, ?OutputInterface $output = null): void {
        $timestamp = Carbon::now()->format('Y-m-d_H-i-s');
        $summary = [];

        $this->runTools($tools, $levels, 'Analyzing', $output, function (string $tool, string $output) use ($timestamp, &$summary) {
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
}
