<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Domain\ValueObjects;

/**
 * @immutable
 */
final class TableDefinition
{
    /**
     * @param  array<string, Column>  $columns
     * @param  array<string, Index>  $indices
     * @param  array<string, ForeignKey>  $foreignKeys
     */
    public function __construct(
        public readonly string $name,
        public readonly array $columns,
        public readonly array $indices = [],
        public readonly array $foreignKeys = [],
        public readonly bool $timestamps = false,
        public readonly bool $softDeletes = false,
    ) {}

    /**
     * Get primary key column.
     */
    public function getPrimaryKey(): ?Column
    {
        foreach ($this->columns as $column) {
            if ($column->isPrimary) {
                return $column;
            }
        }

        return null;
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

        foreach ($this->columns as $name => $column) {
            if (! $column->isPrimary && ! $column->isTimestamp && ! $column->isSoftDelete) {
                $fillable[] = $name;
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

        foreach ($this->columns as $name => $column) {
            if ($column->shouldBeHidden) {
                $hidden[] = $name;
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

        foreach ($this->columns as $name => $column) {
            if ($cast = $column->getCastType()) {
                $casts[$name] = $cast;
            }
        }

        return $casts;
    }

    /**
     * Get unique indices.
     *
     * @return array<string, Index>
     */
    public function getUniqueIndices(): array
    {
        return array_filter(
            $this->indices,
            static fn (Index $index): bool => $index->isUnique
        );
    }

    /**
     * Get foreign keys for a column.
     *
     * @return array<ForeignKey>
     */
    public function getForeignKeysForColumn(string $column): array
    {
        return array_filter(
            $this->foreignKeys,
            static fn (ForeignKey $fk): bool => in_array($column, $fk->columns, true)
        );
    }

    /**
     * Check if column is unique.
     */
    public function isColumnUnique(string $column): bool
    {
        foreach ($this->indices as $index) {
            if ($index->isUnique && in_array($column, $index->columns, true)) {
                return true;
            }
        }

        return false;
    }
}
