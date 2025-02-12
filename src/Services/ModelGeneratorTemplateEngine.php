<?php

namespace SAC\EloquentModelGenerator\Services;

use SAC\EloquentModelGenerator\ValueObjects\ModelDefinition;
use Illuminate\Support\Str;

class ModelGeneratorTemplateEngine {
    /**
     * Render a model template.
     *
     * @param ModelDefinition $definition
     * @param array<string, mixed> $schema
     * @return string
     */
    public function render(ModelDefinition $definition, array $schema): string {
        $namespace = $definition->getNamespace();
        $className = $definition->getClassName();
        $tableName = $definition->getTableName();
        $baseClass = $definition->getBaseClass();

        $traits = $this->getTraits($definition);
        $properties = $this->getProperties($definition, $schema);
        $relationships = $definition->withRelationships() ? $this->getRelationships($schema) : '';

        return $this->buildTemplate(
            namespace: $namespace,
            className: $className,
            tableName: $tableName,
            baseClass: $baseClass,
            traits: $traits,
            properties: $properties,
            relationships: $relationships
        );
    }

    /**
     * Get the traits for the model.
     *
     * @param ModelDefinition $definition
     * @return string
     */
    private function getTraits(ModelDefinition $definition): string {
        $traits = [];

        if ($definition->withSoftDeletes()) {
            $traits[] = 'use Illuminate\\Database\\Eloquent\\SoftDeletes;';
        }

        return !empty($traits) ? implode("\n    ", $traits) . "\n" : '';
    }

    /**
     * Get the properties for the model.
     *
     * @param ModelDefinition $definition
     * @param array<string, mixed> $schema
     * @return string
     */
    private function getProperties(ModelDefinition $definition, array $schema): string {
        $properties = [];
        $fillable = [];
        $casts = [];

        foreach ($schema['columns'] ?? [] as $column => $attributes) {
            if ($column !== 'id') {
                $fillable[] = $column;
            }

            if (isset($attributes['type'])) {
                $cast = $this->getCastType($attributes['type']);
                if ($cast) {
                    $casts[$column] = $cast;
                }
            }
        }

        if (!empty($fillable)) {
            $fillableStr = "'" . implode("', '", $fillable) . "'";
            $properties[] = "protected \$fillable = [$fillableStr];";
        }

        if (!empty($casts)) {
            $castsStr = array_map(
                fn($column, $cast) => "'$column' => '$cast'",
                array_keys($casts),
                array_values($casts)
            );
            $properties[] = "protected \$casts = [" . implode(", ", $castsStr) . "];";
        }

        return !empty($properties) ? implode("\n    ", $properties) . "\n" : '';
    }

    /**
     * Get the relationships for the model.
     *
     * @param array<string, mixed> $schema
     * @return string
     */
    private function getRelationships(array $schema): string {
        $relationships = [];

        // Add relationship methods based on schema
        // This is a simplified example - you would need to analyze foreign keys and table structure

        return !empty($relationships) ? implode("\n\n    ", $relationships) . "\n" : '';
    }

    /**
     * Get the cast type for a column.
     *
     * @param string $type
     * @return string|null
     */
    private function getCastType(string $type): ?string {
        return match ($type) {
            'integer', 'bigint' => 'integer',
            'decimal', 'float' => 'float',
            'boolean' => 'boolean',
            'date' => 'date',
            'datetime', 'timestamp' => 'datetime',
            'json', 'jsonb' => 'array',
            default => null,
        };
    }

    /**
     * Build the model template.
     *
     * @param string $namespace
     * @param string $className
     * @param string $tableName
     * @param string $baseClass
     * @param string $traits
     * @param string $properties
     * @param string $relationships
     * @return string
     */
    private function buildTemplate(
        string $namespace,
        string $className,
        string $tableName,
        string $baseClass,
        string $traits,
        string $properties,
        string $relationships
    ): string {
        return <<<PHP
<?php

namespace {$namespace};

{$traits}class {$className} extends {$baseClass}
{
    protected \$table = '{$tableName}';

    {$properties}{$relationships}
}

PHP;
    }
}
