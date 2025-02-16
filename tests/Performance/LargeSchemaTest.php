<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests\Performance;

use Orchestra\Testbench\TestCase;
use SAC\EloquentModelGenerator\Commands\GenerateCommand;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LargeSchemaTest extends TestCase {
    private const LARGE_TABLE_COUNT = 100;
    private const COLUMNS_PER_TABLE = 50;
    private const FOREIGN_KEYS_PER_TABLE = 5;

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

        // Create large number of tables
        $this->createLargeSchema();
    }

    private function createLargeSchema(): void {
        // Create tables with many columns and relationships
        for ($i = 1; $i <= self::LARGE_TABLE_COUNT; $i++) {
            $tableName = "table_{$i}";

            $columns = [];
            $columns[] = "id INTEGER PRIMARY KEY AUTOINCREMENT";

            // Add regular columns
            for ($j = 1; $j <= self::COLUMNS_PER_TABLE; $j++) {
                $columnType = $this->getRandomColumnType();
                $columns[] = "column_{$j} {$columnType}";
            }

            // Add foreign key columns
            for ($k = 1; $k <= self::FOREIGN_KEYS_PER_TABLE; $k++) {
                $referencedTable = random_int(1, self::LARGE_TABLE_COUNT);
                if ($referencedTable !== $i) {
                    $columns[] = "fk_{$k}_id INTEGER";
                    $columns[] = "FOREIGN KEY (fk_{$k}_id) REFERENCES table_{$referencedTable}(id)";
                }
            }

            DB::statement("CREATE TABLE {$tableName} (" . implode(", ", $columns) . ")");
        }
    }

    private function getRandomColumnType(): string {
        $types = [
            'TEXT',
            'INTEGER',
            'REAL',
            'BLOB',
            'BOOLEAN',
            'TIMESTAMP',
        ];

        return $types[array_rand($types)];
    }

    public function testLargeSchemaGeneration(): void {
        $startTime = microtime(true);
        $startMemory = memory_get_usage();

        // Generate models for all tables
        for ($i = 1; $i <= self::LARGE_TABLE_COUNT; $i++) {
            $this->artisan('model:generate', [
                'table' => "table_{$i}",
                '--namespace' => 'App\\Models',
            ])->assertSuccessful();
        }

        $endTime = microtime(true);
        $endMemory = memory_get_usage();

        $executionTime = $endTime - $startTime;
        $memoryUsage = $endMemory - $startMemory;

        // Assert performance metrics
        $this->assertLessThan(300, $executionTime, 'Generation took too long');
        $this->assertLessThan(100 * 1024 * 1024, $memoryUsage, 'Memory usage too high');
    }

    public function testLargeSchemaAnalysis(): void {
        $startTime = microtime(true);
        $startMemory = memory_get_usage();

        // Analyze all tables
        for ($i = 1; $i <= self::LARGE_TABLE_COUNT; $i++) {
            $this->artisan('model:analyze', [
                'table' => "table_{$i}",
                '--with-relationships' => true,
            ])->assertSuccessful();
        }

        $endTime = microtime(true);
        $endMemory = memory_get_usage();

        $executionTime = $endTime - $startTime;
        $memoryUsage = $endMemory - $startMemory;

        // Assert performance metrics
        $this->assertLessThan(60, $executionTime, 'Analysis took too long');
        $this->assertLessThan(50 * 1024 * 1024, $memoryUsage, 'Memory usage too high');
    }

    public function testBatchProcessing(): void {
        $startTime = microtime(true);
        $startMemory = memory_get_usage();

        // Generate all models in batch mode
        $tables = array_map(fn($i) => "table_{$i}", range(1, self::LARGE_TABLE_COUNT));

        $this->artisan('model:generate', [
            '--tables' => implode(',', $tables),
            '--namespace' => 'App\\Models',
            '--batch' => true,
        ])->assertSuccessful();

        $endTime = microtime(true);
        $endMemory = memory_get_usage();

        $executionTime = $endTime - $startTime;
        $memoryUsage = $endMemory - $startMemory;

        // Assert batch processing is faster than individual processing
        $this->assertLessThan(120, $executionTime, 'Batch processing took too long');
        $this->assertLessThan(75 * 1024 * 1024, $memoryUsage, 'Memory usage too high');
    }

    public function testMemoryLeaks(): void {
        $memoryReadings = [];

        // Generate models multiple times to check for memory leaks
        for ($i = 0; $i < 5; $i++) {
            $startMemory = memory_get_usage(true);

            $this->artisan('model:generate', [
                'table' => "table_1",
                '--namespace' => 'App\\Models',
            ])->assertSuccessful();

            // Force garbage collection
            gc_collect_cycles();

            $endMemory = memory_get_usage(true);
            $memoryReadings[] = $endMemory - $startMemory;
        }

        // Check that memory usage doesn't increase significantly
        $maxDiff = max($memoryReadings) - min($memoryReadings);
        $this->assertLessThan(1024 * 1024, $maxDiff, 'Possible memory leak detected');
    }

    public function testConcurrentProcessing(): void {
        $startTime = microtime(true);

        // Simulate concurrent model generation
        $processes = [];
        for ($i = 1; $i <= 5; $i++) {
            $processes[] = $this->artisan('model:generate', [
                'table' => "table_{$i}",
                '--namespace' => 'App\\Models',
                '--async' => true,
            ])->assertSuccessful();
        }

        // Wait for all processes to complete
        foreach ($processes as $process) {
            $process->wait();
        }

        $executionTime = microtime(true) - $startTime;

        // Assert concurrent processing is efficient
        $this->assertLessThan(30, $executionTime, 'Concurrent processing took too long');
    }

    public function testResourceUsage(): void {
        $startTime = microtime(true);
        $startMemory = memory_get_usage();

        // Generate models with resource monitoring
        for ($i = 1; $i <= 10; $i++) {
            $this->artisan('model:generate', [
                'table' => "table_{$i}",
                '--namespace' => 'App\\Models',
                '--monitor-resources' => true,
            ])->assertSuccessful();

            $metrics = $this->app['model-generator.metrics'];

            // Assert CPU usage
            $this->assertLessThan(80, $metrics->getCpuUsage(), 'CPU usage too high');

            // Assert I/O operations
            $this->assertLessThan(1000, $metrics->getIoOperations(), 'Too many I/O operations');

            // Assert database connections
            $this->assertLessThan(5, $metrics->getActiveConnections(), 'Too many active connections');
        }

        $endTime = microtime(true);
        $endMemory = memory_get_usage();

        // Assert overall resource usage
        $this->assertLessThan(60, $endTime - $startTime, 'Processing took too long');
        $this->assertLessThan(50 * 1024 * 1024, $endMemory - $startMemory, 'Memory usage too high');
    }
}