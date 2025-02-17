<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests\Feature\Support\Adapters;

use Illuminate\Support\Collection;
use SAC\EloquentModelGenerator\Model\ModelDefinition as DomainModelDefinition;
use SAC\EloquentModelGenerator\Support\Definitions\ModelDefinition as LegacyModelDefinition;
use SAC\EloquentModelGenerator\Support\Adapters\ModelDefinitionAdapter;

test('converts domain model to legacy model', function () {
    $adapter = new ModelDefinitionAdapter();

    $domainModel = new DomainModelDefinition(
        'User',
        'App\\Models',
        'users',
        ['id' => ['type' => 'integer']],
        ['posts' => ['type' => 'hasMany']]
    );

    $legacyModel = $adapter->toLegacy($domainModel);

    expect($legacyModel)
        ->toBeInstanceOf(LegacyModelDefinition::class)
        ->and($legacyModel->getClassName())->toBe('User')
        ->and($legacyModel->getNamespace())->toBe('App\\Models')
        ->and($legacyModel->getTableName())->toBe('users')
        ->and($legacyModel->getColumns())->toBeInstanceOf(Collection::class)
        ->and($legacyModel->getRelations())->toBeInstanceOf(Collection::class);
});

test('converts legacy model to domain model', function () {
    $adapter = new ModelDefinitionAdapter();

    $legacyModel = new LegacyModelDefinition(
        'User',
        'App\\Models',
        Collection::make(['id' => ['type' => 'integer']]),
        Collection::make(['posts' => ['type' => 'hasMany']]),
        null,
        false,
        true,
        true,
        'users'
    );

    $domainModel = $adapter->toDomain($legacyModel);

    expect($domainModel)
        ->toBeInstanceOf(DomainModelDefinition::class)
        ->and($domainModel->getName())->toBe('User')
        ->and($domainModel->getNamespace())->toBe('App\\Models')
        ->and($domainModel->getTableName())->toBe('users')
        ->and($domainModel->getColumns())->toBeArray()
        ->and($domainModel->getRelations())->toBeArray();
});

test('handles null table name in legacy model', function () {
    $adapter = new ModelDefinitionAdapter();

    $legacyModel = new LegacyModelDefinition(
        'User',
        'App\\Models',
        Collection::make(),
        Collection::make(),
        null,
        false,
        true,
        true,
        null
    );

    $domainModel = $adapter->toDomain($legacyModel);

    expect($domainModel->getTableName())->toBe('');
});

test('preserves column and relation data during conversion', function () {
    $adapter = new ModelDefinitionAdapter();

    $columns = ['id' => ['type' => 'integer', 'nullable' => false]];
    $relations = ['posts' => ['type' => 'hasMany', 'model' => 'Post']];

    $domainModel = new DomainModelDefinition(
        'User',
        'App\\Models',
        'users',
        $columns,
        $relations
    );

    $legacyModel = $adapter->toLegacy($domainModel);
    $convertedBack = $adapter->toDomain($legacyModel);

    expect($convertedBack->getColumns())->toBe($columns)
        ->and($convertedBack->getRelations())->toBe($relations);
});
