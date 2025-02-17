<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Subscribers;

use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Support\Facades\Log;
use SAC\EloquentModelGenerator\Events\ModelGenerationStarted;
use SAC\EloquentModelGenerator\Events\ModelGenerated;
use SAC\EloquentModelGenerator\Events\ModelAnalyzed;
use SAC\EloquentModelGenerator\Jobs\AnalyzeModelJob;

final class ModelGenerationSubscriber
{
    public function handleGenerationStarted(ModelGenerationStarted $event): void
    {
        Log::info(
            "Starting model generation",
            [
                'table' => $event->table(),
                'options' => $event->options(),
            ]
        );
    }

    public function handleModelGenerated(ModelGenerated $event): void
    {
        Log::info(
            "Model generated successfully",
            [
                'model' => $event->model()->getName(),
                'path' => $event->path(),
            ]
        );

        AnalyzeModelJob::dispatch($event->model());
    }

    public function handleModelAnalyzed(ModelAnalyzed $event): void
    {
        Log::info(
            "Model analysis completed",
            [
                'results' => $event->results(),
            ]
        );
    }

    public function subscribe($events): array
    {
        return [
            ModelGenerationStarted::class => 'handleGenerationStarted',
            ModelGenerated::class => 'handleModelGenerated',
            ModelAnalyzed::class => 'handleModelAnalyzed',
        ];
    }
}
