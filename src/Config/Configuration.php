<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Config;

use SAC\EloquentModelGenerator\Exceptions\ConfigurationException;

class Configuration {
    private array $config = [];

    private array $defaults = [
        'namespace' => 'App\\Models',
        'path' => 'app/Models',
        'base_class' => 'Illuminate\\Database\\Eloquent\\Model',
        'with_soft_deletes' => false,
        'with_timestamps' => true,
        'with_validation' => false,
        'with_relationships' => true,
        'with_fillable' => true,
        'with_casts' => true,
    ];

    public function load(string $path): void {
        if (!file_exists($path)) {
            throw new ConfigurationException('Configuration file not found');
        }

        $config = require $path;

        if (!is_array($config)) {
            throw new ConfigurationException('Configuration must be an array');
        }

        $this->merge($config);
    }

    public function merge(array $config): void {
        $this->validateConfigTypes($config);
        $this->config = array_merge($this->config, $config);
    }

    public function validate(): void {
        $errors = [];

        // Validate namespace
        if (!preg_match('/^[a-zA-Z_\x80-\xff][a-zA-Z0-9_\x80-\xff\\\\]*$/', $this->getNamespace())) {
            $errors[] = 'Invalid namespace format';
        }

        // Validate path
        if (str_starts_with($this->getPath(), '/')) {
            $errors[] = 'Path must be relative';
        }

        // Validate base class
        if ($this->getBaseClass() !== 'Illuminate\\Database\\Eloquent\\Model' && !class_exists($this->getBaseClass())) {
            $errors[] = 'Base class does not exist';
        }

        if (!empty($errors)) {
            throw new ConfigurationException('Invalid configuration: ' . implode(', ', $errors));
        }
    }

    public function getNamespace(): string {
        return $this->config['namespace'] ?? $this->defaults['namespace'];
    }

    public function getPath(): string {
        return $this->config['path'] ?? $this->defaults['path'];
    }

    public function getBaseClass(): string {
        return $this->config['base_class'] ?? $this->defaults['base_class'];
    }

    public function withSoftDeletes(): bool {
        return $this->config['with_soft_deletes'] ?? $this->defaults['with_soft_deletes'];
    }

    public function withTimestamps(): bool {
        return $this->config['with_timestamps'] ?? $this->defaults['with_timestamps'];
    }

    public function withValidation(): bool {
        return $this->config['with_validation'] ?? $this->defaults['with_validation'];
    }

    public function withRelationships(): bool {
        return $this->config['with_relationships'] ?? $this->defaults['with_relationships'];
    }

    public function withFillable(): bool {
        return $this->config['with_fillable'] ?? $this->defaults['with_fillable'];
    }

    public function withCasts(): bool {
        return $this->config['with_casts'] ?? $this->defaults['with_casts'];
    }

    public function getDefaults(): array {
        return $this->defaults;
    }

    private function validateConfigTypes(array $config): void {
        $typeValidators = [
            'namespace' => 'is_string',
            'path' => 'is_string',
            'base_class' => 'is_string',
            'with_soft_deletes' => 'is_bool',
            'with_timestamps' => 'is_bool',
            'with_validation' => 'is_bool',
            'with_relationships' => 'is_bool',
            'with_fillable' => 'is_bool',
            'with_casts' => 'is_bool',
        ];

        foreach ($config as $key => $value) {
            if (isset($typeValidators[$key]) && !$typeValidators[$key]($value)) {
                throw new ConfigurationException('Invalid configuration values');
            }
        }
    }
}