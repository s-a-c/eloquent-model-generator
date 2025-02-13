<?php

namespace SAC\EloquentModelGenerator\Providers;

use Illuminate\Support\ServiceProvider;
use SAC\EloquentModelGenerator\Console\Commands\GenerateModelCommand;
use SAC\EloquentModelGenerator\Services\ModelGeneratorService;
use SAC\EloquentModelGenerator\Services\ModelGeneratorTemplateEngine;

class EloquentModelGeneratorServiceProvider extends ServiceProvider {
    /**
     * Register any application services.
     */
    public function register(): void {
        $this->app->singleton(ModelGeneratorTemplateEngine::class);
        $this->app->singleton(ModelGeneratorService::class);

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
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void {
        if ($this->app->runningInConsole()) {
            $this->commands([
                GenerateModelCommand::class,
            ]);

            $this->publishes([
                __DIR__ . '/../../config/eloquent-model-generator.php' => config_path('eloquent-model-generator.php'),
            ], 'config');

            $this->publishes([
                __DIR__ . '/../../resources/stubs' => resource_path('stubs/vendor/eloquent-model-generator'),
            ], 'stubs');
        }
    }
}
