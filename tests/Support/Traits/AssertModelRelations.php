<?php

namespace SAC\EloquentModelGenerator\Tests\Support\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;
use ReflectionClass;
use ReflectionMethod;

trait AssertModelRelations
{
    /**
     * Assert that a model has the expected relationships.
     */
    protected function assertModelHasRelations(string $modelClass, array $expectedRelations): void
    {
        $model = new $modelClass;
        $relations = $this->getModelRelations($model);

        foreach ($expectedRelations as $name => $type) {
            $this->assertTrue(
                isset($relations[$name]),
                "Relationship '{$name}' not found in model {$modelClass}"
            );

            $this->assertInstanceOf(
                $type,
                $relations[$name],
                "Relationship '{$name}' is not of type {$type}"
            );
        }
    }

    /**
     * Assert that a model has a specific relationship.
     */
    protected function assertModelHasRelation(
        string $modelClass,
        string $relationName,
        string $relationType,
        array $config = []
    ): void {
        $model = new $modelClass;
        $relation = $this->getRelation($model, $relationName);

        $this->assertInstanceOf(
            $relationType,
            $relation,
            "Relationship '{$relationName}' is not of type {$relationType}"
        );

        foreach ($config as $key => $value) {
            $this->assertEquals(
                $value,
                $relation->$key,
                "Relationship '{$relationName}' has incorrect {$key}"
            );
        }
    }

    /**
     * Assert that a model has a belongs to relationship.
     */
    protected function assertModelBelongsTo(
        string $modelClass,
        string $relationName,
        string $relatedModel,
        ?string $foreignKey = null,
        ?string $ownerKey = null
    ): void {
        $this->assertModelHasRelation($modelClass, $relationName, BelongsTo::class, [
            'foreignKey' => $foreignKey ?? Str::snake($relationName).'_id',
            'ownerKey' => $ownerKey ?? 'id',
            'related' => new $relatedModel,
        ]);
    }

    /**
     * Assert that a model has a has one relationship.
     */
    protected function assertModelHasOne(
        string $modelClass,
        string $relationName,
        string $relatedModel,
        ?string $foreignKey = null,
        ?string $localKey = null
    ): void {
        $this->assertModelHasRelation($modelClass, $relationName, HasOne::class, [
            'foreignKey' => $foreignKey ?? Str::snake(class_basename($modelClass)).'_id',
            'localKey' => $localKey ?? 'id',
            'related' => new $relatedModel,
        ]);
    }

    /**
     * Assert that a model has a has many relationship.
     */
    protected function assertModelHasMany(
        string $modelClass,
        string $relationName,
        string $relatedModel,
        ?string $foreignKey = null,
        ?string $localKey = null
    ): void {
        $this->assertModelHasRelation($modelClass, $relationName, HasMany::class, [
            'foreignKey' => $foreignKey ?? Str::snake(class_basename($modelClass)).'_id',
            'localKey' => $localKey ?? 'id',
            'related' => new $relatedModel,
        ]);
    }

    /**
     * Assert that a model has a belongs to many relationship.
     */
    protected function assertModelBelongsToMany(
        string $modelClass,
        string $relationName,
        string $relatedModel,
        ?string $table = null,
        ?string $foreignPivotKey = null,
        ?string $relatedPivotKey = null
    ): void {
        $this->assertModelHasRelation($modelClass, $relationName, BelongsToMany::class, [
            'table' => $table ?? $this->getDefaultPivotTableName($modelClass, $relatedModel),
            'foreignPivotKey' => $foreignPivotKey ?? Str::snake(class_basename($modelClass)).'_id',
            'relatedPivotKey' => $relatedPivotKey ?? Str::snake(class_basename($relatedModel)).'_id',
            'related' => new $relatedModel,
        ]);
    }

    /**
     * Get all relations from a model.
     */
    private function getModelRelations(Model $model): array
    {
        $class = new ReflectionClass($model);
        $relations = [];

        foreach ($class->getMethods(ReflectionMethod::IS_PUBLIC) as $method) {
            if ($method->getNumberOfParameters() === 0) {
                try {
                    $return = $method->invoke($model);
                    if (is_object($return) && $this->isRelation($return)) {
                        $relations[$method->getName()] = $return;
                    }
                } catch (\Throwable $e) {
                    // Skip methods that throw exceptions
                }
            }
        }

        return $relations;
    }

    /**
     * Get a specific relation from a model.
     *
     * @return mixed
     */
    private function getRelation(Model $model, string $relationName)
    {
        return $model->$relationName();
    }

    /**
     * Check if an object is a relation.
     *
     * @param  mixed  $object
     */
    private function isRelation($object): bool
    {
        return method_exists($object, 'getQuery');
    }

    /**
     * Get the default pivot table name for a many-to-many relationship.
     */
    private function getDefaultPivotTableName(string $modelClass, string $relatedModel): string
    {
        $models = [
            Str::snake(class_basename($modelClass)),
            Str::snake(class_basename($relatedModel)),
        ];
        sort($models);

        return implode('_', $models);
    }
}
