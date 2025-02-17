<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests\Feature\EventSourcing;

use Illuminate\Database\Connection;
use Illuminate\Database\Query\Builder;
use Mockery;
use RuntimeException;
use SAC\EloquentModelGenerator\EventSourcing\DatabaseEventStore;
use SAC\EloquentModelGenerator\Events\ModelGenerationStarted;
use SAC\EloquentModelGenerator\Events\ModelGenerated;
use SAC\EloquentModelGenerator\Model\ModelDefinition;

beforeEach(function () {
    /** @var Connection&Mockery\MockInterface */
    $this->connection = Mockery::mock(Connection::class);
    $this->table = 'domain_events';
    $this->store = new DatabaseEventStore($this->connection, $this->table);
});

test('events are persisted correctly', function () {
    $event = ModelGenerationStarted::create('users', ['namespace' => 'App\\Models']);

    $this->connection
        ->expects('table')
        ->with($this->table)
        ->andReturnSelf();

    $this->connection
        ->expects('insert')
        ->with(Mockery::on(function ($data) use ($event) {
            return $data['event_id'] === $event->eventId()
                && $data['event_type'] === ModelGenerationStarted::class
                && $data['aggregate_id'] === 'users'
                && is_string($data['payload']);
        }));

    $this->store->append($event);
});

test('events can be retrieved by aggregate', function () {
    $aggregateId = 'users';
    $events = [
        (object)[
            'event_id' => 'id-1',
            'occurred_on' => '2025-02-17 17:00:00',
            'event_type' => ModelGenerationStarted::class,
            'payload' => json_encode([
                'table' => 'users',
                'options' => ['namespace' => 'App\\Models']
            ])
        ]
    ];

    /** @var Builder&Mockery\MockInterface */
    $queryBuilder = Mockery::mock(Builder::class);
    $queryBuilder->expects('where')->andReturnSelf();
    $queryBuilder->expects('orderBy')->andReturnSelf();
    $queryBuilder->expects('get')->andReturn(collect($events));

    $this->connection
        ->expects('table')
        ->andReturn($queryBuilder);

    $result = $this->store->getEventsFor($aggregateId);

    expect($result)
        ->toHaveCount(1)
        ->and($result[0])
        ->toBeInstanceOf(ModelGenerationStarted::class)
        ->and($result[0]->eventId())
        ->toBe('id-1');
});

test('events can be reconstructed', function () {
    $model = new ModelDefinition('User', 'App\\Models', 'users');
    $path = 'app/Models/User.php';
    $event = ModelGenerated::create($model, $path);

    $storedEvent = (object)[
        'event_id' => $event->eventId(),
        'occurred_on' => $event->occurredOn()->format('Y-m-d H:i:s'),
        'event_type' => ModelGenerated::class,
        'payload' => json_encode([
            'model' => [
                'name' => 'User',
                'namespace' => 'App\\Models',
                'table' => 'users'
            ],
            'path' => $path
        ])
    ];

    /** @var Builder&Mockery\MockInterface */
    $queryBuilder = Mockery::mock(Builder::class);
    $queryBuilder->expects('orderBy')->andReturnSelf();
    $queryBuilder->expects('get')->andReturn(collect([$storedEvent]));

    $this->connection
        ->expects('table')
        ->andReturn($queryBuilder);

    $result = $this->store->getAllEvents();

    expect($result)
        ->toHaveCount(1)
        ->and($result[0])
        ->toBeInstanceOf(ModelGenerated::class)
        ->and($result[0]->eventId())
        ->toBe($event->eventId())
        ->and($result[0]->path())
        ->toBe($path);
});

test('invalid event class throws exception', function () {
    $storedEvent = (object)[
        'event_id' => 'test-id',
        'occurred_on' => '2025-02-17 17:00:00',
        'event_type' => 'NonExistentEventClass',
        'payload' => '{}'
    ];

    /** @var Builder&Mockery\MockInterface */
    $queryBuilder = Mockery::mock(Builder::class);
    $queryBuilder->expects('orderBy')->andReturnSelf();
    $queryBuilder->expects('get')->andReturn(collect([$storedEvent]));

    $this->connection
        ->expects('table')
        ->andReturn($queryBuilder);

    expect(fn () => $this->store->getAllEvents())
        ->toThrow(RuntimeException::class, 'Event class NonExistentEventClass not found');
});

afterEach(function () {
    Mockery::close();
});
