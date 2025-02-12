<?php

namespace SAC\EloquentModelGenerator\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use SAC\EloquentModelGenerator\Services\ModelGeneratorService;

class ProcessModelChunkJob implements ShouldQueue {
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private array $tables;
    private ModelGeneratorService $generator;

    public function __construct(array $tables, ModelGeneratorService $generator) {
        $this->tables = $tables;
        $this->generator = $generator;
    }

    public function handle(): void {
        foreach ($this->tables as $table) {
            $this->generator->generateModel($table);
        }
    }
}
