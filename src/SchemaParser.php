<?php

namespace SAC\EloquentModelGenerator;

/**
 * @phpstan-type ColumnDefinition array{
 *     type: string,
 *     nullable: bool,
 *     default?: mixed,
 *     length?: int|null,
 *     unsigned?: bool,
 *     autoIncrement?: bool,
 *     primary?: bool,
 *     unique?: bool,
 *     comment?: string|null
 * }
 * @phpstan-type IndexDefinition array{
 *     type: string,
 *     columns: array<string>,
 *     unique?: bool
 * }
 */
class SchemaParser
{
    /**
     * Parse column definitions.
     *
     * @param  array<string, ColumnDefinition>  $columns
     * @return array<string, array{type: string, cast?: string}>
     */
    public function parseColumns(array $columns): array
    {
        $parsed = [];
        foreach ($columns as $name => $column) {
            $parsed[$name] = [
                'type' => $this->normalizeColumnType($column['type']),
                'cast' => $this->determineCastType($column['type'], $column),
            ];
        }

        return $parsed;
    }

    /**
     * Parse index definitions.
     *
     * @param  array<string, IndexDefinition>  $indexes
     * @return array<string, array{type: string, columns: array<string>}>
     */
    public function parseIndexes(array $indexes): array
    {
        $parsed = [];
        foreach ($indexes as $name => $index) {
            $parsed[$name] = [
                'type' => $this->normalizeIndexType($index['type']),
                'columns' => $index['columns'],
                'unique' => $index['unique'] ?? false,
            ];
        }

        return $parsed;
    }

    /**
     * Normalize a column type.
     */
    private function normalizeColumnType(string $type): string
    {
        return match (strtolower($type)) {
            'int', 'integer', 'tinyint', 'smallint', 'mediumint', 'bigint' => 'integer',
            'decimal', 'numeric', 'float', 'double' => 'decimal',
            'datetime', 'timestamp' => 'datetime',
            'bool', 'boolean', 'tinyint(1)' => 'boolean',
            default => $type,
        };
    }

    /**
     * Normalize an index type.
     */
    private function normalizeIndexType(string $type): string
    {
        return match (strtolower($type)) {
            'primary' => 'primary',
            'unique' => 'unique',
            'index', 'key' => 'index',
            'fulltext' => 'fulltext',
            'spatial' => 'spatial',
            default => 'index',
        };
    }

    /**
     * Determine the cast type for a column.
     *
     * @param  ColumnDefinition  $column
     */
    private function determineCastType(string $type, array $column): ?string
    {
        $type = strtolower($type);

        if (isset($column['length']) && $type === 'varchar' && $column['length'] === 36) {
            return 'uuid';
        }

        return match ($type) {
            'int', 'integer', 'tinyint', 'smallint', 'mediumint', 'bigint' => 'integer',
            'decimal', 'numeric', 'float', 'double' => 'decimal',
            'datetime', 'timestamp' => 'datetime',
            'date' => 'date',
            'time' => 'time',
            'bool', 'boolean', 'tinyint(1)' => 'boolean',
            'json', 'jsonb' => 'array',
            default => null,
        };
    }
}
