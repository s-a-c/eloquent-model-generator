<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use SAC\EloquentModelGenerator\Contracts\ModelGeneratorInterface;
use SAC\EloquentModelGenerator\Events\ModelGenerationProgressEvent;
use Throwable;

/**
 * Job for generating Eloquent models.
 */
final class GenerateModelJob implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    /**
     * The number of times the job may be attempted.
     */
    public int $tries;

    /**
     * The number of seconds to wait before retrying the job.
     */
    public int $backoff;

    /**
     * The number of seconds the job can run before timing out.
     */
    public int $timeout;

    /**
     * The job priority.
     */
    public int $priority;

    public function __construct(
        public readonly array $tables,
        public readonly array $options = [],
    ) {
        $this->tries = config('model-generator.queue.retries', 3);
        $this->backoff = config('model-generator.queue.retry_delay', 5);
        $this->timeout = config('model-generator.queue.timeout', 60);
        $this->priority = config('model-generator.queue.priority', 0);
    }

    /**
     * Execute the job.
     */
    public function handle(ModelGeneratorInterface $generator): void
    {
        $total = count($this->tables);
        $current = 0;

        foreach ($this->tables as $table) {
            $current++;

            try {
                $result = $generator->generate([$table], $this->options);

                event(new ModelGenerationProgressEvent(
                    table: $table,
                    current: $current,
                    total: $total,
                    isComplete: $current === $total,
                    result: $result,
                ));
            } catch (Throwable $e) {
                if (! ($this->options['continue_on_error'] ?? false)) {
                    throw $e;
                }

                event(new ModelGenerationProgressEvent(
                    table: $table,
                    current: $current,
                    total: $total,
                    isComplete: false,
                    error: $e->getMessage(),
                ));
            }
        }
    }

    /**
     * Handle a job failure.
     */
    public function failed(Throwable $exception): void
    {
        event(new ModelGenerationProgressEvent(
            table: implode(', ', $this->tables),
            current: 0,
            total: count($this->tables),
            isComplete: false,
            error: $exception->getMessage(),
        ));
    }
}
