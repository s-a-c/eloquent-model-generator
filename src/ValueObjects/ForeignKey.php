<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\ValueObjects;

class ForeignKey {
    public function __construct(
        private readonly string $column,
        private readonly string $foreignTable,
        private readonly string $foreignColumn
    ) {
    }

    public function getColumn(): string {
        return $this->column;
    }

    public function getForeignTable(): string {
        return $this->foreignTable;
    }

    public function getForeignColumn(): string {
        return $this->foreignColumn;
    }
}