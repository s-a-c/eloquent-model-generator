<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests\EventSourcing;

use DateTimeImmutable;
use Illuminate\Database\Connection;
use PHPUnit\Framework\TestCase;
use RuntimeException;
use SAC\EloquentModelGenerator\EventSourcing\DatabaseEventStore;
use SAC\EloquentModelGenerator\Events\ModelGenerationStarted;
use SAC\EloquentModelGenerator\Events\ModelGenerated;
use SAC\EloquentModelGenerator\Model\ModelDefinition;

final class DatabaseEventStoreTest extends TestCase
{
    private Connection $connection;
    private DatabaseEventStore $store;
    private string $table = 'domain_events';

    protected function setUp(): void
    {
        $this->connection = $this->createMock(Connection::class);
        $this->store = new DatabaseEventStore($this->connection, $this->table);
    }

    public function testEventPersistence(): void
    {
        $event = ModelGenerationStarted::create('users', ['namespace' => 'App\\Models']);

        $this->connection->expects($this->once())
            ->method('table')
            ->with($this->table)
            ->willReturnSelf();

        $this->connection->expects($this->once())
            ->method('insert')
            ->with($this->callback(function (array $data) use ($event) {
                return $data['event_id'] === $event->eventId()
                    && $data['event_type'] === ModelGenerationStarted::class
                    && $data['aggregate_id'] === 'users'
                    && is_string($data['payload']);
            }));

        $this->store->append($event);
    }

    public function testEventRetrievalByAggregate(): void
    {
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

        $queryBuilder = $this->createMock('Illuminate\\Database\\Query\\Builder');
        $queryBuilder->method('where')->willReturnSelf();
        $queryBuilder->method('orderBy')->willReturnSelf();
        $queryBuilder->method('get')->willReturn(collect($events));

        $this->connection->method('table')
            ->willReturn($queryBuilder);

        $result = $this->store->getEventsFor($aggregateId);

        $this->assertCount(1, $result);
        $this->assertInstanceOf(ModelGenerationStarted::class, $result[0]);
        $this->assertEquals('id-1', $result[0]->eventId());
    }

    public function testEventReconstruction(): void
    {
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

        $queryBuilder = $this->createMock('Illuminate\\Database\\Query\\Builder');
        $queryBuilder->method('orderBy')->willReturnSelf();
        $queryBuilder->method('get')->willReturn(collect([$storedEvent]));

        $this->connection->method('table')
            ->willReturn($queryBuilder);

        $result = $this->store->getAllEvents();

        $this->assertCount(1, $result);
        $this->assertInstanceOf(ModelGenerated::class, $result[0]);
        $this->assertEquals($event->eventId(), $result[0]->eventId());
        $this->assertEquals($path, $result[0]->path());
    }

    public function testErrorHandlingForInvalidEvents(): void
    {
        $storedEvent = (object)[
            'event_id' => 'test-id',
            'occurred_on' => '2025-02-17 17:00:00',
            'event_type' => 'NonExistentEventClass',
            'payload' => '{}'
        ];

        $queryBuilder = $this->createMock('Illuminate\\Database\\Query\\Builder');
        $queryBuilder->method('orderBy')->willReturnSelf();
        $queryBuilder->method('get')->willReturn(collect([$storedEvent]));

        $this->connection->method('table')
            ->willReturn($queryBuilder);

        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('Event class NonExistentEventClass not found');

        $this->store->getAllEvents();
    }
}
