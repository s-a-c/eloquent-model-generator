<?php

use SAC\EloquentModelGenerator\Exceptions\ModelGeneratorException;
use SAC\EloquentModelGenerator\Tests\Support\Traits\WithSQLiteTesting;
use SAC\EloquentModelGenerator\ValueObjects\ModelDefinition;

uses(WithSQLiteTesting::class);

test('throws exception for invalid column type', function () {
    $schema = [
        'columns' => [
            'id' => ['type' => 'invalid_type'],
        ],
    ];

    $definition = new ModelDefinition(
        className: 'TestModel',
        namespace: 'App\\Models',
        tableName: 'test_table',
        baseClass: 'Illuminate\\Database\\Eloquent\\Model'
    );

    $generator = createModelGenerator();

    expect(fn () => $generator->generate($definition, $schema))
        ->toThrow(ModelGeneratorException::class, 'Invalid column type: invalid_type');
});

test('throws exception for invalid relation type', function () {
    $schema = [
        'columns' => [
            'id' => ['type' => 'integer'],
            'user_id' => ['type' => 'integer'],
        ],
        'relations' => [
            [
                'type' => 'invalid_relation',
                'foreign_key' => 'user_id',
                'parent_table' => 'users',
            ],
        ],
    ];

    $definition = new ModelDefinition(
        className: 'TestModel',
        namespace: 'App\\Models',
        tableName: 'test_table',
        baseClass: 'Illuminate\\Database\\Eloquent\\Model',
        withRelationships: true
    );

    $generator = createModelGenerator();

    expect(fn () => $generator->generate($definition, $schema))
        ->toThrow(ModelGeneratorException::class, 'Invalid relation type: invalid_relation');
});

test('throws exception for invalid namespace format', function () {
    $schema = [
        'columns' => [
            'id' => ['type' => 'integer'],
        ],
    ];

    $definition = new ModelDefinition(
        className: 'TestModel',
        namespace: 'Invalid\\Namespace\\Format!',
        tableName: 'test_table',
        baseClass: 'Illuminate\\Database\\Eloquent\\Model'
    );

    $generator = createModelGenerator();

    expect(fn () => $generator->generate($definition, $schema))
        ->toThrow(ModelGeneratorException::class, 'Invalid namespace format');
});

test('throws exception for invalid class name', function () {
    $schema = [
        'columns' => [
            'id' => ['type' => 'integer'],
        ],
    ];

    $definition = new ModelDefinition(
        className: '123InvalidClassName',
        namespace: 'App\\Models',
        tableName: 'test_table',
        baseClass: 'Illuminate\\Database\\Eloquent\\Model'
    );

    $generator = createModelGenerator();

    expect(fn () => $generator->generate($definition, $schema))
        ->toThrow(ModelGeneratorException::class, 'Invalid class name format');
});
