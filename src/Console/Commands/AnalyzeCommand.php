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
use Symfony\Component\Process\Process;

class AnalyzeCommand extends Command {
    protected $signature = 'analyze
                          {--l|levels= : Comma-separated list of PHPStan levels to run}
                          {--d|directory= : Directory to analyze}
                          {--parallel : Run tools in parallel}
                          {--format=html : Output format (html, json, or text)}
                          {--ci : Run in CI mode with stricter checks}
                          {--cache : Enable caching of analysis results}
                          {--debug : Show detailed debug information}';

    protected $description = 'Run static analysis tools with interactive prompts';

    private string $projectRoot;
    private string $reportsDir;
    private AnalysisToolManager $toolManager;
    private ?AnalysisConfig $config = null;
    private array $colors = [
        'red' => "\033[0;31m",
        'green' => "\033[0;32m",
        'yellow' => "\033[1;33m",
        'blue' => "\033[0;34m",
        'nc' => "\033[0m",
    ];

    public function __construct(AnalysisToolManager $toolManager) {
        parent::__construct();
        $this->projectRoot = dirname(__DIR__, 4);
        $this->reportsDir = $this->projectRoot . '/build/reports';
        $this->toolManager = $toolManager;

        $this->registerTools();
    }

    private function registerTools(): void {
        // Register PHPStan
        $this->toolManager->registerTool('phpstan', [
            'vendor/bin/phpstan',
            'analyse',
            '--level=%level%',
            '--memory-limit=256M',
            '--error-format=table',
            '%target%'
        ], $this->getPhpStanConfig());

        // Register other tools
        $this->toolManager->registerTool('psalm', [
            'vendor/bin/psalm',
            '--show-info=true',
            '%target%'
        ], $this->getPsalmConfig());

        $this->toolManager->registerTool('php-cs-fixer', [
            'vendor/bin/php-cs-fixer',
            'fix',
            '--dry-run',
            '--diff',
            '%target%'
        ]);

        $this->toolManager->registerTool('phpcs', [
            'vendor/bin/phpcs',
            '%target%'
        ]);

        $this->toolManager->registerTool('type-coverage', [
            'vendor/bin/type-coverage',
            'analyse',
            '%target%'
        ]);

        $this->toolManager->registerTool('class-leak', [
            'vendor/bin/class-leak',
            'analyse',
            '%target%'
        ]);
    }

    public function handle(): int {
        $this->setupEnvironment();

        // Get target directory
        $targetDir = $this->getTargetDirectory();
        if (!is_dir($targetDir)) {
            $this->error("Directory does not exist: {$targetDir}");
            return 1;
        }

        // Get analysis levels
        $levels = $this->getAnalysisLevels();

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
        $foundIssues = false;

        // Run PHPStan for each level
        $progress = progress(label: 'Running PHPStan analysis', steps: count($levels));
        foreach ($levels as $level) {
            $progress->label("Running PHPStan Level {$level}...");
            $result = $this->toolManager->runTool('phpstan', $targetDir, ['level' => $level]);
            $foundIssues = $foundIssues || !$result['success'];
            $progress->advance();
        }
        $progress->finish();

        // Run additional tools if requested
        if (confirm('Would you like to run additional tools?', true)) {
            $selectedTools = $this->getSelectedTools();

            if ($this->option('parallel')) {
                $this->info('Running tools in parallel...');
                $results = spin(
                    fn() => $this->toolManager->runToolsInParallel($selectedTools, $targetDir),
                    'Running analysis tools...'
                );
            } else {
                $progress = progress(label: 'Running additional tools', steps: count($selectedTools));
                foreach ($selectedTools as $tool) {
                    $progress->label("Running {$tool}...");
                    $result = $this->toolManager->runTool($tool, $targetDir);
                    $foundIssues = $foundIssues || !$result['success'];
                    $progress->advance();
                }
                $progress->finish();
            }
        }

        // Generate reports
        $this->generateReports();

        if ($foundIssues) {
            $this->warn('Analysis completed with issues.');
            $this->info("Review the reports at: {$this->reportsDir}");
            $this->info("To fix issues automatically, run: php artisan fix");
            return 1;
        }

        $this->info('Analysis completed successfully!');
        return 0;
    }

    private function setupEnvironment(): void {
        if (!is_dir($this->reportsDir)) {
            File::makeDirectory($this->reportsDir, 0755, true);
        }
        File::cleanDirectory($this->reportsDir);
    }

    private function getTargetDirectory(): string {
        $defaultDir = $this->projectRoot . '/src';
        $targetDir = $this->option('directory');

        if (!$targetDir) {
            $targetDir = text(
                label: 'Which directory would you like to analyze?',
                placeholder: $defaultDir,
                default: $defaultDir,
                required: true
            );
        }

        return realpath($targetDir) ?: $targetDir;
    }

