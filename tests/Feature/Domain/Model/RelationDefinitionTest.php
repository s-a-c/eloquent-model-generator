<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests\Feature\Domain\Model;

use SAC\EloquentModelGenerator\Domain\Model\RelationDefinition;

test('creates basic relation definition', function () {
    $relation = new RelationDefinition(
        'posts',
        'hasMany',
        'Post',
        'user_id',
        'id'
    );

    expect($relation->name())->toBe('posts')
        ->and($relation->type())->toBe('hasMany')
        ->and($relation->relatedModel())->toBe('Post')
        ->and($relation->foreignKey())->toBe('user_id')
        ->and($relation->localKey())->toBe('id')
        ->and($relation->pivotTable())->toBeNull()
        ->and($relation->pivotColumns())->toBeEmpty();
});

test('creates belongs to many relation with pivot', function () {
    $relation = new RelationDefinition(
        'roles',
        'belongsToMany',
        'Role',
        'user_id',
        'role_id',
        'role_user',
        ['created_at']
    );

    expect($relation->name())->toBe('roles')
        ->and($relation->type())->toBe('belongsToMany')
        ->and($relation->relatedModel())->toBe('Role')
        ->and($relation->foreignKey())->toBe('user_id')
        ->and($relation->localKey())->toBe('role_id')
        ->and($relation->pivotTable())->toBe('role_user')
        ->and($relation->pivotColumns())->toBe(['created_at'])
        ->and($relation->isPivotRelation())->toBeTrue();
});

test('converts to and from array', function () {
    $original = new RelationDefinition(
        'comments',
        'hasMany',
        'Comment',
        'post_id',
        'id'
    );

    $array = $original->toArray();
    $reconstructed = RelationDefinition::fromArray($array);

    expect($reconstructed->name())->toBe($original->name())
        ->and($reconstructed->type())->toBe($original->type())
        ->and($reconstructed->relatedModel())->toBe($original->relatedModel())
        ->and($reconstructed->foreignKey())->toBe($original->foreignKey())
        ->and($reconstructed->localKey())->toBe($original->localKey());
});

test('identifies pivot relations correctly', function () {
    $hasMany = new RelationDefinition(
        'posts',
        'hasMany',
        'Post',
        'user_id',
        'id'
    );

    $belongsToMany = new RelationDefinition(
        'categories',
        'belongsToMany',
        'Category',
        'post_id',
        'category_id',
        'category_post'
    );

    expect($hasMany->isPivotRelation())->toBeFalse()
        ->and($belongsToMany->isPivotRelation())->toBeTrue();
});

test('handles empty pivot columns', function () {
    $relation = new RelationDefinition(
        'tags',
        'belongsToMany',
        'Tag',
        'article_id',
        'tag_id',
        'article_tag'
    );

    expect($relation->pivotColumns())->toBeArray()
        ->and($relation->pivotColumns())->toBeEmpty();
});

test('preserves pivot columns order', function () {
    $pivotColumns = ['created_at', 'updated_at', 'created_by'];

    $relation = new RelationDefinition(
        'teams',
        'belongsToMany',
        'Team',
        'user_id',
        'team_id',
        'team_user',
        $pivotColumns
    );

    expect($relation->pivotColumns())->toBe($pivotColumns)
        ->and($relation->pivotColumns())->toHaveCount(3)
        ->and($relation->pivotColumns())->toMatchArray($pivotColumns);
});
