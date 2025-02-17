<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Events;

use DateTimeImmutable;

interface DomainEvent
{
    public function eventId(): string;
    public function occurredOn(): DateTimeImmutable;
    public function payload(): array;
}