    private function getAnalysisLevels(): array {
        $defaultLevels = range(0, 8);
        $optionLevels = $this->option('levels');

        if (!$optionLevels) {
            $selectedLevels = multiselect(
                label: 'Which PHPStan levels would you like to run?',
                options: array_combine($defaultLevels, array_map(fn($l) => "Level {$l}", $defaultLevels)),
                default: ['0', '1', '2'],
                required: true
            );
            return array_map('intval', $selectedLevels);
        }

        return array_map('intval', explode(',', $optionLevels));
    }

    private function getSelectedTools(): array {
        $tools = array_diff($this->toolManager->getAvailableTools(), ['phpstan']);
        return multiselect(
            label: 'Select additional tools to run:',
            options: array_combine($tools, $tools),
            default: $tools
        );
    }

    private function storeConfiguration(): void {
        if (!$this->config) {
            return;
        }

        $this->config->toFile($this->reportsDir . '/analysis-config.json');
    }

    private function generateReports(): void {
        $format = $this->option('format');
        $reportGenerator = match ($format) {
            'json' => fn() => $this->generateJsonReport(),
            'text' => fn() => $this->generateTextReport(),
            default => fn() => $this->generateHtmlReport(),
        };

        spin($reportGenerator, 'Generating reports...');
    }

    private function generateJsonReport(): void {
        $report = [
            'config' => $this->config,
            'results' => $this->toolManager->getResults(),
            'summary' => [
                'hasIssues' => $this->toolManager->hasIssues(),
                'affectedFiles' => $this->toolManager->getAffectedFiles(),
            ],
        ];

        File::put(
            $this->reportsDir . '/report.json',
            json_encode($report, JSON_PRETTY_PRINT)
        );
    }

    private function generateTextReport(): void {
        $report = [
            "Static Analysis Report",
            "====================",
            "",
            "Configuration:",
            "- Target Directory: {$this->config->targetDir}",
            "- PHPStan Levels: " . implode(', ', $this->config->levels),
            "",
            "Results:",
        ];

        foreach ($this->toolManager->getResults() as $tool => $result) {
            $report[] = "\n{$tool}:";
            $report[] = "- Status: " . ($result['success'] ? 'Success' : 'Issues Found');
            if (!empty($result['files'])) {
                $report[] = "- Affected Files:";
                foreach ($result['files'] as $file) {
                    $report[] = "  - {$file}";
                }
            }
        }

        File::put($this->reportsDir . '/report.txt', implode("\n", $report));
    }

    private function generateHtmlReport(): void {
        // Generate HTML report using a template
        $template = File::get($this->getHtmlTemplate());
        $report = str_replace(
            [
                '%title%',
                '%summary%',
                '%results%',
            ],
            [
                'Static Analysis Report',
                $this->getHtmlSummary(),
                $this->getHtmlResults(),
            ],
            $template
        );

        File::put($this->reportsDir . '/report.html', $report);
    }

    private function getHtmlTemplate(): string {
        return __DIR__ . '/../../resources/templates/analysis-report.html';
    }

    private function getHtmlSummary(): string {
        return "
            <div class='summary'>
                <h2>Analysis Summary</h2>
                <p>Target Directory: {$this->config->targetDir}</p>
                <p>PHPStan Levels: " . implode(', ', $this->config->levels) . "</p>
                <p>Status: " . ($this->toolManager->hasIssues() ? 'Issues Found' : 'Success') . "</p>
            </div>
        ";
    }

    private function getHtmlResults(): string {
        $results = '';
        foreach ($this->toolManager->getResults() as $tool => $result) {
            $results .= "
                <div class='tool-result'>
                    <h3>{$tool}</h3>
                    <p class='" . ($result['success'] ? 'success' : 'error') . "'>
                        Status: " . ($result['success'] ? 'Success' : 'Issues Found') . "
                    </p>
            ";

            if (!empty($result['files'])) {
                $results .= "<div class='affected-files'><h4>Affected Files:</h4><ul>";
                foreach ($result['files'] as $file) {
                    $results .= "<li>{$file}</li>";
                }
                $results .= "</ul></div>";
            }

            $results .= "</div>";
        }

        return $results;
    }

    private function getPhpStanConfig(): string {
        return <<<'NEON'
parameters:
    level: %level%
    paths:
        - %paths%
    excludePaths:
        - tests
        - vendor
    checkMissingIterableValueType: false
    checkGenericClassInNonGenericObjectType: false
    ignoreErrors:
        - '#PHPDoc tag @var#'
NEON;
    }

    private function getPsalmConfig(): string {
        return <<<'XML'
<?xml version="1.0"?>
<psalm
    errorLevel="4"
    resolveFromConfigFile="true"
    xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
    xmlns="https://getpsalm.org/schema/config"
    xsi:schemaLocation="https://getpsalm.org/schema/config vendor/vimeo/psalm/config.xsd"
>
    <projectFiles>
        <directory name="%paths%" />
        <ignoreFiles>
            <directory name="vendor" />
            <directory name="tests" />
        </ignoreFiles>
    </projectFiles>
</psalm>
XML;
    }
}
