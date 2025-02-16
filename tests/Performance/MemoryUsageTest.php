<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests\Performance;

use Orchestra\Testbench\TestCase;
use SAC\EloquentModelGenerator\Commands\GenerateCommand;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class MemoryUsageTest extends TestCase {
    private const MEMORY_LIMIT = '256M';
    private const LARGE_COLUMN_COUNT = 500;

    protected function getPackageProviders($app): array {
        return [
            'SAC\EloquentModelGenerator\Providers\ModelGeneratorServiceProvider',
        ];
    }

    protected function setUp(): void {
        parent::setUp();

        // Set memory limit for tests
        ini_set('memory_limit', self::MEMORY_LIMIT);

        // Set up test database
        config(['database.default' => 'sqlite']);
        config(['database.connections.sqlite.database' => ':memory:']);
    }

    public function testMemoryUsageWithLargeTable(): void {
        // Create table with many columns
        $columns = ['id INTEGER PRIMARY KEY AUTOINCREMENT'];
        for ($i = 1; $i <= self::LARGE_COLUMN_COUNT; $i++) {
            $columns[] = "column_{$i} TEXT";
        }

        DB::statement('CREATE TABLE large_table (' . implode(', ', $columns) . ')');

        $startMemory = memory_get_usage(true);

        $this->artisan('model:generate', [
            'table' => 'large_table',
            '--namespace' => 'App\\Models',
        ])->assertSuccessful();

        $peakMemory = memory_get_peak_usage(true);
        $memoryUsed = $peakMemory - $startMemory;

        // Assert memory usage is reasonable
        $this->assertLessThan(
            100 * 1024 * 1024, // 100MB
            $memoryUsed,
            'Memory usage for large table exceeded limit'
        );
    }

    public function testMemoryLeaks(): void {
        // Create test table
        DB::statement('
            CREATE TABLE test_table (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                name TEXT NOT NULL
            )
        ');

        $memoryReadings = [];

        // Generate model multiple times
        for ($i = 0; $i < 10; $i++) {
            $startMemory = memory_get_usage(true);

            $this->artisan('model:generate', [
                'table' => 'test_table',
                '--namespace' => 'App\\Models',
            ])->assertSuccessful();

            // Force garbage collection
            gc_collect_cycles();

            $endMemory = memory_get_usage(true);
            $memoryReadings[] = $endMemory - $startMemory;

            // Clean up generated files
            File::deleteDirectory($this->app->basePath('app/Models'));
        }

        // Check for memory leaks
        $memoryVariance = max($memoryReadings) - min($memoryReadings);
        $this->assertLessThan(
            1024 * 1024, // 1MB
            $memoryVariance,
            'Memory usage increased over iterations, possible memory leak'
        );
    }

    public function testMemoryCleanup(): void {
        // Create test tables
        for ($i = 1; $i <= 10; $i++) {
            DB::statement("
                CREATE TABLE table_{$i} (
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
                    data TEXT
                )
            ");
        }

        $startMemory = memory_get_usage(true);

        // Generate models with cleanup after each
        for ($i = 1; $i <= 10; $i++) {
            $this->artisan('model:generate', [
                'table' => "table_{$i}",
                '--namespace' => 'App\\Models',
                '--cleanup' => true,
            ])->assertSuccessful();

            $currentMemory = memory_get_usage(true);

            // Memory should not grow significantly
            $this->assertLessThan(
                $startMemory * 1.5,
                $currentMemory,
                'Memory not properly cleaned up after generation'
            );
        }
    }

    public function testMemoryOptimization(): void {
        // Create table with large text columns
        DB::statement('
            CREATE TABLE large_content (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                content_1 TEXT,
                content_2 TEXT,
                content_3 TEXT
            )
        ');

        // Insert large content
        $largeContent = str_repeat('x', 1024 * 1024); // 1MB
        DB::table('large_content')->insert([
            'content_1' => $largeContent,
            'content_2' => $largeContent,
            'content_3' => $largeContent,
        ]);

        $startMemory = memory_get_usage(true);

        $this->artisan('model:generate', [
            'table' => 'large_content',
            '--namespace' => 'App\\Models',
            '--optimize-memory' => true,
        ])->assertSuccessful();

        $memoryUsed = memory_get_peak_usage(true) - $startMemory;

        // Assert memory optimization is effective
        $this->assertLessThan(
            10 * 1024 * 1024, // 10MB
            $memoryUsed,
            'Memory optimization not effective'
        );
    }

    public function testStreamProcessing(): void {
        // Create table with many rows
        DB::statement('
            CREATE TABLE stream_test (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                name TEXT NOT NULL,
                data TEXT
            )
        ');

        // Insert many rows
        for ($i = 0; $i < 10000; $i++) {
            DB::table('stream_test')->insert([
                'name' => "Record {$i}",
                'data' => str_repeat('x', 1000),
            ]);
        }

        $startMemory = memory_get_usage(true);

        $this->artisan('model:generate', [
            'table' => 'stream_test',
            '--namespace' => 'App\\Models',
            '--stream' => true,
        ])->assertSuccessful();

        $memoryUsed = memory_get_peak_usage(true) - $startMemory;

        // Assert streaming keeps memory usage low
        $this->assertLessThan(
            50 * 1024 * 1024, // 50MB
            $memoryUsed,
            'Stream processing not effective in managing memory'
        );
    }

    public function testGarbageCollection(): void {
        // Create test table
        DB::statement('
            CREATE TABLE gc_test (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                name TEXT NOT NULL,
                data BLOB
            )
        ');

        $memoryReadings = [];
        $gcCounts = [];

        // Generate model with different GC strategies
        foreach (['disable', 'auto', 'aggressive'] as $gcStrategy) {
            $startMemory = memory_get_usage(true);
            $startGc = gc_collect_cycles();

            $this->artisan('model:generate', [
                'table' => 'gc_test',
                '--namespace' => 'App\\Models',
                '--gc-strategy' => $gcStrategy,
            ])->assertSuccessful();

            $endMemory = memory_get_usage(true);
            $endGc = gc_collect_cycles();

            $memoryReadings[$gcStrategy] = $endMemory - $startMemory;
            $gcCounts[$gcStrategy] = $endGc - $startGc;

            // Clean up
            File::deleteDirectory($this->app->basePath('app/Models'));
        }

        // Assert GC effectiveness
        $this->assertLessThan(
            $memoryReadings['disable'],
            $memoryReadings['aggressive'],
            'Aggressive GC should use less memory'
        );

        $this->assertGreaterThan(
            $gcCounts['auto'],
            $gcCounts['aggressive'],
            'Aggressive GC should collect more cycles'
        );
    }
}