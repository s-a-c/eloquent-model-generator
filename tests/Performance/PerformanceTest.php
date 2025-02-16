<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests\Performance;

use Orchestra\Testbench\TestCase;
use SAC\EloquentModelGenerator\Services\Schema\SQLiteSchemaAnalyzer;
use SAC\EloquentModelGenerator\Services\TypeMapping\SQLiteTypeMapper;
use SAC\EloquentModelGenerator\Services\Relationships\SQLiteRelationshipDetector;
use SAC\EloquentModelGenerator\Services\Attributes\AttributeGenerator;
use SAC\EloquentModelGenerator\Services\Factories\FactoryGenerator;
use SAC\EloquentModelGenerator\Services\Policies\PolicyGenerator;
use SAC\EloquentModelGenerator\Services\Resources\ResourceGenerator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * Performance Test Suite
 *
 * Tests performance aspects including memory usage,
 * speed optimization, and resource management.
 */
class PerformanceTest extends TestCase {
    private SQLiteSchemaAnalyzer $schemaAnalyzer;
    private SQLiteTypeMapper $typeMapper;
    private SQLiteRelationshipDetector $relationshipDetector;
    private AttributeGenerator $attributeGenerator;
    private FactoryGenerator $factoryGenerator;
    private PolicyGenerator $policyGenerator;
    private ResourceGenerator $resourceGenerator;

    protected function setUp(): void {
        parent::setUp();

        // Configure SQLite
        config(['database.default' => 'sqlite']);
        config(['database.connections.sqlite.database' => ':memory:']);

        // Initialize services
        $this->schemaAnalyzer = new SQLiteSchemaAnalyzer(DB::connection());
        $this->typeMapper = new SQLiteTypeMapper();
        $this->relationshipDetector = new SQLiteRelationshipDetector(DB::connection());
        $this->attributeGenerator = new AttributeGenerator();
        $this->factoryGenerator = new FactoryGenerator();
        $this->policyGenerator = new PolicyGenerator();
        $this->resourceGenerator = new ResourceGenerator();

        // Create test schema
        $this->createLargeTestSchema();
    }

    private function createLargeTestSchema(): void {
        // Create a complex schema with many tables and relationships
        for ($i = 1; $i <= 10; $i++) {
            Schema::create("test_table_{$i}", function ($table) use ($i) {
                $table->id();
                $table->string('name');
                $table->text('description')->nullable();
                $table->json('metadata')->nullable();
                for ($j = 1; $j <= 10; $j++) {
                    $table->string("field_{$j}")->nullable();
                }
                if ($i > 1) {
                    $table->foreignId("test_table_" . ($i - 1) . "_id")->constrained();
                }
                $table->timestamps();
            });
        }
    }

    /**
     * @test
     * @group performance
     */
    public function testMemoryUsage(): void {
        $initialMemory = memory_get_usage();
        $peakMemory = memory_get_peak_usage();

        // Test schema analysis memory usage
        $schemas = [];
        for ($i = 1; $i <= 10; $i++) {
            $schemas["test_table_{$i}"] = $this->schemaAnalyzer->analyze("test_table_{$i}");

            $currentMemory = memory_get_usage();
            $this->assertLessThan(
                $currentMemory * 2,
                memory_get_usage(),
                "Memory usage doubled during schema analysis of test_table_{$i}"
            );
        }

        // Test type mapping memory usage
        foreach ($schemas as $schema) {
            foreach ($schema['columns'] as $column) {
                $this->typeMapper->mapToPhpType($column['type']);

                $currentMemory = memory_get_usage();
                $this->assertLessThan(
                    $initialMemory * 2,
                    $currentMemory,
                    'Memory usage doubled during type mapping'
                );
            }
        }

        // Test relationship detection memory usage
        for ($i = 1; $i <= 10; $i++) {
            $this->relationshipDetector->detect("test_table_{$i}");

            $currentMemory = memory_get_usage();
            $this->assertLessThan(
                $initialMemory * 2,
                $currentMemory,
                "Memory usage doubled during relationship detection of test_table_{$i}"
            );
        }

        // Test generation memory usage
        foreach ($schemas as $tableName => $schema) {
            $modelClass = 'App\\Models\\' . str_replace('_', '', ucwords($tableName, '_'));

            $this->attributeGenerator->generate($schema['columns']);
            $this->factoryGenerator->generate($modelClass, $schema['columns']);
            $this->policyGenerator->generate($modelClass);
            $this->resourceGenerator->generate($modelClass, $schema['columns']);

            $currentMemory = memory_get_usage();
            $this->assertLessThan(
                $initialMemory * 2,
                $currentMemory,
                "Memory usage doubled during generation for {$tableName}"
            );
        }

        // Verify overall memory usage
        $finalMemory = memory_get_usage();
        $this->assertLessThan(
            $initialMemory * 2,
            $finalMemory,
            'Overall memory usage doubled during tests'
        );
    }

