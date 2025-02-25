<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Exceptions;

use RuntimeException;
use Throwable;

/**
 * @final
 */
class ModelGenerationException extends RuntimeException
{
    /**
     * @param  array<string, mixed>|null  $context
     */
    public function __construct(
        string $message,
        int $code = 0,
        ?Throwable $previous = null,
        private ?array $context = null,
    ) {
        parent::__construct($message, $code, $previous);
    }

    /**
     * Create from configuration error.
     */
    public static function fromConfigurationError(string $option, mixed $value): self
    {
        return new self(
            message: "Invalid configuration option: {$option}",
            context: [
                'option' => $option,
                'value' => $value,
            ],
        );
    }

    /**
     * Create from table error.
     */
    public static function fromTableError(string $table, string $reason): self
    {
        return new self(
            message: "Error processing table {$table}: {$reason}",
            context: [
                'table' => $table,
                'reason' => $reason,
            ],
        );
    }

    /**
     * Create from file error.
     */
    public static function fromFileError(string $path, string $reason): self
    {
        return new self(
            message: "Error writing file {$path}: {$reason}",
            context: [
                'path' => $path,
                'reason' => $reason,
            ],
        );
    }

    /**
     * Get error context.
     *
     * @return array<string, mixed>|null
     */
    public function getContext(): ?array
    {
        return $this->context;
    }
}
