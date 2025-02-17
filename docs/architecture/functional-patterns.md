# Functional Programming Patterns

## Overview

This document outlines the functional programming patterns and practices to be used in the Eloquent Model Generator package. These patterns promote code that is easier to test, reason about, and maintain.

## Core Principles

### 1. Immutability

All domain objects should be immutable. Changes create new instances rather than modifying existing ones.

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

    public function withRelationship(Relationship $relationship): self
    {
        return new self(
            $this->name,
            $this->properties,
            $this->relationships->push($relationship)
        );
    }
}
```

### 2. Pure Functions

Functions should be pure, with no side effects and consistent return values for the same input.

```php
final class TypeResolver
{
    public function resolveType(Column $column): Type
    {
        return match ($column->type) {
            'string', 'varchar', 'text' => Type::string(),
            'integer', 'int' => Type::integer(),
            'boolean', 'bool' => Type::boolean(),
            'datetime' => Type::dateTime(),
            default => Type::mixed(),
        };
    }
}
```

### 3. Function Composition

Complex operations should be built by composing smaller, focused functions.

```php
final class ModelGenerator
{
    public function generate(SchemaDefinition $schema): ModelDefinition
    {
        return pipe(
            [$this, 'createBaseModel'],
            [$this, 'addProperties'],
            [$this, 'addRelationships'],
            [$this, 'addValidation']
        )($schema);
    }

    private function createBaseModel(SchemaDefinition $schema): ModelDefinition
    {
        return ModelDefinition::create($schema->getModelName());
    }

    private function addProperties(ModelDefinition $model): ModelDefinition
    {
        return $model->properties->reduce(
            fn(ModelDefinition $model, Property $property) =>
                $model->withProperty($property),
            $model
        );
    }
}
```

### 4. Option Types

Use Option types for handling nullable values instead of null checks.

```php
final class Option
{
    private function __construct(
        private readonly mixed $value
    ) {}

    public static function some(mixed $value): self
    {
        return new self($value);
    }

    public static function none(): self
    {
        return new self(null);
    }

    public function map(callable $fn): self
    {
        return isset($this->value)
            ? self::some($fn($this->value))
            : self::none();
    }

    public function getOrElse(mixed $default): mixed
    {
        return isset($this->value) ? $this->value : $default;
    }
}

// Usage
final class RelationshipDetector
{
    public function findRelationship(string $tableName): Option
    {
        $relationship = $this->relationships->first(
            fn($rel) => $rel->table === $tableName
        );

        return $relationship
            ? Option::some($relationship)
            : Option::none();
    }
}
```

### 5. Result Types

Use Result types for error handling instead of exceptions.

```php
final class Result
{
    private function __construct(
        private readonly mixed $value,
        private readonly ?string $error = null
    ) {}

    public static function success(mixed $value): self
    {
        return new self($value);
    }

    public static function failure(string $error): self
    {
        return new self(null, $error);
    }

    public function map(callable $fn): self
    {
        return isset($this->error)
            ? $this
            : self::success($fn($this->value));
    }

    public function mapError(callable $fn): self
    {
        return isset($this->error)
            ? self::failure($fn($this->error))
            : $this;
    }
}

// Usage
final class SchemaAnalyzer
{
    public function analyzeTable(string $table): Result
    {
        try {
            $schema = $this->connection->getSchemaBuilder()->getColumnListing($table);
            return Result::success(new TableSchema($schema));
        } catch (Exception $e) {
            return Result::failure("Failed to analyze table: {$e->getMessage()}");
        }
    }
}
```

### 6. Collection Pipelines

Use collection pipelines for data transformations.

```php
final class ModelBuilder
{
    public function buildProperties(array $columns): Collection
    {
        return collect($columns)
            ->map(fn($column) => $this->createProperty($column))
            ->filter(fn($property) => !$property->isSystem())
            ->mapWithKeys(fn($property) => [$property->name => $property])
            ->pipe(fn($properties) => $this->addComputedProperties($properties));
    }

