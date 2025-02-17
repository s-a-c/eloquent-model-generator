<?php

use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Event;
use Mockery;
use SAC\EloquentModelGenerator\Events\ModelAnalyzed;
use SAC\EloquentModelGenerator\Jobs\AnalyzeModelJob;
use SAC\EloquentModelGenerator\Jobs\Middleware\RateLimitedJob;
use SAC\EloquentModelGenerator\Model\ModelDefinition;
use SAC\EloquentModelGenerator\Services\ModelAnalyzer;

beforeEach(function () {
    $this->model = new ModelDefinition(
        'User',
        'App\\Models',
        'users'
    );

    /** @var ModelAnalyzer&Mockery\MockInterface */
    $this->analyzer = Mockery::mock(ModelAnalyzer::class);
    $this->job = new AnalyzeModelJob($this->model);
});

test('job handles model analysis', function () {
    $analysisResults = [
        'columns' => ['id' => ['type' => 'integer']],
        'relations' => []
    ];

    $this->analyzer
        ->expects('analyze')
        ->with($this->model)
        ->andReturn($analysisResults);

    $this->job->handle($this->analyzer);

    Event::assertDispatched(function (ModelAnalyzed $event) use ($analysisResults) {
        return $event->results() === $analysisResults;
    });
});

test('job uses rate limiting middleware', function () {
    $middleware = $this->job->middleware();

    expect($middleware)
        ->toHaveCount(1)
        ->and($middleware[0])
        ->toBeInstanceOf(RateLimitedJob::class);
});

test('job has correct tags', function () {
    $tags = $this->job->tags();

    expect($tags)
        ->toContain('model:analyze')
        ->toContain('User')
        ->toHaveCount(2);
});

test('job retry until is set correctly', function () {
    $retryUntil = $this->job->retryUntil();

    expect($retryUntil)
        ->toBeInstanceOf(DateTime::class)
        ->and($retryUntil->getTimestamp())
        ->toBeCloseTo(time() + 3600, 2);
});

test('job is dispatched with correct model', function () {
    Bus::fake();

    dispatch($this->job);

    Bus::assertDispatched(AnalyzeModelJob::class, function ($job) {
        return $job->model === $this->model;
    });
});

afterEach(function () {
    Mockery::close();
});
