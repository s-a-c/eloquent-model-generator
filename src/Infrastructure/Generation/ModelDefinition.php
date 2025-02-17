<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Infrastructure\Generation;

/**
 * Value object representing a generated model's structure
 */
final class ModelDefinition
{
    /**
     * @param string $className The model's class name
     * @param string $namespace The model's namespace
     * @param string|null $baseClass The model's base class
     * @param array<string, mixed> $properties The model's properties
     * @param array<string> $methods The model's methods
     * @param array<string> $imports The model's imports
     */
    private function __construct(
        private readonly string $className,
        private readonly string $namespace,
        private readonly ?string $baseClass = null,
        private readonly array $properties = [],
        private readonly array $methods = [],
        private readonly array $imports = []
    ) {
    }

    /**
     * Create a new model definition
     */
    public static function create(string $className, string $namespace): self
    {
        return new self($className, $namespace);
    }

    /**
     * Add a base class to the model
     */
    public function withBaseClass(string $baseClass): self
    {
        return new self(
            $this->className,
            $this->namespace,
            $baseClass,
            $this->properties,
            $this->methods,
            $this->imports
        );
    }

    /**
     * Add a property to the model
     */
    public function withProperty(string $name, mixed $value): self
    {
        $properties = $this->properties;
        $properties[$name] = $value;

        return new self(
            $this->className,
            $this->namespace,
            $this->baseClass,
            $properties,
            $this->methods,
            $this->imports
        );
    }

    /**
     * Add a method to the model
     */
    public function withMethod(string $method): self
    {
        $methods = $this->methods;
        $methods[] = $method;

        return new self(
            $this->className,
            $this->namespace,
            $this->baseClass,
            $this->properties,
            $methods,
            $this->imports
        );
    }

    /**
     * Add an import to the model
     */
    public function withImport(string $import): self
    {
        $imports = $this->imports;
        $imports[] = $import;

        return new self(
            $this->className,
            $this->namespace,
            $this->baseClass,
            $this->properties,
            $this->methods,
            $imports
        );
    }

    /**
     * Generate the model's PHP code
     */
    public function toString(): string
    {
        $code = "<?php\n\ndeclare(strict_types=1);\n\n";
        $code .= "namespace {$this->namespace};\n\n";

        // Add imports
        foreach ($this->imports as $import) {
            $code .= "use {$import};\n";
        }
        if (!empty($this->imports)) {
            $code .= "\n";
        }

        // Class definition
        $code .= "final class {$this->className}";
        if ($this->baseClass) {
            $code .= " extends {$this->baseClass}";
        }
        $code .= "\n{\n";

        // Properties
        foreach ($this->properties as $name => $value) {
            $code .= $this->formatProperty($name, $value);
        }

        // Methods
        foreach ($this->methods as $method) {
            $code .= "\n    {$method}\n";
        }

        $code .= "}\n";

        return $code;
    }

    /**
     * Format a property definition
     */
    private function formatProperty(string $name, mixed $value): string
    {
        $formatted = var_export($value, true);

        // Handle array formatting
        if (is_array($value)) {
            $formatted = str_replace(
                ['array (', '),', "=> \n    "],
                ['[', '],', '=> '],
                $formatted
            );
        }

        return "    {$name} = {$formatted};\n";
    }
}
