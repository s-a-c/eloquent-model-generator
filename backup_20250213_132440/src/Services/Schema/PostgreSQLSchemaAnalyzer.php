<?php

namespace SAC\EloquentModelGenerator\Services\Schema;

use SAC\EloquentModelGenerator\Exceptions\ModelGeneratorException;
use SAC\EloquentModelGenerator\ValueObjects\Column;

class PostgreSQLSchemaAnalyzer extends BaseSchemaAnalyzer
{
    /**
     * Analyze table schema.
     *
     * @return array{
     *     columns: array<string, array{
     *         type: string,
     *         nullable: bool,
     *         default?: mixed,
     *         length?: int|null,
     *         unsigned?: bool,
     *         autoIncrement?: bool,
     *         primary?: bool,
     *         unique?: bool,
     *         comment?: string|null
     *     }>,
     *     relationships: array<array{
     *         type: string,
     *         foreignTable: string,
     *         foreignKey: string,
     *         localKey: string
     *     }>
     * }
     *
     * @throws ModelGeneratorException
     */
    public function analyze(string $table): array
    {
        if (! $this->hasTable($table)) {
            throw new ModelGeneratorException("Table '{$table}' does not exist");
        }

        $schema = $this->getSchemaBuilder();
        $columns = $this->analyzeColumns($table);
        $relationships = $this->analyzeRelationships($table);

        return [
            'columns' => $columns,
            'relationships' => $relationships,
        ];
    }

    /**
     * Analyze table columns.
     *
     * @return array<string, array{
     *     type: string,
     *     nullable: bool,
     *     default?: mixed,
     *     length?: int|null,
     *     unsigned?: bool,
     *     autoIncrement?: bool,
     *     primary?: bool,
     *     unique?: bool,
     *     comment?: string|null
     * }>
     */
    protected function analyzeColumns(string $table): array
    {
        $schema = $this->getSchemaBuilder();
        $columns = [];

        foreach ($schema->getColumnListing($table) as $columnName) {
            $type = $schema->getColumnType($table, $columnName);
            $columns[$columnName] = [
                'type' => $this->mapColumnType($type),
                'nullable' => ! $schema->getColumns($table)[$columnName]['notnull'],
                'default' => $schema->getColumns($table)[$columnName]['default'],
                'length' => $this->getColumnLength($table, $columnName),
                'unsigned' => false, // PostgreSQL doesn't support unsigned
                'autoIncrement' => $this->isColumnAutoIncrement($table, $columnName),
                'primary' => $this->isColumnPrimary($table, $columnName),
                'unique' => $this->isColumnUnique($table, $columnName),
                'comment' => $this->getColumnComment($table, $columnName),
            ];
        }

        return $columns;
    }

    /**
     * Analyze table relationships.
     *
     * @return array<array{type: string, foreignTable: string, foreignKey: string, localKey: string}>
     */
    protected function analyzeRelationships(string $table): array
    {
        $schema = $this->getSchemaBuilder();
        $relationships = [];

        foreach ($schema->getForeignKeys($table) as $foreignKey) {
            $relationships[] = $this->getRelationshipDefinition(
                'belongsTo',
                $foreignKey['foreign_table'],
                $foreignKey['foreign_column'],
                $foreignKey['local_column']
            );
        }

        return $relationships;
    }

    /**
     * Get column length.
     */
    protected function getColumnLength(string $table, string $column): ?int
    {
        $columns = $this->getSchemaBuilder()->getColumns($table);

        return $columns[$column]['length'] ?? null;
    }

    /**
     * Check if column is auto-increment.
     */
    protected function isColumnAutoIncrement(string $table, string $column): bool
    {
        $columns = $this->getSchemaBuilder()->getColumns($table);
        $type = $columns[$column]['type'] ?? '';

        return str_ends_with($type, 'serial');
    }

    /**
     * Check if column is primary key.
     */
    protected function isColumnPrimary(string $table, string $column): bool
    {
        $schema = $this->getSchemaBuilder();

        return in_array($column, $schema->getIndexes($table)['primary']['columns'] ?? [], true);
    }

    /**
     * Check if column is unique.
     */
    protected function isColumnUnique(string $table, string $column): bool
    {
        $schema = $this->getSchemaBuilder();
        foreach ($schema->getIndexes($table) as $index) {
            if ($index['unique'] && count($index['columns']) === 1 && $index['columns'][0] === $column) {
                return true;
            }
        }

        return false;
    }

    /**
     * Get column comment.
     */
    protected function getColumnComment(string $table, string $column): ?string
    {
        $columns = $this->getSchemaBuilder()->getColumns($table);

        return $columns[$column]['comment'] ?? null;
    }
}
