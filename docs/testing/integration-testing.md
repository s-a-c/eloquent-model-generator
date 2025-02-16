# Integration Testing Guide

This guide covers integration testing for the Eloquent Model Generator package.

## Overview

Integration tests verify that different components of the package work together correctly, testing the interaction between services, database connections, and the filesystem.

## Setup

### Requirements

- Multiple database connections (MySQL, PostgreSQL, SQLite)
- Real filesystem access
- Package installed and configured
- Docker for database services

### Docker Setup

```yaml
# docker-compose.yml
version: '3'

services:
  mysql:
    image: mysql:8.0
    environment:
      MYSQL_DATABASE: testing
      MYSQL_ROOT_PASSWORD: password
    ports:
      - "3306:3306"

  postgres:
    image: postgres:14
    environment:
      POSTGRES_DB: testing
      POSTGRES_PASSWORD: password
    ports:
      - "5432:5432"
```

## Test Structure

Tests are organized in the `tests/Integration` directory:

```
tests/Integration/
├── Database/
│   ├── ConnectionTest.php
│   ├── SchemaTest.php
│   └── MigrationTest.php
├── Models/
│   ├── RelationshipTest.php
│   ├── ValidationTest.php
│   └── AttributeTest.php
├── Services/
│   ├── GeneratorTest.php
│   ├── AnalyzerTest.php
│   └── DetectorTest.php
└── System/
    ├── FilesystemTest.php
    ├── CacheTest.php
    └── ConfigTest.php
```

## Writing Integration Tests

### Base Test Case

```php
use Orchestra\Testbench\TestCase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class IntegrationTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        // Set up database connections
        $this->setupDatabases();

        // Create test schema
        $this->createTestSchema();
    }

    protected function setupDatabases(): void
    {
        config([
            'database.connections.mysql_test' => [
                'driver' => 'mysql',
                'host' => env('MYSQL_HOST', '127.0.0.1'),
                'database' => 'testing',
                'username' => 'root',
                'password' => 'password',
            ],
            'database.connections.pgsql_test' => [
                'driver' => 'pgsql',
                'host' => env('POSTGRES_HOST', '127.0.0.1'),
                'database' => 'testing',
                'username' => 'postgres',
                'password' => 'password',
            ],
        ]);
    }
}
```

### Testing Database Connections

```php
public function testDatabaseConnections(): void
{
    // Test MySQL connection
    DB::connection('mysql_test')->select('SELECT 1');
    $this->assertTrue(true, 'MySQL connection successful');

    // Test PostgreSQL connection
    DB::connection('pgsql_test')->select('SELECT 1');
    $this->assertTrue(true, 'PostgreSQL connection successful');
}
```

### Testing Schema Analysis

```php
public function testSchemaAnalysis(): void
{
    $analyzer = $this->app->make(SchemaAnalyzer::class);

    // Create test table
    Schema::create('test_table', function ($table) {
        $table->id();
        $table->string('name');
        $table->timestamps();
    });

    $schema = $analyzer->analyze('test_table');

    $this->assertArrayHasKey('columns', $schema);
    $this->assertArrayHasKey('relationships', $schema);
}
```

## Test Categories

### Database Integration

- Connection management
- Schema analysis
- Query execution
- Transaction handling
- Error recovery

### Service Integration

- Component interaction
- Service dependencies
- Event handling
- Cache integration
- Queue processing

### System Integration

- File operations
- Configuration
- Environment
- Logging
- Performance

## Best Practices

### Database Testing

1. Use separate test databases
2. Clean up after tests
3. Handle connection errors
4. Manage transactions
5. Verify data integrity

Example:
```php
protected function createTestSchema(): void
{
    Schema::create('users', function ($table) {
        $table->id();
        $table->string('name');
        $table->string('email')->unique();
        $table->timestamps();
    });

    Schema::create('posts', function ($table) {
        $table->id();
        $table->foreignId('user_id')->constrained();
        $table->string('title');
        $table->text('content');
        $table->timestamps();
    });
}
```

### Service Testing

1. Test service interactions
2. Verify event handling
3. Check cache integration
4. Test error propagation
5. Monitor performance

Example:
```php
public function testServiceInteraction(): void
{
    $generator = $this->app->make(ModelGenerator::class);
    $analyzer = $this->app->make(SchemaAnalyzer::class);

    $schema = $analyzer->analyze('users');
    $model = $generator->generate('User', $schema);

    $this->assertNotNull($model);
}
```

### System Testing

1. Test file operations
2. Verify configurations
3. Check environment handling
4. Test logging
5. Monitor resource usage

Example:
```php
public function testFileOperations(): void
{
    $generator = $this->app->make(ModelGenerator::class);

    $generator->generate('User', [
        'columns' => [],
        'relationships' => [],
    ]);

    $this->assertFileExists(app_path('Models/User.php'));
}
```

## Running Tests

### All Integration Tests

```bash
./vendor/bin/phpunit tests/Integration
```

### Specific Database Tests

```bash
./vendor/bin/phpunit tests/Integration/Database
```

### With Coverage

```bash
./vendor/bin/phpunit --coverage-html coverage tests/Integration
```

## Continuous Integration

### GitHub Actions Example

```yaml
name: Integration Tests

on: [push, pull_request]

jobs:
  integration-tests:
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

      postgres:
        image: postgres:14
        env:
          POSTGRES_DB: testing
          POSTGRES_PASSWORD: password
        ports:
          - 5432:5432
        options: --health-cmd="pg_isready"

    steps:
    - uses: actions/checkout@v2

    - name: Setup PHP
      uses: shivammathur/setup-php@v2
      with:
        php-version: '8.1'
        extensions: pdo_mysql, pdo_pgsql

    - name: Run Integration Tests
      run: vendor/bin/phpunit tests/Integration
```

## Debugging

### Common Issues

1. Database connection failures
2. Schema synchronization
3. Service dependencies
4. Resource contention
5. Timing issues

### Solutions

1. Check connection settings
2. Verify schema migrations
3. Review service bindings
4. Monitor resource usage
5. Add retry mechanisms

## Resources

- [PHPUnit Database Testing](https://phpunit.de/manual/6.5/en/database.html)
- [Laravel Database Testing](https://laravel.com/docs/database-testing)
- [Docker Documentation](https://docs.docker.com/)
- [GitHub Actions Documentation](https://docs.github.com/en/actions)
