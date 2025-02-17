<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Domain\Database;

use Illuminate\Support\Collection;

/**
 * Immutable value object representing a database table definition
 */
final class TableDefinition
{
    /**
     * @param string $name Table name
     * @param Collection<Column> $columns Table columns
     * @param Collection<Index> $indexes Table indexes
     */
    private function __construct(
        private readonly string $name,
        private readonly Collection $columns,
        private readonly Collection $indexes
    ) {
    }

    /**
     * Named constructor to create a new table definition
     *
     * @param string $name Table name
     * @param Collection<Column> $columns Table columns
     * @param Collection<Index> $indexes Table indexes
     */
    public static function create(
        string $name,
        Collection $columns,
        Collection $indexes
    ): self {
        return new self($name, $columns, $indexes);
    }

    /**
     * Get the table name
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * Get all columns in the table
     *
     * @return Collection<Column>
     */
    public function columns(): Collection
    {
        return $this->columns;
    }

    /**
     * Get all indexes in the table
     *
     * @return Collection<Index>
     */
    public function indexes(): Collection
    {
        return $this->indexes;
    }

    /**
     * Get a specific column by name
     */
    public function column(string $name): ?Column
    {
        return $this->columns->first(fn (Column $column) => $column->name() === $name);
    }

    /**
     * Get the primary key columns
     *
     * @return Collection<Column>
     */
    public function primaryKey(): Collection
    {
        return $this->columns->filter(fn (Column $column) => $column->isPrimaryKey());
    }

    /**
     * Get all foreign key columns
     *
     * @return Collection<Column>
     */
    public function foreignKeys(): Collection
    {
        return $this->columns->filter(fn (Column $column) => $column->isForeignKey());
    }

    /**
     * Check if the table has a specific column
     */
    public function hasColumn(string $name): bool
    {
        return $this->columns->contains(fn (Column $column) => $column->name() === $name);
    }

    /**
     * Check if the table has a specific index
     */
    public function hasIndex(string $name): bool
    {
        return $this->indexes->contains(fn (Index $index) => $index->name() === $name);
    }
}
