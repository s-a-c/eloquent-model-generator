# Testing Guide

This guide covers the testing capabilities and best practices for the Eloquent Model Generator package.

## Overview

The package uses Pest PHP for testing and includes:
- Unit tests
- Feature tests
- Integration tests
- Performance tests
- Database-specific tests
- Parallel testing support
- Memory usage tests
- Stress tests
- Edge case tests

## Quick Start

### Running All Tests

```bash
# Run all tests
composer test:all

# Run tests in parallel
composer test:fast

# Run tests with coverage
composer test:coverage-html
```

### Running Tests by Category

```bash
# Unit tests
composer test:unit

# Feature tests
composer test:feature

# Integration tests
composer test:integration

# Performance tests
composer test:performance
```

### Database-Specific Tests

```bash
# MySQL tests
composer test:all-mysql

# PostgreSQL tests
composer test:all-pgsql

# SQLite tests
composer test:all-sqlite

# SQL Server tests
composer test:all-sqlsrv
```

## Test Organization

### 1. Unit Tests

Located in `tests/Unit`, these test individual components:
- Model definition parsing
- Template rendering
- Configuration handling
- Relationship detection
- Validation rules generation

### 2. Feature Tests

Located in `tests/Feature`, these test complete features:
- Model generation workflow
- Command line interface
- Configuration publishing
- Template customization
- Relationship mapping

### 3. Integration Tests

Located in `tests/Integration`, these test component interaction:
- Database schema analysis
- Model generation pipeline
- Template system integration
- Event handling
- Cache integration

### 4. Performance Tests

Located in `tests/Performance`, these test system performance:
- Query execution time
- Memory usage
- Cache effectiveness
- Parallel processing
- Resource utilization

## Test Groups

### 1. Core Functionality

```bash
# Test core features
composer test:core

# Test model generation
composer test:models

# Test relationships
composer test:relationships
```

### 2. Database Support

```bash
# Test MySQL support
composer test:mysql

# Test PostgreSQL support
composer test:pgsql

# Test SQLite support
composer test:sqlite

# Test SQL Server support
composer test:sqlsrv
```

### 3. Special Cases

```bash
# Test memory-intensive operations
composer test:memory-intensive

# Test concurrent operations
composer test:concurrency

# Test edge cases
composer test:edge-cases
```

## Writing Tests

### 1. Basic Test Structure

```php
use SAC\EloquentModelGenerator\Tests\TestCase;

test('generates model with relationships', function () {
    // Arrange
    $generator = new ModelGenerator();
    $config = ['table' => 'users'];

    // Act
    $model = $generator->generate($config);

    // Assert
    expect($model)
        ->toHaveProperty('relationships')
        ->and($model->relationships)
        ->toHaveCount(2);
});
```

### 2. Using Test Traits

```php
use SAC\EloquentModelGenerator\Tests\Support\Traits\WithDatabaseConnection;
use SAC\EloquentModelGenerator\Tests\Support\Traits\WithModelGeneration;

test('generates model from database', function () {
    // Database connection is automatically handled
    $table = $this->createTestTable();

    // Generate model using trait helper
    $model = $this->generateModel($table);

    // Assertions
    expect($model)->toBeInstanceOf(GeneratedModel::class);
})->uses(WithDatabaseConnection::class, WithModelGeneration::class);
```

### 3. Testing Database Operations

```php
use SAC\EloquentModelGenerator\Tests\Support\Traits\WithDatabasePlatform;

test('supports platform-specific features', function () {
    // Test on each platform
    $this->forEachPlatform(function ($platform) {
        $generator = new ModelGenerator();
        $model = $generator->generate('users');

        expect($model->platform_features)
            ->toContain($platform->getSpecificFeatures());
    });
})->uses(WithDatabasePlatform::class);
```

## Test Coverage

### 1. Code Coverage

```bash
# Generate HTML coverage report
composer test:coverage-html

# Check coverage thresholds
composer test:coverage
```

### 2. Type Coverage

```bash
# Check type coverage
composer test:types

# Generate type coverage report
composer test:type-coverage
```

### 3. Architecture Coverage

```bash
# Run architecture tests
composer test:lint

# Check architectural rules
composer test:architecture
```

## Continuous Integration

### 1. GitHub Actions

```yaml
name: Tests

on: [push, pull_request]

jobs:
  test:
    runs-on: ubuntu-latest
    strategy:
      matrix:
        php: ['8.1', '8.2', '8.3']
        stability: [prefer-lowest, prefer-stable]

    steps:
      - uses: actions/checkout@v2

      - name: Setup PHP
        uses: shivammathur/setup-php@v2
        with:
          php-version: ${{ matrix.php }}
          extensions: dom, curl, libxml, mbstring, zip, pcntl, pdo
          coverage: pcov

      - name: Install dependencies
        run: composer update --${{ matrix.stability }} --prefer-dist --no-interaction

      - name: Run tests
        run: composer test:all
```

### 2. Coverage Requirements

- Code Coverage: Minimum 90%
- Type Coverage: Minimum 95%
- Architecture Compliance: 100%

## Development Workflow

### 1. Test-Driven Development

1. Write failing test
2. Implement feature
3. Run tests
4. Refactor
5. Repeat

### 2. Testing New Features

1. Add unit tests for new components
2. Add feature tests for new functionality
3. Add integration tests for component interaction
4. Add performance tests if relevant
5. Update documentation

### 3. Debugging Tests

```bash
# Run tests with debugging
composer test:debug

# Run specific test with debugging
composer test:debug -- --filter=test_name

# Profile test performance
composer test:profile
```

## Best Practices

### 1. Test Organization

- Group related tests
- Use descriptive test names
- Follow Arrange-Act-Assert pattern
- Keep tests focused and isolated

### 2. Test Data

- Use factories for test data
- Clean up after tests
- Use realistic data sets
- Handle edge cases

### 3. Performance

- Use parallel testing when possible
- Clean up resources
- Monitor memory usage
- Profile slow tests

## Troubleshooting

### 1. Common Issues

- Database connection failures
- Memory exhaustion
- Slow test execution
- Platform-specific failures

### 2. Solutions

- Check database configuration
- Use memory profiling
- Enable parallel testing
- Use platform-specific traits

## Next Steps

- Review [Performance Testing](./performance-testing.md) for detailed performance testing
- Check [Configuration](./configuration.md) for test-related settings
- See [Contributing](./contributing.md) for contribution guidelines
