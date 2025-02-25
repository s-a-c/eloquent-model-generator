<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests\Integration;

use Error;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use PHPUnit\Framework\Attributes\Test;
use SAC\EloquentModelGenerator\Contracts\ModelGeneratorInterface;
use SAC\EloquentModelGenerator\Exceptions\ModelGenerationException;
use SAC\EloquentModelGenerator\Exceptions\SchemaAnalysisException;
use SAC\EloquentModelGenerator\Tests\TestCase;
use Throwable;

final class ErrorHandlingTest extends TestCase
{
    private string $outputPath;

    private ModelGeneratorInterface $generator;

    protected function setUp(): void
    {
        parent::setUp();

        $this->outputPath = $this->createTempDirectory();
        config(['model-generator.generation.path' => $this->outputPath]);

        $this->generator = $this->app->make(ModelGeneratorInterface::class);
    }

    protected function tearDown(): void
    {
        $this->cleanupTempDirectory($this->outputPath);
        parent::tearDown();
    }

    #[Test]
    public function it_continues_on_error_when_configured(): void
    {
        // Arrange
        config(['model-generator.error_handling.continue_on_error' => true]);

        $this->createTestSchema();
        chmod($this->outputPath.'/User.php', 0444); // Make file read-only

        // Act
        $result = $this->generator->generate(['users', 'posts']);

        // Assert
        expect($result->errors)->toHaveCount(1)
            ->and($result->generatedFiles)->toHaveCount(1)
            ->and($result->getMetadata('processed_tables'))->toBe(2);
    }

    #[Test]
    public function it_stops_on_error_by_default(): void
    {
        // Arrange
        $this->createTestSchema();
        chmod($this->outputPath, 0444); // Make directory read-only

        // Assert
        $this->expectException(ModelGenerationException::class);

        // Act
        $this->generator->generate(['users', 'posts']);
    }

    #[Test]
    public function it_logs_errors_when_configured(): void
    {
        // Arrange
        config([
            'model-generator.error_handling.log_errors' => true,
            'model-generator.error_handling.continue_on_error' => true,
        ]);

        Log::shouldReceive('error')
            ->once()
            ->withArgs(function ($message, $context) {
                return str_contains($message, 'Failed to generate model')
                    && isset($context['table'])
                    && isset($context['exception']);
            });

        // Create invalid schema
        $this->schema()->create('invalid_table', function ($table) {
            $table->id();
            $table->invalidColumn('name');
        });

        // Act
        $this->generator->generate(['invalid_table']);
    }

    #[Test]
    public function it_handles_database_connection_errors(): void
    {
        // Arrange
        config(['database.connections.sqlite.database' => '/nonexistent/database.sqlite']);

        // Assert
        $this->expectException(SchemaAnalysisException::class);
        $this->expectExceptionMessage('Failed to connect to database');

        // Act
        $this->generator->analyzeTables();
    }

    #[Test]
    public function it_handles_invalid_table_schemas(): void
    {
        // Arrange
        $this->schema()->create('invalid_table', function ($table) {
            $table->id();
            // Create circular reference
            $table->foreignId('invalid_table_id')->constrained('invalid_table');
        });

        // Act
        $result = $this->generator->analyzeTables(['invalid_table']);

        // Assert
        expect($result)->toBeArray()
            ->and($result)->toBeEmpty();
    }

    #[Test]
    public function it_handles_file_system_errors(): void
    {
        // Arrange
        $this->createTestSchema();

        // Create a file where a directory should be
        File::put($this->outputPath.'/Models', '');

        // Assert
        $this->expectException(ModelGenerationException::class);
        $this->expectExceptionMessage('Failed to create directory');

        // Act
        $this->generator->generate(['users']);
    }

    #[Test]
    public function it_handles_memory_exhaustion(): void
    {
        // Arrange
        ini_set('memory_limit', '1M'); // Set very low memory limit

        // Assert
        try {
            // Act
            $this->generator->generate(['users']);
            $this->fail('Expected out of memory error');
        } catch (Throwable $e) {
            $this->assertInstanceOf(Error::class, $e);
            $this->assertStringContainsString('memory', $e->getMessage());
        } finally {
            ini_restore('memory_limit');
        }
    }

    #[Test]
    public function it_handles_concurrent_access(): void
    {
        // Arrange
        $this->createTestSchema();
        $processes = [];

        // Act
        for ($i = 0; $i < 3; $i++) {
            $pid = pcntl_fork();

            if ($pid === -1) {
                $this->fail('Failed to fork process');
            }

            if ($pid === 0) {
                // Child process
                try {
                    $this->generator->generate(['users']);
                    exit(0);
                } catch (Throwable $e) {
                    exit(1);
                }
            }

            $processes[] = $pid;
        }

        // Wait for all processes
        foreach ($processes as $pid) {
            pcntl_waitpid($pid, $status);
            $this->assertEquals(0, $status);
        }

        // Assert
        $this->assertFileExists($this->outputPath.'/User.php');
        $this->assertEquals(1, count(glob($this->outputPath.'/*.php')));
    }

    #[Test]
    public function it_handles_invalid_relationship_definitions(): void
    {
        // Arrange
        $this->schema()->create('circular_a', function ($table) {
            $table->id();
            $table->foreignId('circular_b_id')->constrained('circular_b');
        });

        $this->schema()->create('circular_b', function ($table) {
            $table->id();
            $table->foreignId('circular_a_id')->constrained('circular_a');
        });

        // Act
        $result = $this->generator->generate(
            ['circular_a', 'circular_b'],
            ['continue_on_error' => true]
        );

        // Assert
        expect($result->errors)
            ->toHaveCount(2)
            ->and($result->errors[0])->toContain('Circular dependency');
    }

    #[Test]
    public function it_recovers_from_partial_failures(): void
    {
        // Arrange
        $this->createTestSchema();
        File::put($this->outputPath.'/Post.php', 'invalid content');

        // Act
        $result = $this->generator->generate(
            ['users', 'posts'],
            ['force' => true]
        );

        // Assert
        expect($result->generatedFiles)->toHaveCount(2)
            ->and($result->errors)->toBeEmpty();

        $this->assertStringContainsString(
            'class Post extends Model',
            File::get($this->outputPath.'/Post.php')
        );
    }

    private function createTestSchema(): void
    {
        $this->schema()->create('users', function ($table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        $this->schema()->create('posts', function ($table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('title');
            $table->timestamps();
        });
    }

    private function schema()
    {
        return $this->app['db']->connection()->getSchemaBuilder();
    }
}
