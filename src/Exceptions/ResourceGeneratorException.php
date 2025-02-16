<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Exceptions;

class ResourceGeneratorException extends ModelGeneratorException {
    public static function generationFailed(string $model, string $reason): self {
        return new self("Failed to generate resource for model {$model}: {$reason}");
    }

    public static function invalidModelClass(string $model): self {
        return new self("Invalid model class: {$model}");
    }

    public static function invalidNamespace(string $namespace): self {
        return new self("Invalid resource namespace: {$namespace}");
    }

    public static function invalidColumn(string $model, string $column): self {
        return new self("Invalid column {$column} for model {$model}");
    }

    public static function invalidRelationship(string $model, string $relationship): self {
        return new self("Invalid relationship {$relationship} for model {$model}");
    }

    public static function invalidConditionalField(string $model, string $field): self {
        return new self("Invalid conditional field {$field} for model {$model}");
    }

    public static function invalidCondition(string $model, string $field, string $condition): self {
        return new self("Invalid condition '{$condition}' for field {$field} in model {$model}");
    }

    public static function missingRequiredField(string $model, string $field): self {
        return new self("Missing required field {$field} for model {$model}");
    }

    public static function invalidResourceDefinition(string $model): self {
        return new self("Invalid resource definition for model {$model}");
    }

    public static function invalidMethodName(string $model, string $method): self {
        return new self("Invalid method name {$method} for model {$model}");
    }

    public static function resourceClassExists(string $model): self {
        return new self("Resource class already exists for model {$model}");
    }

    public static function invalidRelationshipType(string $model, string $type): self {
        return new self("Invalid relationship type {$type} for model {$model}");
    }
}