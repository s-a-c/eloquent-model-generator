<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Services;

use SAC\EloquentModelGenerator\Config\ModelGeneratorConfig;
use SAC\EloquentModelGenerator\Contracts\ModelGeneratorInterface;
use SAC\EloquentModelGenerator\Domain\ValueObjects\GenerationResult;
use SAC\EloquentModelGenerator\Domain\ValueObjects\TableDefinition;
use SAC\EloquentModelGenerator\Exceptions\InvalidConfigurationException;
use SAC\EloquentModelGenerator\Exceptions\ModelGenerationException;
use SAC\EloquentModelGenerator\Services\Contracts\CodeGeneratorInterface;
use SAC\EloquentModelGenerator\Services\Contracts\RelationshipResolverInterface;
use SAC\EloquentModelGenerator\Services\Contracts\SchemaAnalyzerInterface;
use Throwable;

/**
 * Main service for generating Eloquent models.
 */
final readonly class ModelGenerator implements ModelGeneratorInterface
{
    public function __construct(
        private ModelGeneratorConfig $config,
        private SchemaAnalyzerInterface $analyzer,
        private RelationshipResolverInterface $resolver,
        private CodeGeneratorInterface $generator,
    ) {}

    public function generate(array $tables, array $options = []): GenerationResult
    {
        try {
            $results = [];
            $errors = [];
            $metadata = [
                'processed_tables' => 0,
                'generated_models' => 0,
                'generated_docs' => 0,
                'start_time' => microtime(true),
            ];

            // Validate configuration
            $this->validateConfiguration($options);

            // Process each table
            foreach ($tables as $table) {
                try {
                    if (! is_string($table)) {
                        throw new ModelGenerationException('Table name must be a string');
                    }

                    $metadata['processed_tables']++;

                    // Analyze table structure
                    $definition = $this->analyzer->analyzeTable($table);

                    // Resolve relationships
                    $relationships = $this->resolver->resolveRelationships($definition);
                    $definition = new TableDefinition(
                        name: $definition->name,
                        columns: $definition->columns,
                        indices: $definition->indices,
                        relationships: $relationships,
                        attributes: $definition->attributes,
                    );

                    // Generate model
                    $modelResult = $this->generator->generateModel($definition);
                    $results = [...$results, ...$modelResult->generatedFiles];
                    $metadata['generated_models']++;

                    // Generate documentation if requested
                    if ($options['with_docs'] ?? $this->config->get('generate_docs', true)) {
                        $docResult = $this->generator->generateDocumentation($definition);
                        $results = [...$results, ...$docResult->generatedFiles];
                        $metadata['generated_docs']++;
                    }
                } catch (Throwable $e) {
                    if (! ($options['continue_on_error'] ?? $this->config->get('error_handling.continue_on_error', false))) {
                        throw $e;
                    }
                    $errors[] = "Failed to process table '{$table}': {$e->getMessage()}";
                }
            }

            // Add completion metadata
            $metadata['end_time'] = microtime(true);
            $metadata['duration'] = $metadata['end_time'] - $metadata['start_time'];

            return new GenerationResult(
                generatedFiles: $results,
                errors: $errors,
                metadata: $metadata,
            );
        } catch (Throwable $e) {
            throw ModelGenerationException::forFailedGeneration(
                implode(', ', $tables),
                $e->getMessage(),
                $e
            );
        }
    }

    public function analyzeTables(array $tables = []): array
    {
        try {
            // If no tables specified, get all tables
            if (empty($tables)) {
                $tables = $this->analyzer->getTables();
            }

            $definitions = [];
            foreach ($tables as $table) {
                if (! is_string($table)) {
                    throw new ModelGenerationException('Table name must be a string');
                }

                // Skip excluded tables
                if (in_array($table, $this->config->get('schema.exclude_tables', []), true)) {
                    continue;
                }

                $definition = $this->analyzer->analyzeTable($table);
                $relationships = $this->resolver->resolveRelationships($definition);

                $definitions[] = new TableDefinition(
                    name: $definition->name,
                    columns: $definition->columns,
                    indices: $definition->indices,
                    relationships: $relationships,
                    attributes: $definition->attributes,
                );
            }

            return $definitions;
        } catch (Throwable $e) {
            throw ModelGenerationException::forFailedGeneration(
                implode(', ', $tables),
                "Failed to analyze tables: {$e->getMessage()}",
                $e
            );
        }
    }

    public function validateConfiguration(array $options): bool
    {
        $requiredOptions = [
            'namespace',
            'path',
            'base_class',
        ];

        foreach ($requiredOptions as $option) {
            if (! isset($options[$option]) && ! $this->config->has($option)) {
                throw InvalidConfigurationException::forMissingOption($option);
            }
        }

        // Validate database configuration
        if ($this->config->databaseDriver !== 'sqlite') {
            throw InvalidConfigurationException::forInvalidConfig(
                ['database_driver' => $this->config->databaseDriver],
                'Only SQLite database driver is supported'
            );
        }

        // Validate paths are writable
        $paths = [
            $options['path'] ?? $this->config->get('path'),
            $options['documentation_path'] ?? $this->config->get('documentation.output_path'),
        ];

        foreach ($paths as $path) {
            if (! is_dir($path) && ! mkdir($path, 0755, true)) {
                throw InvalidConfigurationException::forInvalidConfig(
                    ['path' => $path],
                    'Unable to create directory'
                );
            }

            if (! is_writable($path)) {
                throw InvalidConfigurationException::forInvalidConfig(
                    ['path' => $path],
                    'Directory is not writable'
                );
            }
        }

        return true;
    }
}
