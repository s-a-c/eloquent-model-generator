# Application Design Document

## Overview

The Eloquent Model Generator is a Laravel package designed to generate robust, type-safe Eloquent models from database schemas. The application follows Domain-Driven Design principles while adhering to Laravel's architectural patterns and SOLID principles.

## Design Principles

### Laravel Best Practices
- Use Service Providers for dependency injection and bootstrapping
- Implement Commands for CLI interactions
- Use Actions for encapsulating business logic
- Leverage Laravel's event system for loose coupling
- Utilize queues for long-running operations

### Domain-Driven Design
- Clearly defined bounded contexts
- Rich domain models
- Immutable value objects
- Domain events for cross-boundary communication
- Aggregates for maintaining invariants

### SOLID Principles
- Single Responsibility: Each class has one reason to change
- Open/Closed: Extend functionality through abstractions
- Liskov Substitution: Subtypes must be substitutable
- Interface Segregation: Focused, specific interfaces
- Dependency Inversion: Depend on abstractions

### Functional Programming
- Immutable data structures
- Pure functions where possible
- Function composition
- Option/Maybe types for null safety
- Collection pipelines

## Architecture

### Core Domain

#### Model Generation Context
```php
namespace SAC\EloquentModelGenerator\Domain\Model;

// Core domain interfaces
interface ModelGenerator
{
    public function generate(SchemaDefinition $schema): ModelDefinition;
}

interface TypeResolver
{
    public function resolveType(Column $column): Type;
}

interface RelationshipDetector
{
    public function detectRelationships(Table $table): Collection;
}

// Value Objects
final class ModelDefinition
{
    private string $name;
    private Collection $properties;
    private Collection $relationships;
    private Collection $validationRules;

    // Immutable construction and access
}

final class Type
{
    private string $name;
    private bool $nullable;
    private mixed $default;

    // Type-safe construction and validation
}
```

#### Actions
```php
namespace SAC\EloquentModelGenerator\Actions;

class GenerateModelAction
{
    public function __construct(
        private ModelGenerator $generator,
        private TypeResolver $typeResolver,
        private RelationshipDetector $relationshipDetector
    ) {}

    public function execute(GenerateModelData $data): ModelDefinition
    {
        // Pure function composition
        return pipe(
            $this->analyzeSchema(),
            $this->resolveTypes(),
            $this->detectRelationships(),
            $this->generateModel()
        )($data);
    }
}
```

### Supporting Domains

#### Database Adapters
```php
namespace SAC\EloquentModelGenerator\Infrastructure\Database;

interface DatabaseAdapter
{
    public function getSchema(): SchemaDefinition;
    public function getRelationships(): RelationshipCollection;
}

// Concrete implementations for each supported database
final class MySQLAdapter implements DatabaseAdapter
{
    // MySQL-specific implementation
}

final class PostgreSQLAdapter implements DatabaseAdapter
{
    // PostgreSQL-specific implementation
}
```

#### Configuration
```php
namespace SAC\EloquentModelGenerator\Infrastructure\Config;

final class GeneratorConfig
{
    private array $config;

    public static function fromFile(string $path): self
    {
        // Immutable configuration loading
    }

    public function withOverrides(array $overrides): self
    {
        // Returns new instance with overrides
    }
}
```

### Application Services

#### Service Providers
```php
namespace SAC\EloquentModelGenerator\Providers;

class GeneratorServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Register core services
        $this->app->singleton(ModelGenerator::class, DefaultModelGenerator::class);
        $this->app->singleton(TypeResolver::class, DatabaseTypeResolver::class);

        // Register database adapters
        $this->app->bind(
            DatabaseAdapter::class,
            fn($app) => $this->resolveAdapter($app['config'])
        );
    }

    public function boot(): void
    {
        // Register commands
        $this->commands([
            GenerateModelCommand::class,
            AnalyzeSchemaCommand::class,
        ]);

        // Register event listeners
        Event::listen(
            ModelGenerated::class,
            [ModelGeneratedListener::class, 'handle']
        );
    }
}
```

#### Commands
```php
namespace SAC\EloquentModelGenerator\Console\Commands;

class GenerateModelCommand extends Command
{
    public function handle(GenerateModelAction $action): int
    {
        // Command execution with dependency injection
        return $action->execute(
            GenerateModelData::fromCommand($this)
        );
    }
}
```

### Event System

