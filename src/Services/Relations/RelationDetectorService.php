<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Services\Relations;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use SAC\EloquentModelGenerator\Contracts\RelationDetector;
use SAC\EloquentModelGenerator\Contracts\SchemaAnalyzer;
use SAC\EloquentModelGenerator\Exceptions\ModelGeneratorException;
use SAC\EloquentModelGenerator\ValueObjects\Column;

class RelationDetectorService implements RelationDetector {
    public function __construct(
        private readonly SchemaAnalyzer $schemaAnalyzer
    ) {
    }

    /**
     * Detect all relationships for a table.
     *
     * @return array<array{
     *     type: string,
     *     name: string,
     *     related: string,
     *     foreignKey: string,
     *     localKey: string,
     *     through?: string,
     *     pivotTable?: string,
     *     pivotForeignKey?: string,
     *     pivotRelatedKey?: string
     * }>
     */
    public function detectRelationships(string $table): array {
        $schema = $this->schemaAnalyzer->analyze($table);
        $relationships = [];

        // Process direct relationships from foreign keys
        foreach ($schema['relationships'] as $relation) {
            $relationships[] = $this->processDirectRelation($table, $relation);
        }

        // Detect many-to-many relationships through pivot tables
        $pivotRelations = $this->detectPivotRelationships($table);
        $relationships = array_merge($relationships, $pivotRelations);

        // Detect polymorphic relationships
        $polyRelations = $this->detectPolymorphicRelationships($table, $schema['columns']);
        $relationships = array_merge($relationships, $polyRelations);

        // Detect has-many-through relationships
        $throughRelations = $this->detectHasManyThrough($table);
        $relationships = array_merge($relationships, $throughRelations);

        return $relationships;
    }

    /**
     * Process a direct relationship (belongsTo, hasOne, hasMany).
     *
     * @param array{type: string, foreignTable: string, foreignKey: string, localKey: string} $relation
     *
     * @return array{type: string, name: string, related: string, foreignKey: string, localKey: string}
     */
    private function processDirectRelation(string $table, array $relation): array {
        $name = $this->generateRelationshipName(
            $relation['type'],
            $relation['foreignTable'],
            $relation['foreignKey']
        );

        return [
            'type' => $relation['type'],
            'name' => $name,
            'related' => $relation['foreignTable'],
            'foreignKey' => $relation['foreignKey'],
            'localKey' => $relation['localKey'],
        ];
    }

    /**
     * Detect many-to-many relationships through pivot tables.
     *
     * @return array<array{
     *     type: string,
     *     name: string,
     *     related: string,
     *     foreignKey: string,
     *     localKey: string,
     *     pivotTable: string,
     *     pivotForeignKey: string,
     *     pivotRelatedKey: string
     * }>
     */
    private function detectPivotRelationships(string $table): array {
        $relationships = [];
        $tables = $this->schemaAnalyzer->getTables();

        foreach ($tables as $potentialPivot) {
            // Skip non-pivot tables
            if (!$this->isPivotTable($potentialPivot)) {
                continue;
            }

            $pivotSchema = $this->schemaAnalyzer->analyze($potentialPivot);
            $foreignKeys = array_filter(
                $pivotSchema['relationships'],
                fn($rel) => $rel['type'] === 'belongsTo'
            );

            if (count($foreignKeys) !== 2) {
                continue;
            }

            // Check if this pivot connects to our table
            $pivotKeys = array_values($foreignKeys);
            if ($pivotKeys[0]['foreignTable'] === $table) {
                $relationships[] = [
                    'type' => 'belongsToMany',
                    'name' => Str::camel(Str::plural($pivotKeys[1]['foreignTable'])),
                    'related' => $pivotKeys[1]['foreignTable'],
                    'foreignKey' => $pivotKeys[0]['foreignKey'],
                    'localKey' => $pivotKeys[0]['localKey'],
                    'pivotTable' => $potentialPivot,
                    'pivotForeignKey' => $pivotKeys[0]['foreignKey'],
                    'pivotRelatedKey' => $pivotKeys[1]['foreignKey'],
                ];
            } elseif ($pivotKeys[1]['foreignTable'] === $table) {
                $relationships[] = [
                    'type' => 'belongsToMany',
                    'name' => Str::camel(Str::plural($pivotKeys[0]['foreignTable'])),
                    'related' => $pivotKeys[0]['foreignTable'],
                    'foreignKey' => $pivotKeys[1]['foreignKey'],
                    'localKey' => $pivotKeys[1]['localKey'],
                    'pivotTable' => $potentialPivot,
                    'pivotForeignKey' => $pivotKeys[1]['foreignKey'],
                    'pivotRelatedKey' => $pivotKeys[0]['foreignKey'],
                ];
            }
        }

        return $relationships;
    }

