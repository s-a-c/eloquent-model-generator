<?php

namespace SAC\EloquentModelGenerator\Tests\Performance\Stress;

use SAC\EloquentModelGenerator\Tests\TestCase;
use SAC\EloquentModelGenerator\Tests\Support\Traits\WithTestTables;
use SAC\EloquentModelGenerator\Tests\Support\Traits\WithPerformanceTests;
use SAC\EloquentModelGenerator\Contracts\ModelGeneratorService;
use SAC\EloquentModelGenerator\Contracts\ParallelModelGeneratorService;
use SAC\EloquentModelGenerator\Services\Benchmark;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ModelGeneratorStressTest extends TestCase {
    use WithTestTables, WithPerformanceTests;

    private ModelGeneratorService $service;
    private ParallelModelGeneratorService $parallelService;
    private array $stressTables = [];

    protected function setUp(): void {
        parent::setUp();

        $this->service = app(ModelGeneratorService::class);
        $this->parallelService = app(ParallelModelGeneratorService::class);

        $this->createStressTables();
    }

    private function createStressTables(): void {
        // Create 50 tables with 20 columns each
        for ($i = 0; $i < 50; $i++) {
            $tableName = "stress_table_{$i}";
            $this->stressTables[] = $tableName;

            $columns = [
                'id' => 'id',
                'created_at' => 'timestamp',
                'updated_at' => 'timestamp',
                'deleted_at' => 'timestamp:nullable'
            ];

            // Add various column types
            for ($j = 0; $j < 20; $j++) {
                $type = $j % 5;
                $columnName = "field_{$j}";

                switch ($type) {
                    case 0:
                        $columns[$columnName] = 'string:nullable';
                        break;
                    case 1:
                        $columns[$columnName] = 'integer:nullable';
                        break;
                    case 2:
                        $columns[$columnName] = 'json:nullable';
                        break;
                    case 3:
                        $columns[$columnName] = 'timestamp:nullable';
                        break;
                    case 4:
                        $columns[$columnName] = 'decimal:8,2:nullable';
                        break;
                }
            }

            $this->createTestTable($tableName, $columns);
        }
    }

    /** @test */
    public function testuhandles_concurrent_database_load(): void {
        $maxConnections = 5;
        $totalOperations = 20;
        $activeConnections = 0;
        $maxObservedConnections = 0;
        $errors = 0;

        // Monitor connection pool
        DB::listen(function ($query) use (&$activeConnections, &$maxObservedConnections) {
            $activeConnections++;
            $maxObservedConnections = max($maxObservedConnections, $activeConnections);
            usleep(10000); // Simulate load
            $activeConnections--;
        });

        $this->assertPerformanceConstraints(
            maxDurationMs: 5000,
            maxMemoryBytes: 200 * 1024 * 1024,
            operation: function () use ($totalOperations, &$errors) {
                for ($i = 0; $i < $totalOperations; $i++) {
                    try {
                        $this->service->generateModel(
                            $this->stressTables[$i % count($this->stressTables)],
                            [
                                'namespace' => 'App\\Domain\\Models',
                                'output_path' => storage_path('app/Domain/Models')
                            ]
                        );
                    } catch (\Exception $e) {
                        $errors++;
                    }
                }
            }
        );

        $this->assertLessThanOrEqual(
            $maxConnections,
            $maxObservedConnections,
            'Should not exceed maximum database connections'
        );

        $this->assertEquals(
            0,
            $errors,
            'Should handle all operations without errors'
        );
    }

    /** @test */
    public function testuhandles_large_scale_model_generation(): void {
        $this->assertPerformanceConstraints(
            maxDurationMs: count($this->stressTables) * 200,
            maxMemoryBytes: 512 * 1024 * 1024,
            operation: fn() => $this->parallelService->generateModels($this->stressTables, [
                'namespace' => 'App\\Domain\\Models',
                'output_path' => storage_path('app/Domain/Models'),
                'concurrency' => 4
            ]),
            durationMessage: 'Large scale generation should average less than 200ms per model',
            memoryMessage: 'Memory usage should stay under 512MB for large scale generation'
        );
    }

    /** @test */
    public function testumaintains_performance_under_continuous_load(): void {
        $duration = 30; // 30 seconds of continuous load
        $startTime = microtime(true);
        $operations = 0;
        $errors = 0;

        while (microtime(true) - $startTime < $duration) {
            try {
                $this->service->generateModel(
                    $this->stressTables[$operations % count($this->stressTables)],
                    [
                        'namespace' => 'App\\Domain\\Models',
                        'output_path' => storage_path('app/Domain/Models')
                    ]
                );
                $operations++;
            } catch (\Exception $e) {
                $errors++;
            }
        }

        $operationsPerSecond = $operations / $duration;

        $this->assertGreaterThan(
            5,
            $operationsPerSecond,
            'Should maintain at least 5 operations per second under continuous load'
        );

        $this->assertLessThan(
            $operations * 0.01, // Allow 1% error rate
            $errors,
            'Error rate should be less than 1% under continuous load'
        );
    }

    protected function tearDown(): void {
        foreach ($this->stressTables as $table) {
            Schema::dropIfExists($table);
        }
        parent::tearDown();
    }
}
