<?php

use SAC\EloquentModelGenerator\Events\ModelGenerationStarted;
use SAC\EloquentModelGenerator\Events\ModelGenerated;
use SAC\EloquentModelGenerator\Events\ModelAnalyzed;
use SAC\EloquentModelGenerator\Model\ModelDefinition;

beforeEach(function () {
    $this->model = new ModelDefinition(
        'User',
        'App\\Models',
        'users'
    );
});

test('event id generation follows uuid v4 format', function () {
    $event = ModelGenerationStarted::create('users', []);

    expect($event->eventId())
        ->toMatch('/^[0-9a-f]{8}-[0-9a-f]{4}-4[0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}$/');
});

test('timestamp creation is current', function () {
    $event = ModelGenerationStarted::create('users', []);

    expect($event->occurredOn())
        ->toBeInstanceOf(DateTimeImmutable::class)
        ->and($event->occurredOn()->getTimestamp())
        ->toBeCloseTo(time(), 2);
});

test('model generation started event has correct payload', function () {
    $table = 'users';
    $options = ['namespace' => 'App\\Models'];

    $event = ModelGenerationStarted::create($table, $options);

    expect($event->payload())
        ->toBe([
            'table' => $table,
            'options' => $options
        ]);
});

test('model generated event has correct payload', function () {
    $path = 'app/Models/User.php';
    $event = ModelGenerated::create($this->model, $path);

    expect($event->payload())
        ->toBe([
            'model' => [
                'name' => 'User',
                'namespace' => 'App\\Models',
                'table' => 'users'
            ],
            'path' => $path
        ]);
});

test('model analyzed event has correct payload', function () {
    $results = [
        'columns' => ['id' => ['type' => 'integer']],
        'relations' => []
    ];

    $event = ModelAnalyzed::create($results);

    expect($event->payload())
        ->toBe(['results' => $results]);
});

test('event can be reconstituted', function () {
    $eventId = '123e4567-e89b-12d3-a456-426614174000';
    $occurredOn = new DateTimeImmutable();
    $results = ['columns' => ['id' => ['type' => 'integer']]];

    $event = ModelAnalyzed::reconstitute($eventId, $occurredOn, $results);

    expect($event->eventId())->toBe($eventId)
        ->and($event->occurredOn())->toBe($occurredOn)
        ->and($event->payload())->toBe(['results' => $results]);
});
