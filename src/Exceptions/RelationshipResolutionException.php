<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Exceptions;

use RuntimeException;
use Throwable;

/**
 * @final
 */
class RelationshipResolutionException extends RuntimeException
{
    /**
     * @param  array<string, mixed>|null  $context
     */
    public function __construct(
        string $message,
        private readonly string $table,
        private readonly string $type,
        int $code = 0,
        ?Throwable $previous = null,
        private ?array $context = null,
    ) {
        parent::__construct($message, $code, $previous);
    }

    /**
     * Create from invalid relationship.
     */
    public static function invalidRelationship(
        string $table,
        string $type,
        string $reason
    ): self {
        return new self(
            message: "Invalid {$type} relationship in table {$table}: {$reason}",
            table: $table,
            type: $type,
            context: [
                'reason' => $reason,
            ],
        );
    }

    /**
     * Create from missing foreign key.
     */
    public static function missingForeignKey(
        string $table,
        string $type,
        string $foreignKey
    ): self {
        return new self(
            message: "Missing foreign key {$foreignKey} for {$type} relationship in table {$table}",
            table: $table,
            type: $type,
            context: [
                'foreign_key' => $foreignKey,
            ],
        );
    }

    /**
     * Create from invalid polymorphic relationship.
     */
    public static function invalidPolymorphic(
        string $table,
        string $type,
        string $morphType,
        string $morphId
    ): self {
        return new self(
            message: "Invalid polymorphic relationship in table {$table}: missing {$morphType} or {$morphId}",
            table: $table,
            type: $type,
            context: [
                'morph_type' => $morphType,
                'morph_id' => $morphId,
            ],
        );
    }

    /**
     * Create from invalid pivot table.
     */
    public static function invalidPivotTable(
        string $table,
        string $pivotTable,
        string $reason
    ): self {
        return new self(
            message: "Invalid pivot table {$pivotTable} for table {$table}: {$reason}",
            table: $table,
            type: 'many_to_many',
            context: [
                'pivot_table' => $pivotTable,
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
     * Get relationship type.
     */
    public function getType(): string
    {
        return $this->type;
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
