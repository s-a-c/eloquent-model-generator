<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\ValueObjects;

/**
 * Column Value Object
 *
 * Represents a database column with its properties and metadata.
 */
class Column {
    /**
     * @param string $name The column name
     * @param string $type The column type
     * @param bool $nullable Whether the column is nullable
     * @param bool $primary Whether the column is primary key
     * @param bool $unique Whether the column is unique
     * @param bool $autoIncrement Whether the column auto-increments
     * @param mixed|null $default The column default value
     * @param array<string, mixed> $attributes Additional column attributes
     */
    public function __construct(
        private readonly string $name,
        private readonly string $type,
        private readonly bool $nullable = false,
        private readonly bool $primary = false,
        private readonly bool $unique = false,
        private readonly bool $autoIncrement = false,
        private readonly mixed $default = null,
        private readonly array $attributes = []
    ) {
    }

    /**
     * Get the column name.
     *
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * Get the column type.
     *
     * @return string
     */
    public function getType(): string {
        return $this->type;
    }

    /**
     * Check if the column is nullable.
     *
     * @return bool
     */
    public function isNullable(): bool {
        return $this->nullable;
    }

    /**
     * Check if the column is primary key.
     *
     * @return bool
     */
    public function isPrimary(): bool {
        return $this->primary;
    }

    /**
     * Check if the column is unique.
     *
     * @return bool
     */
    public function isUnique(): bool {
        return $this->unique;
    }

    /**
     * Check if the column auto-increments.
     *
     * @return bool
     */
    public function isAutoIncrement(): bool {
        return $this->autoIncrement;
    }

    /**
     * Get the column default value.
     *
     * @return mixed
     */
    public function getDefault(): mixed {
        return $this->default;
    }

    /**
     * Check if the column has a default value.
     *
     * @return bool
     */
    public function hasDefault(): bool {
        return $this->default !== null;
    }

    /**
     * Get additional column attributes.
     *
     * @return array<string, mixed>
     */
    public function getAttributes(): array {
        return $this->attributes;
    }

    /**
     * Get a specific column attribute.
     *
     * @param string $key The attribute key
     * @param mixed $default Default value if attribute doesn't exist
     * @return mixed
     */
    public function getAttribute(string $key, mixed $default = null): mixed {
        return $this->attributes[$key] ?? $default;
    }

    /**
     * Check if the column has a specific attribute.
     *
     * @param string $key The attribute key
     * @return bool
     */
    public function hasAttribute(string $key): bool {
        return isset($this->attributes[$key]);
    }

    /**
     * Get the column definition for migration.
     *
     * @return string
     */
    public function getMigrationDefinition(): string {
        $definition = "\$table->{$this->getMigrationMethod()}('{$this->name}')";

        if ($this->nullable) {
            $definition .= '->nullable()';
        }

        if ($this->unique) {
            $definition .= '->unique()';
        }

        if ($this->hasDefault()) {
            $default = is_string($this->default) ? "'{$this->default}'" : $this->default;
            $definition .= "->default({$default})";
        }

        return $definition . ';';
    }

    /**
     * Get the migration method for this column type.
     *
     * @return string
     */
    private function getMigrationMethod(): string {
        return match ($this->type) {
            'integer' => $this->autoIncrement ? 'increments' : 'integer',
            'bigInteger' => $this->autoIncrement ? 'bigIncrements' : 'bigInteger',
            'string' => 'string',
            'text' => 'text',
            'boolean' => 'boolean',
            'date' => 'date',
            'datetime' => 'datetime',
            'timestamp' => 'timestamp',
            'decimal' => 'decimal',
            'float' => 'float',
            'json' => 'json',
            default => 'string',
        };
    }

    /**
     * Get the PHP type hint for this column.
     *
     * @return string
     */
    public function getPhpType(): string {
        $type = match ($this->type) {
            'integer', 'bigInteger' => 'int',
            'decimal', 'float' => 'float',
            'boolean' => 'bool',
            'json', 'array' => 'array',
            'datetime', 'timestamp' => '\Carbon\Carbon',
            'date' => '\Carbon\Carbon',
            default => 'string',
        };

        return $this->nullable ? "{$type}|null" : $type;
    }

    /**
     * Get the DocBlock type for this column.
     *
     * @return string
     */
    public function getDocType(): string {
        return $this->getPhpType();
    }
}