<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests\Events;

use DateTimeImmutable;
use PHPUnit\Framework\TestCase;
use SAC\EloquentModelGenerator\Events\ModelGenerationStarted;
use SAC\EloquentModelGenerator\Events\ModelGenerated;
use SAC\EloquentModelGenerator\Events\ModelAnalyzed;

final class DomainEventTest extends TestCase
{
    public function testEventIdGeneration(): void
    {
        $event = ModelGenerationStarted::create('users', []);

        $this->assertMatchesRegularExpression(
            '/^[0-9a-f]{8}-[0-9a-f]{4}-4[0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}$/',
            $event->eventId()
        );
    }

    public function testTimestampCreation(): void
    {
        $event = ModelGenerationStarted::create('users', []);

        $this->assertInstanceOf(DateTimeImmutable::class, $event->occurredOn());
        $this->assertEqualsWithDelta(
            time(),
            $event->occurredOn()->getTimestamp(),
            2
        );
    }

    public function testModelGenerationStartedPayload(): void
    {
        $table = 'users';
        $options = ['namespace' => 'App\\Models'];

        $event = ModelGenerationStarted::create($table, $options);

        $this->assertEquals(
            ['table' => $table, 'options' => $options],
            $event->payload()
        );
    }

    public function testModelGeneratedPayload(): void
    {
        $model = new \SAC\EloquentModelGenerator\Model\ModelDefinition(
            'User',
            'App\\Models',
            'users'
        );

        $path = 'app/Models/User.php';

        $event = ModelGenerated::create($model, $path);

        $this->assertEquals(
            [
                'model' => [
                    'name' => 'User',
                    'namespace' => 'App\\Models',
                    'table' => 'users'
                ],
                'path' => $path
            ],
            $event->payload()
        );
    }

    public function testModelAnalyzedPayload(): void
    {
        $results = [
            'columns' => ['id' => ['type' => 'integer']],
            'relations' => ['posts' => ['type' => 'hasMany']]
        ];

        $event = ModelAnalyzed::create($results);

        $this->assertEquals(
            ['results' => $results],
            $event->payload()
        );
    }

    public function testEventReconstitution(): void
    {
        $eventId = '123e4567-e89b-12d3-a456-426614174000';
        $occurredOn = new DateTimeImmutable();
        $results = ['columns' => ['id' => ['type' => 'integer']]];

        $event = ModelAnalyzed::reconstitute($eventId, $occurredOn, $results);

        $this->assertSame($eventId, $event->eventId());
        $this->assertSame($occurredOn, $event->occurredOn());
        $this->assertEquals(['results' => $results], $event->payload());
    }
}
