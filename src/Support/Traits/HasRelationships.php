<?php

namespace SAC\EloquentModelGenerator\Support\Traits;

use ReflectionClass;
use ReflectionMethod;
use Illuminate\Database\Eloquent\Relations\Relation;

trait HasRelationships {
    /**
     * Get all relationships defined in the model.
     *
     * @return array<string, array>
     */
    public function getRelationships(): array {
        $relationships = [];
        $methods = (new ReflectionClass($this))->getMethods(ReflectionMethod::IS_PUBLIC);

        foreach ($methods as $method) {
            if ($this->isRelationshipMethod($method)) {
                $relationships[$method->getName()] = [
                    'type' => $this->getRelationshipType($method->getName()),
                    'model' => $this->getRelatedModel($method->getName())
                ];
            }
        }

        return $relationships;
    }

    /**
     * Get all relationship methods defined in the model.
     *
     * @return array<string>
     */
    public function getRelationshipMethods(): array {
        return array_keys($this->getRelationships());
    }

    /**
     * Get the type of a relationship.
     *
     * @param string $method
     * @return string|null
     */
    public function getRelationshipType(string $method): ?string {
        if (!method_exists($this, $method)) {
            return null;
        }

        $relation = $this->$method();
        if (!($relation instanceof Relation)) {
            return null;
        }

        return class_basename(get_class($relation));
    }

    /**
     * Get the related model class for a relationship.
     *
     * @param string $method
     * @return string|null
     */
    public function getRelatedModel(string $method): ?string {
        if (!method_exists($this, $method)) {
            return null;
        }

        $relation = $this->$method();
        if (!($relation instanceof Relation)) {
            return null;
        }

        return get_class($relation->getRelated());
    }

    /**
     * Determine if a method defines a relationship.
     *
     * @param ReflectionMethod $method
     * @return bool
     */
    protected function isRelationshipMethod(ReflectionMethod $method): bool {
        // Skip methods that are not defined in the model
        if ($method->class !== get_class($this)) {
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
        } catch (\Throwable $e) {
            return false;
        }
    }
}
