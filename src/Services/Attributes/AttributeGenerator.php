<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Services\Attributes;

use Illuminate\Support\Str;
use SAC\EloquentModelGenerator\Contracts\AttributeGenerator as AttributeGeneratorContract;
use SAC\EloquentModelGenerator\Exceptions\AttributeGeneratorException;
use SAC\EloquentModelGenerator\ValueObjects\Column;

/**
 * Attribute Generator
 *
 * Generates model attributes including accessors, mutators,
 * and custom casts based on column definitions.
 */
class AttributeGenerator implements AttributeGeneratorContract {
    /**
     * Generate attribute methods for a model.
     *
     * @param array<Column> $columns The model columns
     * @return array{
     *     accessors: array<string>,
     *     mutators: array<string>,
     *     casts: array<string, string>,
     *     properties: array<string>
     * }
     * @throws AttributeGeneratorException
     */
    public function generate(array $columns): array {
        try {
            return [
                'accessors' => $this->generateAccessors($columns),
                'mutators' => $this->generateMutators($columns),
                'casts' => $this->generateCasts($columns),
                'properties' => $this->generateProperties($columns),
            ];
        } catch (\Exception $e) {
            throw AttributeGeneratorException::generationFailed($e->getMessage());
        }
    }

    /**
     * Generate accessor methods for columns.
     *
     * @param array<Column> $columns The model columns
     * @return array<string> Array of accessor method definitions
     */
    private function generateAccessors(array $columns): array {
        $accessors = [];

        foreach ($columns as $column) {
            if ($this->needsAccessor($column)) {
                $accessors[] = $this->generateAccessor($column);
            }
        }

        return $accessors;
    }

    /**
     * Generate mutator methods for columns.
     *
     * @param array<Column> $columns The model columns
     * @return array<string> Array of mutator method definitions
     */
    private function generateMutators(array $columns): array {
        $mutators = [];

        foreach ($columns as $column) {
            if ($this->needsMutator($column)) {
                $mutators[] = $this->generateMutator($column);
            }
        }

        return $mutators;
    }

    /**
     * Generate cast definitions for columns.
     *
     * @param array<Column> $columns The model columns
     * @return array<string, string> Array of column casts
     */
    private function generateCasts(array $columns): array {
        $casts = [];

        foreach ($columns as $column) {
            if ($cast = $this->determineCast($column)) {
                $casts[$column->getName()] = $cast;
            }
        }

        return $casts;
    }

    /**
     * Generate property definitions for columns.
     *
     * @param array<Column> $columns The model columns
     * @return array<string> Array of property definitions
     */
    private function generateProperties(array $columns): array {
        $properties = [];

        foreach ($columns as $column) {
            $properties[] = $this->generateProperty($column);
        }

        return $properties;
    }

    /**
     * Check if a column needs an accessor.
     *
     * @param Column $column The column
     * @return bool True if the column needs an accessor
     */
    private function needsAccessor(Column $column): bool {
        return in_array($column->getType(), [
            'json',
            'array',
            'object',
            'collection',
            'encrypted',
        ], true);
    }

    /**
     * Check if a column needs a mutator.
     *
     * @param Column $column The column
     * @return bool True if the column needs a mutator
     */
    private function needsMutator(Column $column): bool {
        return in_array($column->getType(), [
            'json',
            'array',
            'object',
            'collection',
            'encrypted',
            'email',
            'url',
            'password',
        ], true);
    }

    /**
     * Generate an accessor method for a column.
     *
     * @param Column $column The column
     * @return string The accessor method definition
     */
    private function generateAccessor(Column $column): string {
        $name = Str::studly($column->getName());
        $type = $this->getAccessorReturnType($column);
        $body = $this->getAccessorBody($column);

        return <<<PHP
        public function get{$name}Attribute(\${$column->getName()}): {$type}
        {
            {$body}
        }
        PHP;
    }

    /**
     * Generate a mutator method for a column.
     *
     * @param Column $column The column
     * @return string The mutator method definition
     */
    private function generateMutator(Column $column): string {
        $name = Str::studly($column->getName());
        $type = $this->getMutatorParameterType($column);
        $body = $this->getMutatorBody($column);

        return <<<PHP
        public function set{$name}Attribute(\$value): void
        {
            \$this->attributes['{$column->getName()}'] = {$body};
        }
        PHP;
    }

