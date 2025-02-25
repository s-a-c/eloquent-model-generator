<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Domain\ValueObjects;

/**
 * Represents a database column's structure and properties.
 */
final readonly class ColumnDefinition
{
    /**
     * @param  string  $name  Column name
     * @param  string  $type  Column type (e.g., string, integer)
     * @param  bool  $nullable  Whether the column is nullable
     * @param  mixed  $default  Default value
     * @param  bool  $isPrimary  Whether this is a primary key
     * @param  bool  $isUnique  Whether this column has a unique constraint
     * @param  int|null  $length  Maximum length for string columns
     * @param  array<string, mixed>  $attributes  Additional column attributes
     */
    public function __construct(
        public string $name,
        public string $type,
        public bool $nullable = false,
        public mixed $default = null,
        public bool $isPrimary = false,
        public bool $isUnique = false,
        public ?int $length = null,
        public array $attributes = [],
    ) {}

    /**
     * Get the PHP type for this column.
     */
    public function getPhpType(): string
    {
        return match ($this->type) {
            'integer', 'bigint', 'smallint', 'tinyint' => 'int',
            'decimal', 'float', 'double' => 'float',
            'boolean' => 'bool',
            'datetime', 'timestamp' => '\DateTime',
            'date' => '\DateTimeInterface',
            'json', 'array' => 'array',
            default => 'string',
        };
    }

    /**
     * Get the type hint for this column, including nullability.
     */
    public function getTypeHint(): string
    {
        $type = $this->getPhpType();

        return $this->nullable ? "?{$type}" : $type;
    }

    /**
     * Get the docblock type for this column.
     */
    public function getDocblockType(): string
    {
        $type = $this->getPhpType();

        return $this->nullable ? "{$type}|null" : $type;
    }

    /**
     * Get the cast type for this column.
     */
    public function getCastType(): ?string
    {
        return match ($this->type) {
            'integer', 'bigint', 'smallint', 'tinyint' => 'integer',
            'decimal', 'float', 'double' => 'float',
            'boolean' => 'boolean',
            'datetime', 'timestamp' => 'datetime',
            'date' => 'date',
            'json', 'array' => 'array',
            default => null,
        };
    }

    /**
     * Check if this column should be cast.
     */
    public function shouldCast(): bool
    {
        return $this->getCastType() !== null;
    }

    /**
     * Get validation rules for this column.
     *
     * @return array<string>
     */
    public function getValidationRules(): array
    {
        $rules = [];

        if (! $this->nullable) {
            $rules[] = 'required';
        }

        $rules[] = match ($this->type) {
            'integer', 'bigint', 'smallint', 'tinyint' => 'integer',
            'decimal', 'float', 'double' => 'numeric',
            'boolean' => 'boolean',
            'datetime', 'timestamp' => 'date',
            'date' => 'date',
            'json', 'array' => 'array',
            default => 'string',
        };

        if ($this->length !== null && $this->type === 'string') {
            $rules[] = "max:{$this->length}";
        }

        if ($this->isUnique) {
            $rules[] = 'unique';
        }

        return $rules;
    }
}
