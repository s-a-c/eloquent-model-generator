<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Services\Relations;

use Illuminate\Support\Str;
use SAC\EloquentModelGenerator\Contracts\RelationDetector;
use SAC\EloquentModelGenerator\ValueObjects\Column;
use SAC\EloquentModelGenerator\ValueObjects\ForeignKey;

class RelationDetectorService implements RelationDetector {
    /**
     * @inheritDoc
     */
    public function detectRelations(string $table, array $columns, array $foreignKeys = []): array {
        $relations = [];

        // Detect belongsTo relations from foreign keys in columns
        foreach ($columns as $column) {
            if ($foreignKey = $column->getForeignKey()) {
                $relations[] = $this->createBelongsToRelation(
                    $foreignKey,
                    $column->getName()
                );
            }
        }

        // Detect hasOne/hasMany relations from foreign keys referencing this table
        foreach ($foreignKeys as $foreignKey) {
            if ($this->isOneToOneRelation($foreignKey->getForeignTable())) {
                $relations[] = $this->createHasOneRelation($foreignKey);
            } else {
                $relations[] = $this->createHasManyRelation($foreignKey);
            }
        }

        // Detect morphTo relations
        foreach ($columns as $column) {
            if ($this->isMorphColumn($column->getName())) {
                $morphName = $this->getMorphName($column->getName());
                $relations[] = $this->createMorphToRelation($morphName);
            }
        }

        // Detect belongsToMany relations
        $pivotForeignKeys = $this->groupPivotForeignKeys($foreignKeys);
        foreach ($pivotForeignKeys as $pivotTable => $keys) {
            if (count($keys) === 2) {
                $relations[] = $this->createBelongsToManyRelation($table, $pivotTable, $keys);
            }
        }

        return $relations;
    }

    /**
     * @inheritDoc
     */
    public function detectMorphRelations(string $table, array $columns, array $morphColumns): array {
        $relations = [];

        foreach ($morphColumns as $column) {
            if ($this->isMorphColumn($column->getName())) {
                $morphName = $this->getMorphName($column->getName());
                $modelName = $this->getModelName($table);

                if ($this->isOneToOneRelation($table)) {
                    $relations[] = [
                        'type' => 'morphOne',
                        'name' => Str::singular($table),
                        'model' => $modelName,
                        'morphName' => $morphName,
                    ];
                } else {
                    $relations[] = [
                        'type' => 'morphMany',
                        'name' => Str::plural($table),
                        'model' => $modelName,
                        'morphName' => $morphName,
                    ];
                }
            }
        }

        return $relations;
    }

    /**
     * @inheritDoc
     */
    public function detectMorphToManyRelations(string $table, array $columns, array $morphPivotColumns): array {
        $relations = [];

        foreach ($morphPivotColumns as $column) {
            if ($this->isMorphColumn($column->getName())) {
                $morphName = $this->getMorphName($column->getName());
                $pivotTable = Str::plural($morphName);
                $modelName = $this->getModelName(Str::singular($morphName));

                $relations[] = [
                    'type' => 'morphToMany',
                    'name' => Str::plural($morphName),
                    'model' => $modelName,
                    'table' => $pivotTable,
                    'morphName' => $morphName,
                ];
            }
        }

        return $relations;
    }

    private function createBelongsToRelation(ForeignKey $foreignKey, string $columnName): array {
        return [
            'type' => 'belongsTo',
            'name' => Str::camel(str_replace('_id', '', $columnName)),
            'model' => $this->getModelName($foreignKey->getForeignTable()),
            'foreignKey' => $columnName,
            'localKey' => $foreignKey->getForeignColumn(),
        ];
    }

    private function createHasOneRelation(ForeignKey $foreignKey): array {
        return [
            'type' => 'hasOne',
            'name' => Str::camel(Str::singular($foreignKey->getForeignTable())),
            'model' => $this->getModelName($foreignKey->getForeignTable()),
            'foreignKey' => $foreignKey->getColumn(),
            'localKey' => $foreignKey->getForeignColumn(),
        ];
    }

    private function createHasManyRelation(ForeignKey $foreignKey): array {
        return [
            'type' => 'hasMany',
            'name' => Str::camel(Str::plural($foreignKey->getForeignTable())),
            'model' => $this->getModelName($foreignKey->getForeignTable()),
            'foreignKey' => $foreignKey->getColumn(),
            'localKey' => $foreignKey->getForeignColumn(),
        ];
    }

    private function createMorphToRelation(string $morphName): array {
        return [
            'type' => 'morphTo',
            'name' => $morphName,
            'morphType' => "{$morphName}_type",
            'morphId' => "{$morphName}_id",
        ];
    }

    private function createBelongsToManyRelation(string $table, string $pivotTable, array $foreignKeys): array {
        $pivotForeignKey = $this->findPivotForeignKey($foreignKeys, $table);
        $relatedForeignKey = $this->findRelatedForeignKey($foreignKeys, $table);

        return [
            'type' => 'belongsToMany',
            'name' => Str::camel(Str::plural(str_replace('_id', '', $relatedForeignKey->getColumn()))),
            'model' => $this->getModelName(str_replace('_id', '', $relatedForeignKey->getColumn())),
            'table' => $pivotTable,
            'foreignPivotKey' => $pivotForeignKey->getColumn(),
            'relatedPivotKey' => $relatedForeignKey->getColumn(),
            'parentKey' => $pivotForeignKey->getForeignColumn(),
            'relatedKey' => $relatedForeignKey->getForeignColumn(),
        ];
    }

    private function isOneToOneRelation(string $table): bool {
        return Str::singular($table) === $table;
    }

    private function isMorphColumn(string $column): bool {
        return Str::endsWith($column, ['_type', '_id']) && !Str::endsWith($column, '_id_type');
    }

    private function getMorphName(string $column): string {
        return Str::beforeLast($column, '_type');
    }

    private function getModelName(string $table): string {
        return Str::studly(Str::singular($table));
    }

    /**
     * @param ForeignKey[] $foreignKeys
     * @return array<string, ForeignKey[]>
     */
    private function groupPivotForeignKeys(array $foreignKeys): array {
        $grouped = [];
        foreach ($foreignKeys as $foreignKey) {
            $grouped[$foreignKey->getForeignTable()][] = $foreignKey;
        }
        return $grouped;
    }

    /**
     * @param ForeignKey[] $foreignKeys
     */
    private function findPivotForeignKey(array $foreignKeys, string $table): ForeignKey {
        foreach ($foreignKeys as $foreignKey) {
            if (Str::contains($foreignKey->getColumn(), Str::singular($table))) {
                return $foreignKey;
            }
        }
        return $foreignKeys[0];
    }

    /**
     * @param ForeignKey[] $foreignKeys
     */
    private function findRelatedForeignKey(array $foreignKeys, string $table): ForeignKey {
        foreach ($foreignKeys as $foreignKey) {
            if (!Str::contains($foreignKey->getColumn(), Str::singular($table))) {
                return $foreignKey;
            }
        }
        return $foreignKeys[1];
    }
}