<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Exceptions;

class PolicyGeneratorException extends ModelGeneratorException {
    public static function generationFailed(string $model, string $reason): self {
        return new self("Failed to generate policy for model {$model}: {$reason}");
    }

    public static function invalidModelClass(string $model): self {
        return new self("Invalid model class: {$model}");
    }

    public static function invalidNamespace(string $namespace): self {
        return new self("Invalid policy namespace: {$namespace}");
    }

    public static function invalidAbility(string $model, string $ability): self {
        return new self("Invalid ability {$ability} for model {$model}");
    }

    public static function invalidRule(string $model, string $rule): self {
        return new self("Invalid rule {$rule} for model {$model}");
    }

    public static function duplicateAbility(string $model, string $ability): self {
        return new self("Duplicate ability {$ability} for model {$model}");
    }

    public static function invalidCondition(string $model, string $ability, string $condition): self {
        return new self("Invalid condition '{$condition}' for ability {$ability} in model {$model}");
    }

    public static function missingRequiredAbility(string $model, string $ability): self {
        return new self("Missing required ability {$ability} for model {$model}");
    }

    public static function invalidPolicyDefinition(string $model): self {
        return new self("Invalid policy definition for model {$model}");
    }

    public static function invalidMethodName(string $model, string $method): self {
        return new self("Invalid method name {$method} for model {$model}");
    }
}