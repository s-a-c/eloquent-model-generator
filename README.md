# Eloquent Model Generator

[![Latest Version on Packagist](https://img.shields.io/packagist/v/sac/eloquent-model-generator.svg)](https://packagist.org/packages/sac/eloquent-model-generator)
[![Tests](https://github.com/stand-alone-complex/eloquent-model-generator/actions/workflows/tests.yml/badge.svg)](https://github.com/stand-alone-complex/eloquent-model-generator/actions/workflows/tests.yml)
[![Static Analysis](https://github.com/stand-alone-complex/eloquent-model-generator/actions/workflows/static.yml/badge.svg)](https://github.com/stand-alone-complex/eloquent-model-generator/actions/workflows/static.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/sac/eloquent-model-generator.svg)](https://packagist.org/packages/sac/eloquent-model-generator)

Generate and analyze Eloquent models from your database schema with advanced features and static analysis.

## Features

- 🚀 **Intelligent Schema Analysis**
  - Automatic type detection
  - Relation inference
  - Foreign key validation

- 🔍 **Code Quality**
  - Static analysis integration
  - Type safety checks
  - Code style enforcement

- ⚙️ **Customization**
  - Custom templates
  - Type mappings
  - Naming conventions

## Quick Start

```bash
# Install via Composer
composer require sac/eloquent-model-generator

# Generate models
php artisan model:generate

# Analyze models
php artisan model:analyze
```

## Documentation

Comprehensive documentation is available in the [docs](docs/index.md) directory:

- [Model Generation](docs/features/generation.md)
- [Model Analysis](docs/features/analysis.md)
- [Configuration](docs/config/basic.md)
- [Contributing](docs/dev/contributing.md)

## Requirements

- PHP 8.3+
- Laravel 10.x
- MySQL/PostgreSQL/SQLite

## Testing

```bash
composer test
```

## Security

Please review our [Security Policy](docs/security.md) for reporting vulnerabilities.

## Contributing

Please see our [Contributing Guide](docs/dev/contributing.md) and [Code of Conduct](docs/code_of_conduct.md).

## License

The MIT License (MIT). Please see [License File](docs/license.md) for more information.
