<?php

use SAC\EloquentModelGenerator\Tests\Support\Factories\ModelFactory;
use SAC\EloquentModelGenerator\ValueObjects\ModelDefinition;

beforeEach(function () {
    $this->factory = new ModelFactory;
});

test('it creates model definition', function () {
    $definition = $this->factory->definition('test_users');

    expect($definition)
        ->toBeInstanceOf(ModelDefinition::class)
        ->and($definition->getClassName())->toBe('TestUser')
        ->and($definition->getNamespace())->toBe('App\\Models')
        ->and($definition->getTableName())->toBe('test_users');
});

test('it creates model definition with custom attributes', function () {
    $definition = $this->factory->definition('users', [
        'className' => 'CustomUser',
        'namespace' => 'App\\Domain\\Models',
        'baseClass' => 'App\\Models\\BaseModel',
        'withSoftDeletes' => true,
    ]);

    expect($definition)
        ->and($definition->getClassName())->toBe('CustomUser')
        ->and($definition->getNamespace())->toBe('App\\Domain\\Models')
        ->and($definition->getBaseClass())->toBe('App\\Models\\BaseModel')
        ->and($definition->withSoftDeletes())->toBeTrue();
});

test('it creates basic schema', function () {
    $schema = $this->factory->basicSchema('users');

    expect($schema)
        ->toHaveKey('columns')
        ->toHaveKey('indexes')
        ->and($schema['columns'])->toHaveKeys(['id', 'created_at', 'updated_at']);
});

test('it creates soft deletes schema', function () {
    $schema = $this->factory->softDeletesSchema('users');

    expect($schema['columns'])
        ->toHaveKey('deleted_at')
        ->and($schema['columns']['deleted_at']['nullable'])->toBeTrue()
        ->and($schema['columns']['deleted_at']['type'])->toBe('timestamp');
});

test('it creates relationship schema', function () {
    $relations = [
        'posts' => ['type' => 'hasMany', 'model' => 'App\\Models\\Post'],
    ];

    $schema = $this->factory->relationshipSchema('users', $relations);

    expect($schema)
        ->toHaveKey('relations')
        ->and($schema['relations'])->toBe($relations);
});

test('it normalizes column definitions', function () {
    $schema = $this->factory->schema([
        'name' => 'string',
        'email' => ['type' => 'string', 'nullable' => true],
        'active' => ['type' => 'boolean', 'default' => false],
    ]);

    expect($schema['columns'])
        ->and($schema['columns']['name']['type'])->toBe('string')
        ->and($schema['columns']['name']['nullable'])->toBeFalse()
        ->and($schema['columns']['email']['nullable'])->toBeTrue()
        ->and($schema['columns']['active']['default'])->toBeFalse();
});

test('it normalizes index definitions', function () {
    $schema = $this->factory->schema([], [
        'email_unique' => ['type' => 'unique', 'columns' => ['email']],
        'name_index' => 'name',
        'composite' => ['created_at', 'updated_at'],
    ]);

    expect($schema['indexes'])
        ->and($schema['indexes']['email_unique']['type'])->toBe('unique')
        ->and($schema['indexes']['name_index']['columns'])->toBe(['name'])
        ->and($schema['indexes']['composite']['columns'])->toBe(['created_at', 'updated_at']);
});

test('it normalizes relation definitions', function () {
    $schema = $this->factory->schema([], [], [
        'posts' => 'hasMany',
        'profile' => ['type' => 'hasOne', 'model' => 'App\\Models\\Profile'],
    ]);

    expect($schema['relations'])
        ->and($schema['relations']['posts']['type'])->toBe('hasMany')
        ->and($schema['relations']['profile']['type'])->toBe('hasOne');
});
