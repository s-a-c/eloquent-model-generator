<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests;

use Illuminate\Support\Facades\File;
use Orchestra\Testbench\TestCase as BaseTestCase;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use SAC\EloquentModelGenerator\ModelGeneratorServiceProvider;

/**
 * Base test case for the package.
 */
abstract class TestCase extends BaseTestCase
{
    /**
     * Get package providers.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return array<int, class-string>
     */
    protected function getPackageProviders($app): array
    {
        return [
            ModelGeneratorServiceProvider::class,
        ];
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     */
    protected function defineEnvironment($app): void
    {
        // Set up default environment variables
        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);

        // Set up model generator configuration
        $app['config']->set('model-generator', [
            'schema' => [
                'chunk_size' => 100,
                'analyze_indexes' => true,
                'detect_polymorphic' => true,
                'exclude_tables' => ['migrations', 'failed_jobs'],
            ],
            'generation' => [
                'namespace' => 'App\\Models',
                'path' => 'app/Models',
                'base_class' => 'Illuminate\\Database\\Eloquent\\Model',
                'generate_phpdoc' => true,
                'generate_type_hints' => true,
            ],
            'documentation' => [
                'enabled' => true,
                'output_path' => 'docs/models',
                'format' => 'markdown',
            ],
            'error_handling' => [
                'continue_on_error' => false,
                'log_errors' => true,
            ],
        ]);
    }

    /**
     * Define database migrations.
     */
    protected function defineDatabaseMigrations(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
    }

    /**
     * Create a test SQLite database.
     */
    protected function createTestDatabase(): void
    {
        $this->artisan('migrate:fresh');
    }

    /**
     * Get a test database path.
     */
    protected function getTestDatabasePath(): string
    {
        return __DIR__.'/database/database.sqlite';
    }

    /**
     * Create a test table.
     */
    protected function createTestTable(string $name, array $columns = []): void
    {
        $schema = $this->app['db']->connection()->getSchemaBuilder();

        if ($schema->hasTable($name)) {
            $schema->drop($name);
        }

        $schema->create($name, function ($table) use ($columns) {
            $table->id();
            foreach ($columns as $column => $type) {
                $table->$type($column);
            }
            $table->timestamps();
        });
    }

    /**
     * Drop a test table.
     */
    protected function dropTestTable(string $name): void
    {
        $schema = $this->app['db']->connection()->getSchemaBuilder();

        if ($schema->hasTable($name)) {
            $schema->drop($name);
        }
    }

    /**
     * Get test stubs directory path.
     */
    protected function getStubsPath(): string
    {
        return __DIR__.'/stubs';
    }

    /**
     * Create a temporary directory.
     */
    protected function createTempDirectory(): string
    {
        $tempDir = sys_get_temp_dir().'/model-generator-tests-'.uniqid();
        mkdir($tempDir, 0755, true);

        return $tempDir;
    }

    /**
     * Clean up temporary directory.
     */
    protected function cleanupTempDirectory(string $path): void
    {
        if (is_dir($path)) {
            $files = new RecursiveIteratorIterator(
                new RecursiveDirectoryIterator($path, RecursiveDirectoryIterator::SKIP_DOTS),
                RecursiveIteratorIterator::CHILD_FIRST
            );

            foreach ($files as $file) {
                if ($file->isDir()) {
                    rmdir($file->getRealPath());
                } else {
                    unlink($file->getRealPath());
                }
            }

            rmdir($path);
        }
    }

    /**
     * Assert that a directory is empty.
     *
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    protected function assertDirectoryIsEmpty(string $path): void
    {
        $this->assertTrue(
            count(File::files($path)) === 0 && count(File::directories($path)) === 0,
            "Failed asserting that directory [{$path}] is empty."
        );
    }

    /**
     * Assert that a file contains a string.
     *
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    protected function assertFileContains(string $file, string $content): void
    {
        $this->assertFileExists($file);
        $this->assertStringContainsString(
            $content,
            File::get($file),
            "Failed asserting that file [{$file}] contains [{$content}]."
        );
    }

    /**
     * Assert that a file does not contain a string.
     *
     * @throws \PHPUnit\Framework\ExpectationFailedException
     */
    protected function assertFileNotContains(string $file, string $content): void
    {
        $this->assertFileExists($file);
        $this->assertStringNotContainsString(
            $content,
            File::get($file),
            "Failed asserting that file [{$file}] does not contain [{$content}]."
        );
    }
}
