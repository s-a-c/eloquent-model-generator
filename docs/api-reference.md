# API Reference

## 6.1. Public Interfaces

### ModelGeneratorInterface

The main entry point for model generation:

```php
namespace SAC\EloquentModelGenerator\Contracts;

interface ModelGeneratorInterface
{
    /**
     * Generate models for the specified tables.
     *
     * @param array<string> $tables Table names to generate models for
     * @param array<string, mixed> $options Generation options
     * @return \SAC\EloquentModelGenerator\Domain\ValueObjects\GenerationResult
     * @throws \SAC\EloquentModelGenerator\Exceptions\ModelGenerationException
     */
    public function generate(array $tables, array $options = []): GenerationResult;

    /**
     * Analyze all database tables.
     *
     * @return array<\SAC\EloquentModelGenerator\Domain\ValueObjects\TableDefinition>
     * @throws \SAC\EloquentModelGenerator\Exceptions\SchemaAnalysisException
     */
    public function analyzeTables(): array;
}
```

### SchemaAnalyzerInterface

Responsible for database schema analysis:

```php
namespace SAC\EloquentModelGenerator\Services\Contracts;

interface SchemaAnalyzerInterface
{
    /**
     * Analyze a specific table.
     *
     * @param string $table Table name
     * @return \SAC\EloquentModelGenerator\Domain\ValueObjects\TableDefinition
     * @throws \SAC\EloquentModelGenerator\Exceptions\SchemaAnalysisException
     */
    public function analyze(string $table): TableDefinition;

    /**
     * Get all available tables.
     *
     * @return array<string>
     */
    public function getTables(): array;
}
```

## 6.2. Service Contracts

### RelationshipResolverInterface

Handles relationship detection and resolution:

```php
namespace SAC\EloquentModelGenerator\Services\Contracts;

interface RelationshipResolverInterface
{
    /**
     * Resolve relationships between tables.
     *
     * @param array<\SAC\EloquentModelGenerator\Domain\ValueObjects\TableDefinition> $tables
     * @return array<\SAC\EloquentModelGenerator\Domain\ValueObjects\RelationshipDefinition>
     */
    public function resolve(array $tables): array;

    /**
     * Detect polymorphic relationships.
     *
     * @param \SAC\EloquentModelGenerator\Domain\ValueObjects\TableDefinition $table
     * @return array<\SAC\EloquentModelGenerator\Domain\ValueObjects\RelationshipDefinition>
     */
    public function detectPolymorphic(TableDefinition $table): array;
}
```

### CodeGeneratorInterface

Handles model code generation:

```php
namespace SAC\EloquentModelGenerator\Services\Contracts;

interface CodeGeneratorInterface
{
    /**
     * Generate model code.
     *
     * @param \SAC\EloquentModelGenerator\Domain\ValueObjects\TableDefinition $definition
     * @return string Generated code
     * @throws \SAC\EloquentModelGenerator\Exceptions\ModelGenerationException
     */
    public function generate(TableDefinition $definition): string;

    /**
     * Load custom templates.
     *
     * @param string $path Template path
     * @return void
     * @throws \SAC\EloquentModelGenerator\Exceptions\InvalidConfigurationException
     */
    public function loadTemplates(string $path): void;
}
```

## 6.3. Value Objects

### TableDefinition

Represents a database table structure:

```php
namespace SAC\EloquentModelGenerator\Domain\ValueObjects;

final readonly class TableDefinition
{
    /**
     * @param string $name Table name
     * @param array<ColumnDefinition> $columns
     * @param array<IndexDefinition> $indices
     * @param array<RelationshipDefinition> $relationships
     */
    public function __construct(
        public string $name,
        public array $columns,
        public array $indices = [],
        public array $relationships = [],
    ) {}

    public function hasTimestamps(): bool {}
    public function hasSoftDeletes(): bool {}
    public function isPolymorphic(): bool {}
    public function getPrimaryKey(): ?ColumnDefinition {}
}
```

### RelationshipDefinition

Defines a model relationship:

```php
namespace SAC\EloquentModelGenerator\Domain\ValueObjects;

final readonly class RelationshipDefinition
{
    /**
     * @param RelationType $type
     * @param string $localKey
     * @param string $foreignKey
     * @param string $relatedTable
     * @param bool $polymorphic
     */
    public function __construct(
        public RelationType $type,
        public string $localKey,
        public string $foreignKey,
        public string $relatedTable,
        public bool $polymorphic = false,
    ) {}

    public function getMethodName(): string {}
    public function getRelatedModel(): string {}
    public function isPolymorphic(): bool {}
}
```

## 6.4. Events

### ModelGenerationProgressEvent

Tracks generation progress:

```php
namespace SAC\EloquentModelGenerator\Events;

final readonly class ModelGenerationProgressEvent
{
    /**
     * @param string $table Current table
     * @param int $current Current progress
     * @param int $total Total tables
     * @param bool $isComplete Whether generation is complete
     * @param GenerationResult|null $result Generation result
     * @param string|null $error Error message if any
     */
    public function __construct(
        public string $table,
        public int $current,
        public int $total,
        public bool $isComplete,
        public ?GenerationResult $result = null,
        public ?string $error = null,
    ) {}

    public function getProgress(): float {}
    public function isSuccessful(): bool {}
    public function getResult(): ?GenerationResult {}
    public function getError(): ?string {}
    public function getRemainingCount(): int {}
}
```

### Usage Examples

#### Basic Model Generation

```php
use SAC\EloquentModelGenerator\Contracts\ModelGeneratorInterface;

class ModelGenerationService
{
    public function __construct(
        private readonly ModelGeneratorInterface $generator,
    ) {}

    public function generateModels(): void
    {
        // Generate for specific tables
        $result = $this->generator->generate(['users', 'posts']);

        // Generate for all tables
        $tables = $this->generator->analyzeTables();
        $result = $this->generator->generate($tables);
    }
}
```

#### Custom Event Handling

```php
use SAC\EloquentModelGenerator\Events\ModelGenerationProgressEvent;
use Illuminate\Support\Facades\Event;

Event::listen(function (ModelGenerationProgressEvent $event) {
    $progress = $event->getProgress();
    $remaining = $event->getRemainingCount();

    if ($event->isComplete) {
        // Handle completion
    } elseif ($event->isSuccessful()) {
        // Handle success
    } else {
        // Handle error
        $error = $event->getError();
    }
});
```

#### Error Handling

```php
use SAC\EloquentModelGenerator\Exceptions\ModelGenerationException;
use SAC\EloquentModelGenerator\Exceptions\SchemaAnalysisException;

try {
    $result = $generator->generate($tables);
} catch (ModelGenerationException $e) {
    // Handle generation error
    $context = $e->getContext();
    logger()->error('Model generation failed', $context);
} catch (SchemaAnalysisException $e) {
    // Handle schema analysis error
    $table = $e->getTable();
    $reason = $e->getReason();
    logger()->error("Schema analysis failed for table {$table}: {$reason}");
}
```

[← Back to Implementation Guide](./implementation.md) | [Continue to Advanced Usage →](./advanced-usage.md)
