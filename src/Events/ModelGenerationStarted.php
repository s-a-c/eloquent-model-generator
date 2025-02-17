<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Events;

use DateTimeImmutable;
use Ramsey\Uuid\Uuid;

final class ModelGenerationStarted implements DomainEvent
{
    private function __construct(
        private readonly string $eventId,
        private readonly DateTimeImmutable $occurredOn,
        private readonly string $table,
        private readonly array $options
    ) {}

    public static function create(string $table, array $options): self
    {
        return new self(
            Uuid::uuid4()->toString(),
            new DateTimeImmutable(),
            $table,
            $options
        );
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
            'table' => $this->table,
            'options' => $this->options,
        ];
    }

    public function table(): string
    {
        return $this->table;
    }

    public function options(): array
    {
        return $this->options;
    }

    public static function reconstitute(
        string $eventId,
        DateTimeImmutable $occurredOn,
        string $table,
        array $options
    ): self {
        return new self($eventId, $occurredOn, $table, $options);
    }
}
