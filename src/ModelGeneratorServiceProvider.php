<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator;

use Illuminate\Support\ServiceProvider;
use SAC\EloquentModelGenerator\Config\ModelGeneratorConfig;
use SAC\EloquentModelGenerator\Console\Commands\GenerateModelsCommand;
use SAC\EloquentModelGenerator\Contracts\ModelGeneratorInterface;
use SAC\EloquentModelGenerator\Services\CodeGenerator;
use SAC\EloquentModelGenerator\Services\ModelGenerator;
use SAC\EloquentModelGenerator\Services\RelationshipResolver;
use SAC\EloquentModelGenerator\Services\SchemaAnalyzer;

/**
 * Service provider for the Eloquent Model Generator package.
 */
final class ModelGeneratorServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Register config
        $this->mergeConfigFrom(
            __DIR__.'/../config/model-generator.php',
            'model-generator'
        );

        // Register configuration singleton
        $this->app->singleton(ModelGeneratorConfig::class, function ($app) {
            return ModelGeneratorConfig::fromEnvironment();
        });

        // Register services
        $this->app->singleton(SchemaAnalyzer::class);
        $this->app->singleton(RelationshipResolver::class);
        $this->app->singleton(CodeGenerator::class);

        // Register main service
        $this->app->singleton(ModelGeneratorInterface::class, function ($app) {
            return new ModelGenerator(
                config: $app->make(ModelGeneratorConfig::class),
                analyzer: $app->make(SchemaAnalyzer::class),
                resolver: $app->make(RelationshipResolver::class),
                generator: $app->make(CodeGenerator::class),
            );
        });

        // Register alias
        $this->app->alias(ModelGeneratorInterface::class, 'model.generator');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            // Register commands
            $this->commands([
                GenerateModelsCommand::class,
            ]);

            // Publish configuration
            $this->publishes([
                __DIR__.'/../config/model-generator.php' => config_path('model-generator.php'),
            ], 'model-generator-config');

            // Publish stubs
            $this->publishes([
                __DIR__.'/../stubs' => base_path('stubs/vendor/model-generator'),
            ], 'model-generator-stubs');
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array<string>
     */
    public function provides(): array
    {
        return [
            ModelGeneratorInterface::class,
            ModelGeneratorConfig::class,
            SchemaAnalyzer::class,
            RelationshipResolver::class,
            CodeGenerator::class,
            'model.generator',
        ];
    }
}
