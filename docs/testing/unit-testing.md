# Unit Testing Guide

This guide covers the unit testing setup and practices for the Eloquent Model Generator package.

## Setup

### Requirements

- PHP 8.1 or higher
- PHPUnit 10.0 or higher
- Mockery for mocking
- Orchestra Testbench for Laravel testing

### Installation

```bash
composer require --dev phpunit/phpunit:^10.0
composer require --dev mockery/mockery
composer require --dev orchestra/testbench
```

## Test Structure

Tests are organized in the `tests/Unit` directory following this structure:

```
tests/Unit/
├── Commands/
│   ├── GenerateCommandTest.php
│   ├── AnalyzeCommandTest.php
│   ├── FixCommandTest.php
│   └── MetricsCommandTest.php
├── Services/
│   ├── Generator/
│   │   └── ModelGeneratorServiceTest.php
│   ├── Schema/
│   │   ├── BaseSchemaAnalyzerTest.php
│   │   ├── MySQLSchemaAnalyzerTest.php
│   │   └── PostgreSQLSchemaAnalyzerTest.php
│   ├── Relations/
│   │   └── RelationDetectorServiceTest.php
│   ├── Template/
│   │   └── DefaultModelTemplateTest.php
│   └── TypeInference/
│       └── TypeInferenceServiceTest.php
└── ValueObjects/
    ├── ColumnTest.php
    └── ForeignKeyTest.php
```

## Writing Tests

### Base Test Case

All unit tests should extend the base test case:

```php
use PHPUnit\Framework\TestCase;
use Mockery;

class YourTest extends TestCase
{
    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}
```

### Mocking Dependencies

Use Mockery for mocking:

```php
use Mockery;

$mock = Mockery::mock(SchemaAnalyzer::class);
$mock->shouldReceive('analyze')
    ->with('users')
    ->andReturn([
        'columns' => [],
        'relationships' => [],
    ]);
```

### Testing Value Objects

Value objects should be tested for immutability:

```php
public function testColumnIsImmutable(): void
{
    $column = new Column('name', 'string', false, false, false, false);

    $this->assertSame('name', $column->getName());
    $this->assertSame('string', $column->getType());
}
```

### Testing Services

Services should be tested with mocked dependencies:

```php
public function testModelGeneration(): void
{
    $schemaAnalyzer = Mockery::mock(SchemaAnalyzer::class);
    $typeInference = Mockery::mock(TypeInference::class);
    $relationDetector = Mockery::mock(RelationDetector::class);

    $generator = new ModelGeneratorService(
        $schemaAnalyzer,
        $typeInference,
        $relationDetector
    );

    // Test the service
}
```

## Test Categories

### Unit Tests

- Test individual components in isolation
- Mock all dependencies
- Focus on single responsibility
- Test edge cases
- Verify error handling

### Integration Tests

- Test component interactions
- Use real dependencies where practical
- Test common workflows
- Verify system integration

### Feature Tests

- Test complete features
- Use real database connections
- Test command-line interface
- Verify end-to-end functionality

## Best Practices

### Test Organization

1. Arrange-Act-Assert pattern
2. Clear test method names
3. One assertion per test
4. Descriptive test data
5. Proper setup and teardown

Example:
```php
public function testGenerateCreatesExpectedModel(): void
{
    // Arrange
    $schema = $this->getTestSchema();
    $generator = $this->createGenerator();

    // Act
    $result = $generator->generate('users', $schema);

    // Assert
    $this->assertInstanceOf(GeneratedModel::class, $result);
}
```

### Mocking

1. Mock at interface boundaries
2. Use strict mocking
3. Verify mock expectations
4. Clear mock setup
5. Avoid partial mocks

Example:
```php
$mock = Mockery::mock(SchemaAnalyzer::class);
$mock->shouldReceive('analyze')
    ->once()
    ->with('users')
    ->andReturn($schema);
```

### Data Providers

Use data providers for multiple test cases:

```php
/**
 * @dataProvider provideColumnTypes
 */
public function testColumnTypeMapping(string $dbType, string $phpType): void
{
    $column = new Column('test', $dbType, false, false, false, false);
    $this->assertSame($phpType, $column->getPhpType());
}

public function provideColumnTypes(): array
{
    return [
        ['integer', 'int'],
        ['string', 'string'],
        ['boolean', 'bool'],
        // ...
    ];
}
```

## Running Tests

### Single Test

```bash
./vendor/bin/phpunit tests/Unit/Path/To/Test.php
```

### Test Suite

```bash
./vendor/bin/phpunit
```

### With Coverage

```bash
./vendor/bin/phpunit --coverage-html coverage
```

## Continuous Integration

### GitHub Actions

```yaml
name: Tests

on: [push, pull_request]

jobs:
  test:
    runs-on: ubuntu-latest

    steps:
    - uses: actions/checkout@v2

    - name: Setup PHP
      uses: shivammathur/setup-php@v2
      with:
        php-version: '8.1'

    - name: Install Dependencies
      run: composer install

    - name: Execute tests
      run: vendor/bin/phpunit
```

## Code Coverage

- Aim for 90%+ coverage
- Focus on critical paths
- Include edge cases
- Test error conditions
- Document uncovered code

## Debugging Tests

1. Use `var_dump()` or `print_r()`
2. Enable PHPUnit debug mode
3. Use xdebug for step debugging
4. Check Mockery expectations
5. Review test logs

## Resources

- [PHPUnit Documentation](https://phpunit.de/documentation.html)
- [Mockery Documentation](http://docs.mockery.io/)
- [Laravel Testing Documentation](https://laravel.com/docs/testing)
- [Orchestra Testbench Documentation](https://packages.tools/testbench)