    /**
     * Detect polymorphic relationships.
     *
     * @param array<string, array{type: string, nullable: bool}> $columns
     *
     * @return array<array{
     *     type: string,
     *     name: string,
     *     related: string,
     *     foreignKey: string,
     *     localKey: string
     * }>
     */
    private function detectPolymorphicRelationships(string $table, array $columns): array {
        $relationships = [];
        $morphColumns = [];

        // Find potential morphable columns (ending with _type and _id)
        foreach ($columns as $name => $column) {
            if (str_ends_with($name, '_type')) {
                $baseColumn = substr($name, 0, -5);
                if (isset($columns["{$baseColumn}_id"])) {
                    $morphColumns[] = $baseColumn;
                }
            }
        }

        // Create morphTo relationships for each morphable column
        foreach ($morphColumns as $morphColumn) {
            $relationships[] = [
                'type' => 'morphTo',
                'name' => $morphColumn,
                'related' => '*', // Polymorphic relationships can relate to multiple models
                'foreignKey' => "{$morphColumn}_id",
                'localKey' => 'id',
            ];
        }

        return $relationships;
    }

    /**
     * Detect has-many-through relationships.
     *
     * @return array<array{
     *     type: string,
     *     name: string,
     *     related: string,
     *     foreignKey: string,
     *     localKey: string,
     *     through: string
     * }>
     */
    private function detectHasManyThrough(string $table): array {
        $relationships = [];
        $schema = $this->schemaAnalyzer->analyze($table);

        // Get all tables that have a foreign key to this table
        foreach ($schema['relationships'] as $relation) {
            if ($relation['type'] !== 'hasMany') {
                continue;
            }

            // Check if the related table has its own relationships
            $throughSchema = $this->schemaAnalyzer->analyze($relation['foreignTable']);
            foreach ($throughSchema['relationships'] as $throughRelation) {
                if ($throughRelation['type'] !== 'hasMany') {
                    continue;
                }

                // Found a potential has-many-through relationship
                $relationships[] = [
                    'type' => 'hasManyThrough',
                    'name' => Str::camel(Str::plural($throughRelation['foreignTable'])),
                    'related' => $throughRelation['foreignTable'],
                    'foreignKey' => $relation['foreignKey'],
                    'localKey' => $relation['localKey'],
                    'through' => $relation['foreignTable'],
                ];
            }
        }

        return $relationships;
    }

    /**
     * Check if a table is likely a pivot table.
     */
    private function isPivotTable(string $table): bool {
        // Pivot tables typically have a compound name (e.g., role_user)
        if (!str_contains($table, '_')) {
            return false;
        }

        $schema = $this->schemaAnalyzer->analyze($table);

        // Pivot tables typically have exactly two foreign keys
        $foreignKeys = array_filter(
            $schema['relationships'],
            fn($rel) => $rel['type'] === 'belongsTo'
        );

        if (count($foreignKeys) !== 2) {
            return false;
        }

        // Pivot tables typically have few columns beyond foreign keys
        return count($schema['columns']) <= 4; // Allow for timestamps
    }

    /**
     * Generate a relationship name based on type and related table.
     */
    private function generateRelationshipName(string $type, string $relatedTable, string $foreignKey): string {
        // If the foreign key follows convention (e.g., user_id), use the base name
        if (str_ends_with($foreignKey, '_id')) {
            $baseName = substr($foreignKey, 0, -3);
            return match ($type) {
                'hasMany' => Str::camel(Str::plural($baseName)),
                'hasOne' => Str::camel($baseName),
                'belongsTo' => Str::camel($baseName),
                default => Str::camel($relatedTable),
            };
        }

        // Otherwise, use the table name
        return match ($type) {
            'hasMany' => Str::camel(Str::plural($relatedTable)),
            'hasOne', 'belongsTo' => Str::camel($relatedTable),
            default => Str::camel($relatedTable),
        };
    }
}