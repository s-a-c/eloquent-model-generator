# Event-Driven Architecture

## Overview

This document outlines the event-driven architecture and queue system used in the Eloquent Model Generator package. The system uses Laravel's event and queue systems while following DDD principles.

## Domain Events

### 1. Model Generation Events

```php
namespace SAC\EloquentModelGenerator\Domain\Events;

final class ModelGenerationStarted
{
    public function __construct(
        public readonly string $table,
        public readonly array $options,
        public readonly string $connection
    ) {}
}

final class ModelGenerated
{
    public function __construct(
        public readonly ModelDefinition $model,
        public readonly string $path,
        public readonly array $metrics
    ) {}
}

final class ModelGenerationFailed
{
    public function __construct(
        public readonly string $table,
        public readonly string $error,
        public readonly ?Throwable $exception = null
    ) {}
}
```

### 2. Schema Analysis Events

```php
final class SchemaAnalysisStarted
{
    public function __construct(
        public readonly string $connection,
        public readonly array $tables
    ) {}
}

final class SchemaAnalyzed
{
    public function __construct(
        public readonly SchemaDefinition $schema,
        public readonly array $metrics
    ) {}
}

final class RelationshipsDetected
{
    public function __construct(
        public readonly string $table,
        public readonly Collection $relationships
    ) {}
}
```

## Event Listeners

### 1. Model Generation Listeners

```php
namespace SAC\EloquentModelGenerator\Listeners;

final class GenerateModelFactory
{
    public function __construct(
        private readonly FactoryGenerator $generator
    ) {}

    public function handle(ModelGenerated $event): void
    {
        $this->generator->generateFactory(
            $event->model,
            $event->path
        );
    }
}

final class UpdateModelDocumentation
{
    public function __construct(
        private readonly DocumentationGenerator $generator
    ) {}

    public function handle(ModelGenerated $event): void
    {
        $this->generator->updateDocumentation(
            $event->model,
            $event->metrics
        );
    }
}
```

### 2. Analysis Listeners

```php
final class CacheSchemaDefinition
{
    public function __construct(
        private readonly Cache $cache
    ) {}

    public function handle(SchemaAnalyzed $event): void
    {
        $this->cache->tags(['schema'])
            ->put(
                $this->getCacheKey($event->schema),
                $event->schema,
                now()->addHours(24)
            );
    }
}

final class TriggerModelAnalysis
{
    public function handle(SchemaAnalyzed $event): void
    {
        AnalyzeModelJob::dispatch($event->schema)
            ->onQueue('analysis');
    }
}
```

## Queue Jobs

### 1. Model Analysis Jobs

```php
namespace SAC\EloquentModelGenerator\Jobs;

final class AnalyzeModelJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        private readonly ModelDefinition $model
    ) {}

    public function handle(ModelAnalyzer $analyzer): void
    {
        $results = $analyzer->analyze($this->model);

        event(new ModelAnalyzed($results));
    }

    public function failed(Throwable $exception): void
    {
        event(new ModelAnalysisFailed(
            $this->model,
            $exception->getMessage()
        ));
    }
}
```

### 2. Documentation Jobs

```php
final class UpdateDocumentationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        private readonly Collection $models
    ) {}

    public function handle(DocumentationGenerator $generator): void
    {
        $this->models
            ->each(fn($model) => $generator->update($model));

        event(new DocumentationUpdated($this->models));
    }
}
```

## Command Bus

### 1. Commands

```php
namespace SAC\EloquentModelGenerator\Commands;

final class GenerateModelCommand
{
    public function __construct(
        public readonly string $table,
        public readonly array $options = []
    ) {}
}

final class AnalyzeSchemaCommand
{
    public function __construct(
        public readonly string $connection,
        public readonly array $tables = []
    ) {}
}
```

### 2. Command Handlers

