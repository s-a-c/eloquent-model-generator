<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests\Unit\Events;

use PHPUnit\Framework\Attributes\Test;
use SAC\EloquentModelGenerator\Domain\ValueObjects\GenerationResult;
use SAC\EloquentModelGenerator\Events\ModelGenerationProgressEvent;
use SAC\EloquentModelGenerator\Tests\TestCase;

final class ModelGenerationProgressEventTest extends TestCase
{
    #[Test]
    public function it_creates_progress_event(): void
    {
        // Arrange
        $result = GenerationResult::success(['app/Models/User.php']);

        // Act
        $event = new ModelGenerationProgressEvent(
            table: 'users',
            current: 1,
            total: 3,
            isComplete: false,
            result: $result,
        );

        // Assert
        expect($event->table)->toBe('users')
            ->and($event->current)->toBe(1)
            ->and($event->total)->toBe(3)
            ->and($event->isComplete)->toBeFalse()
            ->and($event->result)->toBe($result)
            ->and($event->error)->toBeNull();
    }

    #[Test]
    public function it_creates_error_event(): void
    {
        // Act
        $event = new ModelGenerationProgressEvent(
            table: 'users',
            current: 1,
            total: 3,
            isComplete: false,
            error: 'Failed to generate model',
        );

        // Assert
        expect($event->table)->toBe('users')
            ->and($event->error)->toBe('Failed to generate model')
            ->and($event->result)->toBeNull()
            ->and($event->isSuccessful())->toBeFalse();
    }

    #[Test]
    public function it_calculates_progress_percentage(): void
    {
        // Arrange
        $event = new ModelGenerationProgressEvent(
            table: 'users',
            current: 2,
            total: 4,
            isComplete: false,
        );

        // Act
        $progress = $event->getProgress();

        // Assert
        expect($progress)->toBe(50.0);
    }

    #[Test]
    public function it_determines_success_state(): void
    {
        // Arrange
        $successEvent = new ModelGenerationProgressEvent(
            table: 'users',
            current: 1,
            total: 1,
            isComplete: true,
            result: GenerationResult::success(['app/Models/User.php']),
        );

        $errorEvent = new ModelGenerationProgressEvent(
            table: 'posts',
            current: 1,
            total: 1,
            isComplete: false,
            error: 'Failed to generate model',
        );

        // Act & Assert
        expect($successEvent->isSuccessful())->toBeTrue()
            ->and($errorEvent->isSuccessful())->toBeFalse();
    }

    #[Test]
    public function it_gets_remaining_count(): void
    {
        // Arrange
        $event = new ModelGenerationProgressEvent(
            table: 'users',
            current: 3,
            total: 5,
            isComplete: false,
        );

        // Act
        $remaining = $event->getRemainingCount();

        // Assert
        expect($remaining)->toBe(2);
    }

    #[Test]
    public function it_gets_event_name(): void
    {
        // Arrange
        $event = new ModelGenerationProgressEvent(
            table: 'users',
            current: 1,
            total: 1,
            isComplete: true,
        );

        // Act
        $name = $event->getName();

        // Assert
        expect($name)->toBe('model.generation.progress');
    }

    #[Test]
    public function it_generates_description_for_complete_state(): void
    {
        // Arrange
        $event = new ModelGenerationProgressEvent(
            table: 'users',
            current: 1,
            total: 1,
            isComplete: true,
        );

        // Act
        $description = $event->getDescription();

        // Assert
        expect($description)->toBe("Completed generating model for table 'users'");
    }

    #[Test]
    public function it_generates_description_for_error_state(): void
    {
        // Arrange
        $event = new ModelGenerationProgressEvent(
            table: 'users',
            current: 1,
            total: 3,
            isComplete: false,
            error: 'Invalid schema',
        );

        // Act
        $description = $event->getDescription();

        // Assert
        expect($description)->toBe("Failed to generate model for table 'users': Invalid schema");
    }

    #[Test]
    public function it_generates_description_for_in_progress_state(): void
    {
        // Arrange
        $event = new ModelGenerationProgressEvent(
            table: 'users',
            current: 2,
            total: 5,
            isComplete: false,
        );

        // Act
        $description = $event->getDescription();

        // Assert
        expect($description)->toBe("Generating model for table 'users' (2/5)");
    }

    #[Test]
    public function it_generates_metadata(): void
    {
        // Arrange
        $result = GenerationResult::success(['app/Models/User.php']);
        $event = new ModelGenerationProgressEvent(
            table: 'users',
            current: 2,
            total: 5,
            isComplete: false,
            result: $result,
        );

        // Act
        $metadata = $event->getMetadata();

        // Assert
        expect($metadata)
            ->toHaveKey('table')
            ->toHaveKey('current')
            ->toHaveKey('total')
            ->toHaveKey('progress')
            ->toHaveKey('remaining')
            ->toHaveKey('is_complete')
            ->toHaveKey('is_successful')
            ->toHaveKey('error')
            ->toHaveKey('result')
            ->and($metadata['table'])->toBe('users')
            ->and($metadata['current'])->toBe(2)
            ->and($metadata['total'])->toBe(5)
            ->and($metadata['progress'])->toBe(40.0)
            ->and($metadata['remaining'])->toBe(3)
            ->and($metadata['is_complete'])->toBeFalse()
            ->and($metadata['is_successful'])->toBeTrue()
            ->and($metadata['error'])->toBeNull()
            ->and($metadata['result'])->toBe($result->toArray());
    }

    #[Test]
    public function it_handles_null_result(): void
    {
        // Arrange
        $event = new ModelGenerationProgressEvent(
            table: 'users',
            current: 1,
            total: 1,
            isComplete: true,
        );

        // Act
        $result = $event->getResult();

        // Assert
        expect($result)->toBeNull();
    }

    #[Test]
    public function it_handles_null_error(): void
    {
        // Arrange
        $event = new ModelGenerationProgressEvent(
            table: 'users',
            current: 1,
            total: 1,
            isComplete: true,
        );

        // Act
        $error = $event->getError();

        // Assert
        expect($error)->toBeNull();
    }
}
