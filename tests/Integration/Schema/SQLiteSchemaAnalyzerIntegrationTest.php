<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests\Integration\Schema;

use Orchestra\Testbench\TestCase;
use SAC\EloquentModelGenerator\Services\Schema\SQLiteSchemaAnalyzer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * SQLite Schema Analyzer Integration Test
 *
 * Tests the SQLite schema analyzer with a real SQLite database,
 * verifying actual database interactions and schema analysis.
 */
class SQLiteSchemaAnalyzerIntegrationTest extends TestCase {
    private SQLiteSchemaAnalyzer $analyzer;

    protected function setUp(): void {
        parent::setUp();

        // Configure SQLite
        config(['database.default' => 'sqlite']);
        config(['database.connections.sqlite.database' => ':memory:']);

        $this->analyzer = new SQLiteSchemaAnalyzer(DB::connection());

        // Create test schema
        $this->createTestSchema();
    }

    protected function tearDown(): void {
        Schema::dropIfExists('comments');
        Schema::dropIfExists('posts');
        Schema::dropIfExists('role_user');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('profiles');
        Schema::dropIfExists('users');

        parent::tearDown();
    }

    private function createTestSchema(): void {
        // Create users table
        Schema::create('users', function ($table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->text('bio')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamp('last_login_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        // Create profiles table (one-to-one)
        Schema::create('profiles', function ($table) {
            $table->id();
            $table->foreignId('user_id')->unique()->constrained();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->timestamps();
        });

        // Create roles table (many-to-many)
        Schema::create('roles', function ($table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });

        // Create role_user pivot table
        Schema::create('role_user', function ($table) {
            $table->foreignId('user_id')->constrained();
            $table->foreignId('role_id')->constrained();
            $table->primary(['user_id', 'role_id']);
            $table->timestamps();
        });

        // Create posts table (one-to-many)
        Schema::create('posts', function ($table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('title');
            $table->text('content');
            $table->json('metadata')->nullable();
            $table->timestamps();
        });

        // Create comments table (polymorphic)
        Schema::create('comments', function ($table) {
            $table->id();
            $table->morphs('commentable');
            $table->foreignId('user_id')->constrained();
            $table->text('content');
            $table->timestamps();
        });
    }

    /**
     * @test
     * @group integration
     */
    public function testAnalyzeDetectsAllColumns(): void {
        $schema = $this->analyzer->analyze('users');

        $this->assertArrayHasKey('columns', $schema);
        $this->assertArrayHasKey('id', $schema['columns']);
        $this->assertArrayHasKey('name', $schema['columns']);
        $this->assertArrayHasKey('email', $schema['columns']);
        $this->assertArrayHasKey('bio', $schema['columns']);
        $this->assertArrayHasKey('is_active', $schema['columns']);
        $this->assertArrayHasKey('last_login_at', $schema['columns']);
        $this->assertArrayHasKey('created_at', $schema['columns']);
        $this->assertArrayHasKey('updated_at', $schema['columns']);
        $this->assertArrayHasKey('deleted_at', $schema['columns']);

        // Verify column properties
        $this->assertTrue($schema['columns']['id']['primary']);
        $this->assertTrue($schema['columns']['id']['auto_increment']);
        $this->assertTrue($schema['columns']['email']['unique']);
        $this->assertTrue($schema['columns']['bio']['nullable']);
        $this->assertSame('boolean', $schema['columns']['is_active']['type']);
        $this->assertSame('datetime', $schema['columns']['last_login_at']['type']);
    }

    /**
     * @test
     * @group integration
     */
    public function testAnalyzeDetectsAllRelationships(): void {
        $schema = $this->analyzer->analyze('users');

        $this->assertArrayHasKey('relationships', $schema);
        $relationships = collect($schema['relationships']);

        // Has one relationship
        $this->assertTrue($relationships->contains('type', 'hasOne'));
        $hasOne = $relationships->firstWhere('type', 'hasOne');
        $this->assertSame('profiles', $hasOne['table']);

        // Has many relationship
        $this->assertTrue($relationships->contains('type', 'hasMany'));
        $hasMany = $relationships->firstWhere('type', 'hasMany');
        $this->assertSame('posts', $hasMany['table']);

        // Belongs to many relationship
        $this->assertTrue($relationships->contains('type', 'belongsToMany'));
        $belongsToMany = $relationships->firstWhere('type', 'belongsToMany');
        $this->assertSame('roles', $belongsToMany['table']);
    }

    /**
     * @test
     * @group integration
     */
    public function testAnalyzeDetectsPolymorphicRelationships(): void {
        $schema = $this->analyzer->analyze('comments');

        $this->assertArrayHasKey('relationships', $schema);
        $relationships = collect($schema['relationships']);

        // Morph to relationship
        $this->assertTrue($relationships->contains('type', 'morphTo'));
        $morphTo = $relationships->firstWhere('type', 'morphTo');
        $this->assertSame('commentable', $morphTo['name']);
    }

    /**
     * @test
     * @group integration
     */
    public function testGetTablesReturnsAllTables(): void {
        $tables = $this->analyzer->getTables();

        $this->assertContains('users', $tables);
        $this->assertContains('profiles', $tables);
        $this->assertContains('roles', $tables);
        $this->assertContains('role_user', $tables);
        $this->assertContains('posts', $tables);
        $this->assertContains('comments', $tables);
    }

    /**
     * @test
     * @group integration
     */
    public function testAnalyzeHandlesJsonColumns(): void {
        $schema = $this->analyzer->analyze('posts');

        $this->assertArrayHasKey('columns', $schema);
        $this->assertArrayHasKey('metadata', $schema['columns']);
        $this->assertSame('json', $schema['columns']['metadata']['type']);
        $this->assertTrue($schema['columns']['metadata']['nullable']);
    }

    /**
     * @test
     * @group integration
     */
    public function testAnalyzeHandlesCompositeKeys(): void {
        $schema = $this->analyzer->analyze('role_user');

        $this->assertArrayHasKey('columns', $schema);
        $this->assertArrayHasKey('user_id', $schema['columns']);
        $this->assertArrayHasKey('role_id', $schema['columns']);

        // Both columns should be part of the primary key
        $this->assertTrue($schema['columns']['user_id']['primary']);
        $this->assertTrue($schema['columns']['role_id']['primary']);
    }
}