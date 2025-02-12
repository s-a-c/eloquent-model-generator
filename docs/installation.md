# Installation

## Requirements

- PHP 8.1 or higher
- Laravel 9.0 or higher
- Composer 2.0 or higher

## Installation Steps

1. Install the package via Composer:

```bash
composer require s-a-c/eloquent-model-generator
```

2. The package will automatically register its service provider in Laravel 5.5 and higher. For older versions, add the service provider to your `config/app.php`:

```php
'providers' => [
    // ...
    SAC\EloquentModelGenerator\Providers\EloquentModelGeneratorServiceProvider::class,
];
```

3. Publish the configuration file:

```bash
php artisan vendor:publish --provider="SAC\EloquentModelGenerator\Providers\EloquentModelGeneratorServiceProvider"
```

This will create a `config/eloquent-model-generator.php` configuration file in your app.

4. (Optional) Create a `.env` file in your project root and add any configuration overrides:

```env
EMG_NAMESPACE=App\\Models
EMG_OUTPUT_PATH=app/Models
```

## Verification

To verify the installation:

```bash
php artisan model:generate --help
```

You should see the command help output with available options.

## Next Steps

- Read the [Configuration](./configuration.md) guide to customize the package
- Check the [Basic Usage](./basic-usage.md) guide to start generating models
- Review the [Advanced Usage](./advanced-usage.md) for more features
