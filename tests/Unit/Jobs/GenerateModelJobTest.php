<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests\Unit\Jobs;

use Error;
use Illuminate\Support\Facades\Event;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\MockObject\MockObject;
use RuntimeException;
use SAC\EloquentModelGenerator\Contracts\ModelGeneratorInterface;
use SAC\EloquentModelGenerator\Domain\ValueObjects\GenerationResult;
use SAC\EloquentModelGenerator\Events\ModelGenerationProgressEvent;
use SAC\EloquentModelGenerator\Jobs\GenerateModelJob;
use SAC\EloquentModelGenerator\Tests\TestCase;

final class GenerateModelJobTest extends TestCase
{
    private GenerateModelJob $job;

    private MockObject&ModelGeneratorInterface $generator;

    protected function setUp(): void
    {
        parent::setUp();

        $this->generator = $this->createMock(ModelGeneratorInterface::class);

        config([
            'model-generator.queue.retries' => 3,
            'model-generator.queue.retry_delay' => 5,
            'model-generator.queue.timeout' => 60,
            'model-generator.queue.priority' => 1,
        ]);

        $this->job = new GenerateModelJob(
            tables: ['users', 'posts'],
            options: ['with_docs' => true],
        );
    }

    #[Test]
    public function it_processes_tables(): void
    {
        // Arrange
        Event::fake();

        $this->generator->expects($this->exactly(2))
            ->method('generate')
            ->willReturn(GenerationResult::success(['app/Models/User.php']));

        // Act
        $this->job->handle($this->generator);

        // Assert
        Event::assertDispatched(ModelGenerationProgressEvent::class, function ($event) {
            return $event->table === 'users' && $event->current === 1;
        });

        Event::assertDispatched(ModelGenerationProgressEvent::class, function ($event) {
            return $event->table === 'posts' && $event->current === 2;
        });
    }

    #[Test]
    public function it_handles_generation_errors(): void
    {
        // Arrange
        Event::fake();

        $this->generator->expects($this->once())
            ->method('generate')
            ->willThrowException(new RuntimeException('Failed to generate'));

        // Act
        $this->job->handle($this->generator);

        // Assert
        Event::assertDispatched(ModelGenerationProgressEvent::class, function ($event) {
            return $event->error === 'Failed to generate';
        });
    }

    #[Test]
    public function it_continues_on_error_when_configured(): void
    {
        // Arrange
        Event::fake();

        $this->job = new GenerateModelJob(
            tables: ['users', 'posts'],
            options: ['continue_on_error' => true],
        );

        $this->generator->expects($this->exactly(2))
            ->method('generate')
            ->willThrowException(new RuntimeException('Failed to generate'));

        // Act
        $this->job->handle($this->generator);

        // Assert
        Event::assertDispatched(ModelGenerationProgressEvent::class, 2);
    }

    #[Test]
    public function it_handles_job_failure(): void
    {
        // Arrange
        Event::fake();

        // Act
        $this->job->failed(new RuntimeException('Job failed'));

        // Assert
        Event::assertDispatched(ModelGenerationProgressEvent::class, function ($event) {
            return $event->error === 'Job failed' && ! $event->isComplete;
        });
    }

    #[Test]
    public function it_configures_job_properties(): void
    {
        // Assert
        expect($this->job->tries)->toBe(3)
            ->and($this->job->backoff)->toBe(5)
            ->and($this->job->timeout)->toBe(60)
            ->and($this->job->priority)->toBe(1);
    }

    #[Test]
    public function it_uses_default_job_properties(): void
    {
        // Arrange
        config([
            'model-generator.queue.retries' => null,
            'model-generator.queue.retry_delay' => null,
            'model-generator.queue.timeout' => null,
            'model-generator.queue.priority' => null,
        ]);

        // Act
        $job = new GenerateModelJob(['users']);

        // Assert
        expect($job->tries)->toBe(3) // Default value
            ->and($job->backoff)->toBe(5) // Default value
            ->and($job->timeout)->toBe(60) // Default value
            ->and($job->priority)->toBe(0); // Default value
    }

    #[Test]
    public function it_tracks_progress_correctly(): void
    {
        // Arrange
        Event::fake();

        $this->generator->expects($this->exactly(3))
            ->method('generate')
            ->willReturn(GenerationResult::success(['app/Models/Model.php']));

        $job = new GenerateModelJob(['users', 'posts', 'comments']);

        // Act
        $job->handle($this->generator);

        // Assert
        Event::assertDispatched(ModelGenerationProgressEvent::class, function ($event) {
            return $event->current === 1 && $event->total === 3 && ! $event->isComplete;
        });

        Event::assertDispatched(ModelGenerationProgressEvent::class, function ($event) {
            return $event->current === 2 && $event->total === 3 && ! $event->isComplete;
        });

        Event::assertDispatched(ModelGenerationProgressEvent::class, function ($event) {
            return $event->current === 3 && $event->total === 3 && $event->isComplete;
        });
    }

    #[Test]
    public function it_passes_options_to_generator(): void
    {
        // Arrange
        $options = [
            'with_docs' => true,
            'namespace' => 'App\\Domain\\Models',
        ];

        $job = new GenerateModelJob(['users'], $options);

        $this->generator->expects($this->once())
            ->method('generate')
            ->with(['users'], $options)
            ->willReturn(GenerationResult::success(['app/Models/User.php']));

        // Act
        $job->handle($this->generator);
    }

    #[Test]
    public function it_handles_empty_tables_list(): void
    {
        // Arrange
        Event::fake();
        $job = new GenerateModelJob([]);

        // Act
        $job->handle($this->generator);

        // Assert
        $this->generator->expects($this->never())
            ->method('generate');

        Event::assertNotDispatched(ModelGenerationProgressEvent::class);
    }

    #[Test]
    public function it_handles_memory_exhaustion(): void
    {
        // Arrange
        Event::fake();

        $this->generator->expects($this->once())
            ->method('generate')
            ->willThrowException(new Error('Allowed memory size exhausted'));

        // Assert
        $this->expectException(Error::class);
        $this->expectExceptionMessage('Allowed memory size exhausted');

        // Act
        $this->job->handle($this->generator);
    }
}
