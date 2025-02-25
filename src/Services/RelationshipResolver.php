<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Services;

use Illuminate\Support\Str;
use RuntimeException;
use SAC\EloquentModelGenerator\Config\ModelGeneratorConfig;
use SAC\EloquentModelGenerator\Domain\Enums\RelationType;
use SAC\EloquentModelGenerator\Domain\ValueObjects\IndexDefinition;
use SAC\EloquentModelGenerator\Domain\ValueObjects\RelationshipDefinition;
use SAC\EloquentModelGenerator\Domain\ValueObjects\TableDefinition;
use SAC\EloquentModelGenerator\Exceptions\SchemaAnalysisException;
use SAC\EloquentModelGenerator\Services\Contracts\RelationshipResolverInterface;
use SAC\EloquentModelGenerator\Services\Contracts\SchemaAnalyzerInterface;
use Throwable;

/**
 * Service for resolving relationships between models.
 */
final readonly class RelationshipResolver implements RelationshipResolverInterface
{
    public function __construct(
        private ModelGeneratorConfig $config,
        private SchemaAnalyzerInterface $schemaAnalyzer,
    ) {}

    public function resolveRelationships(TableDefinition $table): array
    {
        try {
            $relationships = [];

            // Add direct foreign key relationships
            foreach ($table->indices as $index) {
                if ($index->isForeign) {
                    $relationships[] = $this->createForeignKeyRelationship($table, $index);
                }
            }

            // Add polymorphic relationships
            $relationships = [...$relationships, ...$this->detectPolymorphicRelations($table)];

            // Add many-to-many relationships
            if (! $this->isPivotTable($table)) {
                $relationships = [...$relationships, ...$this->detectManyToManyRelations($table)];
            }

            // Validate and return unique relationships
            $this->validateRelationships($relationships);

            return array_values(array_unique($relationships, SORT_REGULAR));
        } catch (Throwable $e) {
            throw SchemaAnalysisException::forFailedAnalysis(
                $table->name,
                'Failed to resolve relationships: '.$e->getMessage(),
                $e
            );
        }
    }

    public function detectPolymorphicRelations(TableDefinition $table): array
    {
        $relationships = [];
        $morphColumns = [];

        // Find potential polymorphic columns
        foreach ($table->columns as $column) {
            if (str_ends_with($column->name, '_type')) {
                $baseName = Str::beforeLast($column->name, '_type');
                $morphColumns[$baseName] = $column->name;
            }
        }

        // Create polymorphic relationships
        foreach ($morphColumns as $baseName => $typeColumn) {
            $idColumn = "{$baseName}_id";
            if ($table->hasColumn($idColumn)) {
                $relationships[] = new RelationshipDefinition(
                    type: RelationType::MorphTo,
                    name: $baseName,
                    relatedModel: '', // Determined at runtime
                    localKeys: [$idColumn, $typeColumn],
                    foreignKeys: [],
                    attributes: [
                        'morph_name' => $baseName,
                    ],
                );
            }
        }

        return $relationships;
    }

    public function detectManyToManyRelations(TableDefinition $table): array
    {
        $relationships = [];
        $pivotTables = $this->findPivotTables($table);

        foreach ($pivotTables as $pivotTable) {
            $foreignKeys = array_filter(
                $pivotTable->indices,
                fn (IndexDefinition $index) => $index->isForeign
            );

            if (count($foreignKeys) !== 2) {
                continue;
            }

            foreach ($foreignKeys as $foreignKey) {
                $reference = $foreignKey->getForeignKeyReference();
                if (! $reference || $reference['table'] === $table->name) {
                    continue;
                }

                $relationships[] = new RelationshipDefinition(
                    type: RelationType::BelongsToMany,
                    name: Str::plural($this->generateMethodName($reference['table'])),
                    relatedModel: $this->config->get('namespace').'\\'.$this->generateModelName($reference['table']),
                    localKeys: array_values(array_filter(
                        array_map(
                            fn (IndexDefinition $index) => $index->isForeign &&
                                $index->getForeignKeyReference()['table'] === $table->name
                                ? $index->columns[0]
                                : null,
                            $foreignKeys
                        )
                    )),
                    foreignKeys: array_values(array_filter(
                        array_map(
                            fn (IndexDefinition $index) => $index->isForeign &&
                                $index->getForeignKeyReference()['table'] === $reference['table']
                                ? $index->columns[0]
                                : null,
                            $foreignKeys
                        )
                    )),
                    table: $pivotTable->name,
                );
            }
        }

        return $relationships;
    }

    public function isPivotTable(TableDefinition $table): bool
    {
        // Check if table name follows pivot naming convention
        if (str_contains($table->name, '_')) {
            $parts = explode('_', $table->name);
            if (count($parts) === 2) {
                return true;
            }
        }

        // Check if table has exactly two foreign keys
        $foreignKeyCount = count(array_filter(
            $table->indices,
            fn (IndexDefinition $index) => $index->isForeign
        ));

        if ($foreignKeyCount !== 2) {
            return false;
        }

        // Check if table has minimal columns (just foreign keys and timestamps)
        $requiredColumns = array_merge(
            array_map(fn (IndexDefinition $index) => $index->columns[0],
                array_filter($table->indices, fn (IndexDefinition $index) => $index->isForeign)
            ),
            ['created_at', 'updated_at']
        );

        $extraColumns = array_diff(
            array_map(fn ($col) => $col->name, $table->columns),
            $requiredColumns
        );

        return empty($extraColumns);
    }

    public function getMorphMap(): array
    {
        return $this->config->get('morph_map', []);
    }

    public function validateRelationships(array $relationships): void
    {
        $visited = [];
        $stack = [];

        foreach ($relationships as $relationship) {
            $this->detectCycles($relationship, $visited, $stack);
        }
    }

    /**
     * Create a relationship from a foreign key index.
     */
    private function createForeignKeyRelationship(TableDefinition $table, IndexDefinition $index): RelationshipDefinition
    {
        $reference = $index->getForeignKeyReference();
        if (! $reference) {
            throw new RuntimeException('Foreign key reference not found');
        }

        return new RelationshipDefinition(
            type: RelationType::BelongsTo,
            name: $this->generateMethodName($reference['table']),
            relatedModel: $this->config->get('namespace').'\\'.$this->generateModelName($reference['table']),
            localKeys: $index->columns,
            foreignKeys: $reference['columns'],
        );
    }

    /**
     * Find all pivot tables related to the given table.
     *
     * @return array<TableDefinition>
     */
    private function findPivotTables(TableDefinition $table): array
    {
        $pivotTables = [];
        $tables = $this->schemaAnalyzer->getTables();

        foreach ($tables as $potentialPivotTable) {
            if ($potentialPivotTable === $table->name) {
                continue;
            }

            $definition = $this->schemaAnalyzer->analyzeTable($potentialPivotTable);
            if ($this->isPivotTable($definition)) {
                $hasForeignKeyToTable = false;
                foreach ($definition->indices as $index) {
                    if ($index->isForeign &&
                        $index->getForeignKeyReference()['table'] === $table->name) {
                        $hasForeignKeyToTable = true;
                        break;
                    }
                }

                if ($hasForeignKeyToTable) {
                    $pivotTables[] = $definition;
                }
            }
        }

        return $pivotTables;
    }

    /**
     * Generate method name for relationship.
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
        return str_replace('_', '', ucwords(Str::singular($table), '_'));
    }

    /**
     * Detect cycles in relationships.
     *
     * @param  array<string>  $visited
     * @param  array<string>  $stack
     *
     * @throws SchemaAnalysisException
     */
    private function detectCycles(
        RelationshipDefinition $relationship,
        array &$visited,
        array &$stack
    ): void {
        $key = $relationship->relatedModel;

        if (in_array($key, $stack, true)) {
            throw SchemaAnalysisException::forFailedAnalysis(
                $relationship->name,
                'Circular dependency detected in relationships'
            );
        }

        if (isset($visited[$key])) {
            return;
        }

        $visited[$key] = true;
        $stack[] = $key;

        // Recursively check related models
        if ($relationship->type !== RelationType::MorphTo) {
            try {
                $relatedTable = $this->schemaAnalyzer->analyzeTable(
                    Str::snake(Str::pluralStudly(class_basename($relationship->relatedModel)))
                );
                foreach ($this->resolveRelationships($relatedTable) as $related) {
                    $this->detectCycles($related, $visited, $stack);
                }
            } catch (Throwable $e) {
                // Ignore errors for non-existent tables
            }
        }

        array_pop($stack);
    }
}
