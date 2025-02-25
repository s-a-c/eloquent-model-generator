# Architecture Overview

## System Architecture

```mermaid
graph TD
    A[Command Line Interface] --> B[Service Provider]
    B --> C[Model Generator]

    C --> D[Schema Analysis]
    C --> E[Relationship Resolution]
    C --> F[Code Generation]

    D --> G[SQLite Connection]
    D --> H[Type Mapping]

    E --> I[Foreign Keys]
    E --> J[Polymorphic]

    F --> K[Templates]
    F --> L[File System]

    M[Event System] --> C
    N[Queue System] --> C
    O[Cache System] --> C
```

## Core Components

### Domain Layer

```mermaid
classDiagram
    class TableDefinition {
        +string name
        +array~ColumnDefinition~ columns
        +array~IndexDefinition~ indices
        +array~RelationshipDefinition~ relationships
        +isPolymorphic(): bool
        +hasTimestamps(): bool
    }

    class ColumnDefinition {
        +string name
        +string type
        +bool nullable
        +mixed default
        +isUnique(): bool
        +isPrimary(): bool
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

    TableDefinition --> ColumnDefinition
    TableDefinition --> RelationshipDefinition
```

### Service Layer

```mermaid
classDiagram
    class ModelGeneratorInterface {
        <<interface>>
        +generate(tables: array): GenerationResult
        +analyzeTables(): array
    }

    class SchemaAnalyzerInterface {
        <<interface>>
        +analyze(table: string): TableDefinition
        +getTables(): array
    }

    class RelationshipResolverInterface {
        <<interface>>
        +resolve(tables: array): array
        +detectPolymorphic(table: TableDefinition): array
    }

    class CodeGeneratorInterface {
        <<interface>>
        +generate(definition: TableDefinition): string
        +loadTemplates(path: string): void
    }

    ModelGeneratorInterface ..> SchemaAnalyzerInterface
    ModelGeneratorInterface ..> RelationshipResolverInterface
    ModelGeneratorInterface ..> CodeGeneratorInterface
```

## Data Flow

### Model Generation Process

```mermaid
sequenceDiagram
    participant CLI as Command
    participant Gen as Generator
    participant SA as Schema Analyzer
    participant RR as Relationship Resolver
    participant CG as Code Generator

    CLI->>Gen: generate(tables)
    Gen->>SA: analyze(table)
    SA-->>Gen: TableDefinition
    Gen->>RR: resolve(tables)
    RR-->>Gen: RelationshipDefinitions
    Gen->>CG: generate(definition)
    CG-->>Gen: GeneratedCode
    Gen-->>CLI: GenerationResult
```

## Integration Points

### Laravel Integration

```mermaid
graph LR
    A[Package] --> B[Service Provider]
    B --> C[Config]
    B --> D[Commands]
    B --> E[Events]

    C --> F[Laravel Config]
    D --> G[Artisan]
    E --> H[Event Dispatcher]
```

### Event System

```mermaid
sequenceDiagram
    participant G as Generator
    participant E as Events
    participant L as Listeners

    G->>E: ModelGenerationStarted
    E->>L: handle(started)
    G->>E: ModelGenerationProgress
    E->>L: handle(progress)
    G->>E: ModelGenerationCompleted
    E->>L: handle(completed)
```

## Security Architecture

### File System Security

```mermaid
flowchart TD
    A[File Operation] --> B{Path Check}
    B -->|Safe| C{Permissions}
    B -->|Unsafe| D[Exception]
    C -->|Valid| E[Execute]
    C -->|Invalid| F[Exception]
```

### Input Validation

```mermaid
flowchart TD
    A[Input] --> B{Sanitize}
    B -->|Valid| C[Process]
    B -->|Invalid| D[Reject]
    C --> E{Validate}
    E -->|Pass| F[Use]
    E -->|Fail| G[Exception]
```

## Performance Considerations

### Memory Management

```mermaid
graph TD
    A[Large Schema] --> B{Memory Check}
    B -->|OK| C[Process All]
    B -->|High| D[Chunk Processing]
    D --> E[Process Chunk]
    E --> F{More Chunks?}
    F -->|Yes| D
    F -->|No| G[Complete]
```

### Caching Strategy

```mermaid
flowchart TD
    A[Request] --> B{Cached?}
    B -->|Yes| C[Return Cached]
    B -->|No| D[Generate]
    D --> E[Cache Result]
    E --> F[Return Fresh]
```

## Configuration Architecture

### Configuration Hierarchy

```mermaid
graph TD
    A[Configuration] --> B[Package Config]
    A --> C[Environment]
    A --> D[Runtime]

    B --> E[Defaults]
    C --> F[ENV Variables]
    D --> G[Options]
```

## Testing Architecture

### Test Pyramid

```mermaid
pyramid-schema
    Unit Tests: 60
    Integration Tests: 30
    End-to-End Tests: 10
```

[← Back to Documentation](../index.md) | [Continue to Components →](components.md)
