<?php

namespace SAC\EloquentModelGenerator\Tests\Unit\Support\Traits;

use Illuminate\Support\Facades\File;
use InvalidArgumentException;
use SAC\EloquentModelGenerator\Tests\Support\Traits\WithTestData;
use SAC\EloquentModelGenerator\Tests\TestCase;

class WithTestDataTest extends TestCase
{
    use WithTestData;

    protected function setUp(): void
    {
        parent::setUp();
        $this->initializeTestData();

        // Create test datasets directory if it doesn't exist
        if (! File::exists($this->getTestDataPath(''))) {
            File::makeDirectory($this->getTestDataPath(''), 0755, true);
        }
    }

    /** @test */
    public function testucreates_and_loads_fixtures(): void
    {
        $data = ['test' => 'data'];
        $path = $this->createFixture('test', $data);

        $this->assertTrue(File::exists($path));
        $this->assertEquals($data, $this->loadFixture('test'));
    }

    /** @test */
    public function testucreates_schema_fixtures(): void
    {
        $columns = ['id' => ['type' => 'integer']];
        $indexes = ['primary' => ['type' => 'primary', 'columns' => ['id']]];
        $relations = ['posts' => ['type' => 'hasMany']];

        $path = $this->createSchemaFixture('test_schema', $columns, $indexes, $relations);
        $fixture = $this->loadFixture('test_schema');

        $this->assertTrue(File::exists($path));
        $this->assertEquals($columns, $fixture['columns']);
        $this->assertEquals($indexes, $fixture['indexes']);
        $this->assertEquals($relations, $fixture['relations']);
    }

    /** @test */
    public function testucreates_model_fixtures(): void
    {
        $path = $this->createModelFixture(
            'User',
            'App\\Models',
            'users',
            ['fillable' => ['name', 'email']]
        );
        $fixture = $this->loadFixture('User');

        $this->assertTrue(File::exists($path));
        $this->assertEquals('User', $fixture['className']);
        $this->assertEquals('App\\Models', $fixture['namespace']);
        $this->assertEquals('users', $fixture['tableName']);
        $this->assertEquals(['fillable' => ['name', 'email']], $fixture['attributes']);
    }

    /** @test */
    public function testuthrows_exception_for_missing_fixture(): void
    {
        $this->expectException(\RuntimeException::class);
        $this->loadFixture('non_existent');
    }

    /** @test */
    public function testucreates_fixtures_directory(): void
    {
        File::deleteDirectory($this->fixturesPath);
        $this->createFixturesDirectory();
        $this->assertTrue(File::isDirectory($this->fixturesPath));
    }

    /** @test */
    public function testucleans_up_fixtures(): void
    {
        $this->createFixture('test', ['data' => 'test']);
        $this->cleanupTestData();
        $this->assertFalse(File::exists($this->fixturesPath));
    }

    protected function tearDown(): void
    {
        $this->cleanupTestData();

        // Clean up test files
        collect(['test.json', 'test.yml', 'test.yaml'])
            ->each(fn ($file) => File::delete($this->getTestDataPath($file)));

        parent::tearDown();
    }

    public function test_can_load_json_test_data(): void
    {
        $testData = [
            'name' => 'Test Model',
            'attributes' => ['id', 'name', 'email'],
            'relationships' => [
                'hasMany' => ['posts', 'comments'],
            ],
        ];

        File::put(
            $this->getTestDataPath('test.json'),
            json_encode($testData, JSON_PRETTY_PRINT)
        );

        $loadedData = $this->loadJsonTestData('test.json');
        expect($loadedData)->toBe($testData);

        $specificData = $this->loadJsonTestData('test.json', 'relationships.hasMany');
        expect($specificData)->toBe(['posts', 'comments']);
    }

    public function test_can_load_yaml_test_data(): void
    {
        $yamlContent = <<<'YAML'
name: Test Model
attributes:
  - id
  - name
  - email
relationships:
  hasMany:
    - posts
    - comments
YAML;

        File::put($this->getTestDataPath('test.yml'), $yamlContent);

        $loadedData = $this->loadYamlTestData('test.yml');
        expect($loadedData)->toBe([
            'name' => 'Test Model',
            'attributes' => ['id', 'name', 'email'],
            'relationships' => [
                'hasMany' => ['posts', 'comments'],
            ],
        ]);

        $specificData = $this->loadYamlTestData('test.yml', 'relationships.hasMany');
        expect($specificData)->toBe(['posts', 'comments']);
    }

    public function test_can_load_test_data_automatically_detects_format(): void
    {
        // Test JSON
        $jsonData = ['test' => 'data'];
        File::put(
            $this->getTestDataPath('test.json'),
            json_encode($jsonData)
        );
        expect($this->loadTestData('test.json'))->toBe($jsonData);

        // Test YAML
        $yamlData = ['test' => 'data'];
        File::put(
            $this->getTestDataPath('test.yml'),
            "test: data\n"
        );
        expect($this->loadTestData('test.yml'))->toBe($yamlData);
    }

    public function test_throws_exception_for_invalid_json(): void
    {
        File::put($this->getTestDataPath('test.json'), '{invalid:json}');

        expect(fn () => $this->loadJsonTestData('test.json'))
            ->toThrow(InvalidArgumentException::class, 'Invalid JSON in test data file');
    }

    public function test_throws_exception_for_invalid_yaml(): void
    {
        File::put($this->getTestDataPath('test.yml'), "test: [\ninvalid: yaml");

        expect(fn () => $this->loadYamlTestData('test.yml'))
            ->toThrow(InvalidArgumentException::class, 'Invalid YAML in test data file');
    }

    public function test_throws_exception_for_missing_file(): void
    {
        expect(fn () => $this->loadTestData('missing.json'))
            ->toThrow(InvalidArgumentException::class, 'Test data file not found');
    }

    public function test_throws_exception_for_unsupported_extension(): void
    {
        expect(fn () => $this->loadTestData('test.txt'))
            ->toThrow(InvalidArgumentException::class, 'Unsupported file extension');
    }
}
