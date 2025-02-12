<?php

namespace SAC\EloquentModelGenerator\Support\Factories;

use SAC\EloquentModelGenerator\Support\Definitions\ModelDefinition;
use SAC\EloquentModelGenerator\Support\Definitions\SchemaDefinition;
use SAC\EloquentModelGenerator\Support\Definitions\RelationDefinition;
use Illuminate\Support\Collection;

class ModelGeneratorFactory {
    /**
     * Create a model definition from table schema
     *
     * @param string $table
     * @param array $columns
     * @param array $relations
     * @return ModelDefinition
     */
    public function createModelDefinition(string $table, array $columns, array $relations = []): ModelDefinition {
        $definition = new ModelDefinition();
        $definition->table = $table;
        $definition->columns = collect($columns)->map(function ($column, $name) {
            return (object) [
                'name' => $name,
                'type' => $column['type'],
                'nullable' => $column['nullable'] ?? false,
                'unsigned' => $column['unsigned'] ?? false,
                'length' => $column['length'] ?? null,
                'total' => $column['total'] ?? null,
                'places' => $column['places'] ?? null,
                'allowed' => $column['allowed'] ?? null,
                'autoIncrement' => $column['autoIncrement'] ?? false,
            ];
        });

        $definition->relations = collect($relations)->map(function ($relation, $name) {
            return new RelationDefinition(
                $name,
                $relation['type'],
                $relation['model'] ?? null,
                $relation['foreignKey'] ?? null,
                $relation['localKey'] ?? null,
                $relation['morphType'] ?? null
            );
        });

        return $definition;
    }

    /**
     * Create a schema definition from table schema
     *
     * @param string $table
     * @param array $columns
     * @param array $indexes
     * @return SchemaDefinition
     */
    public function createSchema(string $table, array $columns, array $indexes = []): SchemaDefinition {
        $definition = new SchemaDefinition();
        $definition->table = $table;
        $definition->columns = collect($columns)->map(function ($column, $name) {
            return (object) [
                'name' => $name,
                'type' => $column['type'],
                'nullable' => $column['nullable'] ?? false,
                'unsigned' => $column['unsigned'] ?? false,
                'length' => $column['length'] ?? null,
                'total' => $column['total'] ?? null,
                'places' => $column['places'] ?? null,
                'allowed' => $column['allowed'] ?? null,
                'autoIncrement' => $column['autoIncrement'] ?? false,
            ];
        });

        $definition->indexes = collect($indexes)->map(function ($index, $name) {
            return (object) [
                'name' => $name,
                'type' => $index['type'],
                'columns' => $index['columns'],
            ];
        });

        return $definition;
    }
}
