<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Exceptions;

use RuntimeException;
use Throwable;

/**
 * @final
 */
class SchemaAnalysisException extends RuntimeException
{
    /**
     * @param  array<string, mixed>|null  $context
     */
    public function __construct(
        string $message,
        private readonly string $table,
        private readonly string $reason,
        int $code = 0,
        ?Throwable $previous = null,
        private ?array $context = null,
    ) {
        parent::__construct($message, $code, $previous);
    }

    /**
     * Create from table not found.
     */
    public static function tableNotFound(string $table): self
    {
        return new self(
            message: "Table not found: {$table}",
            table: $table,
            reason: 'not_found',
        );
    }

    /**
     * Create from invalid column.
     */
    public static function invalidColumn(
        string $table,
        string $column,
        string $type
    ): self {
        return new self(
            message: "Invalid column {$column} in table {$table}: {$type}",
            table: $table,
            reason: 'invalid_column',
            context: [
                'column' => $column,
                'type' => $type,
            ],
        );
    }

    /**
     * Create from invalid index.
     */
    public static function invalidIndex(
        string $table,
        string $index,
        string $type
    ): self {
        return new self(
            message: "Invalid index {$index} in table {$table}: {$type}",
            table: $table,
            reason: 'invalid_index',
            context: [
                'index' => $index,
                'type' => $type,
            ],
        );
    }

    /**
     * Create from invalid foreign key.
     */
    public static function invalidForeignKey(
        string $table,
        string $foreignKey,
        string $type
    ): self {
        return new self(
            message: "Invalid foreign key {$foreignKey} in table {$table}: {$type}",
            table: $table,
            reason: 'invalid_foreign_key',
            context: [
                'foreign_key' => $foreignKey,
                'type' => $type,
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
     * Get failure reason.
     */
    public function getReason(): string
    {
        return $this->reason;
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
