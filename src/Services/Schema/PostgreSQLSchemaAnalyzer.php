<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Services\Schema;

use Illuminate\Support\Facades\DB;
use SAC\EloquentModelGenerator\Exceptions\ModelGeneratorSchemaAnalyzerException;
use SAC\EloquentModelGenerator\ValueObjects\Column;
use Throwable;

class PostgreSQLSchemaAnalyzer extends BaseSchemaAnalyzer {
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
            $schemaBuilder = $this->getSchemaBuilder();
            $columnListing = $schemaBuilder->getColumnListing($table);

            // Get primary key
            $primaryKey = null;
            $keys = DB::select("
                SELECT a.attname
                FROM   pg_index i
                JOIN   pg_attribute a ON a.attrelid = i.indrelid
                                    AND a.attnum = ANY(i.indkey)
                WHERE  i.indrelid = ?::regclass
                AND    i.indisprimary
            ", [$table]);
            if (!empty($keys)) {
                $primaryKey = $keys[0]->attname;
            }

            // Get column details
            foreach ($columnListing as $columnName) {
                $columnInfo = DB::select("
                    SELECT
                        column_name,
                        data_type,
                        character_maximum_length,
                        column_default,
                        is_nullable,
                        numeric_precision,
                        numeric_scale,
                        udt_name
                    FROM information_schema.columns
                    WHERE table_name = ? AND column_name = ?
                ", [$table, $columnName])[0];

                // Check if column is unique
                $isUnique = DB::select("
                    SELECT COUNT(*) as count
                    FROM pg_index i
                    JOIN pg_attribute a ON a.attrelid = i.indrelid AND a.attnum = ANY(i.indkey)
                    WHERE i.indrelid = ?::regclass
                    AND i.indisunique AND NOT i.indisprimary
                    AND a.attname = ?
                ", [$table, $columnName])[0]->count > 0;

                // Check for auto-increment (serial)
                $isAutoIncrement = str_contains(
                    strtolower($columnInfo->column_default ?? ''),
                    'nextval'
                );

                // Get the length based on data type
                $length = null;
                if ($columnInfo->character_maximum_length !== null) {
                    $length = (int) $columnInfo->character_maximum_length;
                } elseif ($columnInfo->numeric_precision !== null) {
                    $length = (int) $columnInfo->numeric_precision;
                }

                // Handle enum types
                $enumValues = null;
                if ($columnInfo->data_type === 'USER-DEFINED') {
                    $enumValues = DB::select("
                        SELECT e.enumlabel
                        FROM pg_type t
                        JOIN pg_enum e ON t.oid = e.enumtypid
                        JOIN pg_catalog.pg_namespace n ON n.oid = t.typnamespace
                        WHERE t.typname = ?
                    ", [$columnInfo->udt_name]);

                    if (!empty($enumValues)) {
                        $enumValues = array_map(fn($e) => $e->enumlabel, $enumValues);
                    }
                }

                $columns[] = new Column(
                    name: $columnName,
                    type: $this->mapColumnType($columnInfo->data_type),
                    isPrimary: $columnName === $primaryKey,
                    isAutoIncrement: $isAutoIncrement,
                    isNullable: strtolower($columnInfo->is_nullable) === 'yes',
                    isUnique: $isUnique,
                    default: $this->parseDefault($columnInfo->column_default),
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

            // Get foreign key constraints
            $foreignKeys = DB::select("
                SELECT
                    tc.table_schema,
                    tc.constraint_name,
                    tc.table_name,
                    kcu.column_name,
                    ccu.table_name AS referenced_table,
                    ccu.column_name AS referenced_column
                FROM
                    information_schema.table_constraints AS tc
                    JOIN information_schema.key_column_usage AS kcu
                      ON tc.constraint_name = kcu.constraint_name
                      AND tc.table_schema = kcu.table_schema
                    JOIN information_schema.constraint_column_usage AS ccu
                      ON ccu.constraint_name = tc.constraint_name
                      AND ccu.table_schema = tc.table_schema
                WHERE tc.constraint_type = 'FOREIGN KEY' AND tc.table_name = ?
            ", [$table]);

            foreach ($foreignKeys as $foreignKey) {
                // Determine relationship type based on column names and constraints
                $type = 'belongsTo'; // Default to belongsTo for foreign keys

                // Check if the referenced table has a foreign key back to this table
                $reverseFK = DB::select("
                    SELECT COUNT(*) as count
                    FROM information_schema.table_constraints AS tc
                    JOIN information_schema.key_column_usage AS kcu
                      ON tc.constraint_name = kcu.constraint_name
                    JOIN information_schema.constraint_column_usage AS ccu
                      ON ccu.constraint_name = tc.constraint_name
                    WHERE tc.constraint_type = 'FOREIGN KEY'
                      AND tc.table_name = ?
                      AND ccu.table_name = ?
                ", [$foreignKey->referenced_table, $table]);

                if ($reverseFK[0]->count > 0) {
                    $type = 'belongsToMany';
                }

                $relationships[] = $this->getRelationshipDefinition(
                    type: $type,
                    foreignTable: $foreignKey->referenced_table,
                    foreignKey: $foreignKey->column_name,
                    localKey: $foreignKey->referenced_column
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

    /**
     * Parse the default value from PostgreSQL format.
     */
    private function parseDefault(?string $default): ?string {
        if ($default === null) {
            return null;
        }

        // Remove sequence defaults
        if (str_contains($default, 'nextval')) {
            return null;
        }

        // Remove type casting
        if (preg_match("/^'(.+)'::[\w\s]+$/", $default, $matches)) {
            return $matches[1];
        }

        // Remove quotes from string defaults
        if (preg_match("/^'(.+)'$/", $default, $matches)) {
            return $matches[1];
        }

        return $default;
    }
}