<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Exceptions;

use RuntimeException;
use Throwable;

/**
 * @final
 */
class CodeGenerationException extends RuntimeException
{
    /**
     * @param  array<string, mixed>|null  $context
     */
    public function __construct(
        string $message,
        private readonly string $table,
        private readonly ?string $template = null,
        int $code = 0,
        ?Throwable $previous = null,
        private ?array $context = null,
    ) {
        parent::__construct($message, $code, $previous);
    }

    /**
     * Create from template error.
     */
    public static function templateError(
        string $table,
        string $template,
        string $reason
    ): self {
        return new self(
            message: "Template error for table {$table}: {$reason}",
            table: $table,
            template: $template,
            context: [
                'reason' => $reason,
            ],
        );
    }

    /**
     * Create from invalid variable.
     */
    public static function invalidVariable(
        string $table,
        string $variable,
        mixed $value
    ): self {
        return new self(
            message: "Invalid template variable {$variable} for table {$table}",
            table: $table,
            context: [
                'variable' => $variable,
                'value' => $value,
            ],
        );
    }

    /**
     * Create from syntax error.
     */
    public static function syntaxError(
        string $table,
        string $code,
        string $error
    ): self {
        return new self(
            message: "Syntax error in generated code for table {$table}: {$error}",
            table: $table,
            context: [
                'code' => $code,
                'error' => $error,
            ],
        );
    }

    /**
     * Create from file error.
     */
    public static function fileError(
        string $table,
        string $path,
        string $reason
    ): self {
        return new self(
            message: "File error for table {$table}: {$reason}",
            table: $table,
            context: [
                'path' => $path,
                'reason' => $reason,
            ],
        );
    }

    /**
     * Get table name.
     */
    public function getTable(): string
    {
        return $this->table;
    }

    /**
     * Get template name.
     */
    public function getTemplate(): ?string
    {
        return $this->template;
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
