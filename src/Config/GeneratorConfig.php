<?php

namespace SAC\EloquentModelGenerator\Config;

use SAC\EloquentModelGenerator\Exceptions\InvalidConfigurationException;
use Illuminate\Support\Str;

class GeneratorConfig {
    private readonly string $namespace;
    private readonly string $path;
    private readonly array $relations;
    private readonly bool $withValidation;
    private readonly bool $withRelationships;
    private readonly ?string $baseClass;
    private readonly ?string $dateFormat;
    private readonly ?string $connection;

    public function __construct(array $config = []) {
        $this->namespace = $config['namespace'] ?? 'App\\Models';
        $this->path = $config['path'] ?? app_path('Models');
        $this->relations = $config['relations'] ?? [];
        $this->withValidation = $config['withValidation'] ?? false;
        $this->withRelationships = $config['withRelationships'] ?? true;
        $this->baseClass = $config['baseClass'] ?? null;
        $this->dateFormat = $config['dateFormat'] ?? null;
        $this->connection = $config['connection'] ?? null;

        $this->validateConfig();
    }

    private function validateConfig(): void {
        // Validate namespace
        if (!$this->isValidNamespace($this->namespace)) {
            throw new InvalidConfigurationException('Invalid namespace format. Must be a valid PHP namespace.');
        }

        // Validate path
        if (!$this->isValidPath($this->path)) {
            throw new InvalidConfigurationException('Invalid path. Directory must exist or be creatable.');
        }

        // Validate relations
        if (!empty($this->relations)) {
            $this->validateRelations();
        }

        // Validate base class if set
        if ($this->baseClass !== null && !$this->isValidClassName($this->baseClass)) {
            throw new InvalidConfigurationException('Invalid base class name.');
        }

        // Validate date format if set
        if ($this->dateFormat !== null && !$this->isValidDateFormat($this->dateFormat)) {
            throw new InvalidConfigurationException('Invalid date format.');
        }
    }

    private function isValidNamespace(string $namespace): bool {
        // Must start with a letter or underscore
        if (!preg_match('/^[a-zA-Z_]/', $namespace)) {
            return false;
        }

        // Must contain only letters, numbers, underscores, and backslashes
        if (!preg_match('/^[a-zA-Z0-9_\\\\]+$/', $namespace)) {
            return false;
        }

        // Must not have consecutive backslashes
        if (strpos($namespace, '\\\\') !== false) {
            return false;
        }

        // Each segment must be a valid PHP label
        foreach (explode('\\', $namespace) as $segment) {
            if (!preg_match('/^[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*$/', $segment)) {
                return false;
            }
        }

        return true;
    }

    private function isValidPath(string $path): bool {
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

    private function validateRelations(): void {
        $validTypes = ['belongsTo', 'hasMany', 'hasOne', 'belongsToMany', 'morphTo', 'morphMany', 'morphOne'];

        foreach ($this->relations as $relation => $config) {
            if (!is_array($config)) {
                throw new InvalidConfigurationException("Invalid relation configuration for '$relation'. Must be an array.");
            }

            if (!isset($config['type'])) {
                throw new InvalidConfigurationException("Relation type must be specified for '$relation'.");
            }

            if (!in_array($config['type'], $validTypes, true)) {
                throw new InvalidConfigurationException("Invalid relation type '{$config['type']}' for '$relation'.");
            }

            // Validate related model if specified
            if (isset($config['model']) && !$this->isValidClassName($config['model'])) {
                throw new InvalidConfigurationException("Invalid model name '{$config['model']}' for relation '$relation'.");
            }
        }
    }

    private function isValidClassName(string $name): bool {
        return (bool) preg_match('/^[A-Z][a-zA-Z0-9_]*$/', $name);
    }

    private function isValidDateFormat(string $format): bool {
        try {
            // Attempt to create a date with the format
            $date = new \DateTime();
            $date->format($format);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function getNamespace(): string {
        return $this->namespace;
    }

    public function getPath(): string {
        return $this->path;
    }

    public function getRelations(): array {
        return $this->relations;
    }

    public function withValidation(): bool {
        return $this->withValidation;
    }

    public function withRelationships(): bool {
        return $this->withRelationships;
    }

    public function getBaseClass(): ?string {
        return $this->baseClass;
    }

    public function getDateFormat(): ?string {
        return $this->dateFormat;
    }

    public function getConnection(): ?string {
        return $this->connection;
    }

    public function toArray(): array {
        return [
            'namespace' => $this->namespace,
            'path' => $this->path,
            'relations' => $this->relations,
            'withValidation' => $this->withValidation,
            'withRelationships' => $this->withRelationships,
            'baseClass' => $this->baseClass,
            'dateFormat' => $this->dateFormat,
            'connection' => $this->connection,
        ];
    }

    public static function fromArray(array $config): self {
        return new self($config);
    }
}
