<?php

namespace SAC\EloquentModelGenerator\ValueObjects;

class TableSchema {
    /**
     * @param string $tableName
     * @param array<Column> $columns
     */
    public function __construct(
        private readonly string $tableName,
        private readonly array $columns
    ) {
    }

    /**
     * Get the table name.
     */
    public function getTableName(): string {
        return $this->tableName;
    }

    /**
     * Get the columns.
     *
     * @return array<Column>
     */
    public function getColumns(): array {
        return $this->columns;
    }
}
