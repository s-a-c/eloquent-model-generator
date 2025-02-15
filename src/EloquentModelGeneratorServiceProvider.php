<?php

namespace SAC\EloquentModelGenerator;

use Illuminate\Support\ServiceProvider;
use Override;
use SAC\EloquentModelGenerator\Contracts\ModelGeneratorService;
use SAC\EloquentModelGenerator\Contracts\ParallelModelGeneratorService;
use SAC\EloquentModelGenerator\Services\ModelGenerator;
use SAC\EloquentModelGenerator\Services\ParallelModelGenerator;

class EloquentModelGeneratorServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    #[Override]
    public function register(): void
    {
        $this->app->singleton(ModelGeneratorService::class, ModelGenerator::class);
        $this->app->singleton(ParallelModelGeneratorService::class, ParallelModelGenerator::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Register the command if we are using the application via the CLI
        if ($this->app->runningInConsole()) {
            $this->commands([
                // Add any console commands here
            ]);
        }
    }
}
