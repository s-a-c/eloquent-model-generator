<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Contracts;

use SAC\EloquentModelGenerator\Domain\ValueObjects\GenerationResult;
use SAC\EloquentModelGenerator\Domain\ValueObjects\TableDefinition;
use SAC\EloquentModelGenerator\Exceptions\ModelGenerationException;

/**
 * @template TResult of GenerationResult
 */
interface ModelGeneratorInterface
{
    /**
     * Generate Eloquent models for the specified tables.
     *
     * @param  array<string>  $tables
     * @param  array<string, mixed>  $options
     * @return TResult
     *
     * @throws ModelGenerationException
     */
    public function generate(array $tables, array $options = []): GenerationResult;

    /**
     * Analyze all database tables.
     *
     * @return array<string, TableDefinition>
     *
     * @throws ModelGenerationException
     */
    public function analyzeTables(): array;

    /**
     * Validate configuration options.
     *
     * @param  array<string, mixed>  $options
     */
    public function validateConfiguration(array $options): bool;
}
