<?php

namespace SAC\EloquentModelGenerator\Tests;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Orchestra\Testbench\TestCase as BaseTestCase;
use SAC\EloquentModelGenerator\EloquentModelGeneratorServiceProvider;

abstract class TestCase extends BaseTestCase
{
    /**
     * Indicates whether the default seeder should run before each test.
     */
    protected bool $seed = false;

    /**
     * Indicates if migrations have been run.
     */
    protected static bool $migrated = false;

    /**
     * The base path for the test environment.
     */
    protected static ?string $basePath = null;

    /**
     * Keep track of created test files for cleanup.
     *
     * @var array<string>
     */
    protected array $testFiles = [];

    protected function setUp(): void
    {
        // Create necessary directories before parent setup
        $basePath = $this->getBasePath();
        $bootstrapPath = $basePath.'/bootstrap';
        $cachePath = $bootstrapPath.'/cache';

        if (! is_dir($bootstrapPath)) {
            mkdir($bootstrapPath, 0777, true);
        }
        if (! is_dir($cachePath)) {
            mkdir($cachePath, 0777, true);
        }
        chmod($cachePath, 0777);

        parent::setUp();

        // Create other necessary directories
        $this->createTestDirectories();

        // Only set up database if needed
        if ($this->needsDatabase()) {
            $this->setUpDatabase();
            DB::enableQueryLog();
        }
    }

    /**
     * Determine if the test needs database access.
     */
    protected function needsDatabase(): bool
    {
        return false; // Default to false, override in test classes that need database
    }

    protected function getPackageProviders($app): array
    {
        return [
            EloquentModelGeneratorServiceProvider::class,
        ];
    }

    protected function defineEnvironment($app): void
    {
        // Set base path for testing
        $basePath = $this->getBasePath();
        $app->setBasePath($basePath);

        // Create and ensure bootstrap/cache directory is writable
        $bootstrapPath = $basePath.'/bootstrap';
        $cachePath = $bootstrapPath.'/cache';

        if (! is_dir($bootstrapPath)) {
            mkdir($bootstrapPath, 0777, true);
        }
        if (! is_dir($cachePath)) {
            mkdir($cachePath, 0777, true);
        }
        chmod($cachePath, 0777);

        // Set storage path for testing
        $app['config']->set('view.paths', [__DIR__.'/resources/views']);
        $app['config']->set('filesystems.disks.local.root', __DIR__.'/storage');

        // Configure SQLite database for testing
        $app['config']->set('database.default', 'testing');
        $app['config']->set('database.connections.testing', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);

        // Set test environment specific configuration
        $app['config']->set('app.env', 'testing');
        $app['config']->set('cache.default', 'array');
        $app['config']->set('session.driver', 'array');
        $app['config']->set('queue.default', 'sync');
    }

    protected function setUpDatabase(): void
    {
        try {
            if (! static::$migrated) {
                // Load migrations
                $this->loadMigrationsFrom(__DIR__.'/database/migrations');

                // Run migrations
                $this->artisan('migrate:fresh');

                // Run seeds if enabled
                if ($this->seed) {
                    $this->artisan('db:seed');
                }

                static::$migrated = true;
            }
        } catch (\Exception $e) {
            $this->markTestSkipped('Failed to set up database: '.$e->getMessage());
        }
    }

    protected function tearDownDatabase(): void
    {
        try {
            // Get all tables using Laravel's Schema builder
            $tables = Schema::getConnection()
                ->getSchemaBuilder()
                ->getTables();

            // Disable foreign key checks
            Schema::disableForeignKeyConstraints();

            // Drop all tables
            foreach ($tables as $table) {
                Schema::dropIfExists($table->name);
            }

            // Re-enable foreign key checks
            Schema::enableForeignKeyConstraints();

            // Clear query log
            DB::flushQueryLog();
        } catch (\Exception $e) {
            // Log error but don't fail the test
            error_log('Failed to tear down database: '.$e->getMessage());
        }
    }

    protected function getBasePath(): string
    {
        if (static::$basePath === null) {
            static::$basePath = __DIR__.'/tmp/'.Str::random();
        }

        return static::$basePath;
    }

