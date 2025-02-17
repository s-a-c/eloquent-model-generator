<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Domain\Type;

use InvalidArgumentException;

/**
 * TypeResolver service is responsible for resolving database column types
 * to their corresponding Type implementations.
 */
final class TypeResolver
{
    /**
     * @var array<string, class-string<Type>>
     */
    private array $typeMap = [];

    /**
     * Register a type mapping.
     *
     * @param string $databaseType The database column type
     * @param class-string<Type> $typeClass The Type implementation class
     */
    public function registerType(string $databaseType, string $typeClass): void
    {
        if (!class_exists($typeClass)) {
            throw new InvalidArgumentException("Type class {$typeClass} does not exist");
        }

        if (!is_subclass_of($typeClass, Type::class)) {
            throw new InvalidArgumentException(
                "Type class {$typeClass} must implement " . Type::class
            );
        }

        $this->typeMap[$databaseType] = $typeClass;
    }

    /**
     * Resolve a database column type to a Type instance.
     *
     * @param string $databaseType The database column type
     * @param array<string, mixed> $options Additional type options
     * @throws InvalidArgumentException If the type cannot be resolved
     */
    public function resolve(string $databaseType, array $options = []): Type
    {
        // Extract the base type without length/precision
        $baseType = strtolower(preg_replace('/\(.*\)/', '', $databaseType));

        if (!isset($this->typeMap[$baseType])) {
            throw new InvalidArgumentException("Unsupported database type: {$databaseType}");
        }

        $typeClass = $this->typeMap[$baseType];

        // Extract length/precision from type definition if present
        $matches = [];
        if (preg_match('/\((.*)\)/', $databaseType, $matches)) {
            $options['length'] = $matches[1];
        }

        // Create type instance with options
        return $this->createTypeInstance($typeClass, $options);
    }

    /**
     * Create a type instance with the given options.
     *
     * @param class-string<Type> $typeClass
     * @param array<string, mixed> $options
     */
    private function createTypeInstance(string $typeClass, array $options): Type
    {
        $reflection = new \ReflectionClass($typeClass);

        // Handle common type options
        $nullable = $options['nullable'] ?? false;
        $defaultValue = $options['default'] ?? null;

        // Create base instance
        /** @var Type */
        $instance = $reflection->newInstance();

        // Apply nullable and default value if provided
        if ($nullable) {
            $instance = $instance->withNullable(true);
        }

        if ($defaultValue !== null) {
            $instance = $instance->withDefaultValue($defaultValue);
        }

        // Handle type-specific options (like string length)
        if ($instance instanceof StringType && isset($options['length'])) {
            $instance = $instance->withMaxLength((int) $options['length']);
        }

        return $instance;
    }

    /**
     * Get all registered type mappings.
     *
     * @return array<string, class-string<Type>>
     */
    public function getTypeMap(): array
    {
        return $this->typeMap;
    }
}
