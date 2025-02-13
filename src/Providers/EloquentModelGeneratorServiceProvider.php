<?php

namespace SAC\EloquentModelGenerator\Providers;

use Illuminate\Support\ServiceProvider;
use SAC\EloquentModelGenerator\Console\Commands\GenerateModelCommand;
use SAC\EloquentModelGenerator\Console\Commands\AnalyzeCommand;
use SAC\EloquentModelGenerator\Console\Commands\FixCommand;
use SAC\EloquentModelGenerator\Services\ModelGeneratorService;
use SAC\EloquentModelGenerator\Services\ModelGeneratorTemplateEngine;
use SAC\EloquentModelGenerator\Services\AnalysisToolManager;
use SAC\EloquentModelGenerator\Services\FixStrategyManager;
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
            $manager->register(new TypeHintFixer());
            // Register other fix strategies here
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
