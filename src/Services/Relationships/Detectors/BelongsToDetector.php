<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Services\Relationships\Detectors;

use SAC\EloquentModelGenerator\Config\ModelGeneratorConfig;
use SAC\EloquentModelGenerator\Domain\ValueObjects\ColumnDefinition;
use SAC\EloquentModelGenerator\Domain\ValueObjects\IndexDefinition;
use SAC\EloquentModelGenerator\Domain\ValueObjects\RelationshipDefinition;
use SAC\EloquentModelGenerator\Exceptions\RelationshipDetectionException;

/**
 * Detector for BelongsTo relationships.
 */
class BelongsToDetector
{

    public function __construct(
        private readonly ModelGeneratorConfig $config,
    ) {

    }

    /**
     * Detect BelongsTo relationships for a table.
     *
     * @param string $table The table name
     * @param array<ColumnDefinition> $columns The table columns
     * @param array<IndexDefinition> $indices The table indices
     * @return array<RelationshipDefinition>
     */
    public function detect(string $table, array $columns, array $indices): array
    {

        $relationships = [];

        foreach ($columns as $column)
        {
            if ($this->isForeignKeyColumn($column, $indices))
            {
                $relationships[] = $this->createRelationship($table, $column, $indices);
            }
        }

        return $relationships;
    }

    /**
     * Check if a column is a foreign key.
     */
    private function isForeignKeyColumn(ColumnDefinition $column, array $indices): bool
    {

        foreach ($indices as $index)
        {
            if ($index->isForeign && in_array($column->name, $index->columns, TRUE))
            {
                return TRUE;
            }
        }

        return FALSE;
    }

    /**
     * Get the referenced table for a foreign key.
     */
    private function getReferencedTable(string $column, array $indices): ?string
    {

        foreach ($indices as $index)
        {
            if ($index->isForeign && in_array($column, $index->columns, TRUE))
            {
                return $index->attributes['foreign_table'] ?? NULL;
            }
        }

        return NULL;
    }

    /**
     * Get the referenced column for a foreign key.
     */
    private function getReferencedColumn(string $column, array $indices): ?string
    {

        foreach ($indices as $index)
        {
            if ($index->isForeign && in_array($column, $index->columns, TRUE))
            {
                $foreignColumns = $index->attributes['foreign_columns'] ?? [];
                return $foreignColumns[array_search($column, $index->columns, TRUE)] ?? NULL;
            }
        }

        return NULL;
    }

    /**
     * Create a BelongsTo relationship definition.
     *
     * @param string $table The table name
     * @param ColumnDefinition $column The foreign key column
     * @param array<IndexDefinition> $indices The table indices
     */
    private function createRelationship(
        string $table,
        ColumnDefinition $column,
        array $indices,
    ): RelationshipDefinition {

        $referencedTable  = $this->getReferencedTable($column->name, $indices);
        $referencedColumn = $this->getReferencedColumn($column->name, $indices);

        if ($referencedTable === NULL || $referencedColumn === NULL)
        {
            throw RelationshipDetectionException::forInvalidForeignKey($table, $column->name);
        }

        return new RelationshipDefinition(
            type: RelationshipDefinition::TYPE_BELONGS_TO,
            name: $this->generateMethodName($referencedTable),
            relatedModel: $this->config->get('namespace') . '\\' . $this->generateModelName($referencedTable),
            localKey: [$column->name],
            foreignKey: [$referencedColumn],
        );
    }

    /**
     * Generate method name from table name.
     */
    private function generateMethodName(string $table): string
    {

        return lcfirst(str_replace('_', '', ucwords($table, '_')));
    }

    /**
     * Generate model name from table name.
     */
    private function generateModelName(string $table): string
    {

        return str_replace('_', '', ucwords($table, '_'));
    }

}
