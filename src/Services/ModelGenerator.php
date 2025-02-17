<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Services;

use Illuminate\Support\Str;
use RuntimeException;
use SAC\EloquentModelGenerator\Contracts\ModelGeneratorService;
use SAC\EloquentModelGenerator\Model\ModelDefinition;
use SAC\EloquentModelGenerator\Domain\Model\SchemaDefinition;
use SAC\EloquentModelGenerator\Domain\Service\ModelTemplateService;
use SAC\EloquentModelGenerator\Events\ModelGenerationStarted;
use SAC\EloquentModelGenerator\Events\ModelGenerated;
use SAC\EloquentModelGenerator\Exceptions\ModelGeneratorException;

class ModelGenerator implements ModelGeneratorService
{
    private readonly ModelTemplateService $templateService;

    public function __construct()
    {
        $this->templateService = new ModelTemplateService();
    }

    /**
     * Generate a model from a table name.
     *
     * @param  array<string, mixed>  $options
     *
     * @throws ModelGeneratorException
     */
    public function generateModel(string $table, array $options = []): ModelDefinition
    {
        // Dispatch model generation started event
        event(ModelGenerationStarted::create($table, $options));

        try {
            $schema = $this->getTableSchema($table);

            // Create schema definition
            $schemaDefinition = new SchemaDefinition(
                $table,
                $schema['columns'],
                $schema['indexes'] ?? [],
                $schema['foreignKeys'] ?? []
            );

            // Create model definition from schema
            $model = ModelDefinition::fromSchema(
                $schemaDefinition,
                $options['namespace'] ?? 'App\\Models'
            );

            // Generate the model file
            $content = $this->templateService->generateContent($model);
            $path = $this->getModelPath($model);

            // Ensure directory exists
            $directory = dirname($path);
            if (!is_dir($directory)) {
                mkdir($directory, 0755, true);
            }

            // Write the file
            file_put_contents($path, $content);

            // Dispatch model generated event
            event(ModelGenerated::create($model, $path));

            return $model;
        } catch (\Exception $e) {
            throw new ModelGeneratorException(
                sprintf("Failed to generate model for table '%s': ", $table).$e->getMessage(),
                0,
                $e
            );
        }
    }

    /**
     * Generate models for multiple tables.
     *
     * @param  array<string>  $tables
     * @param  array<string, mixed>  $config
     * @return array<int, ModelDefinition>
     *
     * @throws ModelGeneratorException
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
                    0,
                    $e
                );
            }
        }

        return $models;
    }

    /**
     * Get all available tables.
     *
     * @return array<string>
     */
    public function getTables(): array
    {
        return [];  // This should be implemented by concrete classes
    }

    /**
     * Get the schema for a table.
     *
     * @return array{
     *     columns: array<string, array{
     *         type: string,
     *         nullable: bool,
     *         default?: mixed,
     *         length?: int|null,
     *         unsigned?: bool,
     *         autoIncrement?: bool,
     *         primary?: bool,
     *         unique?: bool
     *     }>,
     *     indexes?: array<string, array{
     *         type: string,
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
     *     }>
     * }
     */
    public function getTableSchema(string $table): array
    {
        // Implementation should be provided by concrete classes
        throw new RuntimeException('Method getTableSchema() must be implemented by concrete classes.');
    }

    /**
     * Get the path where the model will be generated.
     */
    private function getModelPath(ModelDefinition $model): string
    {
        $path = str_replace('\\', '/', $model->getNamespace());
        return app_path($path . '/' . $model->getName() . '.php');
    }
}
