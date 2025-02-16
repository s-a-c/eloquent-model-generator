<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Contracts;

/**
 * Type Mapper Interface
 *
 * Defines the contract for mapping database types to PHP types,
 * doc types, and cast types.
 */
interface TypeMapper {
    /**
     * Maps a database column type to a PHP type.
     *
     * @param string $columnType The database column type
     * @param bool $nullable Whether the column is nullable
     * @param mixed $default The default value
     * @return string The PHP type declaration
     */
    public function mapToPhpType(string $columnType, bool $nullable = false, mixed $default = null): string;

    /**
     * Maps a database column type to a PHPDoc type.
     *
     * @param string $columnType The database column type
     * @param bool $nullable Whether the column is nullable
     * @param mixed $default The default value
     * @return string The PHPDoc type declaration
     */
    public function mapToDocType(string $columnType, bool $nullable = false, mixed $default = null): string;

    /**
     * Maps a database column type to a cast type.
     *
     * @param string $columnType The database column type
     * @return string|null The cast type or null if no casting needed
     */
    public function mapToCastType(string $columnType): ?string;

    /**
     * Determines if a type requires a custom cast.
     *
     * @param string $columnType The database column type
     * @return bool Whether the type requires a custom cast
     */
    public function requiresCustomCast(string $columnType): bool;

    /**
     * Gets the custom cast class for a type.
     *
     * @param string $columnType The database column type
     * @return string|null The custom cast class or null if not needed
     */
    public function getCustomCastClass(string $columnType): ?string;
}