<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Exceptions;

class ModelGeneratorException extends \Exception {
    protected function validateNotEmpty(string $value, string $name): void {
        if (empty($value)) {
            throw new static("{$name} cannot be empty");
        }
    }

    protected function validateExists(string $path, string $name): void {
        if (!file_exists($path)) {
            throw new static("{$name} not found: {$path}");
        }
    }

    protected function validateClass(string $class, string $name): void {
        if (!class_exists($class)) {
            throw new static("{$name} class does not exist: {$class}");
        }
    }

    protected function validateInterface(string $interface, string $name): void {
        if (!interface_exists($interface)) {
            throw new static("{$name} interface does not exist: {$interface}");
        }
    }

    protected function validateType(mixed $value, string $expectedType, string $name): void {
        $actualType = get_debug_type($value);
        if ($actualType !== $expectedType) {
            throw new static("Invalid type for {$name}: expected {$expectedType}, got {$actualType}");
        }
    }

    protected function validateArray(mixed $value, string $name): void {
        if (!is_array($value)) {
            throw new static("{$name} must be an array");
        }
    }

    protected function validateArrayOf(array $array, string $expectedType, string $name): void {
        foreach ($array as $value) {
            if (!$value instanceof $expectedType) {
                $actualType = get_debug_type($value);
                throw new static("Invalid type in {$name} array: expected {$expectedType}, got {$actualType}");
            }
        }
    }

    protected function validateRegex(string $value, string $pattern, string $name): void {
        if (!preg_match($pattern, $value)) {
            throw new static("Invalid format for {$name}: {$value}");
        }
    }
}