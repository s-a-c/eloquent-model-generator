<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Services\Contracts;

use SAC\EloquentModelGenerator\Domain\ValueObjects\GenerationResult;
use SAC\EloquentModelGenerator\Domain\ValueObjects\TableDefinition;

/**
 * Service interface for generating model code.
 */
interface CodeGeneratorInterface
{
    /**
     * Generate model code from a table definition.
     *
     * @throws \SAC\EloquentModelGenerator\Exceptions\ModelGenerationException
     */
    public function generateModel(TableDefinition $table): GenerationResult;

    /**
     * Generate model documentation.
     *
     * @throws \SAC\EloquentModelGenerator\Exceptions\ModelGenerationException
     */
    public function generateDocumentation(TableDefinition $table): GenerationResult;

    /**
     * Get the list of required imports for a model.
     *
     * @return array<string>
     */
    public function getRequiredImports(TableDefinition $table): array;

    /**
     * Generate relationship methods for a model.
     *
     * @return array<string>
     */
    public function generateRelationshipMethods(TableDefinition $table): array;

    /**
     * Generate property definitions for a model.
     *
     * @return array<string>
     */
    public function generatePropertyDefinitions(TableDefinition $table): array;

    /**
     * Generate method definitions for a model.
     *
     * @return array<string>
     */
    public function generateMethodDefinitions(TableDefinition $table): array;

    /**
     * Generate trait imports for a model.
     *
     * @return array<string>
     */
    public function generateTraitImports(TableDefinition $table): array;

    /**
     * Generate PHPDoc blocks for a model.
     *
     * @return array<string>
     */
    public function generatePhpDocBlocks(TableDefinition $table): array;

    /**
     * Generate model configuration arrays (fillable, hidden, etc.).
     *
     * @return array<string, array<string>>
     */
    public function generateModelConfiguration(TableDefinition $table): array;

    /**
     * Generate model validation rules.
     *
     * @return array<string, array<string>>
     */
    public function generateValidationRules(TableDefinition $table): array;

    /**
     * Generate model factory definition.
     */
    public function generateFactoryDefinition(TableDefinition $table): string;
}
