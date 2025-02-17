# Testing Strategy

## Overview

This document outlines the testing strategy for the Eloquent Model Generator package, ensuring comprehensive test coverage across all architectural layers while following Laravel testing best practices.

## Test Categories

### 1. Unit Tests

#### Domain Model Tests
- Test domain model invariants
- Verify value object immutability
- Validate business rules
- Test type system accuracy

```php
/** @test */
public function model_definition_maintains_immutability(): void
{
    $definition = ModelDefinition::create('User')
        ->withProperty('name', Type::string())
        ->withProperty('email', Type::email());

    $newDefinition = $definition->withProperty('age', Type::integer());

    // Original remains unchanged
    $this->assertCount(2, $definition->properties());
    $this->assertCount(3, $newDefinition->properties());
}
```

#### Type System Tests
- Test type resolution
- Verify type compatibility
- Test nullable handling
- Validate default values

```php
/** @test */
public function type_resolver_handles_complex_types(): void
{
    $resolver = new DatabaseTypeResolver();

    $type = $resolver->resolveType(
        new Column('json_data', 'json', true)
    );

    $this->assertInstanceOf(JsonType::class, $type);
    $this->assertTrue($type->isNullable());
}
```

### 2. Integration Tests

#### Database Adapter Tests
- Test schema reading
- Verify relationship detection
- Test type mapping
- Validate constraint handling

```php
/** @test */
public function mysql_adapter_detects_relationships(): void
{
    $adapter = new MySQLAdapter($connection);
    $relationships = $adapter->getRelationships('users');

    $this->assertContainsRelationship(
        $relationships,
        'posts',
        RelationType::HAS_MANY
    );
}
```

#### Generator Tests
- Test file generation
- Verify code quality
- Test template rendering
- Validate generated models

```php
/** @test */
public function generator_produces_valid_php_code(): void
{
    $generator = new ModelGenerator();
    $model = $generator->generate($schema);

    $this->assertValidPhpSyntax($model->content());
    $this->assertMatchesPhpstanRules($model->content());
}
```

### 3. Feature Tests

#### Command Tests
- Test CLI interface
- Verify option handling
- Test error scenarios
- Validate output

```php
/** @test */
public function command_handles_invalid_database(): void
{
    $this->artisan('model:generate', [
        '--database' => 'invalid_db'
    ])->assertExitCode(1)
      ->expectsOutput('Database configuration not found');
}
```

#### Event Tests
- Test event dispatching
- Verify listener execution
- Test queue integration
- Validate event data

```php
/** @test */
public function model_generation_triggers_events(): void
{
    Event::fake([ModelGenerated::class]);

    $this->artisan('model:generate', ['name' => 'User']);

    Event::assertDispatched(ModelGenerated::class, function ($event) {
        return $event->model->name === 'User';
    });
}
```

## Test Data Management

### 1. Factories
```php
namespace Tests\Factories;

class SchemaDefinitionFactory
{
    public static function create(): SchemaDefinition
    {
        return new SchemaDefinition([
            TableDefinition::create('users')
                ->withColumn('id', 'bigint', false)
                ->withColumn('name', 'varchar', true)
                ->withColumn('email', 'varchar', false)
                ->withTimestamps(),
        ]);
    }
}
```

### 2. Test Databases
- SQLite for quick tests
- Real databases for adapter tests
- Containerized databases for CI

```php
trait UsesTestDatabases
{
    protected function setupTestDatabase(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/migrations');
        $this->seed(TestDatabaseSeeder::class);
    }
}
```

### 3. Fixtures
```php
namespace Tests\Fixtures;

class ModelTemplates
{
    public static function userModel(): string
    {
        return file_get_contents(
            __DIR__ . '/stubs/User.php.stub'
        );
    }
}
```

## Mocking Strategy

### 1. Database Mocking
```php
/** @test */
public function generator_handles_database_errors(): void
{
    $adapter = $this->mock(DatabaseAdapter::class);

    $adapter->expects('getSchema')
            ->andThrow(new ConnectionException());

    $this->artisan('model:generate')
         ->assertExitCode(1);
}
```

