<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Infrastructure\Laravel;

use Illuminate\Support\ServiceProvider;
use SAC\EloquentModelGenerator\Domain\Service\ModelGenerator;
use SAC\EloquentModelGenerator\Domain\Service\ValidationBuilder;
use SAC\EloquentModelGenerator\Domain\Service\RelationshipDetector;
use SAC\EloquentModelGenerator\Domain\Type\TypeResolver;

/**
 * Laravel service provider for the Eloquent Model Generator package.
 * Registers services in the DI container and boots package functionality.
 */
final class EloquentModelGeneratorServiceProvider extends ServiceProvider
{
    /**
     * Register services in the DI container.
     */
    public function register(): void
    {
        // Register TypeResolver as a singleton since it maintains state
        $this->app->singleton(TypeResolver::class, function ($app) {
            return new TypeResolver();
        });

        // Register domain services
        $this->app->bind(ModelGenerator::class, function ($app) {
            return new ModelGenerator();
        });

        $this->app->bind(ValidationBuilder::class, function ($app) {
            return new ValidationBuilder();
        });

        $this->app->bind(RelationshipDetector::class, function ($app) {
            return new RelationshipDetector();
        });

        // Register config
        $this->mergeConfigFrom(
            __DIR__ . '/../../../config/eloquent-model-generator.php',
            'eloquent-model-generator'
        );
    }

    /**
     * Bootstrap package services.
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            // Publish configuration
            $this->publishes([
                __DIR__ . '/../../../config/eloquent-model-generator.php' =>
                    config_path('eloquent-model-generator.php'),
            ], 'config');

            // Register artisan commands
            $this->commands([
                // Commands will be added in a future sprint
            ]);
        }

        // Register default type mappings
        $this->registerDefaultTypeMappings();
    }

    /**
     * Register default database type to PHP type mappings.
     */
    private function registerDefaultTypeMappings(): void
    {
        /** @var TypeResolver */
        $resolver = $this->app->make(TypeResolver::class);

        // Register common database types
        $mappings = [
            'string' => \SAC\EloquentModelGenerator\Domain\Type\StringType::class,
            'varchar' => \SAC\EloquentModelGenerator\Domain\Type\StringType::class,
            'text' => \SAC\EloquentModelGenerator\Domain\Type\StringType::class,
            // Additional type mappings will be added as we implement more types
        ];

        foreach ($mappings as $dbType => $typeClass) {
            $resolver->registerType($dbType, $typeClass);
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
            TypeResolver::class,
            ModelGenerator::class,
            ValidationBuilder::class,
            RelationshipDetector::class,
        ];
    }
}
