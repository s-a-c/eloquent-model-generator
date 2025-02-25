<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Contracts;

use SAC\EloquentModelGenerator\Domain\ValueObjects\TableDefinition;
use SAC\EloquentModelGenerator\Exceptions\SchemaAnalysisException;

/**
 * @template TDefinition of TableDefinition
 */
interface SchemaAnalyzerInterface
{
    /**
     * Analyze a database table structure.
     *
     * @return TDefinition
     *
     * @throws SchemaAnalysisException
     */
    public function analyze(string $table): TableDefinition;

    /**
     * Get all available table names.
     *
     * @return array<string>
     *
     * @throws SchemaAnalysisException
     */
    public function getTables(): array;

    /**
     * Check if a table exists.
     */
    public function tableExists(string $table): bool;

    /**
     * Get table column definitions.
     *
     * @return array<string, array{
     *     type: string,
     *     nullable: bool,
     *     default: mixed,
     *     length: int|null,
     *     precision: int|null,
     *     scale: int|null,
     *     unsigned: bool,
     *     autoIncrement: bool,
     *     primary: bool,
     *     unique: bool
     * }>
     *
     * @throws SchemaAnalysisException
     */
    public function getColumns(string $table): array;

    /**
     * Get table indices.
     *
     * @return array<string, array{
     *     columns: array<string>,
     *     type: string,
     *     unique: bool
     * }>
     *
     * @throws SchemaAnalysisException
     */
    public function getIndices(string $table): array;

    /**
     * Get foreign key constraints.
     *
     * @return array<string, array{
     *     columns: array<string>,
     *     foreignTable: string,
     *     foreignColumns: array<string>,
     *     onDelete: string|null,
     *     onUpdate: string|null
     * }>
     *
     * @throws SchemaAnalysisException
     */
    public function getForeignKeys(string $table): array;
}
