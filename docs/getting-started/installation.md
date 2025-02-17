# Installation

## Requirements

- PHP 8.1 or higher
- Laravel 9.0 or higher
- Composer 2.0 or higher

## Installation Steps

1. Install via Composer:
```bash
composer require sac/eloquent-model-generator
```

2. Publish the configuration:
```bash
php artisan vendor:publish --provider="SAC\EloquentModelGenerator\Providers\GeneratorServiceProvider"
```

3. Configure your database connection in `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

## Configuration

The package configuration will be published to `config/eloquent-model-generator.php`:

```php
return [
    // Base path for generated models
    'path' => app_path('Models'),

    // Namespace for generated models
    'namespace' => 'App\\Models',

    // Base model class
    'base_class' => \Illuminate\Database\Eloquent\Model::class,

    // Whether to generate PHPDoc blocks
    'with_docs' => true,

    // Whether to generate type hints
    'with_types' => true,

    // Database connections to support
    'connections' => [
        'mysql',
        'pgsql',
        'sqlite',
        'sqlsrv',
        'mongodb',
    ],

    // Cache configuration
    'cache' => [
        'enabled' => true,
        'ttl' => 3600,
    ],
];
```

## Verification

To verify the installation:

```bash
php artisan model:generate --help
```

You should see the command help output listing all available options.

## Next Steps

- Read the [Quick Start Guide](./quick-start.md)
- Configure [Database Connections](../databases/index.md)
- Explore [Advanced Features](../advanced/index.md)

## Troubleshooting

### Common Issues

1. **Class not found errors**
   - Run `composer dump-autoload`
   - Verify namespace configuration

2. **Permission issues**
   - Ensure write permissions for model directory
   - Check file ownership

3. **Database connection errors**
   - Verify database credentials
   - Check connection configuration

### Getting Help

- Check our [FAQ](../reference/faq.md)
- [Open an issue](https://github.com/SAC/eloquent-model-generator/issues)
- [Join discussions](https://github.com/SAC/eloquent-model-generator/discussions)
