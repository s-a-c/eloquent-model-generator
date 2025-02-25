<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Domain\ValueObjects;

/**
 * @immutable
 */
final class GenerationResult
{
    /**
     * @param  array<string>  $generatedFiles
     * @param  array<string, string>  $errors
     * @param  array<string, mixed>  $metadata
     */
    public function __construct(
        public readonly array $generatedFiles = [],
        public readonly array $errors = [],
        public readonly array $metadata = [],
    ) {}

    /**
     * Create error result.
     *
     * @param  array<string, mixed>  $metadata
     */
    public static function createError(
        string $message,
        string $table,
        array $metadata = []
    ): self {
        return new self(
            errors: [$table => $message],
            metadata: $metadata,
        );
    }

    /**
     * Create success result.
     *
     * @param  array<string>  $files
     * @param  array<string, mixed>  $metadata
     */
    public static function createSuccess(
        array $files,
        array $metadata = []
    ): self {
        return new self(
            generatedFiles: $files,
            metadata: $metadata,
        );
    }

    /**
     * Check if generation was successful.
     */
    public function isSuccessful(): bool
    {
        return empty($this->errors);
    }

    /**
     * Get number of generated files.
     */
    public function getGeneratedCount(): int
    {
        return count($this->generatedFiles);
    }

    /**
     * Get number of errors.
     */
    public function getErrorCount(): int
    {
        return count($this->errors);
    }

    /**
     * Get error messages.
     *
     * @return array<string>
     */
    public function getErrorMessages(): array
    {
        return array_values($this->errors);
    }

    /**
     * Get errors by table.
     *
     * @return array<string, string>
     */
    public function getErrorsByTable(): array
    {
        return $this->errors;
    }

    /**
     * Get metadata value.
     *
     * @template T
     *
     * @param  T  $default
     * @return T
     */
    public function getMetadata(string $key, mixed $default = null): mixed
    {
        return $this->metadata[$key] ?? $default;
    }

    /**
     * Has metadata key.
     */
    public function hasMetadata(string $key): bool
    {
        return array_key_exists($key, $this->metadata);
    }

    /**
     * Get all metadata.
     *
     * @return array<string, mixed>
     */
    public function getAllMetadata(): array
    {
        return $this->metadata;
    }

    /**
     * Get generation summary.
     *
     * @return array{
     *     success: bool,
     *     generated: int,
     *     errors: int,
     *     metadata: array<string, mixed>
     * }
     */
    public function getSummary(): array
    {
        return [
            'success' => $this->isSuccessful(),
            'generated' => $this->getGeneratedCount(),
            'errors' => $this->getErrorCount(),
            'metadata' => $this->metadata,
        ];
    }
}