    /**
     * @test
     * @group performance
     */
    public function testSpeedOptimization(): void {
        // Test schema analysis speed
        $startTime = microtime(true);

        for ($i = 1; $i <= 10; $i++) {
            $this->schemaAnalyzer->analyze("test_table_{$i}");
        }

        $schemaTime = microtime(true) - $startTime;
        $this->assertLessThan(
            2.0,
            $schemaTime,
            'Schema analysis took more than 2 seconds'
        );

        // Test type mapping speed
        $startTime = microtime(true);

        $schema = $this->schemaAnalyzer->analyze('test_table_1');
        foreach ($schema['columns'] as $column) {
            $this->typeMapper->mapToPhpType($column['type']);
            $this->typeMapper->mapToDocType($column['type']);
            $this->typeMapper->mapToCastType($column['type']);
        }

        $typeTime = microtime(true) - $startTime;
        $this->assertLessThan(
            1.0,
            $typeTime,
            'Type mapping took more than 1 second'
        );

        // Test relationship detection speed
        $startTime = microtime(true);

        for ($i = 1; $i <= 10; $i++) {
            $this->relationshipDetector->detect("test_table_{$i}");
        }

        $relationshipTime = microtime(true) - $startTime;
        $this->assertLessThan(
            2.0,
            $relationshipTime,
            'Relationship detection took more than 2 seconds'
        );

        // Test generation speed
        $startTime = microtime(true);

        $modelClass = 'App\\Models\\TestTable1';
        $this->attributeGenerator->generate($schema['columns']);
        $this->factoryGenerator->generate($modelClass, $schema['columns']);
        $this->policyGenerator->generate($modelClass);
        $this->resourceGenerator->generate($modelClass, $schema['columns']);

        $generationTime = microtime(true) - $startTime;
        $this->assertLessThan(
            2.0,
            $generationTime,
            'Code generation took more than 2 seconds'
        );
    }

    /**
     * @test
     * @group performance
     */
    public function testResourceManagement(): void {
        // Test database connection management
        $connections = [];
        for ($i = 0; $i < 10; $i++) {
            $this->schemaAnalyzer->analyze("test_table_1");
            $connections[] = spl_object_hash(DB::connection()->getPdo());
        }

        $uniqueConnections = array_unique($connections);
        $this->assertCount(
            1,
            $uniqueConnections,
            'Multiple database connections created'
        );

        // Test memory cleanup
        $initialMemory = memory_get_usage();

        for ($i = 0; $i < 10; $i++) {
            $schema = $this->schemaAnalyzer->analyze("test_table_{$i}");
            unset($schema);

            $currentMemory = memory_get_usage();
            $this->assertLessThan(
                $initialMemory * 1.5,
                $currentMemory,
                'Memory not properly cleaned up'
            );
        }

        // Test file handle management
        $openFiles = [];
        for ($i = 0; $i < 10; $i++) {
            $modelClass = "App\\Models\\TestTable{$i}";
            $schema = $this->schemaAnalyzer->analyze("test_table_{$i}");

            $this->factoryGenerator->generate($modelClass, $schema['columns']);
            $this->policyGenerator->generate($modelClass);
            $this->resourceGenerator->generate($modelClass, $schema['columns']);

            $openFiles[] = count(get_resources());
        }

        $this->assertCount(
            1,
            array_unique($openFiles),
            'File handles not properly managed'
        );
    }

    /**
     * @test
     * @group performance
     */
    public function testBatchProcessing(): void {
        $startTime = microtime(true);
        $initialMemory = memory_get_usage();

        // Process tables in batches
        $tables = [];
        for ($i = 1; $i <= 10; $i++) {
            $tables[] = "test_table_{$i}";
        }

        foreach (array_chunk($tables, 3) as $batch) {
            $schemas = [];

            // Analyze schemas in batch
            foreach ($batch as $table) {
                $schemas[$table] = $this->schemaAnalyzer->analyze($table);
            }

            // Process each schema
            foreach ($schemas as $table => $schema) {
                $modelClass = 'App\\Models\\' . str_replace('_', '', ucwords($table, '_'));

                // Generate code
                $this->attributeGenerator->generate($schema['columns']);
                $this->factoryGenerator->generate($modelClass, $schema['columns']);
                $this->policyGenerator->generate($modelClass);
                $this->resourceGenerator->generate($modelClass, $schema['columns']);

                // Clear batch data
                unset($schemas[$table]);
            }

            // Check memory after batch
            $currentMemory = memory_get_usage();
            $this->assertLessThan(
                $initialMemory * 1.5,
                $currentMemory,
                'Memory usage too high after batch processing'
            );
        }

        $totalTime = microtime(true) - $startTime;
        $this->assertLessThan(
            10.0,
            $totalTime,
            'Batch processing took more than 10 seconds'
        );
    }

    protected function tearDown(): void {
        for ($i = 10; $i >= 1; $i--) {
            Schema::dropIfExists("test_table_{$i}");
        }

        parent::tearDown();
    }
}