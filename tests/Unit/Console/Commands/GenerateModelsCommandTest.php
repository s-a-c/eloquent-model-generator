<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests\Unit\Console\Commands;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\MockObject\MockObject;
use SAC\EloquentModelGenerator\Console\Commands\GenerateModelsCommand;
use SAC\EloquentModelGenerator\Contracts\ModelGeneratorInterface;
use SAC\EloquentModelGenerator\Domain\ValueObjects\GenerationResult;
use SAC\EloquentModelGenerator\Exceptions\InvalidConfigurationException;
use SAC\EloquentModelGenerator\Exceptions\ModelGenerationException;
use SAC\EloquentModelGenerator\Tests\TestCase;

final class GenerateModelsCommandTest extends TestCase
{
    private GenerateModelsCommand $command;

    private MockObject&ModelGeneratorInterface $generator;

    protected function setUp(): void
    {
        parent::setUp();

        $this->generator = $this->createMock(ModelGeneratorInterface::class);
        $this->command = new GenerateModelsCommand($this->generator);
        $this->app['artisan']->add($this->command);
    }

    #[Test]
    public function it_generates_models_for_all_tables(): void
    {
        // Arrange
        $this->generator->expects($this->once())
            ->method('analyzeTables')
            ->willReturn(['users', 'posts']);

        $this->generator->expects($this->once())
            ->method('generate')
            ->with(['users', 'posts'], $this->anything())
            ->willReturn(new GenerationResult(
                ['app/Models/User.php', 'app/Models/Post.php']
            ));

        // Act
        $result = $this->artisan('model:generate');

        // Assert
        $result->assertSuccessful();
        $result->expectsOutput('Found 2 tables to process.');
        $result->expectsOutput('Successfully generated the following files:');
        $result->expectsOutput('- app/Models/User.php');
        $result->expectsOutput('- app/Models/Post.php');
    }

    #[Test]
    public function it_generates_model_for_specific_table(): void
    {
        // Arrange
        $this->generator->expects($this->once())
            ->method('analyzeTables')
            ->willReturn(['users']);

        $this->generator->expects($this->once())
            ->method('generate')
            ->with(['users'], $this->anything())
            ->willReturn(new GenerationResult(['app/Models/User.php']));

        // Act
        $result = $this->artisan('model:generate', [
            '--table' => 'users',
        ]);

        // Assert
        $result->assertSuccessful();
        $result->expectsOutput('Found 1 tables to process.');
        $result->expectsOutput('Successfully generated the following files:');
        $result->expectsOutput('- app/Models/User.php');
    }

    #[Test]
    public function it_handles_no_tables_found(): void
    {
        // Arrange
        $this->generator->expects($this->once())
            ->method('analyzeTables')
            ->willReturn([]);

        // Act
        $result = $this->artisan('model:generate');

        // Assert
        $result->assertFailed();
        $result->expectsOutput('No tables found to process.');
    }

    #[Test]
    public function it_handles_invalid_configuration(): void
    {
        // Arrange
        $this->generator->expects($this->once())
            ->method('analyzeTables')
            ->willThrowException(new InvalidConfigurationException('Invalid configuration'));

        // Act
        $result = $this->artisan('model:generate');

        // Assert
        $result->assertFailed();
        $result->expectsOutput('Configuration Error: Invalid configuration');
    }

    #[Test]
    public function it_handles_generation_errors(): void
    {
        // Arrange
        $this->generator->expects($this->once())
            ->method('analyzeTables')
            ->willReturn(['users']);

        $this->generator->expects($this->once())
            ->method('generate')
            ->willThrowException(new ModelGenerationException('Generation failed'));

        // Act
        $result = $this->artisan('model:generate');

        // Assert
        $result->assertFailed();
        $result->expectsOutput('Generation Error: Generation failed');
    }

    #[Test]
    public function it_analyzes_schema_without_generating(): void
    {
        // Arrange
        $this->generator->expects($this->once())
            ->method('analyzeTables')
            ->willReturn(['users', 'posts']);

        $this->generator->expects($this->never())
            ->method('generate');

        // Act
        $result = $this->artisan('model:generate', [
            '--analyze' => true,
        ]);

        // Assert
        $result->assertSuccessful();
        $result->expectsOutput('Analyzing database schema...');
    }

    #[Test]
    public function it_generates_documentation(): void
    {
        // Arrange
        $this->generator->expects($this->once())
            ->method('analyzeTables')
            ->willReturn(['users']);

        $this->generator->expects($this->once())
            ->method('generate')
            ->with(['users'], $this->callback(function ($options) {
                return $options['with_docs'] === true;
            }))
            ->willReturn(new GenerationResult(
                ['app/Models/User.php', 'docs/models/User.md']
            ));

        // Act
        $result = $this->artisan('model:generate', [
            '--with-docs' => true,
        ]);

        // Assert
        $result->assertSuccessful();
        $result->expectsOutput('Successfully generated the following files:');
        $result->expectsOutput('- app/Models/User.php');
        $result->expectsOutput('- docs/models/User.md');
    }

    #[Test]
    public function it_handles_custom_namespace(): void
    {
        // Arrange
        $this->generator->expects($this->once())
            ->method('analyzeTables')
            ->willReturn(['users']);

        $this->generator->expects($this->once())
            ->method('generate')
            ->with(['users'], $this->callback(function ($options) {
                return $options['namespace'] === 'App\\Domain\\Models';
            }))
            ->willReturn(new GenerationResult(['app/Domain/Models/User.php']));

        // Act
        $result = $this->artisan('model:generate', [
            '--namespace' => 'App\\Domain\\Models',
        ]);

        // Assert
        $result->assertSuccessful();
        $result->expectsOutput('- app/Domain/Models/User.php');
    }

    #[Test]
    public function it_handles_custom_path(): void
    {
        // Arrange
        $this->generator->expects($this->once())
            ->method('analyzeTables')
            ->willReturn(['users']);

        $this->generator->expects($this->once())
            ->method('generate')
            ->with(['users'], $this->callback(function ($options) {
                return $options['path'] === 'src/Models';
            }))
            ->willReturn(new GenerationResult(['src/Models/User.php']));

        // Act
        $result = $this->artisan('model:generate', [
            '--path' => 'src/Models',
        ]);

        // Assert
        $result->assertSuccessful();
        $result->expectsOutput('- src/Models/User.php');
    }

    #[Test]
    public function it_excludes_specified_tables(): void
    {
        // Arrange
        $this->generator->expects($this->once())
            ->method('analyzeTables')
            ->willReturn(['posts', 'comments']);

        $this->generator->expects($this->once())
            ->method('generate')
            ->with(['posts', 'comments'], $this->anything())
            ->willReturn(new GenerationResult(
                ['app/Models/Post.php', 'app/Models/Comment.php']
            ));

        // Act
        $result = $this->artisan('model:generate', [
            '--exclude' => 'users,tags',
        ]);

        // Assert
        $result->assertSuccessful();
        $result->expectsOutput('Found 2 tables to process.');
        $result->expectsOutput('- app/Models/Post.php');
        $result->expectsOutput('- app/Models/Comment.php');
    }
}
