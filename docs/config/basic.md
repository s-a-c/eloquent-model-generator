# Basic Configuration

Essential configuration for model generation and analysis.

## Quick Setup

```bash
# Publish configuration
php artisan vendor:publish --tag=model-generator-config

# Edit configuration
config/model-generator.php
```

## Database Configuration

```php
// config/model-generator.php
return [
    'connection' => env('DB_CONNECTION', 'mysql'),
    'database' => [
        'tables' => ['*'],        // Tables to include
        'except' => ['migrations'], // Tables to exclude
    ],
];
```

## Namespace Settings

```php
return [
    'namespace' => [
        'models' => 'App\\Models',     // Base namespace
        'relations' => 'Relations',    // Sub-namespace for relations
        'traits' => 'Traits',         // Sub-namespace for traits
    ],
];
```

## Output Paths

```php
return [
    'paths' => [
        'models' => app_path('Models'),
        'relations' => app_path('Models/Relations'),
        'traits' => app_path('Models/Traits'),
    ],
];
```

## Analysis Settings

```php
return [
    'analysis' => [
        'enabled' => true,
        'tools' => ['phpstan', 'psalm', 'rector'],
        'strict' => true,
    ],
];
```

## Environment Variables

```env
MODEL_GENERATOR_CONNECTION=mysql
MODEL_GENERATOR_PATH=app/Models
MODEL_GENERATOR_NAMESPACE=App\\Models
MODEL_GENERATOR_ANALYSIS=true
```
