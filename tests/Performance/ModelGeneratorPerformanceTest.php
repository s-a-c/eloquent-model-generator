<?php

namespace SAC\EloquentModelGenerator\Tests\Performance;

use SAC\EloquentModelGenerator\Tests\TestCase;
use SAC\EloquentModelGenerator\Contracts\ModelGeneratorService;
use SAC\EloquentModelGenerator\Contracts\ParallelModelGeneratorService;
use SAC\EloquentModelGenerator\Config\ModelGeneratorConfig;
use SAC\EloquentModelGenerator\Services\Benchmark;
use SAC\EloquentModelGenerator\ValueObjects\BenchmarkResult;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;

class ModelGeneratorPerformanceTest extends TestCase {
    private ModelGeneratorService $service;
    private ParallelModelGeneratorService $parallelService;
    private array $tables = [];
    private const TABLE_COUNT = 50;
    private const COLUMN_COUNT = 20;

    protected function setUp(): void {
        parent::setUp();

        $this->service = app(ModelGeneratorService::class);
        $this->parallelService = app(ParallelModelGeneratorService::class);

        // Create test tables
        $this->createTestTables();
    }

    private function createTestTables(): void {
        for ($i = 0; $i < self::TABLE_COUNT; $i++) {
            $tableName = "test_table_{$i}";
            $this->tables[] = $tableName;

            Schema::create($tableName, function (Blueprint $table) {
                $table->id();

                for ($j = 0; $j < self::COLUMN_COUNT; $j++) {
                    $table->string("column_{$j}")->nullable();
                }

                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    /** @test */
    public function it_measures_single_model_generation_performance(): void {
        $benchmark = new Benchmark();

        $result = $benchmark->measure(function () {
            return $this->service->generateModel($this->tables[0], [
                'namespace' => 'App\\Models',
                'output_path' => storage_path('app/models')
            ]);
        });

        $this->assertLessThan(
            1000,
            $result->getDurationMs(),
            'Single model generation should take less than 1 second'
        );
        $this->assertLessThan(
            50 * 1024 * 1024,
            $result->getMemoryPeakBytes(),
            'Memory usage should be less than 50MB'
        );
    }

    /** @test */
    public function it_measures_batch_model_generation_performance(): void {
        $benchmark = new Benchmark();

        $result = $benchmark->measure(function () {
            return $this->service->generateBatch($this->tables, [
                'namespace' => 'App\\Models',
                'output_path' => storage_path('app/models')
            ]);
        });

        $averageTimePerModel = $result->getDurationMs() / count($this->tables);

        $this->assertLessThan(
            500,
            $averageTimePerModel,
            'Average time per model in batch should be less than 500ms'
        );
        $this->assertLessThan(
            100 * 1024 * 1024,
            $result->getMemoryPeakBytes(),
            'Memory usage should be less than 100MB for batch processing'
        );
    }

    /** @test */
    public function it_measures_parallel_model_generation_performance(): void {
        $benchmark = new Benchmark();

        $result = $benchmark->measure(function () {
            return $this->parallelService->generateModels($this->tables, [
                'namespace' => 'App\\Models',
                'output_path' => storage_path('app/models'),
                'concurrency' => 4
            ]);
        });

        $averageTimePerModel = $result->getDurationMs() / count($this->tables);

        $this->assertLessThan(
            200,
            $averageTimePerModel,
            'Average time per model in parallel processing should be less than 200ms'
        );
        $this->assertLessThan(
            150 * 1024 * 1024,
            $result->getMemoryPeakBytes(),
            'Memory usage should be less than 150MB for parallel processing'
        );
    }

    /** @test */
    public function it_measures_cache_performance(): void {
        // First run to warm up cache
        $this->service->generateModel($this->tables[0], [
            'namespace' => 'App\\Models',
            'output_path' => storage_path('app/models')
        ]);

        $benchmark = new Benchmark();

        $result = $benchmark->measure(function () {
            return $this->service->generateModel($this->tables[0], [
                'namespace' => 'App\\Models',
                'output_path' => storage_path('app/models')
            ]);
        });

        $this->assertLessThan(
            100,
            $result->getDurationMs(),
            'Cached model generation should take less than 100ms'
        );
        $this->assertLessThan(
            30 * 1024 * 1024,
            $result->getMemoryPeakBytes(),
            'Memory usage should be less than 30MB for cached generation'
        );
    }

    /** @test */
    public function it_detects_memory_leaks(): void {
        $iterations = 10;
        $memoryReadings = [];

        for ($i = 0; $i < $iterations; $i++) {
            $benchmark = new Benchmark();
            $result = $benchmark->measure(function () {
                return $this->service->generateModel($this->tables[0], [
                    'namespace' => 'App\\Models',
                    'output_path' => storage_path('app/models')
                ]);
            });

            $memoryReadings[] = $result->getMemoryPeakBytes();

            // Clean up after each iteration
            $modelPath = storage_path('app/models');
            if (is_dir($modelPath)) {
                array_map('unlink', glob("$modelPath/*.*"));
            }
        }

        // Calculate memory growth rate
        $memoryGrowth = end($memoryReadings) - reset($memoryReadings);
        $averageGrowthPerIteration = $memoryGrowth / ($iterations - 1);

        $this->assertLessThan(
            1024 * 1024, // 1MB
            $averageGrowthPerIteration,
            'Memory usage should not grow significantly across iterations'
        );
    }

    /** @test */
    public function it_verifies_cache_hit_rate(): void {
        $iterations = 100;
        $cacheHits = 0;

        // First run to warm up cache
        $this->service->generateModel($this->tables[0], [
            'namespace' => 'App\\Models',
            'output_path' => storage_path('app/models')
        ]);

        for ($i = 0; $i < $iterations; $i++) {
            $benchmark = new Benchmark();
            $result = $benchmark->measure(function () {
                return $this->service->generateModel($this->tables[0], [
                    'namespace' => 'App\\Models',
                    'output_path' => storage_path('app/models')
                ]);
            });

            // If generation took less than 50ms, consider it a cache hit
            if ($result->getDurationMs() < 50) {
                $cacheHits++;
            }
        }

        $hitRate = ($cacheHits / $iterations) * 100;

        $this->assertGreaterThan(
            90,
            $hitRate,
            'Cache hit rate should be greater than 90%'
        );
    }

    /** @test */
    public function it_verifies_parallel_efficiency(): void {
        // First measure sequential time
        $benchmark = new Benchmark();
        $sequentialResult = $benchmark->measure(function () {
            return $this->service->generateBatch($this->tables, [
                'namespace' => 'App\\Models',
                'output_path' => storage_path('app/models')
            ]);
        });

        // Then measure parallel time with 4 workers
        $parallelResult = $benchmark->measure(function () {
            return $this->parallelService->generateModels($this->tables, [
                'namespace' => 'App\\Models',
                'output_path' => storage_path('app/models'),
                'concurrency' => 4
            ]);
        });

        // Calculate efficiency
        $speedup = $sequentialResult->getDurationMs() / $parallelResult->getDurationMs();
        $efficiency = ($speedup / 4) * 100; // 4 is the number of workers

        $this->assertGreaterThan(
            80,
            $efficiency,
            'Parallel efficiency should be greater than 80%'
        );
    }

    /** @test */
    public function it_handles_large_tables_efficiently(): void {
        // Create a large table with many columns
        $tableName = 'large_test_table';
        Schema::create($tableName, function (Blueprint $table) {
            $table->id();

            // Add 100 columns of different types
            for ($i = 0; $i < 100; $i++) {
                $type = $i % 5;
                switch ($type) {
                    case 0:
                        $table->string("string_col_{$i}")->nullable();
                        break;
                    case 1:
                        $table->integer("int_col_{$i}")->nullable();
                        break;
                    case 2:
                        $table->json("json_col_{$i}")->nullable();
                        break;
                    case 3:
                        $table->timestamp("timestamp_col_{$i}")->nullable();
                        break;
                    case 4:
                        $table->decimal("decimal_col_{$i}", 10, 2)->nullable();
                        break;
                }
            }

            $table->timestamps();
            $table->softDeletes();
        });

        $benchmark = new Benchmark();
        $result = $benchmark->measure(function () use ($tableName) {
            return $this->service->generateModel($tableName, [
                'namespace' => 'App\\Models',
                'output_path' => storage_path('app/models')
            ]);
        });

        $this->assertLessThan(
            2000,
            $result->getDurationMs(),
            'Large table model generation should take less than 2 seconds'
        );
        $this->assertLessThan(
            200 * 1024 * 1024,
            $result->getMemoryPeakBytes(),
            'Memory usage should be less than 200MB for large tables'
        );

        // Cleanup
        Schema::dropIfExists($tableName);
    }

    /** @test */
    public function it_handles_concurrent_access(): void {
        $concurrentRequests = 10;
        $results = [];
        $errors = 0;

        // Simulate concurrent requests using parallel processes
        for ($i = 0; $i < $concurrentRequests; $i++) {
            $benchmark = new Benchmark();
            try {
                $currentIndex = $i; // Capture the index in closure scope
                $result = $benchmark->measure(function () use ($currentIndex) {
                    return $this->service->generateModel($this->tables[0], [
                        'namespace' => 'App\\Models',
                        'output_path' => storage_path("app/models/concurrent_{$currentIndex}")
                    ]);
                });
                $results[] = $result;
            } catch (\Exception $e) {
                $errors++;
            }
        }

        $this->assertEquals(
            0,
            $errors,
            'Should handle concurrent access without errors'
        );

        // Verify response times are consistent
        $times = array_map(fn($r) => $r->getDurationMs(), $results);
        $avgTime = array_sum($times) / count($times);
        $maxDeviation = max(array_map(fn($t) => abs($t - $avgTime), $times));

        $this->assertLessThan(
            500, // 500ms deviation tolerance
            $maxDeviation,
            'Response times should be consistent across concurrent requests'
        );

        // Clean up concurrent directories
        for ($i = 0; $i < $concurrentRequests; $i++) {
            $path = storage_path("app/models/concurrent_{$i}");
            if (is_dir($path)) {
                array_map('unlink', glob("$path/*.*"));
                rmdir($path);
            }
        }
    }

    /** @test */
    public function it_manages_database_connections_efficiently(): void {
        $maxConnections = 5;
        $totalOperations = 20;
        $activeConnections = 0;
        $maxObservedConnections = 0;
        $errors = 0;

        // Monitor connection pool usage
        DB::listen(function ($query) use (&$activeConnections, &$maxObservedConnections) {
            $activeConnections++;
            $maxObservedConnections = max($maxObservedConnections, $activeConnections);

            // Simulate query execution
            usleep(10000); // 10ms

            $activeConnections--;
        });

        // Run multiple model generations concurrently
        $benchmark = new Benchmark();
        $result = $benchmark->measure(function () use ($totalOperations, &$errors) {
            $promises = [];
            for ($i = 0; $i < $totalOperations; $i++) {
                try {
                    $this->service->generateModel($this->tables[$i % count($this->tables)], [
                        'namespace' => 'App\\Models',
                        'output_path' => storage_path('app/models')
                    ]);
                } catch (\Exception $e) {
                    $errors++;
                }
            }
        });

        $this->assertLessThanOrEqual(
            $maxConnections,
            $maxObservedConnections,
            'Should not exceed maximum database connections'
        );

        $this->assertEquals(
            0,
            $errors,
            'Should handle all database operations without errors'
        );

        $this->assertLessThan(
            5000, // 5 seconds
            $result->getDurationMs(),
            'Should complete all database operations within time limit'
        );
    }

    /** @test */
    public function it_measures_template_rendering_performance(): void {
        // Create a complex model with many attributes and relationships
        $tableName = 'template_test_table';
        Schema::create($tableName, function (Blueprint $table) {
            $table->id();

            // Add various column types
            for ($i = 0; $i < 50; $i++) {
                $table->string("field_{$i}")->nullable();
            }

            // Add foreign keys for relationships
            for ($i = 0; $i < 10; $i++) {
                $table->foreignId("relation_{$i}_id")->nullable();
            }

            $table->timestamps();
            $table->softDeletes();
        });

        $benchmark = new Benchmark();

        // Measure template compilation time
        $result = $benchmark->measure(function () use ($tableName) {
            return $this->service->generateModel($tableName, [
                'namespace' => 'App\\Models',
                'output_path' => storage_path('app/models'),
                'with_relationships' => true,
                'with_validation' => true,
                'with_casts' => true
            ]);
        });

        $this->assertLessThan(
            500, // 500ms
            $result->getDurationMs(),
            'Template rendering should complete within 500ms'
        );

        $this->assertLessThan(
            50 * 1024 * 1024, // 50MB
            $result->getMemoryPeakBytes(),
            'Template rendering should use less than 50MB memory'
        );

        // Verify template output
        $modelPath = storage_path("app/models/{$tableName}.php");
        $this->assertFileExists($modelPath);
        $content = file_get_contents($modelPath);

        // Check for expected template sections
        $this->assertStringContainsString('namespace SAC\EloquentModelGenerator\Tests\Performance;', $content);
        $this->assertStringContainsString('use Illuminate\\Database\\Eloquent\\Model;', $content);
        $this->assertStringContainsString('protected $fillable', $content);
        $this->assertStringContainsString('protected $casts', $content);

        // Cleanup
        Schema::dropIfExists($tableName);
    }

    /** @test */
    public function it_measures_schema_analysis_performance(): void {
        // Create tables with complex relationships
        $tables = [
            'categories' => function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->timestamps();
            },
            'products' => function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->foreignId('category_id')->constrained();
                $table->timestamps();
            },
            'tags' => function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->timestamps();
            },
            'product_tag' => function (Blueprint $table) {
                $table->id();
                $table->foreignId('product_id')->constrained();
                $table->foreignId('tag_id')->constrained();
                $table->timestamps();
            }
        ];

        // Create the tables in the correct order for foreign key constraints
        Schema::create('categories', $tables['categories']);
        Schema::create('products', $tables['products']);
        Schema::create('tags', $tables['tags']);
        Schema::create('product_tag', $tables['product_tag']);

        $benchmark = new Benchmark();

        // Measure schema analysis time
        $result = $benchmark->measure(function () use ($tables) {
            return $this->service->generateBatch(array_keys($tables), [
                'namespace' => 'App\\Models',
                'output_path' => storage_path('app/models'),
                'with_relationships' => true
            ]);
        });

        $averageTimePerTable = $result->getDurationMs() / count($tables);

        $this->assertLessThan(
            200, // 200ms per table
            $averageTimePerTable,
            'Schema analysis should complete within 200ms per table'
        );

        $this->assertLessThan(
            100 * 1024 * 1024, // 100MB
            $result->getMemoryPeakBytes(),
            'Schema analysis should use less than 100MB memory'
        );

        // Verify relationship detection
        $modelPaths = array_map(function ($table) {
            return storage_path("app/models/" . ucfirst($table) . ".php");
        }, array_keys($tables));

        foreach ($modelPaths as $path) {
            $this->assertFileExists($path);
            $content = file_get_contents($path);

            if (strpos($content, 'Product') !== false) {
                $this->assertStringContainsString('belongsTo(Category::class', $content);
                $this->assertStringContainsString('belongsToMany(Tag::class', $content);
            }
            if (strpos($content, 'Category') !== false) {
                $this->assertStringContainsString('hasMany(Product::class', $content);
            }
            if (strpos($content, 'Tag') !== false) {
                $this->assertStringContainsString('belongsToMany(Product::class', $content);
            }
        }

        // Cleanup in reverse order for foreign key constraints
        Schema::dropIfExists('product_tag');
        Schema::dropIfExists('products');
        Schema::dropIfExists('tags');
        Schema::dropIfExists('categories');
    }

    protected function tearDown(): void {
        // Drop test tables
        foreach ($this->tables as $table) {
            Schema::dropIfExists($table);
        }

        // Clean up generated files
        $modelPath = storage_path('app/models');
        if (is_dir($modelPath)) {
            array_map('unlink', glob("$modelPath/*.*"));
            rmdir($modelPath);
        }

        parent::tearDown();
    }
}
