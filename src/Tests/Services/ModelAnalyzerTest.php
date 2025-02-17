<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests\Services;

use PHPUnit\Framework\TestCase;
use SAC\EloquentModelGenerator\Model\ModelDefinition;
use SAC\EloquentModelGenerator\Services\ModelAnalyzer;

final class ModelAnalyzerTest extends TestCase
{
    private ModelAnalyzer $analyzer;
    private ModelDefinition $model;

    protected function setUp(): void
    {
        $this->analyzer = new ModelAnalyzer();
        $this->model = new ModelDefinition(
            'User',
            'App\\Models',
            'users',
            [
                'id' => ['type' => 'integer', 'nullable' => false],
                'email' => ['type' => 'string', 'nullable' => false],
                'created_at' => ['type' => 'datetime', 'nullable' => true]
            ],
            [
                'posts' => [
                    'type' => 'hasMany',
                    'model' => 'App\\Models\\Post',
                    'foreign_key' => 'user_id',
                    'local_key' => 'id'
                ]
            ]
        );
    }

    public function testColumnAnalysis(): void
    {
        $results = $this->analyzer->analyze($this->model);

        $this->assertArrayHasKey('columns', $results);
        $this->assertEquals(
            [
                'type' => 'integer',
                'nullable' => false,
            ],
            $results['columns']['id']
        );
    }

    public function testRelationAnalysis(): void
    {
        $results = $this->analyzer->analyze($this->model);

        $this->assertArrayHasKey('relations', $results);
        $this->assertEquals(
            [
                'type' => 'hasMany',
                'model' => 'App\\Models\\Post',
                'foreign_key' => 'user_id',
                'local_key' => 'id'
            ],
            $results['relations']['posts']
        );
    }

    public function testValidationRulesGeneration(): void
    {
        $results = $this->analyzer->analyze($this->model);

        $this->assertArrayHasKey('validation_rules', $results);
        $this->assertEquals(
            ['required', 'integer'],
            $results['validation_rules']['id']
        );
        $this->assertEquals(
            ['required', 'string'],
            $results['validation_rules']['email']
        );
        $this->assertEquals(
            ['datetime'],
            $results['validation_rules']['created_at']
        );
    }

    public function testTypeHintInference(): void
    {
        $results = $this->analyzer->analyze($this->model);

        $this->assertArrayHasKey('type_hints', $results);
        $this->assertEquals('int', $results['type_hints']['id']);
        $this->assertEquals('string', $results['type_hints']['email']);
        $this->assertEquals('?\\DateTimeInterface', $results['type_hints']['created_at']);
    }

    public function testBasicModelInfo(): void
    {
        $results = $this->analyzer->analyze($this->model);

        $this->assertEquals('User', $results['name']);
        $this->assertEquals('App\\Models', $results['namespace']);
        $this->assertEquals('users', $results['table']);
    }
}
