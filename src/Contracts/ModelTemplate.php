<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Contracts;

use SAC\EloquentModelGenerator\Support\Definitions\ModelDefinition;

interface ModelTemplate {
    /**
     * Render a model class.
     *
     * @param ModelDefinition $definition The model definition
     * @param array<string> $docblock The docblock properties
     * @return string The rendered model class
     */
    public function render(ModelDefinition $definition, array $docblock): string;
}