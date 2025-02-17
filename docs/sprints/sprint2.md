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

- [x] Create relationship value objects

  ```php
  final class Relationship
  {
      private function __construct(
          private readonly string $type,
          private readonly string $localTable,
          private readonly string $foreignTable,
          private readonly Collection $keys,
          private readonly array $attributes = []
      ) {}

      public static function belongsTo(
          string $localTable,
          string $foreignTable,
          string $foreignKey,
          ?string $ownerKey = null
      ): self {
          return new self(
              'belongsTo',
              $localTable,
              $foreignTable,
              collect([$foreignKey]),
              ['owner_key' => $ownerKey]
          );
      }

      public static function hasMany(
          string $localTable,
          string $foreignTable,
          string $foreignKey,
          ?string $localKey = null
      ): self {
          return new self(
              'hasMany',
              $localTable,
              $foreignTable,
              collect([$foreignKey]),
              ['local_key' => $localKey]
          );
      }
  }
  ```

#### Relationship Detection

- [x] Implement relationship detector in SchemaAnalyzer

  ```php
  final class SchemaAnalyzer
  {
      private function detectRelationships(Collection $tables): Collection
      {
          $relationships = collect();

          $tables->each(function (TableDefinition $table) use ($relationships, $tables) {
              // Detect belongsTo relationships from foreign keys
              $table->foreignKeys()->each(function (Column $column) use ($relationships, $table) {
                  $relationships->push(
                      Relationship::belongsTo(
                          $table->name(),
                          $column->getForeignTable(),
                          $column->name(),
                          'id'
                      )
                  );
              });

              // Detect hasMany relationships (inverse of belongsTo)
              $this->detectHasManyRelationships($table, $tables, $relationships);
          });

          return $relationships;
      }
  }
  ```

### Day 4: Relationship Mapping

#### Relationship Builders

- [x] Create relationship builders

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

      private function buildBelongsTo(Relationship $relationship): string
      {
          $methodName = Str::camel($relationship->foreignTable());
          $modelClass = Str::studly(Str::singular($relationship->foreignTable()));

          return <<<PHP
          public function {$methodName}(): BelongsTo
          {
              return \$this->belongsTo({$modelClass}::class);
          }
          PHP;
      }
  }
  ```

#### Method Generation

- [x] Implement method generators with PHPDoc

  ```php
  /**
   * Get the posts for this user.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany<\App\Models\Post>
   */
  public function posts(): HasMany
  {
      return $this->hasMany(Post::class);
  }
  ```

- [x] Add return type resolution

  ```php
  private function resolveReturnType(Relationship $relationship): string
  {
      return match ($relationship->type()) {
          'belongsTo' => 'BelongsTo',
          'hasMany' => 'HasMany',
          'belongsToMany' => 'BelongsToMany',
      };
  }
  ```

### Day 5: Integration & Testing

#### Integration

- [x] Connect adapters with generators

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
          $schema = $this->adapter->getSchema();
          $tableDefinition = $schema->table($table);

          if (!$tableDefinition) {
              throw new TableNotFoundException($table);
          }

          return $this->generator
              ->withSchema($schema)
              ->generate($tableDefinition)
              ->withMethods($this->buildRelationshipMethods($schema, $table));
      }
  }
  ```

#### Testing

- [x] Write adapter tests

  ```php
  public function test_mysql_adapter_gets_schema(): void
  {
      $schema = $this->adapter->getSchema();

      $this->assertInstanceOf(SchemaDefinition::class, $schema);
      $this->assertCount(5, $schema->tables());
  }
  ```

- [x] Test relationship detection

  ```php
  public function test_detects_belongs_to_relationship(): void
  {
      $relationships = $this->analyzer->analyze($this->connection);

      $this->assertTrue(
          $relationships->contains(fn ($rel) =>
              $rel->type() === 'belongsTo' &&
              $rel->localTable() === 'posts' &&
              $rel->foreignTable() === 'users'
          )
      );
  }
  ```

- [x] Verify generated methods

  ```php
  public function test_generates_relationship_methods(): void
  {
      $definition = $this->service->generate('posts');

      $this->assertStringContainsString(
          'public function user(): BelongsTo',
          $definition->toString()
      );
  }
  ```

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
git tag -a v0.3.2-dev.3 -m "Database adapters and relationship mapping"
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
