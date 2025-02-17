<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Domain\Model;

use SAC\EloquentModelGenerator\Domain\Type\Type;
use InvalidArgumentException;

/**
 * Property is an immutable value object that represents a model property
 * with its type and other attributes.
 */
final class Property
{
    /**
     * @param Type $type The property's type
     * @param bool $isPrimary Whether this is a primary key
     * @param bool $isAutoIncrement Whether this property auto-increments
     * @param bool $isUnique Whether this property must be unique
     * @param bool $isIndex Whether this property should be indexed
     * @param array<string, mixed> $attributes Additional attributes
     * @throws InvalidArgumentException If the type is invalid
     */
    public function __construct(
        private readonly Type $type,
        private readonly bool $isPrimary = false,
        private readonly bool $isAutoIncrement = false,
        private readonly bool $isUnique = false,
        private readonly bool $isIndex = false,
        private readonly array $attributes = []
    ) {
    }

    /**
     * Get the property's type.
     */
    public function getType(): Type
    {
        return $this->type;
    }

    /**
     * Check if this is a primary key.
     */
    public function isPrimary(): bool
    {
        return $this->isPrimary;
    }

    /**
     * Check if this property auto-increments.
     */
    public function isAutoIncrement(): bool
    {
        return $this->isAutoIncrement;
    }

    /**
     * Check if this property must be unique.
     */
    public function isUnique(): bool
    {
        return $this->isUnique;
    }

    /**
     * Check if this property should be indexed.
     */
    public function isIndex(): bool
    {
        return $this->isIndex;
    }

    /**
     * Get additional attributes.
     *
     * @return array<string, mixed>
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }

    /**
     * Get a specific attribute value.
     *
     * @return mixed The attribute value or null if not found
     */
    public function getAttribute(string $name): mixed
    {
        return $this->attributes[$name] ?? null;
    }

    /**
     * Create a new instance with a different type.
     */
    public function withType(Type $type): self
    {
        if ($this->type === $type) {
            return $this;
        }

        return new self(
            $type,
            $this->isPrimary,
            $this->isAutoIncrement,
            $this->isUnique,
            $this->isIndex,
            $this->attributes
        );
    }

    /**
     * Create a new instance with primary key status.
     */
    public function withPrimary(bool $isPrimary): self
    {
        if ($this->isPrimary === $isPrimary) {
            return $this;
        }

        return new self(
            $this->type,
            $isPrimary,
            $this->isAutoIncrement,
            $this->isUnique,
            $this->isIndex,
            $this->attributes
        );
    }

    /**
     * Create a new instance with auto-increment status.
     */
    public function withAutoIncrement(bool $isAutoIncrement): self
    {
        if ($this->isAutoIncrement === $isAutoIncrement) {
            return $this;
        }

        return new self(
            $this->type,
            $this->isPrimary,
            $isAutoIncrement,
            $this->isUnique,
            $this->isIndex,
            $this->attributes
        );
    }

    /**
     * Create a new instance with unique status.
     */
    public function withUnique(bool $isUnique): self
    {
        if ($this->isUnique === $isUnique) {
            return $this;
        }

        return new self(
            $this->type,
            $this->isPrimary,
            $this->isAutoIncrement,
            $isUnique,
            $this->isIndex,
            $this->attributes
        );
    }

    /**
     * Create a new instance with index status.
     */
    public function withIndex(bool $isIndex): self
    {
        if ($this->isIndex === $isIndex) {
            return $this;
        }

        return new self(
            $this->type,
            $this->isPrimary,
            $this->isAutoIncrement,
            $this->isUnique,
            $isIndex,
            $this->attributes
        );
    }

    /**
     * Create a new instance with an additional attribute.
     *
     * @param mixed $value
     */
    public function withAttribute(string $name, mixed $value): self
    {
        if (isset($this->attributes[$name]) && $this->attributes[$name] === $value) {
            return $this;
        }

        return new self(
            $this->type,
            $this->isPrimary,
            $this->isAutoIncrement,
            $this->isUnique,
            $this->isIndex,
            [...$this->attributes, $name => $value]
        );
    }

    /**
     * Create a new instance without a specific attribute.
     */
    public function withoutAttribute(string $name): self
    {
        if (!isset($this->attributes[$name])) {
            return $this;
        }

        $attributes = $this->attributes;
        unset($attributes[$name]);

        return new self(
            $this->type,
            $this->isPrimary,
            $this->isAutoIncrement,
            $this->isUnique,
            $this->isIndex,
            $attributes
        );
    }
}
