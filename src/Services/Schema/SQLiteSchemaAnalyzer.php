<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Services\Schema;

use Illuminate\Support\Facades\DB;
use SAC\EloquentModelGenerator\Exceptions\ModelGeneratorSchemaAnalyzerException;
use SAC\EloquentModelGenerator\ValueObjects\Column;
use Throwable;

class SQLiteSchemaAnalyzer extends BaseSchemaAnalyzer {
    /**
     * Get the columns for a table.
     *
     * @return Column[]
     *
     * @throws ModelGeneratorSchemaAnalyzerException
     */
    protected function getColumns(string $table): array {
        try {
            $columns = [];

            // Get table info including column details
            $columnInfo = DB::select("PRAGMA table_info(`{$table}`)");

            // Get index information
            $indexInfo = DB::select("PRAGMA index_list(`{$table}`)");
            $uniqueColumns = [];

            foreach ($indexInfo as $index) {
                if ($index->unique) {
                    $indexColumns = DB::select("PRAGMA index_info(`{$index->name}`)");
                    foreach ($indexColumns as $indexColumn) {
                        $uniqueColumns[] = $indexColumn->name;
                    }
                }
            }

            foreach ($columnInfo as $column) {
                // Parse type and length
                $type = strtolower($column->type);
                $length = null;

                if (preg_match('/^(\w+)\((\d+)\)/', $type, $matches)) {
                    $type = $matches[1];
                    $length = (int) $matches[2];
                }

                // SQLite doesn't have a built-in enum type, but we can check if it's implemented as a CHECK constraint
                $enumValues = null;
                $checkConstraints = DB::select("SELECT sql FROM sqlite_master WHERE type='table' AND name=?", [$table]);
                if (!empty($checkConstraints)) {
                    $sql = $checkConstraints[0]->sql;
                    if (preg_match("/{$column->name}\s+.*CHECK\s*\((.*?)\)/i", $sql, $matches)) {
                        $check = $matches[1];
                        if (preg_match_all("/'([^']+)'/", $check, $values)) {
                            $enumValues = $values[1];
                        }
                    }
                }

                $columns[] = new Column(
                    name: $column->name,
                    type: $this->mapColumnType($type),
                    isPrimary: (bool) $column->pk,
                    isAutoIncrement: (bool) $column->pk && strtolower($type) === 'integer',
                    isNullable: !$column->notnull,
                    isUnique: in_array($column->name, $uniqueColumns, true),
                    default: $column->dflt_value,
                    length: $length,
                    enumValues: $enumValues
                );
            }

            return $columns;
        } catch (Throwable $throwable) {
            throw new ModelGeneratorSchemaAnalyzerException(
                "Failed to get columns for table {$table}: " . $throwable->getMessage(),
                previous: $throwable
            );
        }
    }

    /**
     * Get relationships for a table.
     *
     * @return array<array{type: string, foreignTable: string, foreignKey: string, localKey: string}>
     *
     * @throws ModelGeneratorSchemaAnalyzerException
     */
    protected function getRelationships(string $table): array {
        try {
            $relationships = [];

            // Get foreign key information
            $foreignKeys = DB::select("PRAGMA foreign_key_list(`{$table}`)");

            foreach ($foreignKeys as $foreignKey) {
                // Determine relationship type
                $type = 'belongsTo'; // Default to belongsTo for foreign keys

                // Check if the referenced table has a foreign key back to this table
                $reverseFK = DB::select("PRAGMA foreign_key_list(`{$foreignKey->table}`)");
                foreach ($reverseFK as $fk) {
                    if ($fk->table === $table) {
                        $type = 'belongsToMany';
                        break;
                    }
                }

                $relationships[] = $this->getRelationshipDefinition(
                    type: $type,
                    foreignTable: $foreignKey->table,
                    foreignKey: $foreignKey->from,
                    localKey: $foreignKey->to
                );
            }

            return $relationships;
        } catch (Throwable $throwable) {
            throw new ModelGeneratorSchemaAnalyzerException(
                "Failed to get relationships for table {$table}: " . $throwable->getMessage(),
                previous: $throwable
            );
        }
    }
}