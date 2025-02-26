<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Services;

use SAC\EloquentModelGenerator\Config\ModelGeneratorConfig;
use SAC\EloquentModelGenerator\Contracts\TypeMapperInterface;
use SAC\EloquentModelGenerator\Domain\ValueObjects\TypeDefinition;

/**
 * Handles database to PHP type mapping with support for custom types and attributes.
 */
final readonly class TypeMapper implements TypeMapperInterface
{

    public function __construct(
        private ModelGeneratorConfig $config,
    ) {

    }

    /**
     * Map a database column type to its corresponding PHP type.
     */
    public function mapColumnType(string $type, array $attributes = []): TypeDefinition
    {

        // Extract base type and parameters
        $baseType  = mb_strtolower(explode('(', $type)[0]);
        $length    = $this->extractLength($type);
        $precision = $this->extractPrecision($type);

        // Check for custom type mappings first
        if ($customType = $this->getCustomTypeMapping($baseType))
        {
            return new TypeDefinition(
                phpType: $customType['phpType'],
                docType: $customType['docType'] ?? $customType['phpType'],
                dbType: $baseType,
                length: $length,
                precision: $precision,
                attributes: array_merge($attributes, $customType['attributes'] ?? []),
            );
        }

        // Standard type mappings
        return match ($baseType)
        {
            // Numeric types
            'integer', 'int', 'smallint', 'tinyint', 'mediumint', 'bigint' => new TypeDefinition(
                phpType: 'int',
                docType: 'int',
                dbType: $baseType,
                length: $length,
                precision: NULL,
                attributes: $attributes,
            ),
            'decimal', 'numeric', 'float', 'double', 'real'                => new TypeDefinition(
                phpType: 'float',
                docType: 'float',
                dbType: $baseType,
                length: $length,
                precision: $precision,
                attributes: $attributes,
            ),

            // String types
            'char', 'varchar', 'text', 'mediumtext', 'longtext'            => new TypeDefinition(
                phpType: 'string',
                docType: 'string',
                dbType: $baseType,
                length: $length,
                precision: NULL,
                attributes: $attributes,
            ),

            // Boolean type
            'boolean', 'bool', 'bit'                                       => new TypeDefinition(
                phpType: 'bool',
                docType: 'bool',
                dbType: $baseType,
                length: NULL,
                precision: NULL,
                attributes: $attributes,
            ),

            // Date/Time types
            'datetime', 'timestamp'                                        => new TypeDefinition(
                phpType: 'string',
                docType: '\\DateTime',
                dbType: $baseType,
                length: NULL,
                precision: NULL,
                attributes: array_merge($attributes, ['cast'                                        => 'datetime']),
            ),
            'date'                                                         => new TypeDefinition(
                phpType: 'string',
                docType: '\\DateTime',
                dbType: $baseType,
                length: NULL,
                precision: NULL,
                attributes: array_merge($attributes, ['cast'                                                         => 'date']),
            ),
            'time'                                                         => new TypeDefinition(
                phpType: 'string',
                docType: 'string',
                dbType: $baseType,
                length: NULL,
                precision: NULL,
                attributes: array_merge($attributes, ['cast'                                                         => 'time']),
            ),

            // JSON types
            'json', 'jsonb'                                                => new TypeDefinition(
                phpType: 'array',
                docType: 'array',
                dbType: $baseType,
                length: NULL,
                precision: NULL,
                attributes: array_merge($attributes, ['cast'                                                => 'json']),
            ),

            // Binary types
            'binary', 'varbinary', 'blob', 'mediumblob', 'longblob'        => new TypeDefinition(
                phpType: 'string',
                docType: 'string',
                dbType: $baseType,
                length: $length,
                precision: NULL,
                attributes: array_merge($attributes, ['binary'        => TRUE]),
            ),

            // Enum types
            'enum'                                                         => new TypeDefinition(
                phpType: 'string',
                docType: 'string',
                dbType: $baseType,
                length: NULL,
                precision: NULL,
                attributes: array_merge($attributes, ['enum'                                                         => TRUE]),
            ),

            // Default to string for unknown types
            default                                                        => new TypeDefinition(
                phpType: 'string',
                docType: 'string',
                dbType: $baseType,
                length: $length,
                precision: NULL,
                attributes: $attributes,
            ),
        };
    }

    /**
     * Extract length parameter from type definition.
     */
    private function extractLength(string $type): ?int
    {

        if (preg_match('/\((\d+)\)/', $type, $matches))
        {
            return (int) $matches[1];
        }

        return NULL;
    }

    /**
     * Extract precision from numeric type definition.
     */
    private function extractPrecision(string $type): ?int
    {

        if (preg_match('/\(\d+,(\d+)\)/', $type, $matches))
        {
            return (int) $matches[1];
        }

        return NULL;
    }

    /**
     * Get custom type mapping from configuration.
     *
     * @return array{phpType: string, docType?: string, attributes?: array}|null
     */
    private function getCustomTypeMapping(string $type): ?array
    {

        $customMappings = $this->config->get('type_mappings', []);
        return $customMappings[$type] ?? NULL;
    }

}
