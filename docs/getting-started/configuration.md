# Configuration Guide

## Overview

The Eloquent Model Generator provides extensive configuration options to customize model generation according to your needs. This guide covers all available options and their usage.

## Configuration File

After publishing the package assets, you'll find the configuration file at `config/eloquent-model-generator.php`.

```php
return [
    /*
    |--------------------------------------------------------------------------
    | Model Generation
    |--------------------------------------------------------------------------
    */

    // Base path for generated models
    'path' => app_path('Models'),

    // Namespace for generated models
    'namespace' => 'App\\Models',

    // Base model class
    'base_class' => \Illuminate\Database\Eloquent\Model::class,

    /*
    |--------------------------------------------------------------------------
    | Code Generation
    |--------------------------------------------------------------------------
    */

    // Generate PHPDoc blocks
    'with_docs' => true,

    // Generate type hints
    'with_types' => true,

    // Generate return types
    'with_return_types' => true,

    // Generate validation rules
    'with_validation' => true,

    // Generate relationships
    'with_relationships' => true,

    // Generate factories
    'with_factories' => true,

    /*
    |--------------------------------------------------------------------------
    | Database Configuration
    |--------------------------------------------------------------------------
    */

    // Supported database connections
    'connections' => [
        'mysql',
        'pgsql',
        'sqlite',
        'sqlsrv',
        'mongodb',
    ],

    // Table prefix
    'prefix' => '',

    // Table suffix
    'suffix' => '',

    /*
    |--------------------------------------------------------------------------
    | Type Mapping
    |--------------------------------------------------------------------------
    */

    'type_mappings' => [
        // MySQL mappings
        'mysql' => [
            'tinyint(1)' => 'boolean',
            'varchar' => 'string',
            'text' => 'string',
            'int' => 'integer',
            'timestamp' => 'datetime',
        ],

        // PostgreSQL mappings
        'pgsql' => [
            'bool' => 'boolean',
            'varchar' => 'string',
            'text' => 'string',
            'int4' => 'integer',
            'timestamptz' => 'datetime',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Cache Configuration
    |--------------------------------------------------------------------------
    */

    'cache' => [
        // Enable caching
        'enabled' => true,

        // Cache TTL in seconds
        'ttl' => 3600,

        // Cache key prefix
        'prefix' => 'model_generator',

        // Cache store
        'store' => null,
    ],

    /*
    |--------------------------------------------------------------------------
    | Events & Queues
    |--------------------------------------------------------------------------
    */

    'events' => [
        // Enable event dispatching
        'enabled' => true,

        // Event listeners
        'listeners' => [
            // Add your event listeners here
        ],
    ],

    'queue' => [
        // Enable queue processing
        'enabled' => false,

        // Queue connection
        'connection' => 'sync',

        // Queue name
        'queue' => 'default',
    ],
];
```

## Configuration Options Explained

### Model Generation

#### `path`
- Type: `string`
- Default: `app_path('Models')`
- Description: Base directory where generated models will be saved

#### `namespace`
- Type: `string`
- Default: `'App\\Models'`
- Description: Namespace for generated model classes

#### `base_class`
- Type: `string`
- Default: `\Illuminate\Database\Eloquent\Model::class`
- Description: Base class for generated models

### Code Generation

#### `with_docs`
- Type: `boolean`
- Default: `true`
- Description: Generate PHPDoc blocks with property and method documentation

#### `with_types`
- Type: `boolean`
- Default: `true`
- Description: Include type hints in property declarations and method parameters

#### `with_return_types`
- Type: `boolean`
- Default: `true`
- Description: Include return type declarations for methods

### Database Configuration

#### `connections`
- Type: `array`
- Default: `['mysql', 'pgsql', 'sqlite', 'sqlsrv', 'mongodb']`
- Description: Supported database connections for model generation

#### `prefix`
- Type: `string`
- Default: `''`
- Description: Table prefix to be stripped from generated model names

#### `suffix`
- Type: `string`
- Default: `''`
- Description: Table suffix to be stripped from generated model names

### Type Mapping

The `type_mappings` configuration allows you to customize how database column types are mapped to PHP types:

```php
'type_mappings' => [
    'mysql' => [
        'column_type' => 'php_type',
    ],
],
```

### Cache Configuration

#### `cache.enabled`
- Type: `boolean`
- Default: `true`
- Description: Enable caching of schema analysis results

#### `cache.ttl`
- Type: `integer`
- Default: `3600`
- Description: Cache time-to-live in seconds

### Events & Queues

#### `events.enabled`
- Type: `boolean`
- Default: `true`
- Description: Enable event dispatching during model generation

#### `queue.enabled`
- Type: `boolean`
- Default: `false`
- Description: Enable queue processing for long-running operations

## Environment Variables

You can override configuration values using environment variables:

```env
MODEL_GENERATOR_PATH=app/Models
MODEL_GENERATOR_NAMESPACE=App\\Models
MODEL_GENERATOR_BASE_CLASS=App\\Models\\BaseModel
MODEL_GENERATOR_WITH_DOCS=true
MODEL_GENERATOR_WITH_TYPES=true
MODEL_GENERATOR_CACHE_ENABLED=true
MODEL_GENERATOR_CACHE_TTL=3600
```

## Custom Configuration

### Custom Type Mappings

Add custom type mappings in your configuration:

```php
'type_mappings' => [
    'mysql' => [
        'point' => 'Point',
        'geometry' => 'Geometry',
    ],
],
```

### Custom Event Listeners

Register custom event listeners:

```php
'events' => [
    'listeners' => [
        ModelGenerated::class => [
            GenerateFactoryListener::class,
            UpdateDocumentationListener::class,
        ],
    ],
],
```

## Best Practices

1. **Version Control**
   - Commit your configuration file
   - Use environment variables for sensitive values

2. **Type Mappings**
   - Keep mappings consistent across projects
   - Document custom type classes

3. **Cache Configuration**
   - Enable caching in production
   - Clear cache after schema changes

4. **Queue Configuration**
   - Use queues for large schemas
   - Configure proper queue workers

## Troubleshooting

### Common Issues

1. **Incorrect Paths**
   - Verify absolute paths
   - Check directory permissions

2. **Namespace Issues**
   - Ensure proper escaping
   - Verify PSR-4 compliance

3. **Cache Problems**
   - Clear cache after config changes
   - Verify cache driver configuration

## Next Steps

- [Model Generation](../features/model-generation.md)
- [Type System](../features/type-system.md)
- [Event System](../architecture/event-architecture.md)
