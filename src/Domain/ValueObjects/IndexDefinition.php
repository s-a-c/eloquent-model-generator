<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Domain\ValueObjects;

use Illuminate\Support\Str;
use InvalidArgumentException;

/**
 * Represents a database index definition.
 */
final readonly class IndexDefinition
{
    /**
     * @param  string  $name  Index name
     * @param  array<string>  $columns  Columns included in the index
     * @param  bool  $isPrimary  Whether this is a primary key index
     * @param  bool  $isUnique  Whether this is a unique index
     * @param  bool  $isForeign  Whether this is a foreign key index
     * @param  array<string, mixed>  $attributes  Additional index attributes
     */
    public function __construct(
        public string $name,
        public array $columns,
        public bool $isPrimary = false,
        public bool $isUnique = false,
        public bool $isForeign = false,
        public array $attributes = [],
    ) {
        // Validate column names
        foreach ($this->columns as $column) {
            if (! is_string($column)) {
                throw new InvalidArgumentException('Column names must be strings');
            }
        }

        // Validate that at least one column is specified
        if (empty($this->columns)) {
            throw new InvalidArgumentException('Index must include at least one column');
        }

        // Validate that primary key indices are unique
        if ($this->isPrimary && ! $this->isUnique) {
            throw new InvalidArgumentException('Primary key indices must be unique');
        }
    }

    /**
     * Get the foreign key reference details if this is a foreign key index.
     *
     * @return array{table: string, columns: array<string>}|null
     */
    public function getForeignKeyReference(): ?array
    {
        if (! $this->isForeign) {
            return null;
        }

        return [
            'table' => $this->attributes['foreign_table'] ?? '',
            'columns' => $this->attributes['foreign_columns'] ?? [],
        ];
    }

    /**
     * Check if this index represents a polymorphic relationship.
     */
    public function isPolymorphic(): bool
    {
        if (! $this->isForeign || count($this->columns) !== 2) {
            return false;
        }

        // Check if the columns follow the polymorphic naming convention
        $lastColumn = end($this->columns);

        return str_ends_with($lastColumn, '_type');
    }

    /**
     * Get the base name for a polymorphic relationship.
     */
    public function getPolymorphicBaseName(): ?string
    {
        if (! $this->isPolymorphic()) {
            return null;
        }

        // Remove '_id' from the first column name
        return preg_replace('/_id$/', '', reset($this->columns));
    }

    /**
     * Check if this index might represent a many-to-many relationship.
     */
    public function isManyToMany(): bool
    {
        // Many-to-many pivot tables typically have exactly two foreign key indices
        if (! $this->isForeign || count($this->columns) !== 1) {
            return false;
        }

        return isset($this->attributes['is_pivot']) && $this->attributes['is_pivot'] === true;
    }

    /**
     * Get the method name for the relationship represented by this index.
     */
    public function getRelationshipMethodName(): ?string
    {
        if (! $this->isForeign) {
            return null;
        }

        $reference = $this->getForeignKeyReference();
        if (! $reference) {
            return null;
        }

        // For polymorphic relationships, use the base name
        if ($this->isPolymorphic()) {
            return $this->getPolymorphicBaseName();
        }

        // For regular relationships, use the foreign table name
        $table = $reference['table'];

        return $this->isManyToMany()
            ? str_replace('_', '', ucwords($table, '_')) // pluralized
            : str_replace('_', '', ucwords(Str::singular($table), '_')); // singularized
    }
}
