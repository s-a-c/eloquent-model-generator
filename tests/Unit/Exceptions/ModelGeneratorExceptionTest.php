<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests\Unit\Exceptions;

use PHPUnit\Framework\Attributes\Test;
use RuntimeException;
use SAC\EloquentModelGenerator\Exceptions\InvalidConfigurationException;
use SAC\EloquentModelGenerator\Exceptions\ModelGenerationException;
use SAC\EloquentModelGenerator\Exceptions\ModelGeneratorException;
use SAC\EloquentModelGenerator\Exceptions\SchemaAnalysisException;
use SAC\EloquentModelGenerator\Tests\TestCase;

final class ModelGeneratorExceptionTest extends TestCase
{
    #[Test]
    public function it_creates_base_exception(): void
    {
        // Act
        $exception = new ModelGeneratorException(
            message: 'Test error',
            code: 100,
            previous: new RuntimeException('Previous error'),
            context: ['key' => 'value'],
        );

        // Assert
        expect($exception->getMessage())->toBe('Test error')
            ->and($exception->getCode())->toBe(100)
            ->and($exception->getPrevious())->toBeInstanceOf(RuntimeException::class)
            ->and($exception->getContext())->toBe(['key' => 'value']);
    }

    #[Test]
    public function it_creates_exception_with_context(): void
    {
        // Act
        $exception = ModelGeneratorException::withContext(
            'Test error',
            ['key' => 'value'],
        );

        // Assert
        expect($exception->getMessage())->toBe('Test error')
            ->and($exception->getContext())->toBe(['key' => 'value']);
    }

    #[Test]
    public function it_creates_model_generation_exception(): void
    {
        // Act
        $exception = ModelGenerationException::forFailedGeneration(
            'users',
            'Invalid schema',
            new RuntimeException('Database error'),
        );

        // Assert
        expect($exception->getMessage())
            ->toBe("Failed to generate model for table 'users': Invalid schema")
            ->and($exception->getPrevious())->toBeInstanceOf(RuntimeException::class)
            ->and($exception->getContext())->toBe(['table' => 'users']);
    }

    #[Test]
    public function it_creates_schema_analysis_exception(): void
    {
        // Act
        $exception = SchemaAnalysisException::forFailedAnalysis(
            'users',
            'Invalid column type',
            new RuntimeException('Type error'),
        );

        // Assert
        expect($exception->getMessage())
            ->toBe("Failed to analyze table 'users': Invalid column type")
            ->and($exception->getPrevious())->toBeInstanceOf(RuntimeException::class)
            ->and($exception->getContext())->toBe(['table' => 'users']);
    }

    #[Test]
    public function it_creates_invalid_config_exception_for_missing_option(): void
    {
        // Act
        $exception = InvalidConfigurationException::forMissingOption('namespace');

        // Assert
        expect($exception->getMessage())
            ->toBe('Missing required configuration option: namespace')
            ->and($exception->getContext())->toBe(['option' => 'namespace']);
    }

    #[Test]
    public function it_creates_invalid_config_exception_for_invalid_config(): void
    {
        // Act
        $exception = InvalidConfigurationException::forInvalidConfig(
            ['database_driver' => 'mysql'],
            'Only SQLite is supported',
        );

        // Assert
        expect($exception->getMessage())
            ->toBe('Invalid configuration: Only SQLite is supported')
            ->and($exception->getContext())->toBe(['database_driver' => 'mysql']);
    }

    #[Test]
    public function it_handles_empty_context(): void
    {
        // Act
        $exception = new ModelGeneratorException('Test error');

        // Assert
        expect($exception->getContext())->toBeArray()
            ->and($exception->getContext())->toBeEmpty();
    }

    #[Test]
    public function it_handles_null_previous_exception(): void
    {
        // Act
        $exception = new ModelGeneratorException('Test error');

        // Assert
        expect($exception->getPrevious())->toBeNull();
    }

    #[Test]
    public function it_preserves_exception_hierarchy(): void
    {
        // Assert
        expect(ModelGenerationException::class)
            ->toExtend(ModelGeneratorException::class)
            ->and(SchemaAnalysisException::class)
            ->toExtend(ModelGeneratorException::class)
            ->and(InvalidConfigurationException::class)
            ->toExtend(ModelGeneratorException::class);
    }

    #[Test]
    public function it_provides_stack_trace(): void
    {
        // Arrange
        $exception = new ModelGeneratorException('Test error');

        // Act
        $trace = $exception->getTraceAsString();

        // Assert
        expect($trace)->not->toBeEmpty()
            ->and($trace)->toContain(__CLASS__);
    }

    #[Test]
    public function it_serializes_to_string(): void
    {
        // Arrange
        $exception = new ModelGeneratorException(
            message: 'Test error',
            code: 100,
            context: ['key' => 'value'],
        );

        // Act
        $string = (string) $exception;

        // Assert
        expect($string)->toContain('Test error')
            ->and($string)->toContain('100')
            ->and($string)->toContain(__CLASS__);
    }
}
