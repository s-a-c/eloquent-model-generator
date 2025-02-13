# Installation Guide

## Requirements

Before installing the package, ensure your environment meets the following requirements:

- PHP 8.2 or higher
- Laravel 11.x
- Composer 2.x
- Required PHP extensions:
  - ext-json
  - ext-pdo
  - ext-dom

## Installation Steps

1. Install the package via Composer:

```bash
composer require sac/eloquent-model-generator
```

2. The package will automatically register its service provider in Laravel 11.x applications. If you need to register it manually, add the following to your `config/app.php`:

```php
'providers' => [
    // ...
    SAC\EloquentModelGenerator\Providers\EloquentModelGeneratorServiceProvider::class,
];
```

3. Publish the configuration file (optional):

```bash
php artisan vendor:publish --provider="SAC\EloquentModelGenerator\Providers\EloquentModelGeneratorServiceProvider" --tag="config"
```

4. Publish the templates (optional):

```bash
php artisan vendor:publish --provider="SAC\EloquentModelGenerator\Providers\EloquentModelGeneratorServiceProvider" --tag="stubs"
```

## Development Tools Setup

The package includes several development tools for code quality and analysis. To set them up:

1. Install development dependencies:

```bash
composer install --dev
```

2. Initialize the tools:

```bash
# Create tool configurations
php artisan analyze --init

# Verify installation
php artisan analyze --check
```

## Configuration

The package can be configured through several methods:

1. **Configuration File**
   - Located at `config/eloquent-model-generator.php`
   - Controls default behavior and paths

2. **Environment Variables**
   - `EMG_DEFAULT_PATH`: Default path for generated models
   - `EMG_NAMESPACE`: Default namespace for models
   - `EMG_BASE_MODEL_CLASS`: Base model class to extend

3. **Command Line Options**
   - Override configuration through command options
   - See `php artisan help generate:model` for details

## Verification

To verify the installation:

1. Run the model generator:
```bash
php artisan generate:model --table=users
```

2. Run the analysis tools:
```bash
php artisan analyze
```

3. Check code quality:
```bash
composer check-all
```

## Troubleshooting

### Common Issues

1. **Composer Memory Issues**
   ```bash
   COMPOSER_MEMORY_LIMIT=-1 composer require sac/eloquent-model-generator
   ```

2. **Permission Issues**
   ```bash
   chmod -R 755 storage bootstrap/cache
   ```

3. **Class Not Found**
   - Clear composer autoload:
   ```bash
   composer dump-autoload
   ```
   - Clear Laravel cache:
   ```bash
   php artisan optimize:clear
   ```

### Getting Help

- Check the [GitHub Issues](https://github.com/s-a-c/eloquent-model-generator/issues)
- Join our [Discord Community](https://discord.gg/example)
- Email support: support@example.com

## Next Steps

- Read the [Basic Usage Guide](basic-usage.md)
- Explore [Advanced Features](advanced-usage.md)
- Learn about [Code Quality Tools](code-quality.md)
- Review [Best Practices](best-practices.md)
