<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests\Providers;

use Illuminate\Support\Facades\Event;
use PHPUnit\Framework\TestCase;
use SAC\EloquentModelGenerator\EventSourcing\DatabaseEventStore;
use SAC\EloquentModelGenerator\EventSourcing\EventStore;
use SAC\EloquentModelGenerator\Providers\GeneratorServiceProvider;
use SAC\EloquentModelGenerator\Services\ModelAnalyzer;
use SAC\EloquentModelGenerator\Subscribers\ModelGenerationSubscriber;

final class GeneratorServiceProviderTest extends TestCase
{
    private GeneratorServiceProvider $provider;

    protected function setUp(): void
    {
        parent::setUp();
        $this->provider = new GeneratorServiceProvider($this->createMock('Illuminate\\Foundation\\Application'));
    }

    public function testServiceRegistration(): void
    {
        $app = $this->createMock('Illuminate\\Foundation\\Application');

        $app->expects($this->exactly(2))
            ->method('singleton')
            ->willReturnCallback(function ($class, $concrete = null) {
                static $calls = 0;
                $calls++;

                match ($calls) {
                    1 => $this->assertEquals([EventStore::class, DatabaseEventStore::class], [$class, $concrete]),
                    2 => $this->assertEquals(ModelAnalyzer::class, $class)
                };
            });

        $app->expects($this->once())
            ->method('when')
            ->with(DatabaseEventStore::class)
            ->willReturnSelf();

        $app->expects($this->once())
            ->method('needs')
            ->with('$table')
            ->willReturnSelf();

        $app->expects($this->once())
            ->method('give')
            ->with('domain_events');

        $provider = new GeneratorServiceProvider($app);
        $provider->register();
    }

    public function testEventSubscriberBinding(): void
    {
        Event::shouldReceive('subscribe')
            ->once()
            ->with(ModelGenerationSubscriber::class);

        $this->provider->boot();
    }

    public function testQueueConfiguration(): void
    {
        $app = $this->createMock('Illuminate\\Foundation\\Application');
        $provider = new GeneratorServiceProvider($app);

        $this->assertContains(
            'database/migrations',
            $provider->provides()
        );
    }

    public function testMigrationLoading(): void
    {
        $reflection = new \ReflectionClass($this->provider);
        $property = $reflection->getProperty('migrations');
        $property->setAccessible(true);

        $this->assertContains(
            __DIR__ . '/../../database/migrations',
            $property->getValue($this->provider)
        );
    }
}
