<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests\Unit\Services;

use PHPUnit\Framework\Attributes\Test;
use SAC\EloquentModelGenerator\Config\ModelGeneratorConfig;
use SAC\EloquentModelGenerator\Domain\Enums\RelationType;
use SAC\EloquentModelGenerator\Services\CodeGenerator;
use SAC\EloquentModelGenerator\Tests\TestCase;

final class CodeGeneratorTest extends TestCase
{
    private CodeGenerator $generator;

    private string $outputPath;

    protected function setUp(): void
    {
        parent::setUp();

        $this->outputPath = $this->createTempDirectory();

        $config = new ModelGeneratorConfig(
            databaseDriver: 'sqlite',
            databasePath: ':memory:',
            additional: [
                'namespace' => 'App\\Models',
                'path' => $this->outputPath,
                'base_class' => 'Illuminate\\Database\\Eloquent\\Model',
                'generate_phpdoc' => true,
                'generate_type_hints' => true,
            ],
        );

        $this->generator = new CodeGenerator($config);
    }

    protected function tearDown(): void
    {
        $this->cleanupTempDirectory($this->outputPath);

        parent::tearDown();
    }

    #[Test]
    public function it_generates_basic_model_file(): void
    {
        // Arrange
        $table = createTestTableDefinition('users', [
            createTestColumnDefinition('name', 'string'),
            createTestColumnDefinition('email', 'string'),
            createTestColumnDefinition('password', 'string'),
        ]);

        // Act
        $result = $this->generator->generateModel($table);

        // Assert
        expect($result)
            ->toBeValidGenerationResult()
            ->and($result->generatedFiles)->toHaveCount(1);

        $modelPath = $this->outputPath.'/User.php';
        $this->assertFileExists($modelPath);

        $content = file_get_contents($modelPath);
        $this->assertStringContainsString('namespace App\\Models;', $content);
        $this->assertStringContainsString('class User extends Model', $content);
        $this->assertStringContainsString('protected $fillable = [', $content);
        $this->assertStringContainsString("'name',", $content);
        $this->assertStringContainsString("'email',", $content);
        $this->assertStringContainsString('protected $hidden = [', $content);
        $this->assertStringContainsString("'password',", $content);
    }

    #[Test]
    public function it_generates_model_with_relationships(): void
    {
        // Arrange
        $table = createTestTableDefinition('posts', [
            createTestColumnDefinition('title', 'string'),
            createTestColumnDefinition('content', 'text'),
        ], [], [
            createTestRelationshipDefinition('user', RelationType::BelongsTo),
            createTestRelationshipDefinition('comments', RelationType::HasMany),
        ]);

        // Act
        $result = $this->generator->generateModel($table);

        // Assert
        $modelPath = $this->outputPath.'/Post.php';
        $content = file_get_contents($modelPath);

        $this->assertStringContainsString('use Illuminate\\Database\\Eloquent\\Relations\\BelongsTo;', $content);
        $this->assertStringContainsString('use Illuminate\\Database\\Eloquent\\Relations\\HasMany;', $content);
        $this->assertStringContainsString('public function user()', $content);
        $this->assertStringContainsString('public function comments()', $content);
    }

    #[Test]
    public function it_generates_model_with_soft_deletes(): void
    {
        // Arrange
        $table = createTestTableDefinition('products', [
            createTestColumnDefinition('name', 'string'),
            createTestColumnDefinition('deleted_at', 'datetime', true),
        ]);

        // Act
        $result = $this->generator->generateModel($table);

        // Assert
        $modelPath = $this->outputPath.'/Product.php';
        $content = file_get_contents($modelPath);

        $this->assertStringContainsString('use Illuminate\\Database\\Eloquent\\SoftDeletes;', $content);
        $this->assertStringContainsString('use SoftDeletes;', $content);
        $this->assertStringContainsString("protected \$dates = ['deleted_at'];", $content);
    }

