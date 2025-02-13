<?php

namespace SAC\EloquentModelGenerator\Services;

use SAC\EloquentModelGenerator\Contracts\ModelGeneratorService;
use SAC\EloquentModelGenerator\Support\Factories\ModelGeneratorFactory;
use SAC\EloquentModelGenerator\Support\Definitions\ModelDefinition;
use SAC\EloquentModelGenerator\Exceptions\ModelGeneratorException;

class ModelGenerator implements ModelGeneratorService {
    public function __construct(
        private readonly ModelGeneratorFactory $factory
    ) {
    }

    /**
     * Generate a model from a table name.
     *
     * @param string $table
     * @param array{class_name?: string, namespace?: string, base_class?: string, with_soft_deletes?: bool, with_validation?: bool, with_relationships?: bool} $options
     * @return ModelDefinition
     * @throws ModelGeneratorException
     */
    public function generateModel(string $table, array $options = []): ModelDefinition {
        $schema = $this->getTableSchema($table);

        if (!isset($schema['columns']) || empty($schema['columns'])) {
            throw new ModelGeneratorException("No columns found for table '{$table}'");
        }

        return $this->factory->createModelDefinition(
            $table,
            $schema['columns'],
            $schema['relations'] ?? []
        );
    }

    /**
     * Generate models for multiple tables.
     *
     * @param array<string> $tables
     * @param array{class_name?: string, namespace?: string, base_class?: string, with_soft_deletes?: bool, with_validation?: bool, with_relationships?: bool} $config
     * @return array<ModelDefinition>
     * @throws ModelGeneratorException
     */
    public function generateBatch(array $tables, array $config = []): array {
        $models = [];
        foreach ($tables as $table) {
            try {
                $models[] = $this->generateModel($table, $config);
            } catch (ModelGeneratorException $e) {
                throw new ModelGeneratorException(
                    "Failed to generate model for table '{$table}': " . $e->getMessage(),
                    0,
                    $e
                );
            }
        }
        return $models;
    }

    /**
     * Get all available tables.
     *
     * @return array<string>
     */
    public function getTables(): array {
        return [];  // This should be implemented by concrete classes
    }

    /**
     * Get the schema for a table.
     *
     * @param string $table
     * @return array{
     *     columns: array<string, array{
     *         type: non-empty-string,
     *         nullable: bool,
     *         default?: mixed,
     *         length?: positive-int|null,
     *         unsigned?: bool,
     *         autoIncrement?: bool,
     *         primary?: bool,
     *         unique?: bool,
     *         comment?: non-empty-string|null
     *     }>,
     *     indexes?: array<string, array{
     *         type: 'primary'|'unique'|'index'|'fulltext'|'spatial',
     *         columns: array<string>,
     *         name?: string,
     *         algorithm?: string,
     *         options?: array<string, mixed>
     *     }>,
     *     foreignKeys?: array<string, array{
     *         table: string,
     *         columns: array<string, string>,
     *         onDelete?: string,
     *         onUpdate?: string
     *     }>,
     *     timestamps?: bool,
     *     softDeletes?: bool,
     *     primaryKey?: string,
     *     incrementing?: bool
     * }
     */
    public function getTableSchema(string $table): array {
        return [
            'columns' => [],
            'indexes' => [],
            'foreignKeys' => [],
            'timestamps' => false,
            'softDeletes' => false,
            'primaryKey' => 'id',
            'incrementing' => true
        ];
    }
}
