<?php

namespace SAC\EloquentModelGenerator\Tests\Unit\Support\Factories;

use SAC\EloquentModelGenerator\Tests\Support\Factories\ModelFactory;
use SAC\EloquentModelGenerator\Tests\TestCase;
use SAC\EloquentModelGenerator\ValueObjects\ModelDefinition;

class ModelFactoryTest extends TestCase {
    private ModelFactory $factory;

    protected function setUp(): void {
        parent::setUp();
        $this->factory = new ModelFactory();
    }

    /** @test */
    public function it_creates_model_definition(): void {
        $definition = $this->factory->definition('test_users');

        $this->assertInstanceOf(ModelDefinition::class, $definition);
        $this->assertEquals('TestUser', $definition->getClassName());
        $this->assertEquals('App\\Models', $definition->getNamespace());
        $this->assertEquals('test_users', $definition->getTableName());
    }

    /** @test */
    public function it_creates_model_definition_with_custom_attributes(): void {
        $definition = $this->factory->definition('users', [
            'className' => 'CustomUser',
            'namespace' => 'App\\Domain\\Models',
            'baseClass' => 'App\\Models\\BaseModel',
            'withSoftDeletes' => true
        ]);

        $this->assertEquals('CustomUser', $definition->getClassName());
        $this->assertEquals('App\\Domain\\Models', $definition->getNamespace());
        $this->assertEquals('App\\Models\\BaseModel', $definition->getBaseClass());
        $this->assertTrue($definition->withSoftDeletes());
    }

    /** @test */
    public function it_creates_basic_schema(): void {
        $schema = $this->factory->basicSchema('users');

        $this->assertArrayHasKey('columns', $schema);
        $this->assertArrayHasKey('indexes', $schema);
        $this->assertArrayHasKey('id', $schema['columns']);
        $this->assertArrayHasKey('created_at', $schema['columns']);
        $this->assertArrayHasKey('updated_at', $schema['columns']);
    }

    /** @test */
    public function it_creates_soft_deletes_schema(): void {
        $schema = $this->factory->softDeletesSchema('users');

        $this->assertArrayHasKey('deleted_at', $schema['columns']);
        $this->assertTrue($schema['columns']['deleted_at']['nullable']);
        $this->assertEquals('timestamp', $schema['columns']['deleted_at']['type']);
    }

    /** @test */
    public function it_creates_relationship_schema(): void {
        $relations = [
            'posts' => [
                'type' => 'hasMany',
                'model' => 'App\\Models\\Post',
                'foreignKey' => null,
                'localKey' => null
            ]
        ];

        $schema = $this->factory->relationshipSchema('users', $relations);

        $this->assertArrayHasKey('relations', $schema);
        $this->assertEquals($relations, $schema['relations']);
    }

    /** @test */
    public function it_normalizes_column_definitions(): void {
        $schema = $this->factory->schema([
            'name' => 'string',
            'email' => ['type' => 'string', 'nullable' => true],
            'active' => ['type' => 'boolean', 'default' => false]
        ]);

        $this->assertEquals('string', $schema['columns']['name']['type']);
        $this->assertFalse($schema['columns']['name']['nullable']);
        $this->assertTrue($schema['columns']['email']['nullable']);
        $this->assertEquals(false, $schema['columns']['active']['default']);
    }

    /** @test */
    public function it_normalizes_index_definitions(): void {
        $schema = $this->factory->schema([], [
            'email_unique' => ['type' => 'unique', 'columns' => ['email']],
            'name_index' => 'name',
            'composite' => ['created_at', 'updated_at']
        ]);

        $this->assertEquals('unique', $schema['indexes']['email_unique']['type']);
        $this->assertEquals(['name'], $schema['indexes']['name_index']['columns']);
        $this->assertEquals(['created_at', 'updated_at'], $schema['indexes']['composite']['columns']);
    }

    /** @test */
    public function it_normalizes_relation_definitions(): void {
        $schema = $this->factory->schema([], [], [
            'posts' => 'hasMany',
            'profile' => ['type' => 'hasOne', 'model' => 'App\\Models\\Profile']
        ]);

        $this->assertEquals('hasMany', $schema['relations']['posts']['type']);
        $this->assertEquals('hasOne', $schema['relations']['profile']['type']);
    }
}
