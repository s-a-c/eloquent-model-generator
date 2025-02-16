<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests\Feature\Commands;

use Illuminate\Support\Facades\Artisan;
use Orchestra\Testbench\TestCase;
use SAC\EloquentModelGenerator\Commands\MetricsCommand;
use SAC\EloquentModelGenerator\Contracts\{ModelGenerator, SchemaAnalyzer};

class MetricsCommandTest extends TestCase {
    protected function setUp(): void {
        parent::setUp();

        // Register the command
        $this->app->singleton(MetricsCommand::class, function ($app) {
            return new MetricsCommand(
                $app->make(ModelGenerator::class),
                $app->make(SchemaAnalyzer::class)
            );
        });

        $this->artisan('command:register', ['command' => 'model:metrics']);
    }

    protected function getPackageProviders($app): array {
        return [
            'SAC\EloquentModelGenerator\Providers\ModelGeneratorServiceProvider',
        ];
    }

    public function testMetricsCommandShowsModelMetrics(): void {
        // Create a test model
        $modelPath = $this->app->basePath('app/Models/User.php');
        $modelContent = <<<'PHP'
            <?php
            namespace App\Models;
            class User extends Model
            {
                protected $fillable = ['name', 'email'];

                public function posts()
                {
                    return $this->hasMany(Post::class);
                }

                public function profile()
                {
                    return $this->hasOne(Profile::class);
                }
            }
            PHP;

        mkdir(dirname($modelPath), 0777, true);
        file_put_contents($modelPath, $modelContent);

        $this->artisan('model:metrics', ['model' => 'User'])
            ->assertSuccessful()
            ->expectsOutput('Analyzing model: User')
            ->expectsOutput('attributes:')
            ->expectsOutput('  total_attributes: 2')
            ->expectsOutput('relationships:')
            ->expectsOutput('  total_relationships: 2')
            ->expectsOutput('  has_many: 1')
            ->expectsOutput('  has_one: 1');

        // Clean up
        unlink($modelPath);
        rmdir(dirname($modelPath));
    }

    public function testMetricsCommandWithJsonFormat(): void {
        $modelPath = $this->app->basePath('app/Models/User.php');
        $modelContent = <<<'PHP'
            <?php
            namespace App\Models;
            class User extends Model
            {
                protected $fillable = ['name', 'email'];
            }
            PHP;

        mkdir(dirname($modelPath), 0777, true);
        file_put_contents($modelPath, $modelContent);

        $result = $this->artisan('model:metrics', [
            'model' => 'User',
            '--format' => 'json',
        ]);

        $result->assertSuccessful();

        $output = $result->getOutput();
        $metrics = json_decode($output, true);
        $this->assertIsArray($metrics);
        $this->assertArrayHasKey('attributes', $metrics);
        $this->assertArrayHasKey('relationships', $metrics);

        // Clean up
        unlink($modelPath);
        rmdir(dirname($modelPath));
    }

    public function testMetricsCommandWithComplexityMetrics(): void {
        $modelPath = $this->app->basePath('app/Models/User.php');
        $modelContent = <<<'PHP'
            <?php
            namespace App\Models;
            class User extends Model
            {
                public function getFullNameAttribute()
                {
                    if ($this->middle_name) {
                        return "{$this->first_name} {$this->middle_name} {$this->last_name}";
                    }
                    return "{$this->first_name} {$this->last_name}";
                }

                public function scopeActive($query)
                {
                    return $query->where('status', 'active');
                }
            }
            PHP;

        mkdir(dirname($modelPath), 0777, true);
        file_put_contents($modelPath, $modelContent);

        $this->artisan('model:metrics', [
            'model' => 'User',
            '--with-complexity' => true,
        ])
            ->assertSuccessful()
            ->expectsOutput('complexity:')
            ->expectsOutput('  cyclomatic_complexity: 2')
            ->expectsOutput('  cognitive_complexity: 1')
            ->expectsOutput('  maintainability_index: ');

        // Clean up
        unlink($modelPath);
        rmdir(dirname($modelPath));
    }

    public function testMetricsCommandWithDependencyMetrics(): void {
        $modelPath = $this->app->basePath('app/Models/User.php');
        $modelContent = <<<'PHP'
            <?php
            namespace App\Models;
            use App\Services\UserService;
            use App\Notifications\Welcome;
            class User extends Model
            {
                public function register()
                {
                    app(UserService::class)->process($this);
                    $this->notify(new Welcome);
                }
            }
            PHP;

        mkdir(dirname($modelPath), 0777, true);
        file_put_contents($modelPath, $modelContent);

        $this->artisan('model:metrics', [
            'model' => 'User',
            '--with-dependencies' => true,
        ])
            ->assertSuccessful()
            ->expectsOutput('dependencies:')
            ->expectsOutput('  direct_dependencies: 2')
            ->expectsOutput('  dependency_depth: 1');

        // Clean up
        unlink($modelPath);
        rmdir(dirname($modelPath));
    }

    public function testMetricsCommandWithInheritanceMetrics(): void {
        $modelPath = $this->app->basePath('app/Models/User.php');
        $modelContent = <<<'PHP'
            <?php
            namespace App\Models;
            class User extends BaseUser
            {
                use HasApiTokens, Notifiable;

                protected static function boot()
                {
                    parent::boot();
                }
            }
            PHP;

        mkdir(dirname($modelPath), 0777, true);
        file_put_contents($modelPath, $modelContent);

        $this->artisan('model:metrics', [
            'model' => 'User',
            '--with-inheritance' => true,
        ])
            ->assertSuccessful()
            ->expectsOutput('inheritance:')
            ->expectsOutput('  inheritance_depth: 2')
            ->expectsOutput('  methods_inherited: ');

        // Clean up
        unlink($modelPath);
        rmdir(dirname($modelPath));
    }

    public function testMetricsCommandWithAllMetrics(): void {
        $modelPath = $this->app->basePath('app/Models/User.php');
        $modelContent = <<<'PHP'
            <?php
            namespace App\Models;
            class User extends Model
            {
                protected $fillable = ['name', 'email'];

                public function posts()
                {
                    return $this->hasMany(Post::class);
                }
            }
            PHP;

        mkdir(dirname($modelPath), 0777, true);
        file_put_contents($modelPath, $modelContent);

        $this->artisan('model:metrics', [
            'model' => 'User',
            '--with-all' => true,
        ])
            ->assertSuccessful()
            ->expectsOutput('attributes:')
            ->expectsOutput('relationships:')
            ->expectsOutput('complexity:')
            ->expectsOutput('dependencies:')
            ->expectsOutput('inheritance:');

        // Clean up
        unlink($modelPath);
        rmdir(dirname($modelPath));
    }

    public function testMetricsCommandFailsForNonExistentModel(): void {
        $this->artisan('model:metrics', [
            'model' => 'NonExistentModel',
        ])
            ->assertFailed()
            ->expectsOutput('Metrics collection failed: Model file not found');
    }
}