<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests\Integration;

use Illuminate\Support\Facades\File;
use PHPUnit\Framework\Attributes\Test;
use SAC\EloquentModelGenerator\Console\Commands\GenerateModelsCommand;
use SAC\EloquentModelGenerator\Contracts\ModelGeneratorInterface;
use SAC\EloquentModelGenerator\ModelGeneratorServiceProvider;
use SAC\EloquentModelGenerator\Tests\TestCase;

final class LaravelIntegrationTest extends TestCase
{
    private string $outputPath;

    protected function setUp(): void
    {
        parent::setUp();

        $this->outputPath = $this->createTempDirectory();
        config(['model-generator.generation.path' => $this->outputPath]);

        // Create test database schema
        $this->createTestSchema();
    }

    protected function tearDown(): void
    {
        $this->cleanupTempDirectory($this->outputPath);
        parent::tearDown();
    }

    #[Test]
    public function it_registers_service_provider(): void
    {
        // Assert
        $this->assertTrue($this->app->providerIsLoaded(ModelGeneratorServiceProvider::class));
        $this->assertTrue($this->app->bound(ModelGeneratorInterface::class));
        $this->assertTrue($this->app->bound('model.generator'));
    }

    #[Test]
    public function it_registers_artisan_command(): void
    {
        // Assert
        $this->assertTrue($this->app->make('artisan')->has('model:generate'));
        $this->assertInstanceOf(
            GenerateModelsCommand::class,
            $this->app->make('artisan')->find('model:generate')
        );
    }

    #[Test]
    public function it_publishes_configuration(): void
    {
        // Act
        $this->artisan('vendor:publish', [
            '--provider' => ModelGeneratorServiceProvider::class,
            '--tag' => 'model-generator-config',
        ]);

        // Assert
        $this->assertFileExists(config_path('model-generator.php'));
    }

    #[Test]
    public function it_generates_models_from_database(): void
    {
        // Act
        $this->artisan('model:generate')
            ->assertSuccessful();

        // Assert
        $this->assertFileExists($this->outputPath.'/User.php');
        $this->assertFileExists($this->outputPath.'/Post.php');
        $this->assertFileExists($this->outputPath.'/Comment.php');

        // Check model content
        $userModel = File::get($this->outputPath.'/User.php');
        $this->assertStringContainsString('class User extends Model', $userModel);
        $this->assertStringContainsString('protected $fillable = [', $userModel);
        $this->assertStringContainsString('public function posts()', $userModel);
    }

    #[Test]
    public function it_respects_configuration_options(): void
    {
        // Arrange
        config([
            'model-generator.generation.namespace' => 'App\\Domain\\Models',
            'model-generator.generation.traits' => ['App\\Traits\\HasUuid'],
            'model-generator.schema.exclude_tables' => ['migrations', 'failed_jobs'],
        ]);

        // Act
        $this->artisan('model:generate')
            ->assertSuccessful();

        // Assert
        $userModel = File::get($this->outputPath.'/User.php');
        $this->assertStringContainsString('namespace App\\Domain\\Models;', $userModel);
        $this->assertStringContainsString('use App\\Traits\\HasUuid;', $userModel);
    }

    #[Test]
    public function it_handles_polymorphic_relationships(): void
    {
        // Act
        $this->artisan('model:generate')
            ->assertSuccessful();

        // Assert
        $commentModel = File::get($this->outputPath.'/Comment.php');
        $this->assertStringContainsString('public function commentable()', $commentModel);
        $this->assertStringContainsString('return $this->morphTo();', $commentModel);

        $postModel = File::get($this->outputPath.'/Post.php');
        $this->assertStringContainsString('public function comments()', $postModel);
        $this->assertStringContainsString('return $this->morphMany(', $postModel);
    }

    #[Test]
    public function it_generates_documentation(): void
    {
        // Arrange
        $docsPath = $this->createTempDirectory();
        config(['model-generator.documentation.output_path' => $docsPath]);

        // Act
        $this->artisan('model:generate', ['--with-docs' => true])
            ->assertSuccessful();

        // Assert
        $this->assertFileExists($docsPath.'/README.md');
        $this->assertFileExists($docsPath.'/User.md');
        $this->assertFileExists($docsPath.'/erd.md');

        // Clean up
        $this->cleanupTempDirectory($docsPath);
    }

    #[Test]
    public function it_handles_custom_column_types(): void
    {
        // Arrange
        config([
            'model-generator.type_mappings.custom_casts' => [
                'point' => 'App\\Casts\\PointCast',
            ],
        ]);

        // Create table with custom type
        $this->schema()->create('locations', function ($table) {
            $table->id();
            $table->string('name');
            $table->point('coordinates');
            $table->timestamps();
        });

        // Act
        $this->artisan('model:generate')
            ->assertSuccessful();

        // Assert
        $locationModel = File::get($this->outputPath.'/Location.php');
        $this->assertStringContainsString("'coordinates' => \\App\\Casts\\PointCast::class", $locationModel);
    }

    private function createTestSchema(): void
    {
        // Create users table
        $this->schema()->create('users', function ($table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });

        // Create posts table
        $this->schema()->create('posts', function ($table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->text('content');
            $table->timestamps();
        });

        // Create comments table with polymorphic relationship
        $this->schema()->create('comments', function ($table) {
            $table->id();
            $table->morphs('commentable');
            $table->text('content');
            $table->timestamps();
        });
    }

    private function schema()
    {
        return $this->app['db']->connection()->getSchemaBuilder();
    }
}
