<?php

namespace SAC\EloquentModelGenerator\Services\Schema;

use SAC\EloquentModelGenerator\ValueObjects\TableSchema;

interface SchemaAnalyzerInterface {
    /**
     * Analyze the schema of a table.
     *
     * @param string $table
     * @return TableSchema
     */
    public function analyze(string $table): TableSchema;

    /**
     * Get all available tables.
     *
     * @return array<string>
     */
    public function getTables(): array;

    /**
     * Check if a table exists.
     *
     * @param string $table
     * @return bool
     */
    public function hasTable(string $table): bool;
}
