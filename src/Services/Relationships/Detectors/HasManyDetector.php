<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Services\Relationships\Detectors;

use SAC\EloquentModelGenerator\Config\ModelGeneratorConfig;
use SAC\EloquentModelGenerator\Contracts\SchemaAnalyzerInterface;
use SAC\EloquentModelGenerator\Domain\ValueObjects\IndexDefinition;
use SAC\EloquentModelGenerator\Domain\ValueObjects\RelationshipDefinition;
use SAC\EloquentModelGenerator\Exceptions\RelationshipDetectionException;

/**
 * Detector for HasMany relationships.
 */
class HasManyDetector
{

    public function __construct(
        private readonly ModelGeneratorConfig $config,
        private readonly SchemaAnalyzerInterface $schemaAnalyzer,
    ) {

    }

    /**
     * Detect HasMany relationships for a table.
     *
     * @param string $table The table name
     * @return array<RelationshipDefinition>
     */
    public function detect(string $table): array
    {

        try
        {
            $relationships = [];
            $tables        = $this->schemaAnalyzer->getTables();

            foreach ($tables as $relatedTable)
            {
                if ($relatedTable === $table)
                {
                    continue;
                }

                $indices = $this->schemaAnalyzer->getIndices($relatedTable);
                foreach ($indices as $index)
                {
                    if ($this->isHasManyRelationship($table, $index))
                    {
                        $relationships[] = $this->createRelationship($table, $relatedTable, $index);
                    }
                }
            }

            return $relationships;
        } catch (\Throwable $e)
        {
            throw RelationshipDetectionException::forFailedDetection($table, $e->getMessage(), $e);
        }
    }

    /**
     * Check if an index represents a HasMany relationship.
     *
     * @param string $table The table name
     * @param IndexDefinition $index The index to check
     */
    private function isHasManyRelationship(string $table, IndexDefinition $index): bool
    {

        return $index->isForeign
            && !$index->isUnique
            && ($index->attributes['foreign_table'] ?? NULL) === $table;
    }

    /**
     * Create a HasMany relationship definition.
     *
     * @param string $table The table name
     * @param string $relatedTable The related table name
     * @param IndexDefinition $index The foreign key index
     */
    private function createRelationship(
        string $table,
        string $relatedTable,
        IndexDefinition $index,
    ): RelationshipDefinition {

        $foreignColumns = $index->attributes['foreign_columns'] ?? [];
        if (empty($foreignColumns))
        {
            throw RelationshipDetectionException::forInvalidForeignKey($relatedTable, implode(', ', $index->columns));
        }

        return new RelationshipDefinition(
            type: RelationshipDefinition::TYPE_HAS_MANY,
            name: $this->generateMethodName($relatedTable),
            relatedModel: $this->config->get('namespace') . '\\' . $this->generateModelName($relatedTable),
            localKey: $foreignColumns,
            foreignKey: $index->columns,
        );
    }

    /**
     * Generate method name from table name.
     */
    private function generateMethodName(string $table): string
    {

        // Use plural form for HasMany relationships
        return lcfirst(str_replace('_', '', ucwords($table, '_')));
    }

    /**
     * Generate model name from table name.
     */
    private function generateModelName(string $table): string
    {

        // Model name should be singular
        return str_replace('_', '', ucwords($table, '_'));
    }

}
