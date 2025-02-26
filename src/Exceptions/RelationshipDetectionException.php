<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Exceptions;

use RuntimeException;
use Throwable;

/**
 * Exception thrown when relationship detection fails.
 */
class RelationshipDetectionException extends RuntimeException
{

    private string $table;

    public function __construct(
        string $table,
        string $message = '',
        ?Throwable $previous = NULL,
    ) {

        parent::__construct($message, 0, $previous);
        $this->table = $table;
    }

    /**
     * Get the table name that caused the exception.
     */
    public function getTable(): string
    {

        return $this->table;
    }

    /**
     * Create an exception for failed relationship detection.
     *
     * @param string $table The table name
     * @param string $reason The reason for failure
     * @param Throwable|null $previous The previous exception
     */
    public static function forFailedDetection(
        string $table,
        string $reason,
        ?Throwable $previous = NULL,
    ): self {

        return new self(
            $table,
            "Failed to detect relationships for table '{$table}': {$reason}",
            $previous,
        );
    }

    /**
     * Create an exception for an invalid foreign key.
     *
     * @param string $table The table name
     * @param string $column The column name
     */
    public static function forInvalidForeignKey(string $table, string $column): self
    {

        return new self(
            $table,
            "Invalid foreign key '{$column}' in table '{$table}': Referenced table or column not found",
        );
    }

    /**
     * Create an exception for an invalid polymorphic relationship.
     *
     * @param string $table The table name
     * @param string $column The column name
     */
    public static function forInvalidPolymorphic(string $table, string $column): self
    {

        return new self(
            $table,
            "Invalid polymorphic relationship for column '{$column}' in table '{$table}': Missing type or ID column",
        );
    }

    /**
     * Create an exception for an invalid relationship type.
     *
     * @param string $table The table name
     * @param string $type The invalid relationship type
     */
    public static function forInvalidRelationType(string $table, string $type): self
    {

        return new self(
            $table,
            "Invalid relationship type '{$type}' for table '{$table}'",
        );
    }

}
