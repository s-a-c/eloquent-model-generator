<?php

namespace SAC\EloquentModelGenerator\Tests\Performance\EdgeCases;

use SAC\EloquentModelGenerator\Tests\TestCase;
use SAC\EloquentModelGenerator\Tests\Support\Traits\WithPerformanceTests;
use SAC\EloquentModelGenerator\Tests\Support\Traits\MeasurePerformance;
use SAC\EloquentModelGenerator\Contracts\ModelGeneratorService;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;

class PerformanceEdgeCaseTest extends TestCase {
    use WithPerformanceTests, MeasurePerformance;

    private ModelGeneratorService $service;

    protected function setUp(): void {
        parent::setUp();
        $this->service = app(ModelGeneratorService::class);
    }

    /** @test */
    public function it_handles_extremely_large_tables(): void {
        // Create a table with 1000 columns
        Schema::create('large_table', function (Blueprint $table) {
            $table->id();
            for ($i = 0; $i < 1000; $i++) {
                $table->string("field_{$i}")->nullable();
            }
            $table->timestamps();
        });

        $this->assertPerformanceConstraints(
            maxDurationMs: 5000, // 5 seconds
            maxMemoryBytes: 200 * 1024 * 1024, // 200MB
            operation: fn() => $this->service->generateModel('large_table'),
            durationMessage: 'Should handle large tables efficiently',
            memoryMessage: 'Memory usage should be reasonable for large tables'
        );
    }

    /** @test */
    public function it_handles_deep_relationship_chains(): void {
        // Create tables with deep relationships
        $this->createDeepRelationshipChain(10); // 10 levels deep

        $this->assertPerformanceConstraints(
            maxDurationMs: 3000,
            maxMemoryBytes: 150 * 1024 * 1024,
            operation: fn() => $this->service->generateModel('level_1', [
                'with_relationships' => true,
                'relationship_depth' => 10
            ]),
            durationMessage: 'Should handle deep relationship chains efficiently',
            memoryMessage: 'Memory usage should be reasonable for deep relationships'
        );
    }

    /** @test */
    public function it_handles_circular_relationships(): void {
        // Create tables with circular relationships
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('manager_id')->nullable()->constrained('users');
            $table->timestamps();
        });

        $this->assertPerformanceConstraints(
            maxDurationMs: 1000,
            maxMemoryBytes: 50 * 1024 * 1024,
            operation: fn() => $this->service->generateModel('users', [
                'with_relationships' => true
            ]),
            durationMessage: 'Should handle circular relationships efficiently',
            memoryMessage: 'Memory usage should be reasonable for circular relationships'
        );
    }

    /** @test */
    public function it_handles_concurrent_model_generation_under_load(): void {
        // Create multiple tables
        for ($i = 0; $i < 20; $i++) {
            Schema::create("concurrent_table_{$i}", function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->timestamps();
            });
        }

        // Simulate database load
        DB::listen(function ($query) {
            usleep(10000); // Add 10ms delay to each query
        });

        $tables = array_map(fn($i) => "concurrent_table_{$i}", range(0, 19));

        $this->assertPerformanceConstraints(
            maxDurationMs: 10000,
            maxMemoryBytes: 300 * 1024 * 1024,
            operation: function () use ($tables) {
                foreach ($tables as $table) {
                    $this->service->generateModel($table);
                }
            },
            durationMessage: 'Should handle concurrent generation under load',
            memoryMessage: 'Memory usage should be reasonable under load'
        );
    }

    /** @test */
    public function it_handles_rapid_successive_generations(): void {
        Schema::create('rapid_test', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        $this->assertMemoryStability(
            operation: fn() => $this->service->generateModel('rapid_test'),
            iterations: 100,
            maxGrowthMb: 0.5
        );
    }

    /** @test */
    public function it_handles_invalid_schema_gracefully(): void {
        // Create a table with potentially problematic column types
        Schema::create('edge_case_table', function (Blueprint $table) {
            $table->id();
            $table->string('name', 65535); // Extremely long string
            $table->json('data')->nullable(); // JSON data
            $table->binary('blob')->nullable(); // Binary data
            $table->timestamps();
        });

        $this->assertPerformanceConstraints(
            maxDurationMs: 2000,
            maxMemoryBytes: 100 * 1024 * 1024,
            operation: fn() => $this->service->generateModel('edge_case_table'),
            durationMessage: 'Should handle invalid schema gracefully',
            memoryMessage: 'Memory usage should be reasonable for invalid schema'
        );
    }

    /** @test */
    public function it_handles_memory_pressure(): void {
        // Create memory pressure
        $memoryHog = [];
        for ($i = 0; $i < 1000000; $i++) {
            $memoryHog[] = str_repeat('a', 100);
        }

        Schema::create('memory_test', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        $this->assertPerformanceConstraints(
            maxDurationMs: 2000,
            maxMemoryBytes: 50 * 1024 * 1024, // Additional memory usage should be limited
            operation: fn() => $this->service->generateModel('memory_test'),
            durationMessage: 'Should handle memory pressure gracefully',
            memoryMessage: 'Should limit additional memory usage under pressure'
        );

        unset($memoryHog); // Clean up
    }

    private function createDeepRelationshipChain(int $depth): void {
        for ($i = 1; $i <= $depth; $i++) {
            Schema::create("level_{$i}", function (Blueprint $table) use ($i) {
                $table->id();
                if ($i > 1) {
                    $table->foreignId("level_" . ($i - 1) . "_id")->constrained();
                }
                $table->string('name');
                $table->timestamps();
            });
        }
    }

    protected function tearDown(): void {
        // Clean up all test tables
        Schema::dropIfExists('large_table');
        Schema::dropIfExists('users');
        for ($i = 1; $i <= 10; $i++) {
            Schema::dropIfExists("level_{$i}");
        }
        for ($i = 0; $i < 20; $i++) {
            Schema::dropIfExists("concurrent_table_{$i}");
        }
        Schema::dropIfExists('rapid_test');
        Schema::dropIfExists('edge_case_table');
        Schema::dropIfExists('memory_test');

        parent::tearDown();
    }
}
