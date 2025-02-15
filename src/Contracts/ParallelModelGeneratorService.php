<?php

namespace SAC\EloquentModelGenerator\Contracts;

use SAC\EloquentModelGenerator\Support\Definitions\ModelDefinition;

interface ParallelModelGeneratorService
{
    /**
     * Generate models in parallel.
     *
     * @param  array<string>  $tables
     * @param  array{class_name?: string, namespace?: string, base_class?: string, with_soft_deletes?: bool, with_validation?: bool, with_relationships?: bool}  $options
     * @return array<ModelDefinition>
     */
    public function generateModels(array $tables, array $options = []): array;
}
