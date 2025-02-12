<?php

namespace SAC\EloquentModelGenerator\Tests\Support\Traits;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

trait AssertForeignKeys {
    /**
     * Assert that a foreign key exists between tables.
     *
     * @param string $fromTable
     * @param string $fromColumn
     * @param string $toTable
     * @param string $toColumn
     * @param string|null $onDelete
     * @param string|null $onUpdate
     */
    protected function assertHasForeignKey(
        string $fromTable,
        string $fromColumn,
        string $toTable,
        string $toColumn = 'id',
        ?string $onDelete = null,
        ?string $onUpdate = null
    ): void {
        $foreignKeys = $this->getForeignKeys($fromTable);
        $found = false;

        foreach ($foreignKeys as $foreignKey) {
            if (
                $foreignKey['from_column'] === $fromColumn &&
                $foreignKey['to_table'] === $toTable &&
                $foreignKey['to_column'] === $toColumn
            ) {
                $found = true;
                if ($onDelete !== null) {
                    $this->assertEquals(
                        strtoupper($onDelete),
                        strtoupper($foreignKey['on_delete']),
                        "Foreign key on_delete action does not match"
                    );
                }
                if ($onUpdate !== null) {
                    $this->assertEquals(
                        strtoupper($onUpdate),
                        strtoupper($foreignKey['on_update']),
                        "Foreign key on_update action does not match"
                    );
                }
                break;
            }
        }

        $this->assertTrue(
            $found,
            "Foreign key from {$fromTable}.{$fromColumn} to {$toTable}.{$toColumn} not found"
        );
    }

    /**
     * Assert that a foreign key does not exist between tables.
     *
     * @param string $fromTable
     * @param string $fromColumn
     * @param string $toTable
     * @param string $toColumn
     */
    protected function assertDoesNotHaveForeignKey(
        string $fromTable,
        string $fromColumn,
        string $toTable,
        string $toColumn = 'id'
    ): void {
        $foreignKeys = $this->getForeignKeys($fromTable);
        $found = false;

        foreach ($foreignKeys as $foreignKey) {
            if (
                $foreignKey['from_column'] === $fromColumn &&
                $foreignKey['to_table'] === $toTable &&
                $foreignKey['to_column'] === $toColumn
            ) {
                $found = true;
                break;
            }
        }

        $this->assertFalse(
            $found,
            "Unexpected foreign key found from {$fromTable}.{$fromColumn} to {$toTable}.{$toColumn}"
        );
    }

    /**
     * Assert that a table has the expected number of foreign keys.
     *
     * @param string $table
     * @param int $count
     */
    protected function assertForeignKeyCount(string $table, int $count): void {
        $foreignKeys = $this->getForeignKeys($table);
        $this->assertCount(
            $count,
            $foreignKeys,
            "Table {$table} does not have {$count} foreign keys"
        );
    }

    /**
     * Get all foreign keys for a table.
     *
     * @param string $table
     * @return array
     */
    private function getForeignKeys(string $table): array {
        $connection = DB::connection();
        $databaseName = $connection->getDatabaseName();

        if ($connection->getDriverName() === 'sqlite') {
            return $this->getSQLiteForeignKeys($table);
        }

        return DB::select("
            SELECT
                COLUMN_NAME as from_column,
                REFERENCED_TABLE_NAME as to_table,
                REFERENCED_COLUMN_NAME as to_column,
                DELETE_RULE as on_delete,
                UPDATE_RULE as on_update
            FROM information_schema.KEY_COLUMN_USAGE
            WHERE TABLE_SCHEMA = ? AND TABLE_NAME = ? AND REFERENCED_TABLE_NAME IS NOT NULL
        ", [$databaseName, $table]);
    }

    /**
     * Get foreign keys for SQLite database.
     *
     * @param string $table
     * @return array
     */
    private function getSQLiteForeignKeys(string $table): array {
        $foreignKeys = [];
        $tableInfo = DB::select("PRAGMA foreign_key_list({$table})");

        foreach ($tableInfo as $constraint) {
            $foreignKeys[] = [
                'from_column' => $constraint->from,
                'to_table' => $constraint->table,
                'to_column' => $constraint->to,
                'on_delete' => $constraint->on_delete,
                'on_update' => $constraint->on_update
            ];
        }

        return $foreignKeys;
    }

    /**
     * Assert that a column references another table.
     *
     * @param string $fromTable
     * @param string $fromColumn
     * @param string $toTable
     * @param string $toColumn
     */
    protected function assertColumnReferences(
        string $fromTable,
        string $fromColumn,
        string $toTable,
        string $toColumn = 'id'
    ): void {
        $this->assertTrue(
            Schema::hasColumn($fromTable, $fromColumn),
            "Column {$fromColumn} not found in table {$fromTable}"
        );

        $this->assertTrue(
            Schema::hasColumn($toTable, $toColumn),
            "Column {$toColumn} not found in table {$toTable}"
        );

        $this->assertHasForeignKey($fromTable, $fromColumn, $toTable, $toColumn);
    }

    /**
     * Assert that a pivot table has the correct foreign keys.
     *
     * @param string $pivotTable
     * @param string $firstTable
     * @param string $secondTable
     * @param string|null $firstKey
     * @param string|null $secondKey
     */
    protected function assertPivotTableForeignKeys(
        string $pivotTable,
        string $firstTable,
        string $secondTable,
        ?string $firstKey = null,
        ?string $secondKey = null
    ): void {
        $firstKey = $firstKey ?? $firstTable . '_id';
        $secondKey = $secondKey ?? $secondTable . '_id';

        $this->assertColumnReferences($pivotTable, $firstKey, $firstTable);
        $this->assertColumnReferences($pivotTable, $secondKey, $secondTable);
    }
}
