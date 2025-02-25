<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Domain\ValueObjects;

/**
 * @immutable
 */
final class Column
{
    public function __construct(
        public readonly string $name,
        public readonly string $type,
        public readonly bool $nullable = false,
        public readonly mixed $default = null,
        public readonly ?int $length = null,
        public readonly ?int $precision = null,
        public readonly ?int $scale = null,
        public readonly bool $unsigned = false,
        public readonly bool $autoIncrement = false,
        public readonly bool $isPrimary = false,
        public readonly bool $isUnique = false,
        public readonly bool $isTimestamp = false,
        public readonly bool $isSoftDelete = false,
        public readonly bool $shouldBeHidden = false,
    ) {}

    /**
     * Get PHP type for this column.
     */
    public function getPhpType(): string
    {
        return match ($this->type) {
            'integer', 'bigint', 'smallint', 'tinyint' => 'int',
            'decimal', 'float', 'double' => 'float',
            'boolean' => 'bool',
            'datetime', 'timestamp' => '\Carbon\Carbon',
            'date' => '\Carbon\Carbon',
            'json', 'array' => 'array',
            default => 'string',
        };
    }

    /**
     * Get cast type for this column.
     */
    public function getCastType(): ?string
    {
        return match ($this->type) {
            'integer', 'bigint', 'smallint', 'tinyint' => 'integer',
            'decimal' => "decimal:{$this->precision},{$this->scale}",
            'float', 'double' => 'float',
            'boolean' => 'boolean',
            'datetime', 'timestamp' => 'datetime',
            'date' => 'date',
            'json', 'array' => 'array',
            default => null,
        };
    }

    /**
     * Get docblock type for this column.
     */
    public function getDocType(): string
    {
        $type = $this->getPhpType();

        if ($this->nullable) {
            return "{$type}|null";
        }

        return $type;
    }

    /**
     * Check if column should be cast.
     */
    public function shouldBeCast(): bool
    {
        return $this->getCastType() !== null;
    }

    /**
     * Check if column is numeric.
     */
    public function isNumeric(): bool
    {
        return in_array($this->type, [
            'integer',
            'bigint',
            'smallint',
            'tinyint',
            'decimal',
            'float',
            'double',
        ], true);
    }

    /**
     * Check if column is date/time.
     */
    public function isDateTime(): bool
    {
        return in_array($this->type, [
            'datetime',
            'timestamp',
            'date',
        ], true);
    }
}
