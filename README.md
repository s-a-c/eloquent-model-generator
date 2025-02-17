# Eloquent Model Generator

A Laravel package for generating Eloquent models with comprehensive type support and relationship detection.

## Features

- Rich domain model implementation
- Comprehensive type system
- Functional programming utilities
- Domain services for model generation
- Laravel integration
- Flexible configuration system

## Installation

```bash
composer require sac/eloquent-model-generator
```

## Usage

```php
use SAC\EloquentModelGenerator\ModelGenerator;

$generator = app(ModelGenerator::class);
$generator->generate('users');
```

## Development

### Requirements

- PHP 8.2+
- Laravel 10.0+
- Composer 2.0+

### Setup

1. Clone the repository
2. Install dependencies:

   ```bash
   composer install
   ```

3. Run tests:

   ```bash
   ./vendor/bin/pest
   ```

### Testing Principles

This project follows strict testing and static analysis principles:

1. All tests must be written in Pest format
2. Tests and results must be catalogued in sprint logs
3. Static analysis must pass at:
   - PHPStan/Larastan level 8
   - Psalm error level 1
4. All results must be documented

See [Testing Principles](docs/testing-principles.md) for detailed guidelines.

### Quality Assurance

- All code must pass static analysis:

  ```bash
  composer analyse
  ```

- All tests must pass:

  ```bash
  composer test
  ```

- Type coverage must be maintained:

  ```bash
  composer type-coverage
  ```

### Documentation

- [Testing Principles](docs/testing-principles.md)
- [Model Casting Assertions](docs/model-casting-assertions.md)
- [Version History](VERSION_HISTORY.md)

## Contributing

Please see [CONTRIBUTING.md](CONTRIBUTING.md) for details.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
