<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Console\Commands;

use Illuminate\Console\Command;
use SAC\EloquentModelGenerator\Services\AnalysisToolManager;
use Illuminate\Support\Facades\File;
use function Laravel\Prompts\text;
use function Laravel\Prompts\confirm;
use Illuminate\Support\Facades\Yaml;
use Symfony\Component\Console\Output\OutputInterface;

class FixCommand extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fix
        {--levels= : Specify fix levels}
        {--tools=* : Specific tools to run}
        {--dry-run : Show what would be fixed without making changes}
        {--parallel : Run tools in parallel}
        {--directory= : Directory to analyze}';

    protected $description = 'Fix code issues found by analysis tools';

    private string $projectRoot;
    private ?string $phpstanConfigPath = null;

    public function __construct(private readonly AnalysisToolManager $toolManager) {
        parent::__construct();
        $this->projectRoot = dirname(__DIR__, 3);  // src/Console/Commands -> src
    }

    public function handle(): int {
        try {
            $levels = $this->option('levels');
            $tools = $this->option('tools');
            $parallel = $this->option('parallel');
            $dryRun = $this->option('dry-run');

            // Initialize config with absolute paths
            $targetDir = $this->getTargetDirectory();
            $this->toolManager->setTargetDir($targetDir);

            if (empty($tools)) {
                $tools = null; // Use all available tools
            }

            if ($dryRun) {
                $this->info('Dry run - no changes will be made');
                $this->toolManager->analyze($levels, $tools, $this->output);
            } else {
                if (!$this->option('no-interaction') && !confirm('This will modify files. Do you want to continue?', true)) {
                    $this->info('Operation cancelled.');
                    return self::SUCCESS;
                }

                if ($parallel) {
                    $this->toolManager->runToolsInParallel(
                        $tools ?? $this->toolManager->getAvailableTools(),
                        $targetDir,
                        ['level' => $levels]
                    );
                } else {
                    $this->toolManager->fix($levels, $tools, $this->output);
                }
            }

            return self::SUCCESS;
        } catch (\Throwable $e) {
            $this->error($e->getMessage());
            return self::FAILURE;
        }
    }

    /**
     * Get the target directory for analysis.
     */
    private function getTargetDirectory(): string {
        $defaultDir = $this->projectRoot . '/src';
        $targetDir = $this->option('directory');

        // If no directory specified and interactive mode is enabled
        if (!$targetDir && !$this->option('no-interaction')) {
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
        if (!str_starts_with($targetDir, '/')) {
            $targetDir = $this->projectRoot . '/' . $targetDir;
        }

        // Ensure directory exists and normalize path
        if (!File::exists($targetDir)) {
            throw new \RuntimeException("Target directory does not exist: {$targetDir}");
        }

        return str_replace('\\', '/', realpath($targetDir));
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

        // Register cleanup on shutdown
        register_shutdown_function(function () use ($configPath) {
            if (File::exists($configPath)) {
                File::delete($configPath);
            }
        });
    }
}
