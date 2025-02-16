# Feature Testing Guide

This guide covers feature testing for the Eloquent Model Generator package.

## Overview

Feature tests verify the package's functionality from an end-user perspective, testing complete features and command-line interfaces.

## Setup

### Requirements

- Laravel installation
- Test database
- Package installed and configured
- Orchestra Testbench

### Test Database Configuration

```php
// config/database.php
return [
    'connections' => [
        'testing' => [
            'driver' => 'sqlite',
            'database' => ':memory:',
        ],
    ],
];
```

## Test Structure

Tests are organized in the `tests/Feature` directory:

```
tests/Feature/
├── Commands/
│   ├── GenerateCommandTest.php
│   ├── AnalyzeCommandTest.php
│   ├── FixCommandTest.php
│   └── MetricsCommandTest.php
├── Config/
│   ├── ConfigurationTest.php
│   └── ConfigurationErrorTest.php
├── Error/
│   └── ErrorHandlingTest.php
├── Edge/
│   └── EdgeCaseTest.php
└── Models/
    ├── RelationshipTest.php
    ├── ValidationTest.php
    └── AttributeTest.php
```

## Writing Feature Tests

### Base Test Case

```php
use Orchestra\Testbench\TestCase;

class YourFeatureTest extends TestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            'SAC\EloquentModelGenerator\Providers\ModelGeneratorServiceProvider',
        ];
    }

    protected function setUp(): void
    {
        parent::setUp();

        // Set up test database
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
        $this->artisan('migrate:fresh');
    }
}
```

### Testing Commands

Test command execution and output:

```php
public function testGenerateCommand(): void
{
    $this->artisan('model:generate', [
        'table' => 'users',
        '--namespace' => 'App\\Models',
    ])
    ->assertSuccessful()
    ->expectsOutput('Generating model for table: users')
    ->expectsOutput('Model generated successfully');

    $this->assertFileExists(app_path('Models/User.php'));
}
```

### Testing Configuration

Test configuration loading and validation:

```php
public function testConfigurationLoading(): void
{
    config(['model-generator.namespace' => 'App\\Domain\\Models']);

    $this->artisan('model:generate', ['table' => 'users'])
        ->assertSuccessful();

    $this->assertFileExists(app_path('Domain/Models/User.php'));
}
```

### Testing Error Scenarios

Test error handling and user feedback:

```php
public function testHandlesNonExistentTable(): void
{
    $this->artisan('model:generate', [
        'table' => 'non_existent_table',
    ])
    ->assertFailed()
    ->expectsOutput('Table not found: non_existent_table');
}
```

## Test Categories

### Command Execution

- Command arguments and options
- Command output and feedback
- Exit codes and status
- File generation
- Error handling

### Configuration Handling

- Config file loading
- Environment variables
- Validation rules
- Default values
- Custom settings

### Error Scenarios

- Invalid input
- Database errors
- File system errors
- Permission issues
- Timeout handling

### Edge Cases

- Large schemas
- Special characters
- Reserved words
- Unicode support
- Long identifiers

## Best Practices

### Database Setup

1. Use SQLite in-memory database
2. Fresh migrations for each test
3. Seed test data
4. Clean up after tests
5. Handle database errors

Example:
```php
protected function defineEnvironment($app): void
{
    $app['config']->set('database.default', 'testing');
    $app['config']->set('database.connections.testing', [
        'driver' => 'sqlite',
        'database' => ':memory:',
    ]);
}
```

### File System

1. Use temporary directories
2. Clean up generated files
3. Check file permissions
4. Verify file contents
5. Handle path issues

Example:
```php
protected function setUp(): void
{
    parent::setUp();

    // Create temporary directory
    $this->tempDir = sys_get_temp_dir() . '/model-generator-test';
    mkdir($this->tempDir);

    config(['model-generator.path' => $this->tempDir]);
}

protected function tearDown(): void
{
    // Clean up
    $this->filesystem->deleteDirectory($this->tempDir);
    parent::tearDown();
}
```

### Command Testing

1. Test all options
2. Verify output
3. Check side effects
4. Test interactions
5. Validate results

Example:
```php
public function testCommandOptions(): void
{
    $this->artisan('model:generate', [
        'table' => 'users',
        '--namespace' => 'App\\Models',
        '--with-relationships' => true,
        '--with-validation' => true,
    ])
    ->assertSuccessful()
    ->expectsOutput('Generating model...')
    ->expectsOutput('Adding relationships...')
    ->expectsOutput('Adding validation...')
    ->expectsOutput('Done!');
}
```

## Running Tests

### Single Feature

```bash
./vendor/bin/phpunit tests/Feature/Commands/GenerateCommandTest.php
```

### All Features

```bash
./vendor/bin/phpunit tests/Feature
```

### With Coverage

```bash
./vendor/bin/phpunit --coverage-html coverage tests/Feature
```

## Continuous Integration

### GitHub Actions Example

```yaml
name: Feature Tests

on: [push, pull_request]

jobs:
  feature-tests:
    runs-on: ubuntu-latest

    services:
      mysql:
        image: mysql:8.0
        env:
          MYSQL_DATABASE: testing
          MYSQL_ROOT_PASSWORD: password
        ports:
          - 3306:3306
        options: --health-cmd="mysqladmin ping"

    steps:
    - uses: actions/checkout@v2

    - name: Setup PHP
      uses: shivammathur/setup-php@v2
      with:
        php-version: '8.1'
        extensions: pdo_mysql

    - name: Run Feature Tests
      run: vendor/bin/phpunit tests/Feature
```

## Debugging

### Common Issues

1. Database connection failures
2. File permission problems
3. Path resolution issues
4. Configuration mismatches
5. Timing problems

### Solutions

1. Check database credentials
2. Verify directory permissions
3. Use absolute paths
4. Validate configuration
5. Add timeouts

## Resources

- [Laravel Testing Documentation](https://laravel.com/docs/testing)
- [Orchestra Testbench Documentation](https://packages.tools/testbench)
- [PHPUnit Documentation](https://phpunit.de/documentation.html)
- [GitHub Actions Documentation](https://docs.github.com/en/actions)
