<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests\Performance;

use Orchestra\Testbench\TestCase;
use SAC\EloquentModelGenerator\Commands\GenerateCommand;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class BatchProcessingTest extends TestCase {
    private const BATCH_SIZES = [10, 50, 100, 500];
    private const TEST_TABLES = 1000;

    protected function getPackageProviders($app): array {
        return [
            'SAC\EloquentModelGenerator\Providers\ModelGeneratorServiceProvider',
        ];
    }

    protected function setUp(): void {
        parent::setUp();

        // Set up test database
        config(['database.default' => 'sqlite']);
        config(['database.connections.sqlite.database' => ':memory:']);

        // Create test tables
        $this->createTestTables();
    }

    private function createTestTables(): void {
        for ($i = 1; $i <= self::TEST_TABLES; $i++) {
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

    public function testBatchSizePerformance(): void {
        $results = [];

        foreach (self::BATCH_SIZES as $batchSize) {
            $startTime = microtime(true);
            $startMemory = memory_get_usage();

            $this->artisan('model:generate', [
                '--tables' => implode(',', range(1, self::TEST_TABLES)),
                '--namespace' => 'App\\Models',
                '--batch-size' => $batchSize,
            ])->assertSuccessful();

            $endTime = microtime(true);
            $endMemory = memory_get_usage();

            $results[$batchSize] = [
                'time' => $endTime - $startTime,
                'memory' => $endMemory - $startMemory,
            ];

            // Clean up generated files
            File::deleteDirectory($this->app->basePath('app/Models'));
        }

        // Analyze results
        $this->analyzeBatchResults($results);
    }

    public function testParallelBatchProcessing(): void {
        $startTime = microtime(true);
        $startMemory = memory_get_usage();

        $this->artisan('model:generate', [
            '--tables' => implode(',', range(1, self::TEST_TABLES)),
            '--namespace' => 'App\\Models',
            '--parallel' => true,
            '--processes' => 4,
        ])->assertSuccessful();

        $endTime = microtime(true);
        $endMemory = memory_get_usage();

        // Assert parallel processing is faster than sequential
        $this->assertLessThan(
            $this->getSequentialProcessingTime(),
            $endTime - $startTime,
            'Parallel processing should be faster than sequential'
        );
    }

    public function testBatchProcessingWithRelationships(): void {
        // Create tables with relationships
        for ($i = 1; $i <= 100; $i++) {
            DB::statement("
                CREATE TABLE parent_{$i} (
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
                    name TEXT NOT NULL
                )
            ");

            DB::statement("
                CREATE TABLE child_{$i} (
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
                    parent_id INTEGER NOT NULL,
                    name TEXT NOT NULL,
                    FOREIGN KEY (parent_id) REFERENCES parent_{$i}(id)
                )
            ");
        }

        $startTime = microtime(true);
        $startMemory = memory_get_usage();

        $this->artisan('model:generate', [
            '--tables' => implode(',', array_merge(
                array_map(fn($i) => "parent_{$i}", range(1, 100)),
                array_map(fn($i) => "child_{$i}", range(1, 100))
            )),
            '--namespace' => 'App\\Models',
            '--with-relationships' => true,
            '--batch-size' => 50,
        ])->assertSuccessful();

        $endTime = microtime(true);
        $endMemory = memory_get_usage();

        // Assert reasonable performance with relationships
        $this->assertLessThan(60, $endTime - $startTime, 'Batch processing with relationships took too long');
        $this->assertLessThan(100 * 1024 * 1024, $endMemory - $startMemory, 'Memory usage too high');
    }

    public function testBatchProcessingWithValidation(): void {
        $startTime = microtime(true);
        $startMemory = memory_get_usage();

        $this->artisan('model:generate', [
            '--tables' => implode(',', range(1, self::TEST_TABLES)),
            '--namespace' => 'App\\Models',
            '--with-validation' => true,
            '--batch-size' => 100,
        ])->assertSuccessful();

        $endTime = microtime(true);
        $endMemory = memory_get_usage();

        // Assert reasonable performance with validation rules
        $this->assertLessThan(90, $endTime - $startTime, 'Batch processing with validation took too long');
        $this->assertLessThan(150 * 1024 * 1024, $endMemory - $startMemory, 'Memory usage too high');
    }

    public function testIncrementalBatchProcessing(): void {
        // First batch
        $startTime = microtime(true);
        $this->artisan('model:generate', [
            '--tables' => implode(',', range(1, 500)),
            '--namespace' => 'App\\Models',
            '--batch-size' => 100,
        ])->assertSuccessful();
        $firstBatchTime = microtime(true) - $startTime;

        // Add more tables
        for ($i = self::TEST_TABLES + 1; $i <= self::TEST_TABLES + 100; $i++) {
            DB::statement("
                CREATE TABLE table_{$i} (
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
                    name TEXT NOT NULL
                )
            ");
        }

        // Incremental batch
        $startTime = microtime(true);
        $this->artisan('model:generate', [
            '--tables' => implode(',', range(self::TEST_TABLES + 1, self::TEST_TABLES + 100)),
            '--namespace' => 'App\\Models',
            '--batch-size' => 100,
            '--incremental' => true,
        ])->assertSuccessful();
        $incrementalBatchTime = microtime(true) - $startTime;

        // Assert incremental processing is efficient
        $this->assertLessThan(
            $firstBatchTime / 5,
            $incrementalBatchTime,
            'Incremental processing should be significantly faster'
        );
    }

    private function analyzeBatchResults(array $results): void {
        // Find optimal batch size
        $optimalBatchSize = array_reduce(
            array_keys($results),
            fn($carry, $batchSize) =>
            $results[$batchSize]['time'] < $results[$carry]['time'] ? $batchSize : $carry,
            self::BATCH_SIZES[0]
        );

        // Assert performance characteristics
        foreach ($results as $batchSize => $metrics) {
            // Larger batches should use more memory
            if ($batchSize > self::BATCH_SIZES[0]) {
                $this->assertGreaterThan(
                    $results[self::BATCH_SIZES[0]]['memory'],
                    $metrics['memory'],
                    "Larger batch size should use more memory"
                );
            }

            // Memory usage shouldn't grow exponentially
            $this->assertLessThan(
                200 * 1024 * 1024 * ($batchSize / self::BATCH_SIZES[0]),
                $metrics['memory'],
                "Memory usage grew too quickly for batch size {$batchSize}"
            );

            // Processing time should be reasonable
            $this->assertLessThan(
                180,
                $metrics['time'],
                "Processing took too long for batch size {$batchSize}"
            );
        }

        // Log optimal batch size for future reference
        $this->addToAssertionCount(1);
    }

    private function getSequentialProcessingTime(): float {
        $startTime = microtime(true);

        $this->artisan('model:generate', [
            '--tables' => implode(',', range(1, self::TEST_TABLES)),
            '--namespace' => 'App\\Models',
            '--batch-size' => 1,
        ])->assertSuccessful();

        return microtime(true) - $startTime;
    }
}