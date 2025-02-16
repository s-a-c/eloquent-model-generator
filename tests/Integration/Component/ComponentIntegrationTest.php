<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests\Integration\Component;

use Orchestra\Testbench\TestCase;
use SAC\EloquentModelGenerator\Services\Schema\SQLiteSchemaAnalyzer;
use SAC\EloquentModelGenerator\Services\TypeMapping\SQLiteTypeMapper;
use SAC\EloquentModelGenerator\Services\Relationships\SQLiteRelationshipDetector;
use SAC\EloquentModelGenerator\Services\Attributes\AttributeGenerator;
use SAC\EloquentModelGenerator\Services\Factories\FactoryGenerator;
use SAC\EloquentModelGenerator\Services\Policies\PolicyGenerator;
use SAC\EloquentModelGenerator\Services\Resources\ResourceGenerator;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * Component Integration Test Suite
 *
 * Tests component integration including service integration,
 * event handling, and cache integration.
 */
class ComponentIntegrationTest extends TestCase {
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
        $this->createTestSchema();
    }

    private function createTestSchema(): void {
        Schema::create('test_models', function ($table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->json('settings')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * @test
     * @group integration
     */
    public function testServiceIntegration(): void {
        // Analyze schema
        $schema = $this->schemaAnalyzer->analyze('test_models');
        $this->assertNotEmpty($schema['columns']);

        // Map types
        foreach ($schema['columns'] as $column) {
            $phpType = $this->typeMapper->mapToPhpType($column['type']);
            $this->assertNotEmpty($phpType);
        }

        // Detect relationships
        $relationships = $this->relationshipDetector->detect('test_models');
        $this->assertIsArray($relationships);

        // Generate attributes
        $attributes = $this->attributeGenerator->generate($schema['columns']);
        $this->assertArrayHasKey('accessors', $attributes);
        $this->assertArrayHasKey('mutators', $attributes);

        // Generate factory
        $factory = $this->factoryGenerator->generate('App\\Models\\TestModel', $schema['columns']);
        $this->assertStringContainsString('TestModelFactory', $factory);

        // Generate policy
        $policy = $this->policyGenerator->generate('App\\Models\\TestModel');
        $this->assertStringContainsString('TestModelPolicy', $policy);

        // Generate resource
        $resource = $this->resourceGenerator->generate('App\\Models\\TestModel', $schema['columns']);
        $this->assertStringContainsString('TestModelResource', $resource);
    }

    /**
     * @test
     * @group integration
     */
    public function testEventHandling(): void {
        $events = [];

        // Listen for schema analysis events
        Event::listen('schema.analyzing', function ($table) use (&$events) {
            $events[] = "Analyzing schema for table: {$table}";
        });

        Event::listen('schema.analyzed', function ($table, $schema) use (&$events) {
            $events[] = "Completed schema analysis for table: {$table}";
        });

        // Listen for generation events
        Event::listen('generating.attributes', function ($columns) use (&$events) {
            $events[] = "Generating attributes";
        });

        Event::listen('generating.factory', function ($modelClass) use (&$events) {
            $events[] = "Generating factory for: {$modelClass}";
        });

        // Perform operations
        $schema = $this->schemaAnalyzer->analyze('test_models');
        $this->attributeGenerator->generate($schema['columns']);
        $this->factoryGenerator->generate('App\\Models\\TestModel', $schema['columns']);

        // Verify events
        $this->assertNotEmpty($events);
        $this->assertCount(4, $events);
    }

    /**
     * @test
     * @group integration
     */
    public function testCacheIntegration(): void {
        // Cache schema analysis
        $cacheKey = 'schema_test_models';

        $schema = Cache::remember($cacheKey, 3600, function () {
            return $this->schemaAnalyzer->analyze('test_models');
        });

        $this->assertTrue(Cache::has($cacheKey));
        $this->assertEquals($schema, Cache::get($cacheKey));

        // Cache type mappings
        $typeMappings = Cache::remember('type_mappings', 3600, function () use ($schema) {
            $mappings = [];
            foreach ($schema['columns'] as $column) {
                $mappings[$column['name']] = $this->typeMapper->mapToPhpType($column['type']);
            }
            return $mappings;
        });

        $this->assertTrue(Cache::has('type_mappings'));
        $this->assertNotEmpty($typeMappings);

        // Cache relationships
        $relationships = Cache::remember('relationships_test_models', 3600, function () {
            return $this->relationshipDetector->detect('test_models');
        });

        $this->assertTrue(Cache::has('relationships_test_models'));
        $this->assertIsArray($relationships);
    }

    /**
     * @test
     * @group integration
     */
    public function testComponentInteractions(): void {
        // Test schema analyzer with type mapper
        $schema = $this->schemaAnalyzer->analyze('test_models');
        foreach ($schema['columns'] as $column) {
            $phpType = $this->typeMapper->mapToPhpType($column['type']);
            $castType = $this->typeMapper->mapToCastType($column['type']);

            $this->assertNotEmpty($phpType);
            $this->assertIsString($phpType);
        }

        // Test relationship detector with attribute generator
        $relationships = $this->relationshipDetector->detect('test_models');
        $attributes = $this->attributeGenerator->generate($schema['columns']);

        $this->assertIsArray($relationships);
        $this->assertArrayHasKey('accessors', $attributes);

        // Test factory generator with relationships
        $factory = $this->factoryGenerator->generate(
            'App\\Models\\TestModel',
            $schema['columns'],
            $relationships
        );

        $this->assertStringContainsString('TestModelFactory', $factory);
        $this->assertStringContainsString('definition', $factory);

        // Test resource generator with relationships
        $resource = $this->resourceGenerator->generate(
            'App\\Models\\TestModel',
            $schema['columns'],
            $relationships
        );

        $this->assertStringContainsString('TestModelResource', $resource);
        $this->assertStringContainsString('toArray', $resource);
    }

    /**
     * @test
     * @group integration
     */
    public function testErrorHandlingAcrossComponents(): void {
        // Test invalid schema analysis
        $this->expectException(\Exception::class);
        $this->schemaAnalyzer->analyze('nonexistent_table');

        // Test invalid type mapping
        $this->expectException(\Exception::class);
        $this->typeMapper->mapToPhpType('invalid_type');

        // Test invalid relationship detection
        $this->expectException(\Exception::class);
        $this->relationshipDetector->detect('nonexistent_table');

        // Test invalid attribute generation
        $this->expectException(\Exception::class);
        $this->attributeGenerator->generate([]);

        // Test invalid factory generation
        $this->expectException(\Exception::class);
        $this->factoryGenerator->generate('InvalidModel', []);

        // Test invalid policy generation
        $this->expectException(\Exception::class);
        $this->policyGenerator->generate('InvalidModel');

        // Test invalid resource generation
        $this->expectException(\Exception::class);
        $this->resourceGenerator->generate('InvalidModel', []);
    }

    protected function tearDown(): void {
        Schema::dropIfExists('test_models');
        Cache::flush();

        parent::tearDown();
    }
}