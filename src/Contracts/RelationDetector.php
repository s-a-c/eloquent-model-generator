<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Contracts;

interface RelationDetector {
    /**
     * Detect all relationships for a table.
     *
     * @return array<array{
     *     type: string,
     *     name: string,
     *     related: string,
     *     foreignKey: string,
     *     localKey: string,
     *     through?: string,
     *     pivotTable?: string,
     *     pivotForeignKey?: string,
     *     pivotRelatedKey?: string
     * }>
     */
    public function detectRelationships(string $table): array;
}