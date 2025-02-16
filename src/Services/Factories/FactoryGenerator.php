<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Services\Factories;

use Illuminate\Support\Str;
use SAC\EloquentModelGenerator\Contracts\FactoryGenerator as FactoryGeneratorContract;
use SAC\EloquentModelGenerator\Exceptions\FactoryGeneratorException;
use SAC\EloquentModelGenerator\ValueObjects\Column;

/**
 * Factory Generator
 *
 * Generates model factories with state definitions and relationship handling.
 */
class FactoryGenerator implements FactoryGeneratorContract {
    /**
     * Generate a factory definition for a model.
     *
     * @param string $modelClass The fully qualified model class name
     * @param array<Column> $columns The model columns
     * @param array<string, array<string>> $relationships The model relationships
     * @return string The factory class definition
     * @throws FactoryGeneratorException
     */
    public function generate(string $modelClass, array $columns, array $relationships = []): string {
        try {
            $namespace = $this->getFactoryNamespace($modelClass);
            $className = $this->getFactoryClassName($modelClass);
            $modelName = class_basename($modelClass);

            return $this->buildFactoryClass(
                namespace: $namespace,
                className: $className,
                modelClass: $modelClass,
                modelName: $modelName,
                columns: $columns,
                relationships: $relationships
            );
        } catch (\Exception $e) {
            throw FactoryGeneratorException::generationFailed($modelClass, $e->getMessage());
        }
    }

    /**
     * Build the factory class content.
     *
     * @param string $namespace The factory namespace
     * @param string $className The factory class name
     * @param string $modelClass The model class
     * @param string $modelName The model name
     * @param array<Column> $columns The model columns
     * @param array<string, array<string>> $relationships The model relationships
     * @return string The factory class content
     */
    private function buildFactoryClass(
        string $namespace,
        string $className,
        string $modelClass,
        string $modelName,
        array $columns,
        array $relationships
    ): string {
        $definition = $this->buildDefinitionMethod($columns);
        $states = $this->buildStateDefinitions($columns);
        $relationshipMethods = $this->buildRelationshipMethods($relationships);

        return <<<PHP
        <?php

        declare(strict_types=1);

        namespace {$namespace};

        use Illuminate\Database\Eloquent\Factories\Factory;
        use {$modelClass};

        /**
         * @extends Factory<{$modelName}>
         */
        class {$className} extends Factory
        {
            /**
             * The name of the factory's corresponding model.
             *
             * @var string
             */
            protected \$model = {$modelName}::class;

            {$definition}

            {$states}

            {$relationshipMethods}
        }
        PHP;
    }

    /**
     * Build the definition method.
     *
     * @param array<Column> $columns The model columns
     * @return string The definition method
     */
    private function buildDefinitionMethod(array $columns): string {
        $definitions = [];

        foreach ($columns as $column) {
            if ($this->shouldGenerateDefinition($column)) {
                $definitions[] = "'{$column->getName()}' => " . $this->getColumnDefinition($column);
            }
        }

        $definitionsString = implode(",\n            ", $definitions);

        return <<<PHP
        /**
         * Define the model's default state.
         *
         * @return array<string, mixed>
         */
        public function definition(): array
        {
            return [
                {$definitionsString}
            ];
        }
        PHP;
    }

    /**
     * Build state definitions for the factory.
     *
     * @param array<Column> $columns The model columns
     * @return string The state definitions
     */
    private function buildStateDefinitions(array $columns): string {
        $states = [];

        // Add common states
        $states[] = $this->buildActiveState();
        $states[] = $this->buildInactiveState();

        // Add column-specific states
        foreach ($columns as $column) {
            if ($state = $this->getColumnState($column)) {
                $states[] = $state;
            }
        }

        return implode("\n\n    ", $states);
    }

    /**
     * Build relationship methods for the factory.
     *
     * @param array<string, array<string>> $relationships The model relationships
     * @return string The relationship methods
     */
    private function buildRelationshipMethods(array $relationships): string {
        $methods = [];

        foreach ($relationships as $type => $relations) {
            foreach ($relations as $relation) {
                $methods[] = $this->buildRelationshipMethod($type, $relation);
            }
        }

        return implode("\n\n    ", $methods);
    }

