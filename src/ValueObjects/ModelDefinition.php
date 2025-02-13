<?php

namespace SAC\EloquentModelGenerator\ValueObjects;

use InvalidArgumentException;

class ModelDefinition {
    /**
     * Create a new model definition instance.
     *
     * @param string $className
     * @param string $namespace
     * @param string $tableName
     * @param string $baseClass
     * @param bool $withSoftDeletes
     * @param bool $withValidation
     * @param bool $withRelationships
     */
    public function __construct(
        private readonly string $className,
        private readonly string $namespace,
        private readonly string $tableName,
        private readonly string $baseClass = 'Illuminate\\Database\\Eloquent\\Model',
        private readonly bool $withSoftDeletes = false,
        private readonly bool $withValidation = false,
        private readonly bool $withRelationships = true,
        private readonly array $validationRules = [],
        private readonly array $validationMessages = []
    ) {
        if (!preg_match('/^[A-Z][a-zA-Z0-9]*$/', $className)) {
            throw new InvalidArgumentException('Invalid class name format');
        }
        if (!preg_match('/^[A-Za-z0-9\\\\]+$/', $namespace)) {
            throw new InvalidArgumentException('Invalid namespace format');
        }
    }

    /**
     * Get the class name.
     *
     * @return string
     */
    public function getClassName(): string {
        return $this->className;
    }

    /**
     * Get the namespace.
     *
     * @return string
     */
    public function getNamespace(): string {
        return $this->namespace;
    }

    /**
     * Get the table name.
     *
     * @return string
     */
    public function getTableName(): string {
        return $this->tableName;
    }

    /**
     * Get the base class.
     *
     * @return string
     */
    public function getBaseClass(): string {
        return $this->baseClass;
    }

    /**
     * Check if soft deletes should be included.
     *
     * @return bool
     */
    public function withSoftDeletes(): bool {
        return $this->withSoftDeletes;
    }

    /**
     * Check if validation should be included.
     *
     * @return bool
     */
    public function withValidation(): bool {
        return $this->withValidation;
    }

    /**
     * Check if relationships should be included.
     *
     * @return bool
     */
    public function withRelationships(): bool {
        return $this->withRelationships;
    }

    /**
     * Check if the model has validation enabled.
     */
    public function hasValidation(): bool {
        return $this->withValidation;
    }

    /**
     * Get the validation rules.
     *
     * @return array<string, string|array>
     */
    public function getValidationRules(): array {
        return $this->validationRules;
    }

    /**
     * Get the validation messages.
     *
     * @return array<string, string>
     */
    public function getValidationMessages(): array {
        return $this->validationMessages;
    }

    /**
     * Convert the definition to an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array {
        return [
            'className' => $this->className,
            'namespace' => $this->namespace,
            'tableName' => $this->tableName,
            'baseClass' => $this->baseClass,
            'withSoftDeletes' => $this->withSoftDeletes,
            'withValidation' => $this->withValidation,
            'withRelationships' => $this->withRelationships,
            'validationRules' => $this->validationRules,
            'validationMessages' => $this->validationMessages,
        ];
    }

    /**
     * Create a new instance with validation enabled.
     */
    public function makeWithValidation(): self {
        return new self(
            $this->className,
            $this->namespace,
            $this->tableName,
            $this->baseClass,
            $this->withSoftDeletes,
            true,
            $this->withRelationships,
            $this->validationRules,
            $this->validationMessages
        );
    }

    /**
     * Create a new instance with the given validation rules.
     *
     * @param array<string, string|array> $rules
     */
    public function withValidationRules(array $rules): self {
        return new self(
            $this->className,
            $this->namespace,
            $this->tableName,
            $this->baseClass,
            $this->withSoftDeletes,
            true,
            $this->withRelationships,
            $rules,
            $this->validationMessages
        );
    }

    /**
     * Create a new instance with the given validation messages.
     *
     * @param array<string, string> $messages
     */
    public function withValidationMessages(array $messages): self {
        return new self(
            $this->className,
            $this->namespace,
            $this->tableName,
            $this->baseClass,
            $this->withSoftDeletes,
            true,
            $this->withRelationships,
            $this->validationRules,
            $messages
        );
    }
}
