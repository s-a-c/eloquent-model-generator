<?php

namespace SAC\EloquentModelGenerator\Services;

use Exception;
use Illuminate\Database\Connection;
use Illuminate\Database\Schema\Builder as SchemaBuilder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use SAC\EloquentModelGenerator\Contracts\ModelGeneratorService as ModelGeneratorServiceContract;
use SAC\EloquentModelGenerator\Exceptions\ModelGeneratorException;
use SAC\EloquentModelGenerator\Models\GeneratedModel;
use SAC\EloquentModelGenerator\Support\Definitions\ModelDefinition;
use SAC\EloquentModelGenerator\Support\Definitions\RelationDefinition;
use SAC\EloquentModelGenerator\ValueObjects\Column;
use Throwable;

/**
 * @phpstan-type ColumnDefinition array{
 *     type: non-empty-string,
 *     nullable: bool,
 *     default?: mixed,
 *     length?: positive-int|null,
 *     unsigned?: bool,
 *     autoIncrement?: bool,
 *     primary?: bool,
 *     unique?: bool,
 *     comment?: non-empty-string|null,
 *     allowed?: array<string>|null
 * }
 * @phpstan-type SchemaDefinition array{
 *     columns: array<string, ColumnDefinition>,
 *     indexes?: array<string, array{
 *         type: 'primary'|'unique'|'index'|'fulltext'|'spatial',
 *         columns: array<string>,
 *         name?: string,
 *         algorithm?: string,
 *         options?: array<string, mixed>
 *     }>,
 *     foreignKeys?: array<string, array{
 *         table: string,
 *         columns: array<string, string>,
 *         onDelete?: string,
 *         onUpdate?: string
 *     }>,
 *     relations?: array<string, array{
 *         type: string,
 *         model?: string,
 *         foreignKey?: string,
 *         localKey?: string,
 *         morphType?: string
 *     }>,
 *     timestamps?: bool,
 *     softDeletes?: bool,
 *     primaryKey?: string,
 *     incrementing?: bool
 * }
 * @phpstan-type ModelOptions array{
 *     class_name?: string,
 *     namespace?: string,
 *     base_class?: class-string|null,
 *     with_soft_deletes?: bool,
 *     with_validation?: bool,
 *     with_relationships?: bool
 * }
 */
class ModelGeneratorService implements ModelGeneratorServiceContract
{
    private Connection $connection;

    private SchemaBuilder $schema;

    /**
     * Create a new model generator service instance.
     *
     * @throws ModelGeneratorException If database connection cannot be established
     */
    public function __construct(
        private readonly ModelGeneratorTemplateEngine $templateEngine
    ) {
        try {
            $this->connection = DB::connection();
            $this->schema = $this->connection->getSchemaBuilder();
        } catch (Throwable $throwable) {
            throw new ModelGeneratorException(
                'Failed to establish database connection: '.$throwable->getMessage(),
                previous: $throwable
            );
        }
    }

    /**
     * Generate a model for a given table
     *
     * @param  ModelOptions  $options
     *
     * @throws ModelGeneratorException If table does not exist or schema analysis fails
     */
    public function generateModel(string $table, array $options = []): ModelDefinition
    {
        if (! $this->schema->hasTable($table)) {
            throw new ModelGeneratorException(sprintf("Table '%s' does not exist", $table));
        }

        try {
            /** @var SchemaDefinition $schema */
            $schema = $this->analyzeTable($table);

            if (! isset($schema['columns']) || empty($schema['columns'])) {
                throw new ModelGeneratorException(sprintf("No columns found for table '%s'", $table));
            }

            // Convert schema columns to Column objects
            /** @var Collection<int, Column> */
            $columns = Collection::make($schema['columns'])->map(function (array $definition, string $name): Column {
                if (! isset($definition['type'])) {
                    throw new ModelGeneratorException(sprintf("Column '%s' is missing required 'type' property", $name));
                }

                return new Column(
                    name: $name,
                    type: $definition['type'],
                    isPrimary: $definition['primary'] ?? false,
                    isAutoIncrement: $definition['autoIncrement'] ?? false,
                    isNullable: $definition['nullable'] ?? false,
                    isUnique: $definition['unique'] ?? false,
                    default: $definition['default'] ?? null,
                    length: $definition['length'] ?? null,
                    enumValues: $definition['allowed'] ?? null
                );
            });

            // Convert schema relations to RelationDefinition objects
            /** @var Collection<int, RelationDefinition> */
            $relations = Collection::make($schema['relations'] ?? [])->map(function (array $definition, string $name): RelationDefinition {
                if (! isset($definition['type'])) {
                    throw new ModelGeneratorException(sprintf("Relation '%s' is missing required 'type' property", $name));
                }

                return new RelationDefinition(
                    name: $name,
                    type: $definition['type'],
                    model: $definition['model'] ?? null,
                    foreignKey: $definition['foreignKey'] ?? null,
                    localKey: $definition['localKey'] ?? null,
                    morphType: $definition['morphType'] ?? null
                );
            });

            $className = $options['class_name'] ?? Str::studly(Str::singular($table));
            $namespace = $options['namespace'] ?? 'App\\Models';
            /** @var class-string */
            $baseClass = $options['base_class'] ?? GeneratedModel::class;

            return new ModelDefinition(
                className: $className,
                namespace: $namespace,
                columns: $columns,
                relations: $relations,
                baseClass: $baseClass,
                withSoftDeletes: $options['with_soft_deletes'] ?? false,
                withValidation: $options['with_validation'] ?? true,
                withRelationships: $options['with_relationships'] ?? true,
                table: $table
            );
        } catch (Throwable $throwable) {
            throw new ModelGeneratorException(
                sprintf("Failed to generate model for table '%s': ", $table).$throwable->getMessage(),
                previous: $throwable
            );
        }
    }