#### Domain Events
```php
namespace SAC\EloquentModelGenerator\Domain\Events;

final class ModelGenerated
{
    public function __construct(
        public readonly ModelDefinition $model,
        public readonly string $path
    ) {}
}

final class SchemaAnalyzed
{
    public function __construct(
        public readonly SchemaDefinition $schema,
        public readonly array $metrics
    ) {}
}
```

#### Event Listeners
```php
namespace SAC\EloquentModelGenerator\Listeners;

class ModelGeneratedListener
{
    public function handle(ModelGenerated $event): void
    {
        // Handle post-generation tasks
        // - Generate factory
        // - Update documentation
        // - Trigger analysis
    }
}
```

### Queue System

#### Jobs
```php
namespace SAC\EloquentModelGenerator\Jobs;

class AnalyzeModelJob implements ShouldQueue
{
    public function __construct(
        private ModelDefinition $model
    ) {}

    public function handle(ModelAnalyzer $analyzer): void
    {
        // Perform intensive analysis in background
        $results = $analyzer->analyze($this->model);
        event(new ModelAnalyzed($results));
    }
}
```

## Test Plan

### Unit Tests

#### Domain Model Tests
```php
namespace Tests\Unit\Domain;

class ModelDefinitionTest extends TestCase
{
    /** @test */
    public function it_maintains_invariants_when_adding_properties(): void
    {
        // Test immutability and validation
    }

    /** @test */
    public function it_enforces_naming_conventions(): void
    {
        // Test domain rules
    }
}
```

#### Type System Tests
```php
namespace Tests\Unit\Domain;

class TypeResolverTest extends TestCase
{
    /** @test */
    public function it_correctly_maps_database_types(): void
    {
        // Test type mapping logic
    }

    /** @test */
    public function it_handles_nullable_types(): void
    {
        // Test null handling
    }
}
```

### Integration Tests

#### Database Adapter Tests
```php
namespace Tests\Integration\Infrastructure;

class MySQLAdapterTest extends TestCase
{
    /** @test */
    public function it_correctly_reads_schema(): void
    {
        // Test schema reading
    }

    /** @test */
    public function it_detects_relationships(): void
    {
        // Test relationship detection
    }
}
```

#### Generator Tests
```php
namespace Tests\Integration;

class ModelGeneratorTest extends TestCase
{
    /** @test */
    public function it_generates_valid_model_files(): void
    {
        // Test file generation
    }

    /** @test */
    public function it_handles_complex_relationships(): void
    {
        // Test relationship handling
    }
}
```

### Feature Tests

#### Command Tests
```php
namespace Tests\Feature\Console;

class GenerateModelCommandTest extends TestCase
{
    /** @test */
    public function it_generates_models_from_command_line(): void
    {
        // Test CLI interface
    }

    /** @test */
    public function it_handles_errors_gracefully(): void
    {
        // Test error handling
    }
}
```

#### Event Tests
```php
namespace Tests\Feature\Events;

class ModelGeneratedTest extends TestCase
{
    /** @test */
    public function it_triggers_post_generation_tasks(): void
    {
        // Test event handling
    }

    /** @test */
    public function it_queues_analysis_jobs(): void
    {
        // Test job dispatching
    }
}
```

## Implementation Strategy

1. Core Domain Implementation
   - Implement domain models and interfaces
   - Build type system
   - Create relationship mapping

2. Infrastructure Layer
   - Implement database adapters
   - Set up configuration system
   - Create file generators

3. Application Layer
   - Build command system
   - Implement service providers
   - Set up event handling

4. Testing Infrastructure
   - Create test databases
   - Set up factories
   - Implement test helpers

## Performance Considerations

1. Lazy Loading
   - Defer schema analysis until needed
   - Load relationships on demand
   - Cache parsed configurations

2. Parallel Processing
   - Use queues for analysis tasks
   - Parallel type resolution
   - Concurrent file generation

3. Caching Strategy
   - Cache schema definitions
   - Cache type mappings
   - Cache relationship graphs

## Security Considerations

1. Input Validation
   - Validate all command input
   - Sanitize database input
   - Verify file paths

2. Access Control
   - Respect database permissions
   - Validate file system access
   - Check configuration permissions

3. Error Handling
   - Secure error messages
   - Audit logging
   - Fallback mechanisms

## Monitoring and Logging

1. Performance Metrics
   - Generation time tracking
   - Memory usage monitoring
   - Query performance logging

2. Error Tracking
   - Exception logging
   - Stack trace collection
   - Context gathering

3. Usage Analytics
   - Command usage tracking
   - Feature usage metrics
   - Error rate monitoring
