# Testing Guide

Comprehensive testing suite for model generation and analysis.

## Quick Start

```bash
# Run all tests
composer test

# Run specific test suites
composer test:unit
composer test:feature
composer test:integration
```

## Test Suites

### Unit Tests
Test individual components in isolation.

```bash
# Run unit tests
composer test:unit

# Test specific class
composer test:unit -- --filter=ModelGeneratorTest
```

### Feature Tests
Test complete features end-to-end.

```bash
# Run feature tests
composer test:feature

# Test specific feature
composer test:feature -- --filter=GenerateModelCommandTest
```

### Performance Tests
Measure and profile code execution.

```bash
# Run performance tests
composer test:performance

# Generate performance report
composer test:performance -- --report
```

## Test Data

### Database Fixtures
```php
// tests/Fixtures/database.php
return [
    'tables' => [
        'users' => [
            'columns' => [
                'id' => 'bigint unsigned',
                'name' => 'varchar(255)',
                'email' => 'varchar(255)',
            ],
        ],
    ],
];
```

### Model Assertions
```php
// tests/Feature/ModelGenerationTest.php
$this->assertModelHas('User', [
    'table' => 'users',
    'fillable' => ['name', 'email'],
    'casts' => ['email_verified_at' => 'datetime'],
]);
```

## Coverage Reports

```bash
# Generate coverage report
composer test:coverage

# View coverage report
open build/coverage/index.html
```

## Writing Tests

### Test Case Base Class
```php
use SAC\EloquentModelGenerator\Tests\TestCase;

class YourTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        // Your setup code
    }
}
```

### Common Assertions
```php
// Assert model was generated
$this->assertModelExists('User');

// Assert model has property
$this->assertModelHasProperty('User', 'email');

// Assert model has relation
$this->assertModelHasRelation('User', 'posts', 'hasMany');
```

See [Contributing Guide](contributing.md) for more details.
