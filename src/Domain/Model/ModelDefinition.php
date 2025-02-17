<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Domain\Model;

use SAC\EloquentModelGenerator\Domain\Type\Type;
use SAC\EloquentModelGenerator\Domain\Model\Property;
use InvalidArgumentException;

/**
 * ModelDefinition is an immutable value object that represents the complete
 * definition of an Eloquent model, including its properties and relationships.
 */
final class ModelDefinition
{
    /**
     * @var array<string, Property>
     */
    private readonly array $properties;

    /**
     * @param string $name The model class name
     * @param string $table The database table name
     * @param array<string, Property> $properties The model's properties
     * @param string|null $namespace The model's namespace
     * @throws InvalidArgumentException If the model name is empty or properties are invalid
     */
    public function __construct(
        private readonly string $name,
        private readonly string $table,
        array $properties,
        private readonly ?string $namespace = null
    ) {
        if (empty($name)) {
            throw new InvalidArgumentException('Model name cannot be empty');
        }

        if (empty($table)) {
            throw new InvalidArgumentException('Table name cannot be empty');
        }

        $this->validateProperties($properties);
        $this->properties = $properties;
    }

    /**
     * Get the model class name.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get the database table name.
     */
    public function getTable(): string
    {
        return $this->table;
    }

    /**
     * Get the model's namespace.
     */
    public function getNamespace(): ?string
    {
        return $this->namespace;
    }

    /**
     * Get the fully qualified class name.
     */
    public function getFullyQualifiedName(): string
    {
        if ($this->namespace === null) {
            return $this->name;
        }

        return $this->namespace . '\\' . $this->name;
    }

    /**
     * Get all properties.
     *
     * @return array<string, Property>
     */
    public function getProperties(): array
    {
        return $this->properties;
    }

    /**
     * Get a specific property by name.
     */
    public function getProperty(string $name): ?Property
    {
        return $this->properties[$name] ?? null;
    }

    /**
     * Create a new instance with an additional property.
     */
    public function withProperty(string $name, Property $property): self
    {
        if (isset($this->properties[$name]) && $this->properties[$name] === $property) {
            return $this;
        }

        return new self(
            $this->name,
            $this->table,
            [...$this->properties, $name => $property],
            $this->namespace
        );
    }

    /**
     * Create a new instance without a specific property.
     */
    public function withoutProperty(string $name): self
    {
        if (!isset($this->properties[$name])) {
            return $this;
        }

        $properties = $this->properties;
        unset($properties[$name]);

        return new self(
            $this->name,
            $this->table,
            $properties,
            $this->namespace
        );
    }

    /**
     * Create a new instance with a different namespace.
     */
    public function withNamespace(?string $namespace): self
    {
        if ($this->namespace === $namespace) {
            return $this;
        }

        return new self(
            $this->name,
            $this->table,
            $this->properties,
            $namespace
        );
    }

    /**
     * Validate the properties array.
     *
     * @param array<string, Property> $properties
     * @throws InvalidArgumentException If any property is invalid
     */
    private function validateProperties(array $properties): void
    {
        foreach ($properties as $name => $property) {
            if (!is_string($name)) {
                throw new InvalidArgumentException('Property name must be a string');
            }

            if (empty($name)) {
                throw new InvalidArgumentException('Property name cannot be empty');
            }

            if (!$property instanceof Property) {
                throw new InvalidArgumentException(
                    sprintf('Property must be an instance of %s', Property::class)
                );
            }
        }
    }
}
