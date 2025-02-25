<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests\Unit\Services;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\MockObject\MockObject;
use RuntimeException;
use SAC\EloquentModelGenerator\Config\ModelGeneratorConfig;
use SAC\EloquentModelGenerator\Domain\ValueObjects\GenerationResult;
use SAC\EloquentModelGenerator\Domain\ValueObjects\TableDefinition;
use SAC\EloquentModelGenerator\Exceptions\InvalidConfigurationException;
use SAC\EloquentModelGenerator\Services\Contracts\CodeGeneratorInterface;
use SAC\EloquentModelGenerator\Services\Contracts\RelationshipResolverInterface;
use SAC\EloquentModelGenerator\Services\Contracts\SchemaAnalyzerInterface;
use SAC\EloquentModelGenerator\Services\ModelGenerator;
use SAC\EloquentModelGenerator\Tests\TestCase;

final class ModelGeneratorTest extends TestCase
{
    private ModelGenerator $generator;

    private MockObject&SchemaAnalyzerInterface $analyzer;

    private MockObject&RelationshipResolverInterface $resolver;

    private MockObject&CodeGeneratorInterface $codeGenerator;

    private MockObject&ModelGeneratorConfig $config;

    protected function setUp(): void
    {
        parent::setUp();

        $this->analyzer = $this->createMock(SchemaAnalyzerInterface::class);
        $this->resolver = $this->createMock(RelationshipResolverInterface::class);
        $this->codeGenerator = $this->createMock(CodeGeneratorInterface::class);
        $this->config = $this->createMock(ModelGeneratorConfig::class);

        $this->generator = new ModelGenerator(
            $this->config,
            $this->analyzer,
            $this->resolver,
            $this->codeGenerator,
        );
    }

    #[Test]
    public function it_generates_models_for_given_tables(): void
    {
        // Arrange
        $tables = ['users', 'posts'];
        $tableDefinition = new TableDefinition(
            name: 'users',
            columns: [],
            indices: [],
            relationships: [],
        );

        $this->config->method('get')
            ->willReturn('App\\Models');

        $this->config->method('has')
            ->willReturn(true);

        $this->config->method('databaseDriver')
            ->willReturn('sqlite');

        $this->analyzer->method('analyzeTable')
            ->willReturn($tableDefinition);

        $this->resolver->method('resolveRelationships')
            ->willReturn([]);

        $this->codeGenerator->method('generateModel')
            ->willReturn(new GenerationResult(['app/Models/User.php']));

        $this->codeGenerator->method('generateDocumentation')
            ->willReturn(new GenerationResult(['docs/models/User.md']));

        // Act
        $result = $this->generator->generate($tables);

        // Assert
        $this->assertInstanceOf(GenerationResult::class, $result);
        $this->assertCount(4, $result->generatedFiles);
        $this->assertEmpty($result->errors);
    }

    #[Test]
    public function it_validates_configuration_before_generation(): void
    {
        // Arrange
        $tables = ['users'];
        $options = [];

        $this->config->method('has')
            ->willReturn(false);

        // Assert
        $this->expectException(InvalidConfigurationException::class);
        $this->expectExceptionMessage('Missing required option: namespace');

        // Act
        $this->generator->generate($tables, $options);
    }

    #[Test]
    public function it_handles_errors_during_generation(): void
    {
        // Arrange
        $tables = ['users'];

        $this->config->method('get')
            ->willReturn('App\\Models');

        $this->config->method('has')
            ->willReturn(true);

        $this->config->method('databaseDriver')
            ->willReturn('sqlite');

        $this->analyzer->method('analyzeTable')
            ->willThrowException(new RuntimeException('Database error'));

        // Act
        $result = $this->generator->generate($tables, ['continue_on_error' => true]);

        // Assert
        $this->assertInstanceOf(GenerationResult::class, $result);
        $this->assertNotEmpty($result->errors);
        $this->assertStringContainsString('Database error', $result->errors[0]);
    }

    #[Test]
    public function it_analyzes_tables_without_generating_models(): void
    {
        // Arrange
        $tableDefinition = new TableDefinition(
            name: 'users',
            columns: [],
            indices: [],
            relationships: [],
        );

        $this->analyzer->method('getTables')
            ->willReturn(['users']);

        $this->analyzer->method('analyzeTable')
            ->willReturn($tableDefinition);

        $this->resolver->method('resolveRelationships')
            ->willReturn([]);

        // Act
        $result = $this->generator->analyzeTables();

        // Assert
        $this->assertIsArray($result);
        $this->assertCount(1, $result);
        $this->assertInstanceOf(TableDefinition::class, $result[0]);
    }

    #[Test]
    public function it_validates_database_driver(): void
    {
        // Arrange
        $this->config->method('has')
            ->willReturn(true);

        $this->config->method('databaseDriver')
            ->willReturn('mysql');

        // Assert
        $this->expectException(InvalidConfigurationException::class);
        $this->expectExceptionMessage('Only SQLite database driver is supported');

        // Act
        $this->generator->validateConfiguration([]);
    }

    #[Test]
    public function it_validates_path_permissions(): void
    {
        // Arrange
        $this->config->method('has')
            ->willReturn(true);

        $this->config->method('databaseDriver')
            ->willReturn('sqlite');

        $this->config->method('get')
            ->willReturn('/path/that/does/not/exist');

        // Assert
        $this->expectException(InvalidConfigurationException::class);
        $this->expectExceptionMessage('Unable to create directory');

        // Act
        $this->generator->validateConfiguration([]);
    }
}
