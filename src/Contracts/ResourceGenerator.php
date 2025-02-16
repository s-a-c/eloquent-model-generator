<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Contracts;

use SAC\EloquentModelGenerator\Exceptions\ResourceGeneratorException;
use SAC\EloquentModelGenerator\ValueObjects\Column;

/**
 * Resource Generator Interface
 *
 * Defines the contract for generating API resources.
 */
interface ResourceGenerator {
    /**
     * Generate a resource class for a model.
     *
     * @param string $modelClass The fully qualified model class name
     * @param array<Column> $columns The model columns
     * @param array<string, array<string>> $relationships The model relationships
     * @param array<string, array<string>> $conditionalFields Conditional field definitions
     * @return string The resource class definition
     * @throws ResourceGeneratorException
     */
    public function generate(
        string $modelClass,
        array $columns,
        array $relationships = [],
        array $conditionalFields = []
    ): string;
}