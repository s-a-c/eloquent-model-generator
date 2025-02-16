<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests\Unit\Services\Relations;

use PHPUnit\Framework\TestCase;
use SAC\EloquentModelGenerator\Services\Relations\RelationDetectorService;
use SAC\EloquentModelGenerator\ValueObjects\{Column, ForeignKey};

class RelationDetectorServiceTest extends TestCase {
    private RelationDetectorService $detector;

    protected function setUp(): void {
        parent::setUp();
        $this->detector = new RelationDetectorService();
    }

    public function testDetectBelongsToRelation(): void {
        $foreignKey = new ForeignKey(
            'role_id',
            'roles',
            'id'
        );

        $columns = [
            new Column(
                name: 'id',
                type: 'integer',
                isPrimary: true,
                isAutoIncrement: true,
                isNullable: false,
                isUnique: true
            ),
            new Column(
                name: 'role_id',
                type: 'integer',
                isPrimary: false,
                isAutoIncrement: false,
                isNullable: false,
                isUnique: false,
                foreignKey: $foreignKey
            ),
        ];

        $relations = $this->detector->detectRelations('users', $columns);

        $this->assertCount(1, $relations);
        $this->assertSame([
            'type' => 'belongsTo',
            'name' => 'role',
            'model' => 'Role',
            'foreignKey' => 'role_id',
            'localKey' => 'id',
        ], $relations[0]);
    }

    public function testDetectHasOneRelation(): void {
        $foreignKey = new ForeignKey(
            'user_id',
            'profiles',
            'id'
        );

        $columns = [
            new Column(
                name: 'id',
                type: 'integer',
                isPrimary: true,
                isAutoIncrement: true,
                isNullable: false,
                isUnique: true
            ),
        ];

        $relations = $this->detector->detectRelations('users', $columns, [$foreignKey]);

        $this->assertCount(1, $relations);
        $this->assertSame([
            'type' => 'hasOne',
            'name' => 'profile',
            'model' => 'Profile',
            'foreignKey' => 'user_id',
            'localKey' => 'id',
        ], $relations[0]);
    }

    public function testDetectHasManyRelation(): void {
        $foreignKey = new ForeignKey(
            'user_id',
            'posts',
            'id'
        );

        $columns = [
            new Column(
                name: 'id',
                type: 'integer',
                isPrimary: true,
                isAutoIncrement: true,
                isNullable: false,
                isUnique: true
            ),
        ];

        $relations = $this->detector->detectRelations('users', $columns, [$foreignKey]);

        $this->assertCount(1, $relations);
        $this->assertSame([
            'type' => 'hasMany',
            'name' => 'posts',
            'model' => 'Post',
            'foreignKey' => 'user_id',
            'localKey' => 'id',
        ], $relations[0]);
    }

    public function testDetectBelongsToManyRelation(): void {
        $foreignKeys = [
            new ForeignKey(
                'role_id',
                'role_user',
                'id'
            ),
            new ForeignKey(
                'user_id',
                'role_user',
                'id'
            ),
        ];

        $columns = [
            new Column(
                name: 'id',
                type: 'integer',
                isPrimary: true,
                isAutoIncrement: true,
                isNullable: false,
                isUnique: true
            ),
        ];

        $relations = $this->detector->detectRelations('users', $columns, $foreignKeys);

        $this->assertCount(1, $relations);
        $this->assertSame([
            'type' => 'belongsToMany',
            'name' => 'roles',
            'model' => 'Role',
            'table' => 'role_user',
            'foreignPivotKey' => 'user_id',
            'relatedPivotKey' => 'role_id',
            'parentKey' => 'id',
            'relatedKey' => 'id',
        ], $relations[0]);
    }

    public function testDetectMorphOneRelation(): void {
        $columns = [
            new Column(
                name: 'id',
                type: 'integer',
                isPrimary: true,
                isAutoIncrement: true,
                isNullable: false,
                isUnique: true
            ),
        ];

        $morphColumns = [
            new Column(
                name: 'imageable_id',
                type: 'integer',
                isPrimary: false,
                isAutoIncrement: false,
                isNullable: false,
                isUnique: false
            ),
            new Column(
                name: 'imageable_type',
                type: 'string',
                isPrimary: false,
                isAutoIncrement: false,
                isNullable: false,
                isUnique: false
            ),
        ];

        $relations = $this->detector->detectMorphRelations('users', $columns, $morphColumns);

        $this->assertCount(1, $relations);
        $this->assertSame([
            'type' => 'morphOne',
            'name' => 'image',
            'model' => 'Image',
            'morphName' => 'imageable',
        ], $relations[0]);
    }

    public function testDetectMorphToRelation(): void {
        $columns = [
            new Column(
                name: 'id',
                type: 'integer',
                isPrimary: true,
                isAutoIncrement: true,
                isNullable: false,
                isUnique: true
            ),
            new Column(
                name: 'commentable_id',
                type: 'integer',
                isPrimary: false,
                isAutoIncrement: false,
                isNullable: false,
                isUnique: false
            ),
            new Column(
                name: 'commentable_type',
                type: 'string',
                isPrimary: false,
                isAutoIncrement: false,
                isNullable: false,
                isUnique: false
            ),
        ];

        $relations = $this->detector->detectRelations('comments', $columns);

        $this->assertCount(1, $relations);
        $this->assertSame([
            'type' => 'morphTo',
            'name' => 'commentable',
            'morphType' => 'commentable_type',
            'morphId' => 'commentable_id',
        ], $relations[0]);
    }

    public function testDetectMorphManyRelation(): void {
        $columns = [
            new Column(
                name: 'id',
                type: 'integer',
                isPrimary: true,
                isAutoIncrement: true,
                isNullable: false,
                isUnique: true
            ),
        ];

        $morphColumns = [
            new Column(
                name: 'taggable_id',
                type: 'integer',
                isPrimary: false,
                isAutoIncrement: false,
                isNullable: false,
                isUnique: false
            ),
            new Column(
                name: 'taggable_type',
                type: 'string',
                isPrimary: false,
                isAutoIncrement: false,
                isNullable: false,
                isUnique: false
            ),
        ];

        $relations = $this->detector->detectMorphRelations('posts', $columns, $morphColumns);

        $this->assertCount(1, $relations);
        $this->assertSame([
            'type' => 'morphMany',
            'name' => 'tags',
            'model' => 'Tag',
            'morphName' => 'taggable',
        ], $relations[0]);
    }

    public function testDetectMorphToManyRelation(): void {
        $columns = [
            new Column(
                name: 'id',
                type: 'integer',
                isPrimary: true,
                isAutoIncrement: true,
                isNullable: false,
                isUnique: true
            ),
        ];

        $morphPivotColumns = [
            new Column(
                name: 'taggable_id',
                type: 'integer',
                isPrimary: false,
                isAutoIncrement: false,
                isNullable: false,
                isUnique: false
            ),
            new Column(
                name: 'taggable_type',
                type: 'string',
                isPrimary: false,
                isAutoIncrement: false,
                isNullable: false,
                isUnique: false
            ),
            new Column(
                name: 'tag_id',
                type: 'integer',
                isPrimary: false,
                isAutoIncrement: false,
                isNullable: false,
                isUnique: false
            ),
        ];

        $relations = $this->detector->detectMorphToManyRelations('posts', $columns, $morphPivotColumns);

        $this->assertCount(1, $relations);
        $this->assertSame([
            'type' => 'morphToMany',
            'name' => 'tags',
            'model' => 'Tag',
            'table' => 'taggables',
            'morphName' => 'taggable',
        ], $relations[0]);
    }
}