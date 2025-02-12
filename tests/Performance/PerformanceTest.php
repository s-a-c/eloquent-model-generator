<?php

namespace SAC\EloquentModelGenerator\Tests\Performance;

use SAC\EloquentModelGenerator\Tests\TestCase;
use SAC\EloquentModelGenerator\Services\Benchmarking\PerformanceBenchmark;
use SAC\EloquentModelGenerator\Contracts\ModelGeneratorService;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

/**
 * Performance Tests
 *
 * @package SAC\EloquentModelGenerator\Tests\Performance
 * @group performance
 */
class PerformanceTest extends TestCase {
    private PerformanceBenchmark $benchmark;
    private ModelGeneratorService $service;

    protected function setUp(): void {
        parent::setUp();
        $this->benchmark = new PerformanceBenchmark();
        $this->service = $this->app->make(ModelGeneratorService::class);

        // Enable query logging for benchmarking
        DB::enableQueryLog();
    }

    /**
     * @test
     * @testdox Generates multiple models efficiently
     */
    public function it_handles_multiple_models_efficiently(): void {
        $start = microtime(true);

        for ($i = 1; $i <= 100; $i++) {
            $this->artisan('model:generate', [
                'table' => "table_{$i}",
            ])->assertSuccessful();
        }

        $end = microtime(true);
        $executionTime = ($end - $start);

        $this->assertLessThan(30, $executionTime, 'Generation took too long');
    }

    /** @test */
    public function it_maintains_performance_under_load(): void {
        $tables = $this->generateTestTables(100);

        $this->benchmark->startBenchmark('batch_generation');
        $results = $this->service->generateBatch($tables);
        $metrics = $this->benchmark->endBenchmark('batch_generation');

        $this->assertInstanceOf(Collection::class, $results);
        $this->assertCount(100, $results);
        $this->assertLessThan(60, $metrics['duration'], 'Generation took too long');
        $this->assertLessThan(512 * 1024 * 1024, $metrics['memory_peak'], 'Memory usage too high');
        $this->assertLessThan(1000, $metrics['queries'], 'Too many database queries');
    }

    /** @test */
    public function it_handles_large_relationships_efficiently(): void {
        $this->createTestSchema();

        $this->benchmark->startBenchmark('relationship_analysis');
        $result = $this->service->generateModel('users', [
            'relationships' => true,
            'depth' => 3,
        ]);
        $metrics = $this->benchmark->endBenchmark('relationship_analysis');

        $this->assertNotNull($result);
        $this->assertLessThan(5, $metrics['duration'], 'Relationship analysis too slow');
        $this->assertLessThan(100 * 1024 * 1024, $metrics['memory_peak'], 'Memory usage too high');
    }

    /** @test */
    public function it_caches_effectively(): void {
        $this->createTestSchema();

        // First run - no cache
        $this->benchmark->startBenchmark('uncached');
        $this->service->generateModel('users');
        $uncached = $this->benchmark->endBenchmark('uncached');

        // Second run - should use cache
        $this->benchmark->startBenchmark('cached');
        $this->service->generateModel('users');
        $cached = $this->benchmark->endBenchmark('cached');

        $this->assertLessThan(
            $uncached['duration'] * 0.5,
            $cached['duration'],
            'Cache not providing sufficient speedup'
        );
    }

    /** @test */
    public function it_handles_concurrent_generation_efficiently(): void {
        $tables = $this->generateTestTables(50);
        $startMemory = memory_get_usage(true);

        $results = collect($tables)->map(function ($table) {
            return $this->service->generateModel($table);
        });

        $memoryPeak = memory_get_peak_usage(true);
        $memoryUsage = $memoryPeak - $startMemory;

        $this->assertLessThan(
            512 * 1024 * 1024, // 512MB
            $memoryUsage,
            'Memory usage exceeded limit'
        );
    }

    private function generateTestTables(int $count): array {
        return array_map(fn($i) => "test_table_{$i}", range(1, $count));
    }

    private function createTestSchema(): void {
        // Create test tables with relationships
        Schema::create('users', function ($table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('posts', function ($table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('title');
            $table->timestamps();
        });

        Schema::create('comments', function ($table) {
            $table->id();
            $table->foreignId('post_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->text('content');
            $table->timestamps();
        });
    }

    protected function tearDown(): void {
        // Clean up test tables
        Schema::dropIfExists('comments');
        Schema::dropIfExists('posts');
        Schema::dropIfExists('users');

        parent::tearDown();
    }
}
