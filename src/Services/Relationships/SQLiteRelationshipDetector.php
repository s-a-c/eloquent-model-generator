<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Services\Relationships;

use Illuminate\Database\Connection;
use SAC\EloquentModelGenerator\Contracts\RelationshipDetector;
use SAC\EloquentModelGenerator\Exceptions\RelationshipDetectorException;
use SAC\EloquentModelGenerator\ValueObjects\Relationship;
use Illuminate\Support\Str;

/**
 * SQLite Relationship Detector
 *
 * Detects and analyzes relationships between tables in a SQLite database.
 * Supports detection of:
 * - One-to-One relationships
 * - One-to-Many relationships
 * - Many-to-Many relationships
 * - Polymorphic relationships
 */
class SQLiteRelationshipDetector implements RelationshipDetector {
    public function __construct(
        private readonly Connection $connection
    ) {
    }

    /**
     * Detect all relationships for a given table.
     *
     * @param string $table The table name
     * @return array<Relationship> Array of detected relationships
     * @throws RelationshipDetectorException
     */
    public function detect(string $table): array {
        try {
            return array_merge(
                $this->detectBelongsToRelationships($table),
                $this->detectHasRelationships($table),
                $this->detectManyToManyRelationships($table),
                $this->detectPolymorphicRelationships($table)
            );
        } catch (\Exception $e) {
            throw RelationshipDetectorException::detectionFailed($table, $e->getMessage());
        }
    }

    /**
     * Detect "belongs to" relationships based on foreign keys.
     *
     * @param string $table The table name
     * @return array<Relationship> Array of detected relationships
     */
    private function detectBelongsToRelationships(string $table): array {
        $relationships = [];
        $foreignKeys = $this->connection->select("PRAGMA foreign_key_list({$table})");

        foreach ($foreignKeys as $foreignKey) {
            $relationships[] = new Relationship(
                type: 'belongsTo',
                table: $foreignKey->table,
                foreignKey: $foreignKey->from,
                localKey: $foreignKey->to,
                name: $this->generateRelationshipName('belongsTo', $foreignKey->table)
            );
        }

        return $relationships;
    }

    /**
     * Detect "has one" and "has many" relationships.
     *
     * @param string $table The table name
     * @return array<Relationship> Array of detected relationships
     */
    private function detectHasRelationships(string $table): array {
        $relationships = [];
        $tables = $this->getTables();

        foreach ($tables as $relatedTable) {
            if ($relatedTable === $table) {
                continue;
            }

            $foreignKeys = $this->connection->select("PRAGMA foreign_key_list({$relatedTable})");
            foreach ($foreignKeys as $foreignKey) {
                if ($foreignKey->table === $table) {
                    $type = $this->isOneToOne($relatedTable, $foreignKey->from) ? 'hasOne' : 'hasMany';

                    $relationships[] = new Relationship(
                        type: $type,
                        table: $relatedTable,
                        foreignKey: $foreignKey->from,
                        localKey: $foreignKey->to,
                        name: $this->generateRelationshipName($type, $relatedTable)
                    );
                }
            }
        }

        return $relationships;
    }

    /**
     * Detect many-to-many relationships through pivot tables.
     *
     * @param string $table The table name
     * @return array<Relationship> Array of detected relationships
     */
    private function detectManyToManyRelationships(string $table): array {
        $relationships = [];
        $pivotTables = $this->findPivotTables($table);

        foreach ($pivotTables as $pivotTable => $relatedTable) {
            $relationships[] = new Relationship(
                type: 'belongsToMany',
                table: $relatedTable,
                foreignKey: $this->getForeignKeyName($pivotTable, $table),
                localKey: 'id',
                name: $this->generateRelationshipName('belongsToMany', $relatedTable),
                pivotTable: $pivotTable,
                pivotForeignKey: $this->getForeignKeyName($pivotTable, $relatedTable)
            );
        }

        return $relationships;
    }

    /**
     * Detect polymorphic relationships.
     *
     * @param string $table The table name
     * @return array<Relationship> Array of detected relationships
     */
    private function detectPolymorphicRelationships(string $table): array {
        $relationships = [];
        $tables = $this->getTables();

        foreach ($tables as $relatedTable) {
            $columns = $this->getTableColumns($relatedTable);

            foreach ($columns as $column) {
                if (str_ends_with($column, '_type')) {
                    $baseColumn = substr($column, 0, -5);
                    $idColumn = $baseColumn . '_id';

                    if (in_array($idColumn, $columns, true)) {
                        // Check if this table is a polymorphic parent
                        $typeValue = $this->getPolymorphicType($relatedTable, $column, $table);
                        if ($typeValue) {
                            $relationships[] = new Relationship(
                                type: 'morphMany',
                                table: $relatedTable,
                                morphType: $column,
                                morphId: $idColumn,
                                name: $this->generateRelationshipName('morphMany', $relatedTable)
                            );
                        }
                        // Check if this table is a polymorphic child
                        if ($table === $relatedTable) {
                            $relationships[] = new Relationship(
                                type: 'morphTo',
                                name: $baseColumn
                            );
                        }
                    }
                }
            }
        }

        return $relationships;
    }

