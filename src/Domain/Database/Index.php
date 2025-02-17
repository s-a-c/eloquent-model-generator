<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Domain\Database;

use Illuminate\Support\Collection;

/**
 * Immutable value object representing a database index
 */
final class Index
{
    /**
     * @param string $name Index name
     * @param Collection<string> $columns Indexed column names
     * @param bool $isUnique Whether this is a unique index
     * @param string $type Index type (BTREE, HASH, etc.)
     */
    private function __construct(
        private readonly string $name,
        private readonly Collection $columns,
        private readonly bool $isUnique,
        private readonly string $type
    ) {
    }

    /**
     * Named constructor to create a new index
     *
     * @param string $name Index name
     * @param Collection<string> $columns Indexed column names
     * @param bool $isUnique Whether this is a unique index
     * @param string $type Index type (BTREE, HASH, etc.)
     */
    public static function create(
        string $name,
        Collection $columns,
        bool $isUnique = false,
        string $type = 'BTREE'
    ): self {
        return new self($name, $columns, $isUnique, $type);
    }

    public function name(): string
    {
        return $this->name;
    }

    /**
     * @return Collection<string>
     */
    public function columns(): Collection
    {
        return $this->columns;
    }

    public function isUnique(): bool
    {
        return $this->isUnique;
    }

    public function type(): string
    {
        return $this->type;
    }

    /**
     * Check if this index contains a specific column
     */
    public function hasColumn(string $columnName): bool
    {
        return $this->columns->contains($columnName);
    }

    /**
     * Check if this is a single-column index
     */
    public function isSingleColumn(): bool
    {
        return $this->columns->count() === 1;
    }

    /**
     * Get the first column name in the index
     */
    public function firstColumn(): ?string
    {
        return $this->columns->first();
    }
}
