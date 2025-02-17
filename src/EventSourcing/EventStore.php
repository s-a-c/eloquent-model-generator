<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\EventSourcing;

use SAC\EloquentModelGenerator\Events\DomainEvent;

interface EventStore
{
    /**
     * Append a new event to the store
     */
    public function append(DomainEvent $event): void;

    /**
     * Retrieve all events for a specific aggregate
     *
     * @return array<DomainEvent>
     */
    public function getEventsFor(string $aggregateId): array;

    /**
     * Retrieve all events from the store
     *
     * @return array<DomainEvent>
     */
    public function getAllEvents(): array;
}
