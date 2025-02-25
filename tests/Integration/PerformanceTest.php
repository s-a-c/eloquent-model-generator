<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests\Integration;

use PHPUnit\Framework\Attributes\Test;
use SAC\EloquentModelGenerator\Contracts\ModelGeneratorInterface;
use SAC\EloquentModelGenerator\Tests\TestCase;
use Throwable;

final class PerformanceTest extends TestCase
{
    private string $outputPath;

    private ModelGeneratorInterface $generator;

    protected function setUp(): void
    {
        parent::setUp();

        $this->outputPath = $this->createTempDirectory();
        config(['model-generator.generation.path' => $this->outputPath]);

        $this->generator = $this->app->make(ModelGeneratorInterface::class);

        // Create test database with many tables
        $this->createLargeTestSchema();
    }

    protected function tearDown(): void
    {
        $this->cleanupTempDirectory($this->outputPath);
        parent::tearDown();
    }

    #[Test]
    public function it_processes_large_schemas_within_memory_limit(): void
    {
        // Arrange
        $initialMemory = memory_get_usage(true);
        $memoryLimit = 1024 * 1024 * 1024; // 1GB limit

        // Act
        $result = $this->generator->generate(
            $this->generator->analyzeTables()
        );

        // Assert
        $peakMemory = memory_get_peak_usage(true) - $initialMemory;
        expect($peakMemory)->toBeLessThan($memoryLimit);

        $this->assertGreaterThan(90, $result->getGeneratedCount());
        $this->assertEmpty($result->errors);
    }

    #[Test]
    public function it_processes_tables_within_time_limit(): void
    {
        // Arrange
        $timeLimit = 300; // 5 minutes
        $startTime = microtime(true);

        // Act
        $result = $this->generator->generate(
            $this->generator->analyzeTables()
        );

        // Assert
        $duration = microtime(true) - $startTime;
        expect($duration)->toBeLessThan($timeLimit);

        $tablesPerSecond = $result->getGeneratedCount() / $duration;
        expect($tablesPerSecond)->toBeGreaterThan(0.33); // At least 1 table per 3 seconds
    }

    #[Test]
    public function it_handles_concurrent_requests(): void
    {
        // Arrange
        $concurrentProcesses = 3;
        $processes = [];

        // Act
        for ($i = 0; $i < $concurrentProcesses; $i++) {
            $processes[] = $this->startGenerationProcess();
        }

        // Wait for all processes to complete
        foreach ($processes as $process) {
            $exitCode = pcntl_waitpid($process, $status);
            expect($exitCode)->toBeGreaterThan(0);
            expect($status)->toBe(0);
        }

        // Assert
        $this->assertDirectoryExists($this->outputPath);
        $this->assertGreaterThan(90, count(glob($this->outputPath.'/*.php')));
    }

    #[Test]
    public function it_maintains_consistent_performance(): void
    {
        // Arrange
        $iterations = 3;
        $durations = [];

        // Act
        for ($i = 0; $i < $iterations; $i++) {
            $startTime = microtime(true);

            $result = $this->generator->generate(
                $this->generator->analyzeTables()
            );

            $durations[] = microtime(true) - $startTime;

            // Clean up generated files
            array_map('unlink', glob($this->outputPath.'/*.php'));
        }

        // Assert
        $averageDuration = array_sum($durations) / count($durations);
        $variance = array_reduce(
            $durations,
            fn ($carry, $duration) => $carry + pow($duration - $averageDuration, 2),
            0
        ) / count($durations);

        // Variance should be less than 20% of average duration
        expect($variance)->toBeLessThan($averageDuration * 0.2);
    }

    #[Test]
    public function it_handles_memory_pressure(): void
    {
        // Arrange
        $this->createMemoryPressure();
        $initialMemory = memory_get_usage(true);

        // Act
        $result = $this->generator->generate(
            $this->generator->analyzeTables()
        );

        // Assert
        $peakMemory = memory_get_peak_usage(true) - $initialMemory;
        expect($peakMemory)->toBeLessThan(1024 * 1024 * 1024); // 1GB limit

        $this->assertEmpty($result->errors);
    }

    private function createLargeTestSchema(): void
    {
        // Create 100 tables with relationships
        for ($i = 1; $i <= 100; $i++) {
            $this->schema()->create("table_{$i}", function ($table) use ($i) {
                $table->id();
                $table->string('name');
                $table->text('description')->nullable();
                $table->json('metadata')->nullable();

                // Add foreign keys to create relationships
                if ($i > 1) {
                    $table->foreignId('table_'.($i - 1).'_id')
                        ->nullable()
                        ->constrained('table_'.($i - 1))
                        ->onDelete('set null');
                }

                // Add polymorphic relationship every 10 tables
                if ($i % 10 === 0) {
                    $table->morphs('relatable');
                }

                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    private function createMemoryPressure(): void
    {
        // Allocate and free memory to simulate memory pressure
        $chunks = [];
        for ($i = 0; $i < 10; $i++) {
            $chunks[] = str_repeat('x', 1024 * 1024 * 10); // 10MB chunks
        }
        $chunks = null;
        gc_collect_cycles();
    }

    private function startGenerationProcess(): int
    {
        $pid = pcntl_fork();

        if ($pid === -1) {
            $this->fail('Failed to fork process');
        }

        if ($pid === 0) {
            // Child process
            try {
                $this->generator->generate(
                    $this->generator->analyzeTables()
                );
                exit(0);
            } catch (Throwable $e) {
                exit(1);
            }
        }

        return $pid;
    }

    private function schema()
    {
        return $this->app['db']->connection()->getSchemaBuilder();
    }
}
