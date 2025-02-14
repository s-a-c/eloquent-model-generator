<?php

namespace SAC\EloquentModelGenerator\Support\Factories;

use SAC\EloquentModelGenerator\Support\Definitions\ModelDefinition;
use SAC\EloquentModelGenerator\Support\Definitions\SchemaDefinition;
use SAC\EloquentModelGenerator\Support\Definitions\RelationDefinition;
use SAC\EloquentModelGenerator\ValueObjects\Column;
use SAC\EloquentModelGenerator\ValueObjects\Index;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

/**
 * @phpstan-type ColumnDefinition array{
 *     type: string,
 *     nullable?: bool,
 *     unsigned?: bool,
 *     length?: int|null,
 *     total?: int|null,
 *     places?: int|null,
 *     allowed?: array<string>|null,
 *     autoIncrement?: bool,
 *     primary?: bool,
 *     unique?: bool,
 *     default?: string|null
 * }
 *
 * @phpstan-type RelationshipDefinition array{
 *     type: string,
 *     model?: string|null,
 *     foreignKey?: string|null,
 *     localKey?: string|null,
 *     morphType?: string|null
 * }
 */
class ModelGeneratorFactory {
    /**
     * Create a model definition from table schema
     *
     * @param array<string, ColumnDefinition> $columns
     * @param array<string, RelationshipDefinition> $relations
     */
    public function createModelDefinition(string $table, array $columns, array $relations = []): ModelDefinition {
        /** @var Collection<int, Column> $columnCollection */
        $columnCollection = collect($columns)->map(fn(array $column, string $name): Column => new Column(
            name: $name,
            type: $column['type'],
            isPrimary: $column['primary'] ?? false,
            isAutoIncrement: $column['autoIncrement'] ?? false,
            isNullable: $column['nullable'] ?? false,
            isUnique: $column['unique'] ?? false,
            default: $column['default'] ?? null,
            length: $column['length'] ?? null,
            enumValues: $column['allowed'] ?? null
        ));

        /** @var Collection<int, RelationDefinition> $relationCollection */
        $relationCollection = collect($relations)->map(fn(array $relation, string $name): RelationDefinition => new RelationDefinition(
            name: $name,
            type: $relation['type'],
            model: $relation['model'] ?? null,
            foreignKey: $relation['foreignKey'] ?? null,
            localKey: $relation['localKey'] ?? null,
            morphType: $relation['morphType'] ?? null
        ));

        /** @var non-empty-string */
        $className = Str::studly($table);
        /** @var non-empty-string */
        $namespace = 'App\\Models';

        $definition = new ModelDefinition(
            $className,
            $namespace,
            $columnCollection,
            $relationCollection
        );

        $definition->table = $table;

        return $definition;
    }

    /**
     * Create a schema definition from table schema
     *
     * @param array<string, ColumnDefinition> $columns
     * @param array<string, array{type: string, columns: array<string>}> $indexes
     */
    public function createSchema(string $table, array $columns, array $indexes = []): SchemaDefinition {
        /** @var Collection<int, Column> $columnCollection */
        $columnCollection = collect($columns)->map(fn(array $column, string $name): Column => new Column(
            name: $name,
            type: $column['type'],
            isPrimary: $column['primary'] ?? false,
            isAutoIncrement: $column['autoIncrement'] ?? false,
            isNullable: $column['nullable'] ?? false,
            isUnique: $column['unique'] ?? false,
            default: $column['default'] ?? null,
            length: $column['length'] ?? null,
            enumValues: $column['allowed'] ?? null
        ));

        /** @var Collection<int, Index> $indexCollection */
        $indexCollection = collect($indexes)->map(function (array $index, string $name): Index {
            /** @var array<int, string> $indexColumns */
            $indexColumns = array_values($index['columns']);
            return new Index($name, $index['type'], $indexColumns);
        });

        return new SchemaDefinition(
            table: $table,
            columns: $columnCollection,
            indexes: $indexCollection
        );
    }
}
