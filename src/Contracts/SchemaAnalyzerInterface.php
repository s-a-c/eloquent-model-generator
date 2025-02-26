<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Contracts;

use SAC\EloquentModelGenerator\Domain\ValueObjects\TableDefinition;

/**
 * Contract for database schema analysis services.
 */
interface SchemaAnalyzerInterface
{

    /**
     * Analyze a database table and return its definition.
     *
     * @param string $table The table name to analyze
     * @return TableDefinition The table definition
     */
    public function analyzeTable(string $table): TableDefinition;

    /**
     * Get a list of all tables in the database.
     *
     * @return array<string> List of table names
     */
    public function getTables(): array;

    /**
     * Check if a table exists in the database.
     *
     * @param string $table The table name to check
     * @return bool True if the table exists
     */
    public function tableExists(string $table): bool;

    /**
     * Get column definitions for a table.
     *
     * @param string $table The table name
     * @return array<\SAC\EloquentModelGenerator\Domain\ValueObjects\ColumnDefinition>
     */
    public function getColumns(string $table): array;

    /**
     * Get index definitions for a table.
     *
     * @param string $table The table name
     * @return array<\SAC\EloquentModelGenerator\Domain\ValueObjects\IndexDefinition>
     */
    public function getIndices(string $table): array;

    /**
     * Get relationship definitions for a table.
     *
     * @param string $table The table name
     * @return array<\SAC\EloquentModelGenerator\Domain\ValueObjects\RelationshipDefinition>
     */
    public function getRelationships(string $table): array;

}