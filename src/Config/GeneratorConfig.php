<?php

namespace SAC\EloquentModelGenerator\Config;

use DateTime;
use SAC\EloquentModelGenerator\Exceptions\InvalidConfigurationException;

/**
 * @phpstan-type RelationConfig array{
 *     type: 'belongsTo'|'belongsToMany'|'hasMany'|'hasOne'|'morphMany'|'morphOne'|'morphTo',
 *     model: string,
 *     foreignKey?: string,
 *     localKey?: string,
 *     table?: string,
 *     morphType?: string
 * }
 */
class GeneratorConfig
{
    private string $namespace;

    private string $path;

    /**
     * @var array<string, RelationConfig>
     */
    private array $relations = [];

    private bool $withValidation = false;

    private bool $withRelationships = false;

    private ?string $baseClass = null;

    private ?string $dateFormat = null;

    private ?string $connection = null;

    /**
     * Create a new generator configuration instance
     *
     * @param array{
     *     namespace?: string,
     *     path?: string,
     *     relations?: array<string, RelationConfig>,
     *     with_validation?: bool,
     *     with_relationships?: bool,
     *     base_class?: string,
     *     date_format?: string,
     *     connection?: string
     * } $config
     */
    public function __construct(array $config)
    {
        $this->namespace = (string) ($config['namespace'] ?? 'App\\Models');
        $this->path = (string) ($config['path'] ?? app_path('Models'));
        $this->relations = $this->validateRelationConfig($config['relations'] ?? []);
        $this->withValidation = (bool) ($config['with_validation'] ?? false);
        $this->withRelationships = (bool) ($config['with_relationships'] ?? true);
        $this->baseClass = isset($config['base_class']) ? (string) $config['base_class'] : null;
        $this->dateFormat = isset($config['date_format']) ? (string) $config['date_format'] : null;
        $this->connection = isset($config['connection']) ? (string) $config['connection'] : null;

        $this->validateConfig();
    }

    private function validateConfig(): void
    {
        // Validate namespace
        if (! $this->isValidNamespace($this->namespace)) {
            throw new InvalidConfigurationException('Invalid namespace format. Must be a valid PHP namespace.');
        }

        // Validate path
        if (! $this->isValidPath($this->path)) {
            throw new InvalidConfigurationException('Invalid path. Directory must exist or be creatable.');
        }

        // Validate relations
        if (! empty($this->relations)) {
            $this->validateRelations();
        }

        // Validate base class if set
        if ($this->baseClass !== null && ! $this->isValidClassName($this->baseClass)) {
            throw new InvalidConfigurationException('Invalid base class name.');
        }

        // Validate date format if set
        if ($this->dateFormat !== null && ! $this->isValidDateFormat($this->dateFormat)) {
            throw new InvalidConfigurationException('Invalid date format.');
        }
    }

    private function isValidNamespace(string $namespace): bool
    {
        // Must start with a letter or underscore
        if (! preg_match('/^[a-zA-Z_]/', $namespace)) {
            return false;
        }

        // Must contain only letters, numbers, underscores, and backslashes
        if (! preg_match('/^[a-zA-Z0-9_\\\\]+$/', $namespace)) {
            return false;
        }

        // Must not have consecutive backslashes
        if (strpos($namespace, '\\\\') !== false) {
            return false;
        }

        // Each segment must be a valid PHP label
        foreach (explode('\\', $namespace) as $segment) {
            if (! preg_match('/^[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*$/', $segment)) {
                return false;
            }
        }

        return true;
    }