    private function addComputedProperties(Collection $properties): Collection
    {
        return $properties
            ->when(
                $this->hasTimestamps,
                fn($props) => $props->merge([
                    'created_at' => Property::timestamp(),
                    'updated_at' => Property::timestamp()
                ])
            );
    }
}
```

## Implementation Guidelines

### 1. Data Transformation

Use pipelines for complex data transformations:

```php
final class SchemaTransformer
{
    public function transform(DatabaseSchema $schema): ModelCollection
    {
        return collect($schema->tables)
            ->filter(fn($table) => $this->shouldGenerateModel($table))
            ->map(fn($table) => $this->createModelDefinition($table))
            ->map(fn($model) => $this->addRelationships($model))
            ->map(fn($model) => $this->addValidation($model))
            ->values();
    }
}
```

### 2. Error Handling

Chain operations with error handling:

```php
final class ModelGenerator
{
    public function generate(string $table): Result
    {
        return $this->validateTable($table)
            ->andThen(fn($table) => $this->analyzeSchema($table))
            ->andThen(fn($schema) => $this->generateModel($schema))
            ->andThen(fn($model) => $this->validateModel($model))
            ->andThen(fn($model) => $this->saveModel($model));
    }
}
```

### 3. Dependency Injection

Use constructor injection with immutable dependencies:

```php
final class ModelGenerator
{
    public function __construct(
        private readonly TypeResolver $typeResolver,
        private readonly RelationshipDetector $relationshipDetector,
        private readonly ValidationBuilder $validationBuilder
    ) {}
}
```

### 4. Value Objects

Use value objects for domain concepts:

```php
final class ColumnDefinition
{
    private function __construct(
        public readonly string $name,
        public readonly Type $type,
        public readonly bool $nullable,
        public readonly mixed $default
    ) {}

    public static function create(
        string $name,
        Type $type,
        bool $nullable = false,
        mixed $default = null
    ): self {
        return new self($name, $type, $nullable, $default);
    }

    public function withType(Type $type): self
    {
        return new self(
            $this->name,
            $type,
            $this->nullable,
            $this->default
        );
    }
}
```

## Testing Functional Code

### 1. Pure Function Tests

```php
class TypeResolverTest extends TestCase
{
    /** @test */
    public function it_resolves_same_type_for_same_input(): void
    {
        $resolver = new TypeResolver();
        $column = new Column('name', 'string', false);

        $type1 = $resolver->resolveType($column);
        $type2 = $resolver->resolveType($column);

        $this->assertEquals($type1, $type2);
    }
}
```

### 2. Pipeline Tests

```php
class ModelBuilderTest extends TestCase
{
    /** @test */
    public function it_transforms_data_through_pipeline(): void
    {
        $builder = new ModelBuilder();
        $columns = [
            ['name' => 'id', 'type' => 'integer'],
            ['name' => 'title', 'type' => 'string'],
        ];

        $properties = $builder->buildProperties($columns);

        $this->assertCount(2, $properties);
        $this->assertTrue($properties->has('id'));
        $this->assertTrue($properties->has('title'));
    }
}
```

### 3. Immutability Tests

```php
class ModelDefinitionTest extends TestCase
{
    /** @test */
    public function it_creates_new_instance_when_modified(): void
    {
        $model = ModelDefinition::create('User');
        $property = Property::create('name', Type::string());

        $newModel = $model->withProperty($property);

        $this->assertNotSame($model, $newModel);
        $this->assertCount(0, $model->properties());
        $this->assertCount(1, $newModel->properties());
    }
}
```

## Performance Considerations

### 1. Lazy Evaluation

Use lazy collections for large datasets:

```php
final class SchemaAnalyzer
{
    public function analyzeTables(): LazyCollection
    {
        return LazyCollection::make(function () {
            foreach ($this->getTables() as $table) {
                yield $this->analyzeTable($table);
            }
        });
    }
}
```

### 2. Memoization

Cache pure function results:

```php
final class CachedTypeResolver
{
    private array $cache = [];

    public function resolveType(Column $column): Type
    {
        $key = $this->getCacheKey($column);

        return $this->cache[$key] ??= $this->resolver->resolveType($column);
    }
}
```

### 3. Batch Processing

Process collections in chunks:

```php
final class ModelGenerator
{
    public function generateModels(array $tables): Collection
    {
        return collect($tables)
            ->chunk(100)
            ->map(fn($chunk) => $this->processChunk($chunk))
            ->collapse();
    }
}
```

## Best Practices

1. Always return new instances when modifying state
2. Use type hints and return type declarations
3. Keep functions small and focused
4. Use collection pipelines for data transformations
5. Leverage Option and Result types for better error handling
6. Use value objects for domain concepts
7. Test pure functions extensively
8. Cache pure function results when appropriate
9. Use lazy evaluation for large datasets
10. Process data in batches when possible
