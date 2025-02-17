<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Domain\Database;

/**
 * Immutable value object representing a database column
 */
final class Column
{
    /**
     * @param string $name Column name
     * @param string $type SQL data type
     * @param bool $nullable Whether the column can be null
     * @param mixed $default Default value
     * @param bool $isPrimaryKey Whether this is a primary key
     * @param bool $isAutoIncrement Whether this auto increments
     * @param array<string, mixed> $attributes Additional attributes
     */
    private function __construct(
        private readonly string $name,
        private readonly string $type,
        private readonly bool $nullable,
        private readonly mixed $default,
        private readonly bool $isPrimaryKey,
        private readonly bool $isAutoIncrement,
        private readonly array $attributes
    ) {
    }

    /**
     * Named constructor to create a new column
     *
     * @param string $name Column name
     * @param string $type SQL data type
     * @param bool $nullable Whether the column can be null
     * @param mixed $default Default value
     * @param bool $isPrimaryKey Whether this is a primary key
     * @param bool $isAutoIncrement Whether this auto increments
     * @param array<string, mixed> $attributes Additional attributes
     */
    public static function create(
        string $name,
        string $type,
        bool $nullable = false,
        mixed $default = null,
        bool $isPrimaryKey = false,
        bool $isAutoIncrement = false,
        array $attributes = []
    ): self {
        return new self(
            $name,
            $type,
            $nullable,
            $default,
            $isPrimaryKey,
            $isAutoIncrement,
            $attributes
        );
    }

    public function name(): string
    {
        return $this->name;
    }

    public function type(): string
    {
        return $this->type;
    }

    public function isNullable(): bool
    {
        return $this->nullable;
    }

    public function default(): mixed
    {
        return $this->default;
    }

    public function isPrimaryKey(): bool
    {
        return $this->isPrimaryKey;
    }

    public function isAutoIncrement(): bool
    {
        return $this->isAutoIncrement;
    }

    /**
     * @return array<string, mixed>
     */
    public function attributes(): array
    {
        return $this->attributes;
    }

    public function isForeignKey(): bool
    {
        return isset($this->attributes['foreign_key'])
            && $this->attributes['foreign_key'] === true;
    }

    public function getForeignTable(): ?string
    {
        return $this->attributes['foreign_table'] ?? null;
    }

    public function getForeignColumn(): ?string
    {
        return $this->attributes['foreign_column'] ?? null;
    }
}
