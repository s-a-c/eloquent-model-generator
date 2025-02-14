# Eloquent Model Generator

Generate and analyze Eloquent models from your database schema with advanced features and static analysis.

## Quick Start

```bash
# Install
composer require sac/eloquent-model-generator

# Generate models
php artisan model:generate

# Analyze models
php artisan model:analyze
```

## Features

### Model Generation
- Automatic schema analysis
- Type inference
- Relation detection
- Custom attributes
- Template support

### Code Quality
- Static analysis
- Type checking
- Style enforcement
- Metrics generation
- Security validation

## Documentation

### Core Features
1. [Model Generation](features/generation.md)
   - Schema analysis
   - Type inference
   - Relation detection
   - Custom attributes

2. [Model Analysis](features/analysis.md)
   - Static analysis
   - Type checking
   - Code quality
   - Metrics

### Configuration
1. [Basic Configuration](config/basic.md)
   - Database connection
   - Namespace settings
   - Output paths

2. [Advanced Configuration](config/advanced.md)
   - Custom templates
   - Type mappings
   - Naming conventions
   - Analysis rules

### Development
1. [Testing](dev/testing.md)
   - Unit tests
   - Feature tests
   - Performance tests

2. [Contributing](dev/contributing.md)
   - Setup guide
   - Coding standards
   - Pull requests

### Tools
1. [Analysis Tools](tools/analysis-tools.md)
   - PHPStan/Larastan
   - Psalm
   - Rector
   - PHPMD
   - Metrics

## Requirements

- PHP 8.3+
- Laravel 10.x
- MySQL/PostgreSQL/SQLite

## Support

- [Issues](https://github.com/stand-alone-complex/eloquent-model-generator/issues)
- [Security](security.md)
- [Code of Conduct](code_of_conduct.md)

## License

[MIT License](license.md)
