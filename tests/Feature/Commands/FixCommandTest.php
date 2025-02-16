<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests\Feature\Commands;

use Illuminate\Support\Facades\Artisan;
use Orchestra\Testbench\TestCase;
use SAC\EloquentModelGenerator\Commands\FixCommand;
use SAC\EloquentModelGenerator\Contracts\ModelGenerator;

class FixCommandTest extends TestCase {
    protected function setUp(): void {
        parent::setUp();

        // Register the command
        $this->app->singleton(FixCommand::class, function ($app) {
            return new FixCommand(
                $app->make(ModelGenerator::class)
            );
        });

        $this->artisan('command:register', ['command' => 'model:fix']);
    }

    protected function getPackageProviders($app): array {
        return [
            'SAC\EloquentModelGenerator\Providers\ModelGeneratorServiceProvider',
        ];
    }

    public function testFixCommandShowsSuggestions(): void {
        // Create a test model with issues
        $modelPath = $this->app->basePath('app/Models/User.php');
        $modelContent = <<<'PHP'
            <?php
            namespace App\Models;
            class User extends Model
            {
                private $name;
                private $email;
            }
            PHP;

        mkdir(dirname($modelPath), 0777, true);
        file_put_contents($modelPath, $modelContent);

        $this->artisan('model:fix', [
            'model' => 'User',
            '--fix-types' => true,
        ])
            ->assertSuccessful()
            ->expectsOutput('Analyzing model: User')
            ->expectsOutput('Suggested fixes:')
            ->expectsOutput('type fix in app/Models/User.php:5')
            ->expectsOutput('- private $name;')
            ->expectsOutput('+ private string $name;');

        // Clean up
        unlink($modelPath);
        rmdir(dirname($modelPath));
    }

    public function testFixCommandWithDryRun(): void {
        $modelPath = $this->app->basePath('app/Models/User.php');
        $modelContent = <<<'PHP'
            <?php
            namespace App\Models;
            class User extends Model
            {
                private $name;
            }
            PHP;

        mkdir(dirname($modelPath), 0777, true);
        file_put_contents($modelPath, $modelContent);

        $this->artisan('model:fix', [
            'model' => 'User',
            '--fix-types' => true,
            '--dry-run' => true,
        ])
            ->assertSuccessful();

        // Verify the file wasn't changed
        $this->assertStringContainsString(
            'private $name;',
            file_get_contents($modelPath)
        );

        // Clean up
        unlink($modelPath);
        rmdir(dirname($modelPath));
    }

    public function testFixCommandWithInteractiveMode(): void {
        $modelPath = $this->app->basePath('app/Models/User.php');
        $modelContent = <<<'PHP'
            <?php
            namespace App\Models;
            class User extends Model
            {
                private $name;
                private $email;
            }
            PHP;

        mkdir(dirname($modelPath), 0777, true);
        file_put_contents($modelPath, $modelContent);

        $this->artisan('model:fix', [
            'model' => 'User',
            '--fix-types' => true,
            '--interactive' => true,
        ])
            ->expectsQuestion('Apply fix: Add type hint for $name property?', 'yes')
            ->expectsQuestion('Apply fix: Add type hint for $email property?', 'no')
            ->assertSuccessful();

        $content = file_get_contents($modelPath);
        $this->assertStringContainsString('private string $name;', $content);
        $this->assertStringContainsString('private $email;', $content);

        // Clean up
        unlink($modelPath);
        rmdir(dirname($modelPath));
    }

    public function testFixCommandWithMultipleFixes(): void {
        $modelPath = $this->app->basePath('app/Models/User.php');
        $modelContent = <<<'PHP'
            <?php
            namespace App\Models;
            class User extends Model
            {
                private $name;
                private $email;
                private $created_at;
            }
            PHP;

        mkdir(dirname($modelPath), 0777, true);
        file_put_contents($modelPath, $modelContent);

        $this->artisan('model:fix', [
            'model' => 'User',
            '--fix-all' => true,
        ])
            ->assertSuccessful()
            ->expectsOutput('Applied 3 fixes to User');

        $content = file_get_contents($modelPath);
        $this->assertStringContainsString('private string $name;', $content);
        $this->assertStringContainsString('private string $email;', $content);
        $this->assertStringContainsString('private \Carbon\Carbon $created_at;', $content);

        // Clean up
        unlink($modelPath);
        rmdir(dirname($modelPath));
    }

    public function testFixCommandFailsForNonExistentModel(): void {
        $this->artisan('model:fix', [
            'model' => 'NonExistentModel',
            '--fix-types' => true,
        ])
            ->assertFailed()
            ->expectsOutput('Failed to fix model: Model file not found');
    }

    public function testFixCommandWithSpecificFixes(): void {
        $modelPath = $this->app->basePath('app/Models/User.php');
        $modelContent = <<<'PHP'
            <?php
            namespace App\Models;
            class User extends Model
            {
                private $name;
                public function posts() {}
            }
            PHP;

        mkdir(dirname($modelPath), 0777, true);
        file_put_contents($modelPath, $modelContent);

        $this->artisan('model:fix', [
            'model' => 'User',
            '--fix-types' => true,
            '--fix-relations' => true,
        ])
            ->assertSuccessful();

        $content = file_get_contents($modelPath);
        $this->assertStringContainsString('private string $name;', $content);
        $this->assertStringContainsString('return $this->hasMany(Post::class', $content);

        // Clean up
        unlink($modelPath);
        rmdir(dirname($modelPath));
    }
}