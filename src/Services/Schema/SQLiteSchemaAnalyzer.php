<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Services\Schema;

use Illuminate\Database\Connection;
use Illuminate\Support\Str;
use SAC\EloquentModelGenerator\Contracts\SchemaAnalyzer;
use SAC\EloquentModelGenerator\Exceptions\SchemaAnalyzerException;
use SAC\EloquentModelGenerator\ValueObjects\Column;
use SAC\EloquentModelGenerator\ValueObjects\ForeignKey;

/**
 * SQLite Schema Analyzer
 *
 * Analyzes SQLite database schema to extract table structure, relationships,
 * and metadata for model generation.
 */
class SQLiteSchemaAnalyzer implements SchemaAnalyzer {
    public function __construct(
        private readonly Connection $connection
    ) {
    }

    /**
     * Analyze a table's schema.
     *
     * @param string $table The table name to analyze
     * @return array{
     *     columns: array<string, array{
     *         type: string,
     *         nullable: bool,
     *         default: mixed,
     *         primary: bool,
     *         unique: bool,
     *         auto_increment: bool
     *     }>,
     *     relationships: array<array{
     *         type: string,
     *         table: string,
     *         foreign_key: string,
     *         local_key: string
     *     }>
     * }
     * @throws SchemaAnalyzerException
     */
    public function analyze(string $table): array {
        if (!$this->tableExists($table)) {
            throw SchemaAnalyzerException::tableNotFound($table);
        }

        return [
            'columns' => $this->getColumns($table),
            'relationships' => $this->getRelationships($table),
        ];
    }