    /**
     * Generate models for multiple tables
     *
     * @param  array<string>  $tables
     * @param  ModelOptions  $config
     * @return array<ModelDefinition>
     *
     * @throws ModelGeneratorException If any model generation fails
     */
    public function generateBatch(array $tables, array $config = []): array
    {
        $models = [];
        foreach ($tables as $table) {
            try {
                $models[] = $this->generateModel($table, $config);
            } catch (ModelGeneratorException $e) {
                throw new ModelGeneratorException(
                    sprintf("Failed to generate model for table '%s': ", $table).$e->getMessage(),
                    previous: $e
                );
            }
        }

        return $models;
    }

    /**
     * Get all available tables
     *
     * @return array<string>
     *
     * @throws ModelGeneratorException If table list cannot be retrieved
     */
    public function getTables(): array
    {
        try {
            /** @var array<string> */
            $tables = $this->schema->getAllTables();
            if ($tables === null) {
                throw new ModelGeneratorException('Failed to retrieve table list: getAllTables() returned null');
            }

            return $tables;
        } catch (Throwable $throwable) {
            throw new ModelGeneratorException(
                'Failed to retrieve table list: '.$throwable->getMessage(),
                previous: $throwable
            );
        }
    }

    /**
     * Get the schema for a table
     *
     * @return SchemaDefinition
     *
     * @throws ModelGeneratorException If schema analysis fails
     */
    public function getTableSchema(string $table): array
    {
        if (! $this->schema->hasTable($table)) {
            throw new ModelGeneratorException(sprintf("Table '%s' does not exist", $table));
        }

        try {
            /** @var SchemaDefinition */
            $schema = $this->analyzeTable($table);
            if (! isset($schema['columns'])) {
                throw new ModelGeneratorException(sprintf("Invalid schema for table '%s': missing columns", $table));
            }

            return $schema;
        } catch (Throwable $throwable) {
            throw new ModelGeneratorException(
                sprintf("Failed to analyze schema for table '%s': ", $table).$throwable->getMessage(),
                previous: $throwable
            );
        }
    }

    /**
     * Generate a model from the given schema.
     *
     * @param  SchemaDefinition  $schema
     *
     * @throws ModelGeneratorException
     */
    public function generate(ModelDefinition $definition, array $schema): GeneratedModel
    {
        try {
            $this->validateSchema($schema);

            if ($definition->getClassName() === '0') {
                throw new ModelGeneratorException('Model class name is required');
            }

            if ($definition->getNamespace() === '0') {
                throw new ModelGeneratorException('Model namespace is required');
            }

            $content = $this->templateEngine->render($definition, $schema);
            if ($content === '' || $content === '0') {
                throw new ModelGeneratorException('Failed to generate model content');
            }

            $model = new GeneratedModel(
                className: $definition->getClassName(),
                namespace: $definition->getNamespace(),
                tableName: $definition->getTableName(),
                baseClass: $definition->getBaseClass(),
                content: $content
            );

            $this->saveModel($model);

            return $model;
        } catch (Throwable $throwable) {
            throw new ModelGeneratorException(
                sprintf('Failed to generate model %s: %s', $definition->getClassName(), $throwable->getMessage()),
                previous: $throwable
            );
        }
    }

