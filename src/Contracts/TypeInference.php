<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Contracts;

use SAC\EloquentModelGenerator\ValueObjects\Column;

interface TypeInference {
    /**
     * Infer PHP type for a column.
     */
    public function inferPhpType(Column $column): string;

    /**
     * Infer docblock type for a column.
     */
    public function inferDocblockType(Column $column): string;

    /**
     * Infer cast type for a column.
     */
    public function inferCastType(Column $column): string;

    /**
     * Infer validation rules for a column.
     *
     * @return array<string>
     */
    public function inferValidationRules(Column $column): array;

    /**
     * Infer factory type definition for a column.
     */
    public function inferFactoryType(Column $column): string;
}