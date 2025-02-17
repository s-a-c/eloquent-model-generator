# Sprint 2: Database Adapters & Relationships

**Duration**: 5 working days
**Focus**: Database abstraction and relationship mapping

## Objectives

1. Implement database adapters using adapter pattern
2. Create relationship detection system
3. Build relationship mapping infrastructure

## Tasks

### Day 1: Database Abstraction

#### Database Adapter Interface

- [x] Create adapter interface

  ```php
  interface DatabaseAdapter
  {
      public function getSchema(): SchemaDefinition;
      public function getColumns(string $table): Collection;
      public function getRelationships(string $table): Collection;
      public function getIndexes(string $table): Collection;
  }
  ```

#### MySQL Adapter

- [x] Implement MySQL adapter

  ```php
  final class MySQLAdapter implements DatabaseAdapter
  {
      public function __construct(
          private readonly Connection $connection,
          private readonly SchemaAnalyzer $analyzer
      ) {}

      public function getSchema(): SchemaDefinition
      {
          return $this->analyzer->analyze($this->connection);
      }

      public function getColumns(string $table): Collection
      {
          return $this->getSchema()
              ->table($table)
              ?->columns()
              ?? collect();
      }
  }
  ```

### Day 2: Schema Analysis

#### Schema Definition

- [x] Create schema value objects

  ```php
  final class SchemaDefinition
  {
      private function __construct(
          private readonly Collection $tables,
          private readonly Collection $relationships
      ) {}

      public static function create(
          Collection $tables,
          Collection $relationships
      ): self {
          return new self($tables, $relationships);
      }

      public function table(string $name): ?TableDefinition
      {
          return $this->tables->first(fn (TableDefinition $table) => $table->name() === $name);
      }
  }
  ```

#### Schema Analysis

- [x] Implement schema analyzer

  ```php
  final class SchemaAnalyzer
  {
      public function analyze(Connection $connection): SchemaDefinition
      {
          $tables = $this->extractTableDefinitions($connection);
          $relationships = $this->detectRelationships($tables);

          return SchemaDefinition::create($tables, $relationships);
      }

      private function extractTableDefinitions(Connection $connection): Collection
      {
          return collect(Schema::getAllTables())
              ->map(fn (array $table) => $this->extractTableDefinition($connection, $table['name']));
      }
  }
  ```

### Day 3: Relationship Detection

#### Relationship Types

- [ ] Create relationship value objects

  ```php
  final class Relationship
  {
      private function __construct(
          private readonly string $type,
          private readonly string $localTable,
          private readonly string $foreignTable,
          private readonly Collection $keys
      ) {}

      public static function belongsTo(
          string $localTable,
          string $foreignTable,
          string $foreignKey
      ): self {
          return new self(
              'belongsTo',
              $localTable,
              $foreignTable,
              collect([$foreignKey])
          );
      }
  }
  ```

#### Relationship Detection

- [ ] Implement relationship detector

  ```php
  final class RelationshipDetector
  {
      public function detect(TableDefinition $table): Collection
      {
          return pipe(
              $this->findForeignKeys(),
              $this->analyzeIndexes(),
              $this->determineTypes(),
              $this->validateRelationships()
          )($table);
      }
  }
  ```

### Day 4: Relationship Mapping

#### Relationship Builders

- [ ] Create relationship builders

  ```php
  final class RelationshipBuilder
  {
      public function build(Relationship $relationship): string
      {
          return match ($relationship->type()) {
              'belongsTo' => $this->buildBelongsTo($relationship),
              'hasMany' => $this->buildHasMany($relationship),
              'belongsToMany' => $this->buildBelongsToMany($relationship),
              default => throw new UnsupportedRelationshipException(),
          };
      }
  }
  ```

#### Method Generation

- [ ] Implement method generators
- [ ] Add PHPDoc generation
- [ ] Create return type resolution

### Day 5: Integration & Testing

#### Integration

- [ ] Connect adapters with generators

  ```php
  final class ModelGenerationService
  {
      public function __construct(
          private readonly DatabaseAdapter $adapter,
          private readonly ModelGenerator $generator,
          private readonly RelationshipBuilder $relationshipBuilder
      ) {}

      public function generate(string $table): ModelDefinition
      {
          return pipe(
              $this->adapter->getSchema(),
              $this->generator->generate(),
              $this->relationshipBuilder->addRelationships()
          )($table);
      }
  }
  ```

#### Testing

- [ ] Write adapter tests
- [ ] Test relationship detection
- [ ] Verify generated methods

## Commit Message

``` shell
git add .
git commat -a \
-m "feat(database): implement database adapters and relationship mapping" \
-m "" \
-m "- Add database adapter interface and implementations" \
-m "- Create schema analysis infrastructure" \
-m "- Implement relationship detection system" \
-m "- Add relationship mapping and generation" \
-m "- Include integration with model generator" \
-m "- Add comprehensive test coverage" \
-m "" \
-m "Following DDD principles:" \
-m "- Clear adapter interfaces" \
-m "- Rich domain models for schema and relationships" \
-m "- Pure functions for analysis" \
-m "- Immutable value objects" \
-m "" \
-m "SOLID compliance:" \
-m "- Interface segregation for adapters" \
-m "- Single responsibility for analyzers" \
-m "- Open/closed for relationship types" \
-m "- Dependency inversion in services" \
-m "" \
-m "Breaking changes: none"
```

## Version History Update

```markdown
## [0.3.2-dev.3] - 2025-02-28

### Added
- Database adapter interface and implementations
- Schema analysis system
- Relationship detection and mapping
- Integration with model generator
- Comprehensive test suite for database features

### Changed
- Improved database abstraction layer
- Enhanced relationship detection
- Refined type mapping system

### Breaking Changes
None
