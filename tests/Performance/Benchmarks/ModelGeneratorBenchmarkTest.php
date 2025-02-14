<?php

namespace SAC\EloquentModelGenerator\Tests\Performance\Benchmarks;

use SAC\EloquentModelGenerator\Tests\TestCase;
use SAC\EloquentModelGenerator\Tests\Support\Traits\WithTestTables;
use SAC\EloquentModelGenerator\Tests\Support\Traits\WithPerformanceTests;
use SAC\EloquentModelGenerator\Contracts\ModelGeneratorService;
use SAC\EloquentModelGenerator\Contracts\ParallelModelGeneratorService;

class ModelGeneratorBenchmarkTest extends TestCase {
    use WithTestTables, WithPerformanceTests;

    private ModelGeneratorService $service;
    private ParallelModelGeneratorService $parallelService;

    protected function setUp(): void {
        parent::setUp();

        $this->service = app(ModelGeneratorService::class);
        $this->parallelService = app(ParallelModelGeneratorService::class);

        $this->createBasicTestTables();
        $this->createComplexTestTables();
    }

    /** @test */
    public function testumeets_single_model_performance_requirements(): void {
        $this->assertPerformanceConstraints(
            maxDurationMs: 1000,
            maxMemoryBytes: 50 * 1024 * 1024,
            operation: fn() => $this->service->generateModel('users', [
                'namespace' => 'App\\Domain\\Models',
                'output_path' => storage_path('app/Domain/Models')
            ]),
            durationMessage: 'Single model generation should take less than 1 second',
            memoryMessage: 'Memory usage should be less than 50MB'
        );
    }

    /** @test */
    public function testumeets_batch_performance_requirements(): void {
        $this->assertPerformanceConstraints(
            maxDurationMs: count($this->testTables) * 500,
            maxMemoryBytes: 100 * 1024 * 1024,
            operation: fn() => $this->service->generateBatch($this->testTables, [
                'namespace' => 'App\\Domain\\Models',
                'output_path' => storage_path('app/Domain/Models')
            ]),
            durationMessage: 'Batch generation should average less than 500ms per model',
            memoryMessage: 'Memory usage should be less than 100MB for batch processing'
        );
    }

    /** @test */
    public function testuachieves_target_parallel_efficiency(): void {
        $this->assertParallelEfficiency(
            sequentialOperation: fn() => $this->service->generateBatch($this->testTables, [
                'namespace' => 'App\\Domain\\Models',
                'output_path' => storage_path('app/Domain/Models')
            ]),
            parallelOperation: fn() => $this->parallelService->generateModels($this->testTables, [
                'namespace' => 'App\\Domain\\Models',
                'output_path' => storage_path('app/Domain/Models'),
                'concurrency' => 4
            ]),
            workerCount: 4,
            minEfficiencyPercent: 80
        );
    }

    /** @test */
    public function testumaintains_memory_stability(): void {
        $this->assertMemoryStability(
            operation: fn() => $this->service->generateModel('users', [
                'namespace' => 'App\\Domain\\Models',
                'output_path' => storage_path('app/Domain/Models')
            ]),
            iterations: 10,
            maxGrowthMb: 1.0
        );
    }

    /** @test */
    public function testuachieves_target_cache_hit_rate(): void {
        $this->assertCacheEffectiveness(
            operation: fn() => $this->service->generateModel('users', [
                'namespace' => 'App\\Domain\\Models',
                'output_path' => storage_path('app/Domain/Models')
            ]),
            iterations: 100,
            minHitRatePercent: 90,
            cacheHitThresholdMs: 50
        );
    }

    protected function tearDown(): void {
        $this->dropTestTables();
        parent::tearDown();
    }
}
