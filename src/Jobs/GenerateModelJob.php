<?php

namespace SAC\EloquentModelGenerator\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use SAC\EloquentModelGenerator\Services\ModelGeneratorService;
use SAC\EloquentModelGenerator\Models\GeneratedModel;

class GenerateModelJob implements ShouldQueue {
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * The generated model result.
     *
     * @var GeneratedModel|null
     */
    public ?GeneratedModel $result = null;

    /**
     * Create a new job instance.
     */
    public function __construct(
        private readonly string $table,
        private readonly array $config = []
    ) {
    }

    /**
     * Execute the job.
     */
    public function handle(ModelGeneratorService $service): void {
        $this->result = $service->generateModel($this->table, $this->config);
    }
}
