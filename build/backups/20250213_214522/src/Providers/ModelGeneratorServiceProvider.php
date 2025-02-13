<?php

namespace SAC\EloquentModelGenerator\Providers;

use Illuminate\Support\ServiceProvider;
use SAC\EloquentModelGenerator\Services\ModelGeneratorServiceInterface;
use SAC\EloquentModelGenerator\Services\ParallelModelGeneratorService;
use SAC\EloquentModelGenerator\Contracts\ModelGenerator;
use SAC\EloquentModelGenerator\Contracts\SchemaAnalyzer;
use SAC\EloquentModelGenerator\Models\ModelTemplate;
use SAC\EloquentModelGenerator\Models\CachedModelTemplate;
use SAC\EloquentModelGenerator\Services\Schema\MySQLSchemaAnalyzer;
use SAC\EloquentModelGenerator\Services\Schema\PostgreSQLSchemaAnalyzer;
use SAC\EloquentModelGenerator\Services\Schema\SQLiteSchemaAnalyzer;
use SAC\EloquentModelGenerator\Services\DefaultModelGenerator;

class ModelGeneratorServiceProvider extends ServiceProvider {
    public function register(): void {
        $this->app->bind(ModelTemplate::class, CachedModelTemplate::class);
        $this->app->bind(ModelGeneratorServiceInterface::class, ParallelModelGeneratorService::class);
        $this->app->bind(ModelGenerator::class, DefaultModelGenerator::class);

        $this->app->bind(SchemaAnalyzer::class, function ($app) {
            $connection = $app['db']->connection();
            $driver = $connection->getDriverName();

            return match ($driver) {
                'mysql' => new MySQLSchemaAnalyzer($connection),
                'pgsql' => new PostgreSQLSchemaAnalyzer($connection),
                'sqlite' => new SQLiteSchemaAnalyzer($connection),
                default => throw new \RuntimeException("Unsupported database driver: {$driver}")
            };
        });
    }
}
