<?php

namespace SAC\EloquentModelGenerator\Providers;

use Illuminate\Support\ServiceProvider;
use SAC\EloquentModelGenerator\Console\Commands\AnalyzeCommand;
use SAC\EloquentModelGenerator\Console\Commands\FixCommand;
use SAC\EloquentModelGenerator\Console\Commands\GenerateModelCommand;
use SAC\EloquentModelGenerator\Services\AnalysisToolManager;
use SAC\EloquentModelGenerator\Services\FixStrategies\DocBlockFixStrategy;
use SAC\EloquentModelGenerator\Services\FixStrategies\PhpmdFixStrategy;
use SAC\EloquentModelGenerator\Services\FixStrategies\PsalmFixStrategy;
use SAC\EloquentModelGenerator\Services\FixStrategies\RectorFixStrategy;
use SAC\EloquentModelGenerator\Services\FixStrategies\TypeHintFixStrategy;
use SAC\EloquentModelGenerator\Services\FixStrategyManager;
use SAC\EloquentModelGenerator\Services\ModelGeneratorService;
use SAC\EloquentModelGenerator\Services\ModelGeneratorTemplateEngine;
use SAC\EloquentModelGenerator\Support\Fixes\TypeHintFixer;

class EloquentModelGeneratorServiceProvider extends ServiceProvider {
    /**
     * Register any application services.
     */
    public function register(): void {
        $this->app->singleton(ModelGeneratorTemplateEngine::class);
        $this->app->singleton(ModelGeneratorService::class);
        $this->app->singleton(AnalysisToolManager::class);
        $this->app->singleton(FixStrategyManager::class);

        // Configure AnalysisToolManager
        $this->app->afterResolving(AnalysisToolManager::class, function (AnalysisToolManager $manager) {
            // PHPStan/Larastan
            $manager->registerTool('phpstan', [
                'vendor/bin/phpstan',
                'analyze',
                '--level=%level%',
                '--no-progress',
                '--error-format=table',
                '%target%'
            ]);

            // PHP Mess Detector
            $manager->registerTool('phpmd', [
                'vendor/bin/phpmd',
                '%target%',
                'text',
                'cleancode,codesize,controversial,design,naming,unusedcode'
            ]);

            // Psalm
            $manager->registerTool('psalm', [
                'vendor/bin/psalm',
                '--show-info=true',
                '%target%'
            ]);

            // PHPMetrics
            $manager->registerTool('metrics', [
                'vendor/bin/phpmetrics',
                '--report-html=build/reports/metrics',
                '%target%'
            ]);

            // Class Leak
            $manager->registerTool('class-leak', [
                'vendor/bin/class-leak',
                'check',
                '%target%'
            ]);

            // Type Coverage
            $manager->registerTool('type-coverage', [
                'vendor/bin/type-coverage',
                'check',
                '%target%'
            ]);
        });

        $this->app->when(GenerateModelCommand::class)
            ->needs(ModelGeneratorService::class)
            ->give(function ($app) {
                /** @var ModelGeneratorTemplateEngine */
                $templateEngine = $app->make(ModelGeneratorTemplateEngine::class);
                return new ModelGeneratorService($templateEngine);
            });

        $this->app->when(GenerateModelCommand::class)
            ->needs(ModelGeneratorTemplateEngine::class)
            ->give(function ($app) {
                /** @var ModelGeneratorTemplateEngine */
                $templateEngine = $app->make(ModelGeneratorTemplateEngine::class);
                return $templateEngine;
            });

        // Register fix strategies
        $this->app->afterResolving(FixStrategyManager::class, function (FixStrategyManager $manager) {
            $manager->registerStrategy('rector', new RectorFixStrategy());
            $manager->registerStrategy('type_hint', new TypeHintFixStrategy());
            $manager->registerStrategy('doc_block', new DocBlockFixStrategy());
            $manager->registerStrategy('phpmd', new PhpmdFixStrategy());
            $manager->registerStrategy('psalm', new PsalmFixStrategy());
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void {
        if ($this->app->runningInConsole()) {
            $this->commands([
                GenerateModelCommand::class,
                AnalyzeCommand::class,
                FixCommand::class,
            ]);

            $this->publishes([
                __DIR__ . '/../../config/eloquent-model-generator.php' => config_path('eloquent-model-generator.php'),
            ], 'config');

            $this->publishes([
                __DIR__ . '/../../resources/stubs' => resource_path('stubs/vendor/eloquent-model-generator'),
            ], 'stubs');

            $this->publishes([
                __DIR__ . '/../../resources/templates' => resource_path('views/vendor/eloquent-model-generator'),
            ], 'views');
        }
    }
}