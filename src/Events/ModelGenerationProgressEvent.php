<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Events;

use SAC\EloquentModelGenerator\Domain\ValueObjects\GenerationResult;

/**
 * Event for tracking model generation progress.
 */
final readonly class ModelGenerationProgressEvent
{
    public function __construct(
        public string $table,
        public int $current,
        public int $total,
        public bool $isComplete,
        public ?GenerationResult $result = null,
        public ?string $error = null,
    ) {}

    /**
     * Get the progress percentage.
     */
    public function getProgress(): float
    {
        return ($this->current / $this->total) * 100;
    }

    /**
     * Check if the generation was successful.
     */
    public function isSuccessful(): bool
    {
        return $this->error === null;
    }

    /**
     * Get the generation result if available.
     */
    public function getResult(): ?GenerationResult
    {
        return $this->result;
    }

    /**
     * Get the error message if any.
     */
    public function getError(): ?string
    {
        return $this->error;
    }

    /**
     * Get the remaining tables count.
     */
    public function getRemainingCount(): int
    {
        return $this->total - $this->current;
    }

    /**
     * Get the event name.
     */
    public function getName(): string
    {
        return 'model.generation.progress';
    }

    /**
     * Get the event description.
     */
    public function getDescription(): string
    {
        if ($this->isComplete) {
            return "Completed generating model for table '{$this->table}'";
        }

        if ($this->error) {
            return "Failed to generate model for table '{$this->table}': {$this->error}";
        }

        return "Generating model for table '{$this->table}' ({$this->current}/{$this->total})";
    }

    /**
     * Get the event metadata.
     *
     * @return array<string, mixed>
     */
    public function getMetadata(): array
    {
        return [
            'table' => $this->table,
            'current' => $this->current,
            'total' => $this->total,
            'progress' => $this->getProgress(),
            'remaining' => $this->getRemainingCount(),
            'is_complete' => $this->isComplete,
            'is_successful' => $this->isSuccessful(),
            'error' => $this->error,
            'result' => $this->result?->toArray(),
        ];
    }
}
