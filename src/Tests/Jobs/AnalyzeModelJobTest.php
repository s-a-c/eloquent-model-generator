<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests\Jobs;

use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Support\Facades\Event;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\MockObject\MockObject;
use SAC\EloquentModelGenerator\Events\ModelAnalyzed;
use SAC\EloquentModelGenerator\Jobs\AnalyzeModelJob;
use SAC\EloquentModelGenerator\Jobs\Middleware\RateLimitedJob;
use SAC\EloquentModelGenerator\Model\ModelDefinition;
use SAC\EloquentModelGenerator\Services\ModelAnalyzer;

final class AnalyzeModelJobTest extends TestCase
{
    private ModelDefinition $model;
    private ModelAnalyzer&MockObject $analyzer;
    private AnalyzeModelJob $job;
    private Dispatcher&MockObject $dispatcher;

    protected function setUp(): void
    {
        $this->model = new ModelDefinition(
            'User',
            'App\\Models',
            'users'
        );

        $this->analyzer = $this->createMock(ModelAnalyzer::class);
        $this->dispatcher = $this->createMock(Dispatcher::class);
        $this->job = new AnalyzeModelJob($this->model);

        Event::swap($this->dispatcher);
    }

    public function testJobDispatch(): void
    {
        $analysisResults = [
            'columns' => ['id' => ['type' => 'integer']],
            'relations' => []
        ];

        $this->analyzer->method('analyze')
            ->with($this->model)
            ->willReturn($analysisResults);

        $this->dispatcher->expects($this->once())
            ->method('dispatch')
            ->with($this->callback(function ($event) use ($analysisResults) {
                return $event instanceof ModelAnalyzed
                    && $event->results() === $analysisResults;
            }));

        $this->job->handle($this->analyzer);
    }

    public function testRateLimiting(): void
    {
        $middleware = $this->job->middleware();

        $this->assertCount(1, $middleware);
        $this->assertInstanceOf(RateLimitedJob::class, $middleware[0]);
    }

    public function testJobTags(): void
    {
        $tags = $this->job->tags();

        $this->assertContains('model:analyze', $tags);
        $this->assertContains('User', $tags);
    }

    public function testRetryUntil(): void
    {
        $retryUntil = $this->job->retryUntil();

        $this->assertInstanceOf(\DateTime::class, $retryUntil);
        $this->assertEqualsWithDelta(
            time() + 3600,
            $retryUntil->getTimestamp(),
            2
        );
    }
}
