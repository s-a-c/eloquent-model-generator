<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests\Integration\SQLite;

use Orchestra\Testbench\TestCase;
use SAC\EloquentModelGenerator\Services\Schema\SQLiteSchemaAnalyzer;
use SAC\EloquentModelGenerator\Services\TypeMapping\SQLiteTypeMapper;
use SAC\EloquentModelGenerator\Services\Relationships\SQLiteRelationshipDetector;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * SQLite Integration Test Suite
 *
 * Tests the complete SQLite support functionality with a real database,
 * including schema analysis, type mapping, and relationship detection.
 */
class SQLiteIntegrationTest extends TestCase {
    private SQLiteSchemaAnalyzer $schemaAnalyzer;
    private SQLiteTypeMapper $typeMapper;
    private SQLiteRelationshipDetector $relationshipDetector;

    protected function setUp(): void {
        parent::setUp();

        // Configure SQLite
        config(['database.default' => 'sqlite']);
        config(['database.connections.sqlite.database' => ':memory:']);

        $this->schemaAnalyzer = new SQLiteSchemaAnalyzer(DB::connection());
        $this->typeMapper = new SQLiteTypeMapper();
        $this->relationshipDetector = new SQLiteRelationshipDetector(DB::connection());

        // Create test schema
        $this->createTestSchema();
    }

    protected function tearDown(): void {
        Schema::dropIfExists('comments');
        Schema::dropIfExists('post_tags');
        Schema::dropIfExists('posts');
        Schema::dropIfExists('tags');
        Schema::dropIfExists('profiles');
        Schema::dropIfExists('users');

        parent::tearDown();
    }

    private function createTestSchema(): void {
        // Create users table with various column types
        Schema::create('users', function ($table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->text('bio')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('points')->default(0);
            $table->decimal('balance', 10, 2)->nullable();
            $table->json('settings')->nullable();
            $table->timestamp('last_login_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        // Create profiles table (one-to-one)
        Schema::create('profiles', function ($table) {
            $table->id();
            $table->foreignId('user_id')->unique()->constrained();
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->json('preferences')->nullable();
            $table->timestamps();
        });

        // Create posts table (one-to-many)
        Schema::create('posts', function ($table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('title');
            $table->text('content');
            $table->json('metadata')->nullable();
            $table->boolean('is_published')->default(false);
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        // Create tags table
        Schema::create('tags', function ($table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->timestamps();
        });

        // Create post_tags pivot table (many-to-many)
        Schema::create('post_tags', function ($table) {
            $table->foreignId('post_id')->constrained();
            $table->foreignId('tag_id')->constrained();
            $table->primary(['post_id', 'tag_id']);
            $table->timestamps();
        });

        // Create comments table (polymorphic)
        Schema::create('comments', function ($table) {
            $table->id();
            $table->morphs('commentable');
            $table->foreignId('user_id')->constrained();
            $table->text('content');
            $table->boolean('is_approved')->default(false);
            $table->timestamps();
        });
    }

    /**
     * @test
     * @group integration
     */
    public function testCompleteSchemaAnalysis(): void {
        // Test users table schema
        $userSchema = $this->schemaAnalyzer->analyze('users');

        // Check column detection
        $this->assertArrayHasKey('columns', $userSchema);
        $this->assertCount(11, $userSchema['columns']);

        // Check column properties
        $this->assertTrue($userSchema['columns']['id']['primary']);
        $this->assertTrue($userSchema['columns']['email']['unique']);
        $this->assertTrue($userSchema['columns']['bio']['nullable']);
        $this->assertSame('boolean', $userSchema['columns']['is_active']['type']);
        $this->assertSame('json', $userSchema['columns']['settings']['type']);

        // Check relationships
        $this->assertArrayHasKey('relationships', $userSchema);
        $relationships = collect($userSchema['relationships']);
        $this->assertTrue($relationships->contains('type', 'hasOne'));
        $this->assertTrue($relationships->contains('type', 'hasMany'));
    }

    /**
     * @test
     * @group integration
     */
    public function testCompleteTypeMapping(): void {
        $userSchema = $this->schemaAnalyzer->analyze('users');

        foreach ($userSchema['columns'] as $name => $column) {
            $phpType = $this->typeMapper->mapToPhpType($column['type'], $column['nullable'] ?? false);
            $docType = $this->typeMapper->mapToDocType($column['type'], $column['nullable'] ?? false);
            $castType = $this->typeMapper->mapToCastType($column['type']);

            // Verify type mapping
            $this->assertNotNull($phpType);
            $this->assertNotNull($docType);

            // Verify specific types
            match ($name) {
                'id' => $this->assertSame('int', $phpType),
                'name' => $this->assertSame('string', $phpType),
                'is_active' => $this->assertSame('bool', $phpType),
                'settings' => $this->assertSame('array', $phpType),
                'last_login_at' => $this->assertSame('\Carbon\Carbon', $phpType),
                default => null,
            };
        }
    }

    /**
     * @test
     * @group integration
     */
    public function testCompleteRelationshipDetection(): void {
        // Test one-to-one relationships
        $userRelationships = $this->relationshipDetector->detect('users');
        $profileRelationships = $this->relationshipDetector->detect('profiles');

        $this->assertContainsRelationship($userRelationships, 'hasOne', 'profiles');
        $this->assertContainsRelationship($profileRelationships, 'belongsTo', 'users');

        // Test one-to-many relationships
        $postRelationships = $this->relationshipDetector->detect('posts');

        $this->assertContainsRelationship($userRelationships, 'hasMany', 'posts');
        $this->assertContainsRelationship($postRelationships, 'belongsTo', 'users');

        // Test many-to-many relationships
        $tagRelationships = $this->relationshipDetector->detect('tags');

        $this->assertContainsRelationship($postRelationships, 'belongsToMany', 'tags');
        $this->assertContainsRelationship($tagRelationships, 'belongsToMany', 'posts');

        // Test polymorphic relationships
        $commentRelationships = $this->relationshipDetector->detect('comments');

        $this->assertContainsRelationship($postRelationships, 'morphMany', 'comments');
        $this->assertContainsRelationship($commentRelationships, 'morphTo', 'commentable');
    }

    /**
     * @test
     * @group integration
     */
    public function testCompleteModelGeneration(): void {
        // Analyze schema
        $schema = $this->schemaAnalyzer->analyze('posts');

        // Get relationships
        $relationships = $this->relationshipDetector->detect('posts');

        // Verify schema completeness
        $this->assertArrayHasKey('columns', $schema);
        $this->assertArrayHasKey('relationships', $schema);

        // Verify column types
        foreach ($schema['columns'] as $column) {
            $this->assertNotNull($this->typeMapper->mapToPhpType($column['type']));
            $this->assertNotNull($this->typeMapper->mapToDocType($column['type']));
        }

        // Verify relationships
        $this->assertNotEmpty($relationships);
        $relationshipTypes = collect($relationships)->pluck('type')->toArray();
        $this->assertContains('belongsTo', $relationshipTypes);
        $this->assertContains('belongsToMany', $relationshipTypes);
        $this->assertContains('morphMany', $relationshipTypes);
    }

    /**
     * Helper method to assert relationship existence
     */
    private function assertContainsRelationship(array $relationships, string $type, string $table): void {
        $found = false;
        foreach ($relationships as $relationship) {
            if ($relationship['type'] === $type && ($relationship['table'] === $table || $relationship['name'] === $table)) {
                $found = true;
                break;
            }
        }
        $this->assertTrue($found, "Relationship of type {$type} with table {$table} not found");
    }
}