<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests\Performance;

use Orchestra\Testbench\TestCase;
use SAC\EloquentModelGenerator\Commands\GenerateCommand;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ExecutionTimeTest extends TestCase {
    private const EXECUTION_TIMEOUT = 300; // 5 minutes
    private const ACCEPTABLE_TIME = 1.0; // 1 second per model
    private const TABLES_COUNT = 100;

    protected function getPackageProviders($app): array {
        return [
            'SAC\EloquentModelGenerator\Providers\ModelGeneratorServiceProvider',
        ];
    }

    protected function setUp(): void {
        parent::setUp();

        // Set execution time limit
        set_time_limit(self::EXECUTION_TIMEOUT);

        // Set up test database
        config(['database.default' => 'sqlite']);
        config(['database.connections.sqlite.database' => ':memory:']);

        // Create test tables
        $this->createTestTables();
    }

    private function createTestTables(): void {
        for ($i = 1; $i <= self::TABLES_COUNT; $i++) {
            DB::statement("
                CREATE TABLE table_{$i} (
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
                    name TEXT NOT NULL,
                    description TEXT,
                    status TEXT DEFAULT 'active',
                    created_at TIMESTAMP,
                    updated_at TIMESTAMP
                )
            ");
        }
    }

    public function testSingleModelGenerationTime(): void {
        $startTime = microtime(true);

        $this->artisan('model:generate', [
            'table' => 'table_1',
            '--namespace' => 'App\\Models',
        ])->assertSuccessful();

        $executionTime = microtime(true) - $startTime;

        // Assert single model generation is fast
        $this->assertLessThan(
            self::ACCEPTABLE_TIME,
            $executionTime,
            'Single model generation took too long'
        );
    }

    public function testBulkGenerationTime(): void {
        $startTime = microtime(true);

        $this->artisan('model:generate', [
            '--tables' => implode(',', array_map(fn($i) => "table_{$i}", range(1, self::TABLES_COUNT))),
            '--namespace' => 'App\\Models',
        ])->assertSuccessful();

        $executionTime = microtime(true) - $startTime;
        $timePerModel = $executionTime / self::TABLES_COUNT;

        // Assert bulk generation is efficient
        $this->assertLessThan(
            self::ACCEPTABLE_TIME,
            $timePerModel,
            'Average time per model in bulk generation too high'
        );
    }

    public function testGenerationWithRelationships(): void {
        // Create tables with relationships
        DB::statement('
            CREATE TABLE parents (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                name TEXT NOT NULL
            )
        ');

        DB::statement('
            CREATE TABLE children (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                parent_id INTEGER NOT NULL,
                name TEXT NOT NULL,
                FOREIGN KEY (parent_id) REFERENCES parents(id)
            )
        ');

        $startTime = microtime(true);

        $this->artisan('model:generate', [
            '--tables' => 'parents,children',
            '--namespace' => 'App\\Models',
            '--with-relationships' => true,
        ])->assertSuccessful();

        $executionTime = microtime(true) - $startTime;

        // Assert relationship analysis doesn't add significant overhead
        $this->assertLessThan(
            self::ACCEPTABLE_TIME * 2,
            $executionTime,
            'Generation with relationships took too long'
        );
    }

    public function testCacheEffectiveness(): void {
        // First run - no cache
        $startTime = microtime(true);

        $this->artisan('model:generate', [
            'table' => 'table_1',
            '--namespace' => 'App\\Models',
        ])->assertSuccessful();

        $firstRunTime = microtime(true) - $startTime;

        // Second run - with cache
        $startTime = microtime(true);

        $this->artisan('model:generate', [
            'table' => 'table_1',
            '--namespace' => 'App\\Models',
            '--use-cache' => true,
        ])->assertSuccessful();

        $secondRunTime = microtime(true) - $startTime;

        // Assert cache improves performance
        $this->assertLessThan(
            $firstRunTime * 0.5,
            $secondRunTime,
            'Cache did not significantly improve performance'
        );
    }

    public function testAsyncGenerationTime(): void {
        $startTime = microtime(true);

        $this->artisan('model:generate', [
            '--tables' => implode(',', array_map(fn($i) => "table_{$i}", range(1, self::TABLES_COUNT))),
            '--namespace' => 'App\\Models',
            '--async' => true,
            '--processes' => 4,
        ])->assertSuccessful();

        $asyncTime = microtime(true) - $startTime;

        // Compare with sync execution
        $startTime = microtime(true);

        $this->artisan('model:generate', [
            '--tables' => implode(',', array_map(fn($i) => "table_{$i}", range(1, self::TABLES_COUNT))),
            '--namespace' => 'App\\Models',
        ])->assertSuccessful();

        $syncTime = microtime(true) - $startTime;

        // Assert async is faster
        $this->assertLessThan(
            $syncTime * 0.75,
            $asyncTime,
            'Async generation not significantly faster than sync'
        );
    }

    public function testProgressiveGeneration(): void {
        $times = [];
        $tables = array_map(fn($i) => "table_{$i}", range(1, self::TABLES_COUNT));

        foreach ($tables as $table) {
            $startTime = microtime(true);

            $this->artisan('model:generate', [
                'table' => $table,
                '--namespace' => 'App\\Models',
                '--progressive' => true,
            ])->assertSuccessful();

            $times[] = microtime(true) - $startTime;
        }

        // Assert generation time remains consistent
        $averageTime = array_sum($times) / count($times);
        $maxDeviation = max(array_map(fn($time) => abs($time - $averageTime), $times));

        $this->assertLessThan(
            $averageTime * 0.5,
            $maxDeviation,
            'Progressive generation times show high variance'
        );
    }

    public function testOptimizedModePerformance(): void {
        // Standard mode
        $startTime = microtime(true);

        $this->artisan('model:generate', [
            '--tables' => implode(',', array_map(fn($i) => "table_{$i}", range(1, 10))),
            '--namespace' => 'App\\Models',
        ])->assertSuccessful();

        $standardTime = microtime(true) - $startTime;

        // Clean up
        File::deleteDirectory($this->app->basePath('app/Models'));

        // Optimized mode
        $startTime = microtime(true);

        $this->artisan('model:generate', [
            '--tables' => implode(',', array_map(fn($i) => "table_{$i}", range(1, 10))),
            '--namespace' => 'App\\Models',
            '--optimized' => true,
        ])->assertSuccessful();

        $optimizedTime = microtime(true) - $startTime;

        // Assert optimized mode is faster
        $this->assertLessThan(
            $standardTime * 0.8,
            $optimizedTime,
            'Optimized mode not faster than standard mode'
        );
    }

    public function testTimeoutHandling(): void {
        // Set very short timeout
        set_time_limit(1);

        $result = $this->artisan('model:generate', [
            '--tables' => implode(',', array_map(fn($i) => "table_{$i}", range(1, self::TABLES_COUNT))),
            '--namespace' => 'App\\Models',
        ]);

        // Assert graceful timeout handling
        $result->assertFailed()
            ->expectsOutput('Operation timed out')
            ->expectsOutput('Partial results have been saved');

        // Verify partial results exist
        $this->assertTrue(
            File::exists($this->app->basePath('app/Models')),
            'No partial results saved on timeout'
        );
    }
}