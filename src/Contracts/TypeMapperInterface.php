<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Contracts;

use SAC\EloquentModelGenerator\Domain\ValueObjects\TypeDefinition;

/**
 * Contract for database type mapping services.
 */
interface TypeMapperInterface
{

    /**
     * Map a database column type to its corresponding PHP type.
     *
     * @param string $type The database column type
     * @param array<string, mixed> $attributes Additional attributes for the type
     * @return TypeDefinition The mapped type definition
     */
    public function mapColumnType(string $type, array $attributes = []): TypeDefinition;

}