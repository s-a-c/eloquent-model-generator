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

    /**
     * Analyze a model for potential fixes.
     *
     * @param array<string> $fixTypes Types of fixes to analyze for
     * @return array<array{
     *     type: string,
     *     description: string,
     *     file: string,
     *     line: int,
     *     current: string,
     *     suggested: string
     * }>
     *
     * @throws \SAC\EloquentModelGenerator\Exceptions\ModelGeneratorException
     */
    public function analyzeFixes(string $model, array $fixTypes): array;

    /**
     * Apply a fix to a model.
     *
     * @param array{
     *     type: string,
     *     description: string,
     *     file: string,
     *     line: int,
     *     current: string,
     *     suggested: string
     * } $fix
     *
     * @throws \SAC\EloquentModelGenerator\Exceptions\ModelGeneratorException
     */
    public function applyFix(string $model, array $fix): void;
}