<?php

namespace SAC\EloquentModelGenerator\Models;

class GeneratedModelAttribute
{
    /**
     * Create a new generated model attribute instance.
     */
    public function __construct(
        private readonly string $name,
        private readonly string $type,
        private readonly ?int $length = null,
        private readonly bool $nullable = false,
        private readonly mixed $default = null,
        private readonly bool $unsigned = false,
        private readonly bool $autoIncrement = false,
        private readonly bool $primaryKey = false,
        private readonly bool $unique = false
    ) {}

    /**
     * Get the attribute name.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get the attribute type.
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Get the attribute length.
     */
    public function getLength(): ?int
    {
        return $this->length;
    }

    /**
     * Check if the attribute is nullable.
     */
    public function isNullable(): bool
    {
        return $this->nullable;
    }

    /**
     * Get the attribute default value.
     */
    public function getDefault(): mixed
    {
        return $this->default;
    }

    /**
     * Check if the attribute is unsigned.
     */
    public function isUnsigned(): bool
    {
        return $this->unsigned;
    }

    /**
     * Check if the attribute is auto-incrementing.
     */
    public function isAutoIncrement(): bool
    {
        return $this->autoIncrement;
    }

    /**
     * Check if the attribute is a primary key.
     */
    public function isPrimaryKey(): bool
    {
        return $this->primaryKey;
    }

    /**
     * Check if the attribute is unique.
     */
    public function isUnique(): bool
    {
        return $this->unique;
    }
}
