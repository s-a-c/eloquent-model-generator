<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests\Integration;

use Illuminate\Support\Facades\File;
use PHPUnit\Framework\Attributes\Test;
use SAC\EloquentModelGenerator\Contracts\ModelGeneratorInterface;
use SAC\EloquentModelGenerator\Tests\TestCase;

final class DocumentationGenerationTest extends TestCase
{
    private string $outputPath;

    private string $docsPath;

    private ModelGeneratorInterface $generator;

    protected function setUp(): void
    {
        parent::setUp();

        $this->outputPath = $this->createTempDirectory();
        $this->docsPath = $this->createTempDirectory();

        config([
            'model-generator.generation.path' => $this->outputPath,
            'model-generator.documentation.output_path' => $this->docsPath,
            'model-generator.documentation.format' => 'markdown',
            'model-generator.documentation.generate_diagrams' => true,
        ]);

        $this->generator = $this->app->make(ModelGeneratorInterface::class);
        $this->createTestSchema();
    }

    protected function tearDown(): void
    {
        $this->cleanupTempDirectory($this->outputPath);
        $this->cleanupTempDirectory($this->docsPath);
        parent::tearDown();
    }

    #[Test]
    public function it_generates_model_documentation(): void
    {
        // Act
        $result = $this->generator->generate(
            ['users', 'posts', 'comments'],
            ['with_docs' => true]
        );

        // Assert
        expect($result->generatedFiles)->toContain($this->docsPath.'/User.md')
            ->and($result->generatedFiles)->toContain($this->docsPath.'/Post.md')
            ->and($result->generatedFiles)->toContain($this->docsPath.'/Comment.md');

        // Check documentation content
        $userDocs = File::get($this->docsPath.'/User.md');
        $this->assertStringContainsString('# User', $userDocs);
        $this->assertStringContainsString('## Properties', $userDocs);
        $this->assertStringContainsString('| name | string |', $userDocs);
        $this->assertStringContainsString('## Relationships', $userDocs);
        $this->assertStringContainsString('### posts', $userDocs);
    }

    #[Test]
    public function it_generates_erd_diagram(): void
    {
        // Act
        $result = $this->generator->generate(
            ['users', 'posts'],
            ['with_docs' => true]
        );

        // Assert
        $this->assertFileExists($this->docsPath.'/erd.md');

        $erd = File::get($this->docsPath.'/erd.md');
        $this->assertStringContainsString('```mermaid', $erd);
        $this->assertStringContainsString('erDiagram', $erd);
        $this->assertStringContainsString('users ||--o{ posts', $erd);
    }

    #[Test]
    public function it_generates_api_documentation(): void
    {
        // Act
        $result = $this->generator->generate(
            ['users'],
            ['with_docs' => true]
        );

        // Assert
        $apiDocs = File::get($this->docsPath.'/User.md');

        // Check method documentation
        $this->assertStringContainsString('### posts()', $apiDocs);
        $this->assertStringContainsString('- Type: HasMany', $apiDocs);
        $this->assertStringContainsString('- Related Model: Post', $apiDocs);

        // Check property documentation
        $this->assertStringContainsString('@property string $name', $apiDocs);
        $this->assertStringContainsString('@property string $email', $apiDocs);
    }

    #[Test]
    public function it_generates_overview_documentation(): void
    {
        // Act
        $result = $this->generator->generate(
            ['users', 'posts', 'comments'],
            ['with_docs' => true]
        );

        // Assert
        $this->assertFileExists($this->docsPath.'/README.md');

        $overview = File::get($this->docsPath.'/README.md');
        $this->assertStringContainsString('# Models Overview', $overview);
        $this->assertStringContainsString('- [User](#users)', $overview);
        $this->assertStringContainsString('- [Post](#posts)', $overview);
        $this->assertStringContainsString('- [Comment](#comments)', $overview);
    }

    #[Test]
    public function it_documents_polymorphic_relationships(): void
    {
        // Act
        $result = $this->generator->generate(
            ['comments'],
            ['with_docs' => true]
        );

        // Assert
        $commentDocs = File::get($this->docsPath.'/Comment.md');

        $this->assertStringContainsString('### commentable()', $commentDocs);
        $this->assertStringContainsString('- Type: MorphTo', $commentDocs);
        $this->assertStringContainsString('Polymorphic Relationship', $commentDocs);
    }

    #[Test]
    public function it_documents_validation_rules(): void
    {
        // Act
        $result = $this->generator->generate(
            ['users'],
            ['with_docs' => true]
        );

        // Assert
        $userDocs = File::get($this->docsPath.'/User.md');

        $this->assertStringContainsString('## Validation Rules', $userDocs);
        $this->assertStringContainsString('- name: required|string', $userDocs);
        $this->assertStringContainsString('- email: required|string|unique:users', $userDocs);
    }

    #[Test]
    public function it_documents_custom_attributes(): void
    {
        // Arrange
        config([
            'model-generator.type_mappings.custom_casts' => [
                'point' => 'App\\Casts\\PointCast',
            ],
        ]);

        $this->schema()->create('locations', function ($table) {
            $table->id();
            $table->string('name');
            $table->point('coordinates');
            $table->timestamps();
        });

        // Act
        $result = $this->generator->generate(
            ['locations'],
            ['with_docs' => true]
        );

        // Assert
        $locationDocs = File::get($this->docsPath.'/Location.md');

        $this->assertStringContainsString('## Custom Attributes', $locationDocs);
        $this->assertStringContainsString('coordinates: App\\Casts\\PointCast', $locationDocs);
    }

    #[Test]
    public function it_generates_sequence_diagrams(): void
    {
        // Act
        $result = $this->generator->generate(
            ['users', 'posts'],
            ['with_docs' => true]
        );

        // Assert
        $this->assertFileExists($this->docsPath.'/sequences.md');

        $sequences = File::get($this->docsPath.'/sequences.md');
        $this->assertStringContainsString('```mermaid', $sequences);
        $this->assertStringContainsString('sequenceDiagram', $sequences);
        $this->assertStringContainsString('User->>Post:', $sequences);
    }

    #[Test]
    public function it_generates_example_usage(): void
    {
        // Act
        $result = $this->generator->generate(
            ['users'],
            ['with_docs' => true]
        );

        // Assert
        $userDocs = File::get($this->docsPath.'/User.md');

        $this->assertStringContainsString('## Example Usage', $userDocs);
        $this->assertStringContainsString('```php', $userDocs);
        $this->assertStringContainsString('$user = User::create([', $userDocs);
        $this->assertStringContainsString('$user->posts()->create([', $userDocs);
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
