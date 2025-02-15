<?php

namespace SAC\EloquentModelGenerator\Support\Traits;

use Illuminate\Database\Eloquent\Relations\Relation;
use ReflectionClass;
use ReflectionMethod;
use Throwable;

/**
 * @phpstan-type RelationshipDefinition array{
 *     type: class-string|null,
 *     model: class-string|null
 * }
 */
trait HasRelationships
{
    /**
     * Get all relationships defined in the model.
     *
     * @return array<string, RelationshipDefinition>
     */
    public function getRelationships(): array
    {
        $relationships = [];
        $methods = (new ReflectionClass($this))->getMethods(ReflectionMethod::IS_PUBLIC);

        foreach ($methods as $method) {
            if ($this->isRelationshipMethod($method)) {
                $name = $method->getName();
                /** @var RelationshipDefinition */
                $relationship = [
                    'type' => $this->getRelationshipType($name),
                    'model' => $this->getRelatedModel($name),
                ];
                $relationships[$name] = $relationship;
            }
        }

        return $relationships;
    }

    /**
     * Get all relationship methods defined in the model.
     *
     * @return array<int, string>
     */
    public function getRelationshipMethods(): array
    {
        return array_keys($this->getRelationships());
    }

    /**
     * Get the type of a relationship.
     *
     * @return class-string|null
     */
    public function getRelationshipType(string $method): ?string
    {
        if (! method_exists($this, $method)) {
            return null;
        }

        $relation = $this->$method();
        if (! ($relation instanceof Relation)) {
            return null;
        }

        return $relation::class;
    }

    /**
     * Get the related model class for a relationship.
     *
     * @return class-string|null
     */
    public function getRelatedModel(string $method): ?string
    {
        if (! method_exists($this, $method)) {
            return null;
        }

        $relation = $this->$method();
        if (! ($relation instanceof Relation)) {
            return null;
        }

        return $relation->getRelated()::class;
    }

    /**
     * Determine if a method defines a relationship.
     */
    protected function isRelationshipMethod(ReflectionMethod $method): bool
    {
        // Skip methods that are not defined in the model
        if ($method->class !== $this::class) {
            return false;
        }

        // Skip methods with parameters
        if ($method->getNumberOfParameters() > 0) {
            return false;
        }

        // Try to call the method and check if it returns a relationship
        try {
            $relation = $this->{$method->getName()}();

            return $relation instanceof Relation;
        } catch (Throwable) {
            return false;
        }
    }
}
