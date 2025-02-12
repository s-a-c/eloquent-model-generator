<?php

namespace SAC\EloquentModelGenerator;

use SAC\EloquentModelGenerator\Contracts\ModelGenerator as ModelGeneratorContract;
use SAC\EloquentModelGenerator\Models\GeneratedModel;
use SAC\EloquentModelGenerator\ValueObjects\ModelDefinition;
use SAC\EloquentModelGenerator\Services\ModelGeneratorService;
use SAC\EloquentModelGenerator\Exceptions\ModelGeneratorException;
use Illuminate\Support\Collection;

class ModelGenerator implements ModelGeneratorContract {
    /**
     * Create a new model generator instance.
     */
    public function __construct(
        private readonly ModelGeneratorService $service
    ) {
    }

    /**
     * Generate a model from the given schema.
     *
     * @param ModelDefinition $definition
     * @param array<string, mixed> $schema
     * @return GeneratedModel
     * @throws ModelGeneratorException
     */
    public function generate(ModelDefinition $definition, array $schema): GeneratedModel {
        return $this->service->generate($definition, $schema);
    }

    /**
     * Generate multiple models in batch.
     *
     * @param array<ModelDefinition> $definitions
     * @param array<string, array<string, mixed>> $schemas
     * @return array<GeneratedModel>
     * @throws ModelGeneratorException
     */
    public function generateBatch(array $definitions, array $schemas): array {
        return $this->service->generateBatch($definitions, $schemas);
    }

    /**
     * Check if a model already exists.
     *
     * @param string $className
     * @param string $namespace
     * @return bool
     */
    public function modelExists(string $className, string $namespace): bool {
        return $this->service->modelExists($className, $namespace);
    }
}
