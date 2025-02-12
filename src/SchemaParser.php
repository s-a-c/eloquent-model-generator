<?php

namespace SAC\EloquentModelGenerator;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class SchemaParser {
    /**
     * Parse column definitions.
     *
     * @param array $columns
     * @return Collection
     */
    public function parseColumns(array $columns): Collection {
        return collect($columns)->map(function ($column, $name) {
            $type = $this->normalizeColumnType($column['type']);

            return [
                'name' => $name,
                'type' => $type,
                'length' => $column['length'] ?? null,
                'nullable' => $column['nullable'] ?? false,
                'default' => $column['default'] ?? null,
                'unsigned' => $column['unsigned'] ?? false,
                'autoIncrement' => $column['autoIncrement'] ?? false,
                'primary' => $column['primary'] ?? false,
                'cast' => $this->determineCastType($type, $column),
            ];
        });
    }

    /**
     * Parse index definitions.
     *
     * @param array $indexes
     * @return Collection
     */
    public function parseIndexes(array $indexes): Collection {
        return collect($indexes)->map(function ($index, $name) {
            return [
                'name' => $name,
                'columns' => (array) $index['columns'],
                'type' => $this->normalizeIndexType($index['type']),
                'unique' => $index['unique'] ?? false,
            ];
        });
    }

    /**
     * Normalize the column type.
     *
     * @param string $type
     * @return string
     */
    private function normalizeColumnType(string $type): string {
        $type = strtolower($type);

        // Map common type aliases
        $typeMap = [
            'int' => 'integer',
            'bool' => 'boolean',
            'char' => 'string',
            'varchar' => 'string',
            'text' => 'string',
            'mediumtext' => 'string',
            'longtext' => 'string',
            'float' => 'decimal',
            'double' => 'decimal',
            'datetime' => 'timestamp',
            'numeric' => 'decimal',
        ];

        return $typeMap[$type] ?? $type;
    }

    /**
     * Normalize the index type.
     *
     * @param string $type
     * @return string
     */
    private function normalizeIndexType(string $type): string {
        $type = strtolower($type);

        // Map index types
        $typeMap = [
            'primary' => 'primary',
            'unique' => 'unique',
            'index' => 'index',
            'fulltext' => 'fulltext',
            'spatial' => 'spatial',
        ];

        return $typeMap[$type] ?? 'index';
    }

    /**
     * Determine the cast type for a column.
     *
     * @param string $type
     * @param array $column
     * @return string|null
     */
    private function determineCastType(string $type, array $column): ?string {
        $castMap = [
            'integer' => 'integer',
            'bigint' => 'integer',
            'boolean' => 'boolean',
            'decimal' => 'decimal',
            'float' => 'float',
            'double' => 'double',
            'string' => 'string',
            'datetime' => 'datetime',
            'timestamp' => 'timestamp',
            'date' => 'date',
            'time' => 'time',
            'json' => 'json',
            'array' => 'array',
            'object' => 'object',
            'collection' => 'collection',
        ];

        // Handle special cases
        if ($type === 'decimal' && isset($column['length'])) {
            return "decimal:{$column['length']}";
        }

        return $castMap[$type] ?? null;
    }
}
