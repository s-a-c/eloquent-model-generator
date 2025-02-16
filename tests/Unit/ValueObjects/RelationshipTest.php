<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests\Unit\ValueObjects;

use PHPUnit\Framework\TestCase;
use SAC\EloquentModelGenerator\ValueObjects\Relationship;

/**
 * Relationship Value Object Test
 *
 * Tests the Relationship value object functionality and method generation.
 */
class RelationshipTest extends TestCase {
    /**
     * @test
     */
    public function testBelongsToRelationship(): void {
        $relationship = new Relationship(
            type: 'belongsTo',
            table: 'User',
            foreignKey: 'user_id',
            localKey: 'id',
            name: 'user'
        );

        $this->assertTrue($relationship->isBelongsTo());
        $this->assertFalse($relationship->isHasOne());
        $this->assertFalse($relationship->isHasMany());
        $this->assertFalse($relationship->isBelongsToMany());
        $this->assertFalse($relationship->isPolymorphic());
        $this->assertSame('user', $relationship->getName());
        $this->assertSame('return $this->belongsTo(User::class, \'user_id\', \'id\');', $relationship->getMethodDefinition());
    }

    /**
     * @test
     */
    public function testHasOneRelationship(): void {
        $relationship = new Relationship(
            type: 'hasOne',
            table: 'Profile',
            foreignKey: 'user_id',
            localKey: 'id',
            name: 'profile'
        );

        $this->assertTrue($relationship->isHasOne());
        $this->assertFalse($relationship->isBelongsTo());
        $this->assertSame('profile', $relationship->getName());
        $this->assertSame('return $this->hasOne(Profile::class, \'user_id\', \'id\');', $relationship->getMethodDefinition());
    }

    /**
     * @test
     */
    public function testHasManyRelationship(): void {
        $relationship = new Relationship(
            type: 'hasMany',
            table: 'Post',
            foreignKey: 'user_id',
            localKey: 'id',
            name: 'posts'
        );

        $this->assertTrue($relationship->isHasMany());
        $this->assertFalse($relationship->isHasOne());
        $this->assertSame('posts', $relationship->getName());
        $this->assertSame('return $this->hasMany(Post::class, \'user_id\', \'id\');', $relationship->getMethodDefinition());
    }

    /**
     * @test
     */
    public function testBelongsToManyRelationship(): void {
        $relationship = new Relationship(
            type: 'belongsToMany',
            table: 'Role',
            foreignKey: 'user_id',
            localKey: 'role_id',
            name: 'roles',
            pivotTable: 'role_user',
            pivotForeignKey: 'user_id',
            pivotLocalKey: 'role_id'
        );

        $this->assertTrue($relationship->isBelongsToMany());
        $this->assertTrue($relationship->hasPivotTable());
        $this->assertSame('roles', $relationship->getName());
        $this->assertSame('role_user', $relationship->getPivotTable());
        $this->assertSame('return $this->belongsToMany(Role::class, \'role_user\', \'user_id\', \'role_id\');', $relationship->getMethodDefinition());
    }

    /**
     * @test
     */
    public function testMorphOneRelationship(): void {
        $relationship = new Relationship(
            type: 'morphOne',
            table: 'Image',
            name: 'image',
            morphType: 'imageable_type',
            morphId: 'imageable_id'
        );

        $this->assertTrue($relationship->isPolymorphic());
        $this->assertSame('image', $relationship->getName());
        $this->assertSame('imageable_type', $relationship->getMorphType());
        $this->assertSame('imageable_id', $relationship->getMorphId());
        $this->assertSame('return $this->morphOne(Image::class, \'image\');', $relationship->getMethodDefinition());
    }

    /**
     * @test
     */
    public function testMorphManyRelationship(): void {
        $relationship = new Relationship(
            type: 'morphMany',
            table: 'Comment',
            name: 'comments',
            morphType: 'commentable_type',
            morphId: 'commentable_id'
        );

        $this->assertTrue($relationship->isPolymorphic());
        $this->assertSame('comments', $relationship->getName());
        $this->assertSame('commentable_type', $relationship->getMorphType());
        $this->assertSame('commentable_id', $relationship->getMorphId());
        $this->assertSame('return $this->morphMany(Comment::class, \'comments\');', $relationship->getMethodDefinition());
    }

    /**
     * @test
     */
    public function testMorphToRelationship(): void {
        $relationship = new Relationship(
            type: 'morphTo',
            name: 'commentable'
        );

        $this->assertTrue($relationship->isPolymorphic());
        $this->assertSame('commentable', $relationship->getName());
        $this->assertSame('return $this->morphTo();', $relationship->getMethodDefinition());
    }

    /**
     * @test
     */
    public function testGettersReturnCorrectValues(): void {
        $relationship = new Relationship(
            type: 'belongsTo',
            table: 'User',
            foreignKey: 'user_id',
            localKey: 'id',
            name: 'user',
            pivotTable: 'pivot_table',
            pivotForeignKey: 'pivot_foreign',
            pivotLocalKey: 'pivot_local',
            morphType: 'morph_type',
            morphId: 'morph_id'
        );

        $this->assertSame('belongsTo', $relationship->getType());
        $this->assertSame('User', $relationship->getTable());
        $this->assertSame('user_id', $relationship->getForeignKey());
        $this->assertSame('id', $relationship->getLocalKey());
        $this->assertSame('user', $relationship->getName());
        $this->assertSame('pivot_table', $relationship->getPivotTable());
        $this->assertSame('pivot_foreign', $relationship->getPivotForeignKey());
        $this->assertSame('pivot_local', $relationship->getPivotLocalKey());
        $this->assertSame('morph_type', $relationship->getMorphType());
        $this->assertSame('morph_id', $relationship->getMorphId());
    }

    /**
     * @test
     */
    public function testInvalidRelationshipTypeThrowsException(): void {
        $relationship = new Relationship(
            type: 'invalidType',
            table: 'User',
            name: 'user'
        );

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Unknown relationship type: invalidType');

        $relationship->getMethodDefinition();
    }
}