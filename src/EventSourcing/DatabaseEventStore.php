<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\EventSourcing;

use DateTimeImmutable;
use Illuminate\Database\Connection;
use RuntimeException;
use SAC\EloquentModelGenerator\Events\DomainEvent;
use SAC\EloquentModelGenerator\Model\ModelDefinition;

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
            'occurred_on' => $event->occurredOn()->format('Y-m-d H:i:s.u'),
            'event_type' => get_class($event),
            'aggregate_id' => $this->extractAggregateId($event),
            'payload' => json_encode($event->payload(), JSON_THROW_ON_ERROR),
        ]);
    }

    public function getEventsFor(string $aggregateId): array
    {
        $events = $this->connection->table($this->table)
            ->where('aggregate_id', $aggregateId)
            ->orderBy('occurred_on')
            ->get();

        return array_map(
            fn ($event) => $this->reconstructEvent($event),
            $events->all()
        );
    }

    public function getAllEvents(): array
    {
        $events = $this->connection->table($this->table)
            ->orderBy('occurred_on')
            ->get();

        return array_map(
            fn ($event) => $this->reconstructEvent($event),
            $events->all()
        );
    }

    private function extractAggregateId(DomainEvent $event): string
    {
        $payload = $event->payload();

        if (isset($payload['model']['name'])) {
            return $payload['model']['name'];
        }

        if (isset($payload['table'])) {
            return $payload['table'];
        }

        throw new RuntimeException('Could not extract aggregate ID from event payload');
    }

    private function reconstructEvent(object $data): DomainEvent
    {
        $eventClass = $data->event_type;
        if (!class_exists($eventClass)) {
            throw new RuntimeException("Event class {$eventClass} not found");
        }

        $payload = json_decode($data->payload, true, 512, JSON_THROW_ON_ERROR);

        if (!method_exists($eventClass, 'reconstitute')) {
            throw new RuntimeException("Event class {$eventClass} must implement reconstitute method");
        }

        if (isset($payload['results'])) {
            return $eventClass::reconstitute(
                $data->event_id,
                new DateTimeImmutable($data->occurred_on),
                $payload['results']
            );
        }

        if (isset($payload['table'], $payload['options'])) {
            return $eventClass::reconstitute(
                $data->event_id,
                new DateTimeImmutable($data->occurred_on),
                $payload['table'],
                $payload['options']
            );
        }

        if (isset($payload['model'], $payload['path'])) {
            return $eventClass::reconstitute(
                $data->event_id,
                new DateTimeImmutable($data->occurred_on),
                $this->reconstructModel($payload['model']),
                $payload['path']
            );
        }

        throw new RuntimeException("Unknown event payload structure");
    }

    private function reconstructModel(array $modelData): ModelDefinition
    {
        return new ModelDefinition(
            $modelData['name'],
            $modelData['namespace'],
            $modelData['table']
        );
    }
}
