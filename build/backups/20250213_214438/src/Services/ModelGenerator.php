<?php

namespace SAC\EloquentModelGenerator\Services;

use SAC\EloquentModelGenerator\Contracts\ModelGeneratorService;
use SAC\EloquentModelGenerator\Support\Factories\ModelGeneratorFactory;
use SAC\EloquentModelGenerator\Support\Definitions\ModelDefinition;
use SAC\EloquentModelGenerator\Support\Definitions\SchemaDefinition;
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
     * @param array<string, mixed> $options
     * @return ModelDefinition
     * @throws ModelGeneratorException
     */
    public function generateModel(string $table, array $options = []): ModelDefinition {
        $schema = $this->getTableSchema($table);
        $columns = $schema['columns'] ?? [];
        $relations = $schema['relations'] ?? [];

        return $this->factory->createModelDefinition(
            $table,
            $columns,
            $relations,
            $options
        );
    }

    /**
     * Generate models for multiple tables.
     *
     * @param array<string> $tables
     * @param array<string, mixed> $config
     * @return array<int, ModelDefinition>
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
     *         type: string,
     *         nullable: bool,
     *         default?: mixed,
     *         length?: int|null,
     *         unsigned?: bool,
     *         autoIncrement?: bool,
     *         primary?: bool,
     *         unique?: bool
     *     }>,
     *     relations?: array<string, array{
     *         type: string,
     *         table: string,
     *         columns: array<string, string>
     *     }>
     * }
     */
    public function getTableSchema(string $table): array {
        // Implementation should be provided by concrete classes
        throw new \RuntimeException('Method getTableSchema() must be implemented by concrete classes.');
    }
}
