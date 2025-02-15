<?php

namespace SAC\EloquentModelGenerator\Tests\Support\Factories;

use Illuminate\Support\Str;
use SAC\EloquentModelGenerator\ValueObjects\ModelDefinition;

class ModelFactory
{
    /**
     * Create a new model factory instance.
     */
    public function __construct(
        private string $defaultNamespace = 'App\\Models',
        private string $defaultBaseClass = 'Illuminate\\Database\\Eloquent\\Model'
    ) {}

    /**
     * Create a new model definition.
     */
    public function definition(string $tableName, array $attributes = []): ModelDefinition
    {
        return new ModelDefinition(
            className: $attributes['className'] ?? Str::studly(Str::singular($tableName)),
            namespace: $attributes['namespace'] ?? $this->defaultNamespace,
            tableName: $tableName,
            baseClass: $attributes['baseClass'] ?? $this->defaultBaseClass,
            withSoftDeletes: $attributes['withSoftDeletes'] ?? false,
            withValidation: $attributes['withValidation'] ?? false,
            withRelationships: $attributes['withRelationships'] ?? true
        );
    }

    /**
     * Create a new schema definition.
     */
    public function schema(
        array $columns = [],
        array $indexes = [],
        array $relations = []
    ): array {
        return [
            'columns' => $this->normalizeColumns($columns),
            'indexes' => $this->normalizeIndexes($indexes),
            'relations' => $this->normalizeRelations($relations),
        ];
    }

    /**
     * Create a basic table schema.
     */
    public function basicSchema(string $tableName): array
    {
        return $this->schema(
            columns: [
                'id' => ['type' => 'integer', 'autoIncrement' => true],
                'created_at' => ['type' => 'timestamp'],
                'updated_at' => ['type' => 'timestamp'],
            ],
            indexes: [
                'primary' => ['type' => 'primary', 'columns' => ['id']],
            ]
        );
    }

    /**
     * Create a schema with soft deletes.
     */
    public function softDeletesSchema(string $tableName): array
    {
        $schema = $this->basicSchema($tableName);
        $schema['columns']['deleted_at'] = ['type' => 'timestamp', 'nullable' => true];

        return $schema;
    }

    /**
     * Create a schema with relationships.
     */
    public function relationshipSchema(string $tableName, array $relations): array
    {
        $schema = $this->basicSchema($tableName);
        $schema['relations'] = $this->normalizeRelations($relations);

        return $schema;
    }

    /**
     * Normalize column definitions.
     */
    private function normalizeColumns(array $columns): array
    {
        $normalized = [];
        foreach ($columns as $name => $definition) {
            if (is_string($definition)) {
                $definition = ['type' => $definition];
            }
            $normalized[$name] = array_merge([
                'type' => 'string',
                'nullable' => false,
                'autoIncrement' => false,
                'primary' => false,
            ], $definition);
        }

        return $normalized;
    }

    /**
     * Normalize index definitions.
     */
    private function normalizeIndexes(array $indexes): array
    {
        $normalized = [];
        foreach ($indexes as $name => $definition) {
            if (is_string($definition)) {
                $definition = ['type' => 'index', 'columns' => [$definition]];
            }
            if (is_array($definition) && ! isset($definition['type'])) {
                $definition = ['type' => 'index', 'columns' => $definition];
            }
            $normalized[$name] = array_merge([
                'type' => 'index',
                'unique' => false,
            ], $definition);
        }

        return $normalized;
    }

    /**
     * Normalize relation definitions.
     */
    private function normalizeRelations(array $relations): array
    {
        $normalized = [];
        foreach ($relations as $name => $definition) {
            if (is_string($definition)) {
                $definition = ['type' => $definition];
            }
            $normalized[$name] = array_merge([
                'type' => 'belongsTo',
                'model' => null,
                'foreignKey' => null,
                'localKey' => null,
            ], $definition);
        }

        return $normalized;
    }
}
