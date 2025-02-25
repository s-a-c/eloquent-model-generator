<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Domain\ValueObjects;

/**
 * @immutable
 */
final class ForeignKey
{
    public const ACTION_CASCADE = 'CASCADE';

    public const ACTION_RESTRICT = 'RESTRICT';

    public const ACTION_SET_NULL = 'SET NULL';

    public const ACTION_NO_ACTION = 'NO ACTION';

    /**
     * @param  array<string>  $columns
     * @param  array<string>  $foreignColumns
     */
    public function __construct(
        public readonly string $name,
        public readonly array $columns,
        public readonly string $foreignTable,
        public readonly array $foreignColumns,
        public readonly ?string $onDelete = null,
        public readonly ?string $onUpdate = null,
    ) {}

    /**
     * Get relationship name.
     */
    public function getRelationshipName(bool $pluralize = false): string
    {
        $name = $this->foreignTable;

        // Remove common prefixes/suffixes
        $name = preg_replace('/^tbl_|_table$/', '', $name);

        // Convert snake_case to camelCase
        $name = str_replace('_', '', ucwords($name, '_'));

        // Handle special cases for common column names
        if (count($this->columns) === 1) {
            $column = $this->columns[0];
            if (str_ends_with($column, '_id')) {
                $name = str_replace('_id', '', $column);
                $name = str_replace('_', '', ucwords($name, '_'));
            }
        }

        if ($pluralize) {
            // Basic pluralization rules
            if (str_ends_with($name, 'y')) {
                $name = mb_substr($name, 0, -1).'ies';
            } elseif (! str_ends_with($name, 's')) {
                $name .= 's';
            }
        }

        return lcfirst($name);
    }

    /**
     * Get relationship type.
     */
    public function getRelationType(): string
    {
        if ($this->isOneToOne()) {
            return 'belongsTo';
        }

        return 'hasMany';
    }

    /**
     * Check if relationship is one-to-one.
     */
    public function isOneToOne(): bool
    {
        return count($this->columns) === 1 &&
               count($this->foreignColumns) === 1 &&
               str_ends_with($this->columns[0], '_id');
    }

    /**
     * Check if relationship is polymorphic.
     */
    public function isPolymorphic(): bool
    {
        if (count($this->columns) !== 2) {
            return false;
        }

        $columns = array_map('strtolower', $this->columns);
        sort($columns);

        return $columns[1] === str_replace('_id', '_type', $columns[0]);
    }

    /**
     * Get polymorphic type column.
     */
    public function getPolymorphicTypeColumn(): ?string
    {
        if (! $this->isPolymorphic()) {
            return null;
        }

        foreach ($this->columns as $column) {
            if (str_ends_with($column, '_type')) {
                return $column;
            }
        }

        return null;
    }

    /**
     * Get polymorphic ID column.
     */
    public function getPolymorphicIdColumn(): ?string
    {
        if (! $this->isPolymorphic()) {
            return null;
        }

        foreach ($this->columns as $column) {
            if (str_ends_with($column, '_id')) {
                return $column;
            }
        }

        return null;
    }

    /**
     * Get foreign key constraint definition.
     */
    public function getConstraintDefinition(): string
    {
        $definition = sprintf(
            'FOREIGN KEY (%s) REFERENCES %s (%s)',
            implode(', ', $this->columns),
            $this->foreignTable,
            implode(', ', $this->foreignColumns)
        );

        if ($this->onDelete) {
            $definition .= " ON DELETE {$this->onDelete}";
        }

        if ($this->onUpdate) {
            $definition .= " ON UPDATE {$this->onUpdate}";
        }

        return $definition;
    }
}
