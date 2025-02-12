<?php

namespace SAC\EloquentModelGenerator\Services;

use SAC\EloquentModelGenerator\Contracts\ModelGeneratorService;
use SAC\EloquentModelGenerator\Support\Definitions\ModelDefinition;
use SAC\EloquentModelGenerator\Support\Factories\ModelGeneratorFactory;

class ModelGenerator implements ModelGeneratorService {
    /**
     * @var ModelGeneratorFactory
     */
    protected ModelGeneratorFactory $factory;

    /**
     * Constructor.
     *
     * @param ModelGeneratorFactory $factory
     */
    public function __construct(ModelGeneratorFactory $factory) {
        $this->factory = $factory;
    }

    /**
     * Generate a model from a table name.
     *
     * @param string $table
     * @param array $options
     * @return ModelDefinition
     */
    public function generateModel(string $table, array $options = []): ModelDefinition {
        return $this->factory->createModelDefinition(
            $table,
            $options['columns'] ?? [],
            $options['relations'] ?? []
        );
    }

    /**
     * Generate models for multiple tables
     *
     * @param array $tables
     * @param array $config
     * @return array<GeneratedModel>
     */
    public function generateBatch(array $tables, array $config = []): array {
        // Implementation will be added later
        throw new \RuntimeException('Not implemented yet');
    }

    /**
     * Get all available tables
     *
     * @return array<string>
     */
    public function getTables(): array {
        // Implementation will be added later
        throw new \RuntimeException('Not implemented yet');
    }
}
