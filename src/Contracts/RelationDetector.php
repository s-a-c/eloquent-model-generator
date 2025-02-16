<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Contracts;

use SAC\EloquentModelGenerator\ValueObjects\Column;
use SAC\EloquentModelGenerator\ValueObjects\ForeignKey;

interface RelationDetector {
    /**
     * Detect relationships for a table.
     *
     * @param string $table
     * @param Column[] $columns
     * @param ForeignKey[] $foreignKeys
     * @return array<array{
     *     type: string,
     *     name: string,
     *     model?: string,
     *     foreignKey?: string,
     *     localKey?: string,
     *     table?: string,
     *     foreignPivotKey?: string,
     *     relatedPivotKey?: string,
     *     parentKey?: string,
     *     relatedKey?: string,
     *     morphName?: string,
     *     morphType?: string,
     *     morphId?: string
     * }>
     */
    public function detectRelations(string $table, array $columns, array $foreignKeys = []): array;

    /**
     * Detect morph relationships for a table.
     *
     * @param string $table
     * @param Column[] $columns
     * @param Column[] $morphColumns
     * @return array<array{
     *     type: string,
     *     name: string,
     *     model?: string,
     *     morphName: string
     * }>
     */
    public function detectMorphRelations(string $table, array $columns, array $morphColumns): array;

    /**
     * Detect morph-to-many relationships for a table.
     *
     * @param string $table
     * @param Column[] $columns
     * @param Column[] $morphPivotColumns
     * @return array<array{
     *     type: string,
     *     name: string,
     *     model: string,
     *     table: string,
     *     morphName: string
     * }>
     */
    public function detectMorphToManyRelations(string $table, array $columns, array $morphPivotColumns): array;
}