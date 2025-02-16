<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Exceptions;

class FactoryGeneratorException extends ModelGeneratorException {
    public static function generationFailed(string $model, string $reason): self {
        return new self("Failed to generate factory for model {$model}: {$reason}");
    }

    public static function invalidModelClass(string $model): self {
        return new self("Invalid model class: {$model}");
    }

    public static function invalidNamespace(string $namespace): self {
        return new self("Invalid factory namespace: {$namespace}");
    }

    public static function invalidColumnType(string $column, string $type): self {
        return new self("Invalid column type {$type} for column {$column} in factory");
    }

    public static function invalidRelationship(string $model, string $relationship): self {
        return new self("Invalid relationship {$relationship} for model {$model} in factory");
    }

    public static function invalidState(string $model, string $state): self {
        return new self("Invalid state {$state} for model {$model} in factory");
    }

    public static function missingRequiredColumn(string $model, string $column): self {
        return new self("Missing required column {$column} for model {$model} factory");
    }

    public static function invalidFactoryDefinition(string $model): self {
        return new self("Invalid factory definition for model {$model}");
    }

    public static function invalidStateDefinition(string $model, string $state): self {
        return new self("Invalid state definition {$state} for model {$model}");
    }

    public static function invalidRelationshipMethod(string $model, string $method): self {
        return new self("Invalid relationship method {$method} for model {$model}");
    }
}