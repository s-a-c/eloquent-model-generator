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
use SAC\EloquentModelGenerator\Services\FixStrategyManager;
use Symfony\Component\Process\Process;

class FixCommand extends Command {
    protected $signature = 'fix
                          {--l|levels= : Comma-separated list of PHPStan levels to fix}
                          {--a|all : Fix all detected issues}
                          {--dry-run : Show what would be fixed without making changes}
                          {--no-backup : Skip creating backups of files}
                          {--debug : Show detailed debug information}';

    protected $description = 'Fix static analysis issues with interactive prompts';

    private string $projectRoot;
    private string $reportsDir;
    private string $backupDir;
    private AnalysisToolManager $toolManager;
    private FixStrategyManager $fixManager;
    private ?AnalysisConfig $config = null;

    public function __construct(
        AnalysisToolManager $toolManager,
        FixStrategyManager $fixManager
    ) {
        parent::__construct();
        $this->projectRoot = dirname(__DIR__, 4);
        $this->reportsDir = $this->projectRoot . '/build/reports';
        $this->toolManager = $toolManager;
        $this->fixManager = $fixManager;
    }

    public function handle(): int {
        // Load analysis configuration
        if (!$this->loadAnalysisConfig()) {
            if (confirm('No analysis results found. Would you like to run analysis first?', true)) {
                $this->call('analyze');
                if (!$this->loadAnalysisConfig()) {
                    $this->error('Analysis failed or produced no results.');
                    return 1;
                }
            } else {
                return 1;
            }
        }

        // Get levels to fix
        $levels = $this->getFixLevels();
        if (empty($levels)) {
            $this->error('No levels selected for fixing.');
            return 1;
        }

        // Create backup unless disabled
        if (!$this->option('no-backup')) {
            $this->createBackup($this->config->targetDir);
        }

        try {
            // Stage 1: Run Rector fixes
            $this->info('Stage 1: Running Rector fixes...');
            $progress = progress(label: 'Fixing PHPStan issues', steps: count($levels));

            foreach ($levels as $level) {
                $progress->label("Fixing Level {$level} issues...");
                $this->fixPhpStanLevel($level);
                $progress->advance();
            }
            $progress->finish();

            // Stage 2: Fix coding standards
            if (confirm('Would you like to fix coding standards issues?', true)) {
                $this->fixCodingStandards();
            }

            // Stage 3: Fix type coverage
            if (confirm('Would you like to improve type coverage?', true)) {
                spin(
                    fn() => $this->fixTypeCoverage(),
                    'Improving type coverage...'
                );
            }

            // Stage 4: Verify fixes
            if (confirm('Would you like to verify the fixes by running analysis again?', true)) {
                $this->call('analyze', [
                    '--levels' => implode(',', $levels),
                    '--directory' => $this->config->targetDir
                ]);
            }

            $this->info('Fix process completed successfully!');
            if (!$this->option('no-backup')) {
                $this->info("A backup of your original files is available at: {$this->backupDir}");
            }
            return 0;
        } catch (\Throwable $e) {
            $this->error('An error occurred during the fix process: ' . $e->getMessage());
            if ($this->option('debug')) {
                $this->error($e->getTraceAsString());
            }

            if (!$this->option('no-backup') && confirm('Would you like to restore from backup?', true)) {
                $this->restoreBackup($this->config->targetDir);
                $this->info('Files restored from backup.');
            }
            return 1;
        }
    }

    private function loadAnalysisConfig(): bool {
        $configFile = $this->reportsDir . '/analysis-config.json';
        if (!File::exists($configFile)) {
            return false;
        }

        try {
            $this->config = AnalysisConfig::fromFile($configFile);
            return true;
        } catch (\Throwable $e) {
            return false;
        }
    }

    private function getFixLevels(): array {
        if (!$this->config) {
            return [];
        }

        $optionLevels = $this->option('levels');
        $fixAll = $this->option('all');

        if ($fixAll) {
            return $this->config->levels;
        }

        if ($optionLevels) {
            $requestedLevels = array_map('intval', explode(',', $optionLevels));
            return array_intersect($requestedLevels, $this->config->levels);
        }

        $options = array_combine(
            array_map('strval', $this->config->levels),
            array_map(fn($l) => "Level {$l}", $this->config->levels)
        );

        $selectedLevels = multiselect(
            label: 'Which PHPStan levels would you like to fix?',
            options: $options,
            default: array_map('strval', $this->config->levels),
            required: true
        );

        return array_map('intval', $selectedLevels);
    }

