<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Services\Resources;

use Illuminate\Support\Str;
use SAC\EloquentModelGenerator\Contracts\ResourceGenerator as ResourceGeneratorContract;
use SAC\EloquentModelGenerator\Exceptions\ResourceGeneratorException;
use SAC\EloquentModelGenerator\ValueObjects\Column;

/**
 * Resource Generator
 *
 * Generates API resources with conditional fields and relationships.
 */
class ResourceGenerator implements ResourceGeneratorContract {
    /**
     * Generate a resource class for a model.
     *
     * @param string $modelClass The fully qualified model class name
     * @param array<Column> $columns The model columns
     * @param array<string, array<string>> $relationships The model relationships
     * @param array<string, array<string>> $conditionalFields Conditional field definitions
     * @return string The resource class definition
     * @throws ResourceGeneratorException
     */
    public function generate(
        string $modelClass,
        array $columns,
        array $relationships = [],
        array $conditionalFields = []
    ): string {
        try {
            $namespace = $this->getResourceNamespace($modelClass);
            $className = $this->getResourceClassName($modelClass);
            $modelName = class_basename($modelClass);

            return $this->buildResourceClass(
                namespace: $namespace,
                className: $className,
                modelClass: $modelClass,
                modelName: $modelName,
                columns: $columns,
                relationships: $relationships,
                conditionalFields: $conditionalFields
            );
        } catch (\Exception $e) {
            throw ResourceGeneratorException::generationFailed($modelClass, $e->getMessage());
        }
    }

    /**
     * Build the resource class content.
     *
     * @param string $namespace The resource namespace
     * @param string $className The resource class name
     * @param string $modelClass The model class
     * @param string $modelName The model name
     * @param array<Column> $columns The model columns
     * @param array<string, array<string>> $relationships The model relationships
     * @param array<string, array<string>> $conditionalFields Conditional field definitions
     * @return string The resource class content
     */
    private function buildResourceClass(
        string $namespace,
        string $className,
        string $modelClass,
        string $modelName,
        array $columns,
        array $relationships,
        array $conditionalFields
    ): string {
        $toArray = $this->buildToArrayMethod(
            modelName: $modelName,
            columns: $columns,
            relationships: $relationships,
            conditionalFields: $conditionalFields
        );

        $conditionalMethods = $this->buildConditionalMethods($conditionalFields);

        return <<<PHP
        <?php

        declare(strict_types=1);

        namespace {$namespace};

        use {$modelClass};
        use Illuminate\\Http\\Request;
        use Illuminate\\Http\\Resources\\Json\\JsonResource;

        /**
         * @property-read {$modelName} \$resource
         */
        class {$className} extends JsonResource
        {
            {$toArray}

            {$conditionalMethods}
        }
        PHP;
    }

    /**
     * Build the toArray method.
     *
     * @param string $modelName The model name
     * @param array<Column> $columns The model columns
     * @param array<string, array<string>> $relationships The model relationships
     * @param array<string, array<string>> $conditionalFields Conditional field definitions
     * @return string The toArray method
     */
    private function buildToArrayMethod(
        string $modelName,
        array $columns,
        array $relationships,
        array $conditionalFields
    ): string {
        $fields = array_merge(
            $this->buildColumnFields($columns),
            $this->buildRelationshipFields($relationships),
            $this->buildConditionalFields($conditionalFields)
        );

        $fieldsString = implode(",\n            ", $fields);

        return <<<PHP
        /**
         * Transform the resource into an array.
         *
         * @param Request \$request
         * @return array<string, mixed>
         */
        public function toArray(\$request): array
        {
            return [
                {$fieldsString}
            ];
        }
        PHP;
    }

    /**
     * Build column fields for the resource.
     *
     * @param array<Column> $columns The model columns
     * @return array<string> The column field definitions
     */
    private function buildColumnFields(array $columns): array {
        $fields = [];

        foreach ($columns as $column) {
            if ($this->shouldIncludeColumn($column)) {
                $fields[] = "'{$column->getName()}' => \$this->{$column->getName()}";
            }
        }

        return $fields;
    }

