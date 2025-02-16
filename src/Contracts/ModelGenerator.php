<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Contracts;

interface ModelGenerator {
    /**
     * Generate a model class for a table.
     *
     * @throws \SAC\EloquentModelGenerator\Exceptions\ModelGeneratorException
     */
    public function generate(string $table): string;

    /**
     * Generate models for multiple tables.
     *
     * @param array<string> $tables
     * @return array<string, string>
     *
     * @throws \SAC\EloquentModelGenerator\Exceptions\ModelGeneratorException
     */
    public function generateBatch(array $tables): array;

    /**
     * Check if a model exists for a table.
     */
    public function modelExists(string $table): bool;
}