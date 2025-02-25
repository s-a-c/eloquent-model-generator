<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests\Unit\Services;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\MockObject\MockObject;
use SAC\EloquentModelGenerator\Config\ModelGeneratorConfig;
use SAC\EloquentModelGenerator\Domain\Enums\RelationType;
use SAC\EloquentModelGenerator\Domain\ValueObjects\IndexDefinition;
use SAC\EloquentModelGenerator\Services\Contracts\SchemaAnalyzerInterface;
use SAC\EloquentModelGenerator\Services\RelationshipResolver;
use SAC\EloquentModelGenerator\Tests\TestCase;

final class RelationshipResolverTest extends TestCase
{
    private RelationshipResolver $resolver;

    private MockObject&SchemaAnalyzerInterface $analyzer;

    private ModelGeneratorConfig $config;

    protected function setUp(): void
    {
        parent::setUp();

        $this->config = new ModelGeneratorConfig(
            databaseDriver: 'sqlite',
            databasePath: ':memory:',
            additional: [
                'namespace' => 'App\\Models',
            ],
        );

        $this->analyzer = $this->createMock(SchemaAnalyzerInterface::class);
        $this->resolver = new RelationshipResolver($this->config, $this->analyzer);
    }

    #[Test]
    public function it_resolves_belongs_to_relationships(): void
    {
        // Arrange
        $table = createTestTableDefinition('posts', [], [
            new IndexDefinition(
                name: 'fk_posts_user_id',
                columns: ['user_id'],
                isForeign: true,
                attributes: [
                    'foreign_table' => 'users',
                    'foreign_columns' => ['id'],
                ],
            ),
        ]);

        // Act
        $relationships = $this->resolver->resolveRelationships($table);

        // Assert
        expect($relationships)
            ->toHaveCount(1)
            ->and($relationships[0]->type)->toBe(RelationType::BelongsTo)
            ->and($relationships[0]->name)->toBe('user')
            ->and($relationships[0]->relatedModel)->toBe('App\\Models\\User');
    }

    #[Test]
    public function it_detects_polymorphic_relationships(): void
    {
        // Arrange
        $table = createTestTableDefinition(
            'comments',
            [
                createTestColumnDefinition('commentable_id', 'integer'),
                createTestColumnDefinition('commentable_type', 'string'),
            ],
        );

        // Act
        $relationships = $this->resolver->detectPolymorphicRelations($table);

        // Assert
        expect($relationships)
            ->toHaveCount(1)
            ->and($relationships[0]->type)->toBe(RelationType::MorphTo)
            ->and($relationships[0]->name)->toBe('commentable')
            ->and($relationships[0]->localKeys)
            ->toBe(['commentable_id', 'commentable_type']);
    }

    #[Test]
    public function it_detects_many_to_many_relationships(): void
    {
        // Arrange
        $pivotTable = createTestTableDefinition('post_tag', [], [
            new IndexDefinition(
                name: 'fk_post_tag_post_id',
                columns: ['post_id'],
                isForeign: true,
                attributes: [
                    'foreign_table' => 'posts',
                    'foreign_columns' => ['id'],
                ],
            ),
            new IndexDefinition(
                name: 'fk_post_tag_tag_id',
                columns: ['tag_id'],
                isForeign: true,
                attributes: [
                    'foreign_table' => 'tags',
                    'foreign_columns' => ['id'],
                ],
            ),
        ]);

        $this->analyzer->method('getTables')
            ->willReturn(['posts', 'tags', 'post_tag']);

        $this->analyzer->method('analyzeTable')
            ->with('post_tag')
            ->willReturn($pivotTable);

        // Act
        $relationships = $this->resolver->detectManyToManyRelations(
            createTestTableDefinition('posts')
        );

        // Assert
        expect($relationships)
            ->toHaveCount(1)
            ->and($relationships[0]->type)->toBe(RelationType::BelongsToMany)
            ->and($relationships[0]->name)->toBe('tags')
            ->and($relationships[0]->table)->toBe('post_tag');
    }

    #[Test]
    public function it_identifies_pivot_tables(): void
    {
        // Arrange
        $pivotTable = createTestTableDefinition('role_user', [], [
            new IndexDefinition(
                name: 'fk_role_user_role_id',
                columns: ['role_id'],
                isForeign: true,
                attributes: [
                    'foreign_table' => 'roles',
                    'foreign_columns' => ['id'],
                ],
            ),
            new IndexDefinition(
                name: 'fk_role_user_user_id',
                columns: ['user_id'],
                isForeign: true,
                attributes: [
                    'foreign_table' => 'users',
                    'foreign_columns' => ['id'],
                ],
            ),
        ]);

        // Act
        $isPivot = $this->resolver->isPivotTable($pivotTable);

        // Assert
        expect($isPivot)->toBeTrue();
    }

    #[Test]
    public function it_validates_relationships_for_circular_dependencies(): void
    {
        // Arrange
        $relationships = [
            createTestRelationshipDefinition(
                'parent',
                RelationType::BelongsTo,
            ),
        ];

        // Act & Assert
        $this->resolver->validateRelationships($relationships);
        $this->expectNotToPerformAssertions();
    }

    #[Test]
    public function it_detects_circular_dependencies(): void
    {
        // Arrange
        $this->analyzer->method('analyzeTable')
            ->willReturn(createTestTableDefinition('test'));

        $relationships = [
            createTestRelationshipDefinition(
                'parent',
                RelationType::BelongsTo,
            ),
            createTestRelationshipDefinition(
                'child',
                RelationType::HasOne,
            ),
        ];

        // Act & Assert
        $this->expectException(\SAC\EloquentModelGenerator\Exceptions\SchemaAnalysisException::class);
        $this->expectExceptionMessage('Circular dependency detected');

        $this->resolver->validateRelationships($relationships);
    }

    #[Test]
    public function it_handles_self_referential_relationships(): void
    {
        // Arrange
        $table = createTestTableDefinition('categories', [], [
            new IndexDefinition(
                name: 'fk_categories_parent_id',
                columns: ['parent_id'],
                isForeign: true,
                attributes: [
                    'foreign_table' => 'categories',
                    'foreign_columns' => ['id'],
                ],
            ),
        ]);

        // Act
        $relationships = $this->resolver->resolveRelationships($table);

        // Assert
        expect($relationships)
            ->toHaveCount(2)
            ->and($relationships[0]->type)->toBe(RelationType::BelongsTo)
            ->and($relationships[0]->name)->toBe('parent')
            ->and($relationships[1]->type)->toBe(RelationType::HasMany)
            ->and($relationships[1]->name)->toBe('children');
    }

    #[Test]
    public function it_handles_polymorphic_many_to_many_relationships(): void
    {
        // Arrange
        $table = createTestTableDefinition('taggables', [], [
            new IndexDefinition(
                name: 'fk_taggables_tag_id',
                columns: ['tag_id'],
                isForeign: true,
                attributes: [
                    'foreign_table' => 'tags',
                    'foreign_columns' => ['id'],
                ],
            ),
        ], [
            createTestColumnDefinition('taggable_id', 'integer'),
            createTestColumnDefinition('taggable_type', 'string'),
        ]);

        // Act
        $relationships = $this->resolver->resolveRelationships($table);

        // Assert
        expect($relationships)
            ->toHaveCount(2)
            ->and($relationships[0]->type)->toBe(RelationType::BelongsTo)
            ->and($relationships[0]->name)->toBe('tag')
            ->and($relationships[1]->type)->toBe(RelationType::MorphTo)
            ->and($relationships[1]->name)->toBe('taggable');
    }
}