    /**
     * Validate the schema structure
     *
     * @param  SchemaDefinition  $schema
     *
     * @throws ModelGeneratorException
     */
    private function validateSchema(array $schema): void
    {
        if (! is_array($schema) || ! isset($schema['columns']) || ! is_array($schema['columns'])) {
            throw new ModelGeneratorException('Invalid schema structure');
        }

        foreach ($schema['columns'] as $column => $definition) {
            if (! is_array($definition) || ! isset($definition['type']) || ! is_string($definition['type']) || empty($definition['type'])) {
                throw new ModelGeneratorException(sprintf("Invalid column definition for '%s'", $column));
            }
        }
    }

    /**
     * Analyze a database table schema.
     *
     * @return SchemaDefinition
     *
     * @throws ModelGeneratorException
     */
    private function analyzeTable(string $table): array
    {
        try {
            $columns = $this->schema->getColumnListing($table);
            /** @var array<string, array<string, mixed>> $columnDefinitions */
            $columnDefinitions = [];

            foreach ($columns as $column) {
                if (is_string($column)) {
                    $columnDefinition = $this->analyzeColumn($table, $column);
                    $columnDefinitions[$column] = $columnDefinition;
                }
            }

            /** @var array<string, array{type: 'primary'|'unique'|'index'|'fulltext'|'spatial', columns: array<string>, name?: string, algorithm?: string, options?: array<string, mixed>}> $indexes */
            $indexes = method_exists($this->schema, 'getIndexes') ? $this->schema->getIndexes($table) : [];

            /** @var array<string, array{table: string, columns: array<string, string>, onDelete?: string, onUpdate?: string}> $foreignKeys */
            $foreignKeys = method_exists($this->schema, 'getForeignKeys') ? $this->schema->getForeignKeys($table) : [];

            return [
                'columns' => $columnDefinitions,
                'indexes' => $indexes,
                'foreignKeys' => $foreignKeys,
                'timestamps' => false,
                'softDeletes' => false,
                'primaryKey' => 'id',
                'incrementing' => true,
            ];
        } catch (Throwable $throwable) {
            throw new ModelGeneratorException(
                sprintf("Failed to analyze table '%s': ", $table).$throwable->getMessage(),
                previous: $throwable
            );
        }
    }

    /**
     * Analyze a single column
     *
     * @return ColumnDefinition
     */
    private function analyzeColumn(string $table, string $column): array
    {
        /** @var non-empty-string */
        $type = $this->schema->getColumnType($table, $column);

        /** @var ColumnDefinition */
        $columnDefinition = [
            'type' => $type,
            'nullable' => false,
            'primary' => false,
            'unique' => false,
            'autoIncrement' => false,
        ];

        try {
            $doctrineColumn = $this->connection->getDoctrineColumn($table, $column);
            if ($doctrineColumn !== null) {
                $columnDefinition['nullable'] = ! $doctrineColumn->getNotnull();
                $columnDefinition['default'] = $doctrineColumn->getDefault();
                $columnDefinition['length'] = $doctrineColumn->getLength() ?: null;
                $columnDefinition['unsigned'] = (bool) $doctrineColumn->getUnsigned();
                $columnDefinition['autoIncrement'] = (bool) $doctrineColumn->getAutoincrement();
                $comment = $doctrineColumn->getComment();
                if ($comment !== null && $comment !== '') {
                    $columnDefinition['comment'] = $comment;
                }
            }
        } catch (Exception) {
            // Fallback to basic column information if Doctrine column info is not available
        }

        return $columnDefinition;
    }

    /**
     * Save the generated model to disk.
     *
     * @throws ModelGeneratorException
     */
    private function saveModel(GeneratedModel $model): void
    {
        $path = $this->getModelPath($model->getNamespace(), $model->getClassName());
        $directory = dirname($path);

        if (! File::exists($directory) && ! File::makeDirectory($directory, 0755, true)) {
            throw new ModelGeneratorException(
                'Failed to create directory '.$directory
            );
        }

        if (! File::put($path, $model->getContent())) {
            throw new ModelGeneratorException(
                'Failed to write model to '.$path
            );
        }
    }

    /**
     * Get the full path for a model.
     */
    private function getModelPath(string $namespace, string $className): string
    {
        $relativePath = str_replace('\\', '/', $namespace);

        return app_path($relativePath.'/'.$className.'.php');
    }
}
