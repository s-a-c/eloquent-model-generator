<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests\Unit\Exceptions;

use PHPUnit\Framework\Attributes\Test;
use RuntimeException;
use SAC\EloquentModelGenerator\Exceptions\InvalidConfigurationException;
use SAC\EloquentModelGenerator\Exceptions\ModelGenerationException;
use SAC\EloquentModelGenerator\Exceptions\SchemaAnalysisException;
use SAC\EloquentModelGenerator\Tests\TestCase;

final class ExceptionsTest extends TestCase
{
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
    public function it_creates_invalid_config_exception_for_invalid_path(): void
    {
        // Act
        $exception = InvalidConfigurationException::forInvalidPath(
            '/invalid/path',
            'Directory does not exist',
        );

        // Assert
        expect($exception->getMessage())
            ->toBe('Invalid path configuration: Directory does not exist')
            ->and($exception->getContext())->toBe(['path' => '/invalid/path']);
    }

    #[Test]
    public function it_creates_invalid_config_exception_for_invalid_namespace(): void
    {
        // Act
        $exception = InvalidConfigurationException::forInvalidNamespace(
            'Invalid\\Namespace\\Format',
        );

        // Assert
        expect($exception->getMessage())
            ->toBe('Invalid namespace format: Invalid\\Namespace\\Format')
            ->and($exception->getContext())->toBe(['namespace' => 'Invalid\\Namespace\\Format']);
    }

    #[Test]
    public function it_creates_invalid_config_exception_for_invalid_value(): void
    {
        // Act
        $exception = InvalidConfigurationException::forInvalidValue(
            'debug',
            'true',
            'boolean',
        );

        // Assert
        expect($exception->getMessage())
            ->toBe('Invalid value for option debug: expected boolean, got true')
            ->and($exception->getContext())->toBe([
                'option' => 'debug',
                'value' => 'true',
                'expected_type' => 'boolean',
            ]);
    }

    #[Test]
    public function it_creates_invalid_config_exception_for_dependency(): void
    {
        // Act
        $exception = InvalidConfigurationException::forMissingDependency(
            'docs_path',
            'generate_diagrams',
        );

        // Assert
        expect($exception->getMessage())
            ->toBe('Option docs_path is required when generate_diagrams is enabled')
            ->and($exception->getContext())->toBe([
                'option' => 'docs_path',
                'dependency' => 'generate_diagrams',
            ]);
    }

    #[Test]
    public function it_creates_schema_analysis_exception_for_invalid_table(): void
    {
        // Act
        $exception = SchemaAnalysisException::forInvalidTable('non_existent_table');

        // Assert
        expect($exception->getMessage())
            ->toBe("Table 'non_existent_table' does not exist")
            ->and($exception->getContext())->toBe(['table' => 'non_existent_table']);
    }

    #[Test]
    public function it_creates_schema_analysis_exception_for_invalid_column(): void
    {
        // Act
        $exception = SchemaAnalysisException::forInvalidColumn(
            'users',
            'invalid_column',
            'Unsupported type',
        );

        // Assert
        expect($exception->getMessage())
            ->toBe("Invalid column 'invalid_column' in table 'users': Unsupported type")
            ->and($exception->getContext())->toBe([
                'table' => 'users',
                'column' => 'invalid_column',
            ]);
    }

    #[Test]
    public function it_creates_schema_analysis_exception_for_circular_dependency(): void
    {
        // Act
        $exception = SchemaAnalysisException::forCircularDependency(
            'users',
            'posts',
        );

        // Assert
        expect($exception->getMessage())
            ->toBe("Circular dependency detected between tables 'users' and 'posts'")
            ->and($exception->getContext())->toBe([
                'table1' => 'users',
                'table2' => 'posts',
            ]);
    }

    #[Test]
    public function it_creates_model_generation_exception_for_invalid_template(): void
    {
        // Act
        $exception = ModelGenerationException::forInvalidTemplate(
            'custom_template.stub',
            'Template file not found',
        );

        // Assert
        expect($exception->getMessage())
            ->toBe("Invalid template 'custom_template.stub': Template file not found")
            ->and($exception->getContext())->toBe(['template' => 'custom_template.stub']);
    }

    #[Test]
    public function it_creates_model_generation_exception_for_file_system_error(): void
    {
        // Act
        $exception = ModelGenerationException::forFileSystemError(
            'app/Models/User.php',
            'Permission denied',
        );

        // Assert
        expect($exception->getMessage())
            ->toBe("File system error for 'app/Models/User.php': Permission denied")
            ->and($exception->getContext())->toBe(['file' => 'app/Models/User.php']);
    }

    #[Test]
    public function it_preserves_exception_hierarchy(): void
    {
        // Assert
        expect(ModelGenerationException::class)
            ->toExtend(RuntimeException::class)
            ->and(SchemaAnalysisException::class)
            ->toExtend(ModelGenerationException::class)
            ->and(InvalidConfigurationException::class)
            ->toExtend(ModelGenerationException::class);
    }
}
