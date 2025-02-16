<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Exceptions;

class ConfigurationException extends ModelGeneratorException {
    public static function fileNotFound(string $path): self {
        $exception = new self("Configuration file not found");
        $exception->validateExists($path, 'Configuration file');
        return $exception;
    }

    public static function invalidFormat(): self {
        return new self('Configuration must be an array');
    }

    public static function invalidValues(array $errors): self {
        return new self('Invalid configuration values: ' . implode(', ', $errors));
    }

    public static function invalidNamespace(string $namespace): self {
        $exception = new self("Invalid namespace format");
        $exception->validateRegex(
            $namespace,
            '/^[a-zA-Z_\x80-\xff][a-zA-Z0-9_\x80-\xff\\\\]*$/',
            'Namespace'
        );
        return $exception;
    }

    public static function invalidPath(string $path): self {
        if (str_starts_with($path, '/')) {
            return new self("Path must be relative: {$path}");
        }
        return new self("Invalid path: {$path}");
    }

    public static function invalidBaseClass(string $class): self {
        $exception = new self("Invalid base class");
        $exception->validateClass($class, 'Base class');
        return $exception;
    }

    public static function invalidType(string $key, string $expectedType, mixed $value): self {
        $exception = new self("Invalid configuration type");
        $exception->validateType($value, $expectedType, $key);
        return $exception;
    }

    public static function emptyValue(string $key): self {
        $exception = new self("Empty configuration value");
        $exception->validateNotEmpty($key, 'Configuration key');
        return $exception;
    }

    public static function invalidArrayValue(string $key, string $expectedType, array $value): self {
        $exception = new self("Invalid array configuration value");
        $exception->validateArrayOf($value, $expectedType, $key);
        return $exception;
    }
}