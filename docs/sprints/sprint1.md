# Sprint 1: Core Domain Implementation

**Duration**: 5 working days
**Focus**: Core domain model and type system

## Objectives

1. Implement core domain models following DDD principles
2. Establish type system with functional programming patterns
3. Set up base infrastructure

## Tasks

### Day 1: Domain Model Setup

#### Core Domain Models
- [ ] Create `ModelDefinition` value object
  ```php
  final class ModelDefinition
  {
      private function __construct(
          private readonly string $name,
          private readonly Collection $properties,
          private readonly Collection $relationships
      ) {}

      public static function create(string $name): self
      {
          return new self($name, new Collection(), new Collection());
      }

      public function withProperty(Property $property): self
      {
          return new self(
              $this->name,
              $this->properties->push($property),
              $this->relationships
          );
      }
  }
  ```

- [ ] Implement `Property` value object
  ```php
  final class Property
  {
      private function __construct(
          private readonly string $name,
          private readonly Type $type,
          private readonly bool $nullable
      ) {}

      public static function create(
          string $name,
          Type $type,
          bool $nullable = false
      ): self {
          return new self($name, $type, $nullable);
      }
  }
  ```

#### Type System Foundation
- [ ] Create `Type` interface and implementations
  ```php
  interface Type
  {
      public function name(): string;
      public function isNullable(): bool;
      public function toString(): string;
  }

  final class StringType implements Type
  {
      private function __construct(
          private readonly bool $nullable = false
      ) {}

      public static function create(bool $nullable = false): self
      {
          return new self($nullable);
      }
  }
  ```

### Day 2: Type System Implementation

#### Type Resolution
- [ ] Implement `TypeResolver` service
  ```php
  final class TypeResolver
  {
      public function __construct(
          private readonly TypeMap $typeMap
      ) {}

      public function resolveType(Column $column): Type
      {
          return pipe(
              $this->normalizeType(),
              $this->mapToPhpType(),
              $this->handleNullable($column)
          )($column->type);
      }
  }
  ```

#### Type Mapping
- [ ] Create database type mappings
- [ ] Implement custom type support
- [ ] Add type validation

### Day 3: Functional Core

#### Pure Functions
- [ ] Implement function composition utilities
  ```php
  final class Functional
  {
      public static function pipe(callable ...$functions): callable
      {
          return array_reduce(
              $functions,
              fn($carry, $function) =>
                  fn($x) => $function($carry($x)),
              fn($x) => $x
          );
      }
  }
  ```

#### Immutable Collections
- [ ] Create immutable collection classes
- [ ] Implement collection operations
- [ ] Add collection transformations

### Day 4: Domain Services

#### Model Generation
- [ ] Create `ModelGenerator` service
  ```php
  final class ModelGenerator
  {
      public function __construct(
          private readonly TypeResolver $typeResolver,
          private readonly RelationshipDetector $relationshipDetector,
          private readonly ValidationBuilder $validationBuilder
      ) {}

      public function generate(SchemaDefinition $schema): ModelDefinition
      {
          return pipe(
              $this->createBaseModel(),
              $this->addProperties(),
              $this->addRelationships(),
              $this->addValidation()
          )($schema);
      }
  }
  ```

#### Validation Rules
- [ ] Implement validation rule generation
- [ ] Add rule composition
- [ ] Create validation builders

### Day 5: Infrastructure & Testing

#### Service Provider
- [ ] Create Laravel service provider
  ```php
  final class GeneratorServiceProvider extends ServiceProvider
  {
      public function register(): void
      {
          $this->app->singleton(TypeResolver::class);
          $this->app->singleton(ModelGenerator::class);
      }
  }
  ```

#### Testing
- [ ] Write unit tests for domain models
- [ ] Test type system
- [ ] Verify functional components

## Commit Message

```
feat(core): implement core domain model and type system

- Add immutable domain models (ModelDefinition, Property)
- Implement functional type system with pure functions
- Create type resolution and mapping infrastructure
- Add validation rule generation
- Set up Laravel service provider
- Include comprehensive test suite

Following DDD principles:
- Rich domain models with immutable value objects
- Pure functions for type resolution
- Functional collection operations
- Clear bounded contexts

SOLID compliance:
- Single responsibility for each class
- Open for extension (type system)
- Interface segregation for type handling
- Dependency inversion in services

Breaking changes: none
```

## Version History Update

```markdown
## [0.3.2-dev.2] - 2025-02-21

### Added
- Core domain models with immutable properties
- Functional type system implementation
- Type resolution and mapping
- Validation rule generation
- Laravel service provider
- Comprehensive test suite

### Changed
- Refactored to follow DDD principles
- Implemented functional programming patterns
- Improved type safety

### Breaking Changes
None
