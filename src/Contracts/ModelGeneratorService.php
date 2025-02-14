<?php

namespace SAC\EloquentModelGenerator\Contracts;

use SAC\EloquentModelGenerator\Support\Definitions\ModelDefinition;
use SAC\EloquentModelGenerator\Exceptions\ModelGeneratorException;

/**
 * @phpstan-type ColumnDefinition array{
 *     type: non-empty-string,
 *     nullable: bool,
 *     default?: mixed,
 *     length?: positive-int|null,
 *     unsigned?: bool,
 *     autoIncrement?: bool,
 *     primary?: bool,
 *     unique?: bool,
 *     comment?: non-empty-string|null,
 *     allowed?: array<string>|null
 * }
 *
 * @phpstan-type SchemaDefinition array{
 *     columns: array<string, ColumnDefinition>,
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
 *     relations?: array<string, array{
 *         type: string,
 *         model?: string,
 *         foreignKey?: string,
 *         localKey?: string,
 *         morphType?: string
 *     }>,
 *     timestamps?: bool,
 *     softDeletes?: bool,
 *     primaryKey?: string,
 *     incrementing?: bool
 * }
 *
 * @phpstan-type ModelOptions array{
 *     class_name?: string,
 *     namespace?: string,
 *     base_class?: class-string|null,
 *     with_soft_deletes?: bool,
 *     with_validation?: bool,
 *     with_relationships?: bool
 * }
 */
interface ModelGeneratorService {
    /**
     * Generate a model from a table name.
     *
     * @param ModelOptions $options
     * @throws ModelGeneratorException If table does not exist or schema analysis fails
     */
    public function generateModel(string $table, array $options = []): ModelDefinition;

    /**
     * Generate models for multiple tables
     *
     * @param array<string> $tables
     * @param ModelOptions $config
     * @return array<ModelDefinition>
     * @throws ModelGeneratorException If any model generation fails
     */
    public function generateBatch(array $tables, array $config = []): array;

    /**
     * Get all available tables
     *
     * @return array<string>
     * @throws ModelGeneratorException If table list cannot be retrieved
     */
    public function getTables(): array;

    /**
     * Get the schema for a table
     *
     * @return SchemaDefinition
     * @throws ModelGeneratorException If schema analysis fails
     */
    public function getTableSchema(string $table): array;
}
