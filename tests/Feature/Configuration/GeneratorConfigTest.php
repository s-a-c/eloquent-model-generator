<?php

use SAC\EloquentModelGenerator\Tests\Support\Traits\WithSQLiteTesting;
use SAC\EloquentModelGenerator\ValueObjects\ModelDefinition;

uses(WithSQLiteTesting::class);

test('respects custom base model class', function () {
    $schema = [
        'columns' => [
            'id' => ['type' => 'integer', 'autoIncrement' => true],
        ],
    ];

    $definition = new ModelDefinition(
        className: 'TestModel',
        namespace: 'App\\Models',
        tableName: 'test_table',
        baseClass: 'App\\Models\\CustomModel'
    );

    $generator = createModelGenerator();
    $model = $generator->generate($definition, $schema);

    expect($model->getContent())
        ->toContain('use App\\Models\\CustomModel;')
        ->toContain('class TestModel extends CustomModel');
});

test('respects custom model namespace', function () {
    $schema = [
        'columns' => [
            'id' => ['type' => 'integer', 'autoIncrement' => true],
        ],
    ];

    $definition = new ModelDefinition(
        className: 'TestModel',
        namespace: 'App\\Domain\\Models',
        tableName: 'test_table',
        baseClass: 'Illuminate\\Database\\Eloquent\\Model'
    );

    $generator = createModelGenerator();
    $model = $generator->generate($definition, $schema);

    expect($model->getContent())
        ->toContain('namespace App\\Domain\\Models;');
});

test('respects soft deletes configuration', function () {
    $schema = [
        'columns' => [
            'id' => ['type' => 'integer', 'autoIncrement' => true],
            'deleted_at' => ['type' => 'timestamp', 'nullable' => true],
        ],
    ];

    $definition = new ModelDefinition(
        className: 'TestModel',
        namespace: 'App\\Models',
        tableName: 'test_table',
        baseClass: 'Illuminate\\Database\\Eloquent\\Model',
        withSoftDeletes: true
    );

    $generator = createModelGenerator();
    $model = $generator->generate($definition, $schema);

    expect($model->getContent())
        ->toContain('use Illuminate\\Database\\Eloquent\\SoftDeletes;')
        ->toContain('use SoftDeletes;')
        ->toContain('protected $dates = [\'deleted_at\'];');
});

test('respects custom date format', function () {
    $schema = [
        'columns' => [
            'id' => ['type' => 'integer', 'autoIncrement' => true],
            'created_at' => ['type' => 'timestamp'],
            'updated_at' => ['type' => 'timestamp'],
        ],
    ];

    $definition = new ModelDefinition(
        className: 'TestModel',
        namespace: 'App\\Models',
        tableName: 'test_table',
        baseClass: 'Illuminate\\Database\\Eloquent\\Model'
    );

    $generator = createModelGenerator([
        'date_format' => 'Y-m-d H:i:s.u',
    ]);

    $model = $generator->generate($definition, $schema);

    expect($model->getContent())
        ->toContain('protected $dateFormat = \'Y-m-d H:i:s.u\';');
});

test('respects custom connection configuration', function () {
    $schema = [
        'columns' => [
            'id' => ['type' => 'integer', 'autoIncrement' => true],
        ],
    ];

    $definition = new ModelDefinition(
        className: 'TestModel',
        namespace: 'App\\Models',
        tableName: 'test_table',
        baseClass: 'Illuminate\\Database\\Eloquent\\Model'
    );

    $generator = createModelGenerator([
        'connection' => 'custom_connection',
    ]);

    $model = $generator->generate($definition, $schema);

    expect($model->getContent())
        ->toContain('protected $connection = \'custom_connection\';');
});
