<?php

use Carbon\Carbon;
use SAC\EloquentModelGenerator\SchemaParser;

test('it correctly parses table columns', function () {
    $schema = getTestSchema();
    $parser = new SchemaParser();

    $columns = $parser->parseColumns($schema['columns']);

    expect($columns)
        ->toBeInstanceOf(\Illuminate\Support\Collection::class)
        ->toHaveCount(5)
        ->and($columns->get('id'))
        ->toBeArray()
        ->toHaveKey('type')
        ->and($columns->get('id')['type'])->toBe('integer')
        ->and($columns->get('name')['type'])->toBe('string')
        ->and($columns->get('email')['type'])->toBe('string')
        ->and($columns->get('created_at')['type'])->toBe('timestamp')
        ->and($columns->get('updated_at')['type'])->toBe('timestamp');
});

test('it correctly parses table indexes', function () {
    $schema = getTestSchema();
    $parser = new SchemaParser();

    $indexes = $parser->parseIndexes($schema['indexes']);

    expect($indexes)
        ->toBeInstanceOf(\Illuminate\Support\Collection::class)
        ->toHaveCount(2)
        ->and($indexes->get('primary'))
        ->toBeArray()
        ->toHaveKey('type')
        ->and($indexes->get('primary')['type'])->toBe('primary')
        ->and($indexes->get('email_unique')['type'])->toBe('unique');
});