    /**
     * Get all tables in the database.
     *
     * @return array<string> Array of table names
     */
    private function getTables(): array {
        return $this->connection->table('sqlite_master')
            ->where('type', 'table')
            ->whereNotIn('name', ['sqlite_sequence'])
            ->pluck('name')
            ->toArray();
    }

    /**
     * Get all columns for a table.
     *
     * @param string $table The table name
     * @return array<string> Array of column names
     */
    private function getTableColumns(string $table): array {
        return collect($this->connection->select("PRAGMA table_info({$table})"))
            ->pluck('name')
            ->toArray();
    }

    /**
     * Check if a relationship is one-to-one based on unique constraints.
     *
     * @param string $table The table name
     * @param string $column The column name
     * @return bool True if the relationship is one-to-one
     */
    private function isOneToOne(string $table, string $column): bool {
        $indexes = $this->connection->select("PRAGMA index_list({$table})");

        foreach ($indexes as $index) {
            if ($index->unique) {
                $indexInfo = $this->connection->select("PRAGMA index_info({$index->name})");
                if (count($indexInfo) === 1 && $indexInfo[0]->name === $column) {
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * Find pivot tables for many-to-many relationships.
     *
     * @param string $table The table name
     * @return array<string, string> Array of [pivot_table => related_table]
     */
    private function findPivotTables(string $table): array {
        $pivotTables = [];
        $tables = $this->getTables();
        $singular = Str::singular($table);

        foreach ($tables as $potentialPivot) {
            if ($this->isPivotTable($potentialPivot)) {
                $foreignKeys = $this->connection->select("PRAGMA foreign_key_list({$potentialPivot})");
                $references = [];

                foreach ($foreignKeys as $foreignKey) {
                    $references[] = $foreignKey->table;
                }

                if (in_array($table, $references, true)) {
                    $otherTable = array_values(array_diff($references, [$table]))[0] ?? null;
                    if ($otherTable) {
                        $pivotTables[$potentialPivot] = $otherTable;
                    }
                }
            }
        }

        return $pivotTables;
    }

    /**
     * Check if a table is a pivot table.
     *
     * @param string $table The table name
     * @return bool True if the table is a pivot table
     */
    private function isPivotTable(string $table): bool {
        $foreignKeys = $this->connection->select("PRAGMA foreign_key_list({$table})");
        $columns = $this->getTableColumns($table);

        return count($foreignKeys) === 2 && count($columns) <= 4;
    }

    /**
     * Get the foreign key name for a table in a pivot table.
     *
     * @param string $pivotTable The pivot table name
     * @param string $table The table name
     * @return string The foreign key name
     */
    private function getForeignKeyName(string $pivotTable, string $table): string {
        $foreignKeys = $this->connection->select("PRAGMA foreign_key_list({$pivotTable})");

        foreach ($foreignKeys as $foreignKey) {
            if ($foreignKey->table === $table) {
                return $foreignKey->from;
            }
        }

        return Str::singular($table) . '_id';
    }

    /**
     * Get the polymorphic type value for a table.
     *
     * @param string $table The table name
     * @param string $typeColumn The type column name
     * @param string $modelTable The model table name
     * @return string|null The type value or null if not found
     */
    private function getPolymorphicType(string $table, string $typeColumn, string $modelTable): ?string {
        $result = $this->connection->table($table)
            ->select($typeColumn)
            ->where($typeColumn, 'like', '%' . Str::studly(Str::singular($modelTable)))
            ->first();

        return $result ? $result->{$typeColumn} : null;
    }

    /**
     * Generate a relationship name based on type and table.
     *
     * @param string $type The relationship type
     * @param string $table The related table name
     * @return string The relationship name
     */
    private function generateRelationshipName(string $type, string $table): string {
        $baseName = Str::studly(Str::singular($table));

        return match ($type) {
            'hasMany' => Str::camel(Str::plural($table)),
            'belongsToMany' => Str::camel(Str::plural($table)),
            'morphMany' => Str::camel(Str::plural($table)),
            default => Str::camel($baseName),
        };
    }
}