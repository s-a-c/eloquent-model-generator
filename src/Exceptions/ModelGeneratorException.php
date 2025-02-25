<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Exceptions;

use RuntimeException;
use Throwable;

/**
 * Base exception class for model generator errors.
 */
final class ModelGeneratorException extends RuntimeException
{
    /**
     * @param  array<string, mixed>  $context  Additional context about the error
     */
    public function __construct(
        string $message,
        int $code = 0,
        ?Throwable $previous = null,
        protected array $context = [],
    ) {
        parent::__construct($message, $code, $previous);
    }

    /**
     * Create an exception with context.
     *
     * @param  array<string, mixed>  $context
     */
    public static function withContext(string $message, array $context): self
    {
        return new self($message, context: $context);
    }

    /**
     * Get the error context.
     *
     * @return array<string, mixed>
     */
    public function getContext(): array
    {
        return $this->context;
    }
}

/**
 * Exception thrown when model generation fails.
 */
final class ModelGenerationException extends ModelGeneratorException
{
    /**
     * Create an exception for a failed model generation.
     */
    public static function forFailedGeneration(string $table, string $reason, ?Throwable $previous = null): self
    {
        return new self(
            "Failed to generate model for table '{$table}': {$reason}",
            previous: $previous,
            context: ['table' => $table],
        );
    }
}

/**
 * Exception thrown when schema analysis fails.
 */
final class SchemaAnalysisException extends ModelGeneratorException
{
    /**
     * Create an exception for a failed schema analysis.
     */
    public static function forFailedAnalysis(string $table, string $reason, ?Throwable $previous = null): self
    {
        return new self(
            "Failed to analyze table '{$table}': {$reason}",
            previous: $previous,
            context: ['table' => $table],
        );
    }
}

/**
 * Exception thrown when configuration validation fails.
 */
final class InvalidConfigurationException extends ModelGeneratorException
{
    /**
     * Create an exception for invalid configuration.
     *
     * @param  array<string, mixed>  $config
     */
    public static function forInvalidConfig(array $config, string $reason): self
    {
        return new self(
            "Invalid configuration: {$reason}",
            context: ['config' => $config],
        );
    }

    /**
     * Create an exception for a missing required configuration option.
     */
    public static function forMissingOption(string $option): self
    {
        return new self(
            "Missing required configuration option: {$option}",
            context: ['option' => $option],
        );
    }
}