    /**
     * Get the factory namespace from model class.
     *
     * @param string $modelClass The model class
     * @return string The factory namespace
     */
    private function getFactoryNamespace(string $modelClass): string {
        $parts = explode('\\', $modelClass);
        array_pop($parts); // Remove model name
        return implode('\\', array_slice($parts, 0, -1)) . '\\Factories';
    }

    /**
     * Get the factory class name from model class.
     *
     * @param string $modelClass The model class
     * @return string The factory class name
     */
    private function getFactoryClassName(string $modelClass): string {
        return class_basename($modelClass) . 'Factory';
    }

    /**
     * Check if a column should have a factory definition.
     *
     * @param Column $column The column
     * @return bool True if should generate definition
     */
    private function shouldGenerateDefinition(Column $column): bool {
        return !in_array($column->getName(), [
            'id',
            'created_at',
            'updated_at',
            'deleted_at',
        ], true);
    }

    /**
     * Get the factory definition for a column.
     *
     * @param Column $column The column
     * @return string The column definition
     */
    private function getColumnDefinition(Column $column): string {
        return match ($column->getType()) {
            'string' => $this->getStringDefinition($column),
            'integer' => $this->getIntegerDefinition($column),
            'boolean' => '$this->faker->boolean',
            'datetime' => '$this->faker->dateTime',
            'date' => '$this->faker->date',
            'text' => '$this->faker->paragraph',
            'json' => '[]',
            default => 'null',
        };
    }

    /**
     * Get string column definition.
     *
     * @param Column $column The column
     * @return string The definition
     */
    private function getStringDefinition(Column $column): string {
        return match ($column->getName()) {
            'name' => '$this->faker->name',
            'email' => '$this->faker->unique()->safeEmail',
            'password' => 'bcrypt($this->faker->password)',
            'phone' => '$this->faker->phoneNumber',
            'address' => '$this->faker->address',
            'title' => '$this->faker->sentence',
            default => '$this->faker->word',
        };
    }

    /**
     * Get integer column definition.
     *
     * @param Column $column The column
     * @return string The definition
     */
    private function getIntegerDefinition(Column $column): string {
        return match (true) {
            str_contains($column->getName(), 'age') => '$this->faker->numberBetween(18, 100)',
            str_contains($column->getName(), 'year') => '$this->faker->year',
            str_contains($column->getName(), 'price') => '$this->faker->randomNumber(4)',
            str_contains($column->getName(), '_id') => '1',
            default => '$this->faker->randomNumber()',
        };
    }

    /**
     * Build the active state method.
     *
     * @return string The active state method
     */
    private function buildActiveState(): string {
        return <<<'PHP'
        /**
         * Indicate that the model is active.
         *
         * @return $this
         */
        public function active(): static
        {
            return $this->state(fn (array $attributes) => [
                'is_active' => true,
                'status' => 'active',
            ]);
        }
        PHP;
    }

    /**
     * Build the inactive state method.
     *
     * @return string The inactive state method
     */
    private function buildInactiveState(): string {
        return <<<'PHP'
        /**
         * Indicate that the model is inactive.
         *
         * @return $this
         */
        public function inactive(): static
        {
            return $this->state(fn (array $attributes) => [
                'is_active' => false,
                'status' => 'inactive',
            ]);
        }
        PHP;
    }

    /**
     * Get state method for a column.
     *
     * @param Column $column The column
     * @return string|null The state method or null
     */
    private function getColumnState(Column $column): ?string {
        if (!$column->hasDefault()) {
            return null;
        }

        $name = Str::camel("with_default_{$column->getName()}");
        $default = var_export($column->getDefault(), true);

        return <<<PHP
        /**
         * Set {$column->getName()} to its default value.
         *
         * @return \$this
         */
        public function {$name}(): static
        {
            return \$this->state(fn (array \$attributes) => [
                '{$column->getName()}' => {$default},
            ]);
        }
        PHP;
    }

    /**
     * Build a relationship method.
     *
     * @param string $type The relationship type
     * @param string $relation The relation name
     * @return string The relationship method
     */
    private function buildRelationshipMethod(string $type, string $relation): string {
        $methodName = Str::camel("with_{$relation}");
        $modelClass = Str::studly(Str::singular($relation));

        return <<<PHP
        /**
         * Configure the {$relation} relationship.
         *
         * @return \$this
         */
        public function {$methodName}(): static
        {
            return \$this->has(
                {$modelClass}::factory(),
                relationship: '{$relation}'
            );
        }
        PHP;
    }
}