<?php

use SAC\EloquentModelGenerator\Model\ModelDefinition;
use SAC\EloquentModelGenerator\Services\ModelAnalyzer;

beforeEach(function () {
    $this->analyzer = new ModelAnalyzer();
    $this->model = new ModelDefinition(
        'User',
        'App\\Models',
        'users',
        [
            'id' => ['type' => 'integer', 'nullable' => false],
            'email' => ['type' => 'string', 'nullable' => false],
            'created_at' => ['type' => 'datetime', 'nullable' => true]
        ],
        [
            'posts' => [
                'type' => 'hasMany',
                'model' => 'App\\Models\\Post',
                'foreign_key' => 'user_id',
                'local_key' => 'id'
            ]
        ]
    );
});

test('analyzes columns correctly', function () {
    $results = $this->analyzer->analyze($this->model);

    expect($results)
        ->toHaveKey('columns')
        ->and($results['columns']['id'])
        ->toBe([
            'type' => 'integer',
            'nullable' => false,
        ]);
});

test('analyzes relations correctly', function () {
    $results = $this->analyzer->analyze($this->model);

    expect($results)
        ->toHaveKey('relations')
        ->and($results['relations']['posts'])
        ->toBe([
            'type' => 'hasMany',
            'model' => 'App\\Models\\Post',
            'foreign_key' => 'user_id',
            'local_key' => 'id'
        ]);
});

test('generates validation rules correctly', function () {
    $results = $this->analyzer->analyze($this->model);

    expect($results)
        ->toHaveKey('validation_rules')
        ->and($results['validation_rules'])
        ->toBe([
            'id' => ['required', 'integer'],
            'email' => ['required', 'string'],
            'created_at' => ['datetime']
        ]);
});

test('infers type hints correctly', function () {
    $results = $this->analyzer->analyze($this->model);

    expect($results)
        ->toHaveKey('type_hints')
        ->and($results['type_hints'])
        ->toBe([
            'id' => 'int',
            'email' => 'string',
            'created_at' => '?\\DateTimeInterface'
        ]);
});

test('includes basic model info', function () {
    $results = $this->analyzer->analyze($this->model);

    expect($results)
        ->toHaveKey('name', 'User')
        ->toHaveKey('namespace', 'App\\Models')
        ->toHaveKey('table', 'users');
});