    /**
     * Check if a table exists.
     *
     * @param string $table The table name to check
     * @return bool True if the table exists, false otherwise
     */
    public function tableExists(string $table): bool {
        try {
            $result = $this->connection->selectOne(
                "SELECT name FROM sqlite_master WHERE type='table' AND name = ?",
                [$table]
            );
            return $result !== null;
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Get all tables in the database.
     *
     * @return array<string> List of table names
     */
    public function getTables(): array {
        try {
            return $this->connection->table('sqlite_master')
                ->where('type', 'table')
                ->whereNotIn('name', ['sqlite_sequence'])
                ->pluck('name')
                ->toArray();
        } catch (\Exception $e) {
            throw SchemaAnalyzerException::databaseConnectionError($e->getMessage());
        }
    }

    /**
     * Get column information for a table.
     *
     * @param string $table The table name
     * @return array<string, array> Column information
     * @throws SchemaAnalyzerException
     */
    private function getColumns(string $table): array {
        try {
            $columns = [];
            $tableInfo = $this->connection->select("PRAGMA table_info({$table})");
            $indexInfo = $this->getIndexInfo($table);

            foreach ($tableInfo as $column) {
                $type = $this->parseColumnType($column->type);
                $isUnique = isset($indexInfo[$column->name]) && $indexInfo[$column->name]['unique'];

                $columns[$column->name] = [
                    'type' => $this->mapColumnType($type),
                    'nullable' => !$column->notnull,
                    'default' => $column->dflt_value,
                    'primary' => (bool)$column->pk,
                    'unique' => $isUnique,
                    'auto_increment' => (bool)$column->pk && strtolower($type) === 'integer',
                ];
            }

            return $columns;
        } catch (\Exception $e) {
            throw SchemaAnalyzerException::columnNotFound($table, '*');
        }
    }

    /**
     * Get relationship information for a table.
     *
     * @param string $table The table name
     * @return array<array> Relationship information
     * @throws SchemaAnalyzerException
     */
    private function getRelationships(string $table): array {
        try {
            $relationships = [];
            $foreignKeys = $this->connection->select("PRAGMA foreign_key_list({$table})");

            foreach ($foreignKeys as $foreignKey) {
                $relationships[] = [
                    'type' => 'belongsTo',
                    'table' => $foreignKey->table,
                    'foreign_key' => $foreignKey->from,
                    'local_key' => $foreignKey->to,
                ];

                // Add inverse relationship
                $relationships[] = [
                    'type' => $this->determineRelationType($table, $foreignKey->table),
                    'table' => $table,
                    'foreign_key' => $foreignKey->from,
                    'local_key' => $foreignKey->to,
                ];
            }

            return $relationships;
        } catch (\Exception $e) {
            throw SchemaAnalyzerException::invalidForeignKey($table, '', '');
        }
    }

    /**
     * Get index information for a table.
     *
     * @param string $table The table name
     * @return array<string, array> Index information
     */
    private function getIndexInfo(string $table): array {
        $indexes = [];
        $indexList = $this->connection->select("PRAGMA index_list({$table})");

        foreach ($indexList as $index) {
            $indexInfo = $this->connection->select("PRAGMA index_info({$index->name})");
            foreach ($indexInfo as $column) {
                $indexes[$column->name] = [
                    'name' => $index->name,
                    'unique' => (bool)$index->unique,
                ];
            }
        }

        return $indexes;
    }

    /**
     * Parse SQLite column type.
     *
     * @param string $type The raw column type
     * @return string The parsed type
     */
    private function parseColumnType(string $type): string {
        // Extract base type without size/precision
        preg_match('/^(\w+)(?:\(.*\))?/', $type, $matches);
        return $matches[1] ?? $type;
    }

    /**
     * Map SQLite column type to standardized type.
     *
     * @param string $type The SQLite type
     * @return string The standardized type
     */
    private function mapColumnType(string $type): string {
        return match (strtolower($type)) {
            'integer', 'int' => 'integer',
            'real', 'double', 'float', 'decimal' => 'float',
            'text', 'varchar', 'char' => 'string',
            'blob' => 'binary',
            'boolean', 'bool' => 'boolean',
            'datetime', 'timestamp' => 'datetime',
            'date' => 'date',
            'time' => 'time',
            'json' => 'json',
            default => 'string',
        };
    }

    /**
     * Determine the type of relationship based on table structure.
     *
     * @param string $table The table name
     * @param string $relatedTable The related table name
     * @return string The relationship type
     */
    private function determineRelationType(string $table, string $relatedTable): string {
        // Check if it's a many-to-many relationship
        $pivotTable = $this->findPivotTable($table, $relatedTable);
        if ($pivotTable !== null) {
            return 'belongsToMany';
        }

        // Check if it's a one-to-one relationship
        if ($this->isOneToOne($table, $relatedTable)) {
            return 'hasOne';
        }

        // Default to one-to-many
        return 'hasMany';
    }

    /**
     * Find a pivot table between two tables.
     *
     * @param string $table1 First table name
     * @param string $table2 Second table name
     * @return string|null The pivot table name if found, null otherwise
     */
    private function findPivotTable(string $table1, string $table2): ?string {
        $tables = $this->getTables();
        $singular1 = Str::singular($table1);
        $singular2 = Str::singular($table2);

        foreach ($tables as $table) {
            if (
                str_contains($table, $singular1) &&
                str_contains($table, $singular2) &&
                $this->isPivotTable($table)
            ) {
                return $table;
            }
        }

        return null;
    }

    /**
     * Check if a table is a pivot table.
     *
     * @param string $table The table name
     * @return bool True if the table is a pivot table
     */
    private function isPivotTable(string $table): bool {
        try {
            $columns = $this->getColumns($table);
            $foreignKeys = $this->connection->select("PRAGMA foreign_key_list({$table})");

            // A pivot table typically has exactly two foreign keys
            return count($foreignKeys) === 2 && count($columns) <= 4;
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Check if a relationship is one-to-one.
     *
     * @param string $table The table name
     * @param string $relatedTable The related table name
     * @return bool True if the relationship is one-to-one
     */
    private function isOneToOne(string $table, string $relatedTable): bool {
        try {
            $foreignKeys = $this->connection->select("PRAGMA foreign_key_list({$table})");
            foreach ($foreignKeys as $foreignKey) {
                if ($foreignKey->table === $relatedTable) {
                    // Check if the foreign key column is unique
                    $indexInfo = $this->getIndexInfo($table);
                    return isset($indexInfo[$foreignKey->from]) && $indexInfo[$foreignKey->from]['unique'];
                }
            }
            return false;
        } catch (\Exception $e) {
            return false;
        }
    }
}