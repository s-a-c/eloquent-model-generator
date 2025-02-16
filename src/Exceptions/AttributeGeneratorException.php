<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Exceptions;

class AttributeGeneratorException extends ModelGeneratorException {
    public static function generationFailed(string $reason): self {
        return new self("Failed to generate attributes: {$reason}");
    }

    public static function invalidColumnType(string $column, string $type): self {
        return new self("Invalid column type {$type} for column {$column}");
    }

    public static function invalidAccessor(string $column): self {
        return new self("Failed to generate accessor for column {$column}");
    }

    public static function invalidMutator(string $column): self {
        return new self("Failed to generate mutator for column {$column}");
    }

    public static function invalidCast(string $column, string $type): self {
        return new self("Invalid cast type {$type} for column {$column}");
    }

    public static function invalidProperty(string $column): self {
        return new self("Failed to generate property for column {$column}");
    }

    public static function missingColumn(string $column): self {
        return new self("Column {$column} not found");
    }

    public static function invalidDefaultValue(string $column, mixed $value): self {
        $valueString = is_scalar($value) ? (string) $value : gettype($value);
        return new self("Invalid default value {$valueString} for column {$column}");
    }

    public static function invalidNullableDefinition(string $column): self {
        return new self("Invalid nullable definition for column {$column}");
    }

    public static function customCastError(string $column, string $cast): self {
        return new self("Failed to apply custom cast {$cast} to column {$column}");
    }
}