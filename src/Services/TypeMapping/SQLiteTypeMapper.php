<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Services\TypeMapping;

use SAC\EloquentModelGenerator\Contracts\TypeMapper;
use SAC\EloquentModelGenerator\Exceptions\TypeMapperException;

/**
 * SQLite Type Mapper
 *
 * Maps SQLite database types to PHP types and provides type inference
 * for model property declarations.
 */
class SQLiteTypeMapper implements TypeMapper {
    /**
     * Basic type mapping from SQLite to PHP types.
     *
     * @var array<string, string>
     */
    private const TYPE_MAP = [
        // Integer types
        'integer' => 'int',
        'int' => 'int',
        'tinyint' => 'int',
        'smallint' => 'int',
        'mediumint' => 'int',
        'bigint' => 'int',
        'unsigned big int' => 'int',
        'int2' => 'int',
        'int8' => 'int',

        // Floating point types
        'real' => 'float',
        'double' => 'float',
        'double precision' => 'float',
        'float' => 'float',
        'decimal' => 'float',
        'numeric' => 'float',

        // String types
        'text' => 'string',
        'char' => 'string',
        'varchar' => 'string',
        'varying character' => 'string',
        'nchar' => 'string',
        'native character' => 'string',
        'nvarchar' => 'string',
        'clob' => 'string',

        // Binary types
        'blob' => 'resource',
        'binary' => 'resource',
        'varbinary' => 'resource',

        // Boolean type
        'boolean' => 'bool',

        // Date and time types
        'date' => '\Carbon\Carbon',
        'datetime' => '\Carbon\Carbon',
        'timestamp' => '\Carbon\Carbon',
        'time' => '\Carbon\Carbon',

        // JSON type
        'json' => 'array',
    ];

    /**
     * Maps a database column type to a PHP type.
     *
     * @param string $columnType The database column type
     * @param bool $nullable Whether the column is nullable
     * @param mixed $default The default value
     * @return string The PHP type declaration
     * @throws TypeMapperException
     */
    public function mapToPhpType(string $columnType, bool $nullable = false, mixed $default = null): string {
        // Normalize the type
        $type = $this->normalizeType($columnType);

        // Get the base PHP type
        $phpType = self::TYPE_MAP[strtolower($type)] ?? 'string';

        // Handle nullable types
        if ($nullable) {
            // Special handling for built-in types
            if (in_array($phpType, ['int', 'float', 'string', 'bool', 'array'], true)) {
                return $phpType . '|null';
            }
            // Handle object types
            return '?' . $phpType;
        }

        return $phpType;
    }

    /**
     * Maps a database column type to a PHPDoc type.
     *
     * @param string $columnType The database column type
     * @param bool $nullable Whether the column is nullable
     * @param mixed $default The default value
     * @return string The PHPDoc type declaration
     */
    public function mapToDocType(string $columnType, bool $nullable = false, mixed $default = null): string {
        $type = $this->normalizeType($columnType);
        $phpType = self::TYPE_MAP[strtolower($type)] ?? 'string';

        if ($nullable) {
            return $phpType . '|null';
        }

        return $phpType;
    }

    /**
     * Maps a database column type to a cast type.
     *
     * @param string $columnType The database column type
     * @return string|null The cast type or null if no casting needed
     */
    public function mapToCastType(string $columnType): ?string {
        $type = $this->normalizeType($columnType);

        return match (strtolower($type)) {
            'json' => 'array',
            'real', 'double', 'float', 'decimal', 'numeric' => 'float',
            'integer', 'int', 'tinyint', 'smallint', 'mediumint', 'bigint' => 'integer',
            'boolean' => 'boolean',
            'datetime', 'timestamp' => 'datetime',
            'date' => 'date',
            'time' => 'time',
            default => null,
        };
    }

    /**
     * Determines if a type requires a custom cast.
     *
     * @param string $columnType The database column type
     * @return bool Whether the type requires a custom cast
     */
    public function requiresCustomCast(string $columnType): bool {
        $type = $this->normalizeType($columnType);

        return match (strtolower($type)) {
            'json', 'array', 'object', 'collection' => true,
            default => false,
        };
    }

    /**
     * Gets the custom cast class for a type.
     *
     * @param string $columnType The database column type
     * @return string|null The custom cast class or null if not needed
     */
    public function getCustomCastClass(string $columnType): ?string {
        $type = $this->normalizeType($columnType);

        return match (strtolower($type)) {
            'json' => 'Illuminate\Database\Eloquent\Casts\AsArrayObject',
            'array' => 'Illuminate\Database\Eloquent\Casts\AsArrayObject',
            'object' => 'Illuminate\Database\Eloquent\Casts\AsStringable',
            'collection' => 'Illuminate\Database\Eloquent\Casts\AsCollection',
            default => null,
        };
    }

    /**
     * Normalizes a database type by removing size/precision information.
     *
     * @param string $type The type to normalize
     * @return string The normalized type
     */
    private function normalizeType(string $type): string {
        // Remove size/precision information
        if (preg_match('/^([a-z\s]+)(?:\(.*\))?$/i', $type, $matches)) {
            return strtolower($matches[1]);
        }

        return strtolower($type);
    }
}