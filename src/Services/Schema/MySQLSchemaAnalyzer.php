<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Services\Schema;

use Illuminate\Support\Facades\DB;
use SAC\EloquentModelGenerator\Exceptions\ModelGeneratorSchemaAnalyzerException;
use SAC\EloquentModelGenerator\ValueObjects\Column;
use Throwable;

class MySQLSchemaAnalyzer extends BaseSchemaAnalyzer {
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
            $keys = DB::select("SHOW KEYS FROM `{$table}` WHERE Key_name = 'PRIMARY'");
            if (!empty($keys)) {
                $primaryKey = $keys[0]->Column_name;
            }

            // Get column details
            foreach ($columnListing as $columnName) {
                $columnInfo = DB::select("SHOW FULL COLUMNS FROM `{$table}` WHERE Field = ?", [$columnName])[0];

                $type = strtolower($columnInfo->Type);
                $length = null;

                // Extract length if specified
                if (preg_match('/^(\w+)\((\d+)\)/', $type, $matches)) {
                    $type = $matches[1];
                    $length = (int) $matches[2];
                }

                // Check for unsigned
                $isUnsigned = str_contains($columnInfo->Type, 'unsigned');
                if ($isUnsigned) {
                    $type = str_replace(' unsigned', '', $type);
                }

                // Get enum values if applicable
                $enumValues = null;
                if (str_starts_with($type, 'enum')) {
                    preg_match("/^enum\((.*)\)$/", $columnInfo->Type, $matches);
                    if (isset($matches[1])) {
                        $enumValues = array_map(
                            fn($value) => trim($value, "'"),
                            explode(',', $matches[1])
                        );
                    }
                    $type = 'enum';
                }

                $columns[] = new Column(
                    name: $columnName,
                    type: $this->mapColumnType($type),
                    isPrimary: $columnName === $primaryKey,
                    isAutoIncrement: str_contains(strtolower($columnInfo->Extra), 'auto_increment'),
                    isNullable: strtolower($columnInfo->Null) === 'yes',
                    isUnique: str_contains(strtolower($columnInfo->Key), 'uni'),
                    default: $columnInfo->Default,
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
                    COLUMN_NAME as column_name,
                    REFERENCED_TABLE_NAME as referenced_table,
                    REFERENCED_COLUMN_NAME as referenced_column
                FROM information_schema.KEY_COLUMN_USAGE
                WHERE
                    TABLE_SCHEMA = DATABASE()
                    AND TABLE_NAME = ?
                    AND REFERENCED_TABLE_NAME IS NOT NULL
            ", [$table]);

            foreach ($foreignKeys as $foreignKey) {
                // Determine relationship type based on column names and constraints
                $type = 'belongsTo'; // Default to belongsTo for foreign keys

                // Check if the referenced table has a foreign key back to this table
                $reverseFK = DB::select("
                    SELECT
                        COLUMN_NAME
                    FROM information_schema.KEY_COLUMN_USAGE
                    WHERE
                        TABLE_SCHEMA = DATABASE()
                        AND TABLE_NAME = ?
                        AND REFERENCED_TABLE_NAME = ?
                ", [$foreignKey->referenced_table, $table]);

                if (!empty($reverseFK)) {
                    $type = 'belongsToMany'; // It's a many-to-many relationship
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
}