    /**
     * Build relationship fields for the resource.
     *
     * @param array<string, array<string>> $relationships The model relationships
     * @return array<string> The relationship field definitions
     */
    private function buildRelationshipFields(array $relationships): array {
        $fields = [];

        foreach ($relationships as $type => $relations) {
            foreach ($relations as $relation) {
                $resourceClass = $this->getRelationResourceClass($relation);
                $fields[] = $this->buildRelationshipField($relation, $type, $resourceClass);
            }
        }

        return $fields;
    }

    /**
     * Build conditional fields for the resource.
     *
     * @param array<string, array<string>> $conditionalFields Conditional field definitions
     * @return array<string> The conditional field definitions
     */
    private function buildConditionalFields(array $conditionalFields): array {
        $fields = [];

        foreach ($conditionalFields as $field => $conditions) {
            $methodName = 'when' . Str::studly($field);
            $fields[] = "'{$field}' => \$this->{$methodName}(\$request)";
        }

        return $fields;
    }

    /**
     * Build conditional methods for the resource.
     *
     * @param array<string, array<string>> $conditionalFields Conditional field definitions
     * @return string The conditional methods
     */
    private function buildConditionalMethods(array $conditionalFields): string {
        $methods = [];

        foreach ($conditionalFields as $field => $conditions) {
            $methods[] = $this->buildConditionalMethod($field, $conditions);
        }

        return $methods ? "\n    " . implode("\n\n    ", $methods) : '';
    }

    /**
     * Build a conditional method.
     *
     * @param string $field The field name
     * @param array<string> $conditions The conditions
     * @return string The method definition
     */
    private function buildConditionalMethod(string $field, array $conditions): string {
        $methodName = 'when' . Str::studly($field);
        $conditionsString = implode(" && ", array_map(fn($c) => "({$c})", $conditions));

        return <<<PHP
        /**
         * Get the {$field} when conditions are met.
         *
         * @param Request \$request
         * @return mixed
         */
        protected function {$methodName}(Request \$request): mixed
        {
            return {$conditionsString} ? \$this->{$field} : null;
        }
        PHP;
    }

    /**
     * Build a relationship field.
     *
     * @param string $relation The relation name
     * @param string $type The relationship type
     * @param string $resourceClass The resource class
     * @return string The relationship field definition
     */
    private function buildRelationshipField(string $relation, string $type, string $resourceClass): string {
        return match ($type) {
            'hasOne', 'belongsTo' => "'{$relation}' => {$resourceClass}::make(\$this->whenLoaded('{$relation}'))",
            default => "'{$relation}' => {$resourceClass}::collection(\$this->whenLoaded('{$relation}'))",
        };
    }

    /**
     * Get the resource namespace from model class.
     *
     * @param string $modelClass The model class
     * @return string The resource namespace
     */
    private function getResourceNamespace(string $modelClass): string {
        $parts = explode('\\', $modelClass);
        array_pop($parts); // Remove model name
        return implode('\\', array_slice($parts, 0, -1)) . '\\Http\\Resources';
    }

    /**
     * Get the resource class name from model class.
     *
     * @param string $modelClass The model class
     * @return string The resource class name
     */
    private function getResourceClassName(string $modelClass): string {
        return class_basename($modelClass) . 'Resource';
    }

    /**
     * Get the resource class for a relationship.
     *
     * @param string $relation The relation name
     * @return string The resource class name
     */
    private function getRelationResourceClass(string $relation): string {
        return Str::studly(Str::singular($relation)) . 'Resource';
    }

    /**
     * Check if a column should be included in the resource.
     *
     * @param Column $column The column
     * @return bool True if the column should be included
     */
    private function shouldIncludeColumn(Column $column): bool {
        return !in_array($column->getName(), [
            'password',
            'remember_token',
            'deleted_at',
        ], true);
    }
}