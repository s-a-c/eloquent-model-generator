<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Domain\ValueObjects;

/**
 * @immutable
 */
final class TableDefinition
{

    /**
     * @param  array<ColumnDefinition>  $columns
     * @param  array<IndexDefinition>  $indices
     * @param  array<RelationshipDefinition>  $relationships
     */
    public function __construct(
        public readonly string $name,
        public readonly array $columns,
        public readonly array $indices = [],
        public readonly array $relationships = [],
        public readonly bool $timestamps = FALSE,
        public readonly bool $softDeletes = FALSE,
    ) {

    }

    /**
     * Get primary key column.
     */
    public function getPrimaryKey(): ?ColumnDefinition
    {

        foreach ($this->columns as $column)
        {
            if ($column->isPrimary)
            {
                return $column;
            }
        }

        return NULL;
    }

    /**
     * Check if table has timestamps.
     */
    public function hasTimestamps(): bool
    {

        return $this->timestamps;
    }

    /**
     * Check if table has soft deletes.
     */
    public function hasSoftDeletes(): bool
    {

        return $this->softDeletes;
    }

    /**
     * Get fillable columns.
     *
     * @return array<string>
     */
    public function getFillableColumns(): array
    {

        $fillable = [];

        foreach ($this->columns as $column)
        {
            if (!$column->isPrimary && !$column->isTimestamp && !$column->isSoftDelete)
            {
                $fillable[] = $column->name;
            }
        }

        return $fillable;
    }

    /**
     * Get hidden columns.
     *
     * @return array<string>
     */
    public function getHiddenColumns(): array
    {

        $hidden = [];

        foreach ($this->columns as $column)
        {
            if ($column->getAttribute('hidden', FALSE))
            {
                $hidden[] = $column->name;
            }
        }

        return $hidden;
    }

    /**
     * Get column type mappings.
     *
     * @return array<string, string>
     */
    public function getColumnCasts(): array
    {

        $casts = [];

        foreach ($this->columns as $column)
        {
            if ($cast = $column->getAttribute('cast_type'))
            {
                $casts[$column->name] = $cast;
            }
        }

        return $casts;
    }

    /**
     * Get unique indices.
     *
     * @return array<IndexDefinition>
     */
    public function getUniqueIndices(): array
    {

        return array_filter(
            $this->indices,

            static fn(IndexDefinition $index): bool => $index->isUnique
        );
    }

    /**
     * Get foreign key indices for a column.
     *
     * @return array<IndexDefinition>
     */
    public function getForeignKeysForColumn(string $column): array
    {

        return array_filter(
            $this->indices,

            static fn(IndexDefinition $index): bool => $index->isForeign && in_array($column, $index->columns, TRUE)
        );
    }

    /**
     * Check if column is unique.
     */
    public function isColumnUnique(string $column): bool
    {

        foreach ($this->indices as $index)
        {
            if ($index->isUnique && in_array($column, $index->columns, TRUE))
            {
                return TRUE;
            }
        }

        return FALSE;
    }

    /**
     * Get relationships by type.
     *
     * @return array<RelationshipDefinition>
     */
    public function getRelationshipsByType(string $type): array
    {

        return array_filter(
            $this->relationships,

            static fn(RelationshipDefinition $rel): bool => $rel->type === $type
        );
    }

}
