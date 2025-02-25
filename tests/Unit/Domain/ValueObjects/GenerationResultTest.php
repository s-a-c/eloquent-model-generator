<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests\Unit\Domain\ValueObjects;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\Test;
use SAC\EloquentModelGenerator\Domain\ValueObjects\GenerationResult;
use SAC\EloquentModelGenerator\Tests\TestCase;

final class GenerationResultTest extends TestCase
{
    #[Test]
    public function it_creates_successful_result(): void
    {
        // Act
        $result = GenerationResult::success(
            ['app/Models/User.php'],
            ['duration' => 1.5],
        );

        // Assert
        expect($result->isSuccessful())->toBeTrue()
            ->and($result->generatedFiles)->toBe(['app/Models/User.php'])
            ->and($result->errors)->toBeEmpty()
            ->and($result->metadata)->toBe(['duration' => 1.5]);
    }

    #[Test]
    public function it_creates_failed_result(): void
    {
        // Act
        $result = GenerationResult::failure(
            ['Failed to generate model'],
            ['duration' => 1.5],
        );

        // Assert
        expect($result->isSuccessful())->toBeFalse()
            ->and($result->generatedFiles)->toBeEmpty()
            ->and($result->errors)->toBe(['Failed to generate model'])
            ->and($result->metadata)->toBe(['duration' => 1.5]);
    }

    #[Test]
    public function it_validates_generated_files(): void
    {
        // Assert
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Generated files must be strings');

        // Act
        new GenerationResult(['valid.php', 123]);
    }

    #[Test]
    public function it_validates_errors(): void
    {
        // Assert
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Errors must be strings');

        // Act
        new GenerationResult(
            [],
            ['valid error', 123],
        );
    }

    #[Test]
    public function it_gets_generated_count(): void
    {
        // Arrange
        $result = new GenerationResult([
            'app/Models/User.php',
            'app/Models/Post.php',
        ]);

        // Act & Assert
        expect($result->getGeneratedCount())->toBe(2);
    }

    #[Test]
    public function it_gets_error_count(): void
    {
        // Arrange
        $result = new GenerationResult(
            [],
            ['Error 1', 'Error 2', 'Error 3'],
        );

        // Act & Assert
        expect($result->getErrorCount())->toBe(3);
    }

    #[Test]
    public function it_gets_metadata_value(): void
    {
        // Arrange
        $result = new GenerationResult(
            [],
            [],
            ['key' => 'value'],
        );

        // Act & Assert
        expect($result->getMetadata('key'))->toBe('value')
            ->and($result->getMetadata('non_existent', 'default'))->toBe('default');
    }

    #[Test]
    public function it_converts_to_array(): void
    {
        // Arrange
        $result = new GenerationResult(
            ['app/Models/User.php'],
            ['Error occurred'],
            ['duration' => 1.5],
        );

        // Act
        $array = $result->toArray();

        // Assert
        expect($array)
            ->toHaveKey('generated_files')
            ->toHaveKey('errors')
            ->toHaveKey('metadata')
            ->toHaveKey('is_successful')
            ->toHaveKey('generated_count')
            ->toHaveKey('error_count')
            ->and($array['generated_files'])->toBe(['app/Models/User.php'])
            ->and($array['errors'])->toBe(['Error occurred'])
            ->and($array['metadata'])->toBe(['duration' => 1.5])
            ->and($array['is_successful'])->toBeFalse()
            ->and($array['generated_count'])->toBe(1)
            ->and($array['error_count'])->toBe(1);
    }

    #[Test]
    public function it_handles_empty_metadata(): void
    {
        // Arrange
        $result = new GenerationResult(['app/Models/User.php']);

        // Act & Assert
        expect($result->metadata)->toBeArray()
            ->and($result->metadata)->toBeEmpty()
            ->and($result->getMetadata('any', 'default'))->toBe('default');
    }

    #[Test]
    public function it_handles_empty_errors(): void
    {
        // Arrange
        $result = new GenerationResult(['app/Models/User.php']);

        // Act & Assert
        expect($result->errors)->toBeArray()
            ->and($result->errors)->toBeEmpty()
            ->and($result->isSuccessful())->toBeTrue()
            ->and($result->getErrorCount())->toBe(0);
    }

    #[Test]
    public function it_handles_empty_generated_files(): void
    {
        // Arrange
        $result = new GenerationResult(
            [],
            ['No files generated'],
        );

        // Act & Assert
        expect($result->generatedFiles)->toBeArray()
            ->and($result->generatedFiles)->toBeEmpty()
            ->and($result->isSuccessful())->toBeFalse()
            ->and($result->getGeneratedCount())->toBe(0);
    }
}
