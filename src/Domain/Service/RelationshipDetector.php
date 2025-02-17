<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Domain\Service;

use Illuminate\Support\Str;
use SAC\EloquentModelGenerator\Model\ModelDefinition;

final class RelationshipDetector
{
    public function detectRelationships(ModelDefinition $model): array
    {
        $relationships = [];
        $foreignKeys = $this->getForeignKeys($model);

        foreach ($foreignKeys as $name => $foreignKey) {
            $relationships[$name] = $this->createRelationship($foreignKey);
        }

        return $relationships;
    }

    private function getForeignKeys(ModelDefinition $model): array
    {
        $foreignKeys = [];
        $columns = $model->getColumns();

        foreach ($columns as $name => $column) {
            if (str_ends_with($name, '_id')) {
                $tableName = substr($name, 0, -3);
                $foreignKeys[$tableName] = [
                    'table' => Str::plural($tableName),
                    'columns' => [$name => 'id']
                ];
            }
        }

        return $foreignKeys;
    }

    private function createRelationship(array $foreignKey): array
    {
        return [
            'type' => 'belongsTo',
            'model' => Str::studly(Str::singular($foreignKey['table'])),
            'foreign_key' => array_key_first($foreignKey['columns']),
            'local_key' => array_values($foreignKey['columns'])[0]
        ];
    }

    public function detectPivotTables(ModelDefinition $model, array $tables): array
    {
        $relationships = [];
        $modelTable = $model->getTableName();

        foreach ($tables as $table) {
            if ($this->isPivotTable($table, $modelTable)) {
                $otherTable = $this->getOtherTable($table, $modelTable);
                $relationships[$otherTable] = $this->createPivotRelationship($table, $otherTable);
            }
        }

        return $relationships;
    }

    private function isPivotTable(string $table, string $modelTable): bool
    {
        $parts = explode('_', $table);
        return count($parts) === 2 &&
            (in_array($modelTable, $parts) || in_array(Str::singular($modelTable), $parts));
    }

    private function getOtherTable(string $pivotTable, string $modelTable): string
    {
        $parts = explode('_', $pivotTable);
        return $parts[0] === $modelTable || $parts[0] === Str::singular($modelTable)
            ? $parts[1]
            : $parts[0];
    }

    private function createPivotRelationship(string $pivotTable, string $otherTable): array
    {
        return [
            'type' => 'belongsToMany',
            'model' => Str::studly(Str::singular($otherTable)),
            'pivot_table' => $pivotTable,
            'foreign_key' => Str::singular($otherTable) . '_id',
            'local_key' => 'id'
        ];
    }
}
