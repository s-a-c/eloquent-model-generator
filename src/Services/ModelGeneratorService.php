<?php

namespace SAC\EloquentModelGenerator\Services;

use SAC\EloquentModelGenerator\Models\GeneratedModel;
use SAC\EloquentModelGenerator\ValueObjects\ModelDefinition;
use SAC\EloquentModelGenerator\Contracts\ModelGeneratorService as ModelGeneratorServiceContract;
use Illuminate\Support\Facades\{DB, File, Schema};
use Illuminate\Support\Str;
use SAC\EloquentModelGenerator\Exceptions\ModelGeneratorException;
use SAC\EloquentModelGenerator\Services\ModelGeneratorTemplateEngine;

class ModelGeneratorService implements ModelGeneratorServiceContract {
    /**
     * Create a new model generator service instance.
     */
    public function __construct(
        private readonly ModelGeneratorTemplateEngine $templateEngine
    ) {
    }

    /**
     * Generate a model for a given table
     *
     * @param string $table
     * @param array $options
     * @return ModelDefinition
     */
    public function generateModel(string $table, array $options = []): ModelDefinition {
        $schema = $this->analyzeTable($table);

        return new ModelDefinition(
            className: $options['class_name'] ?? Str::studly(Str::singular($table)),
            namespace: $options['namespace'] ?? 'App\\Models',
            tableName: $table,
            baseClass: $options['base_class'] ?? 'Illuminate\\Database\\Eloquent\\Model',
            withSoftDeletes: $options['with_soft_deletes'] ?? false,
            withValidation: $options['with_validation'] ?? false,
            withRelationships: $options['with_relationships'] ?? true
        );
    }

    /**
     * Generate models for multiple tables
     *
     * @param array $tables
     * @param array $config
     * @return array<ModelDefinition>
     */
    public function generateBatch(array $tables, array $config = []): array {
        $models = [];

        foreach ($tables as $table) {
            $models[] = $this->generateModel($table, $config);
        }

        return $models;
    }

    /**
     * Get all available tables
     *
     * @return array<string>
     */
    public function getTables(): array {
        return Schema::getConnection()->getDoctrineSchemaManager()->listTableNames();
    }

    /**
     * Generate a model from the given schema.
     *
     * @param ModelDefinition $definition
     * @param array<string, mixed> $schema
     * @return GeneratedModel
     * @throws ModelGeneratorException
     */
    public function generate(ModelDefinition $definition, array $schema): GeneratedModel {
        try {
            $content = $this->templateEngine->render($definition, $schema);

            $model = new GeneratedModel(
                className: $definition->getClassName(),
                namespace: $definition->getNamespace(),
                tableName: $definition->getTableName(),
                baseClass: $definition->getBaseClass(),
                content: $content
            );

            $this->saveModel($model);

            return $model;
        } catch (\Throwable $e) {
            throw new ModelGeneratorException(
                "Failed to generate model {$definition->getClassName()}: {$e->getMessage()}",
                previous: $e
            );
        }
    }

    /**
     * Analyze a database table schema.
     *
     * @param string $table
     * @return array<string, mixed>
     */
    private function analyzeTable(string $table): array {
        $columns = Schema::getColumnListing($table);
        $schema = ['columns' => []];

        foreach ($columns as $column) {
            $type = Schema::getColumnType($table, $column);
            $schema['columns'][$column] = [
                'type' => $type,
                'nullable' => !Schema::getConnection()
                    ->getDoctrineColumn($table, $column)
                    ->getNotnull(),
            ];
        }

        return $schema;
    }

    /**
     * Save the generated model to disk.
     *
     * @param GeneratedModel $model
     * @return void
     * @throws ModelGeneratorException
     */
    private function saveModel(GeneratedModel $model): void {
        $path = $this->getModelPath($model->getNamespace(), $model->getClassName());
        $directory = dirname($path);

        if (!File::exists($directory)) {
            if (!File::makeDirectory($directory, 0755, true)) {
                throw new ModelGeneratorException(
                    "Failed to create directory {$directory}"
                );
            }
        }

        if (!File::put($path, $model->getContent())) {
            throw new ModelGeneratorException(
                "Failed to write model to {$path}"
            );
        }
    }

    /**
     * Get the full path for a model.
     *
     * @param string $namespace
     * @param string $className
     * @return string
     */
    private function getModelPath(string $namespace, string $className): string {
        $relativePath = str_replace('\\', '/', $namespace);
        return app_path($relativePath . '/' . $className . '.php');
    }
}
