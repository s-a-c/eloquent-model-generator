# API Reference

This document provides detailed information about the public API of the Eloquent Model Generator.

## Core Classes

### ModelGenerator

The main entry point for model generation.

```php
use SAC\EloquentModelGenerator\ModelGenerator;

class ModelGenerator
{
    /**
     * Generate a model from a table.
     *
     * @param string $table
     * @param array<string, mixed> $config
     * @return \SAC\EloquentModelGenerator\Models\GeneratedModel
     */
    public function generate(string $table, array $config = []): GeneratedModel;

    /**
     * Generate multiple models.
     *
     * @param array<string> $tables
     * @param array<string, mixed> $config
     * @return array<\SAC\EloquentModelGenerator\Models\GeneratedModel>
     */
    public function generateBatch(array $tables, array $config = []): array;

    /**
     * Check if a model exists.
     *
     * @param string $className
     * @param string $namespace
     * @return bool
     */
    public function modelExists(string $className, string $namespace): bool;
}
```

### ModelDefinition

Value object representing model configuration.

```php
use SAC\EloquentModelGenerator\ValueObjects\ModelDefinition;

class ModelDefinition
{
    public function __construct(
        string $className,
        string $namespace,
        string $tableName,
        string $baseClass = 'Illuminate\\Database\\Eloquent\\Model',
        bool $withSoftDeletes = false,
        bool $withValidation = false,
        bool $withRelationships = true
    );

    public function getClassName(): string;
    public function getNamespace(): string;
    public function getTableName(): string;
    public function getBaseClass(): string;
    public function withSoftDeletes(): bool;
    public function withValidation(): bool;
    public function withRelationships(): bool;
}
```

### GeneratedModel

Represents a generated model.

```php
use SAC\EloquentModelGenerator\Models\GeneratedModel;

class GeneratedModel
{
    public function __construct(
        string $className,
        string $namespace,
        string $tableName,
        string $baseClass,
        string $content
    );

    public function getClassName(): string;
    public function getNamespace(): string;
    public function getTableName(): string;
    public function getBaseClass(): string;
    public function getContent(): string;
}
```

## Services

### ModelGeneratorService

Service for generating models.

```php
use SAC\EloquentModelGenerator\Services\ModelGeneratorService;

class ModelGeneratorService
{
    /**
     * Generate a model for a given table.
     *
     * @param string $table
     * @param array<string, mixed> $config
     * @return \SAC\EloquentModelGenerator\Models\GeneratedModel
     */
    public function generateModel(string $table, array $config = []): GeneratedModel;

    /**
     * Generate models for multiple tables.
     *
     * @param array<string> $tables
     * @param array<string, mixed> $config
     * @return array<\SAC\EloquentModelGenerator\Models\GeneratedModel>
     */
    public function generateBatch(array $tables, array $config = []): array;

    /**
     * Get all available tables.
     *
     * @return array<string>
     */
    public function getTables(): array;
}
```

### ModelGeneratorTemplateEngine

Service for rendering model templates.

```php
use SAC\EloquentModelGenerator\Services\ModelGeneratorTemplateEngine;

class ModelGeneratorTemplateEngine
{
    /**
     * Render a model template.
     *
     * @param \SAC\EloquentModelGenerator\ValueObjects\ModelDefinition $definition
     * @param array<string, mixed> $schema
     * @return string
     */
    public function render(ModelDefinition $definition, array $schema): string;
}
```

## Events

### ModelGenerated

Event dispatched when a model is generated.

```php
use SAC\EloquentModelGenerator\Events\ModelGenerated;

class ModelGenerated
{
    public function __construct(
        private readonly GeneratedModel $model
    );

    public function getModel(): GeneratedModel;
}
```

## Configuration

### Available Options

```php
[
    // Basic settings
    'namespace' => 'App\\Models',
    'output_path' => 'app/Models',
    'base_class' => 'Illuminate\\Database\\Eloquent\\Model',

    // Features
    'with_relationships' => true,
    'with_validation' => true,
    'with_soft_deletes' => false,

    // Table filtering
    'exclude_tables' => ['migrations', 'password_resets'],
    'only_tables' => [],

    // Performance
    'use_cache' => true,
    'cache_ttl' => 3600,
    'concurrency' => 4,

    // Analysis
    'analysis' => [
        'foreign_keys' => true,
        'indexes' => true,
        'column_types' => true,
    ],

    // Code style
    'style' => [
        'psr12_compliance' => true,
        'with_docblocks' => true,
        'with_type_hints' => true,
    ],
]
```

## Next Steps

- See [Basic Usage](./basic-usage.md) for common use cases
- Check [Advanced Usage](./advanced-usage.md) for complex scenarios
- Review [Architecture](./architecture.md) for internal details
