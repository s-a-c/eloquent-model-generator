<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Domain\ValueObjects;

/**
 * Value object representing a type definition with PHP, doc, and database type information.
 */
final readonly class TypeDefinition
{

    /**
     * @param string $phpType The PHP type (e.g., 'string', 'int', 'array')
     * @param string $docType The PHPDoc type (e.g., 'string', '\DateTime', 'array')
     * @param string $dbType The database type (e.g., 'varchar', 'integer')
     * @param int|null $length The length/size parameter if applicable
     * @param int|null $precision The precision for numeric types if applicable
     * @param array<string, mixed> $attributes Additional type attributes
     */
    public function __construct(
        public string $phpType,
        public string $docType,
        public string $dbType,
        public ?int $length,
        public ?int $precision,
        public array $attributes = [],
    ) {

    }

    /**
     * Get the formatted PHPDoc type annotation.
     */
    public function getDocTypeAnnotation(): string
    {

        $type = $this->docType;

        // Handle nullable types
        if (($this->attributes['nullable'] ?? FALSE) === TRUE)
        {
            $type = "null|{$type}";
        }

        // Handle array types
        if (($this->attributes['isArray'] ?? FALSE) === TRUE)
        {
            $type = "array<{$type}>";
        }

        return $type;
    }

    /**
     * Get the formatted PHP type declaration.
     */
    public function getPhpTypeDeclaration(): string
    {

        $type = $this->phpType;

        // Handle nullable types
        if (($this->attributes['nullable'] ?? FALSE) === TRUE)
        {
            $type = "?{$type}";
        }

        return $type;
    }

    /**
     * Get the Eloquent cast type if applicable.
     */
    public function getCastType(): ?string
    {

        return $this->attributes['cast'] ?? NULL;
    }

    /**
     * Check if the type has a specific attribute.
     */
    public function hasAttribute(string $name): bool
    {

        return isset($this->attributes[$name]);
    }

    /**
     * Get an attribute value.
     *
     * @param string $name The attribute name
     * @param mixed $default Default value if attribute doesn't exist
     * @return mixed The attribute value or default
     */
    public function getAttribute(string $name, mixed $default = NULL): mixed
    {

        return $this->attributes[$name] ?? $default;
    }

}
