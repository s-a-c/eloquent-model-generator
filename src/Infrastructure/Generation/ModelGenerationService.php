<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Infrastructure\Generation;

use SAC\EloquentModelGenerator\Domain\Database\DatabaseAdapter;
use SAC\EloquentModelGenerator\Domain\Database\SchemaDefinition;
use SAC\EloquentModelGenerator\Domain\Relationship\RelationshipBuilder;

/**
 * Service for generating Eloquent models with relationships
 */
final class ModelGenerationService
{
    public function __construct(
        private readonly DatabaseAdapter $adapter,
        private readonly ModelGenerator $generator,
        private readonly RelationshipBuilder $relationshipBuilder
    ) {
    }

    /**
     * Generate a model definition for a table
     */
    public function generate(string $table): ModelDefinition
    {
        $schema = $this->adapter->getSchema();
        $tableDefinition = $schema->table($table);

        if (!$tableDefinition) {
            throw new TableNotFoundException($table);
        }

        // Generate base model
        $modelDefinition = $this->generator
            ->withSchema($schema)
            ->generate($tableDefinition);

        // Add relationships
        $relationships = $schema->tableRelationships($table);
        foreach ($relationships as $relationship) {
            $modelDefinition = $modelDefinition->withMethod(
                $this->relationshipBuilder->build($relationship)
            );
        }

        return $modelDefinition;
    }

    /**
     * Generate model definitions for all tables
     *
     * @return array<string, ModelDefinition>
     */
    public function generateAll(): array
    {
        $schema = $this->adapter->getSchema();
        $models = [];

        foreach ($schema->tables() as $table) {
            $models[$table->name()] = $this->generate($table->name());
        }

        return $models;
    }
}
