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
        private readonly bool $withRelationships = true
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
        ];
    }
}
