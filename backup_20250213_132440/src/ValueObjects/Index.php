<?php

namespace SAC\EloquentModelGenerator\ValueObjects;

/**
 * Class Index
 *
 * Represents a database index with its properties and columns.
 *
 * @package SAC\EloquentModelGenerator\ValueObjects
 */
class Index {
    /**
     * Create a new index instance.
     *
     * @param string $name The name of the index
     * @param string $type The type of index (e.g., 'primary', 'unique', 'index')
     * @param array<int, string> $columns The columns included in the index
     */
    public function __construct(
        private readonly string $name,
        private readonly string $type,
        private readonly array $columns
    ) {
    }

    /**
     * Get the index name.
     *
     * @return string The name of the index
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * Get the index type.
     *
     * @return string The type of the index
     */
    public function getType(): string {
        return $this->type;
    }

    /**
     * Get the index columns.
     *
     * @return array<int, string> The columns included in the index
     */
    public function getColumns(): array {
        return $this->columns;
    }

    /**
     * Check if the index has a specific column.
     *
     * @param string $column The column name to check
     * @return bool True if the column is part of this index
     */
    public function hasColumn(string $column): bool {
        return in_array($column, $this->columns, true);
    }

    /**
     * Get the first column of the index.
     *
     * @return string|null The first column name or null if the index has no columns
     */
    public function getFirstColumn(): ?string {
        return $this->columns[0] ?? null;
    }

    /**
     * Create a new instance with a different name.
     *
     * @param string $name The new index name
     * @return self A new Index instance with the updated name
     */
    public function withName(string $name): self {
        return new self($name, $this->type, $this->columns);
    }

    /**
     * Create a new instance with different columns.
     *
     * @param array<int, string> $columns The new columns for the index
     * @return self A new Index instance with the updated columns
     */
    public function withColumns(array $columns): self {
        return new self($this->name, $this->type, $columns);
    }

    /**
     * Get a string representation of the index.
     *
     * @return string A formatted string containing the index name, type, and columns
     */
    public function toString(): string {
        return sprintf(
            '%s (%s) on %s',
            $this->name,
            $this->type,
            implode(', ', $this->columns)
        );
    }
}
