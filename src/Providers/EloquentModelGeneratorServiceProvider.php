<?php

namespace SAC\EloquentModelGenerator\Providers;

use Illuminate\Support\ServiceProvider;
use SAC\EloquentModelGenerator\ModelGenerator;
use SAC\EloquentModelGenerator\Services\ModelGeneratorService;
use SAC\EloquentModelGenerator\Services\ModelGeneratorTemplateEngine;
use SAC\EloquentModelGenerator\Contracts\ModelGenerator as ModelGeneratorContract;
use SAC\EloquentModelGenerator\Contracts\ModelGeneratorService as ModelGeneratorServiceContract;

class EloquentModelGeneratorServiceProvider extends ServiceProvider {
    /**
     * Register any application services.
     */
    public function register(): void {
        $this->mergeConfigFrom(
            __DIR__ . '/../../config/eloquent-model-generator.php',
            'eloquent-model-generator'
        );

        // Register the template engine
        $this->app->singleton(ModelGeneratorTemplateEngine::class);

        // Register the model generator service
        $this->app->singleton(ModelGeneratorServiceContract::class, function ($app) {
            return new ModelGeneratorService(
                $app->make(ModelGeneratorTemplateEngine::class)
            );
        });

        // Register the model generator
        $this->app->singleton(ModelGeneratorContract::class, function ($app) {
            return new ModelGenerator(
                $app->make(ModelGeneratorServiceContract::class)
            );
        });

        // Register the facade accessor
        $this->app->alias(ModelGeneratorContract::class, 'eloquent-model-generator');
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void {
        $this->publishes([
            __DIR__ . '/../../config/eloquent-model-generator.php' => config_path('eloquent-model-generator.php'),
        ], 'config');
    }
}