```php
namespace SAC\EloquentModelGenerator\CommandHandlers;

final class GenerateModelHandler
{
    public function __construct(
        private readonly ModelGenerator $generator,
        private readonly EventDispatcher $events
    ) {}

    public function handle(GenerateModelCommand $command): void
    {
        $this->events->dispatch(
            new ModelGenerationStarted(
                $command->table,
                $command->options
            )
        );

        $model = $this->generator->generate(
            $command->table,
            $command->options
        );

        $this->events->dispatch(
            new ModelGenerated($model)
        );
    }
}
```

## Event Sourcing

### 1. Events

```php
namespace SAC\EloquentModelGenerator\Events;

interface DomainEvent
{
    public function eventId(): string;
    public function occurredOn(): DateTimeImmutable;
}

final class ModelDefinitionCreated implements DomainEvent
{
    public function __construct(
        private readonly string $eventId,
        private readonly DateTimeImmutable $occurredOn,
        public readonly string $modelId,
        public readonly string $name,
        public readonly array $attributes
    ) {}

    public function eventId(): string
    {
        return $this->eventId;
    }

    public function occurredOn(): DateTimeImmutable
    {
        return $this->occurredOn;
    }
}
```

### 2. Event Store

```php
namespace SAC\EloquentModelGenerator\EventSourcing;

interface EventStore
{
    public function append(DomainEvent $event): void;
    public function getEventsFor(string $modelId): array;
}

final class DatabaseEventStore implements EventStore
{
    public function __construct(
        private readonly Connection $connection
    ) {}

    public function append(DomainEvent $event): void
    {
        $this->connection->table('domain_events')->insert([
            'event_id' => $event->eventId(),
            'occurred_on' => $event->occurredOn(),
            'event_type' => get_class($event),
            'event_data' => json_encode($event)
        ]);
    }
}
```

## Queue Configuration

### 1. Queue Workers

```php
// config/queue.php
return [
    'default' => 'redis',

    'connections' => [
        'redis' => [
            'driver' => 'redis',
            'connection' => 'default',
            'queue' => 'default',
            'retry_after' => 90,
            'block_for' => null,
        ],
    ],

    'failed' => [
        'driver' => 'database-uuids',
        'database' => 'mysql',
        'table' => 'failed_jobs',
    ],
];
```

### 2. Job Middleware

```php
namespace SAC\EloquentModelGenerator\Jobs\Middleware;

final class RateLimitedJob implements JobMiddleware
{
    public function handle(Job $job, callable $next): void
    {
        Redis::throttle('model-generation')
            ->allow(10)
            ->every(60)
            ->then(
                fn() => $next($job),
                fn() => $job->release(60)
            );
    }
}
```

## Event Broadcasting

### 1. Channel Definition

```php
// routes/channels.php
Broadcast::channel('model-generation.{id}', function ($user, $id) {
    return true; // Add authorization logic
});
```

### 2. Event Broadcasting

```php
final class ModelGenerated implements ShouldBroadcast
{
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel(
                "model-generation.{$this->model->id}"
            )
        ];
    }

    public function broadcastWith(): array
    {
        return [
            'model' => $this->model->name,
            'path' => $this->path,
            'metrics' => $this->metrics
        ];
    }
}
```

## Best Practices

1. Event Naming
   - Use past tense for events (e.g., ModelGenerated)
   - Be specific about what occurred
   - Include relevant context

2. Event Properties
   - Make properties immutable (readonly)
   - Include only necessary data
   - Consider serialization needs

3. Queue Management
   - Use appropriate queue connections
   - Implement retry strategies
   - Handle failed jobs gracefully

4. Event Listeners
   - Keep listeners focused
   - Handle errors appropriately
   - Consider async processing

5. Command Bus Usage
   - One handler per command
   - Validate commands
   - Maintain CQRS principles

## Implementation Guidelines

1. Always dispatch events through the event dispatcher
2. Use queue jobs for long-running tasks
3. Implement proper error handling
4. Use event sourcing where appropriate
5. Configure proper queue workers
6. Implement job middleware as needed
7. Use broadcasting for real-time updates
8. Maintain proper documentation
