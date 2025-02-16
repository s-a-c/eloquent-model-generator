<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Services\Generator;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use SAC\EloquentModelGenerator\Contracts\{
    ModelGenerator,
    RelationDetector,
    SchemaAnalyzer,
    TypeInference
};
use SAC\EloquentModelGenerator\Exceptions\ModelGeneratorException;
use SAC\EloquentModelGenerator\Support\Definitions\{ModelDefinition, RelationDefinition};
use SAC\EloquentModelGenerator\ValueObjects\Column;

class ModelGeneratorService implements ModelGenerator {
    public function __construct(
        private readonly SchemaAnalyzer $schemaAnalyzer,
        private readonly TypeInference $typeInference,
        private readonly RelationDetector $relationDetector,
        private readonly string $namespace = 'App\\Models'
    ) {
    }

    /**
     * Generate a model class for a table.
     *
     * @throws ModelGeneratorException
     */
    public function generate(string $table): string {
        try {
            $schema = $this->schemaAnalyzer->analyze($table);
            $className = $this->generateClassName($table);

            // Create columns collection
            $columns = new Collection();
            foreach ($schema['columns'] as $name => $column) {
                $columns->push(new Column(
                    name: $name,
                    type: $column['type'],
                    isPrimary: $column['primary'] ?? false,
                    isAutoIncrement: $column['autoIncrement'] ?? false,
                    isNullable: $column['nullable'],
                    isUnique: $column['unique'] ?? false,
                    default: $column['default'] ?? null,
                    length: $column['length'] ?? null
                ));
            }

            // Create relations collection
            $relations = new Collection();
            if (isset($schema['relations'])) {
                foreach ($schema['relations'] as $name => $relation) {
                    $relations->push(new RelationDefinition(
                        $name,
                        $relation['type'],
                        $relation['model'] ?? null,
                        $relation['foreignKey'] ?? null,
                        $relation['localKey'] ?? null,
                        $relation['morphType'] ?? null
                    ));
                }
            }

            $definition = new ModelDefinition(
                $className,
                $this->namespace,
                $columns,
                $relations,
                'Illuminate\\Database\\Eloquent\\Model',
                isset($schema['columns']['deleted_at']),
                true,
                true,
                $table
            );

            return $this->buildClass($definition);
        } catch (\Throwable $throwable) {
            throw new ModelGeneratorException(
                "Failed to generate model for table {$table}: " . $throwable->getMessage(),
                previous: $throwable
            );
        }
    }

    /**
     * Generate models for multiple tables.
     *
     * @param array<string> $tables
     * @return array<string, string>
     *
     * @throws ModelGeneratorException
     */
    public function generateBatch(array $tables): array {
        $models = [];
        $errors = [];

        foreach ($tables as $table) {
            try {
                $models[$table] = $this->generate($table);
            } catch (ModelGeneratorException $e) {
                $errors[$table] = $e->getMessage();
            }
        }

        if (!empty($errors)) {
            throw new ModelGeneratorException(
                "Failed to generate some models:\n" . implode("\n", $errors)
            );
        }

        return $models;
    }

    /**
     * Check if a model exists for a table.
     */
    public function modelExists(string $table): bool {
        $className = $this->generateClassName($table);
        $modelPath = str_replace('\\', '/', $this->namespace) . '/' . $className . '.php';
        return file_exists($modelPath);
    }

    /**
     * Generate class name from table name.
     */
    private function generateClassName(string $table): string {
        return Str::studly(Str::singular($table));
    }

    /**
     * Build the model class string.
     */
    private function buildClass(ModelDefinition $definition): string {
        $properties = [];
        foreach ($definition->getColumns() as $column) {
            $type = $this->typeInference->inferDocblockType($column);
            $properties[] = " * @property {$type} \${$column->getName()}";
        }

        $relations = [];
        foreach ($definition->getRelations() as $relation) {
            $relations[] = $this->buildRelationMethod($relation);
        }

        $namespace = rtrim($definition->getNamespace(), '\\');
        $properties = implode("\n", $properties);
        $relations = implode("\n\n", $relations);

        $uses = ['Illuminate\\Database\\Eloquent\\Model'];
        if ($definition->withSoftDeletes()) {
            $uses[] = 'Illuminate\\Database\\Eloquent\\SoftDeletes';
        }
        if (!empty($relations)) {
            $uses[] = 'Illuminate\\Database\\Eloquent\\Relations\\{BelongsTo, BelongsToMany, HasMany, HasOne, MorphTo}';
        }
        $uses = implode(";\nuse ", $uses);

        $traits = $definition->withSoftDeletes() ? "\n    use SoftDeletes;" : '';

        return <<<PHP
            <?php

            declare(strict_types=1);

            namespace {$namespace};

            use {$uses};

            /**
             * {$definition->getClassName()} Model
             *
            {$properties}
             */
            class {$definition->getClassName()} extends Model
            {{$traits}
                /**
                 * The table associated with the model.
                 *
                 * @var string
                 */
                protected \$table = '{$definition->getTableName()}';

                {$relations}
            }
            PHP;
    }

    /**
     * Build a relation method.
     */
    private function buildRelationMethod(RelationDefinition $relation): string {
        $method = match ($relation->type) {
            'hasOne' => "return \$this->hasOne({$relation->model}::class, '{$relation->foreignKey}', '{$relation->localKey}');",
            'hasMany' => "return \$this->hasMany({$relation->model}::class, '{$relation->foreignKey}', '{$relation->localKey}');",
            'belongsTo' => "return \$this->belongsTo({$relation->model}::class, '{$relation->foreignKey}', '{$relation->localKey}');",
            'belongsToMany' => "return \$this->belongsToMany({$relation->model}::class, '{$relation->foreignKey}', '{$relation->localKey}');",
            'morphTo' => "return \$this->morphTo();",
            default => throw new ModelGeneratorException("Unknown relation type: {$relation->type}"),
        };

        return <<<PHP
            public function {$relation->name}()
            {
                {$method}
            }
            PHP;
    }
}