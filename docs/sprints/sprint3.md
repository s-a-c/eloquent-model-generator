# Sprint 3: Event System & Queue Integration

**Duration**: 5 working days
**Focus**: Event-driven architecture and queue system

## Objectives

1. Implement domain events
2. Create event sourcing infrastructure
3. Add queue support for long-running operations
4. Integrate with Laravel's event and queue systems

## Tasks

### Day 1: Domain Events

#### Event Definitions
- [ ] Create base event interface
  ```php
  interface DomainEvent
  {
      public function eventId(): string;
      public function occurredOn(): DateTimeImmutable;
      public function payload(): array;
  }
  ```

#### Model Events
- [ ] Implement model generation events
  ```php
  final class ModelGenerationStarted implements DomainEvent
  {
      public function __construct(
          private readonly string $eventId,
          private readonly DateTimeImmutable $occurredOn,
          private readonly string $table,
          private readonly array $options
      ) {}

      public static function create(string $table, array $options): self
      {
          return new self(
              Uuid::v4()->toString(),
              new DateTimeImmutable(),
              $table,
              $options
          );
      }
  }

  final class ModelGenerated implements DomainEvent
  {
      public function __construct(
          private readonly string $eventId,
          private readonly DateTimeImmutable $occurredOn,
          private readonly ModelDefinition $model,
          private readonly string $path
      ) {}
  }
  ```

### Day 2: Event Sourcing

#### Event Store
- [ ] Create event store interface
  ```php
  interface EventStore
  {
      public function append(DomainEvent $event): void;
      public function getEventsFor(string $aggregateId): array;
      public function getAllEvents(): array;
  }
  ```

#### Database Event Store
- [ ] Implement database event store
  ```php
  final class DatabaseEventStore implements EventStore
  {
      public function __construct(
          private readonly Connection $connection,
          private readonly string $table = 'domain_events'
      ) {}

      public function append(DomainEvent $event): void
      {
          $this->connection->table($this->table)->insert([
              'event_id' => $event->eventId(),
              'occurred_on' => $event->occurredOn(),
              'event_type' => get_class($event),
              'payload' => json_encode($event->payload()),
          ]);
      }
  }
  ```

### Day 3: Queue Integration

#### Queue Jobs
- [ ] Create model analysis job
  ```php
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
  }
  ```

#### Job Middleware
- [ ] Implement rate limiting
  ```php
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

### Day 4: Event Listeners

#### Event Subscribers
- [ ] Create event subscribers
  ```php
  final class ModelGenerationSubscriber
  {
      public function handleGenerationStarted(
          ModelGenerationStarted $event
      ): void {
          Log::info("Starting model generation for {$event->table}");
      }

      public function handleModelGenerated(
          ModelGenerated $event
      ): void {
          dispatch(new AnalyzeModelJob($event->model));
      }

      public function subscribe($events): array
      {
          return [
              ModelGenerationStarted::class => 'handleGenerationStarted',
              ModelGenerated::class => 'handleModelGenerated',
          ];
      }
  }
  ```

#### Event Broadcasting
- [ ] Add real-time updates
  ```php
  final class ModelGenerated implements ShouldBroadcast
  {
      public function broadcastOn(): array
      {
          return [new PrivateChannel("model-generation.{$this->model->name}")];
      }

      public function broadcastWith(): array
      {
          return [
              'model' => $this->model->name,
              'path' => $this->path,
          ];
      }
  }
  ```

### Day 5: Integration & Testing

#### Service Provider
- [ ] Update service provider
  ```php
  final class GeneratorServiceProvider extends ServiceProvider
  {
      public function register(): void
      {
          $this->app->singleton(EventStore::class, DatabaseEventStore::class);

          $this->app->when(DatabaseEventStore::class)
              ->needs('$table')
              ->give('domain_events');
      }

      public function boot(): void
      {
          Event::subscribe(ModelGenerationSubscriber::class);

          Queue::looping(function () {
              while (DB::transactionLevel() > 0) {
                  DB::rollBack();
              }
          });
      }
  }
  ```

#### Testing
- [ ] Write event tests
- [ ] Test queue processing
- [ ] Verify event sourcing

## Commit Message

```
feat(events): implement event system and queue integration

- Add domain events and event sourcing
- Implement queue jobs and middleware
- Create event subscribers and broadcasting
- Add comprehensive event testing
- Integrate with Laravel's event/queue system

Following DDD principles:
- Domain events for state changes
- Event sourcing for audit trail
- Rich domain model integration
- Clear bounded contexts

SOLID compliance:
- Single responsibility for events
- Interface segregation for stores
- Dependency inversion in services
- Open for extension (subscribers)

Breaking changes: none
```

## Version History Update

```markdown
## [0.3.2-dev.4] - 2025-03-07

### Added
- Domain event system
- Event sourcing infrastructure
- Queue job processing
- Real-time broadcasting
- Event subscribers
- Comprehensive test suite

### Changed
- Enhanced model generation process
- Improved error handling
- Added audit trail capabilities

### Breaking Changes
None
