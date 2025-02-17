<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests\Feature\Providers;

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Event;
use Mockery;
use SAC\EloquentModelGenerator\EventSourcing\DatabaseEventStore;
use SAC\EloquentModelGenerator\EventSourcing\EventStore;
use SAC\EloquentModelGenerator\Providers\GeneratorServiceProvider;
use SAC\EloquentModelGenerator\Services\ModelAnalyzer;
use SAC\EloquentModelGenerator\Subscribers\ModelGenerationSubscriber;

beforeEach(function () {
    /** @var Application&Mockery\MockInterface */
    $this->app = Mockery::mock(Application::class);
    $this->provider = new GeneratorServiceProvider($this->app);
});

test('registers services correctly', function () {
    $this->app
        ->expects('singleton')
        ->twice()
        ->andReturnUsing(function ($class, $concrete = null) {
            static $calls = 0;
            $calls++;

            match ($calls) {
                1 => expect([$class, $concrete])->toBe([EventStore::class, DatabaseEventStore::class]),
                2 => expect($class)->toBe(ModelAnalyzer::class)
            };
        });

    $this->app
        ->expects('when')
        ->with(DatabaseEventStore::class)
        ->andReturnSelf();

    $this->app
        ->expects('needs')
        ->with('$table')
        ->andReturnSelf();

    $this->app
        ->expects('give')
        ->with('domain_events');

    $this->provider->register();
});

test('binds event subscribers', function () {
    Event::shouldReceive('subscribe')
        ->once()
        ->with(ModelGenerationSubscriber::class);

    $this->provider->boot();
});

test('provides correct services', function () {
    expect($this->provider->provides())
        ->toContain('database/migrations');
});

test('loads migrations from correct path', function () {
    $reflection = new \ReflectionClass($this->provider);
    $property = $reflection->getProperty('migrations');
    $property->setAccessible(true);

    expect($property->getValue($this->provider))
        ->toContain(__DIR__ . '/../../database/migrations');
});

afterEach(function () {
    Mockery::close();
});