    private function isValidPath(string $path): bool
    {
        // If the directory exists, it's valid
        if (is_dir($path)) {
            return true;
        }

        // Try to create the directory
        try {
            mkdir($path, 0777, true);

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    private function validateRelations(): void
    {
        $validTypes = ['belongsTo', 'hasMany', 'hasOne', 'belongsToMany', 'morphTo', 'morphMany', 'morphOne'];

        foreach ($this->relations as $relation => $config) {
            if (! is_array($config)) {
                throw new InvalidConfigurationException("Invalid relation configuration for '$relation'. Must be an array.");
            }

            if (! isset($config['type'])) {
                throw new InvalidConfigurationException("Relation type must be specified for '$relation'.");
            }

            if (! in_array($config['type'], $validTypes, true)) {
                throw new InvalidConfigurationException("Invalid relation type '{$config['type']}' for '$relation'.");
            }

            // Validate related model if specified
            if (isset($config['model']) && ! $this->isValidClassName($config['model'])) {
                throw new InvalidConfigurationException("Invalid model name '{$config['model']}' for relation '$relation'.");
            }
        }
    }

    private function isValidClassName(string $name): bool
    {
        return (bool) preg_match('/^[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*$/', $name);
    }

    private function isValidDateFormat(string $format): bool
    {
        try {
            $date = new DateTime;
            $result = $date->format($format);

            return $result !== false;
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * @param  array<string, mixed>  $relations
     * @return array<string, RelationConfig>
     *
     * @throws InvalidConfigurationException
     */
    private function validateRelationConfig(array $relations): array
    {
        $validTypes = ['belongsTo', 'hasMany', 'hasOne', 'belongsToMany', 'morphTo', 'morphMany', 'morphOne'];
        $validatedRelations = [];

        foreach ($relations as $name => $config) {
            if (! is_array($config)) {
                throw new InvalidConfigurationException(
                    sprintf("Invalid relation configuration for '%s'. Must be an array.", (string) $name)
                );
            }

            if (! isset($config['type']) || ! is_string($config['type'])) {
                throw new InvalidConfigurationException(
                    sprintf("Relation type must be specified for '%s'.", (string) $name)
                );
            }

            if (! in_array($config['type'], $validTypes, true)) {
                throw new InvalidConfigurationException(
                    sprintf("Invalid relation type '%s' for '%s'.", $config['type'], (string) $name)
                );
            }

            if (! isset($config['model']) || ! is_string($config['model'])) {
                throw new InvalidConfigurationException(
                    sprintf("Model must be specified for relation '%s'.", (string) $name)
                );
            }

            if (! $this->isValidClassName((string) $config['model'])) {
                throw new InvalidConfigurationException(
                    sprintf("Invalid model name '%s' for relation '%s'.", (string) $config['model'], (string) $name)
                );
            }

            /** @var RelationConfig $validatedConfig */
            $validatedConfig = array_intersect_key($config, array_flip(['type', 'model', 'foreignKey', 'localKey', 'table', 'morphType']));
            $validatedRelations[$name] = $validatedConfig;
        }

        return $validatedRelations;
    }

    /**
     * Get the namespace for generated models
     */
    public function getNamespace(): string
    {
        return $this->namespace;
    }

    /**
     * Set the namespace for generated models
     */
    public function setNamespace(string $namespace): self
    {
        $this->namespace = $namespace;

        return $this;
    }

    /**
     * Get the path for generated models
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * Set the path for generated models
     */
    public function setPath(string $path): self
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get the relations configuration
     *
     * @return array<string, RelationConfig>
     */
    public function getRelations(): array
    {
        return $this->relations;
    }

    /**
     * Set the relations configuration
     *
     * @param  array<string, RelationConfig>  $relations
     */
    public function setRelations(array $relations): self
    {
        $this->relations = $relations;

        return $this;
    }

    /**
     * Check if validation should be included
     */
    public function withValidation(): bool
    {
        return $this->withValidation;
    }

    /**
     * Set whether validation should be included
     */
    public function setWithValidation(bool $withValidation): self
    {
        $this->withValidation = $withValidation;

        return $this;
    }

    /**
     * Check if relationships should be included
     */
    public function withRelationships(): bool
    {
        return $this->withRelationships;
    }

    /**
     * Set whether relationships should be included
     */
    public function setWithRelationships(bool $withRelationships): self
    {
        $this->withRelationships = $withRelationships;

        return $this;
    }

    /**
     * Get the base class for generated models
     */
    public function getBaseClass(): ?string
    {
        return $this->baseClass;
    }

    /**
     * Set the base class for generated models
     */
    public function setBaseClass(?string $baseClass): self
    {
        $this->baseClass = $baseClass;

        return $this;
    }

    /**
     * Get the date format for generated models
     */
    public function getDateFormat(): ?string
    {
        return $this->dateFormat;
    }

    /**
     * Set the date format for generated models
     */
    public function setDateFormat(?string $dateFormat): self
    {
        $this->dateFormat = $dateFormat;

        return $this;
    }

    /**
     * Get the database connection for generated models
     */
    public function getConnection(): ?string
    {
        return $this->connection;
    }

    /**
     * Set the database connection for generated models
     */
    public function setConnection(?string $connection): self
    {
        $this->connection = $connection;

        return $this;
    }

    /**
     * Convert the configuration to an array
     *
     * @return array{
     *     namespace: string,
     *     path: string,
     *     relations: array<string, RelationConfig>,
     *     with_validation: bool,
     *     with_relationships: bool,
     *     base_class: string|null,
     *     date_format: string|null,
     *     connection: string|null
     * }
     */
    public function toArray(): array
    {
        return [
            'namespace' => $this->namespace,
            'path' => $this->path,
            'relations' => $this->relations,
            'with_validation' => $this->withValidation,
            'with_relationships' => $this->withRelationships,
            'base_class' => $this->baseClass,
            'date_format' => $this->dateFormat,
            'connection' => $this->connection,
        ];
    }

    /**
     * Create a new instance from an array
     *
     * @param array{
     *     namespace?: string,
     *     path?: string,
     *     relations?: array<string, RelationConfig>,
     *     with_validation?: bool,
     *     with_relationships?: bool,
     *     base_class?: string,
     *     date_format?: string,
     *     connection?: string
     * } $config
     */
    public static function fromArray(array $config): self
    {
        return new self($config);
    }
}
