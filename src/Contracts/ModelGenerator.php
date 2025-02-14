<?php

namespace SAC\EloquentModelGenerator\Contracts;

use SAC\EloquentModelGenerator\Models\GeneratedModel;
use SAC\EloquentModelGenerator\Support\Definitions\ModelDefinition;
use SAC\EloquentModelGenerator\Exceptions\ModelGeneratorException;

interface ModelGenerator {
    /**
     * Generate a model from the given schema.
     *
     * @param array<string, mixed> $schema
     * @throws ModelGeneratorException
     */
    public function generate(ModelDefinition $definition, array $schema): GeneratedModel;

    /**
     * Generate multiple models in batch.
     *
     * @param array<ModelDefinition> $definitions
     * @param array<string, array<string, mixed>> $schemas
     * @return array<GeneratedModel>
     * @throws ModelGeneratorException
     */
    public function generateBatch(array $definitions, array $schemas): array;

    /**
     * Check if a model already exists.
     */
    public function modelExists(string $className, string $namespace): bool;
}
