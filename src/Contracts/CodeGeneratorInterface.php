<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Contracts;

use SAC\EloquentModelGenerator\Domain\ValueObjects\RelationshipDefinition;
use SAC\EloquentModelGenerator\Domain\ValueObjects\TableDefinition;
use SAC\EloquentModelGenerator\Exceptions\CodeGenerationException;

/**
 * @template TCode of string
 */
interface CodeGeneratorInterface
{
    /**
     * Generate model code.
     *
     * @param  array<RelationshipDefinition>  $relationships
     * @param  array<string, mixed>  $options
     * @return TCode
     *
     * @throws CodeGenerationException
     */
    public function generate(
        TableDefinition $definition,
        array $relationships = [],
        array $options = []
    ): string;

    /**
     * Load custom templates.
     *
     * @throws CodeGenerationException
     */
    public function loadTemplates(string $path): void;

    /**
     * Get template variables.
     *
     * @param  array<RelationshipDefinition>  $relationships
     * @param  array<string, mixed>  $options
     * @return array<string, mixed>
     */
    public function getTemplateVariables(
        TableDefinition $definition,
        array $relationships = [],
        array $options = []
    ): array;

    /**
     * Generate relationship methods.
     *
     * @param  array<RelationshipDefinition>  $relationships
     * @param  array<string, mixed>  $options
     * @return array<string>
     */
    public function generateRelationshipMethods(
        array $relationships,
        array $options = []
    ): array;

    /**
     * Generate property type hints.
     *
     * @param  array<RelationshipDefinition>  $relationships
     * @return array<string>
     */
    public function generatePropertyHints(
        TableDefinition $definition,
        array $relationships = []
    ): array;

    /**
     * Generate method type hints.
     *
     * @param  array<RelationshipDefinition>  $relationships
     * @return array<string>
     */
    public function generateMethodHints(
        TableDefinition $definition,
        array $relationships = []
    ): array;

    /**
     * Generate casts array.
     *
     * @return array<string, string>
     */
    public function generateCasts(TableDefinition $definition): array;

    /**
     * Generate fillable array.
     *
     * @return array<string>
     */
    public function generateFillable(TableDefinition $definition): array;

    /**
     * Generate hidden array.
     *
     * @return array<string>
     */
    public function generateHidden(TableDefinition $definition): array;

    /**
     * Validate template syntax.
     */
    public function validateTemplate(string $template): bool;
}
