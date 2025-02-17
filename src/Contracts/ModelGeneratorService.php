<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Contracts;

use SAC\EloquentModelGenerator\Model\ModelDefinition;
use SAC\EloquentModelGenerator\Exceptions\ModelGeneratorException;

/**
 * @phpstan-type ModelOptions array{
 *     namespace?: string,
 *     base_class?: class-string|null,
 *     with_soft_deletes?: bool,
 *     with_validation?: bool,
 *     with_relationships?: bool
 * }
 */
interface ModelGeneratorService
{
    /**
     * Generate a model from a table name.
     *
     * @param  ModelOptions  $options
     *
     * @throws ModelGeneratorException If table does not exist or schema analysis fails
     */
    public function generateModel(string $table, array $options = []): ModelDefinition;

    /**
     * Generate models for multiple tables
     *
     * @param  array<string>  $tables
     * @param  ModelOptions  $config
     * @return array<ModelDefinition>
     *
     * @throws ModelGeneratorException If any model generation fails
     */
    public function generateBatch(array $tables, array $config = []): array;

    /**
     * Get all available tables
     *
     * @return array<string>
     *
     * @throws ModelGeneratorException If table list cannot be retrieved
     */
    public function getTables(): array;

    /**
     * Get the schema for a table
     *
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
     *     indexes?: array<string, array{
     *         type: string,
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
     *     }>
     * }
     *
     * @throws ModelGeneratorException If schema analysis fails
     */
    public function getTableSchema(string $table): array;
}
