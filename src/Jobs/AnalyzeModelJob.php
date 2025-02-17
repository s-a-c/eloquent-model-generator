<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use SAC\EloquentModelGenerator\Events\ModelAnalyzed;
use SAC\EloquentModelGenerator\Model\ModelDefinition;
use SAC\EloquentModelGenerator\Services\ModelAnalyzer;

final class AnalyzeModelJob implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public function __construct(
        private readonly ModelDefinition $model
    ) {}

    public function handle(ModelAnalyzer $analyzer): void
    {
        $results = $analyzer->analyze($this->model);
        event(ModelAnalyzed::create($results));
    }

    public function middleware(): array
    {
        return [new Middleware\RateLimitedJob()];
    }

    public function tags(): array
    {
        return ['model:analyze', $this->model->getName()];
    }

    public function retryUntil(): \DateTime
    {
        return now()->addHours(1);
    }
}
