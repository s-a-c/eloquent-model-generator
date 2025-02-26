<?php

declare(strict_types=1);

namespace Tests\Unit\Services\Relationships;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use SAC\EloquentModelGenerator\Config\ModelGeneratorConfig;
use SAC\EloquentModelGenerator\Contracts\SchemaAnalyzerInterface;
use SAC\EloquentModelGenerator\Domain\ValueObjects\ColumnDefinition;
use SAC\EloquentModelGenerator\Domain\ValueObjects\IndexDefinition;
use SAC\EloquentModelGenerator\Domain\ValueObjects\RelationshipDefinition;
use SAC\EloquentModelGenerator\Services\Relationships\RelationshipDetector;

class RelationshipDetectorTest extends TestCase
{
    private RelationshipDetector $detector;
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

        $this->detector = new RelationshipDetector(
            $this->config,
            $this->schemaAnalyzer
        );
    }

    /** @test */
    public function it_detects_all_relationship_types(): void
    {
        // Set up test data
        $columns = [
            new ColumnDefinition(
                name: 'id',
                type: 'integer',
                isPrimary: true
            ),
            new ColumnDefinition(
                name: 'user_id',
                type: 'integer',
                isPrimary: false
            ),
            new ColumnDefinition(
                name: 'commentable_type',
                type: 'string',
                isPrimary: false
            ),
            new ColumnDefinition(
                name: 'commentable_id',
                type: 'integer',
                isPrimary: false
            ),
        ];

        $indices = [
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
        ];

        // Mock schema analyzer for inverse relationships
        $this->schemaAnalyzer->expects($this->once())
            ->method('getTables')
            ->willReturn(['users', 'comments', 'profiles']);

        $this->schemaAnalyzer->expects($this->exactly(2))
            ->method('getIndices')
            ->willReturnMap([
                ['profiles', [
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

        // Detect relationships
        $relationships = $this->detector->detectRelationships('comments', $columns, $indices);

        // Verify relationships
        $this->assertCount(2, $relationships);

        // BelongsTo relationship
        $belongsTo = $this->findRelationship($relationships, RelationshipDefinition::TYPE_BELONGS_TO);
        $this->assertNotNull($belongsTo);
        $this->assertSame('users', $belongsTo->name);
        $this->assertSame(['user_id'], $belongsTo->localKey);
        $this->assertSame(['id'], $belongsTo->foreignKey);

        // MorphTo relationship
        $morphTo = $this->findRelationship($relationships, RelationshipDefinition::TYPE_MORPH_TO);
        $this->assertNotNull($morphTo);
        $this->assertSame('commentable', $morphTo->name);
        $this->assertTrue($morphTo->polymorphic);
        $this->assertSame('commentable_type', $morphTo->morphType);
        $this->assertSame('commentable_id', $morphTo->morphId);

        // Detect inverse relationships
        $inverseRelationships = $this->detector->detectRelationships('users', [], []);
        $this->assertCount(2, $inverseRelationships);

        // HasOne relationship
        $hasOne = $this->findRelationship($inverseRelationships, RelationshipDefinition::TYPE_HAS_ONE);
        $this->assertNotNull($hasOne);
        $this->assertSame('profiles', $hasOne->name);

        // HasMany relationship
        $hasMany = $this->findRelationship($inverseRelationships, RelationshipDefinition::TYPE_HAS_MANY);
        $this->assertNotNull($hasMany);
        $this->assertSame('comments', $hasMany->name);
    }

    /** @test */
    public function it_handles_empty_tables(): void
    {
        $this->schemaAnalyzer->expects($this->once())
            ->method('getTables')
            ->willReturn([]);

        $relationships = $this->detector->detectRelationships('empty', [], []);

        $this->assertEmpty($relationships);
    }

    /** @test */
    public function it_handles_tables_without_relationships(): void
    {
        $columns = [
            new ColumnDefinition(
                name: 'id',
                type: 'integer',
                isPrimary: true
            ),
            new ColumnDefinition(
                name: 'name',
                type: 'string',
                isPrimary: false
            ),
        ];

        $this->schemaAnalyzer->expects($this->once())
            ->method('getTables')
            ->willReturn(['standalone']);

        $relationships = $this->detector->detectRelationships('standalone', $columns, []);

        $this->assertEmpty($relationships);
    }

    /**
     * Find a relationship by type.
     *
     * @param array<RelationshipDefinition> $relationships
     * @param string $type
     */
    private function findRelationship(array $relationships, string $type): ?RelationshipDefinition
    {
        foreach ($relationships as $relationship) {
            if ($relationship->type === $type) {
                return $relationship;
            }
        }

        return null;
    }
}
