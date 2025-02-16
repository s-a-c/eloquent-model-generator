<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Contracts;

use SAC\EloquentModelGenerator\Exceptions\FactoryGeneratorException;
use SAC\EloquentModelGenerator\ValueObjects\Column;

/**
 * Factory Generator Interface
 *
 * Defines the contract for generating model factories.
 */
interface FactoryGenerator {
    /**
     * Generate a factory definition for a model.
     *
     * @param string $modelClass The fully qualified model class name
     * @param array<Column> $columns The model columns
     * @param array<string, array<string>> $relationships The model relationships
     * @return string The factory class definition
     * @throws FactoryGeneratorException
     */
    public function generate(string $modelClass, array $columns, array $relationships = []): string;
}