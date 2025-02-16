# Eloquent Model Generator

A Laravel package for generating Eloquent models with comprehensive SQLite support.

## Features

### SQLite Support
- Complete schema analysis with table structure detection
- Comprehensive type mapping for all SQLite data types
- Full relationship detection (including polymorphic)
- Real database integration and testing

### Model Generation
- Base model generation with validation support
- Factory generation with state definitions
- Policy generation with CRUD methods
- Resource generation with conditional fields

### Testing & Documentation
- Comprehensive test suite
- Performance benchmarks
- API documentation
- Usage examples

## Installation

```bash
composer require standalonecomplexdev/eloquent-model-generator
```

## Basic Usage

```php
use SAC\EloquentModelGenerator\ModelGenerator;
use SAC\EloquentModelGenerator\Support\Definitions\ModelDefinition;

// Initialize generator
$generator = new ModelGenerator();

// Create model definition
$definition = new ModelDefinition('User', 'App\\Models');
$definition->withValidation()
          ->withFactory()
          ->withPolicy()
          ->withResource();

// Generate model
$model = $generator->generate($definition, $schema);
```

## Documentation

For detailed documentation, please visit:
- [Overview](docs/index.md)
- [SQLite Support](docs/sqlite-support.md)
- [Model Generation](docs/model-generation.md)
- [Testing Guide](docs/testing.md)

## Contributing

Please see [CONTRIBUTING.md](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email security@standalonecomplexdev.com.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
