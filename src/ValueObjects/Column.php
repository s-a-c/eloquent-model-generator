<?php

namespace SAC\EloquentModelGenerator\ValueObjects;

/**
 * Class Column
 *
 * Represents a database column with its properties and attributes.
 *
 * @package SAC\EloquentModelGenerator\ValueObjects
 */
class Column {
    /**
     * Create a new column instance.
     *
     * @param string $name The name of the column
     * @param string $type The SQL type of the column
     * @param bool $isPrimary Whether this is a primary key column
     * @param bool $isAutoIncrement Whether this column auto-increments
     * @param bool $isNullable Whether this column can be null
     * @param bool $isUnique Whether this column has a unique constraint
     * @param string|null $default The default value for this column
     * @param int|null $length The length/size of the column
     * @param array<string>|null $enumValues The possible values for enum columns
     */
    public function __construct(
        private readonly string $name,
        private readonly string $type,
        private readonly bool $isPrimary,
        private readonly bool $isAutoIncrement,
        private readonly bool $isNullable = false,
        private readonly bool $isUnique = false,
        private readonly ?string $default = null,
        private readonly ?int $length = null,
        private readonly ?array $enumValues = null
    ) {
    }

    /**
     * Get the column name.
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * Get the column type.
     */
    public function getType(): string {
        return $this->type;
    }

    /**
     * Check if the column is primary.
     */
    public function isPrimary(): bool {
        return $this->isPrimary;
    }

    /**
     * Check if the column is auto-incrementing.
     */
    public function isAutoIncrement(): bool {
        return $this->isAutoIncrement;
    }

    /**
     * Check if the column is nullable.
     */
    public function isNullable(): bool {
        return $this->isNullable;
    }

    /**
     * Check if the column is unique.
     */
    public function isUnique(): bool {
        return $this->isUnique;
    }

    /**
     * Get the column default value.
     */
    public function getDefault(): ?string {
        return $this->default;
    }

    /**
     * Get the column length.
     */
    public function getLength(): ?int {
        return $this->length;
    }

    /**
     * Get the enum values.
     *
     * @return array<string>|null
     */
    public function getEnumValues(): ?array {
        return $this->enumValues;
    }

    /**
     * Get a string representation of the column.
     *
     * @return string A formatted string containing the column name, type, and attributes
     */
    public function toString(): string {
        /** @var array<int, string> $attributes */
        $attributes = [];

        if ($this->isPrimary) {
            $attributes[] = 'primary';
        }

        if ($this->isAutoIncrement) {
            $attributes[] = 'auto-increment';
        }

        if ($this->isNullable) {
            $attributes[] = 'nullable';
        }

        if ($this->isUnique) {
            $attributes[] = 'unique';
        }

        if ($this->default !== null) {
            $attributes[] = sprintf('default: %s', $this->default);
        }

        if ($this->length !== null) {
            $attributes[] = sprintf('length: %d', $this->length);
        }

        if ($this->enumValues !== null) {
            $attributes[] = sprintf('enum: [%s]', implode(', ', $this->enumValues));
        }

        return sprintf(
            '%s %s%s',
            $this->name,
            $this->type,
            $attributes ? ' (' . implode(', ', $attributes) . ')' : ''
        );
    }
}
