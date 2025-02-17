<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Domain\Type;

/**
 * Abstract base class for type implementations.
 * Provides common functionality and enforces immutability.
 */
abstract class AbstractType implements Type
{
    /**
     * @param bool $nullable Whether the type allows null values
     * @param mixed|null $defaultValue Default value for the type
     */
    final public function __construct(
        private readonly bool $nullable = false,
        private readonly mixed $defaultValue = null
    ) {
    }

    /**
     * {@inheritDoc}
     */
    public function isNullable(): bool
    {
        return $this->nullable;
    }

    /**
     * {@inheritDoc}
     */
    public function getDefaultValue(): mixed
    {
        return $this->defaultValue;
    }

    /**
     * {@inheritDoc}
     */
    public function withNullable(bool $nullable): Type
    {
        if ($this->nullable === $nullable) {
            return $this;
        }

        return new static($nullable, $this->defaultValue);
    }

    /**
     * {@inheritDoc}
     */
    public function withDefaultValue(mixed $defaultValue): Type
    {
        if ($this->defaultValue === $defaultValue) {
            return $this;
        }

        return new static($this->nullable, $defaultValue);
    }

    /**
     * {@inheritDoc}
     */
    public function validate(mixed $value): bool
    {
        if ($value === null) {
            return $this->nullable;
        }

        return $this->validateNonNullValue($value);
    }

    /**
     * Validate a non-null value for this type.
     * Must be implemented by concrete types.
     *
     * @param mixed $value The value to validate
     */
    abstract protected function validateNonNullValue(mixed $value): bool;

    /**
     * {@inheritDoc}
     */
    public function getEloquentCast(): ?string
    {
        return null;
    }
}
