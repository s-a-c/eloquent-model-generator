# Installation Guide

This guide covers the installation and initial setup of the Eloquent Model Generator package.

## Requirements

- PHP 8.1 or higher
- Laravel 9.0 or higher
- Composer 2.0 or higher

## Installation

### 1. Install via Composer

```bash
composer require s-a-c/eloquent-model-generator
```

### 2. Publish Configuration

```bash
php artisan vendor:publish --provider="StandAlonecomplex\\EloquentModelGenerator\\EloquentModelGeneratorServiceProvider"
```

## Schema Support

The package uses Laravel's native schema builder for database analysis, providing:
- No external dependencies required
- Better compatibility with Laravel's database layer
- Improved performance and reliability
- Support for all Laravel-supported databases

### Supported Databases

- MySQL 5.7+
- PostgreSQL 10.0+
- SQLite 3.8.8+
- SQL Server 2017+

### Schema Analysis Features

- Table structure analysis
- Foreign key constraint detection
- Index analysis
- Polymorphic relationship detection
- Custom column type handling
- Relationship depth control

## Configuration

### Basic Configuration

```php
// config/model-generator.php

return [
    'namespace' => 'App\\Models',
    'path' => app_path('Models'),
    'parent_class' => \Illuminate\Database\Eloquent\Model::class,
    'schema' => [
        'use_native_schema' => true,
        'analyze_constraints' => true,
        'detect_polymorphic' => true,
        'relationship_depth' => 5,
    ],
];
```

### Environment Variables

```env
MODEL_GENERATOR_USE_NATIVE_SCHEMA=true
MODEL_GENERATOR_ANALYZE_CONSTRAINTS=true
MODEL_GENERATOR_DETECT_POLYMORPHIC=true
MODEL_GENERATOR_RELATIONSHIP_DEPTH=5
```

## Quick Start

### 1. Generate Models for All Tables

```bash
php artisan model:generate
```

### 2. Generate Specific Models

```bash
php artisan model:generate users,posts,comments
```

### 3. Generate with Custom Configuration

```bash
php artisan model:generate users --connection=mysql --namespace=App\\Models\\Admin
```

## Advanced Setup

### 1. Custom Model Templates

Create custom model templates in `resources/views/vendor/model-generator/`:

```php
// resources/views/vendor/model-generator/model.blade.php

namespace {{ $namespace }};

use {{ $parentClass }};

class {{ $className }} extends {{ $parentClass }}
{
    protected $table = '{{ $table }}';

    protected $fillable = [
        @foreach($fillable as $column)
            '{{ $column }}',
        @endforeach
    ];

    // ... custom template content
}
```

### 2. Custom Model Name Handling

```php
// config/model-generator.php

return [
    'model_names' => [
        'use_singular' => true,
        'use_studly_case' => true,
        'handle_special_cases' => true,
        'custom_names' => [
            'user_profiles' => 'UserProfile',
            'cms_data' => 'CmsData',
        ],
    ],
];
```

### 3. Performance Optimization

```php
return [
    'parallel' => [
        'enabled' => true,
        'max_workers' => 4,
    ],
    'memory' => [
        'limit' => '256M',
    ],
];
```

## Testing the Installation

### 1. Run Basic Tests

```bash
composer test
```

### 2. Test Database Connections

```bash
composer test:db
```

### 3. Test Model Generation

```bash
php artisan model:generate --test
```

## Troubleshooting

### Common Issues

1. **Permission Issues**
   ```bash
   chmod -R 775 storage/
   chmod -R 775 bootstrap/cache/
   ```

2. **Namespace Issues**
   ```bash
   composer dump-autoload
   ```

3. **Memory Issues**
   ```ini
   # php.ini
   memory_limit = 256M
   ```

### Solutions

1. **Clear Cache**
   ```bash
   php artisan config:clear
   php artisan cache:clear
   ```

2. **Update Dependencies**
   ```bash
   composer update
   ```

3. **Fix Permissions**
   ```bash
   php artisan cache:clear
   php artisan config:clear
   php artisan view:clear
   ```

## Next Steps

- Review [Configuration](./configuration.md) for detailed settings
- Check [Basic Usage](./basic-usage.md) for common use cases
- See [Advanced Usage](./advanced-usage.md) for complex scenarios
- Read [Testing Guide](./testing.md) for testing your setup
