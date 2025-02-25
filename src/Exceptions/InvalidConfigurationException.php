<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Exceptions;

/**
 * Exception thrown when configuration is invalid.
 */
final class InvalidConfigurationException extends ModelGeneratorException
{
    /**
     * Create an exception for a missing required option.
     */
    public static function forMissingOption(string $option): self
    {
        return new self(
            "Missing required configuration option: {$option}",
            context: ['option' => $option],
        );
    }

    /**
     * Create an exception for invalid configuration.
     *
     * @param  array<string, mixed>  $config
     */
    public static function forInvalidConfig(array $config, string $reason): self
    {
        return new self(
            "Invalid configuration: {$reason}",
            context: $config,
        );
    }

    /**
     * Create an exception for an invalid path.
     */
    public static function forInvalidPath(string $path, string $reason): self
    {
        return new self(
            "Invalid path configuration: {$reason}",
            context: ['path' => $path],
        );
    }

    /**
     * Create an exception for an invalid namespace.
     */
    public static function forInvalidNamespace(string $namespace): self
    {
        return new self(
            "Invalid namespace format: {$namespace}",
            context: ['namespace' => $namespace],
        );
    }

    /**
     * Create an exception for an invalid value.
     */
    public static function forInvalidValue(string $option, string $value, string $expectedType): self
    {
        return new self(
            "Invalid value for option {$option}: expected {$expectedType}, got {$value}",
            context: [
                'option' => $option,
                'value' => $value,
                'expected_type' => $expectedType,
            ],
        );
    }

    /**
     * Create an exception for a missing dependency.
     */
    public static function forMissingDependency(string $option, string $dependency): self
    {
        return new self(
            "Option {$option} is required when {$dependency} is enabled",
            context: [
                'option' => $option,
                'dependency' => $dependency,
            ],
        );
    }
}
