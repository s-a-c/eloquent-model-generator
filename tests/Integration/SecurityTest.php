<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests\Integration;

use Exception;
use Illuminate\Support\Facades\File;
use PHPUnit\Framework\Attributes\Test;
use SAC\EloquentModelGenerator\Contracts\ModelGeneratorInterface;
use SAC\EloquentModelGenerator\Exceptions\InvalidConfigurationException;
use SAC\EloquentModelGenerator\Tests\TestCase;

final class SecurityTest extends TestCase
{
    private string $outputPath;

    private ModelGeneratorInterface $generator;

    protected function setUp(): void
    {
        parent::setUp();

        $this->outputPath = $this->createTempDirectory();
        config(['model-generator.generation.path' => $this->outputPath]);

        $this->generator = $this->app->make(ModelGeneratorInterface::class);
    }

    protected function tearDown(): void
    {
        $this->cleanupTempDirectory($this->outputPath);
        parent::tearDown();
    }

    #[Test]
    public function it_validates_output_directory_permissions(): void
    {
        // Arrange
        chmod($this->outputPath, 0444); // Read-only

        // Assert
        $this->expectException(InvalidConfigurationException::class);
        $this->expectExceptionMessage('Directory is not writable');

        // Act
        $this->generator->generate(['users']);
    }

    #[Test]
    public function it_prevents_directory_traversal(): void
    {
        // Arrange
        $maliciousPath = '../../../etc/passwd';
        config(['model-generator.generation.path' => $maliciousPath]);

        // Assert
        $this->expectException(InvalidConfigurationException::class);

        // Act
        $this->generator->generate(['users']);
    }

    #[Test]
    public function it_validates_table_names(): void
    {
        // Arrange
        $maliciousTableNames = [
            '"; DROP TABLE users; --',
            '../../../etc/passwd',
            'users; DELETE FROM users; --',
            'table WITH RECURSIVE x AS (SELECT 1)',
        ];

        foreach ($maliciousTableNames as $tableName) {
            // Act & Assert
            try {
                $this->generator->generate([$tableName]);
                $this->fail('Expected exception was not thrown for table: '.$tableName);
            } catch (Exception $e) {
                $this->assertInstanceOf(InvalidConfigurationException::class, $e);
            }
        }
    }

    #[Test]
    public function it_validates_namespace(): void
    {
        // Arrange
        $maliciousNamespaces = [
            '../Namespace',
            'App\\..\\..\\System',
            'Namespace; system("rm -rf /"); //',
        ];

        foreach ($maliciousNamespaces as $namespace) {
            // Act & Assert
            try {
                config(['model-generator.generation.namespace' => $namespace]);
                $this->generator->generate(['users']);
                $this->fail('Expected exception was not thrown for namespace: '.$namespace);
            } catch (Exception $e) {
                $this->assertInstanceOf(InvalidConfigurationException::class, $e);
            }
        }
    }

    #[Test]
    public function it_validates_custom_traits(): void
    {
        // Arrange
        $maliciousTraits = [
            '../DangerousTrait',
            'App\\..\\..\\SystemTrait',
            'Trait; system("rm -rf /"); //',
        ];

        foreach ($maliciousTraits as $trait) {
            // Act & Assert
            try {
                config(['model-generator.generation.traits' => [$trait]]);
                $this->generator->generate(['users']);
                $this->fail('Expected exception was not thrown for trait: '.$trait);
            } catch (Exception $e) {
                $this->assertInstanceOf(InvalidConfigurationException::class, $e);
            }
        }
    }

    #[Test]
    public function it_validates_file_permissions(): void
    {
        // Arrange
        $this->createTestSchema();
        chmod($this->outputPath, 0777); // World-writable

        // Act
        $this->generator->generate(['users']);

        // Assert
        $modelFile = $this->outputPath.'/User.php';
        $this->assertFileExists($modelFile);
        $this->assertEquals('0644', mb_substr(sprintf('%o', fileperms($modelFile)), -4));
    }

    #[Test]
    public function it_prevents_code_injection(): void
    {
        // Arrange
        $this->schema()->create('malicious_table', function ($table) {
            $table->id();
            $table->string('name"; system("rm -rf /"); //');
            $table->string('email`, (SELECT password FROM users)); --');
            $table->timestamps();
        });

        // Act
        $result = $this->generator->generate(['malicious_table']);

        // Assert
        $modelFile = $this->outputPath.'/MaliciousTable.php';
        $this->assertFileExists($modelFile);

        $content = File::get($modelFile);
        $this->assertStringNotContainsString('system(', $content);
        $this->assertStringNotContainsString('SELECT', $content);
        $this->assertStringNotContainsString('password', $content);
    }

    #[Test]
    public function it_validates_environment_variables(): void
    {
        // Arrange
        $maliciousEnvVars = [
            'EMG_MODEL_NAMESPACE' => 'App\\$(rm -rf /)',
            'EMG_MODEL_PATH' => '/etc/passwd',
            'EMG_CUSTOM_CASTS' => '{"type": "system(\'rm -rf /\')"}',
        ];

        foreach ($maliciousEnvVars as $key => $value) {
            // Act & Assert
            try {
                $_ENV[$key] = $value;
                $this->generator->generate(['users']);
                $this->fail('Expected exception was not thrown for env var: '.$key);
            } catch (Exception $e) {
                $this->assertInstanceOf(InvalidConfigurationException::class, $e);
            }
        }
    }

    #[Test]
    public function it_sanitizes_model_output(): void
    {
        // Arrange
        $this->schema()->create('test_table', function ($table) {
            $table->id();
            $table->string('name');
            $table->text('description')->default('<?php system("rm -rf /"); ?>');
            $table->timestamps();
        });

        // Act
        $this->generator->generate(['test_table']);

        // Assert
        $modelFile = $this->outputPath.'/TestTable.php';
        $this->assertFileExists($modelFile);

        $content = File::get($modelFile);
        $this->assertStringNotContainsString('<?php', $content, 'Found unescaped PHP tag');
        $this->assertStringNotContainsString('system(', $content, 'Found system call');
    }

    private function createTestSchema(): void
    {
        $this->schema()->create('users', function ($table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamps();
        });
    }

    private function schema()
    {
        return $this->app['db']->connection()->getSchemaBuilder();
    }
}
