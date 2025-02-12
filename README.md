# Eloquent Model Generator

[![Latest Version on Packagist](https://img.shields.io/packagist/v/s-a-c/eloquent-model-generator.svg?style=flat-square)](https://packagist.org/packages/s-a-c/eloquent-model-generator)
[![Total Downloads](https://img.shields.io/packagist/dt/s-a-c/eloquent-model-generator.svg?style=flat-square)](https://packagist.org/packages/s-a-c/eloquent-model-generator)
[![Tests](https://github.com/s-a-c/eloquent-model-generator/actions/workflows/run-tests.yml/badge.svg?branch=main)](https://github.com/s-a-c/eloquent-model-generator/actions/workflows/run-tests.yml)
[![Check & fix styling](https://github.com/s-a-c/eloquent-model-generator/actions/workflows/fix-php-code-style-issues.yml/badge.svg?branch=main)](https://github.com/s-a-c/eloquent-model-generator/actions/workflows/fix-php-code-style-issues.yml)
[![Type Coverage](https://shepherd.dev/github/s-a-c/eloquent-model-generator/coverage.svg)](https://shepherd.dev/github/s-a-c/eloquent-model-generator)

A high-performance Laravel package that automatically generates Eloquent models from your database schema. Features include relationship detection, validation rules generation, parallel processing, and customizable templates.

## Features

- 🚀 High-performance schema analysis with parallel processing
- 🔄 Automatic relationship detection
- ✨ Validation rules generation
- 🎨 Customizable templates
- 📝 PSR-12 compliant code generation
- 🛠️ Comprehensive configuration options
- 🧪 Extensive test suite with Pest framework
- ⚡ Parallel model generation support
- 📊 Performance monitoring and profiling
- 🔍 Type coverage analysis
- 🔄 Parallel testing capabilities
- 💾 Multi-database platform support
- 🔬 Stress testing support
- 📈 Load testing capabilities

## Requirements

- PHP 8.1 or higher
- Laravel 9.0 or higher
- Composer 2.0 or higher
- ext-parallel extension

## Installation

```bash
composer require s-a-c/eloquent-model-generator
```

Publish the configuration:

```bash
php artisan vendor:publish --provider="StandAlonecomplex\\EloquentModelGenerator\\EloquentModelGeneratorServiceProvider"
```

## Quick Start

Generate models for all tables:

```bash
php artisan model:generate
```

Generate specific models:

```bash
php artisan model:generate --table=users,posts
```

## Basic Usage

```php
use StandAlonecomplex\EloquentModelGenerator\Contracts\ModelGeneratorService;
use StandAlonecomplex\EloquentModelGenerator\Contracts\ParallelModelGeneratorService;

// Standard model generation
public function generate(ModelGeneratorService $generator)
{
    // Generate a single model
    $model = $generator->generateModel('users');

    // Generate multiple models
    $models = $generator->generateBatch(['users', 'posts']);
}

// Parallel model generation
public function generateParallel(ParallelModelGeneratorService $generator)
{
    // Generate multiple models in parallel
    $models = $generator->generateModels(['users', 'posts', 'comments']);
}
```

## Testing

The package uses Pest PHP testing framework with various plugins for comprehensive testing:

```bash
# Quick Start
composer test              # Run all tests
composer test:all         # Run all test suites in sequence
composer test:fast        # Run unit and feature tests in parallel
composer test:ci          # Run tests for CI with coverage requirements

# Database Platform Testing
composer test:db          # Run tests for all database platforms
composer test:all-mysql   # Run all tests on MySQL
composer test:all-pgsql   # Run all tests on PostgreSQL
composer test:all-sqlite  # Run all tests on SQLite
composer test:all-sqlsrv  # Run all tests on SQL Server

# Coverage and Analysis
composer test-coverage     # Run tests with coverage
composer test:coverage-html # Generate HTML coverage report
composer test:watch-coverage # Watch tests with coverage
composer test-type-coverage # Run type coverage analysis
composer test:types        # Run type analysis with minimum threshold

# Quality and Compliance
composer test:lint         # Run architecture and type checks
composer test-architecture # Run architecture tests
composer test:drift        # Check for architectural drift
composer test:stress       # Run stress tests

# Test Categories (Available for all database platforms)
composer test:unit        # Run unit tests
composer test:unit-mysql  # Run unit tests on MySQL
composer test:unit-pgsql  # Run unit tests on PostgreSQL
composer test:unit-sqlite # Run unit tests on SQLite
composer test:unit-sqlsrv # Run unit tests on SQL Server

composer test:feature        # Run feature tests
composer test:feature-mysql  # Run feature tests on MySQL
composer test:feature-pgsql  # Run feature tests on PostgreSQL
composer test:feature-sqlite # Run feature tests on SQLite
composer test:feature-sqlsrv # Run feature tests on SQL Server

composer test:integration        # Run integration tests
composer test:integration-mysql  # Run integration tests on MySQL
composer test:integration-pgsql  # Run integration tests on PostgreSQL
composer test:integration-sqlite # Run integration tests on SQLite
composer test:integration-sqlsrv # Run integration tests on SQL Server

# Database-specific Tests
composer test:mysql       # Run MySQL-specific tests
composer test:pgsql       # Run PostgreSQL-specific tests
composer test:sqlite      # Run SQLite-specific tests
composer test:sqlsrv      # Run SQL Server-specific tests

# Specialized Tests (Available for all database platforms)
composer test:memory-intensive         # Run memory-intensive tests
composer test:memory-intensive-mysql   # Run memory-intensive tests on MySQL
composer test:memory-intensive-pgsql   # Run memory-intensive tests on PostgreSQL
composer test:memory-intensive-sqlite  # Run memory-intensive tests on SQLite
composer test:memory-intensive-sqlsrv  # Run memory-intensive tests on SQL Server

composer test:relationships         # Run relationship tests
composer test:relationships-mysql   # Run relationship tests on MySQL
composer test:relationships-pgsql   # Run relationship tests on PostgreSQL
composer test:relationships-sqlite  # Run relationship tests on SQLite
composer test:relationships-sqlsrv  # Run relationship tests on SQL Server

composer test:concurrency         # Run concurrency tests
composer test:concurrency-mysql   # Run concurrency tests on MySQL
composer test:concurrency-pgsql   # Run concurrency tests on PostgreSQL
composer test:concurrency-sqlite  # Run concurrency tests on SQLite
composer test:concurrency-sqlsrv  # Run concurrency tests on SQL Server

composer test:edge-cases         # Run edge case tests
composer test:edge-cases-mysql   # Run edge case tests on MySQL
composer test:edge-cases-pgsql   # Run edge case tests on PostgreSQL
composer test:edge-cases-sqlite  # Run edge case tests on SQLite
composer test:edge-cases-sqlsrv  # Run edge case tests on SQL Server

# Development Tools
composer test-parallel    # Run tests in parallel
composer test-profile     # Run performance profiling
composer test-memory      # Run memory usage analysis
composer test-watch      # Watch for changes and run tests
composer test-snapshot   # Run snapshot tests
```

### Test Groups

The tests are organized into several groups and can be run on specific database platforms:

- **Unit Tests**: Basic unit tests for individual components
- **Feature Tests**: Feature-level functionality tests
- **Integration Tests**: Tests for component integration
- **Performance Tests**: Tests for performance benchmarks
- **Architecture Tests**: Tests for architectural compliance
- **Database Tests**: Database-specific test suites
  - MySQL-specific features and optimizations
  - PostgreSQL-specific features and optimizations
  - SQLite-specific features and optimizations
  - SQL Server-specific features and optimizations
- **Edge Cases**: Tests for boundary conditions and edge cases
- **Specialized Tests**: Tests for specific features or conditions

### Database Platform Support

Each test group can be run against specific database platforms:
- **MySQL**: Full support for MySQL 5.7+ and MariaDB 10.2+
- **PostgreSQL**: Full support for PostgreSQL 10.0+
- **SQLite**: Full support for SQLite 3.8.8+
- **SQL Server**: Full support for SQL Server 2017+

### Coverage Requirements

- Code Coverage: Minimum 80% (enforced in CI)
- Type Coverage: Minimum 90%
- Architecture Compliance: 100% drift-free
- Platform Coverage: All supported database platforms must pass tests

## Documentation

For detailed documentation, please visit:

- [Installation Guide](docs/installation.md)
- [Configuration](docs/configuration.md)
- [Basic Usage](docs/basic-usage.md)
- [Advanced Usage](docs/advanced-usage.md)
- [API Reference](docs/api-reference.md)
- [Performance Guide](docs/performance.md)
- [Testing Guide](docs/testing.md)

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [StandAloneComplex](https://github.com/s-a-c)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
