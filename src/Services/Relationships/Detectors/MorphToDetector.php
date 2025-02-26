<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Services\Relationships\Detectors;

use SAC\EloquentModelGenerator\Config\ModelGeneratorConfig;
use SAC\EloquentModelGenerator\Domain\ValueObjects\ColumnDefinition;
use SAC\EloquentModelGenerator\Domain\ValueObjects\RelationshipDefinition;
use SAC\EloquentModelGenerator\Exceptions\RelationshipDetectionException;

/**
 * Detector for MorphTo relationships.
 */
class MorphToDetector
{

    public function __construct(
        private readonly ModelGeneratorConfig $config,
    ) {

    }

    /**
     * Detect MorphTo relationships for a table.
     *
     * @param string $table The table name
     * @param array<ColumnDefinition> $columns The table columns
     * @return array<RelationshipDefinition>
     */
    public function detect(string $table, array $columns): array
    {

        try
        {
            $relationships = [];
            $morphColumns  = $this->findMorphColumns($columns);

            foreach ($morphColumns as $baseColumn => [$typeColumn, $idColumn])
            {
                $relationships[] = $this->createRelationship($baseColumn, $typeColumn, $idColumn);
            }

            return $relationships;
        } catch (\Throwable $e)
        {
            throw RelationshipDetectionException::forFailedDetection($table, $e->getMessage(), $e);
        }
    }

    /**
     * Find morphable columns in the table.
     *
     * @param array<ColumnDefinition> $columns The table columns
     * @return array<string, array{0: ColumnDefinition, 1: ColumnDefinition}> Map of base names to [type, id] columns
     */
    private function findMorphColumns(array $columns): array
    {

        $morphColumns = [];
        $typeColumns  = [];
        $idColumns    = [];

        // First pass: identify type and id columns
        foreach ($columns as $column)
        {
            if (str_ends_with($column->name, '_type'))
            {
                $baseColumn               = substr($column->name, 0, -5);
                $typeColumns[$baseColumn] = $column;
            } elseif (str_ends_with($column->name, '_id'))
            {
                $baseColumn             = substr($column->name, 0, -3);
                $idColumns[$baseColumn] = $column;
            }
        }

        // Second pass: match type and id columns
        foreach ($typeColumns as $baseColumn => $typeColumn)
        {
            if (isset($idColumns[$baseColumn]))
            {
                $morphColumns[$baseColumn] = [$typeColumn, $idColumns[$baseColumn]];
            }
        }

        return $morphColumns;
    }

    /**
     * Create a MorphTo relationship definition.
     *
     * @param string $baseColumn The base column name (without _type/_id)
     * @param ColumnDefinition $typeColumn The type column
     * @param ColumnDefinition $idColumn The ID column
     */
    private function createRelationship(
        string $baseColumn,
        ColumnDefinition $typeColumn,
        ColumnDefinition $idColumn,
    ): RelationshipDefinition {

        if (!$this->isValidMorphableColumn($typeColumn, $idColumn))
        {
            throw RelationshipDetectionException::forInvalidPolymorphic(
                $typeColumn->name,
                "{$baseColumn}_type and {$baseColumn}_id",
            );
        }

        return new RelationshipDefinition(
            type: RelationshipDefinition::TYPE_MORPH_TO,
            name: $baseColumn,
            relatedModel: '', // Determined at runtime
            localKey: [$idColumn->name],
            foreignKey: [],
            polymorphic: TRUE,
            morphType: $typeColumn->name,
            morphId: $idColumn->name,
        );
    }

    /**
     * Check if the columns form a valid morphable relationship.
     *
     * @param ColumnDefinition $typeColumn The type column
     * @param ColumnDefinition $idColumn The ID column
     */
    private function isValidMorphableColumn(
        ColumnDefinition $typeColumn,
        ColumnDefinition $idColumn,
    ): bool {

        // Type column should be string/varchar
        if (!in_array($typeColumn->type, ['string', 'varchar', 'text'], TRUE))
        {
            return FALSE;
        }

        // ID column should be integer or similar
        if (!in_array($idColumn->type, ['integer', 'bigint', 'unsignedBigInteger'], TRUE))
        {
            return FALSE;
        }

        return TRUE;
    }

}
