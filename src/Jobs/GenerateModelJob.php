<?php

namespace SAC\EloquentModelGenerator\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use SAC\EloquentModelGenerator\Services\ModelGeneratorService;
use SAC\EloquentModelGenerator\Support\Definitions\ModelDefinition;

class GenerateModelJob implements ShouldQueue {
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;
    private ?ModelDefinition $result = null;

    /**
     * Create a new job instance.
     *
     * @param array{class_name?: string, namespace?: string, base_class?: string, with_soft_deletes?: bool, with_validation?: bool, with_relationships?: bool} $config
     */
    public function __construct(
        private readonly string $table,
        private readonly array $config
    ) {
    }

    /**
     * Execute the job.
     */
    public function handle(ModelGeneratorService $service): void {
        $this->result = $service->generateModel($this->table, $this->config);
    }

    /**
     * Get the generated model.
     */
    public function getResult(): ?ModelDefinition {
        return $this->result;
    }
}
