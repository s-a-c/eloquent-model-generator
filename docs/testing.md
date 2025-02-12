# Testing Guide

This guide covers the testing features and best practices for the Eloquent Model Generator package.

## Table of Contents

1. [Overview](#overview)
2. [Test Data Management](#test-data-management)
3. [Performance Testing](#performance-testing)
4. [Edge Cases](#edge-cases)
5. [Best Practices](#best-practices)

## Overview

The package includes a comprehensive test suite with various testing tools and helpers to ensure code quality and reliability.

### Key Testing Features

- JSON/YAML test data loading
- Performance monitoring and profiling
- Edge case testing
- Parallel test execution
- Memory leak detection
- Query analysis

## Test Data Management

### Using the WithTestData Trait

The package provides a powerful `WithTestData` trait for managing test data in JSON and YAML formats. See [Test Data Loading](test-data-loading.md) for detailed documentation.

Quick example:

```php
use SAC\EloquentModelGenerator\Tests\Support\Traits\WithTestData;

class YourTest extends TestCase
{
    use WithTestData;

    public function test_model_generation(): void
    {
        // Load test schema
        $schema = $this->loadTestData('models/user.json');

        // Generate and test model
        $model = $this->generator->fromSchema($schema);
        $this->assertModelMatchesSchema($model, $schema);
    }
}
```

### Test Data Organization

Organize your test data files in the `tests/datasets` directory:

```
tests/
├── datasets/
│   ├── models/          # Model definitions
│   ├── schemas/         # Database schemas
│   ├── relationships/   # Relationship tests
│   └── edge-cases/      # Edge case scenarios
```

## Performance Testing

The package includes tools for performance testing:

- Query count tracking
- Memory usage analysis
- Execution time measurement
- Resource cleanup verification

See [Performance Testing](performance-testing.md) for details.

## Edge Cases

Comprehensive edge case testing is available for:

- Complex relationships
- Nested JSON structures
- Dynamic attribute casting
- Schema variations

See [Edge Cases](edge-cases.md) for more information.

## Best Practices

1. **Data Organization**
   - Keep test data files organized in meaningful directories
   - Use descriptive file names
   - Document data structure in comments

2. **Test Data Format**
   - Use JSON for complex structures
   - Use YAML for readable configurations
   - Keep files focused and minimal

3. **Performance Considerations**
   - Load only needed data sections
   - Clean up test data after use
   - Use appropriate file format for size/complexity

4. **Test Structure**
   - Group related tests
   - Use descriptive test names
   - Document test purpose and requirements

## Running Tests

### Basic Test Execution

```bash
composer test
```

### Specific Test Groups

```bash
composer test:unit          # Unit tests
composer test:feature       # Feature tests
composer test:integration   # Integration tests
composer test:performance   # Performance tests
```

### Database-Specific Tests

```bash
composer test:mysql         # MySQL tests
composer test:pgsql         # PostgreSQL tests
composer test:sqlite        # SQLite tests
```

### Test Coverage

```bash
composer test:coverage      # Generate coverage report
composer test:coverage-html # Generate HTML coverage report
```

## Continuous Integration

The package includes CI configurations for:

- GitHub Actions
- Travis CI
- CircleCI

See the respective configuration files in the `.github/workflows` directory.

## Contributing Tests

When contributing new features:

1. Add appropriate test data files
2. Write comprehensive tests
3. Include performance tests if relevant
4. Document test requirements
5. Follow existing test patterns

## Additional Resources

- [Test Data Loading Documentation](test-data-loading.md)
- [Performance Testing Guide](performance-testing.md)
- [Edge Case Testing](edge-cases.md)
- [Contributing Guidelines](../CONTRIBUTING.md)
