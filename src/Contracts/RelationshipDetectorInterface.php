<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Contracts;

use SAC\EloquentModelGenerator\Domain\ValueObjects\ColumnDefinition;
use SAC\EloquentModelGenerator\Domain\ValueObjects\IndexDefinition;
use SAC\EloquentModelGenerator\Domain\ValueObjects\RelationshipDefinition;

/**
 * Contract for detecting database relationships.
 */
interface RelationshipDetectorInterface
{

    /**
     * Detect relationships for a table.
     *
     * @param string $table The table name
     * @param array<ColumnDefinition> $columns The table columns
     * @param array<IndexDefinition> $indices The table indices
     * @return array<RelationshipDefinition> The detected relationships
     *
     * @throws \SAC\EloquentModelGenerator\Exceptions\RelationshipDetectionException
     */
    public function detectRelationships(
        string $table,
        array $columns,
        array $indices,
    ): array;

    /**
     * Check if a column represents a foreign key.
     *
     * @param string $column The column name
     * @param array<IndexDefinition> $indices The table indices
     */
    public function isForeignKey(string $column, array $indices): bool;

    /**
     * Check if a column is part of a polymorphic relationship.
     *
     * @param string $column The column name
     * @param array<ColumnDefinition> $columns All table columns
     */
    public function isPolymorphic(string $column, array $columns): bool;

    /**
     * Get the referenced table for a foreign key.
     *
     * @param string $column The column name
     * @param array<IndexDefinition> $indices The table indices
     * @return string|null The referenced table name or null if not found
     */
    public function getReferencedTable(string $column, array $indices): ?string;

    /**
     * Get the referenced column for a foreign key.
     *
     * @param string $column The column name
     * @param array<IndexDefinition> $indices The table indices
     * @return string|null The referenced column name or null if not found
     */
    public function getReferencedColumn(string $column, array $indices): ?string;

    /**
     * Check if a table has a relationship with another table.
     *
     * @param string $table The table name
     * @param string $relatedTable The related table name
     * @param array<IndexDefinition> $indices The table indices
     */
    public function hasRelationship(string $table, string $relatedTable, array $indices): bool;

    /**
     * Get the relationship type between two tables.
     *
     * @param string $table The table name
     * @param string $relatedTable The related table name
     * @param array<IndexDefinition> $indices The table indices
     * @return string|null The relationship type or null if no relationship exists
     */
    public function getRelationshipType(string $table, string $relatedTable, array $indices): ?string;

    /**
     * Get the polymorphic base name for a column.
     *
     * @param string $column The column name
     */
    public function getPolymorphicBaseName(string $column): string;

    /**
     * Get the morph type column name for a polymorphic relationship.
     *
     * @param string $baseName The polymorphic base name
     */
    public function getMorphTypeColumn(string $baseName): string;

    /**
     * Get the morph ID column name for a polymorphic relationship.
     *
     * @param string $baseName The polymorphic base name
     */
    public function getMorphIdColumn(string $baseName): string;

}
