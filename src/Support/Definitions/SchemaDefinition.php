<?php

namespace SAC\EloquentModelGenerator\Support\Definitions;

use Illuminate\Support\Collection;
use SAC\EloquentModelGenerator\ValueObjects\Column;
use SAC\EloquentModelGenerator\ValueObjects\Index;

/**
 * Class SchemaDefinition
 *
 * Represents a database table schema with its columns and indexes.
 */
class SchemaDefinition
{
    /**
     * Create a new schema definition instance.
     *
     * @param  Collection<int, Column>  $columns
     * @param  Collection<int, Index>  $indexes
     */
    public function __construct(private readonly string $table, private readonly Collection $columns, private readonly Collection $indexes) {}

    /**
     * Get the table name.
     */
    public function getTable(): string
    {
        return $this->table;
    }

    /**
     * Get the columns.
     *
     * @return Collection<int, Column>
     */
    public function getColumns(): Collection
    {
        return $this->columns;
    }

    /**
     * Get the indexes.
     *
     * @return Collection<int, Index>
     */
    public function getIndexes(): Collection
    {
        return $this->indexes;
    }

    /**
     * Get all nullable columns.
     *
     * @return Collection<int, Column>
     */
    public function getNullableColumns(): Collection
    {
        return $this->columns->filter(fn (Column $column): bool => $column->isNullable());
    }

    /**
     * Get all required columns.
     *
     * @return Collection<int, Column>
     */
    public function getRequiredColumns(): Collection
    {
        return $this->columns->filter(fn (Column $column): bool => ! $column->isNullable());
    }

    /**
     * Get all columns of a specific type.
     *
     * @return Collection<int, Column>
     */
    public function getColumnsByType(string $type): Collection
    {
        return $this->columns->filter(fn (Column $column): bool => $column->getType() === $type);
    }

    /**
     * Get all indexes that include a specific column.
     *
     * @return Collection<int, Index>
     */
    public function getIndexesForColumn(string $columnName): Collection
    {
        return $this->indexes->filter(fn (Index $index): bool => $index->hasColumn($columnName));
    }

    /**
     * Check if the schema has a primary key.
     */
    public function hasPrimaryKey(): bool
    {
        return $this->indexes->contains(fn (Index $index): bool => $index->getType() === 'primary');
    }

    /**
     * Get a string representation of the schema.
     *
     * @return string A formatted string representation of the schema including table name, columns, and indexes
     */
    public function toString(): string
    {
        /** @var array<int, string> $output */
        $output = [
            sprintf('Table: %s', $this->table),
            'Columns:',
        ];

        foreach ($this->columns as $column) {
            $output[] = sprintf('  - %s', $column->toString());
        }

        $output[] = 'Indexes:';
        foreach ($this->indexes as $index) {
            $output[] = sprintf('  - %s', $index->toString());
        }

        return implode(PHP_EOL, $output);
    }
}
