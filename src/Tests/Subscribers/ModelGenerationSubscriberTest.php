<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests\Subscribers;

use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Log;
use PHPUnit\Framework\TestCase;
use SAC\EloquentModelGenerator\Events\ModelGenerationStarted;
use SAC\EloquentModelGenerator\Events\ModelGenerated;
use SAC\EloquentModelGenerator\Events\ModelAnalyzed;
use SAC\EloquentModelGenerator\Jobs\AnalyzeModelJob;
use SAC\EloquentModelGenerator\Model\ModelDefinition;
use SAC\EloquentModelGenerator\Subscribers\ModelGenerationSubscriber;

final class ModelGenerationSubscriberTest extends TestCase
{
    private ModelGenerationSubscriber $subscriber;

    protected function setUp(): void
    {
        parent::setUp();
        $this->subscriber = new ModelGenerationSubscriber();
    }

    public function testHandleGenerationStarted(): void
    {
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
    }

    public function testHandleModelGenerated(): void
    {
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
    }

    public function testHandleModelAnalyzed(): void
    {
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
    }

    public function testSubscriberRegistration(): void
    {
        $events = $this->subscriber->subscribe([]);

        $this->assertArrayHasKey(ModelGenerationStarted::class, $events);
        $this->assertArrayHasKey(ModelGenerated::class, $events);
        $this->assertArrayHasKey(ModelAnalyzed::class, $events);

        $this->assertEquals('handleGenerationStarted', $events[ModelGenerationStarted::class]);
        $this->assertEquals('handleModelGenerated', $events[ModelGenerated::class]);
        $this->assertEquals('handleModelAnalyzed', $events[ModelAnalyzed::class]);
    }
}
