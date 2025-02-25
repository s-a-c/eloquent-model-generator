<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Contracts;

use SAC\EloquentModelGenerator\Domain\ValueObjects\RelationshipDefinition;
use SAC\EloquentModelGenerator\Domain\ValueObjects\TableDefinition;
use SAC\EloquentModelGenerator\Exceptions\RelationshipResolutionException;

/**
 * @template TRelation of RelationshipDefinition
 */
interface RelationshipResolverInterface
{
    /**
     * Resolve relationships between tables.
     *
     * @param  array<string, TableDefinition>  $tables
     * @return array<string, array<TRelation>>
     *
     * @throws RelationshipResolutionException
     */
    public function resolve(array $tables): array;

    /**
     * Detect polymorphic relationships for a table.
     *
     * @return array<TRelation>
     *
     * @throws RelationshipResolutionException
     */
    public function detectPolymorphic(TableDefinition $table): array;

    /**
     * Detect many-to-many relationships.
     *
     * @param  array<string, TableDefinition>  $tables
     * @return array<string, array<TRelation>>
     *
     * @throws RelationshipResolutionException
     */
    public function detectManyToMany(array $tables): array;

    /**
     * Get relationship method name.
     */
    public function getMethodName(
        string $localTable,
        string $foreignTable,
        bool $polymorphic = false,
        bool $manyToMany = false
    ): string;

    /**
     * Check if table is a pivot table.
     */
    public function isPivotTable(TableDefinition $table): bool;

    /**
     * Get pivot table details.
     *
     * @return array{
     *     table1: string,
     *     table2: string,
     *     column1: string,
     *     column2: string,
     *     timestamps: bool
     * }|null
     */
    public function getPivotDetails(TableDefinition $table): ?array;

    /**
     * Validate relationship configuration.
     *
     * @param array{
     *     localKey: string,
     *     foreignKey: string,
     *     type: string,
     *     polymorphic: bool,
     *     morphType?: string,
     *     morphId?: string
     * } $config
     */
    public function validateRelationship(array $config): bool;
}