### 2. File System Mocking
```php
/** @test */
public function generator_handles_file_system_errors(): void
{
    Storage::fake('local');

    Storage::shouldReceive('put')
           ->andThrow(new FileNotFoundException());

    $this->artisan('model:generate')
         ->assertExitCode(1);
}
```

### 3. Service Mocking
```php
/** @test */
public function type_resolver_uses_cache(): void
{
    $cache = $this->mock(Cache::class);

    $cache->expects('remember')
          ->with('type_mapping', ANY, ANY)
          ->once();

    $resolver = new CachedTypeResolver($cache);
    $resolver->resolveType($column);
}
```

## CI/CD Integration

### 1. GitHub Actions
```yaml
name: Tests

on: [push, pull_request]

jobs:
  test:
    runs-on: ubuntu-latest

    services:
      mysql:
        image: mysql:8.0
        env:
          MYSQL_ROOT_PASSWORD: password
          MYSQL_DATABASE: testing

      postgres:
        image: postgres:13
        env:
          POSTGRES_PASSWORD: password
          POSTGRES_DB: testing

    steps:
      - uses: actions/checkout@v2

      - name: Setup PHP
        uses: shivammathur/setup-php@v2
        with:
          php-version: '8.2'
          extensions: dom, curl, libxml, mbstring, zip, pcntl, pdo, sqlite, pdo_sqlite

      - name: Run Tests
        run: |
          composer install
          php artisan test --parallel
```

### 2. Quality Gates
```yaml
name: Quality

on: [push, pull_request]

jobs:
  quality:
    runs-on: ubuntu-latest

    steps:
      - name: PHPStan
        run: vendor/bin/phpstan analyse

      - name: Psalm
        run: vendor/bin/psalm

      - name: PHP CS Fixer
        run: vendor/bin/php-cs-fixer fix --dry-run
```

## Performance Testing

### 1. Benchmarks
```php
/** @test */
public function measure_generation_performance(): void
{
    $this->benchmark(function () {
        $this->generator->generate($this->largeSchema);
    })->assertDurationLessThan(1.0);
}
```

### 2. Memory Usage
```php
/** @test */
public function measure_memory_usage(): void
{
    $memoryBefore = memory_get_usage();

    $this->generator->generate($this->largeSchema);

    $memoryAfter = memory_get_usage();
    $this->assertLessThan(50 * 1024 * 1024, $memoryAfter - $memoryBefore);
}
```

### 3. Load Testing
```php
/** @test */
public function handle_concurrent_generation(): void
{
    $results = parallel()->times(10)->run(function () {
        return $this->generator->generate($this->schema);
    });

    $this->assertCount(10, $results);
    $this->assertAllSuccessful($results);
}
```

## Coverage Goals

### 1. Code Coverage
- Domain Models: 100%
- Application Services: 95%
- Infrastructure: 90%
- Commands: 100%
- Event Listeners: 95%

### 2. Mutation Testing
```bash
# Run mutation testing
$ vendor/bin/infection --min-msi=85 --min-covered-msi=90
```

### 3. Static Analysis
```bash
# Run static analysis
$ vendor/bin/phpstan analyse --level=max
$ vendor/bin/psalm --show-info=true
```

## Test Environment Management

### 1. Docker Compose
```yaml
version: '3'

services:
  mysql:
    image: mysql:8.0
    environment:
      MYSQL_ROOT_PASSWORD: password
      MYSQL_DATABASE: testing
    ports:
      - "3306:3306"

  postgres:
    image: postgres:13
    environment:
      POSTGRES_PASSWORD: password
      POSTGRES_DB: testing
    ports:
      - "5432:5432"
```

### 2. Database Seeding
```php
class TestDatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            TestTablesSeeder::class,
            TestRelationshipsSeeder::class,
        ]);
    }
}
```

### 3. Test Configuration
```php
return [
    'databases' => [
        'mysql' => [
            'driver' => 'mysql',
            'host' => env('TEST_MYSQL_HOST', '127.0.0.1'),
            'database' => env('TEST_MYSQL_DATABASE', 'testing'),
        ],
        'pgsql' => [
            'driver' => 'pgsql',
            'host' => env('TEST_PGSQL_HOST', '127.0.0.1'),
            'database' => env('TEST_PGSQL_DATABASE', 'testing'),
        ],
    ],
];
