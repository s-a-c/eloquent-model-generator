<?php

namespace SAC\EloquentModelGenerator\Tests\Feature;

use SAC\EloquentModelGenerator\Support\Factories\ModelGeneratorFactory;

beforeEach(function () {
    $this->modelFactory = new ModelGeneratorFactory;
});

test('generates basic model with standard columns and indexes', function (array $model) {
    $definition = $this->modelFactory->createModelDefinition($model['table'], $model['columns']);
    $schema = $this->modelFactory->createSchema($model['table'], $model['columns'], $model['indexes'] ?? []);

    expect($definition)
        ->toBeValidModelDefinition()
        ->and($schema)
        ->toHaveValidSchema();
})->with('basic_models');

test('generates model with complex relationships and polymorphic associations', function (array $model) {
    $definition = $this->modelFactory->createModelDefinition(
        $model['table'],
        $model['columns'],
        $model['relations'] ?? []
    );
    $schema = $this->modelFactory->createSchema(
        $model['table'],
        $model['columns'],
        $model['indexes'] ?? []
    );

    expect($definition)
        ->toBeValidModelDefinition()
        ->and($schema)
        ->toHaveValidSchema()
        ->and($definition->relations)
        ->toHaveValidRelations();
})->with('complex_models');

test('handles all column types and index variations', function (array $model) {
    $definition = $this->modelFactory->createModelDefinition($model['table'], $model['columns']);
    $schema = $this->modelFactory->createSchema(
        $model['table'],
        $model['columns'],
        $model['indexes'] ?? []
    );

    expect($definition)
        ->toBeValidModelDefinition()
        ->and($schema)
        ->toHaveValidSchema();

    // Additional assertions for specific column types
    if ($model['table'] === 'all_types') {
        expect($definition->columns)
            ->toHaveCount(32)
            ->and($definition->columns->first(fn ($col) => $col->name === 'uuid_col')->type)
            ->toBe('uuid')
            ->and($definition->columns->first(fn ($col) => $col->name === 'json_col')->type)
            ->toBe('json');
    }

    // Additional assertions for index types
    if ($model['table'] === 'all_indexes') {
        expect($schema->indexes)
            ->toHaveCount(6)
            ->and($schema->indexes->first(fn ($idx) => $idx->name === 'spatial_idx')->type)
            ->toBe('spatial')
            ->and($schema->indexes->first(fn ($idx) => $idx->name === 'composite_idx')->columns)
            ->toHaveCount(2);
    }
})->with('edge_case_models');
