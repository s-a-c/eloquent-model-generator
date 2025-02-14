<?php

namespace SAC\EloquentModelGenerator\Services;

use SAC\EloquentModelGenerator\Models\GeneratedModel;

interface ModelGeneratorServiceInterface {
    /**
     * Generate a model for the given table.
     *
     * @param array<string, mixed> $config
     */
    public function generateModel(string $table, array $config = []): GeneratedModel;

    /**
     * Generate models for multiple tables.
     *
     * @param array<string> $tables
     * @param array<string, mixed> $config
     * @return array<GeneratedModel>
     */
    public function generateModels(array $tables, array $config = []): array;

    /**
     * Get all available tables.
     *
     * @return array<string>
     */
    public function getTables(): array;
}
