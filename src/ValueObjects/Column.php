<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\ValueObjects;

class Column {
    public function __construct(
        private readonly string $name,
        private readonly string $type,
        private readonly bool $isPrimary,
        private readonly bool $isAutoIncrement,
        private readonly bool $isNullable,
        private readonly bool $isUnique,
        private readonly mixed $default = null,
        private readonly ?int $length = null,
        private readonly ?ForeignKey $foreignKey = null
    ) {
    }

    public function getName(): string {
        return $this->name;
    }

    public function getType(): string {
        return $this->type;
    }

    public function isPrimary(): bool {
        return $this->isPrimary;
    }

    public function isAutoIncrement(): bool {
        return $this->isAutoIncrement;
    }

    public function isNullable(): bool {
        return $this->isNullable;
    }

    public function isUnique(): bool {
        return $this->isUnique;
    }

    public function getDefault(): mixed {
        return $this->default;
    }

    public function getLength(): ?int {
        return $this->length;
    }

    public function getForeignKey(): ?ForeignKey {
        return $this->foreignKey;
    }

    public function getCastType(): ?string {
        return match ($this->type) {
            'int', 'integer', 'tinyint', 'smallint', 'mediumint', 'bigint' => 'integer',
            'decimal', 'float', 'double', 'real' => 'decimal:2',
            'bool', 'boolean' => 'boolean',
            'date', 'datetime', 'timestamp' => 'datetime',
            'json', 'jsonb' => 'array',
            default => null,
        };
    }

    public function __toString(): string {
        return sprintf(
            '%s (%s%s%s%s)',
            $this->name,
            $this->type,
            $this->length ? "({$this->length})" : '',
            $this->isNullable ? ' NULL' : ' NOT NULL',
            $this->isPrimary ? ' PRIMARY KEY' : ''
        );
    }
}