    protected function createTestDirectories(): void
    {
        $directories = [
            $this->getBasePath().'/bootstrap/cache',
            $this->getBasePath().'/storage/framework/cache',
            $this->getBasePath().'/storage/framework/sessions',
            $this->getBasePath().'/storage/framework/views',
            $this->getBasePath().'/storage/logs',
            $this->getBasePath().'/database',
            $this->getBasePath().'/app/Models',
        ];

        foreach ($directories as $directory) {
            try {
                if (! is_dir($directory)) {
                    // Create directory with full permissions
                    File::makeDirectory($directory, 0777, true);
                }
                // Ensure directory is writable
                if (! is_writable($directory)) {
                    chmod($directory, 0777);
                }
            } catch (\Exception $e) {
                $this->markTestSkipped('Failed to create or set permissions for directory '.$directory.': '.$e->getMessage());
            }
        }
    }

    protected function tearDown(): void
    {
        $this->tearDownDatabase();

        // Clean up test files
        foreach ($this->testFiles as $file) {
            if (File::exists($file)) {
                File::delete($file);
            }
        }

        // Clean up test directories
        if (is_dir($this->getBasePath())) {
            File::deleteDirectory($this->getBasePath());
        }

        parent::tearDown();
    }

    /**
     * Create a test file with the given content.
     */
    protected function createTestFile(string $path, string $content): string
    {
        $fullPath = $this->getBasePath().'/'.ltrim($path, '/');
        File::put($fullPath, $content);
        $this->testFiles[] = $fullPath;

        return $fullPath;
    }

    /**
     * Create a test migration.
     */
    protected function createTestMigration(string $name, string $content): string
    {
        $filename = date('Y_m_d_His').'_'.$name.'.php';

        return $this->createTestFile('database/migrations/'.$filename, $content);
    }

    /**
     * Create a test model.
     */
    protected function createTestModel(string $name, string $content): string
    {
        return $this->createTestFile('app/Models/'.$name.'.php', $content);
    }

    /**
     * Get the database connection.
     *
     * @param  string|null  $connection
     * @param  string|null  $table
     * @return \Illuminate\Database\Connection
     */
    protected function getConnection($connection = null, $table = null)
    {
        return DB::connection($connection);
    }

    /**
     * Get the current database driver.
     */
    protected function getDriverName(): string
    {
        return $this->getConnection()->getDriverName();
    }

    /**
     * Assert that a given table exists.
     */
    protected function assertTableExists(string $table): void
    {
        $this->assertTrue(
            Schema::hasTable($table),
            "Failed asserting that table [{$table}] exists."
        );
    }

    /**
     * Assert that a given table has a given column.
     */
    protected function assertTableHasColumn(string $table, string $column): void
    {
        $this->assertTrue(
            Schema::hasColumn($table, $column),
            "Failed asserting that table [{$table}] has column [{$column}]."
        );
    }

    /**
     * Assert that a given table has the given columns.
     *
     * @param  array<string>  $columns
     */
    protected function assertTableHasColumns(string $table, array $columns): void
    {
        foreach ($columns as $column) {
            $this->assertTableHasColumn($table, $column);
        }
    }

    /**
     * Assert that a file exists and contains the given content.
     */
    protected function assertFileContains(string $path, string $content): void
    {
        $this->assertFileExists($path);
        $this->assertStringContainsString($content, File::get($path));
    }

    /**
     * Assert that a file exists and matches the given pattern.
     */
    protected function assertFileMatchesPattern(string $path, string $pattern): void
    {
        $this->assertFileExists($path);
        $this->assertMatchesRegularExpression($pattern, File::get($path));
    }

    /**
     * Get the last executed query.
     */
    protected function getLastQuery(): ?string
    {
        $queries = DB::getQueryLog();

        return end($queries)['query'] ?? null;
    }

    /**
     * Get all executed queries.
     */
    protected function getQueries(): array
    {
        return array_column(DB::getQueryLog(), 'query');
    }
}
