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

- [x] Create `ModelDefinition` value object

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

- [x] Implement `Property` value object

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

- [x] Create `Type` interface and implementations

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

- [x] Implement `TypeResolver` service

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

- [x] Create database type mappings
- [x] Implement custom type support
- [x] Add type validation

### Day 3: Functional Core

#### Pure Functions

- [x] Implement function composition utilities

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

- [x] Create immutable collection classes
- [x] Implement collection operations
- [x] Add collection transformations

### Day 4: Domain Services

#### Model Generation

- [x] Create `ModelGenerator` service

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

- [x] Implement validation rule generation
- [x] Add rule composition
- [x] Create validation builders

### Day 5: Infrastructure & Testing

#### Service Provider

- [x] Create Laravel service provider

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

- [x] Write unit tests for domain models
- [x] Test type system
- [x] Verify functional components

## Commit Message

``` shell
git commit -a \
-m "feat(core): core domain model and type system" \
-m "" \
-m "- Add immutable domain models (ModelDefinition, Property)" \
-m "- Implement functional type system with pure functions" \
-m "- Create type resolution and mapping infrastructure" \
-m "- Add validation rule generation" \
-m "- Set up Laravel service provider" \
-m "- Include comprehensive test suite" \
-m "" \
-m "Following DDD principles:" \
-m "- Rich domain models with immutable value objects" \
-m "- Pure functions for type resolution" \
-m "- Functional collection operations" \
-m "- Clear bounded contexts" \
-m "" \
-m "SOLID compliance:" \
-m "- Single responsibility for each class" \
-m "- Open for extension (type system)" \
-m "- Interface segregation for type handling" \
-m "- Dependency inversion in services" \
-m "" \
-m "Breaking changes: none"
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
```
