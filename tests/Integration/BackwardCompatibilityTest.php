<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests\Integration;

use Illuminate\Support\Facades\File;
use PHPUnit\Framework\Attributes\Test;
use SAC\EloquentModelGenerator\Contracts\ModelGeneratorInterface;
use SAC\EloquentModelGenerator\Tests\TestCase;

final class BackwardCompatibilityTest extends TestCase
{
    private string $outputPath;

    private ModelGeneratorInterface $generator;

    protected function setUp(): void
    {
        parent::setUp();

        $this->outputPath = $this->createTempDirectory();
        config(['model-generator.generation.path' => $this->outputPath]);

        $this->generator = $this->app->make(ModelGeneratorInterface::class);
        $this->createTestSchema();
    }

    protected function tearDown(): void
    {
        $this->cleanupTempDirectory($this->outputPath);
        parent::tearDown();
    }

    #[Test]
    public function it_supports_legacy_relationship_methods(): void
    {
        // Act
        $result = $this->generator->generate(['users', 'posts']);

        // Assert
        $userModel = File::get($this->outputPath.'/User.php');

        // Check for both new and legacy relationship method calls
        $this->assertStringContainsString('return $this->hasMany(', $userModel);
        $this->assertStringContainsString('return $this->belongsTo(', $userModel);
    }

    #[Test]
    public function it_supports_legacy_model_traits(): void
    {
        // Arrange
        config([
            'model-generator.generation.traits' => [
                'Illuminate\\Database\\Eloquent\\SoftDeletes',
            ],
        ]);

        // Act
        $result = $this->generator->generate(['users']);

        // Assert
        $userModel = File::get($this->outputPath.'/User.php');
        $this->assertStringContainsString('use Illuminate\\Database\\Eloquent\\SoftDeletes;', $userModel);
        $this->assertStringContainsString('use SoftDeletes;', $userModel);
    }

    #[Test]
    public function it_supports_legacy_database_types(): void
    {
        // Arrange
        $this->schema()->create('legacy_table', function ($table) {
            $table->increments('id'); // Legacy auto-increment
            $table->string('name', 255); // Legacy string length
            $table->text('description')->nullable();
            $table->timestamp('created_at'); // Single timestamp
            $table->integer('status')->default(0); // Legacy integer
        });

        // Act
        $result = $this->generator->generate(['legacy_table']);

        // Assert
        $model = File::get($this->outputPath.'/LegacyTable.php');
        $this->assertStringContainsString('protected $primaryKey = \'id\';', $model);
        $this->assertStringContainsString('protected $casts = [', $model);
        $this->assertStringContainsString('\'status\' => \'integer\',', $model);
    }

    #[Test]
    public function it_supports_legacy_model_configuration(): void
    {
        // Act
        $result = $this->generator->generate(['users']);

        // Assert
        $userModel = File::get($this->outputPath.'/User.php');

        // Check for legacy configuration options
        $this->assertStringContainsString('protected $fillable = [', $userModel);
        $this->assertStringContainsString('protected $guarded = [', $userModel);
        $this->assertStringContainsString('protected $hidden = [', $userModel);
    }

    #[Test]
    public function it_supports_legacy_timestamps(): void
    {
        // Arrange
        $this->schema()->create('legacy_timestamps', function ($table) {
            $table->id();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });

        // Act
        $result = $this->generator->generate(['legacy_timestamps']);

        // Assert
        $model = File::get($this->outputPath.'/LegacyTimestamp.php');
        $this->assertStringContainsString('public $timestamps = true;', $model);
        $this->assertStringContainsString('const CREATED_AT = \'created_at\';', $model);
        $this->assertStringContainsString('const UPDATED_AT = \'updated_at\';', $model);
    }

    #[Test]
    public function it_supports_legacy_soft_deletes(): void
    {
        // Arrange
        $this->schema()->create('soft_deletes', function ($table) {
            $table->id();
            $table->string('name');
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });

        // Act
        $result = $this->generator->generate(['soft_deletes']);

        // Assert
        $model = File::get($this->outputPath.'/SoftDelete.php');
        $this->assertStringContainsString('use Illuminate\\Database\\Eloquent\\SoftDeletes;', $model);
        $this->assertStringContainsString('use SoftDeletes;', $model);
        $this->assertStringContainsString('protected $dates = [\'deleted_at\'];', $model);
    }

    #[Test]
    public function it_supports_legacy_relationships(): void
    {
        // Arrange
        $this->schema()->create('polymorphic_legacy', function ($table) {
            $table->id();
            $table->integer('imageable_id');
            $table->string('imageable_type');
            $table->timestamps();
        });

        // Act
        $result = $this->generator->generate(['polymorphic_legacy']);

        // Assert
        $model = File::get($this->outputPath.'/PolymorphicLegacy.php');
        $this->assertStringContainsString('return $this->morphTo();', $model);
    }

    #[Test]
    public function it_supports_legacy_validation_rules(): void
    {
        // Act
        $result = $this->generator->generate(['users']);

        // Assert
        $userModel = File::get($this->outputPath.'/User.php');

        // Check for legacy validation rule format
        $this->assertStringContainsString('public static $rules = [', $userModel);
        $this->assertStringContainsString('\'email\' => \'required|email|unique:users\',', $userModel);
    }

    #[Test]
    public function it_supports_legacy_event_handling(): void
    {
        // Act
        $result = $this->generator->generate(['users']);

        // Assert
        $userModel = File::get($this->outputPath.'/User.php');

        // Check for legacy event handling methods
        $this->assertStringContainsString('protected static function boot()', $userModel);
        $this->assertStringContainsString('parent::boot();', $userModel);
    }

    #[Test]
    public function it_supports_legacy_query_scopes(): void
    {
        // Act
        $result = $this->generator->generate(['users']);

        // Assert
        $userModel = File::get($this->outputPath.'/User.php');

        // Check for legacy query scope format
        $this->assertStringContainsString('public function scopeActive($query)', $userModel);
    }

    private function createTestSchema(): void
    {
        // Create users table
        $this->schema()->create('users', function ($table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->boolean('active')->default(true);
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
    }

    private function schema()
    {
        return $this->app['db']->connection()->getSchemaBuilder();
    }
}
