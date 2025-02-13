<?php

namespace SAC\EloquentModelGenerator\Contracts;

use SAC\EloquentModelGenerator\Exceptions\ModelGeneratorSchemaAnalyzerException;

interface SchemaAnalyzer {
    /**
     * Analyze the database table schema.
     *
     * @param string $table
     * @return array{
     *     columns: array<string, array{
     *         type: string,
     *         nullable: bool,
     *         primary?: bool,
     *         unique?: bool,
     *         index?: bool,
     *         foreign?: array{table: string, column: string},
     *         default?: mixed
     *     }>,
     *     relationships: array<array{
     *         type: string,
     *         foreignTable: string,
     *         foreignKey: string,
     *         localKey: string
     *     }>
     * }
     * @throws ModelGeneratorSchemaAnalyzerException
     */
    public function analyze(string $table): array;

    /**
     * Get the list of tables in the database.
     *
     * @return array<string>
     * @throws ModelGeneratorSchemaAnalyzerException
     */
    public function getTables(): array;

    /**
     * Check if a table exists.
     *
     * @param string $table
     * @return bool
     */
    public function tableExists(string $table): bool;
}
