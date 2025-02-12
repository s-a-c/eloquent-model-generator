<?php

namespace SAC\EloquentModelGenerator\Services\Schema;

use SAC\EloquentModelGenerator\ValueObjects\TableSchema;
use SAC\EloquentModelGenerator\ValueObjects\Column;
use Illuminate\Database\ConnectionInterface;
use Illuminate\Support\Collection;
use SAC\EloquentModelGenerator\Exceptions\ModelGeneratorSchemaAnalyzerException;
use Illuminate\Database\Connection;

class MySQLSchemaAnalyzer implements SchemaAnalyzerInterface {
    public function __construct(
        private readonly ConnectionInterface $connection
    ) {
    }

    /**
     * Analyze the schema of a table.
     *
     * @param string $table
     * @return TableSchema
     */
    public function analyze(string $table): TableSchema {
        if (!$this->hasTable($table)) {
            throw new \InvalidArgumentException("Table '{$table}' does not exist");
        }

        $columns = $this->getColumns($table);
        return new TableSchema($table, $columns);
    }

    /**
     * Get all available tables.
     *
     * @return array<string>
     */
    public function getTables(): array {
        return $this->connection->getDoctrineSchemaManager()->listTableNames();
    }

    /**
     * Check if a table exists.
     *
     * @param string $table
     * @return bool
     */
    public function hasTable(string $table): bool {
        return $this->connection->getDoctrineSchemaManager()->tablesExist([$table]);
    }

    /**
     * Get the columns for a table.
     *
     * @param string $table
     * @return array<Column>
     */
    private function getColumns(string $table): array {
        $columns = [];
        $schemaManager = $this->connection->getDoctrineSchemaManager();
        $tableDetails = $schemaManager->listTableDetails($table);

        foreach ($tableDetails->getColumns() as $column) {
            $columns[] = new Column(
                name: $column->getName(),
                type: $column->getType()->getName(),
                isPrimary: $tableDetails->hasPrimaryKey() && in_array($column->getName(), $tableDetails->getPrimaryKey()->getColumns()),
                isAutoIncrement: $column->getAutoincrement(),
                isNullable: !$column->getNotnull(),
                isUnique: $this->isColumnUnique($tableDetails, $column->getName()),
                default: $column->getDefault(),
                length: $column->getLength(),
                enumValues: $column->getType()->getName() === 'enum' ? $column->getPlatformOptions()['enum_values'] : null
            );
        }

        return $columns;
    }

    /**
     * Check if a column is unique.
     *
     * @param \Doctrine\DBAL\Schema\Table $table
     * @param string $columnName
     * @return bool
     */
    private function isColumnUnique(\Doctrine\DBAL\Schema\Table $table, string $columnName): bool {
        foreach ($table->getIndexes() as $index) {
            if ($index->isUnique() && count($index->getColumns()) === 1 && $index->getColumns()[0] === $columnName) {
                return true;
            }
        }
        return false;
    }

    /**
     * @inheritDoc
     */
    protected function getTypeMap(): array {
        return [
            'bigint' => 'integer',
            'int' => 'integer',
            'integer' => 'integer',
            'mediumint' => 'integer',
            'smallint' => 'integer',
            'tinyint' => 'integer',
            'decimal' => 'float',
            'double' => 'float',
            'float' => 'float',
            'char' => 'string',
            'varchar' => 'string',
            'text' => 'string',
            'mediumtext' => 'string',
            'longtext' => 'string',
            'tinytext' => 'string',
            'enum' => 'string',
            'set' => 'string',
            'date' => 'date',
            'datetime' => 'datetime',
            'timestamp' => 'timestamp',
            'time' => 'time',
            'year' => 'integer',
            'boolean' => 'boolean',
            'bool' => 'boolean',
            'bit' => 'boolean',
            'binary' => 'binary',
            'varbinary' => 'binary',
            'blob' => 'binary',
            'mediumblob' => 'binary',
            'longblob' => 'binary',
            'tinyblob' => 'binary',
            'json' => 'json',
        ];
    }

    /**
     * Get the cast type for a column type.
     *
     * @param string $type
     * @return string
     */
    protected function getCastType(string $type): string {
        return match ($type) {
            'tinyint(1)' => 'boolean',
            'json' => 'array',
            'timestamp' => 'datetime',
            default => parent::getCastType($type),
        };
    }

    /**
     * Maps MySQL column types to PHP types.
     *
     * @param string $type
     * @return string
     */
    protected function mapColumnType(string $type): string {
        return match ($type) {
            'bigint', 'int', 'integer', 'tinyint', 'smallint', 'mediumint' => 'integer',
            'varchar', 'char', 'text', 'tinytext', 'mediumtext', 'longtext' => 'string',
            'datetime', 'timestamp', 'date', 'time' => 'datetime',
            'decimal', 'float', 'double' => 'float',
            'json' => 'json',
            'boolean', 'bool' => 'boolean',
            'blob', 'binary', 'varbinary' => 'binary',
            default => 'string'
        };
    }
}