    /**
     * Generate a property definition for a column.
     *
     * @param Column $column The column
     * @return string The property definition
     */
    private function generateProperty(Column $column): string {
        $type = $this->getPropertyType($column);
        $name = $column->getName();
        $description = $this->getPropertyDescription($column);

        return <<<PHP
        /**
         * {$description}
         *
         * @var {$type}
         */
        protected \${$name};
        PHP;
    }

    /**
     * Determine the cast type for a column.
     *
     * @param Column $column The column
     * @return string|null The cast type or null if no cast needed
     */
    private function determineCast(Column $column): ?string {
        return match ($column->getType()) {
            'json', 'array' => 'array',
            'object' => 'object',
            'collection' => 'collection',
            'integer' => 'integer',
            'float', 'decimal' => 'float',
            'boolean' => 'boolean',
            'date' => 'date',
            'datetime', 'timestamp' => 'datetime',
            'encrypted' => 'encrypted',
            default => null,
        };
    }

    /**
     * Get the accessor return type for a column.
     *
     * @param Column $column The column
     * @return string The return type
     */
    private function getAccessorReturnType(Column $column): string {
        return match ($column->getType()) {
            'json', 'array' => 'array',
            'object' => 'object',
            'collection' => '\Illuminate\Support\Collection',
            'encrypted' => 'string',
            default => 'mixed',
        };
    }

    /**
     * Get the mutator parameter type for a column.
     *
     * @param Column $column The column
     * @return string The parameter type
     */
    private function getMutatorParameterType(Column $column): string {
        return match ($column->getType()) {
            'json', 'array' => 'array',
            'object' => 'object',
            'collection' => '\Illuminate\Support\Collection',
            default => 'mixed',
        };
    }

    /**
     * Get the accessor body for a column.
     *
     * @param Column $column The column
     * @return string The accessor body
     */
    private function getAccessorBody(Column $column): string {
        return match ($column->getType()) {
            'json', 'array' => 'return json_decode($' . $column->getName() . ', true);',
            'object' => 'return json_decode($' . $column->getName() . ');',
            'collection' => 'return collect(json_decode($' . $column->getName() . ', true));',
            'encrypted' => 'return decrypt($' . $column->getName() . ');',
            default => 'return $' . $column->getName() . ';',
        };
    }

    /**
     * Get the mutator body for a column.
     *
     * @param Column $column The column
     * @return string The mutator body
     */
    private function getMutatorBody(Column $column): string {
        return match ($column->getType()) {
            'json', 'array', 'object' => 'json_encode($value)',
            'collection' => 'json_encode($value->toArray())',
            'encrypted' => 'encrypt($value)',
            'email' => 'strtolower($value)',
            'url' => 'rtrim($value, "/")',
            'password' => 'Hash::make($value)',
            default => '$value',
        };
    }

    /**
     * Get the property type for a column.
     *
     * @param Column $column The column
     * @return string The property type
     */
    private function getPropertyType(Column $column): string {
        $type = match ($column->getType()) {
            'integer' => 'int',
            'float', 'decimal' => 'float',
            'boolean' => 'bool',
            'json', 'array' => 'array',
            'object' => 'object',
            'collection' => '\Illuminate\Support\Collection',
            'datetime', 'timestamp' => '\Carbon\Carbon',
            'date' => '\Carbon\Carbon',
            default => 'string',
        };

        return $column->isNullable() ? $type . '|null' : $type;
    }

    /**
     * Get the property description for a column.
     *
     * @param Column $column The column
     * @return string The property description
     */
    private function getPropertyDescription(Column $column): string {
        $description = "The {$column->getName()} column";

        if ($column->isNullable()) {
            $description .= ' (nullable)';
        }

        if ($column->hasDefault()) {
            $default = $column->getDefault();
            $defaultValue = is_string($default) ? "'{$default}'" : $default;
            $description .= " (default: {$defaultValue})";
        }

        return $description;
    }
}