# Eloquent Model Generator

[![Latest Version on Packagist](https://img.shields.io/packagist/v/sac/eloquent-model-generator.svg)](https://packagist.org/packages/sac/eloquent-model-generator)
[![Tests](https://github.com/sac/eloquent-model-generator/actions/workflows/ci.yml/badge.svg)](https://github.com/sac/eloquent-model-generator/actions/workflows/ci.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/sac/eloquent-model-generator.svg)](https://packagist.org/packages/sac/eloquent-model-generator)
[![License](https://img.shields.io/packagist/l/sac/eloquent-model-generator.svg)](https://packagist.org/packages/sac/eloquent-model-generator)

Advanced Eloquent model generator with SQLite schema introspection and DDD principles.

## Features

- SQLite schema analysis with relationship detection
- Polymorphic relationship support
- Queue-based processing for large schemas
- Comprehensive documentation generation
- Type-safe implementation with PHP 8.2 features
- DDD and hexagonal architecture principles

## Requirements

- PHP 8.2 or higher
- Laravel 10.x or higher
- SQLite 3.x
- Composer

## Installation

You can install the package via composer:

```bash
composer require sac/eloquent-model-generator
```

## Environment Configuration

The package uses EMG_-prefixed environment variables for configuration:

```env
EMG_DEBUG=true
EMG_ENVIRONMENT=development
EMG_DATABASE_DRIVER=sqlite
EMG_DATABASE_PATH=/path/to/database.sqlite
EMG_CACHE_DRIVER=file
EMG_QUEUE_CONNECTION=sync
```

## Usage

```bash
# Generate models for all tables
php artisan model:generate

# Generate specific model
php artisan model:generate --table=users

# Generate with documentation
php artisan model:generate --with-docs

# Analyze schema only
php artisan model:generate --analyze
```

## Configuration

Publish the configuration file:

```bash
php artisan vendor:publish --tag="model-generator-config"
```

## Testing

```bash
composer test        # Run Pest tests
composer test:coverage # Run tests with coverage
composer test:mutation # Run mutation tests
```

## Static Analysis

```bash
composer analyse    # Run PHPStan
composer format     # Run PHP-CS-Fixer
```

## Contributing

Please see [CONTRIBUTING.md](CONTRIBUTING.md) for details.

### Development Setup

1. Clone the repository
2. Install dependencies:

```bash
composer install
```

3. Start the development environment:

```bash
docker-compose up -d
```

4. Run tests:

```bash
composer test
```

## Security

If you discover any security related issues, please email <security@example.com> instead of using the issue tracker.

## Credits

- [SAC](https://github.com/sac)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
