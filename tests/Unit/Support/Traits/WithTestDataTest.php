<?php

namespace SAC\EloquentModelGenerator\Tests\Unit\Support\Traits;

use SAC\EloquentModelGenerator\Tests\TestCase;
use SAC\EloquentModelGenerator\Tests\Support\Traits\WithTestData;
use Illuminate\Support\Facades\File;

class WithTestDataTest extends TestCase {
    use WithTestData;

    protected function setUp(): void {
        parent::setUp();
        $this->initializeTestData();
    }

    /** @test */
    public function it_creates_and_loads_fixtures(): void {
        $data = ['test' => 'data'];
        $path = $this->createFixture('test', $data);

        $this->assertTrue(File::exists($path));
        $this->assertEquals($data, $this->loadFixture('test'));
    }

    /** @test */
    public function it_creates_schema_fixtures(): void {
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
    public function it_creates_model_fixtures(): void {
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
    public function it_throws_exception_for_missing_fixture(): void {
        $this->expectException(\RuntimeException::class);
        $this->loadFixture('non_existent');
    }

    /** @test */
    public function it_creates_fixtures_directory(): void {
        File::deleteDirectory($this->fixturesPath);
        $this->createFixturesDirectory();
        $this->assertTrue(File::isDirectory($this->fixturesPath));
    }

    /** @test */
    public function it_cleans_up_fixtures(): void {
        $this->createFixture('test', ['data' => 'test']);
        $this->cleanupTestData();
        $this->assertFalse(File::exists($this->fixturesPath));
    }

    protected function tearDown(): void {
        $this->cleanupTestData();
        parent::tearDown();
    }
}
