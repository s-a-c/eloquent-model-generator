<?php

namespace SAC\EloquentModelGenerator\Services;

use parallel\Runtime;
use SAC\EloquentModelGenerator\Contracts\ParallelModelGeneratorService;
use SAC\EloquentModelGenerator\Support\Definitions\ModelDefinition;
use SAC\EloquentModelGenerator\Support\Factories\ModelGeneratorFactory;

class ParallelModelGenerator implements ParallelModelGeneratorService
{
    protected ModelGeneratorFactory $factory;

    /**
     * Constructor.
     */
    public function __construct(ModelGeneratorFactory $factory)
    {
        $this->factory = $factory;
    }

    /**
     * Generate models in parallel.
     *
     * @return array<ModelDefinition>
     */
    public function generateModels(array $tables, array $options = []): array
    {
        $pool = [];
        $results = [];

        // Create a pool of runtimes
        foreach ($tables as $table) {
            $runtime = new Runtime;
            $pool[] = $runtime->run(function () use ($table, $options) {
                return $this->factory->createModelDefinition(
                    $table,
                    $options['columns'][$table] ?? [],
                    $options['relations'][$table] ?? []
                );
            });
        }

        // Wait for all operations to complete
        foreach ($pool as $promise) {
            $results[] = $promise->value();
        }

        return $results;
    }
}