    private function createBackup(string $targetDir): void {
        $this->info('Creating backup of source files...');
        $this->backupDir = $this->projectRoot . '/build/backup/' . date('Ymd_His');

        if (!File::isDirectory($targetDir)) {
            throw new \RuntimeException("Target directory not found: {$targetDir}");
        }

        File::makeDirectory($this->backupDir, 0755, true);
        File::copyDirectory($targetDir, $this->backupDir . '/src');
    }

    private function restoreBackup(string $targetDir): void {
        if (File::isDirectory($this->backupDir)) {
            File::deleteDirectory($targetDir);
            File::copyDirectory($this->backupDir . '/src', $targetDir);
        }
    }

    private function fixPhpStanLevel(int $level): void {
        $result = $this->toolManager->getResults("phpstan_level_{$level}");
        if (empty($result['files'])) {
            return;
        }

        if ($this->option('dry-run')) {
            $this->info("Would fix the following files for Level {$level}:");
            foreach ($result['files'] as $file) {
                $this->line("  - {$file}");
            }
            return;
        }

        $process = new Process([
            'vendor/bin/rector',
            'process',
            '--config-set=parameters.phpstan.level=' . $level,
            ...$result['files']
        ]);

        $process->run(function ($type, $buffer) {
            if ($this->option('debug')) {
                $this->output->write($buffer);
            }
        });
    }

    private function fixCodingStandards(): void {
        $tools = [
            'PHP CS Fixer' => ['vendor/bin/php-cs-fixer', 'fix'],
            'PHP Code Beautifier' => ['vendor/bin/phpcbf'],
        ];

        $selectedTools = multiselect(
            label: 'Select coding standard tools to run:',
            options: array_combine(array_keys($tools), array_keys($tools)),
            default: array_keys($tools)
        );

        $progress = progress(label: 'Fixing coding standards', steps: count($selectedTools));
        foreach ($selectedTools as $name) {
            $progress->label("Running {$name}...");

            if ($this->option('dry-run')) {
                $this->info("Would run {$name} on {$this->config->targetDir}");
                continue;
            }

            $process = new Process([...$tools[$name], $this->config->targetDir]);
            $process->run(function ($type, $buffer) {
                if ($this->option('debug')) {
                    $this->output->write($buffer);
                }
            });

            $progress->advance();
        }
        $progress->finish();
    }

    private function fixTypeCoverage(): void {
        $this->ensureRectorTypeCoverageConfig();

        if ($this->option('dry-run')) {
            $this->info("Would improve type coverage in {$this->config->targetDir}");
            return;
        }

        $process = new Process([
            'vendor/bin/rector',
            'process',
            '--config=rector-type-coverage.php',
            $this->config->targetDir
        ]);

        $process->run(function ($type, $buffer) {
            if ($this->option('debug')) {
                $this->output->write($buffer);
            }
        });
    }

    private function ensureRectorTypeCoverageConfig(): void {
        $configFile = $this->projectRoot . '/rector-type-coverage.php';
        if (File::exists($configFile)) {
            return;
        }

        $this->info('Creating rector-type-coverage.php configuration...');
        File::put(
            $configFile,
            <<<'PHP'
<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\TypeDeclaration\Rector\ClassMethod\AddReturnTypeDeclarationRector;
use Rector\TypeDeclaration\Rector\ClassMethod\AddVoidReturnTypeWhereNoReturnRector;
use Rector\TypeDeclaration\Rector\Property\AddPropertyTypeDeclarationRector;
use Rector\TypeDeclaration\Rector\Param\ParamTypeFromStrictTypedPropertyRector;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->paths([__DIR__ . '/src']);

    $rectorConfig->rules([
        AddReturnTypeDeclarationRector::class,
        AddVoidReturnTypeWhereNoReturnRector::class,
        AddPropertyTypeDeclarationRector::class,
        ParamTypeFromStrictTypedPropertyRector::class,
    ]);

    $rectorConfig->skip([
        // Add any paths or patterns to skip
        __DIR__ . '/src/Legacy/*',
    ]);
};
PHP
        );
    }
}
