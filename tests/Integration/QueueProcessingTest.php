<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests\Integration;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Queue;
use PHPUnit\Framework\Attributes\Test;
use SAC\EloquentModelGenerator\Contracts\ModelGeneratorInterface;
use SAC\EloquentModelGenerator\Events\ModelGenerationProgressEvent;
use SAC\EloquentModelGenerator\Jobs\GenerateModelJob;
use SAC\EloquentModelGenerator\Tests\TestCase;

final class QueueProcessingTest extends TestCase
{
    private string $outputPath;

    private ModelGeneratorInterface $generator;

    protected function setUp(): void
    {
        parent::setUp();

        $this->outputPath = $this->createTempDirectory();
        config([
            'model-generator.generation.path' => $this->outputPath,
            'model-generator.queue.enabled' => true,
            'model-generator.queue.connection' => 'sync',
            'model-generator.queue.chunk_size' => 2,
        ]);

        $this->generator = $this->app->make(ModelGeneratorInterface::class);
        $this->createTestSchema();
    }

    protected function tearDown(): void
    {
        $this->cleanupTempDirectory($this->outputPath);
        parent::tearDown();
    }

    #[Test]
    public function it_processes_tables_in_chunks(): void
    {
        // Arrange
        Queue::fake();

        // Act
        $result = $this->generator->generate([
            'users', 'posts', 'comments', 'tags',
        ]);

        // Assert
        Queue::assertPushed(GenerateModelJob::class, 2); // 4 tables / 2 per chunk = 2 jobs
    }

    #[Test]
    public function it_tracks_generation_progress(): void
    {
        // Arrange
        Event::fake();

        // Act
        $result = $this->generator->generate([
            'users', 'posts', 'comments',
        ]);

        // Assert
        Event::assertDispatched(ModelGenerationProgressEvent::class, function ($event) {
            return $event->total === 3 && $event->current === 1;
        });

        Event::assertDispatched(ModelGenerationProgressEvent::class, function ($event) {
            return $event->total === 3 && $event->current === 2;
        });

        Event::assertDispatched(ModelGenerationProgressEvent::class, function ($event) {
            return $event->total === 3 && $event->current === 3;
        });
    }

    #[Test]
    public function it_handles_job_failures(): void
    {
        // Arrange
        Queue::fake();

        // Create an invalid table to trigger failure
        $this->schema()->create('invalid_table', function ($table) {
            $table->id();
            $table->invalidColumn('name');
        });

        // Act
        $result = $this->generator->generate([
            'users', 'invalid_table',
        ]);

        // Assert
        Queue::assertPushed(GenerateModelJob::class, function ($job) {
            return $job->tables === ['users'];
        });

        $this->assertCount(1, $result->errors);
        $this->assertStringContainsString('invalid_table', $result->errors[0]);
    }

    #[Test]
    public function it_retries_failed_jobs(): void
    {
        // Arrange
        config([
            'model-generator.queue.retries' => 3,
            'model-generator.queue.retry_delay' => 5,
        ]);

        Queue::fake();

        // Act
        $result = $this->generator->generate(['users']);

        // Assert
        Queue::assertPushed(GenerateModelJob::class, function ($job) {
            return $job->tries === 3 && $job->backoff === 5;
        });
    }

    #[Test]
    public function it_handles_memory_limits(): void
    {
        // Arrange
        config([
            'model-generator.queue.memory_limit' => '64M',
            'model-generator.queue.chunk_size' => 1,
        ]);

        Queue::fake();

        // Act
        $result = $this->generator->generate([
            'users', 'posts', 'comments',
        ]);

        // Assert
        Queue::assertPushed(GenerateModelJob::class, 3); // One job per table
    }

    #[Test]
    public function it_respects_queue_priority(): void
    {
        // Arrange
        config([
            'model-generator.queue.priority' => 5,
        ]);

        Queue::fake();

        // Act
        $result = $this->generator->generate(['users']);

        // Assert
        Queue::assertPushed(GenerateModelJob::class, function ($job) {
            return $job->priority === 5;
        });
    }

    #[Test]
    public function it_handles_concurrent_processing(): void
    {
        // Arrange
        config([
            'model-generator.queue.concurrent_jobs' => 2,
        ]);

        Queue::fake();

        // Act
        $result = $this->generator->generate([
            'users', 'posts', 'comments', 'tags',
        ]);

        // Assert
        Queue::assertPushed(GenerateModelJob::class, function ($job) {
            return count($job->tables) === 2; // 2 tables per job
        });
    }

    #[Test]
    public function it_tracks_job_completion(): void
    {
        // Arrange
        Event::fake();

        // Act
        $result = $this->generator->generate([
            'users', 'posts',
        ]);

        // Assert
        Event::assertDispatched(ModelGenerationProgressEvent::class, function ($event) {
            return $event->isComplete && $event->current === $event->total;
        });
    }

    #[Test]
    public function it_handles_job_timeouts(): void
    {
        // Arrange
        config([
            'model-generator.queue.timeout' => 30,
        ]);

        Queue::fake();

        // Act
        $result = $this->generator->generate(['users']);

        // Assert
        Queue::assertPushed(GenerateModelJob::class, function ($job) {
            return $job->timeout === 30;
        });
    }

    #[Test]
    public function it_supports_custom_queue_connections(): void
    {
        // Arrange
        config([
            'model-generator.queue.connection' => 'custom',
        ]);

        Queue::fake();

        // Act
        $result = $this->generator->generate(['users']);

        // Assert
        Queue::assertPushedOn('custom', GenerateModelJob::class);
    }

    private function createTestSchema(): void
    {
        // Create users table
        $this->schema()->create('users', function ($table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamps();
        });

        // Create posts table
        $this->schema()->create('posts', function ($table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('title');
            $table->text('content');
            $table->timestamps();
        });

        // Create comments table
        $this->schema()->create('comments', function ($table) {
            $table->id();
            $table->foreignId('post_id')->constrained();
            $table->text('content');
            $table->timestamps();
        });

        // Create tags table
        $this->schema()->create('tags', function ($table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });
    }

    private function schema()
    {
        return $this->app['db']->connection()->getSchemaBuilder();
    }
}
