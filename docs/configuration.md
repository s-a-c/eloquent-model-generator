# Configuration Guide

This guide covers the configuration options available in the Eloquent Model Generator package.

## Publishing Configuration

```bash
php artisan vendor:publish --provider="StandAlonecomplex\\EloquentModelGenerator\\EloquentModelGeneratorServiceProvider"
```

## Configuration Options

### 1. Core Settings

```php
return [
    // Base namespace for generated models
    'namespace' => 'App\\Models',

    // Path where models will be generated
    'path' => app_path('Models'),

    // Default model parent class
    'parent_class' => \Illuminate\Database\Eloquent\Model::class,

    // Whether to use strict types declaration
    'strict_types' => true,

    // Whether to generate PHPDoc blocks
    'doc_blocks' => true,
];
```

### 2. Database Settings

```php
return [
    // Database connection to use
    'connection' => env('DB_CONNECTION', 'mysql'),

    // Schema exclusion patterns
    'exclude' => [
        'migrations',
        'password_resets',
        'failed_jobs',
    ],

    // Table prefix handling
    'strip_prefix' => true,
    'prefix' => '',
];
```

### 3. Model Features

```php
return [
    // Enable relationship detection
    'relationships' => true,

    // Enable validation rules generation
    'validation_rules' => true,

    // Enable attribute casting
    'casts' => true,

    // Enable fillable attributes
    'fillable' => true,

    // Enable hidden attributes
    'hidden' => true,

    // Enable dates handling
    'dates' => true,
];
```

### 4. Performance Settings

```php
return [
    // Enable parallel processing
    'parallel' => [
        'enabled' => true,
        'max_workers' => 4,
        'chunk_size' => 10,
    ],

    // Cache settings
    'cache' => [
        'enabled' => true,
        'ttl' => 3600,
        'driver' => 'file',
    ],

    // Memory limits
    'memory' => [
        'limit' => '256M',
        'allow_increase' => true,
    ],

    // Query optimization
    'query' => [
        'chunk_size' => 1000,
        'timeout' => 60,
    ],
];
```

### 5. Testing Settings

```php
return [
    // Test database connections
    'testing' => [
        'mysql' => [
            'driver' => 'mysql',
            'database' => 'testing_mysql',
        ],
        'pgsql' => [
            'driver' => 'pgsql',
            'database' => 'testing_pgsql',
        ],
        'sqlite' => [
            'driver' => 'sqlite',
            'database' => ':memory:',
        ],
        'sqlsrv' => [
            'driver' => 'sqlsrv',
            'database' => 'testing_sqlsrv',
        ],
    ],

    // Test coverage requirements
    'coverage' => [
        'minimum' => 90,
        'exclude' => [
            'tests/',
            'vendor/',
        ],
    ],

    // Performance thresholds
    'thresholds' => [
        'query_time' => 1000, // ms
        'memory_usage' => 50 * 1024 * 1024, // 50MB
        'total_time' => 5000, // ms
    ],
];
```

### 6. Template Settings

```php
return [
    // Custom template path
    'template_path' => resource_path('views/vendor/model-generator'),

    // Template customization
    'templates' => [
        'model' => 'model.blade.php',
        'pivot' => 'pivot.blade.php',
        'trait' => 'trait.blade.php',
    ],

    // Template variables
    'template_vars' => [
        'author' => 'Your Name',
        'company' => 'Your Company',
    ],
];
```

## Environment Variables

```env
# Core Settings
MODEL_GENERATOR_NAMESPACE=App\\Models
MODEL_GENERATOR_PATH=app/Models
MODEL_GENERATOR_PARENT_CLASS=\\Illuminate\\Database\\Eloquent\\Model

# Database Settings
MODEL_GENERATOR_CONNECTION=mysql
MODEL_GENERATOR_STRIP_PREFIX=true
MODEL_GENERATOR_PREFIX=

# Performance Settings
MODEL_GENERATOR_PARALLEL_ENABLED=true
MODEL_GENERATOR_MAX_WORKERS=4
MODEL_GENERATOR_CHUNK_SIZE=10
MODEL_GENERATOR_MEMORY_LIMIT=256M

# Testing Settings
MODEL_GENERATOR_TEST_DB_MYSQL=testing_mysql
MODEL_GENERATOR_TEST_DB_PGSQL=testing_pgsql
MODEL_GENERATOR_TEST_DB_SQLSRV=testing_sqlsrv
```

## Using Configuration

### 1. In Commands

```php
php artisan model:generate users --connection=mysql --namespace=App\\Models\\Admin
```

### 2. In Code

```php
use SAC\EloquentModelGenerator\ModelGenerator;

$generator = new ModelGenerator();
$generator->setConfig([
    'namespace' => 'App\\Models\\Admin',
    'path' => app_path('Models/Admin'),
    'parent_class' => \App\Models\BaseModel::class,
]);

$model = $generator->generate('users');
```

### 3. Runtime Configuration

```php
$generator->withConfig(function ($config) {
    $config->setNamespace('App\\Models\\Admin');
    $config->setPath(app_path('Models/Admin'));
    $config->enableParallelProcessing(4);

    return $config;
});
```

## Best Practices

### 1. Environment-Specific Settings

```php
return [
    'connection' => env('MODEL_GENERATOR_CONNECTION', 'mysql'),
    'path' => env('MODEL_GENERATOR_PATH', app_path('Models')),
    'namespace' => env('MODEL_GENERATOR_NAMESPACE', 'App\\Models'),
];
```

### 2. Performance Optimization

```php
return [
    'parallel' => [
        'enabled' => env('MODEL_GENERATOR_PARALLEL_ENABLED', true),
        'max_workers' => env('MODEL_GENERATOR_MAX_WORKERS', 4),
    ],
    'memory' => [
        'limit' => env('MODEL_GENERATOR_MEMORY_LIMIT', '256M'),
    ],
];
```

### 3. Testing Configuration

```php
return [
    'testing' => [
        'mysql' => [
            'database' => env('MODEL_GENERATOR_TEST_DB_MYSQL', 'testing_mysql'),
        ],
        'pgsql' => [
            'database' => env('MODEL_GENERATOR_TEST_DB_PGSQL', 'testing_pgsql'),
        ],
    ],
];
```

## Troubleshooting

### 1. Common Issues

- Configuration not published
- Invalid namespace format
- Memory limit exceeded
- Database connection failed

### 2. Solutions

- Run vendor:publish command
- Check namespace format
- Increase memory limit
- Verify database credentials

## Next Steps

- Review [Basic Usage](./basic-usage.md) for using configuration
- Check [Advanced Usage](./advanced-usage.md) for complex configurations
- See [Testing](./testing.md) for test configuration
