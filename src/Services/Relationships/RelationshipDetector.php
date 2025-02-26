<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Services\Relationships;

use SAC\EloquentModelGenerator\Config\ModelGeneratorConfig;
use SAC\EloquentModelGenerator\Contracts\RelationshipDetectorInterface;
use SAC\EloquentModelGenerator\Contracts\SchemaAnalyzerInterface;
use SAC\EloquentModelGenerator\Domain\ValueObjects\ColumnDefinition;
use SAC\EloquentModelGenerator\Domain\ValueObjects\IndexDefinition;
use SAC\EloquentModelGenerator\Domain\ValueObjects\RelationshipDefinition;
use SAC\EloquentModelGenerator\Exceptions\RelationshipDetectionException;
use SAC\EloquentModelGenerator\Services\Relationships\Detectors\BelongsToDetector;
use SAC\EloquentModelGenerator\Services\Relationships\Detectors\HasManyDetector;
use SAC\EloquentModelGenerator\Services\Relationships\Detectors\HasOneDetector;
use SAC\EloquentModelGenerator\Services\Relationships\Detectors\MorphToDetector;

/**
 * Main relationship detector that coordinates specialized detectors.
 */
final readonly class RelationshipDetector implements RelationshipDetectorInterface
{

    private BelongsToDetector $belongsToDetector;

    private HasOneDetector $hasOneDetector;

    private HasManyDetector $hasManyDetector;

    private MorphToDetector $morphToDetector;

    public function __construct(
        private ModelGeneratorConfig $config,
        private SchemaAnalyzerInterface $schemaAnalyzer,
    ) {

        $this->belongsToDetector = new BelongsToDetector($config);
        $this->hasOneDetector    = new HasOneDetector($config, $schemaAnalyzer);
        $this->hasManyDetector   = new HasManyDetector($config, $schemaAnalyzer);
        $this->morphToDetector   = new MorphToDetector($config);
    }

    public function detectRelationships(
        string $table,
        array $columns,
        array $indices,
    ): array {

        try
        {
            return array_merge(
                // Detect direct relationships
                $this->belongsToDetector->detect($table, $columns, $indices),
                $this->morphToDetector->detect($table, $columns),

                // Detect inverse relationships
                $this->hasOneDetector->detect($table),
                $this->hasManyDetector->detect($table),
            );
        } catch (\Throwable $e)
        {
            throw RelationshipDetectionException::forFailedDetection($table, $e->getMessage(), $e);
        }
    }

    public function isForeignKey(string $column, array $indices): bool
    {

        foreach ($indices as $index)
        {
            if ($index->isForeign && in_array($column, $index->columns, TRUE))
            {
                return TRUE;
            }
        }

        return FALSE;
    }

    public function isPolymorphic(string $column, array $columns): bool
    {

        if (!str_ends_with($column, '_type'))
        {
            return FALSE;
        }

        $baseName = substr($column, 0, -5); // Remove '_type'
        $idColumn = "{$baseName}_id";

        foreach ($columns as $col)
        {
            if ($col->name === $idColumn)
            {
                return TRUE;
            }
        }

        return FALSE;
    }

    public function getReferencedTable(string $column, array $indices): ?string
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

    public function getReferencedColumn(string $column, array $indices): ?string
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

    public function hasRelationship(string $table, string $relatedTable, array $indices): bool
    {

        foreach ($indices as $index)
        {
            if ($index->isForeign && ($index->attributes['foreign_table'] ?? NULL) === $relatedTable)
            {
                return TRUE;
            }
        }

        return FALSE;
    }

    public function getRelationshipType(string $table, string $relatedTable, array $indices): ?string
    {

        if ($this->hasRelationship($table, $relatedTable, $indices))
        {
            return RelationshipDefinition::TYPE_BELONGS_TO;
        }

        $relatedIndices = $this->getForeignKeyIndices($relatedTable);
        foreach ($relatedIndices as $index)
        {
            if (($index->attributes['foreign_table'] ?? NULL) === $table)
            {
                return $index->isUnique
                    ? RelationshipDefinition::TYPE_HAS_ONE
                    : RelationshipDefinition::TYPE_HAS_MANY;
            }
        }

        return NULL;
    }

    public function getPolymorphicBaseName(string $column): string
    {

        return str_ends_with($column, '_type')
            ? substr($column, 0, -5)
            : substr($column, 0, -3); // Remove '_id'
    }

    public function getMorphTypeColumn(string $baseName): string
    {

        return "{$baseName}_type";
    }

    public function getMorphIdColumn(string $baseName): string
    {

        return "{$baseName}_id";
    }

    /**
     * Get foreign key indices for a table.
     *
     * @param string $table The table name
     * @return array<IndexDefinition>
     */
    public function getForeignKeyIndices(string $table): array
    {

        return array_filter(
            $this->schemaAnalyzer->getIndices($table),

            static fn(IndexDefinition $index): bool => $index->isForeign
        );
    }

}
