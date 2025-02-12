<?php

namespace SAC\EloquentModelGenerator\Services\Schema;

use Illuminate\Database\ConnectionInterface;
use SAC\EloquentModelGenerator\Exceptions\ModelGeneratorSchemaAnalyzerException;
use Illuminate\Database\Connection;

class PostgreSQLSchemaAnalyzer extends BaseSchemaAnalyzer {
    /**
     * @inheritDoc
     */
    public function analyze(string $table): array {
        if (!$this->tableExists($table)) {
            throw new ModelGeneratorSchemaAnalyzerException("Table '{$table}' does not exist");
        }

        try {
            $columns = $this->analyzeColumns($table);
            $relationships = $this->analyzeRelationships($table);

            return [
                'columns' => $columns,
                'relationships' => $relationships,
            ];
        } catch (\Exception $e) {
            throw new ModelGeneratorSchemaAnalyzerException(
                "Failed to analyze table '{$table}': {$e->getMessage()}",
                0,
                $e
            );
        }
    }

    /**
     * Analyze table columns.
     *
     * @param string $table
     * @return array<string, array{type: string, nullable: bool, primary?: bool, unique?: bool, index?: bool, foreign?: array{table: string, column: string}, default?: mixed}>
     * @throws \Exception
     */
    protected function analyzeColumns(string $table): array {
        $columns = [];
        $tableDetails = $this->getSchemaManager()->listTableDetails($table);

        foreach ($tableDetails->getColumns() as $column) {
            $columns[$column->getName()] = [
                'type' => $this->mapColumnType($column->getType()->getName()),
                'nullable' => !$column->getNotnull(),
                'default' => $column->getDefault(),
            ];

            // Add primary key flag
            if ($tableDetails->getPrimaryKey() && in_array($column->getName(), $tableDetails->getPrimaryKey()->getColumns())) {
                $columns[$column->getName()]['primary'] = true;
            }

            // Add unique flag
            foreach ($tableDetails->getIndexes() as $index) {
                if ($index->isUnique() && in_array($column->getName(), $index->getColumns())) {
                    $columns[$column->getName()]['unique'] = true;
                }
            }

            // Handle PostgreSQL-specific array types
            if (str_ends_with($column->getType()->getName(), '[]')) {
                $columns[$column->getName()]['type'] = 'array';
            }
        }

        return $columns;
    }

    /**
     * Analyze table relationships.
     *
     * @param string $table
     * @return array<array{type: string, foreignTable: string, foreignKey: string, localKey: string}>
     * @throws \Exception
     */
    protected function analyzeRelationships(string $table): array {
        $relationships = [];
        $foreignKeys = $this->getSchemaManager()->listTableForeignKeys($table);

        foreach ($foreignKeys as $foreignKey) {
            $relationships[] = $this->getRelationshipDefinition([
                'foreign_table' => $foreignKey->getForeignTableName(),
                'foreign_column' => $foreignKey->getForeignColumns()[0],
                'local_column' => $foreignKey->getLocalColumns()[0],
            ]);
        }

        return $relationships;
    }

    /**
     * @inheritDoc
     */
    protected function getTypeMap(): array {
        return [
            'bigint' => 'integer',
            'int' => 'integer',
            'integer' => 'integer',
            'smallint' => 'integer',
            'serial' => 'integer',
            'bigserial' => 'integer',
            'smallserial' => 'integer',
            'decimal' => 'float',
            'numeric' => 'float',
            'real' => 'float',
            'double precision' => 'float',
            'money' => 'float',
            'char' => 'string',
            'character' => 'string',
            'varchar' => 'string',
            'character varying' => 'string',
            'text' => 'string',
            'uuid' => 'string',
            'json' => 'json',
            'jsonb' => 'json',
            'date' => 'date',
            'timestamp' => 'timestamp',
            'timestamp without time zone' => 'timestamp',
            'timestamp with time zone' => 'timestamp',
            'time' => 'time',
            'time without time zone' => 'time',
            'time with time zone' => 'time',
            'interval' => 'string',
            'boolean' => 'boolean',
            'bool' => 'boolean',
            'bytea' => 'binary',
            'cidr' => 'string',
            'inet' => 'string',
            'macaddr' => 'string',
            'point' => 'string',
            'line' => 'string',
            'lseg' => 'string',
            'box' => 'string',
            'path' => 'string',
            'polygon' => 'string',
            'circle' => 'string',
            'bit' => 'string',
            'bit varying' => 'string',
            'xml' => 'string',
        ];
    }

    /**
     * @inheritDoc
     */
    protected function determineRelationshipType(array $foreignKey): string {
        // Check for many-to-many relationships in PostgreSQL
        $tableName = $this->getTablePrefix() . $foreignKey['foreign_table'];
        $foreignKeys = $this->getSchemaManager()->listTableForeignKeys($tableName);

        // If the foreign table has exactly two foreign keys, it might be a pivot table
        if (count($foreignKeys) === 2) {
            return 'belongsToMany';
        }

        return parent::determineRelationshipType($foreignKey);
    }

    /**
     * Get the cast type for a column type.
     *
     * @param string $type
     * @return string
     */
    protected function getCastType(string $type): string {
        return match ($type) {
            'jsonb' => 'array',
            'timestamptz' => 'datetime',
            'uuid' => 'string',
            default => parent::getCastType($type),
        };
    }
}
