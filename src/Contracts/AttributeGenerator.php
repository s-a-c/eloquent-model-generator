<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Contracts;

use SAC\EloquentModelGenerator\Exceptions\AttributeGeneratorException;
use SAC\EloquentModelGenerator\ValueObjects\Column;

/**
 * Attribute Generator Interface
 *
 * Defines the contract for generating model attributes.
 */
interface AttributeGenerator {
    /**
     * Generate attribute methods for a model.
     *
     * @param array<Column> $columns The model columns
     * @return array{
     *     accessors: array<string>,
     *     mutators: array<string>,
     *     casts: array<string, string>,
     *     properties: array<string>
     * }
     * @throws AttributeGeneratorException
     */
    public function generate(array $columns): array;
}