<?php

namespace SAC\EloquentModelGenerator\Services\Schema;

use SAC\EloquentModelGenerator\ValueObjects\TableSchema;

interface SchemaAnalyzerInterface {
    /**
     * Analyze the schema of a table.
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
     */
    public function hasTable(string $table): bool;
}
