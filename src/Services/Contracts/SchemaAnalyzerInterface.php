<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Services\Contracts;

use SAC\EloquentModelGenerator\Domain\ValueObjects\TableDefinition;

/**
 * Service interface for analyzing database schema.
 */
interface SchemaAnalyzerInterface
{
    /**
     * Analyze a database table and return its definition.
     *
     * @throws \SAC\EloquentModelGenerator\Exceptions\SchemaAnalysisException
     */
    public function analyzeTable(string $table): TableDefinition;

    /**
     * Get a list of all tables in the database.
     *
     * @return array<string>
     *
     * @throws \SAC\EloquentModelGenerator\Exceptions\SchemaAnalysisException
     */
    public function getTables(): array;

    /**
     * Check if a table exists in the database.
     */
    public function tableExists(string $table): bool;

    /**
     * Get the columns for a table.
     *
     * @return array<\SAC\EloquentModelGenerator\Domain\ValueObjects\ColumnDefinition>
     *
     * @throws \SAC\EloquentModelGenerator\Exceptions\SchemaAnalysisException
     */
    public function getColumns(string $table): array;

    /**
     * Get the indices for a table.
     *
     * @return array<\SAC\EloquentModelGenerator\Domain\ValueObjects\IndexDefinition>
     *
     * @throws \SAC\EloquentModelGenerator\Exceptions\SchemaAnalysisException
     */
    public function getIndices(string $table): array;

    /**
     * Get the relationships for a table.
     *
     * @return array<\SAC\EloquentModelGenerator\Domain\ValueObjects\RelationshipDefinition>
     *
     * @throws \SAC\EloquentModelGenerator\Exceptions\SchemaAnalysisException
     */
    public function getRelationships(string $table): array;
}
