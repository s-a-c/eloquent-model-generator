<?php

namespace SAC\EloquentModelGenerator\Contracts;

use SAC\EloquentModelGenerator\Support\Definitions\ModelDefinition;

interface ParallelModelGeneratorService {
    /**
     * Generate models in parallel.
     *
     * @param array $tables
     * @param array $options
     * @return array<ModelDefinition>
     */
    public function generateModels(array $tables, array $options = []): array;
}
