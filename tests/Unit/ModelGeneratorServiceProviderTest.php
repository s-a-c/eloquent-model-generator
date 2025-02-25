<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests\Unit;

use Illuminate\Support\Facades\File;
use PHPUnit\Framework\Attributes\Test;
use ReflectionProperty;
use SAC\EloquentModelGenerator\Config\ModelGeneratorConfig;
use SAC\EloquentModelGenerator\Console\Commands\GenerateModelsCommand;
use SAC\EloquentModelGenerator\Contracts\ModelGeneratorInterface;
use SAC\EloquentModelGenerator\ModelGeneratorServiceProvider;
use SAC\EloquentModelGenerator\Services\CodeGenerator;
use SAC\EloquentModelGenerator\Services\Contracts\CodeGeneratorInterface;
use SAC\EloquentModelGenerator\Services\Contracts\RelationshipResolverInterface;
use SAC\EloquentModelGenerator\Services\Contracts\SchemaAnalyzerInterface;
use SAC\EloquentModelGenerator\Services\RelationshipResolver;
use SAC\EloquentModelGenerator\Services\SQLiteSchemaAnalyzer;
use SAC\EloquentModelGenerator\Tests\TestCase;

final class ModelGeneratorServiceProviderTest extends TestCase
{
    private string $configPath;

    private string $stubsPath;

    protected function setUp(): void
    {
        parent::setUp();

        $this->configPath = config_path('model-generator.php');
        $this->stubsPath = base_path('stubs/vendor/model-generator');

        // Clean up any existing files
        if (File::exists($this->configPath)) {
            File::delete($this->configPath);
        }
        if (File::exists($this->stubsPath)) {
            File::deleteDirectory($this->stubsPath);
        }
    }

    #[Test]
    public function it_registers_config(): void
    {
        // Assert
        $this->assertArrayHasKey('model-generator', $this->app['config']);
        $this->assertIsArray($this->app['config']['model-generator']);
    }

    #[Test]
    public function it_registers_singleton_services(): void
    {
        // Assert
        $this->assertInstanceOf(
            ModelGeneratorConfig::class,
            $this->app->make(ModelGeneratorConfig::class)
        );

        $this->assertInstanceOf(
            SQLiteSchemaAnalyzer::class,
            $this->app->make(SchemaAnalyzerInterface::class)
        );

        $this->assertInstanceOf(
            RelationshipResolver::class,
            $this->app->make(RelationshipResolverInterface::class)
        );

        $this->assertInstanceOf(
            CodeGenerator::class,
            $this->app->make(CodeGeneratorInterface::class)
        );
    }

    #[Test]
    public function it_registers_model_generator_interface(): void
    {
        // Assert
        $this->assertTrue($this->app->bound(ModelGeneratorInterface::class));
        $this->assertTrue($this->app->bound('model.generator'));

        $this->assertSame(
            $this->app->make(ModelGeneratorInterface::class),
            $this->app->make('model.generator')
        );
    }

    #[Test]
    public function it_registers_console_commands(): void
    {
        // Arrange
        $commands = $this->app['artisan']->all();

        // Assert
        $this->assertArrayHasKey('model:generate', $commands);
        $this->assertInstanceOf(
            GenerateModelsCommand::class,
            $commands['model:generate']
        );
    }

    #[Test]
    public function it_provides_expected_services(): void
    {
        // Arrange
        $provider = new ModelGeneratorServiceProvider($this->app);

        // Act
        $provided = $provider->provides();

        // Assert
        expect($provided)
            ->toBeArray()
            ->toContain(ModelGeneratorInterface::class)
            ->toContain(ModelGeneratorConfig::class)
            ->toContain(SchemaAnalyzerInterface::class)
            ->toContain(RelationshipResolverInterface::class)
            ->toContain(CodeGeneratorInterface::class)
            ->toContain('model.generator');
    }

    #[Test]
    public function it_publishes_configuration(): void
    {
        // Act
        $this->artisan('vendor:publish', [
            '--provider' => ModelGeneratorServiceProvider::class,
            '--tag' => ['model-generator-config', 'model-generator-stubs'],
        ]);

        // Assert
        $this->assertFileExists($this->configPath);
        $this->assertDirectoryExists($this->stubsPath);

        // Verify config content
        $config = require $this->configPath;
        $this->assertIsArray($config);
        $this->assertArrayHasKey('schema', $config);
        $this->assertArrayHasKey('generation', $config);
        $this->assertArrayHasKey('documentation', $config);
    }

    #[Test]
    public function it_merges_config(): void
    {
        // Arrange
        $customConfig = [
            'schema' => [
                'chunk_size' => 50,
                'analyze_indexes' => false,
            ],
        ];

        config(['model-generator' => $customConfig]);

        // Act
        $this->app->register(ModelGeneratorServiceProvider::class);

        // Assert
        $this->assertEquals(50, config('model-generator.schema.chunk_size'));
        $this->assertFalse(config('model-generator.schema.analyze_indexes'));
        $this->assertTrue(config('model-generator.generation.generate_phpdoc'));
    }

    #[Test]
    public function it_registers_services_with_correct_dependencies(): void
    {
        // Act
        $analyzer = $this->app->make(SchemaAnalyzerInterface::class);
        $resolver = $this->app->make(RelationshipResolverInterface::class);
        $generator = $this->app->make(CodeGeneratorInterface::class);
        $modelGenerator = $this->app->make(ModelGeneratorInterface::class);

        // Assert
        $this->assertInstanceOf(SQLiteSchemaAnalyzer::class, $analyzer);
        $this->assertInstanceOf(RelationshipResolver::class, $resolver);
        $this->assertInstanceOf(CodeGenerator::class, $generator);

        // Test dependency injection
        $command = $this->app->make(GenerateModelsCommand::class);
        $reflectionProperty = new ReflectionProperty($command, 'generator');
        $reflectionProperty->setAccessible(true);
        $injectedGenerator = $reflectionProperty->getValue($command);

        $this->assertSame($modelGenerator, $injectedGenerator);
    }

    #[Test]
    public function it_boots_only_in_console(): void
    {
        // Arrange
        $this->app['config']->set('app.running_in_console', false);

        // Act
        $provider = new ModelGeneratorServiceProvider($this->app);
        $provider->boot();

        // Assert
        $this->assertEmpty($this->app['artisan']->all());
    }

    #[Test]
    public function it_handles_missing_config_directory(): void
    {
        // Arrange
        File::deleteDirectory(config_path());

        // Act
        $this->artisan('vendor:publish', [
            '--provider' => ModelGeneratorServiceProvider::class,
            '--tag' => 'model-generator-config',
        ]);

        // Assert
        $this->assertFileExists($this->configPath);
    }

    #[Test]
    public function it_handles_missing_stubs_directory(): void
    {
        // Arrange
        File::deleteDirectory(base_path('stubs'));

        // Act
        $this->artisan('vendor:publish', [
            '--provider' => ModelGeneratorServiceProvider::class,
            '--tag' => 'model-generator-stubs',
        ]);

        // Assert
        $this->assertDirectoryExists($this->stubsPath);
    }

    #[Test]
    public function it_registers_event_listeners(): void
    {
        // Assert
        $this->assertTrue(
            $this->app['events']->hasListeners('model.generation.progress')
        );
    }

    #[Test]
    public function it_registers_queue_jobs(): void
    {
        // Assert
        $this->assertTrue(
            $this->app->bound('queue.failer')
        );
    }
}
