<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests\Integration;

use Illuminate\Support\Facades\File;
use PHPUnit\Framework\Attributes\Test;
use SAC\EloquentModelGenerator\Tests\TestCase;
use Symfony\Component\Console\Command\Command;

final class ConsoleInterfaceTest extends TestCase
{
    private string $outputPath;

    private string $docsPath;

    protected function setUp(): void
    {
        parent::setUp();

        $this->outputPath = $this->createTempDirectory();
        $this->docsPath = $this->createTempDirectory();

        config([
            'model-generator.generation.path' => $this->outputPath,
            'model-generator.documentation.output_path' => $this->docsPath,
        ]);

        $this->createTestSchema();
    }

    protected function tearDown(): void
    {
        $this->cleanupTempDirectory($this->outputPath);
        $this->cleanupTempDirectory($this->docsPath);
        parent::tearDown();
    }

    #[Test]
    public function it_displays_help_information(): void
    {
        // Act
        $result = $this->artisan('model:generate', ['--help' => true]);

        // Assert
        $result->assertSuccessful();
        $result->expectsOutput('Generate Eloquent models from SQLite database schema');
        $result->expectsOutput('--table');
        $result->expectsOutput('--exclude');
        $result->expectsOutput('--with-docs');
    }

    #[Test]
    public function it_handles_table_option(): void
    {
        // Act
        $result = $this->artisan('model:generate', [
            '--table' => 'users',
        ]);

        // Assert
        $result->assertSuccessful();
        $this->assertFileExists($this->outputPath.'/User.php');
        $this->assertFileDoesNotExist($this->outputPath.'/Post.php');
    }

    #[Test]
    public function it_handles_exclude_option(): void
    {
        // Act
        $result = $this->artisan('model:generate', [
            '--exclude' => 'users,posts',
        ]);

        // Assert
        $result->assertSuccessful();
        $this->assertFileDoesNotExist($this->outputPath.'/User.php');
        $this->assertFileDoesNotExist($this->outputPath.'/Post.php');
        $this->assertFileExists($this->outputPath.'/Comment.php');
    }

    #[Test]
    public function it_handles_path_option(): void
    {
        // Arrange
        $customPath = $this->createTempDirectory();

        // Act
        $result = $this->artisan('model:generate', [
            '--path' => $customPath,
        ]);

        // Assert
        $result->assertSuccessful();
        $this->assertFileExists($customPath.'/User.php');

        // Clean up
        $this->cleanupTempDirectory($customPath);
    }

    #[Test]
    public function it_handles_namespace_option(): void
    {
        // Act
        $result = $this->artisan('model:generate', [
            '--namespace' => 'App\\Domain\\Models',
        ]);

        // Assert
        $result->assertSuccessful();
        $content = File::get($this->outputPath.'/User.php');
        $this->assertStringContainsString('namespace App\\Domain\\Models;', $content);
    }

    #[Test]
    public function it_handles_analyze_option(): void
    {
        // Act
        $result = $this->artisan('model:generate', [
            '--analyze' => true,
        ]);

        // Assert
        $result->assertSuccessful();
        $result->expectsTable(
            ['Table', 'Columns', 'Indices', 'Relationships'],
            [
                ['users', '4', '1', '1'],
                ['posts', '5', '2', '1'],
                ['comments', '5', '1', '1'],
            ]
        );
    }

    #[Test]
    public function it_handles_with_docs_option(): void
    {
        // Act
        $result = $this->artisan('model:generate', [
            '--with-docs' => true,
        ]);

        // Assert
        $result->assertSuccessful();
        $this->assertFileExists($this->docsPath.'/User.md');
        $this->assertFileExists($this->docsPath.'/README.md');
        $this->assertFileExists($this->docsPath.'/erd.md');
    }

    #[Test]
    public function it_handles_force_option(): void
    {
        // Arrange
        File::put($this->outputPath.'/User.php', 'old content');

        // Act
        $result = $this->artisan('model:generate', [
            '--force' => true,
        ]);

        // Assert
        $result->assertSuccessful();
        $content = File::get($this->outputPath.'/User.php');
        $this->assertStringContainsString('class User extends Model', $content);
    }

    #[Test]
    public function it_handles_no_backup_option(): void
    {
        // Arrange
        File::put($this->outputPath.'/User.php', 'old content');

        // Act
        $result = $this->artisan('model:generate', [
            '--force' => true,
            '--no-backup' => true,
        ]);

        // Assert
        $result->assertSuccessful();
        $this->assertFileDoesNotExist($this->outputPath.'/User.php.bak');
    }

    #[Test]
    public function it_handles_with_factory_option(): void
    {
        // Act
        $result = $this->artisan('model:generate', [
            '--with-factory' => true,
        ]);

        // Assert
        $result->assertSuccessful();
        $this->assertFileExists(database_path('factories/UserFactory.php'));
    }

    #[Test]
    public function it_handles_invalid_options(): void
    {
        // Act
        $result = $this->artisan('model:generate', [
            '--invalid-option' => true,
        ]);

        // Assert
        $result->assertFailed();
        $result->expectsOutput('The "--invalid-option" option does not exist.');
    }

    #[Test]
    public function it_handles_interactive_mode(): void
    {
        // Act
        $result = $this->artisan('model:generate')
            ->expectsQuestion('Generate documentation?', 'yes')
            ->expectsQuestion('Include factories?', 'yes')
            ->expectsQuestion('Backup existing files?', 'no');

        // Assert
        $result->assertSuccessful();
        $this->assertFileExists($this->docsPath.'/User.md');
        $this->assertFileExists(database_path('factories/UserFactory.php'));
    }

    #[Test]
    public function it_displays_progress_bar(): void
    {
        // Act
        $result = $this->artisan('model:generate');

        // Assert
        $result->assertSuccessful();
        $result->expectsOutput('Processing tables...');
        $result->expectsOutput('Generated models successfully.');
    }

    #[Test]
    public function it_returns_correct_exit_codes(): void
    {
        // Success case
        $result = $this->artisan('model:generate');
        $this->assertEquals(Command::SUCCESS, $result->execute());

        // Failure case
        chmod($this->outputPath, 0444); // Make directory read-only
        $result = $this->artisan('model:generate');
        $this->assertEquals(Command::FAILURE, $result->execute());
    }

    private function createTestSchema(): void
    {
        // Create users table
        $this->schema()->create('users', function ($table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamps();
        });

        // Create posts table
        $this->schema()->create('posts', function ($table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('title');
            $table->text('content');
            $table->timestamps();
        });

        // Create comments table
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
