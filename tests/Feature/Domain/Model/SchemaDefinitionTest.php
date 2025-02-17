<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests\Feature\Domain\Model;

use SAC\EloquentModelGenerator\Domain\Model\SchemaDefinition;

test('creates schema definition with basic properties', function () {
    $schema = new SchemaDefinition(
        'users',
        [
            'id' => [
                'type' => 'integer',
                'nullable' => false,
                'autoIncrement' => true,
                'primary' => true
            ]
        ]
    );

    expect($schema->table())->toBe('users')
        ->and($schema->columns())->toHaveCount(1)
        ->and($schema->hasTimestamps())->toBeTrue()
        ->and($schema->hasSoftDeletes())->toBeFalse()
        ->and($schema->isIncrementing())->toBeTrue();
});

test('detects relations from foreign keys', function () {
    $schema = new SchemaDefinition(
        'posts',
        [
            'id' => ['type' => 'integer', 'nullable' => false],
            'user_id' => ['type' => 'integer', 'nullable' => false]
        ],
        [],
        [
            'posts_user_id_foreign' => [
                'table' => 'users',
                'columns' => ['user_id' => 'id']
            ]
        ]
    );

    $relations = $schema->detectRelations();

    expect($relations)
        ->toHaveCount(1)
        ->and($relations['posts_user_id_foreign'])
        ->toMatchArray([
            'type' => 'belongsTo',
            'related_model' => 'Users',
            'foreign_key' => 'user_id',
            'local_key' => 'id'
        ]);
});

test('converts to and from array', function () {
    $original = new SchemaDefinition(
        'products',
        [
            'id' => ['type' => 'integer', 'nullable' => false],
            'name' => ['type' => 'string', 'nullable' => false],
            'price' => ['type' => 'decimal', 'nullable' => false]
        ],
        [
            'products_name_unique' => [
                'type' => 'unique',
                'columns' => ['name']
            ]
        ]
    );

    $array = $original->toArray();
    $reconstructed = SchemaDefinition::fromArray($array);

    expect($reconstructed->table())->toBe($original->table())
        ->and($reconstructed->columns())->toBe($original->columns())
        ->and($reconstructed->indexes())->toBe($original->indexes())
        ->and($reconstructed->hasTimestamps())->toBe($original->hasTimestamps());
});

test('provides column and index access methods', function () {
    $schema = new SchemaDefinition(
        'categories',
        [
            'id' => ['type' => 'integer', 'nullable' => false],
            'name' => ['type' => 'string', 'nullable' => false]
        ],
        [
            'categories_name_unique' => [
                'type' => 'unique',
                'columns' => ['name']
            ]
        ]
    );

    expect($schema->hasColumn('name'))->toBeTrue()
        ->and($schema->hasColumn('description'))->toBeFalse()
        ->and($schema->getColumn('name'))->toBe(['type' => 'string', 'nullable' => false])
        ->and($schema->hasIndex('categories_name_unique'))->toBeTrue()
        ->and($schema->getIndex('categories_name_unique'))->toBe([
            'type' => 'unique',
            'columns' => ['name']
        ]);
});

test('handles foreign key operations', function () {
    $schema = new SchemaDefinition(
        'order_items',
        [
            'id' => ['type' => 'integer', 'nullable' => false],
            'order_id' => ['type' => 'integer', 'nullable' => false],
            'product_id' => ['type' => 'integer', 'nullable' => false]
        ],
        [],
        [
            'order_items_order_id_foreign' => [
                'table' => 'orders',
                'columns' => ['order_id' => 'id'],
                'onDelete' => 'cascade'
            ]
        ]
    );

    expect($schema->hasForeignKey('order_items_order_id_foreign'))->toBeTrue()
        ->and($schema->getForeignKey('order_items_order_id_foreign'))->toBe([
            'table' => 'orders',
            'columns' => ['order_id' => 'id'],
            'onDelete' => 'cascade'
        ])
        ->and($schema->hasForeignKey('nonexistent'))->toBeFalse()
        ->and($schema->getForeignKey('nonexistent'))->toBeNull();
});
