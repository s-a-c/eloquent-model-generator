# Installation Guide

This guide covers the installation and initial setup of the Eloquent Model Generator package.

## Requirements

### Core Requirements
- PHP 8.1 or higher
- Laravel 10.0 or higher
- Composer 2.0 or higher

### Optional Extensions
- ext-parallel (for parallel processing support)
- ext-xdebug (for code coverage analysis)
- ext-pcntl (for process control)
- ext-posix (for parallel processing)

## Installation

### 1. Install via Composer

```bash
composer require sac/eloquent-model-generator
```

### 2. Publish Configuration

```bash
php artisan vendor:publish --provider="SAC\\EloquentModelGenerator\\Providers\\EloquentModelGeneratorServiceProvider"
```

## Code Quality Tools

The package includes several code quality tools that can be installed as dev dependencies:

```bash
composer require --dev phpstan/phpstan larastan/larastan
composer require --dev friendsofphp/php-cs-fixer squizlabs/php_codesniffer
composer require --dev slevomat/coding-standard doctrine/coding-standard
composer require --dev phpmd/phpmd infection/infection
composer require --dev vimeo/psalm phpmetrics/phpmetrics
```

## Testing Framework

The package uses Pest PHP testing framework with various plugins:

```bash
composer require --dev pestphp/pest
composer require --dev pestphp/pest-plugin-laravel
composer require --dev pestphp/pest-plugin-parallel
composer require --dev pestphp/pest-plugin-type-coverage
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
- Attribute casting inference
- Validation rule generation
- Factory generation support

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
        'generate_factories' => true,
        'generate_validations' => true,
        'infer_attribute_casting' => true,
    ],
    'quality' => [
        'strict_types' => true,
        'type_hints' => true,
        'psr12_compliance' => true,
        'docblock_annotations' => true,
    ],
];
```

### Environment Variables

```env
MODEL_GENERATOR_USE_NATIVE_SCHEMA=true
MODEL_GENERATOR_ANALYZE_CONSTRAINTS=true
MODEL_GENERATOR_DETECT_POLYMORPHIC=true
MODEL_GENERATOR_RELATIONSHIP_DEPTH=5
MODEL_GENERATOR_STRICT_TYPES=true
MODEL_GENERATOR_TYPE_HINTS=true
MODEL_GENERATOR_PSR12_COMPLIANCE=true
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

declare(strict_types=1);

namespace {{ $namespace }};

use {{ $parentClass }};
use SAC\EloquentModelGenerator\Support\Traits\HasValidation;
use SAC\EloquentModelGenerator\Support\Traits\HasRelationships;

class {{ $className }} extends {{ $parentClass }}
{
    use HasValidation;
    use HasRelationships;

    protected string $table = '{{ $table }}';

    /**
     * @var array<int, string>
     */
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

### 1. Run All Tests

```bash
composer test:all
```

### 2. Run Specific Test Suites

```bash
composer test:unit        # Run unit tests
composer test:feature     # Run feature tests
composer test:integration # Run integration tests
```

### 3. Run Quality Checks

```bash
composer check-all       # Run all checks
composer analyse        # Run static analysis
composer style         # Run style checks
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
- Study [Code Quality](./code-quality.md) for quality standards
