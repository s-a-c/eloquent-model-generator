<?php

namespace SAC\EloquentModelGenerator\Tests\Integration\Database\Concerns;

use StandAloneComplex\EloquentModelGenerator\Models\BaseModel;
use StandAloneComplex\EloquentModelGenerator\Models\GeneratedModel;
use StandAloneComplex\EloquentModelGenerator\Services\ModelGeneratorService;

trait TestsDatabaseSchema
{
    /** @test */
    public function testGeneratesBasicModel(): void
    {
        $this->createTestTable('users', [
            'id' => 'increments',
            'name' => 'string',
            'email' => 'string',
            'created_at' => 'timestamp',
            'updated_at' => 'timestamp',
        ]);

        $service = $this->app->make(ModelGeneratorService::class);
        $result = $service->generateModel('users');

        $this->assertInstanceOf(GeneratedModel::class, $result);
        $this->assertEquals('User', $result->className);
        $this->assertEquals('users', $result->tableName);
        $this->assertEquals('App\\Domain\\Models', $result->namespace);
        $this->assertEquals(BaseModel::class, $result->baseClass);
        $this->assertFileExists($this->getModelPath($result->className));
    }

    /** @test */
    public function testHandlesRelationships(): void
    {
        $this->createTestTable('categories', [
            'id' => 'increments',
            'name' => 'string',
        ]);

        $this->createTestTable('posts', [
            'id' => 'increments',
            'category_id' => 'integer',
            'title' => 'string',
            'content' => 'text',
            'created_at' => 'timestamp',
            'updated_at' => 'timestamp',
        ]);

        $service = $this->app->make(ModelGeneratorService::class);
        $result = $service->generateModel('posts');

        $this->assertInstanceOf(GeneratedModel::class, $result);
        $this->assertEquals('Post', $result->className);
        $this->assertArrayHasKey('relationships', $result->schema);
        $this->assertCount(1, $result->schema['relationships']);
        $this->assertEquals('belongsTo', $result->schema['relationships'][0]['type']);
        $this->assertEquals('categories', $result->schema['relationships'][0]['foreignTable']);
    }

    /** @test */
    public function testHandlesNullableFields(): void
    {
        $this->createTestTable('articles', [
            'id' => 'increments',
            'title' => 'string',
            'subtitle' => 'string:nullable',
            'published_at' => 'timestamp:nullable',
        ]);

        $service = $this->app->make(ModelGeneratorService::class);
        $result = $service->generateModel('articles');

        $this->assertModelHasNullableField($result, 'subtitle');
        $this->assertModelHasNullableField($result, 'published_at');
    }

    /** @test */
    public function testHandlesSoftDeletes(): void
    {
        $this->createTestTable('products', [
            'id' => 'increments',
            'name' => 'string',
            'deleted_at' => 'timestamp:nullable',
        ]);

        $service = $this->app->make(ModelGeneratorService::class);
        $result = $service->generateModel('products');

        $this->assertInstanceOf(GeneratedModel::class, $result);
        $this->assertEquals('Product', $result->className);
        $this->assertTrue($result->useSoftDeletes);
        $this->assertModelUsesSoftDeletes($result);
    }

    /** @test */
    public function testHandlesCustomColumnTypes(): void
    {
        $this->createTestTable('documents', [
            'id' => 'increments',
            'title' => 'string',
            'content' => 'text',
            'settings' => 'json',
            'flags' => 'array',
            'metadata' => $this->getCustomColumnType(),
        ]);

        $service = $this->app->make(ModelGeneratorService::class);
        $result = $service->generateModel('documents');

        $this->assertInstanceOf(GeneratedModel::class, $result);
        $this->assertEquals('Document', $result->className);
        $this->assertArrayHasKey('casts', $result->schema);
        $this->assertModelHasCustomCasts($result);
    }

    abstract protected function createTestTable(string $name, array $columns): void;

    abstract protected function getCustomColumnType(): string;

    abstract protected function getModelPath(string $className): string;

    abstract protected function assertModelHasRelationship(array $model, string $type, string $relation): void;

    abstract protected function assertModelHasNullableField(array $model, string $field): void;

    abstract protected function assertModelUsesSoftDeletes(array $model): void;

    abstract protected function assertModelHasCustomCasts(array $model): void;
}
