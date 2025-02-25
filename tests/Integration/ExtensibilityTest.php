<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests\Integration;

use Illuminate\Support\Facades\File;
use PHPUnit\Framework\Attributes\Test;
use SAC\EloquentModelGenerator\Contracts\ModelGeneratorInterface;
use SAC\EloquentModelGenerator\Tests\TestCase;

final class ExtensibilityTest extends TestCase
{
    private string $outputPath;

    private string $stubsPath;

    private ModelGeneratorInterface $generator;

    protected function setUp(): void
    {
        parent::setUp();

        $this->outputPath = $this->createTempDirectory();
        $this->stubsPath = $this->createTempDirectory();

        config([
            'model-generator.generation.path' => $this->outputPath,
            'model-generator.generation.stubs_path' => $this->stubsPath,
        ]);

        $this->generator = $this->app->make(ModelGeneratorInterface::class);
        $this->createTestSchema();
    }

    protected function tearDown(): void
    {
        $this->cleanupTempDirectory($this->outputPath);
        $this->cleanupTempDirectory($this->stubsPath);
        parent::tearDown();
    }

    #[Test]
    public function it_supports_custom_model_templates(): void
    {
        // Arrange
        $template = <<<'STUB'
<?php

namespace {{ namespace }};

use {{ baseClass }};

/**
 * @custom-annotation
 */
class {{ className }} extends {{ baseClassName }}
{
    {{ properties }}

    {{ relationships }}

    {{ methods }}
}
STUB;

        File::put($this->stubsPath.'/model.stub', $template);

        // Act
        $result = $this->generator->generate(['users']);

        // Assert
        $model = File::get($this->outputPath.'/User.php');
        $this->assertStringContainsString('@custom-annotation', $model);
    }

    #[Test]
    public function it_supports_custom_casts(): void
    {
        // Arrange
        File::put($this->stubsPath.'/point-cast.php', <<<'PHP'
<?php
namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class PointCast implements CastsAttributes
{
    public function get($model, $key, $value, $attributes)
    {
        return json_decode($value, true);
    }

    public function set($model, $key, $value, $attributes)
    {
        return json_encode($value);
    }
}
PHP);

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
        $result = $this->generator->generate(['locations']);

        // Assert
        $model = File::get($this->outputPath.'/Location.php');
        $this->assertStringContainsString('use App\\Casts\\PointCast;', $model);
        $this->assertStringContainsString('\'coordinates\' => PointCast::class,', $model);
    }

    #[Test]
    public function it_supports_custom_relationship_types(): void
    {
        // Arrange
        File::put($this->stubsPath.'/custom-relationship.stub', <<<'STUB'
    public function {{ methodName }}()
    {
        return $this->customRelationship({{ relatedModel }}::class);
    }
STUB);

        config([
            'model-generator.relationships.custom_types' => [
                'CustomRelation' => [
                    'template' => 'custom-relationship.stub',
                    'trait' => 'App\\Traits\\HasCustomRelations',
                ],
            ],
        ]);

        // Act
        $result = $this->generator->generate(['users']);

        // Assert
        $model = File::get($this->outputPath.'/User.php');
        $this->assertStringContainsString('use App\\Traits\\HasCustomRelations;', $model);
        $this->assertStringContainsString('customRelationship(', $model);
    }

    #[Test]
    public function it_supports_custom_attribute_mutators(): void
    {
        // Arrange
        config([
            'model-generator.type_mappings.custom_mutators' => [
                'encrypted' => [
                    'get' => 'decrypt',
                    'set' => 'encrypt',
                ],
            ],
        ]);

        $this->schema()->create('secrets', function ($table) {
            $table->id();
            $table->text('encrypted_data');
            $table->timestamps();
        });

        // Act
        $result = $this->generator->generate(['secrets']);

        // Assert
        $model = File::get($this->outputPath.'/Secret.php');
        $this->assertStringContainsString('public function getEncryptedDataAttribute', $model);
        $this->assertStringContainsString('public function setEncryptedDataAttribute', $model);
    }

    #[Test]
    public function it_supports_custom_validation_rules(): void
    {
        // Arrange
        config([
            'model-generator.validation.custom_rules' => [
                'coordinates' => 'required|json|valid_coordinates',
            ],
        ]);

        // Act
        $result = $this->generator->generate(['locations']);

        // Assert
        $model = File::get($this->outputPath.'/Location.php');
        $this->assertStringContainsString('\'coordinates\' => \'required|json|valid_coordinates\',', $model);
    }

    #[Test]
    public function it_supports_custom_documentation_templates(): void
    {
        // Arrange
        File::put($this->stubsPath.'/model-doc.stub', <<<'STUB'
# {{ className }}

## Custom Documentation

{{ properties }}

## Custom Relationships

{{ relationships }}
STUB);

        // Act
        $result = $this->generator->generate(
            ['users'],
            ['with_docs' => true]
        );

        // Assert
        $docs = File::get($this->outputPath.'/User.md');
        $this->assertStringContainsString('Custom Documentation', $docs);
        $this->assertStringContainsString('Custom Relationships', $docs);
    }

    #[Test]
    public function it_supports_custom_type_mappings(): void
    {
        // Arrange
        config([
            'model-generator.type_mappings.database_types' => [
                'custom_type' => 'string',
            ],
        ]);

        $this->schema()->create('custom_types', function ($table) {
            $table->id();
            $table->addColumn('custom_type', 'field');
            $table->timestamps();
        });

        // Act
        $result = $this->generator->generate(['custom_types']);

        // Assert
        $model = File::get($this->outputPath.'/CustomType.php');
        $this->assertStringContainsString('@property string $field', $model);
    }

    #[Test]
    public function it_supports_custom_model_traits(): void
    {
        // Arrange
        File::put($this->stubsPath.'/custom-trait.php', <<<'PHP'
<?php
namespace App\Traits;

trait CustomTrait
{
    public function customMethod()
    {
        return 'custom';
    }
}
PHP);

        config([
            'model-generator.generation.traits' => [
                'App\\Traits\\CustomTrait',
            ],
        ]);

        // Act
        $result = $this->generator->generate(['users']);

        // Assert
        $model = File::get($this->outputPath.'/User.php');
        $this->assertStringContainsString('use App\\Traits\\CustomTrait;', $model);
        $this->assertStringContainsString('use CustomTrait;', $model);
    }

    #[Test]
    public function it_supports_custom_model_interfaces(): void
    {
        // Arrange
        config([
            'model-generator.generation.interfaces' => [
                'App\\Contracts\\CustomInterface',
            ],
        ]);

        // Act
        $result = $this->generator->generate(['users']);

        // Assert
        $model = File::get($this->outputPath.'/User.php');
        $this->assertStringContainsString('implements CustomInterface', $model);
    }

    private function createTestSchema(): void
    {
        $this->schema()->create('users', function ($table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamps();
        });

        $this->schema()->create('locations', function ($table) {
            $table->id();
            $table->string('name');
            $table->point('coordinates');
            $table->timestamps();
        });
    }

    private function schema()
    {
        return $this->app['db']->connection()->getSchemaBuilder();
    }
}