    #[Test]
    public function it_generates_model_with_custom_primary_key(): void
    {
        // Arrange
        $table = createTestTableDefinition('tags', [
            createTestColumnDefinition('slug', 'string', false, true),
            createTestColumnDefinition('name', 'string'),
        ]);

        // Act
        $result = $this->generator->generateModel($table);

        // Assert
        $modelPath = $this->outputPath.'/Tag.php';
        $content = file_get_contents($modelPath);

        $this->assertStringContainsString("protected \$primaryKey = 'slug';", $content);
        $this->assertStringContainsString("protected \$keyType = 'string';", $content);
    }

    #[Test]
    public function it_generates_model_with_casts(): void
    {
        // Arrange
        $table = createTestTableDefinition('settings', [
            createTestColumnDefinition('key', 'string'),
            createTestColumnDefinition('value', 'json'),
            createTestColumnDefinition('is_enabled', 'boolean'),
            createTestColumnDefinition('expires_at', 'datetime'),
        ]);

        // Act
        $result = $this->generator->generateModel($table);

        // Assert
        $modelPath = $this->outputPath.'/Setting.php';
        $content = file_get_contents($modelPath);

        $this->assertStringContainsString('protected $casts = [', $content);
        $this->assertStringContainsString("'value' => 'array',", $content);
        $this->assertStringContainsString("'is_enabled' => 'boolean',", $content);
        $this->assertStringContainsString("'expires_at' => 'datetime',", $content);
    }

    #[Test]
    public function it_generates_model_documentation(): void
    {
        // Arrange
        $table = createTestTableDefinition('users', [
            createTestColumnDefinition('name', 'string'),
            createTestColumnDefinition('email', 'string'),
        ], [], [
            createTestRelationshipDefinition('posts', RelationType::HasMany),
        ]);

        // Act
        $result = $this->generator->generateDocumentation($table);

        // Assert
        expect($result)
            ->toBeValidGenerationResult()
            ->and($result->generatedFiles)->toHaveCount(1);

        $docPath = $this->outputPath.'/User.md';
        $content = file_get_contents($docPath);

        $this->assertStringContainsString('# User', $content);
        $this->assertStringContainsString('## Properties', $content);
        $this->assertStringContainsString('| name | string |', $content);
        $this->assertStringContainsString('| email | string |', $content);
        $this->assertStringContainsString('## Relationships', $content);
        $this->assertStringContainsString('### posts', $content);
        $this->assertStringContainsString('Type: HasMany', $content);
    }

    #[Test]
    public function it_generates_model_factory(): void
    {
        // Arrange
        $table = createTestTableDefinition('users', [
            createTestColumnDefinition('name', 'string'),
            createTestColumnDefinition('email', 'string'),
            createTestColumnDefinition('age', 'integer'),
            createTestColumnDefinition('is_active', 'boolean'),
        ]);

        // Act
        $factoryDefinition = $this->generator->generateFactoryDefinition($table);

        // Assert
        $this->assertStringContainsString('namespace Database\\Factories;', $factoryDefinition);
        $this->assertStringContainsString('class UserFactory extends Factory', $factoryDefinition);
        $this->assertStringContainsString('protected $model = User::class;', $factoryDefinition);
        $this->assertStringContainsString('public function definition(): array', $factoryDefinition);
        $this->assertStringContainsString("'name' => \$this->faker->name,", $factoryDefinition);
        $this->assertStringContainsString("'email' => \$this->faker->email,", $factoryDefinition);
        $this->assertStringContainsString("'age' => \$this->faker->randomNumber,", $factoryDefinition);
        $this->assertStringContainsString("'is_active' => \$this->faker->boolean,", $factoryDefinition);
    }

    #[Test]
    public function it_generates_validation_rules(): void
    {
        // Arrange
        $table = createTestTableDefinition('users', [
            createTestColumnDefinition('name', 'string', false),
            createTestColumnDefinition('email', 'string', false, true),
            createTestColumnDefinition('age', 'integer', true),
        ]);

        // Act
        $rules = $this->generator->generateValidationRules($table);

        // Assert
        expect($rules)
            ->toHaveKey('name')
            ->toHaveKey('email')
            ->toHaveKey('age')
            ->and($rules['name'])->toContain('required')
            ->and($rules['email'])->toContain('required')
            ->and($rules['email'])->toContain('unique')
            ->and($rules['age'])->not->toContain('required');
    }
}
