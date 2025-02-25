<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator;

use Illuminate\Support\Str;
use RuntimeException;
use SAC\EloquentModelGenerator\Contracts\CodeGeneratorInterface;
use SAC\EloquentModelGenerator\Contracts\ModelGeneratorInterface;
use SAC\EloquentModelGenerator\Contracts\RelationshipResolverInterface;
use SAC\EloquentModelGenerator\Contracts\SchemaAnalyzerInterface;
use SAC\EloquentModelGenerator\Domain\ValueObjects\GenerationResult;
use SAC\EloquentModelGenerator\Domain\ValueObjects\TableDefinition;
use SAC\EloquentModelGenerator\Exceptions\ModelGenerationException;
use Throwable;

/**
 * @template TResult of GenerationResult
 *
 * @implements ModelGeneratorInterface<TResult>
 */
final class ModelGenerator implements ModelGeneratorInterface
{
    public function __construct(
        private readonly SchemaAnalyzerInterface $analyzer,
        private readonly RelationshipResolverInterface $resolver,
        private readonly CodeGeneratorInterface $generator,
    ) {}

    /**
     * Generate Eloquent models for the specified tables.
     *
     * @param  array<string>  $tables
     * @param  array<string, mixed>  $options
     * @return TResult
     *
     * @throws ModelGenerationException
     */
    public function generate(array $tables, array $options = []): GenerationResult
    {
        try {
            if (! $this->validateConfiguration($options)) {
                throw new ModelGenerationException('Invalid configuration options');
            }

            $definitions = $this->analyzeTables();
            $selectedDefinitions = array_intersect_key(
                $definitions,
                array_flip($tables)
            );

            if (empty($selectedDefinitions)) {
                throw new ModelGenerationException('No valid tables selected');
            }

            $relationships = $this->resolver->resolve($selectedDefinitions);

            $generatedFiles = [];
            $errors = [];

            foreach ($selectedDefinitions as $table => $definition) {
                try {
                    $code = $this->generator->generate(
                        definition: $definition,
                        relationships: $relationships[$table] ?? [],
                        options: $options,
                    );

                    $filePath = $this->writeModelFile($definition, $code);
                    $generatedFiles[] = $filePath;
                } catch (Throwable $e) {
                    $errors[$table] = $e->getMessage();
                }
            }

            return new GenerationResult(
                generatedFiles: $generatedFiles,
                errors: $errors,
                metadata: [
                    'tableCount' => count($tables),
                    'successCount' => count($generatedFiles),
                    'errorCount' => count($errors),
                    'options' => $options,
                ],
            );
        } catch (Throwable $e) {
            throw new ModelGenerationException(
                message: 'Failed to generate models',
                code: 0,
                previous: $e,
            );
        }
    }

    /**
     * Analyze all database tables.
     *
     * @return array<string, TableDefinition>
     *
     * @throws ModelGenerationException
     */
    public function analyzeTables(): array
    {
        try {
            $tables = $this->analyzer->getTables();
            $definitions = [];

            foreach ($tables as $table) {
                $definitions[$table] = $this->analyzer->analyze($table);
            }

            return $definitions;
        } catch (Throwable $e) {
            throw new ModelGenerationException(
                message: 'Failed to analyze tables',
                code: 0,
                previous: $e,
            );
        }
    }

    /**
     * Validate configuration options.
     *
     * @param  array<string, mixed>  $options
     */
    public function validateConfiguration(array $options): bool
    {
        $requiredOptions = [
            'namespace' => 'string',
            'path' => 'string',
        ];

        foreach ($requiredOptions as $option => $type) {
            if (! isset($options[$option])) {
                return false;
            }

            if (gettype($options[$option]) !== $type) {
                return false;
            }
        }

        $validOptions = [
            'namespace',
            'path',
            'base_class',
            'timestamps',
            'soft_deletes',
            'fillable',
            'guarded',
            'casts',
            'dates',
            'with',
            'table_prefix',
            'connection',
        ];

        foreach ($options as $key => $_) {
            if (! in_array($key, $validOptions, true)) {
                return false;
            }
        }

        return true;
    }

    /**
     * Write model code to file.
     *
     * @throws ModelGenerationException
     */
    private function writeModelFile(TableDefinition $definition, string $code): string
    {
        try {
            $filePath = $this->getModelFilePath($definition);
            $directory = dirname($filePath);

            if (! is_dir($directory)) {
                mkdir($directory, 0755, true);
            }

            if (file_put_contents($filePath, $code) === false) {
                throw new RuntimeException("Failed to write file: {$filePath}");
            }

            return $filePath;
        } catch (Throwable $e) {
            throw new ModelGenerationException(
                message: "Failed to write model file for table: {$definition->name}",
                code: 0,
                previous: $e,
            );
        }
    }

    /**
     * Get the file path for a model.
     */
    private function getModelFilePath(TableDefinition $definition): string
    {
        $basePath = config('model-generator.path', 'app/Models');
        $className = $this->getClassName($definition->name);

        return sprintf(
            '%s/%s.php',
            mb_rtrim($basePath, '/'),
            $className,
        );
    }

    /**
     * Get the class name for a table.
     */
    private function getClassName(string $table): string
    {
        return str_replace(
            ' ',
            '',
            ucwords(
                str_replace(
                    ['_', '-'],
                    ' ',
                    Str::singular($table),
                ),
            ),
        );
    }
}
