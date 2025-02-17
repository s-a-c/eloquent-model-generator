<?php

use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Log;
use SAC\EloquentModelGenerator\Events\ModelGenerationStarted;
use SAC\EloquentModelGenerator\Events\ModelGenerated;
use SAC\EloquentModelGenerator\Events\ModelAnalyzed;
use SAC\EloquentModelGenerator\Jobs\AnalyzeModelJob;
use SAC\EloquentModelGenerator\Model\ModelDefinition;
use SAC\EloquentModelGenerator\Subscribers\ModelGenerationSubscriber;

beforeEach(function () {
    $this->subscriber = new ModelGenerationSubscriber();
});

test('handles generation started event', function () {
    $event = ModelGenerationStarted::create(
        'users',
        ['namespace' => 'App\\Models']
    );

    Log::shouldReceive('info')
        ->once()
        ->with(
            'Starting model generation',
            [
                'table' => 'users',
                'options' => ['namespace' => 'App\\Models']
            ]
        );

    $this->subscriber->handleGenerationStarted($event);
});

test('handles model generated event', function () {
    $model = new ModelDefinition(
        'User',
        'App\\Models',
        'users'
    );

    $event = ModelGenerated::create($model, 'app/Models/User.php');

    Log::shouldReceive('info')
        ->once()
        ->with(
            'Model generated successfully',
            [
                'model' => 'User',
                'path' => 'app/Models/User.php'
            ]
        );

    Bus::fake();

    $this->subscriber->handleModelGenerated($event);

    Bus::assertDispatched(AnalyzeModelJob::class, function ($job) use ($model) {
        return $job->model === $model;
    });
});

test('handles model analyzed event', function () {
    $results = [
        'columns' => ['id' => ['type' => 'integer']],
        'relations' => []
    ];

    $event = ModelAnalyzed::create($results);

    Log::shouldReceive('info')
        ->once()
        ->with(
            'Model analysis completed',
            ['results' => $results]
        );

    $this->subscriber->handleModelAnalyzed($event);
});

test('registers event handlers correctly', function () {
    $events = $this->subscriber->subscribe([]);

    expect($events)
        ->toHaveKey(ModelGenerationStarted::class, 'handleGenerationStarted')
        ->toHaveKey(ModelGenerated::class, 'handleModelGenerated')
        ->toHaveKey(ModelAnalyzed::class, 'handleModelAnalyzed');
});
