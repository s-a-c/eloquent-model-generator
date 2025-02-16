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
     * Analyze a model for potential fixes.
     *
     * @param array<string> $fixTypes Types of fixes to analyze for
     * @return array<array{
     *     type: string,
     *     description: string,
     *     file: string,
     *     line: int,
     *     current: string,
     *     suggested: string
     * }>
     *
     * @throws ModelGeneratorException
     */
    public function analyzeFixes(string $model, array $fixTypes): array {
        try {
            $fixes = [];
            $modelPath = str_replace('\\', '/', $model) . '.php';

            if (!file_exists($modelPath)) {
                throw new ModelGeneratorException("Model file not found: {$modelPath}");
            }

            $content = file_get_contents($modelPath);
            $schema = $this->schemaAnalyzer->analyze($this->getTableFromModel($model));

            // Check for type fixes
            if (in_array('types', $fixTypes, true)) {
                $fixes = array_merge($fixes, $this->analyzeTypeFixes($content, $schema));
            }

            // Check for relation fixes
            if (in_array('relations', $fixTypes, true)) {
                $fixes = array_merge($fixes, $this->analyzeRelationFixes($content, $schema));
            }

            // Check for validation fixes
            if (in_array('validation', $fixTypes, true)) {
                $fixes = array_merge($fixes, $this->analyzeValidationFixes($content, $schema));
            }

            return $fixes;
        } catch (\Throwable $throwable) {
            throw new ModelGeneratorException(
                "Failed to analyze fixes for model {$model}: " . $throwable->getMessage(),
                previous: $throwable
            );
        }
    }

    /**
     * Apply a fix to a model.
     *
     * @param array{
     *     type: string,
     *     description: string,
     *     file: string,
     *     line: int,
     *     current: string,
     *     suggested: string
     * } $fix
     *
     * @throws ModelGeneratorException
     */
    public function applyFix(string $model, array $fix): void {
        try {
            $modelPath = str_replace('\\', '/', $model) . '.php';

            if (!file_exists($modelPath)) {
                throw new ModelGeneratorException("Model file not found: {$modelPath}");
            }

            $content = file_get_contents($modelPath);
            $lines = explode("\n", $content);

            // Apply the fix
            $lines[$fix['line'] - 1] = $fix['suggested'];

            // Write back to file
            file_put_contents($modelPath, implode("\n", $lines));
        } catch (\Throwable $throwable) {
            throw new ModelGeneratorException(
                "Failed to apply fix to model {$model}: " . $throwable->getMessage(),
                previous: $throwable
            );
        }
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

    /**
     * Generate class name from table name.
     */
    private function generateClassName(string $table): string {
        return Str::studly(Str::singular($table));
    }

    /**
     * Get table name from model class name.
     */
    private function getTableFromModel(string $model): string {
        $className = basename(str_replace('\\', '/', $model));
        return Str::snake(Str::pluralStudly($className));
    }

    /**
     * Analyze type fixes for a model.
     *
     * @param array<string, array<string, mixed>> $schema
     * @return array<array{
     *     type: string,
     *     description: string,
     *     file: string,
     *     line: int,
     *     current: string,
     *     suggested: string
     * }>
     */
    private function analyzeTypeFixes(string $content, array $schema): array {
        // TODO: Implement type fix analysis
        return [];
    }

    /**
     * Analyze relation fixes for a model.
     *
     * @param array<string, array<string, mixed>> $schema
     * @return array<array{
     *     type: string,
     *     description: string,
     *     file: string,
     *     line: int,
     *     current: string,
     *     suggested: string
     * }>
     */
    private function analyzeRelationFixes(string $content, array $schema): array {
        // TODO: Implement relation fix analysis
        return [];
    }

    /**
     * Analyze validation fixes for a model.
     *
     * @param array<string, array<string, mixed>> $schema
     * @return array<array{
     *     type: string,
     *     description: string,
     *     file: string,
     *     line: int,
     *     current: string,
     *     suggested: string
     * }>
     */
    private function analyzeValidationFixes(string $content, array $schema): array {
        // TODO: Implement validation fix analysis
        return [];
    }
}