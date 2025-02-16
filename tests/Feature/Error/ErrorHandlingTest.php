<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests\Feature\Error;

use Orchestra\Testbench\TestCase;
use SAC\EloquentModelGenerator\Commands\{
    GenerateCommand,
    AnalyzeCommand,
    FixCommand,
    MetricsCommand
};
use SAC\EloquentModelGenerator\Exceptions\{
    ModelGeneratorException,
    ConfigurationException,
    SchemaAnalyzerException
};

class ErrorHandlingTest extends TestCase {
    protected function getPackageProviders($app): array {
        return [
            'SAC\EloquentModelGenerator\Providers\ModelGeneratorServiceProvider',
        ];
    }

    public function testGenerateCommandHandlesSchemaAnalyzerError(): void {
        $this->artisan('model:generate', [
            'table' => 'non_existent_table',
        ])
            ->assertFailed()
            ->expectsOutput('Failed to generate model: Table non_existent_table does not exist');
    }

    public function testGenerateCommandHandlesInvalidNamespace(): void {
        $this->artisan('model:generate', [
            'table' => 'users',
            '--namespace' => '123Invalid',
        ])
            ->assertFailed()
            ->expectsOutput('Failed to generate model: Invalid namespace format: 123Invalid');
    }

    public function testGenerateCommandHandlesInvalidPath(): void {
        $this->artisan('model:generate', [
            'table' => 'users',
            '--path' => '/absolute/path',
        ])
            ->assertFailed()
            ->expectsOutput('Failed to generate model: Path must be relative');
    }

    public function testAnalyzeCommandHandlesDatabaseError(): void {
        // Simulate database connection error
        config(['database.connections.mysql.password' => 'wrong_password']);

        $this->artisan('model:analyze', [
            'table' => 'users',
        ])
            ->assertFailed()
            ->expectsOutput('Analysis failed: Database connection error');
    }

    public function testAnalyzeCommandHandlesInvalidFormat(): void {
        $this->artisan('model:analyze', [
            'table' => 'users',
            '--format' => 'invalid',
        ])
            ->assertFailed()
            ->expectsOutput('Analysis failed: Invalid output format. Supported formats: text, json, yaml');
    }

    public function testFixCommandHandlesNonExistentModel(): void {
        $this->artisan('model:fix', [
            'model' => 'NonExistentModel',
        ])
            ->assertFailed()
            ->expectsOutput('Failed to fix model: Model file not found');
    }

    public function testFixCommandHandlesInvalidFixes(): void {
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
            '--fix-invalid' => true,
        ])
            ->assertFailed()
            ->expectsOutput('Failed to fix model: Invalid fix type: fix-invalid');

        // Clean up
        unlink($modelPath);
        rmdir(dirname($modelPath));
    }

    public function testMetricsCommandHandlesInvalidThresholds(): void {
        $this->artisan('model:metrics', [
            'model' => 'User',
            '--threshold' => 'invalid',
        ])
            ->assertFailed()
            ->expectsOutput('Metrics collection failed: Invalid threshold value');
    }

    public function testHandlesConfigurationErrors(): void {
        $configPath = $this->app->basePath('config/model-generator.php');
        $configContent = '<?php return "invalid";';

        mkdir(dirname($configPath), 0777, true);
        file_put_contents($configPath, $configContent);

        $this->artisan('model:generate', [
            'table' => 'users',
        ])
            ->assertFailed()
            ->expectsOutput('Failed to generate model: Configuration must be an array');

        // Clean up
        unlink($configPath);
        rmdir(dirname($configPath));
    }

    public function testHandlesPermissionErrors(): void {
        $modelPath = $this->app->basePath('app/Models');
        mkdir($modelPath, 0444, true); // Read-only directory

        $this->artisan('model:generate', [
            'table' => 'users',
        ])
            ->assertFailed()
            ->expectsOutput('Failed to generate model: Permission denied');

        // Clean up
        chmod($modelPath, 0777);
        rmdir($modelPath);
    }

    public function testHandlesMemoryExhaustion(): void {
        // Create a large table schema
        $columns = array_fill(0, 10000, [
            'name' => 'column',
            'type' => 'string',
            'length' => 255,
        ]);

        $this->artisan('model:generate', [
            'table' => 'large_table',
        ])
            ->assertFailed()
            ->expectsOutput('Failed to generate model: Memory limit exceeded');
    }

    public function testHandlesTimeoutErrors(): void {
        // Set a very short timeout
        set_time_limit(1);

        $this->artisan('model:analyze', [
            'table' => 'users',
            '--with-all' => true,
        ])
            ->assertFailed()
            ->expectsOutput('Analysis failed: Operation timed out');

        // Reset timeout
        set_time_limit(0);
    }

    public function testHandlesConcurrencyErrors(): void {
        // Simulate concurrent access
        $modelPath = $this->app->basePath('app/Models/User.php');

        mkdir(dirname($modelPath), 0777, true);
        file_put_contents($modelPath, '<?php // Lock file');

        // Create a lock file
        file_put_contents($modelPath . '.lock', '');

        $this->artisan('model:fix', [
            'model' => 'User',
        ])
            ->assertFailed()
            ->expectsOutput('Failed to fix model: Model is locked for editing');

        // Clean up
        unlink($modelPath);
        unlink($modelPath . '.lock');
        rmdir(dirname($modelPath));
    }

    public function testHandlesValidationErrors(): void {
        $this->artisan('model:generate', [
            'table' => '',
        ])
            ->assertFailed()
            ->expectsOutput('Failed to generate model: Table name cannot be empty');
    }

    public function testHandlesUnexpectedErrors(): void {
        // Simulate an unexpected error
        $this->app->singleton(GenerateCommand::class, function () {
            throw new \RuntimeException('Unexpected error');
        });

        $this->artisan('model:generate', [
            'table' => 'users',
        ])
            ->assertFailed()
            ->expectsOutput('An unexpected error occurred: Unexpected error');
    }
}