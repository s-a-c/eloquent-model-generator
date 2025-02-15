<?php

namespace SAC\EloquentModelGenerator\ValueObjects;

class TableSchema
{
    /**
     * @param  array<Column>  $columns
     */
    public function __construct(
        private readonly string $tableName,
        private readonly array $columns
    ) {}

    /**
     * Get the table name.
     */
    public function getTableName(): string
    {
        return $this->tableName;
    }

    /**
     * Get the columns.
     *
     * @return array<Column>
     */
    public function getColumns(): array
    {
        return $this->columns;
    }

    /**
     * Convert the schema to an array.
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
     *         unique?: bool
     *     }>,
     *     indexes?: array<string, array{
     *         type: string,
     *         columns: array<string>
     *     }>,
     *     foreignKeys?: array<string, array{
     *         table: string,
     *         columns: array<string, string>
     *     }>
     * }
     */
    public function toArray(): array
    {
        $columns = [];
        foreach ($this->columns as $column) {
            $columns[$column->getName()] = [
                'type' => $column->getType(),
                'nullable' => $column->isNullable(),
                'default' => $column->getDefault(),
                'length' => $column->getLength(),
                'autoIncrement' => $column->isAutoIncrement(),
                'primary' => $column->isPrimary(),
                'unique' => $column->isUnique(),
            ];
        }

        return [
            'columns' => $columns,
            'indexes' => [],
            'foreignKeys' => [],
        ];
    }
}
