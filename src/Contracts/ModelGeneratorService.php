<?php

namespace SAC\EloquentModelGenerator\Contracts;

use SAC\EloquentModelGenerator\Support\Definitions\ModelDefinition;

interface ModelGeneratorService {
    /**
     * Generate a model from a table name.
     *
     * @param string $table
     * @param array $options
     * @return ModelDefinition
     */
    public function generateModel(string $table, array $options = []): ModelDefinition;

    /**
     * Generate models for multiple tables
     *
     * @param array $tables
     * @param array $config
     * @return array<ModelDefinition>
     */
    public function generateBatch(array $tables, array $config = []): array;

    /**
     * Get all available tables
     *
     * @return array<string>
     */
    public function getTables(): array;
}
