<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Events;

use DateTimeImmutable;
use Ramsey\Uuid\Uuid;

final class ModelAnalyzed implements DomainEvent
{
    private function __construct(
        private readonly string $eventId,
        private readonly DateTimeImmutable $occurredOn,
        private readonly array $results
    ) {}

    public static function create(array $results): self
    {
        return new self(
            Uuid::uuid4()->toString(),
            new DateTimeImmutable(),
            $results
        );
    }

    public static function reconstitute(
        string $eventId,
        DateTimeImmutable $occurredOn,
        array $results
    ): self {
        return new self($eventId, $occurredOn, $results);
    }

    public function eventId(): string
    {
        return $this->eventId;
    }

    public function occurredOn(): DateTimeImmutable
    {
        return $this->occurredOn;
    }

    public function payload(): array
    {
        return [
            'results' => $this->results,
        ];
    }

    public function results(): array
    {
        return $this->results;
    }
}
