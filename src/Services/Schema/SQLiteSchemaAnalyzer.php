<?php

namespace SAC\EloquentModelGenerator\Services\Schema;

use Illuminate\Database\ConnectionInterface;
use Illuminate\Support\Str;
use SAC\EloquentModelGenerator\Exceptions\ModelGeneratorSchemaAnalyzerException;
use Doctrine\DBAL\Schema\ForeignKeyConstraint;
use Doctrine\DBAL\Schema\Table;

class SQLiteSchemaAnalyzer extends BaseSchemaAnalyzer {
    /**
     * Create a new SQLite schema analyzer instance.
     */
    public function __construct(ConnectionInterface $connection) {
        parent::__construct($connection);
    }

    /**
     * Get all available tables.
     *
     * @return array<string>
     */
    public function getTables(): array {
        try {
            return $this->connection->getDoctrineSchemaManager()->listTableNames();
        } catch (\Exception $e) {
            return [];
        }
    }

    /**
     * Analyze a table's schema.
     *
     * @param string $table
     * @return array<string, mixed>
     * @throws ModelGeneratorSchemaAnalyzerException
     */
    public function analyze(string $table): array {
        if (!$this->hasTable($table)) {
            throw new ModelGeneratorSchemaAnalyzerException("Table '{$table}' does not exist");
        }

        try {
            $schema = $this->getSchemaManager();
            $tableDetails = $schema->listTableDetails($table);
            $foreignKeys = $schema->listTableForeignKeys($table);

            $columns = $this->analyzeColumns($tableDetails);
            $relationships = $this->analyzeRelationships($table, $foreignKeys);

            return [
                'columns' => $columns,
                'relationships' => $relationships,
            ];
        } catch (\Exception $e) {
            throw new ModelGeneratorSchemaAnalyzerException(
                "Failed to analyze table '{$table}': " . $e->getMessage(),
                0,
                $e
            );
        }
    }

    /**
     * Check if a table exists.
     *
     * @param string $table
     * @return bool
     */
    public function hasTable(string $table): bool {
        try {
            return $this->connection->getDoctrineSchemaManager()->tablesExist([$table]);
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Maps SQLite column types to PHP types.
     *
     * @param string $type
     * @return string
     */
    protected function mapColumnType(string $type): string {
        return match ($type) {
            'integer', 'int', 'bigint', 'smallint', 'tinyint' => 'integer',
            'text', 'varchar', 'char', 'string' => 'string',
            'real', 'float', 'double', 'numeric', 'decimal' => 'float',
            'boolean', 'bool' => 'boolean',
            'datetime', 'timestamp', 'date', 'time' => 'datetime',
            'blob', 'binary' => 'binary',
            'json' => 'json',
            default => 'string'
        };
    }

    /**
     * @inheritDoc
     */
    protected function getTypeMap(): array {
        return [
            'integer' => 'integer',
            'int' => 'integer',
            'bigint' => 'integer',
            'smallint' => 'integer',
            'tinyint' => 'integer',
            'text' => 'string',
            'varchar' => 'string',
            'char' => 'string',
            'string' => 'string',
            'real' => 'float',
            'float' => 'float',
            'double' => 'float',
            'numeric' => 'float',
            'decimal' => 'float',
            'boolean' => 'boolean',
            'bool' => 'boolean',
            'datetime' => 'datetime',
            'timestamp' => 'datetime',
            'date' => 'datetime',
            'time' => 'datetime',
            'blob' => 'binary',
            'binary' => 'binary',
            'json' => 'json',
        ];
    }

    /**
     * @param Table $table
     * @return array<string, array<string, mixed>>
     */
    protected function analyzeColumns(Table $table): array {
        $columns = [];
        $primaryKey = $table->getPrimaryKey();
        $indexes = $table->getIndexes();

        foreach ($table->getColumns() as $column) {
            $name = $column->getName();
            $columns[$name] = [
                'type' => $this->mapColumnType($column->getType()->getName()),
                'nullable' => !$column->getNotnull(),
                'default' => $column->getDefault(),
                'primary' => $primaryKey && in_array($name, $primaryKey->getColumns()),
                'unique' => false,
                'autoIncrement' => $column->getAutoincrement(),
            ];

            // Check for unique indexes
            foreach ($indexes as $index) {
                if ($index->isUnique() && count($index->getColumns()) === 1 && $index->getColumns()[0] === $name) {
                    $columns[$name]['unique'] = true;
                    break;
                }
            }
        }

        return $columns;
    }

    /**
     * @param string $table
     * @param array<ForeignKeyConstraint> $foreignKeys
     * @return array<array<string, mixed>>
     */
    protected function analyzeRelationships(string $table, array $foreignKeys): array {
        $relationships = [];

        foreach ($foreignKeys as $foreignKey) {
            $relationships[] = [
                'type' => 'belongsTo',
                'foreignTable' => $foreignKey->getForeignTableName(),
                'foreignColumns' => $foreignKey->getForeignColumns(),
                'localColumns' => $foreignKey->getLocalColumns(),
            ];
        }

        return $relationships;
    }
}
