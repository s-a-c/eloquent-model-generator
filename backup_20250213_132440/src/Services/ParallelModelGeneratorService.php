<?php

namespace SAC\EloquentModelGenerator\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Str;
use SAC\EloquentModelGenerator\Contracts\ModelGenerator;
use SAC\EloquentModelGenerator\Contracts\SchemaAnalyzer;
use SAC\EloquentModelGenerator\Jobs\GenerateModelJob;
use SAC\EloquentModelGenerator\Models\GeneratedModel;
use SAC\EloquentModelGenerator\ValueObjects\ModelDefinition;

class ParallelModelGeneratorService implements ModelGeneratorServiceInterface
{
    private readonly SchemaAnalyzer $schemaAnalyzer;

    private readonly ModelGenerator $modelGenerator;

    /**
     * Create a new parallel model generator service instance.
     */
    public function __construct(
        SchemaAnalyzer $schemaAnalyzer,
        ModelGenerator $modelGenerator
    ) {
        $this->schemaAnalyzer = $schemaAnalyzer;
        $this->modelGenerator = $modelGenerator;
    }

    /**
     * Generate models in parallel.
     *
     * @param  array<string>  $tables
     * @param  array<string, mixed>  $config
     * @return array<GeneratedModel>
     */
    public function generateModels(array $tables, array $config = []): array
    {
        $jobs = Collection::make($tables)
            ->map(fn (string $table) => new GenerateModelJob($table, $config))
            ->toArray();

        $batch = Bus::batch($jobs)
            ->allowFailures()
            ->dispatch();

        return Collection::make($batch->jobs)
            ->map(fn ($job) => $job->result)
            ->filter()
            ->toArray();
    }

    /**
     * Get all available tables.
     *
     * @return array<string>
     */
    public function getTables(): array
    {
        return $this->schemaAnalyzer->getTables();
    }

    /**
     * Generate a single model.
     *
     * @param  array<string, mixed>  $config
     */
    public function generateModel(string $table, array $config = []): GeneratedModel
    {
        $definition = new ModelDefinition(
            className: $this->getClassName($table),
            namespace: $config['namespace'] ?? 'App\\Models',
            tableName: $table,
            baseClass: $config['base_class'] ?? 'Illuminate\\Database\\Eloquent\\Model',
            withSoftDeletes: $config['with_soft_deletes'] ?? false,
            withValidation: $config['with_validation'] ?? false,
            withRelationships: $config['with_relationships'] ?? true
        );

        $schema = $this->schemaAnalyzer->analyze($table);

        return $this->modelGenerator->generate($definition, $schema);
    }

    /**
     * Get the class name for a table.
     */
    protected function getClassName(string $table): string
    {
        return Str::studly(Str::singular($table));
    }
}
