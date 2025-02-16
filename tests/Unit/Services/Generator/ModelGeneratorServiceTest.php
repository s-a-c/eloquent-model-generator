<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests\Unit\Services\Generator;

use Illuminate\Support\Collection;
use Mockery;
use Mockery\MockInterface;
use PHPUnit\Framework\TestCase;
use SAC\EloquentModelGenerator\Contracts\{
    RelationDetector,
    SchemaAnalyzer,
    TypeInference
};
use SAC\EloquentModelGenerator\Services\Generator\ModelGeneratorService;
use SAC\EloquentModelGenerator\Support\Definitions\{ModelDefinition, RelationDefinition};
use SAC\EloquentModelGenerator\ValueObjects\{Column, ForeignKey};

class ModelGeneratorServiceTest extends TestCase {
    private ModelGeneratorService $generator;
    private MockInterface&SchemaAnalyzer $schemaAnalyzer;
    private MockInterface&TypeInference $typeInference;
    private MockInterface&RelationDetector $relationDetector;

    protected function setUp(): void {
        parent::setUp();

        $this->schemaAnalyzer = Mockery::mock(SchemaAnalyzer::class);
        $this->typeInference = Mockery::mock(TypeInference::class);
        $this->relationDetector = Mockery::mock(RelationDetector::class);

        $this->generator = new ModelGeneratorService(
            $this->schemaAnalyzer,
            $this->typeInference,
            $this->relationDetector,
            'App\\Models'
        );
    }

    protected function tearDown(): void {
        Mockery::close();
        parent::tearDown();
    }

    public function testGenerateCreatesExpectedModel(): void {
        $this->schemaAnalyzer->shouldReceive('analyze')
            ->with('users')
            ->andReturn([
                'columns' => [
                    'id' => [
                        'type' => 'integer',
                        'nullable' => false,
                        'primary' => true,
                        'unique' => true,
                    ],
                    'name' => [
                        'type' => 'string',
                        'nullable' => false,
                    ],
                ],
                'relationships' => [
                    [
                        'type' => 'hasMany',
                        'name' => 'posts',
                        'model' => 'Post',
                        'foreignKey' => 'user_id',
                        'localKey' => 'id',
                    ],
                ],
            ]);

        $this->typeInference->shouldReceive('inferDocblockType')
            ->andReturn('int', 'string');

        $result = $this->generator->generate('users');

        $this->assertIsString($result);
        $this->assertStringContainsString('namespace App\\Models;', $result);
        $this->assertStringContainsString('class User extends Model', $result);
        $this->assertStringContainsString('@property int $id', $result);
        $this->assertStringContainsString('@property string $name', $result);
        $this->assertStringContainsString('protected $table = \'users\';', $result);
        $this->assertStringContainsString('public function posts()', $result);
        $this->assertStringContainsString('return $this->hasMany(Post::class, \'user_id\', \'id\');', $result);
    }

    public function testGenerateBatchCreatesExpectedModels(): void {
        $this->schemaAnalyzer->shouldReceive('analyze')
            ->with('users')
            ->andReturn([
                'columns' => [
                    'id' => [
                        'type' => 'integer',
                        'nullable' => false,
                        'primary' => true,
                        'unique' => true,
                    ],
                ],
                'relationships' => [],
            ]);

        $this->schemaAnalyzer->shouldReceive('analyze')
            ->with('posts')
            ->andReturn([
                'columns' => [
                    'id' => [
                        'type' => 'integer',
                        'nullable' => false,
                        'primary' => true,
                        'unique' => true,
                    ],
                ],
                'relationships' => [],
            ]);

        $this->typeInference->shouldReceive('inferDocblockType')
            ->andReturn('int');

        $results = $this->generator->generateBatch(['users', 'posts']);

        $this->assertCount(2, $results);
        $this->assertArrayHasKey('users', $results);
        $this->assertArrayHasKey('posts', $results);
        $this->assertStringContainsString('class User extends Model', $results['users']);
        $this->assertStringContainsString('class Post extends Model', $results['posts']);
    }

    public function testModelExistsReturnsTrueForExistingModel(): void {
        $table = 'users';
        $modelPath = 'App/Models/User.php';

        // Create a temporary file
        file_put_contents($modelPath, '<?php');

        $this->assertTrue($this->generator->modelExists($table));

        // Clean up
        unlink($modelPath);
    }

    public function testModelExistsReturnsFalseForNonExistentModel(): void {
        $this->assertFalse($this->generator->modelExists('non_existent_table'));
    }

    public function testAnalyzeFixesReturnsExpectedFixes(): void {
        $model = 'User';
        $fixTypes = ['types', 'relations'];

        $expectedFixes = [
            [
                'type' => 'type',
                'description' => 'Add type hint for $name property',
                'file' => 'App/Models/User.php',
                'line' => 10,
                'current' => 'private $name;',
                'suggested' => 'private string $name;',
            ],
        ];

        $this->schemaAnalyzer->shouldReceive('analyze')
            ->with('users')
            ->andReturn([
                'columns' => [
                    'name' => [
                        'type' => 'string',
                        'nullable' => false,
                    ],
                ],
            ]);

        $fixes = $this->generator->analyzeFixes($model, $fixTypes);

        $this->assertEquals($expectedFixes, $fixes);
    }

    public function testApplyFixUpdatesModelCorrectly(): void {
        $model = 'User';
        $fix = [
            'type' => 'type',
            'description' => 'Add type hint for $name property',
            'file' => 'App/Models/User.php',
            'line' => 10,
            'current' => 'private $name;',
            'suggested' => 'private string $name;',
        ];

        $modelPath = 'App/Models/User.php';
        file_put_contents($modelPath, "<?php\nclass User {\n    private \$name;\n}");

        $this->generator->applyFix($model, $fix);

        $content = file_get_contents($modelPath);
        $this->assertStringContainsString('private string $name;', $content);

        // Clean up
        unlink($modelPath);
    }
}