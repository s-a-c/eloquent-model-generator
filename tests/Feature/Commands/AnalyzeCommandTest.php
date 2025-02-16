<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests\Feature\Commands;

use Illuminate\Support\Facades\Artisan;
use Orchestra\Testbench\TestCase;
use SAC\EloquentModelGenerator\Commands\AnalyzeCommand;
use SAC\EloquentModelGenerator\Contracts\SchemaAnalyzer;

class AnalyzeCommandTest extends TestCase {
    protected function setUp(): void {
        parent::setUp();

        // Register the command
        $this->app->singleton(AnalyzeCommand::class, function ($app) {
            return new AnalyzeCommand(
                $app->make(SchemaAnalyzer::class)
            );
        });

        $this->artisan('command:register', ['command' => 'model:analyze']);
    }

    protected function getPackageProviders($app): array {
        return [
            'SAC\EloquentModelGenerator\Providers\ModelGeneratorServiceProvider',
        ];
    }

    public function testAnalyzeCommandShowsTableSchema(): void {
        // Create a test database table
        $this->artisan('migrate:fresh');
        $this->artisan('db:seed');

        // Run the analyze command
        $this->artisan('model:analyze', ['table' => 'users'])
            ->assertSuccessful()
            ->expectsOutput('Analyzing table: users')
            ->expectsOutput('Columns:')
            ->expectsOutput('  id: integer NOT NULL PRIMARY KEY')
            ->expectsOutput('  name: string NOT NULL');
    }

    public function testAnalyzeCommandWithJsonFormat(): void {
        $this->artisan('migrate:fresh');
        $this->artisan('db:seed');

        $result = $this->artisan('model:analyze', [
            'table' => 'users',
            '--format' => 'json',
        ]);

        $result->assertSuccessful();

        $output = $result->getOutput();
        $schema = json_decode($output, true);
        $this->assertIsArray($schema);
        $this->assertArrayHasKey('columns', $schema);
        $this->assertArrayHasKey('relationships', $schema);
    }

    public function testAnalyzeCommandWithYamlFormat(): void {
        $this->artisan('migrate:fresh');
        $this->artisan('db:seed');

        $result = $this->artisan('model:analyze', [
            'table' => 'users',
            '--format' => 'yaml',
        ]);

        $result->assertSuccessful();

        $output = $result->getOutput();
        $this->assertStringContainsString('columns:', $output);
        $this->assertStringContainsString('relationships:', $output);
    }

    public function testAnalyzeCommandWithOutputFile(): void {
        $this->artisan('migrate:fresh');
        $this->artisan('db:seed');

        $outputFile = $this->app->basePath('schema.json');

        $this->artisan('model:analyze', [
            'table' => 'users',
            '--format' => 'json',
            '--output' => $outputFile,
        ])
            ->assertSuccessful()
            ->expectsOutput("Analysis written to: {$outputFile}");

        $this->assertFileExists($outputFile);
        $schema = json_decode(file_get_contents($outputFile), true);
        $this->assertIsArray($schema);

        // Clean up
        unlink($outputFile);
    }

    public function testAnalyzeCommandWithRelationships(): void {
        $this->artisan('migrate:fresh');
        $this->artisan('db:seed');

        $this->artisan('model:analyze', [
            'table' => 'users',
            '--with-relationships' => true,
        ])
            ->assertSuccessful()
            ->expectsOutput('Relationships:')
            ->expectsOutput('  posts: hasMany -> Post');
    }

    public function testAnalyzeCommandWithIndexes(): void {
        $this->artisan('migrate:fresh');
        $this->artisan('db:seed');

        $this->artisan('model:analyze', [
            'table' => 'users',
            '--with-indexes' => true,
        ])
            ->assertSuccessful()
            ->expectsOutput('Indexes:')
            ->expectsOutput('  PRIMARY: PRIMARY KEY (id)');
    }

    public function testAnalyzeCommandWithForeignKeys(): void {
        $this->artisan('migrate:fresh');
        $this->artisan('db:seed');

        $this->artisan('model:analyze', [
            'table' => 'posts',
            '--with-foreign-keys' => true,
        ])
            ->assertSuccessful()
            ->expectsOutput('Foreign Keys:')
            ->expectsOutput('  posts_user_id_foreign: REFERENCES users (id)');
    }

    public function testAnalyzeCommandFailsForNonExistentTable(): void {
        $this->artisan('model:analyze', [
            'table' => 'non_existent_table',
        ])
            ->assertFailed()
            ->expectsOutput('Analysis failed: Table non_existent_table does not exist');
    }

    public function testAnalyzeCommandAnalyzesAllTables(): void {
        $this->artisan('migrate:fresh');
        $this->artisan('db:seed');

        $this->artisan('model:analyze')
            ->assertSuccessful()
            ->expectsOutput('Analyzing all tables...')
            ->expectsOutput('Analyzing users...')
            ->expectsOutput('Analyzing posts...')
            ->expectsOutput('Analyzing comments...');
    }
}