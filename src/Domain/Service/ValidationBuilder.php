<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Domain\Service;

use SAC\EloquentModelGenerator\Domain\Model\ModelDefinition;
use SAC\EloquentModelGenerator\Domain\Model\Property;
use SAC\EloquentModelGenerator\Domain\Type\StringType;
use SAC\EloquentModelGenerator\Domain\Type\Type;
use SAC\EloquentModelGenerator\Domain\Functional\Collection;
use SAC\EloquentModelGenerator\Domain\Functional\Compose;

/**
 * ValidationBuilder service generates Laravel validation rules based on
 * model properties and their types.
 */
final class ValidationBuilder
{
    /**
     * Build validation rules for a model definition.
     *
     * @return array<string, array<string>>
     */
    public function buildRules(ModelDefinition $definition): array
    {
        return Collection::of($definition->getProperties())
            ->map(fn(Property $property, string $name): array => [
                $name => $this->buildPropertyRules($property)
            ])
            ->reduce(fn(array $carry, array $rules): array =>
                array_merge($carry, $rules), []);
    }

    /**
     * Build validation rules for a specific property.
     *
     * @return array<string>
     */
    private function buildPropertyRules(Property $property): array
    {
        $rules = Collection::empty();
        $type = $property->getType();

        // Required/nullable rule
        $rules = $rules->with(
            $type->isNullable() ? 'nullable' : 'required'
        );

        // Type-specific rules
        $rules = $rules->with($this->getTypeRule($type));

        // Length/size constraints for string types
        if ($type instanceof StringType && $type->getMaxLength() !== null) {
            $rules = $rules->with("max:{$type->getMaxLength()}");
        }

        // Unique constraint
        if ($property->isUnique()) {
            $rules = $rules->with('unique');
        }

        return $rules->toArray();
    }

    /**
     * Get the validation rule for a specific type.
     */
    private function getTypeRule(Type $type): string
    {
        return match ($type->getPhpType()) {
            'string' => 'string',
            'int' => 'integer',
            'float' => 'numeric',
            'bool' => 'boolean',
            'array' => 'array',
            '\DateTime' => 'date',
            default => 'string'
        };
    }

    /**
     * Generate validation messages for the rules.
     *
     * @param array<string, array<string>> $rules
     * @return array<string, string>
     */
    public function buildMessages(array $rules): array
    {
        $messages = [];

        foreach ($rules as $attribute => $propertyRules) {
            foreach ($propertyRules as $rule) {
                $messages["{$attribute}.{$rule}"] = $this->buildMessage($attribute, $rule);
            }
        }

        return $messages;
    }

    /**
     * Build a validation message for a specific rule.
     */
    private function buildMessage(string $attribute, string $rule): string
    {
        $attributeLabel = str_replace('_', ' ', $attribute);

        return match ($rule) {
            'required' => "The {$attributeLabel} field is required.",
            'nullable' => "The {$attributeLabel} field must be null or a valid value.",
            'string' => "The {$attributeLabel} must be a string.",
            'integer' => "The {$attributeLabel} must be an integer.",
            'numeric' => "The {$attributeLabel} must be a number.",
            'boolean' => "The {$attributeLabel} must be true or false.",
            'array' => "The {$attributeLabel} must be an array.",
            'date' => "The {$attributeLabel} must be a valid date.",
            'unique' => "The {$attributeLabel} has already been taken.",
            default => $this->buildCustomMessage($attribute, $rule)
        };
    }

    /**
     * Build a message for a custom validation rule.
     */
    private function buildCustomMessage(string $attribute, string $rule): string
    {
        if (str_starts_with($rule, 'max:')) {
            $max = substr($rule, 4);
            return "The {$attribute} must not be greater than {$max} characters.";
        }

        return "The {$attribute} is invalid.";
    }
}
