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

class AnalyzeCommand extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'analyze
                          {--l|levels= : Comma-separated list of PHPStan levels to run}
                          {--d|directory= : Directory to analyze}
                          {--p|parallel : Run tools in parallel}
                          {--f|format=html : Output format (html, json, or text)}
                          {--ci : Run in CI mode with stricter checks}
                          {--cache : Enable caching of analysis results}
                          {--debug : Show detailed debug information}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run static analysis tools on the codebase';

    private string $projectRoot;
    private string $reportsDir;
    private AnalysisToolManager $toolManager;
    private ?AnalysisConfig $config = null;

    /**
     * Create a new command instance.
     */
    public function __construct(AnalysisToolManager $toolManager) {
        parent::__construct();
        $this->projectRoot = dirname(__DIR__, 3);  // src/Console/Commands -> src
        $this->reportsDir = $this->projectRoot . '/build/reports';
        $this->toolManager = $toolManager;
    }

    /**
     * Execute the console command.
     */
    public function handle(): int {
        try {
            $this->setupEnvironment();

            // Get target directory
            $targetDir = $this->getTargetDirectory();
            if (!is_dir($targetDir)) {
                $this->error("Directory does not exist: {$targetDir}");
                return Command::FAILURE;
            }

            // Get analysis levels
            $levels = $this->getAnalysisLevels();
            if (empty($levels)) {
                $this->error('No analysis levels selected.');
                return Command::FAILURE;
            }

            // Create configuration
            $this->config = new AnalysisConfig(
                targetDir: $targetDir,
                levels: $levels,
                tools: $this->toolManager->getAvailableTools(),
                options: [
                    'parallel' => $this->option('parallel'),
                    'format' => $this->option('format'),
                    'ci' => $this->option('ci'),
                    'cache' => $this->option('cache'),
                    'debug' => $this->option('debug'),
                ]
            );

            // Store configuration
            $this->storeConfiguration();

            // Run analysis
            $foundIssues = $this->runAnalysis($levels);

            // Generate reports
            $this->generateReports();

            if ($foundIssues) {
                $this->warn('Analysis completed with issues.');
                $this->info("Review the reports at: {$this->reportsDir}");
                $this->info("To fix issues automatically, run: vendor/bin/testbench fix");
                return Command::FAILURE;
            }

            $this->info('Analysis completed successfully!');
            return Command::SUCCESS;
        } catch (\Exception $e) {
            $this->error('Error during analysis: ' . $e->getMessage());

            if ($this->getOutput()->getVerbosity() >= OutputInterface::VERBOSITY_VERBOSE) {
                $this->error($e->getTraceAsString());
            }

            return Command::FAILURE;
        }
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

        if (!$targetDir && !$this->option('no-interaction')) {
            $targetDir = text(
                label: 'Which directory would you like to analyze?',
                placeholder: $defaultDir,
                default: $defaultDir,
                required: true
            );
        }

        return realpath($targetDir ?: $defaultDir) ?: ($targetDir ?: $defaultDir);
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

            if ($this->option('parallel')) {
                $this->info('Running tools in parallel...');
                $results = spin(
                    fn() => $this->toolManager->runToolsInParallel($selectedTools, $this->config->targetDir),
                    'Running analysis tools...'
                );
                foreach ($results as $result) {
                    $foundIssues = $foundIssues || !$result['success'];
                }
            } else {
                $progress = progress(label: 'Running additional tools', steps: count($selectedTools));
                foreach ($selectedTools as $tool) {
                    $progress->label("Running {$tool}...");
                    $result = $this->toolManager->runTool($tool, $this->config->targetDir);
                    $foundIssues = $foundIssues || !$result['success'];
                    $progress->advance();
                }
                $progress->finish();
            }

            // Generate report for additional tools
            $this->generateReports(null);
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
        return multiselect(
            label: 'Select additional tools to run:',
            options: array_combine($tools, $tools),
            default: $tools
        );
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
}
