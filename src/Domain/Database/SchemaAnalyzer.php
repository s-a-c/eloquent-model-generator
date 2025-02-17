<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Domain\Database;

use Illuminate\Database\Connection;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Schema;
use SAC\EloquentModelGenerator\Domain\Relationship\Relationship;

/**
 * Service for analyzing database schema and extracting metadata using Laravel's Schema
 */
final class SchemaAnalyzer
{
    /**
     * Analyze the database schema and return a complete definition
     */
    public function analyze(Connection $connection): SchemaDefinition
    {
        $tables = $this->extractTableDefinitions($connection);
        $relationships = $this->detectRelationships($tables);

        return SchemaDefinition::create($tables, $relationships);
    }

    /**
     * Extract table definitions from the database
     *
     * @return Collection<TableDefinition>
     */
    private function extractTableDefinitions(Connection $connection): Collection
    {
        return collect(Schema::getAllTables())
            ->map(fn (array $table) => $this->extractTableDefinition($connection, $table['name']));
    }

    /**
     * Extract a single table definition
     */
    private function extractTableDefinition(Connection $connection, string $tableName): TableDefinition
    {
        $columns = $this->extractColumns($connection, $tableName);
        $indexes = $this->extractIndexes($connection, $tableName);

        return TableDefinition::create($tableName, $columns, $indexes);
    }

    /**
     * Extract column definitions for a table
     *
     * @return Collection<Column>
     */
    private function extractColumns(Connection $connection, string $tableName): Collection
    {
        return collect(Schema::getColumnListing($tableName))
            ->map(function (string $columnName) use ($connection, $tableName) {
                $column = Schema::getConnection()
                    ->getDoctrineColumn($tableName, $columnName);

                return Column::create(
                    name: $columnName,
                    type: $column->getType()->getName(),
                    nullable: !$column->getNotnull(),
                    default: $column->getDefault(),
                    isPrimaryKey: $this->isColumnPrimaryKey($connection, $tableName, $columnName),
                    isAutoIncrement: $column->getAutoincrement(),
                    attributes: $this->extractColumnAttributes($connection, $tableName, $columnName)
                );
            });
    }

    /**
     * Extract index definitions for a table
     *
     * @return Collection<Index>
     */
    private function extractIndexes(Connection $connection, string $tableName): Collection
    {
        return collect(Schema::getIndexes($tableName))
            ->map(fn (array $index) => Index::create(
                name: $index['name'],
                columns: collect($index['columns']),
                isUnique: $index['unique'] ?? false,
                type: $index['type'] ?? 'BTREE'
            ));
    }

    /**
     * Extract additional attributes for a column
     *
     * @return array<string, mixed>
     */
    private function extractColumnAttributes(Connection $connection, string $tableName, string $columnName): array
    {
        $attributes = [];
        $foreignKeys = Schema::getForeignKeys($tableName);

        foreach ($foreignKeys as $foreignKey) {
            if ($foreignKey['columns'][0] === $columnName) {
                $attributes['foreign_key'] = true;
                $attributes['foreign_table'] = $foreignKey['foreign_table'];
                $attributes['foreign_column'] = $foreignKey['foreign_columns'][0];
                break;
            }
        }

        return $attributes;
    }

    /**
     * Check if a column is part of the primary key
     */
    private function isColumnPrimaryKey(Connection $connection, string $tableName, string $columnName): bool
    {
        $indexes = Schema::getIndexes($tableName);
        foreach ($indexes as $index) {
            if (isset($index['primary']) && $index['primary']) {
                return in_array($columnName, $index['columns'], true);
            }
        }
        return false;
    }

    /**
     * Detect relationships between tables based on foreign keys
     *
     * @param Collection<TableDefinition> $tables
     * @return Collection<Relationship>
     */
    private function detectRelationships(Collection $tables): Collection
    {
        $relationships = collect();

        $tables->each(function (TableDefinition $table) use ($relationships, $tables) {
            // Detect belongsTo relationships from foreign keys
            $table->foreignKeys()->each(function (Column $column) use ($relationships, $table) {
                $relationships->push(
                    Relationship::belongsTo(
                        $table->name(),
                        $column->getForeignTable(),
                        $column->name(),
                        'id'
                    )
                );
            });

            // Detect hasMany relationships (inverse of belongsTo)
            $tables->each(function (TableDefinition $otherTable) use ($relationships, $table) {
                $otherTable->foreignKeys()->each(function (Column $column) use ($relationships, $table, $otherTable) {
                    if ($column->getForeignTable() === $table->name()) {
                        $relationships->push(
                            Relationship::hasMany(
                                $table->name(),
                                $otherTable->name(),
                                $column->name(),
                                'id'
                            )
                        );
                    }
                });
            });

            // Detect many-to-many relationships
            $this->detectManyToManyRelationships($table, $tables, $relationships);
        });

        return $relationships;
    }

    /**
     * Detect many-to-many relationships for a table
     *
     * @param TableDefinition $table
     * @param Collection<TableDefinition> $tables
     * @param Collection<Relationship> $relationships
     */
    private function detectManyToManyRelationships(
        TableDefinition $table,
        Collection $tables,
        Collection $relationships
    ): void {
        $tables->each(function (TableDefinition $pivotCandidate) use ($table, $tables, $relationships) {
            // Check if this could be a pivot table
            if ($this->isPivotTable($pivotCandidate)) {
                $foreignKeys = $pivotCandidate->foreignKeys();

                // Get the two tables this pivot connects
                $firstKey = $foreignKeys->first();
                $secondKey = $foreignKeys->last();

                if ($firstKey && $secondKey &&
                    ($firstKey->getForeignTable() === $table->name() ||
                     $secondKey->getForeignTable() === $table->name())) {

                    $otherTableName = $firstKey->getForeignTable() === $table->name()
                        ? $secondKey->getForeignTable()
                        : $firstKey->getForeignTable();

                    $relationships->push(
                        Relationship::belongsToMany(
                            $table->name(),
                            $otherTableName,
                            $pivotCandidate->name(),
                            $firstKey->name(),
                            $secondKey->name()
                        )
                    );
                }
            }
        });
    }

    /**
     * Check if a table appears to be a pivot table
     */
    private function isPivotTable(TableDefinition $table): bool
    {
        $foreignKeys = $table->foreignKeys();

        return $foreignKeys->count() === 2 && // Has exactly two foreign keys
               $table->columns()->count() <= 4 && // Has few columns (allowing for timestamps)
               $table->primaryKey()->count() === 2; // Composite primary key
    }
}
