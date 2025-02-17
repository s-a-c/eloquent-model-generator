<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Domain\Type;

/**
 * StringType represents a string data type in the model generation system.
 * Implements the Type interface through AbstractType for string-specific behavior.
 */
final class StringType extends AbstractType
{
    /**
     * @param int|null $maxLength Maximum length of the string, if applicable
     * @param bool $nullable Whether the type allows null values
     * @param string|null $defaultValue Default value for the type
     */
    public function __construct(
        private readonly ?int $maxLength = null,
        bool $nullable = false,
        ?string $defaultValue = null
    ) {
        parent::__construct($nullable, $defaultValue);
    }

    /**
     * {@inheritDoc}
     */
    public function getPhpType(): string
    {
        return 'string';
    }

    /**
     * {@inheritDoc}
     */
    public function getDatabaseType(): string
    {
        if ($this->maxLength === null) {
            return 'text';
        }

        return "varchar({$this->maxLength})";
    }

    /**
     * Get the maximum length constraint, if any.
     */
    public function getMaxLength(): ?int
    {
        return $this->maxLength;
    }

    /**
     * Create a new instance with the specified maximum length.
     */
    public function withMaxLength(?int $maxLength): self
    {
        if ($this->maxLength === $maxLength) {
            return $this;
        }

        return new self(
            $maxLength,
            $this->isNullable(),
            $this->getDefaultValue()
        );
    }

    /**
     * {@inheritDoc}
     */
    protected function validateNonNullValue(mixed $value): bool
    {
        if (!is_string($value)) {
            return false;
        }

        if ($this->maxLength !== null && strlen($value) > $this->maxLength) {
            return false;
        }

        return true;
    }

    /**
     * {@inheritDoc}
     */
    public function getEloquentCast(): ?string
    {
        return 'string';
    }
}
