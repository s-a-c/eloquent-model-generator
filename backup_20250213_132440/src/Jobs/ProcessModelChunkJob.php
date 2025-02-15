<?php

namespace SAC\EloquentModelGenerator\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use SAC\EloquentModelGenerator\Services\ModelGeneratorService;
use SAC\EloquentModelGenerator\Support\Definitions\ModelDefinition;

class ProcessModelChunkJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var array<string>
     */
    private array $tables;

    /**
     * Create a new job instance.
     *
     * @param  array<string>  $tables
     * @param  array{class_name?: string, namespace?: string, base_class?: string, with_soft_deletes?: bool, with_validation?: bool, with_relationships?: bool}  $config
     */
    public function __construct(array $tables, private readonly array $config = [])
    {
        $this->tables = $tables;
    }

    /**
     * Execute the job.
     *
     * @return array<ModelDefinition>
     */
    public function handle(ModelGeneratorService $service): array
    {
        $models = [];
        foreach ($this->tables as $table) {
            $models[] = $service->generateModel($table, $this->config);
        }

        return $models;
    }
}
