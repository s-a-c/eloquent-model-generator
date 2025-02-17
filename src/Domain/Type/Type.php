<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Domain\Type;

/**
 * Type interface represents a data type in the model generation system.
 * Following DDD principles, this is a core domain concept that encapsulates
 * the behavior of different data types.
 */
interface Type
{
    /**
     * Get the PHP type representation.
     */
    public function getPhpType(): string;

    /**
     * Get the database type representation.
     */
    public function getDatabaseType(): string;

    /**
     * Check if the type is nullable.
     */
    public function isNullable(): bool;

    /**
     * Get the default value for this type, if any.
     *
     * @return mixed
     */
    public function getDefaultValue(): mixed;

    /**
     * Create a new instance of this type with the given nullability.
     */
    public function withNullable(bool $nullable): self;

    /**
     * Create a new instance of this type with the given default value.
     *
     * @param mixed $defaultValue
     */
    public function withDefaultValue(mixed $defaultValue): self;

    /**
     * Validate if a value is valid for this type.
     *
     * @param mixed $value
     */
    public function validate(mixed $value): bool;

    /**
     * Get the type's cast definition for Eloquent.
     */
    public function getEloquentCast(): ?string;
}
