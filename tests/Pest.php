<?php

declare(strict_types=1);

/*
|--------------------------------------------------------------------------
| Test Case
|--------------------------------------------------------------------------
|
| The closure you provide to your test functions is always bound to a specific PHPUnit test
| case class. By default, that class is "PHPUnit\Framework\TestCase". Of course, you may
| need to change it using the "uses()" function to bind a different classes or traits.
|
*/

uses(SAC\EloquentModelGenerator\Tests\TestCase::class)
    ->beforeEach(function () {
        // Create test database before each test
        $this->createTestDatabase();
    })
    ->afterEach(function () {
        // Clean up any temporary files or directories
        $tempDir = sys_get_temp_dir().'/model-generator-tests-*';
        array_map('unlink', glob($tempDir) ?: []);
    })
    ->in('Unit', 'Feature', 'Integration');

/*
|--------------------------------------------------------------------------
| Expectations
|--------------------------------------------------------------------------
|
| When you're writing tests, you often need to check that values meet certain conditions. The
| "expect()" function gives you access to a set of "expectations" methods that you can use
| to assert different things. Of course, you may extend the Expectation API at any time.
|
*/

expect()->extend('toBeValidTableDefinition', function () {
    expect($this->value)
        ->toBeInstanceOf(SAC\EloquentModelGenerator\Domain\ValueObjects\TableDefinition::class)
        ->and($this->value->name)->toBeString()
        ->and($this->value->columns)->toBeArray()
        ->and($this->value->indices)->toBeArray()
        ->and($this->value->relationships)->toBeArray();

    return $this;
});

expect()->extend('toBeValidGenerationResult', function () {
    expect($this->value)
        ->toBeInstanceOf(SAC\EloquentModelGenerator\Domain\ValueObjects\GenerationResult::class)
        ->and($this->value->generatedFiles)->toBeArray()
        ->and($this->value->errors)->toBeArray()
        ->and($this->value->metadata)->toBeArray()
        ->and($this->value->metadata)->toHaveKey('processed_tables')
        ->and($this->value->metadata)->toHaveKey('generated_models');

    return $this;
});

/*
|--------------------------------------------------------------------------
| Functions
|--------------------------------------------------------------------------
|
| While Pest is very powerful out-of-the-box, you may have some testing code specific to your
| project that you don't want to repeat in every file. Here you can also expose helpers as
| global functions to help you to reduce the number of lines of code in your test files.
|
*/

/**
 * Create a test table definition.
 */
function createTestTableDefinition(
    string $name = 'test_table',
    array $columns = [],
    array $indices = [],
    array $relationships = [],
): SAC\EloquentModelGenerator\Domain\ValueObjects\TableDefinition {
    return new SAC\EloquentModelGenerator\Domain\ValueObjects\TableDefinition(
        name: $name,
        columns: $columns,
        indices: $indices,
        relationships: $relationships,
    );
}

/**
 * Create a test column definition.
 */
function createTestColumnDefinition(
    string $name = 'test_column',
    string $type = 'string',
    bool $nullable = false,
): SAC\EloquentModelGenerator\Domain\ValueObjects\ColumnDefinition {
    return new SAC\EloquentModelGenerator\Domain\ValueObjects\ColumnDefinition(
        name: $name,
        type: $type,
        nullable: $nullable,
    );
}

/**
 * Create a test index definition.
 */
function createTestIndexDefinition(
    string $name = 'test_index',
    array $columns = ['id'],
    bool $isPrimary = false,
): SAC\EloquentModelGenerator\Domain\ValueObjects\IndexDefinition {
    return new SAC\EloquentModelGenerator\Domain\ValueObjects\IndexDefinition(
        name: $name,
        columns: $columns,
        isPrimary: $isPrimary,
    );
}

/**
 * Create a test relationship definition.
 */
function createTestRelationshipDefinition(
    string $name = 'testRelation',
    ?SAC\EloquentModelGenerator\Domain\Enums\RelationType $type = null,
): SAC\EloquentModelGenerator\Domain\ValueObjects\RelationshipDefinition {
    return new SAC\EloquentModelGenerator\Domain\ValueObjects\RelationshipDefinition(
        type: $type ?? SAC\EloquentModelGenerator\Domain\Enums\RelationType::HasOne,
        name: $name,
        relatedModel: 'App\\Models\\TestModel',
        localKeys: ['id'],
        foreignKeys: ['test_model_id'],
    );
}
