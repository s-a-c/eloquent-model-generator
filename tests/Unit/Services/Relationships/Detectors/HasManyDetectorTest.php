<?php

declare(strict_types=1);

namespace Tests\Unit\Services\Relationships\Detectors;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use SAC\EloquentModelGenerator\Config\ModelGeneratorConfig;
use SAC\EloquentModelGenerator\Contracts\SchemaAnalyzerInterface;
use SAC\EloquentModelGenerator\Domain\ValueObjects\IndexDefinition;
use SAC\EloquentModelGenerator\Domain\ValueObjects\RelationshipDefinition;
use SAC\EloquentModelGenerator\Exceptions\RelationshipDetectionException;
use SAC\EloquentModelGenerator\Services\Relationships\Detectors\HasManyDetector;

class HasManyDetectorTest extends TestCase
{
    private HasManyDetector $detector;
    private ModelGeneratorConfig $config;
    private SchemaAnalyzerInterface&MockObject $schemaAnalyzer;

    protected function setUp(): void
    {
        parent::setUp();

        $this->config = new ModelGeneratorConfig(
            environment: 'testing',
            additional: [
                'namespace' => 'App\\Models',
            ]
        );

        $this->schemaAnalyzer = $this->getMockBuilder(SchemaAnalyzerInterface::class)
            ->getMock();

        $this->detector = new HasManyDetector(
            $this->config,
            $this->schemaAnalyzer
        );
    }

    /** @test */
    public function it_detects_has_many_relationship(): void
    {
        $this->schemaAnalyzer->expects($this->once())
            ->method('getTables')
            ->willReturn(['users', 'posts']);

        $this->schemaAnalyzer->expects($this->once())
            ->method('getIndices')
            ->with('posts')
            ->willReturn([
                new IndexDefinition(
                    name: 'posts_user_id_foreign',
                    columns: ['user_id'],
                    isPrimary: false,
                    isUnique: false,
                    isForeign: true,
                    attributes: [
                        'foreign_table' => 'users',
                        'foreign_columns' => ['id'],
                    ]
                ),
            ]);

        $relationships = $this->detector->detect('users');

        $this->assertCount(1, $relationships);
        $this->assertSame(RelationshipDefinition::TYPE_HAS_MANY, $relationships[0]->type);
        $this->assertSame('posts', $relationships[0]->name);
        $this->assertSame(['id'], $relationships[0]->localKey);
        $this->assertSame(['user_id'], $relationships[0]->foreignKey);
        $this->assertSame('App\\Models\\Posts', $relationships[0]->relatedModel);
    }

    /** @test */
    public function it_detects_multiple_has_many_relationships(): void
    {
        $this->schemaAnalyzer->expects($this->once())
            ->method('getTables')
            ->willReturn(['users', 'posts', 'comments']);

        $this->schemaAnalyzer->expects($this->exactly(2))
            ->method('getIndices')
            ->willReturnMap([
                ['posts', [
                    new IndexDefinition(
                        name: 'posts_user_id_foreign',
                        columns: ['user_id'],
                        isPrimary: false,
                        isUnique: false,
                        isForeign: true,
                        attributes: [
                            'foreign_table' => 'users',
                            'foreign_columns' => ['id'],
                        ]
                    ),
                ]],
                ['comments', [
                    new IndexDefinition(
                        name: 'comments_user_id_foreign',
                        columns: ['user_id'],
                        isPrimary: false,
                        isUnique: false,
                        isForeign: true,
                        attributes: [
                            'foreign_table' => 'users',
                            'foreign_columns' => ['id'],
                        ]
                    ),
                ]],
            ]);

        $relationships = $this->detector->detect('users');

        $this->assertCount(2, $relationships);

        // First relationship
        $this->assertSame(RelationshipDefinition::TYPE_HAS_MANY, $relationships[0]->type);
        $this->assertSame('posts', $relationships[0]->name);
        $this->assertSame(['id'], $relationships[0]->localKey);
        $this->assertSame(['user_id'], $relationships[0]->foreignKey);

        // Second relationship
        $this->assertSame(RelationshipDefinition::TYPE_HAS_MANY, $relationships[1]->type);
        $this->assertSame('comments', $relationships[1]->name);
        $this->assertSame(['id'], $relationships[1]->localKey);
        $this->assertSame(['user_id'], $relationships[1]->foreignKey);
    }

    /** @test */
    public function it_ignores_unique_foreign_keys(): void
    {
        $this->schemaAnalyzer->expects($this->once())
            ->method('getTables')
            ->willReturn(['users', 'profiles']);

        $this->schemaAnalyzer->expects($this->once())
            ->method('getIndices')
            ->with('profiles')
            ->willReturn([
                new IndexDefinition(
                    name: 'profiles_user_id_unique',
                    columns: ['user_id'],
                    isPrimary: false,
                    isUnique: true,
                    isForeign: true,
                    attributes: [
                        'foreign_table' => 'users',
                        'foreign_columns' => ['id'],
                    ]
                ),
            ]);

        $relationships = $this->detector->detect('users');

        $this->assertEmpty($relationships);
    }

    /** @test */
    public function it_handles_composite_foreign_keys(): void
    {
        $this->schemaAnalyzer->expects($this->once())
            ->method('getTables')
            ->willReturn(['users', 'posts']);

        $this->schemaAnalyzer->expects($this->once())
            ->method('getIndices')
            ->with('posts')
            ->willReturn([
                new IndexDefinition(
                    name: 'posts_user_foreign',
                    columns: ['user_type', 'user_id'],
                    isPrimary: false,
                    isUnique: false,
                    isForeign: true,
                    attributes: [
                        'foreign_table' => 'users',
                        'foreign_columns' => ['type', 'id'],
                    ]
                ),
            ]);

        $relationships = $this->detector->detect('users');

        $this->assertCount(1, $relationships);
        $this->assertSame(RelationshipDefinition::TYPE_HAS_MANY, $relationships[0]->type);
        $this->assertSame('posts', $relationships[0]->name);
        $this->assertSame(['type', 'id'], $relationships[0]->localKey);
        $this->assertSame(['user_type', 'user_id'], $relationships[0]->foreignKey);
    }

    /** @test */
    public function it_throws_exception_for_invalid_foreign_key(): void
    {
        $this->schemaAnalyzer->expects($this->once())
            ->method('getTables')
            ->willReturn(['users', 'posts']);

        $this->schemaAnalyzer->expects($this->once())
            ->method('getIndices')
            ->with('posts')
            ->willReturn([
                new IndexDefinition(
                    name: 'invalid_foreign_key',
                    columns: ['user_id'],
                    isPrimary: false,
                    isUnique: false,
                    isForeign: true,
                    attributes: []
                ),
            ]);

        $this->expectException(RelationshipDetectionException::class);
        $this->expectExceptionMessage("Invalid foreign key 'user_id' in table 'posts'");

        $this->detector->detect('users');
    }
}
