# Architecture

The package follows Domain-Driven Design principles with a clean, layered architecture. Each layer has a specific responsibility and clear boundaries.

## Directory Structure

```
src/
├── Application/         # Application layer
│   ├── Services/       # Application services
│   │   ├── ModelGeneratorService.php
│   │   └── ParallelModelGeneratorService.php
│   └── Jobs/          # Queue jobs
│       └── ProcessModelChunkJob.php
├── Domain/             # Domain layer
│   ├── Contracts/     # Core interfaces
│   │   ├── ModelGenerator.php
│   │   └── SchemaAnalyzer.php
│   ├── Models/        # Domain models
│   │   ├── BaseModel.php
│   │   └── GeneratedModel.php
│   ├── ValueObjects/  # Value objects
│   │   └── ModelDefinition.php
│   ├── Events/        # Domain events
│   │   └── ModelGenerated.php
│   ├── Attributes/    # Model attributes
│   │   └── ModelAttribute.php
│   ├── Relationships/ # Model relationships
│   │   └── ModelRelationship.php
│   └── Exceptions/    # Domain exceptions
│       └── ModelGeneratorException.php
└── Support/           # Support layer
    └── Traits/        # Shared traits
        ├── HasAttributes.php
        └── HasRelationships.php
```

## Core Components

### 1. Application Services

**ModelGeneratorService**
```php
class ModelGeneratorService {
    public function __construct(
        private SchemaAnalyzer $schemaAnalyzer,
        private ModelGenerator $modelGenerator
    ) {}

    public function generateModel(string $table, array $config = []): array {
        $definition = new ModelDefinition(/* ... */);
        $schema = $this->schemaAnalyzer->analyze($table);
        return $this->modelGenerator->generate($definition, $schema);
    }
}
```

**ParallelModelGeneratorService**
```php
class ParallelModelGeneratorService {
    public function generateModels(array $tables, array $config = []): Batch {
        return Bus::batch([
            new ProcessModelChunkJob($tables, $config)
        ])->dispatch();
    }
}
```

### 2. Domain Models

**ModelDefinition (Value Object)**
```php
class ModelDefinition {
    public function __construct(
        public readonly string $table,
        public readonly string $namespace,
        public readonly string $baseClass,
        public readonly string $outputPath
    ) {}
}
```

**GeneratedModel**
```php
class GeneratedModel {
    public function __construct(
        public readonly string $className,
        public readonly string $namespace,
        public readonly string $tableName,
        public readonly array $attributes,
        public readonly array $relationships
    ) {}
}
```

### 3. Domain Contracts

**ModelGenerator Interface**
```php
interface ModelGenerator {
    public function generate(
        ModelDefinition $definition,
        array $schema
    ): GeneratedModel;
}
```

**SchemaAnalyzer Interface**
```php
interface SchemaAnalyzer {
    public function analyze(string $table): array;
}
```

## Flow of Control

1. **Request Handling**
   - Command/API request received
   - Configuration validated
   - Service located via DI container

2. **Model Generation**
   ```mermaid
   sequenceDiagram
       participant C as Controller/Command
       participant S as ModelGeneratorService
       participant A as SchemaAnalyzer
       participant G as ModelGenerator

       C->>S: generateModel(table)
       S->>A: analyze(table)
       A-->>S: schema
       S->>G: generate(definition, schema)
       G-->>S: GeneratedModel
       S-->>C: result
   ```

3. **Parallel Processing**
   ```mermaid
   sequenceDiagram
       participant C as Controller
       participant P as ParallelService
       participant Q as Queue
       participant J as ProcessModelChunkJob

       C->>P: generateModels(tables)
       P->>Q: dispatch(batch)
       Q->>J: process(chunk)
       J-->>Q: complete
       Q-->>P: progress
       P-->>C: status
   ```

## Design Principles

1. **Domain-Driven Design**
   - Rich domain models (`BaseModel`, `GeneratedModel`)
   - Value objects for immutable data (`ModelDefinition`)
   - Domain events for cross-cutting concerns (`ModelGenerated`)

2. **SOLID Principles**
   - Single Responsibility: Each class has one purpose
   - Open/Closed: Extensible through interfaces
   - Liskov Substitution: Implementations are interchangeable
   - Interface Segregation: Focused interfaces
   - Dependency Inversion: Dependencies via abstractions
