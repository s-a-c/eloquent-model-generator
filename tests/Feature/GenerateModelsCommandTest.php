<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests\Feature;

use Illuminate\Support\Facades\File;
use PHPUnit\Framework\Attributes\Test;
use SAC\EloquentModelGenerator\Tests\TestCase;

final class GenerateModelsCommandTest extends TestCase
{
    private string $outputPath;

    protected function setUp(): void
    {
        parent::setUp();

        $this->outputPath = $this->createTempDirectory();
        config(['model-generator.generation.path' => $this->outputPath]);
    }

    protected function tearDown(): void
    {
        $this->cleanupTempDirectory($this->outputPath);

        parent::tearDown();
    }

    #[Test]
    public function it_generates_models_for_all_tables(): void
    {
        // Act
        $result = $this->artisan('model:generate');

        // Assert
        $result->assertSuccessful();

        // Check that models were generated
        $this->assertFileExists($this->outputPath.'/User.php');
        $this->assertFileExists($this->outputPath.'/Post.php');
        $this->assertFileExists($this->outputPath.'/Comment.php');
        $this->assertFileExists($this->outputPath.'/Tag.php');
        $this->assertFileExists($this->outputPath.'/Subscription.php');
        $this->assertFileExists($this->outputPath.'/Category.php');
        $this->assertFileExists($this->outputPath.'/Setting.php');

        // Check model content
        $userModel = File::get($this->outputPath.'/User.php');
        $this->assertStringContainsString('class User extends Model', $userModel);
        $this->assertStringContainsString('use HasFactory, SoftDeletes;', $userModel);
        $this->assertStringContainsString('protected $fillable = [', $userModel);
        $this->assertStringContainsString("'name',", $userModel);
        $this->assertStringContainsString("'email',", $userModel);
        $this->assertStringContainsString('public function posts()', $userModel);

        // Check relationships
        $postModel = File::get($this->outputPath.'/Post.php');
        $this->assertStringContainsString('public function user()', $postModel);
        $this->assertStringContainsString('public function comments()', $postModel);
        $this->assertStringContainsString('public function tags()', $postModel);

        // Check polymorphic relationships
        $commentModel = File::get($this->outputPath.'/Comment.php');
        $this->assertStringContainsString('public function commentable()', $commentModel);
        $this->assertStringContainsString('return $this->morphTo();', $commentModel);
    }

    #[Test]
    public function it_generates_models_with_documentation(): void
    {
        // Arrange
        $docsPath = $this->createTempDirectory();
        config(['model-generator.documentation.output_path' => $docsPath]);

        // Act
        $result = $this->artisan('model:generate', ['--with-docs' => true]);

        // Assert
        $result->assertSuccessful();

        // Check documentation files
        $this->assertFileExists($docsPath.'/User.md');
        $this->assertFileExists($docsPath.'/Post.md');
        $this->assertFileExists($docsPath.'/README.md');
        $this->assertFileExists($docsPath.'/erd.md');

        // Check documentation content
        $userDocs = File::get($docsPath.'/User.md');
        $this->assertStringContainsString('# User', $userDocs);
        $this->assertStringContainsString('## Properties', $userDocs);
        $this->assertStringContainsString('## Relationships', $userDocs);

        // Clean up
        $this->cleanupTempDirectory($docsPath);
    }

    #[Test]
    public function it_generates_model_for_specific_table(): void
    {
        // Act
        $result = $this->artisan('model:generate', ['--table' => 'users']);

        // Assert
        $result->assertSuccessful();

        $this->assertFileExists($this->outputPath.'/User.php');
        $this->assertFileDoesNotExist($this->outputPath.'/Post.php');
    }

    #[Test]
    public function it_excludes_specified_tables(): void
    {
        // Act
        $result = $this->artisan('model:generate', ['--exclude' => 'users,posts']);

        // Assert
        $result->assertSuccessful();

        $this->assertFileDoesNotExist($this->outputPath.'/User.php');
        $this->assertFileDoesNotExist($this->outputPath.'/Post.php');
        $this->assertFileExists($this->outputPath.'/Comment.php');
    }

    #[Test]
    public function it_analyzes_schema_without_generating_models(): void
    {
        // Act
        $result = $this->artisan('model:generate', ['--analyze' => true]);

        // Assert
        $result->assertSuccessful();

        $this->assertDirectoryIsEmpty($this->outputPath);
    }

    #[Test]
    public function it_generates_models_with_custom_namespace(): void
    {
        // Act
        $result = $this->artisan('model:generate', [
            '--namespace' => 'App\\Domain\\Models',
        ]);

        // Assert
        $result->assertSuccessful();

        $userModel = File::get($this->outputPath.'/User.php');
        $this->assertStringContainsString('namespace App\\Domain\\Models;', $userModel);
    }

    #[Test]
    public function it_handles_invalid_table_name(): void
    {
        // Act
        $result = $this->artisan('model:generate', [
            '--table' => 'non_existent_table',
        ]);

        // Assert
        $result->assertFailed();
        $this->assertDirectoryIsEmpty($this->outputPath);
    }

    #[Test]
    public function it_generates_models_with_soft_deletes(): void
    {
        // Act
        $result = $this->artisan('model:generate', [
            '--with-soft-deletes' => true,
        ]);

        // Assert
        $result->assertSuccessful();

        $userModel = File::get($this->outputPath.'/User.php');
        $this->assertStringContainsString('use SoftDeletes;', $userModel);
        $this->assertStringContainsString('protected $dates = [\'deleted_at\'];', $userModel);
    }

    #[Test]
    public function it_generates_models_without_timestamps(): void
    {
        // Act
        $result = $this->artisan('model:generate', [
            '--no-timestamps' => true,
        ]);

        // Assert
        $result->assertSuccessful();

        $userModel = File::get($this->outputPath.'/User.php');
        $this->assertStringContainsString('public $timestamps = false;', $userModel);
    }

    #[Test]
    public function it_generates_model_factories(): void
    {
        // Arrange
        $factoryPath = database_path('factories');
        if (! File::exists($factoryPath)) {
            File::makeDirectory($factoryPath, 0755, true);
        }

        // Act
        $result = $this->artisan('model:generate', [
            '--with-factory' => true,
        ]);

        // Assert
        $result->assertSuccessful();

        $this->assertFileExists($factoryPath.'/UserFactory.php');
        $this->assertFileExists($factoryPath.'/PostFactory.php');

        // Clean up
        File::deleteDirectory($factoryPath);
    }
}
