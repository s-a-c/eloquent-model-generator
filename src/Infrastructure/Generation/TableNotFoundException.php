<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Infrastructure\Generation;

use RuntimeException;

/**
 * Exception thrown when a requested table is not found in the schema
 */
final class TableNotFoundException extends RuntimeException
{
    public function __construct(string $tableName)
    {
        parent::__construct(sprintf('Table "%s" not found in schema', $tableName));
    }
}
