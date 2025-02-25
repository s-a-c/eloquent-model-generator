<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Services\Contracts;

use SAC\EloquentModelGenerator\Domain\ValueObjects\RelationshipDefinition;
use SAC\EloquentModelGenerator\Domain\ValueObjects\TableDefinition;

/**
 * Service interface for resolving relationships between models.
 */
interface RelationshipResolverInterface
{
    /**
     * Resolve all relationships for a table.
     *
     * @return array<RelationshipDefinition>
     *
     * @throws \SAC\EloquentModelGenerator\Exceptions\SchemaAnalysisException
     */
    public function resolveRelationships(TableDefinition $table): array;

    /**
     * Detect polymorphic relationships.
     *
     * @return array<RelationshipDefinition>
     *
     * @throws \SAC\EloquentModelGenerator\Exceptions\SchemaAnalysisException
     */
    public function detectPolymorphicRelations(TableDefinition $table): array;

    /**
     * Detect many-to-many relationships.
     *
     * @return array<RelationshipDefinition>
     *
     * @throws \SAC\EloquentModelGenerator\Exceptions\SchemaAnalysisException
     */
    public function detectManyToManyRelations(TableDefinition $table): array;

    /**
     * Check if a table is a pivot table.
     */
    public function isPivotTable(TableDefinition $table): bool;

    /**
     * Get the morph map for polymorphic relationships.
     *
     * @return array<string, string>
     */
    public function getMorphMap(): array;

    /**
     * Validate relationships for circular dependencies.
     *
     * @param  array<RelationshipDefinition>  $relationships
     *
     * @throws \SAC\EloquentModelGenerator\Exceptions\SchemaAnalysisException
     */
    public function validateRelationships(array $relationships): void;
}
