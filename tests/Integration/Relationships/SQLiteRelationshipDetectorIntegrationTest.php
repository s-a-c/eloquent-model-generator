<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests\Integration\Relationships;

use Orchestra\Testbench\TestCase;
use SAC\EloquentModelGenerator\Services\Relationships\SQLiteRelationshipDetector;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * SQLite Relationship Detector Integration Test
 *
 * Tests the SQLite relationship detector with a real SQLite database,
 * verifying actual relationship detection and analysis.
 */
class SQLiteRelationshipDetectorIntegrationTest extends TestCase {
    private SQLiteRelationshipDetector $detector;

    protected function setUp(): void {
        parent::setUp();

        // Configure SQLite
        config(['database.default' => 'sqlite']);
        config(['database.connections.sqlite.database' => ':memory:']);

        $this->detector = new SQLiteRelationshipDetector(DB::connection());

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
            $table->timestamps();
        });

        // Create profiles table (one-to-one)
        Schema::create('profiles', function ($table) {
            $table->id();
            $table->foreignId('user_id')->unique()->constrained();
            $table->string('phone')->nullable();
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
    public function testDetectsBelongsToRelationship(): void {
        $relationships = $this->detector->detect('posts');

        $belongsTo = collect($relationships)->first(fn($rel) => $rel->getType() === 'belongsTo');

        $this->assertNotNull($belongsTo);
        $this->assertSame('User', $belongsTo->getTable());
        $this->assertSame('user_id', $belongsTo->getForeignKey());
        $this->assertSame('id', $belongsTo->getLocalKey());
        $this->assertSame('user', $belongsTo->getName());
    }

    /**
     * @test
     * @group integration
     */
    public function testDetectsHasOneRelationship(): void {
        $relationships = $this->detector->detect('users');

        $hasOne = collect($relationships)->first(fn($rel) => $rel->getType() === 'hasOne');

        $this->assertNotNull($hasOne);
        $this->assertSame('Profile', $hasOne->getTable());
        $this->assertSame('user_id', $hasOne->getForeignKey());
        $this->assertSame('id', $hasOne->getLocalKey());
        $this->assertSame('profile', $hasOne->getName());
    }

    /**
     * @test
     * @group integration
     */
    public function testDetectsHasManyRelationship(): void {
        $relationships = $this->detector->detect('users');

        $hasMany = collect($relationships)->first(fn($rel) => $rel->getType() === 'hasMany');

        $this->assertNotNull($hasMany);
        $this->assertSame('Post', $hasMany->getTable());
        $this->assertSame('user_id', $hasMany->getForeignKey());
        $this->assertSame('id', $hasMany->getLocalKey());
        $this->assertSame('posts', $hasMany->getName());
    }

    /**
     * @test
     * @group integration
     */
    public function testDetectsBelongsToManyRelationship(): void {
        $relationships = $this->detector->detect('users');

        $belongsToMany = collect($relationships)->first(fn($rel) => $rel->getType() === 'belongsToMany');

        $this->assertNotNull($belongsToMany);
        $this->assertSame('Role', $belongsToMany->getTable());
        $this->assertSame('role_user', $belongsToMany->getPivotTable());
        $this->assertSame('user_id', $belongsToMany->getPivotForeignKey());
        $this->assertSame('role_id', $belongsToMany->getPivotLocalKey());
        $this->assertSame('roles', $belongsToMany->getName());
    }

    /**
     * @test
     * @group integration
     */
    public function testDetectsPolymorphicRelationships(): void {
        // Test morphMany on User
        $userRelationships = $this->detector->detect('users');
        $morphMany = collect($userRelationships)->first(fn($rel) => $rel->getType() === 'morphMany');

        $this->assertNotNull($morphMany);
        $this->assertSame('Comment', $morphMany->getTable());
        $this->assertSame('comments', $morphMany->getName());

        // Test morphTo on Comment
        $commentRelationships = $this->detector->detect('comments');
        $morphTo = collect($commentRelationships)->first(fn($rel) => $rel->getType() === 'morphTo');

        $this->assertNotNull($morphTo);
        $this->assertSame('commentable', $morphTo->getName());
    }

    /**
     * @test
     * @group integration
     */
    public function testDetectsAllRelationshipsForTable(): void {
        $relationships = $this->detector->detect('users');

        $this->assertCount(4, $relationships);

        $types = collect($relationships)->pluck('type')->toArray();
        $this->assertContains('hasOne', $types);
        $this->assertContains('hasMany', $types);
        $this->assertContains('belongsToMany', $types);
        $this->assertContains('morphMany', $types);
    }

    /**
     * @test
     * @group integration
     */
    public function testHandlesTableWithNoRelationships(): void {
        Schema::create('settings', function ($table) {
            $table->id();
            $table->string('key')->unique();
            $table->string('value');
            $table->timestamps();
        });

        $relationships = $this->detector->detect('settings');

        $this->assertEmpty($relationships);

        Schema::dropIfExists('settings');
    }

    /**
     * @test
     * @group integration
     */
    public function testHandlesSelfReferencingRelationships(): void {
        Schema::create('employees', function ($table) {
            $table->id();
            $table->string('name');
            $table->foreignId('manager_id')->nullable()->constrained('employees');
            $table->timestamps();
        });

        $relationships = $this->detector->detect('employees');

        $this->assertCount(2, $relationships);

        $belongsTo = collect($relationships)->first(fn($rel) => $rel->getType() === 'belongsTo');
        $hasMany = collect($relationships)->first(fn($rel) => $rel->getType() === 'hasMany');

        $this->assertNotNull($belongsTo);
        $this->assertNotNull($hasMany);
        $this->assertSame('manager', $belongsTo->getName());
        $this->assertSame('subordinates', $hasMany->getName());

        Schema::dropIfExists('employees');
    }
}