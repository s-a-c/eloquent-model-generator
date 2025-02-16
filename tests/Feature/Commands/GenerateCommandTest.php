<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests\Feature\Commands;

use Illuminate\Support\Facades\Artisan;
use Orchestra\Testbench\TestCase;
use SAC\EloquentModelGenerator\Commands\GenerateCommand;
use SAC\EloquentModelGenerator\Contracts\{
    ModelGenerator,
    RelationDetector,
    SchemaAnalyzer,
    TypeInference
};

class GenerateCommandTest extends TestCase {
    protected function setUp(): void {
        parent::setUp();

        // Register the command
        $this->app->singleton(GenerateCommand::class, function ($app) {
            return new GenerateCommand(
                $app->make(ModelGenerator::class)
            );
        });

        $this->artisan('command:register', ['command' => 'model:generate']);
    }

    protected function getPackageProviders($app): array {
        return [
            'SAC\EloquentModelGenerator\Providers\ModelGeneratorServiceProvider',
        ];
    }

    public function testGenerateCommandCreatesModel(): void {
        // Create a test database table
        $this->artisan('migrate:fresh');
        $this->artisan('db:seed');

        // Run the generate command
        $this->artisan('model:generate', [
            'table' => 'users',
            '--namespace' => 'App\\Models',
            '--path' => $this->app->basePath('app/Models'),
        ])
            ->assertSuccessful()
            ->expectsOutput('Generating model for table: users')
            ->expectsOutput('Model generated successfully');

        // Verify the model file exists
        $this->assertFileExists($this->app->basePath('app/Models/User.php'));

        // Verify the model content
        $content = file_get_contents($this->app->basePath('app/Models/User.php'));
        $this->assertStringContainsString('namespace App\\Models;', $content);
        $this->assertStringContainsString('class User extends Model', $content);
        $this->assertStringContainsString('protected $table = \'users\';', $content);
    }

    public function testGenerateCommandWithSoftDeletes(): void {
        $this->artisan('migrate:fresh');
        $this->artisan('db:seed');

        $this->artisan('model:generate', [
            'table' => 'users',
            '--with-soft-deletes' => true,
        ])
            ->assertSuccessful();

        $content = file_get_contents($this->app->basePath('app/Models/User.php'));
        $this->assertStringContainsString('use Illuminate\\Database\\Eloquent\\SoftDeletes;', $content);
        $this->assertStringContainsString('use SoftDeletes;', $content);
    }

    public function testGenerateCommandWithValidation(): void {
        $this->artisan('migrate:fresh');
        $this->artisan('db:seed');

        $this->artisan('model:generate', [
            'table' => 'users',
            '--with-validation' => true,
        ])
            ->assertSuccessful();

        $content = file_get_contents($this->app->basePath('app/Models/User.php'));
        $this->assertStringContainsString('public static function rules()', $content);
        $this->assertStringContainsString('protected static $rules = [', $content);
    }

    public function testGenerateCommandWithRelationships(): void {
        $this->artisan('migrate:fresh');
        $this->artisan('db:seed');

        $this->artisan('model:generate', [
            'table' => 'users',
            '--with-relationships' => true,
        ])
            ->assertSuccessful();

        $content = file_get_contents($this->app->basePath('app/Models/User.php'));
        $this->assertStringContainsString('public function posts()', $content);
        $this->assertStringContainsString('return $this->hasMany(Post::class', $content);
    }

    public function testGenerateCommandFailsForNonExistentTable(): void {
        $this->artisan('model:generate', [
            'table' => 'non_existent_table',
        ])
            ->assertFailed()
            ->expectsOutput('Failed to generate model: Table non_existent_table does not exist');
    }

    public function testGenerateCommandWithForceOption(): void {
        $this->artisan('migrate:fresh');
        $this->artisan('db:seed');

        // Generate the model first time
        $this->artisan('model:generate', ['table' => 'users'])->assertSuccessful();

        // Try to generate again without --force
        $this->artisan('model:generate', ['table' => 'users'])
            ->assertFailed()
            ->expectsOutput('Model already exists. Use --force to overwrite.');

        // Generate again with --force
        $this->artisan('model:generate', [
            'table' => 'users',
            '--force' => true,
        ])
            ->assertSuccessful()
            ->expectsOutput('Model generated successfully');
    }

    public function testGenerateCommandWithCustomPath(): void {
        $this->artisan('migrate:fresh');
        $this->artisan('db:seed');

        $customPath = $this->app->basePath('custom/models');

        $this->artisan('model:generate', [
            'table' => 'users',
            '--path' => $customPath,
        ])
            ->assertSuccessful();

        $this->assertFileExists("{$customPath}/User.php");
    }

    public function testGenerateCommandWithCustomBaseClass(): void {
        $this->artisan('migrate:fresh');
        $this->artisan('db:seed');

        $this->artisan('model:generate', [
            'table' => 'users',
            '--base-class' => 'App\\Models\\BaseModel',
        ])
            ->assertSuccessful();

        $content = file_get_contents($this->app->basePath('app/Models/User.php'));
        $this->assertStringContainsString('use App\\Models\\BaseModel;', $content);
        $this->assertStringContainsString('class User extends BaseModel', $content);
    }
}