# Technical Design

## 3.1. Core Components

The SAC Eloquent Model Generator is built on several core components that work together to analyze database schemas and generate Eloquent models:

```mermaid
graph TB
    subgraph Core Components
        MG[Model Generator]
        SA[Schema Analyzer]
        RR[Relationship Resolver]
        CG[Code Generator]
    end

    subgraph Support Services
        Config[Configuration]
        Events[Event System]
        Queue[Queue System]
        Cache[Cache System]
    end

    MG --> SA
    MG --> RR
    MG --> CG
    Config --> MG
    MG --> Events
    MG --> Queue
    SA --> Cache
```

### Component Responsibilities

1. **Model Generator**
   - Orchestrates the generation process
   - Manages dependencies between components
   - Handles error recovery and reporting
   - Provides public API interface

2. **Schema Analyzer**
   - Introspects SQLite database schema
   - Analyzes table structures
   - Detects column types and constraints
   - Caches schema information

3. **Relationship Resolver**
   - Identifies table relationships
   - Resolves foreign key constraints
   - Detects polymorphic relationships
   - Maps many-to-many associations

4. **Code Generator**
   - Applies model templates
   - Generates PHP code
   - Formats output
   - Manages file operations

## 3.2. Domain Model

The package uses immutable value objects to represent domain concepts:

```mermaid
classDiagram
    class TableDefinition {
        +string name
        +array~ColumnDefinition~ columns
        +array~IndexDefinition~ indices
        +array~RelationshipDefinition~ relationships
        +isPolymorphic(): bool
        +hasTimestamps(): bool
        +hasSoftDeletes(): bool
    }

    class ColumnDefinition {
        +string name
        +string type
        +bool nullable
        +mixed default
        +array modifiers
        +isUnique(): bool
        +isPrimary(): bool
        +isForeign(): bool
    }

    class IndexDefinition {
        +string name
        +array columns
        +bool unique
        +string type
        +getIndexType(): string
    }

    class RelationshipDefinition {
        +RelationType type
        +string localKey
        +string foreignKey
        +string relatedTable
        +bool polymorphic
        +getMethodName(): string
    }

    class GenerationResult {
        +array generatedFiles
        +array errors
        +array metadata
        +isSuccessful(): bool
        +getGeneratedCount(): int
    }

    TableDefinition --> "many" ColumnDefinition
    TableDefinition --> "many" IndexDefinition
    TableDefinition --> "many" RelationshipDefinition
```

## 3.3. Service Layer

The service layer provides the core functionality through well-defined interfaces:

### ModelGeneratorInterface

```php
interface ModelGeneratorInterface
{
    /**
     * Generate models for the specified tables.
     *
     * @param array<string> $tables
     * @param array<string, mixed> $options
     * @return GenerationResult
     */
    public function generate(array $tables, array $options = []): GenerationResult;

    /**
     * Analyze database tables.
     *
     * @return array<TableDefinition>
     */
    public function analyzeTables(): array;
}
```

### SchemaAnalyzerInterface

```php
interface SchemaAnalyzerInterface
{
    /**
     * Analyze a database table.
     *
     * @param string $table
     * @return TableDefinition
     */
    public function analyze(string $table): TableDefinition;

    /**
     * Get all table names from the database.
     *
     * @return array<string>
     */
    public function getTables(): array;
}
```

### RelationshipResolverInterface

```php
interface RelationshipResolverInterface
{
    /**
     * Resolve relationships for tables.
     *
     * @param array<TableDefinition> $tables
     * @return array<RelationshipDefinition>
     */
    public function resolve(array $tables): array;
}
```

### CodeGeneratorInterface

```php
interface CodeGeneratorInterface
{
    /**
     * Generate model code.
     *
     * @param TableDefinition $definition
     * @return string
     */
    public function generate(TableDefinition $definition): string;
}
```

## 3.4. Integration Points

The package provides several integration points for extending functionality:

### 1. Custom Type Mappings

```php
// config/model-generator.php
return [
    'type_mappings' => [
        'custom_types' => [
            'point' => 'App\\Casts\\PointCast',
            'json_array' => 'array',
        ],
    ],
];
```

### 2. Custom Templates

```php
// Custom model template
class {{ className }} extends {{ baseClassName }}
{
    {{ properties }}

    {{ relationships }}

    {{ methods }}

    // Custom code here
}
```

### 3. Event System

```mermaid
sequenceDiagram
    participant App
    participant Generator
    participant EventDispatcher
    participant Listener

    App->>Generator: generate(tables)
    Generator->>EventDispatcher: dispatch(ModelGenerationStarted)
    EventDispatcher->>Listener: handle(event)
    Generator->>EventDispatcher: dispatch(ModelGenerationProgress)
    EventDispatcher->>Listener: handle(event)
    Generator->>EventDispatcher: dispatch(ModelGenerationCompleted)
    EventDispatcher->>Listener: handle(event)
    Generator->>App: return result
```

### 4. Queue System

```mermaid
sequenceDiagram
    participant CLI
    participant Job
    participant Queue
    participant Worker
    participant Generator

    CLI->>Job: dispatch(tables)
    Job->>Queue: push(GenerateModelJob)
    Queue->>Worker: process(job)
    Worker->>Generator: generate(tables)
    Generator->>Worker: return result
    Worker->>Job: complete
```

[← Back to Getting Started](./getting-started.md) | [Continue to Features and Capabilities →](./features.md)
