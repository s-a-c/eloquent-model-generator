<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Providers;

use Illuminate\Container\Container;
use Illuminate\Contracts\Container\Container as ContainerContract;
use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;
use Override;
use SAC\EloquentModelGenerator\Console\Commands\AnalyzeCommand;
use SAC\EloquentModelGenerator\Console\Commands\FixCommand;
use SAC\EloquentModelGenerator\Console\Commands\GenerateModelCommand;
use SAC\EloquentModelGenerator\Console\Commands\ListTablesCommand;
use SAC\EloquentModelGenerator\Services\AnalysisToolManager;
use SAC\EloquentModelGenerator\Services\FixStrategies\DocBlockFixStrategy;
use SAC\EloquentModelGenerator\Services\FixStrategies\PhpmdFixStrategy;
use SAC\EloquentModelGenerator\Services\FixStrategies\PsalmFixStrategy;
use SAC\EloquentModelGenerator\Services\FixStrategies\RectorFixStrategy;
use SAC\EloquentModelGenerator\Services\FixStrategies\TypeHintFixStrategy;
use SAC\EloquentModelGenerator\Services\FixStrategyManager;
use SAC\EloquentModelGenerator\Services\ModelGeneratorService;
use SAC\EloquentModelGenerator\Services\ModelGeneratorTemplateEngine;

class EloquentModelGeneratorServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    #[Override]
    public function register(): void
    {
        // Register config first
        $this->mergeConfigFrom(__DIR__.'/../../config/config.php', 'eloquent-model-generator');

        // Ensure build directories exist
        $this->ensureBuildDirectories();

        // Bind Container interface to concrete implementation
        $this->app->bind(ContainerContract::class, Container::class);

        // Register core services
        $this->app->singleton(ModelGeneratorService::class);
        $this->app->singleton(ModelGeneratorTemplateEngine::class);
        $this->app->singleton(AnalysisToolManager::class, function ($app) {
            $manager = new AnalysisToolManager(base_path());

            // Register default tools
            $manager->registerTool('phpstan')
                ->registerTool('phpmd')
                ->registerTool('psalm')
                ->registerTool('metrics')
                ->registerTool('class-leak')
                ->registerTool('type-coverage')
                ->registerTool('rector');

            // Set default config paths
            $manager->setPhpstanConfigPath(base_path('phpstan.neon'));

            return $manager;
        });
        $this->app->singleton(FixStrategyManager::class);

        // Register commands with their dependencies
        $this->app->when(AnalyzeCommand::class)
            ->needs(AnalysisToolManager::class)
            ->give(fn ($app) => $app->make(AnalysisToolManager::class));

        $this->app->when(FixCommand::class)
            ->needs(AnalysisToolManager::class)
            ->give(fn ($app) => $app->make(AnalysisToolManager::class));

        $this->app->when(GenerateModelCommand::class)
            ->needs(ModelGeneratorService::class)
            ->give(fn ($app) => $app->make(ModelGeneratorService::class));

        $this->app->when(ListTablesCommand::class)
            ->needs(ModelGeneratorService::class)
            ->give(fn ($app) => $app->make(ModelGeneratorService::class));

        // Register commands in the container
        $this->commands([
            AnalyzeCommand::class,
            FixCommand::class,
            GenerateModelCommand::class,
            ListTablesCommand::class,
        ]);

        // Register fix strategies
        $this->app->afterResolving(FixStrategyManager::class, function (FixStrategyManager $manager): void {
            $manager->registerStrategy('rector', new RectorFixStrategy);
            $manager->registerStrategy('type_hint', new TypeHintFixStrategy);
            $manager->registerStrategy('doc_block', new DocBlockFixStrategy);
            $manager->registerStrategy('phpmd', new PhpmdFixStrategy);
            $manager->registerStrategy('psalm', new PsalmFixStrategy);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                GenerateModelCommand::class,
                AnalyzeCommand::class,
                FixCommand::class,
                ListTablesCommand::class,
            ]);

            // Publish configs
            $this->publishes([
                __DIR__.'/../../config/config.php' => config_path('eloquent-model-generator.php'),
                __DIR__.'/../../config/tools/phpstan.neon' => base_path('phpstan.neon'),
                __DIR__.'/../../config/tools/phpmd.xml' => base_path('phpmd.xml'),
                __DIR__.'/../../config/tools/psalm.xml' => base_path('psalm.xml'),
                __DIR__.'/../../config/tools/.phpmetrics.json' => base_path('.phpmetrics.json'),
                __DIR__.'/../../config/tools/rector.php' => base_path('rector.php'),
                __DIR__.'/../../config/tools/rector-laravel.php' => base_path('rector-laravel.php'),
                __DIR__.'/../../config/tools/rector-type-coverage.php' => base_path('rector-type-coverage.php'),
            ], 'tool-configs');

            $this->publishes([
                __DIR__.'/../../resources/stubs' => resource_path('stubs/vendor/eloquent-model-generator'),
            ], 'stubs');

            $this->publishes([
                __DIR__.'/../../resources/templates' => resource_path('views/vendor/eloquent-model-generator'),
            ], 'views');
        }

        // Register config
        $this->mergeConfigFrom(
            __DIR__.'/../../config/eloquent-model-generator.php',
            'eloquent-model-generator'
        );
    }

    /**
     * Ensure build directories exist.
     */
    private function ensureBuildDirectories(): void
    {
        $buildDir = base_path('build');
        $tools = [
            'phpstan',
            'phpmd',
            'psalm',
            'metrics',
            'class-leak',
            'type-coverage',
            'rector',
        ];

        $types = ['analysis', 'fixes', 'baseline'];

        if (! File::isDirectory($buildDir)) {
            File::makeDirectory($buildDir, 0755, true);
        }

        foreach ($tools as $tool) {
            foreach ($types as $type) {
                $dir = "{$buildDir}/{$tool}/{$type}";
                if (! File::isDirectory($dir)) {
                    File::makeDirectory($dir, 0755, true);
                }
            }
        }
    }
}
