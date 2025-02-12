<?php

namespace SAC\EloquentModelGenerator\ValueObjects;

class Column {
    /**
     * Create a new column instance.
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
}
