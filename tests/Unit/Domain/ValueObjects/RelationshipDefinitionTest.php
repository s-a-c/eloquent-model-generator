<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests\Unit\Domain\ValueObjects;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\Test;
use SAC\EloquentModelGenerator\Domain\Enums\RelationType;
use SAC\EloquentModelGenerator\Domain\ValueObjects\RelationshipDefinition;
use SAC\EloquentModelGenerator\Tests\TestCase;

final class RelationshipDefinitionTest extends TestCase
{
    #[Test]
    public function it_creates_relationship_definition(): void
    {
        // Act
        $relationship = new RelationshipDefinition(
            type: RelationType::HasMany,
            name: 'posts',
            relatedModel: 'App\\Models\\Post',
            localKeys: ['id'],
            foreignKeys: ['user_id'],
            table: null,
            attributes: ['with' => ['comments']],
        );

        // Assert
        expect($relationship->type)->toBe(RelationType::HasMany)
            ->and($relationship->name)->toBe('posts')
            ->and($relationship->relatedModel)->toBe('App\\Models\\Post')
            ->and($relationship->localKeys)->toBe(['id'])
            ->and($relationship->foreignKeys)->toBe(['user_id'])
            ->and($relationship->table)->toBeNull()
            ->and($relationship->attributes)->toBe(['with' => ['comments']]);
    }

    #[Test]
    public function it_validates_key_arrays(): void
    {
        // Assert
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Local keys must be strings');

        // Act
        new RelationshipDefinition(
            type: RelationType::HasMany,
            name: 'posts',
            relatedModel: 'App\\Models\\Post',
            localKeys: ['id', 123],
            foreignKeys: ['user_id'],
        );
    }

    #[Test]
    public function it_validates_foreign_keys(): void
    {
        // Assert
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Foreign keys must be strings');

        // Act
        new RelationshipDefinition(
            type: RelationType::HasMany,
            name: 'posts',
            relatedModel: 'App\\Models\\Post',
            localKeys: ['id'],
            foreignKeys: ['user_id', 123],
        );
    }

    #[Test]
    public function it_validates_many_to_many_relationships(): void
    {
        // Assert
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Many-to-many relationships must specify a pivot table');

        // Act
        new RelationshipDefinition(
            type: RelationType::BelongsToMany,
            name: 'tags',
            relatedModel: 'App\\Models\\Tag',
            localKeys: ['id'],
            foreignKeys: ['tag_id'],
        );
    }

    #[Test]
    public function it_generates_belongs_to_method(): void
    {
        // Arrange
        $relationship = new RelationshipDefinition(
            type: RelationType::BelongsTo,
            name: 'user',
            relatedModel: 'App\\Models\\User',
            localKeys: ['user_id'],
            foreignKeys: ['id'],
        );

        // Act
        $method = $relationship->getMethodDefinition();

        // Assert
        expect($method)->toContain('public function user()')
            ->and($method)->toContain('return $this->belongsTo(\\App\\Models\\User::class')
            ->and($method)->toContain("'user_id'")
            ->and($method)->toContain("'id'");
    }

    #[Test]
    public function it_generates_has_many_method(): void
    {
        // Arrange
        $relationship = new RelationshipDefinition(
            type: RelationType::HasMany,
            name: 'posts',
            relatedModel: 'App\\Models\\Post',
            localKeys: ['id'],
            foreignKeys: ['user_id'],
        );

        // Act
        $method = $relationship->getMethodDefinition();

        // Assert
        expect($method)->toContain('public function posts()')
            ->and($method)->toContain('return $this->hasMany(\\App\\Models\\Post::class')
            ->and($method)->toContain("'user_id'")
            ->and($method)->toContain("'id'");
    }

    #[Test]
    public function it_generates_belongs_to_many_method(): void
    {
        // Arrange
        $relationship = new RelationshipDefinition(
            type: RelationType::BelongsToMany,
            name: 'tags',
            relatedModel: 'App\\Models\\Tag',
            localKeys: ['post_id'],
            foreignKeys: ['tag_id'],
            table: 'post_tag',
        );

        // Act
        $method = $relationship->getMethodDefinition();

        // Assert
        expect($method)->toContain('public function tags()')
            ->and($method)->toContain('return $this->belongsToMany(\\App\\Models\\Tag::class')
            ->and($method)->toContain("'post_tag'")
            ->and($method)->toContain("'post_id'")
            ->and($method)->toContain("'tag_id'");
    }

    #[Test]
    public function it_generates_morph_to_method(): void
    {
        // Arrange
        $relationship = new RelationshipDefinition(
            type: RelationType::MorphTo,
            name: 'commentable',
            relatedModel: '',
            localKeys: ['commentable_id', 'commentable_type'],
            foreignKeys: [],
        );

        // Act
        $method = $relationship->getMethodDefinition();

        // Assert
        expect($method)->toContain('public function commentable()')
            ->and($method)->toContain('return $this->morphTo(')
            ->and($method)->toContain("'commentable'");
    }

    #[Test]
    public function it_generates_morph_many_method(): void
    {
        // Arrange
        $relationship = new RelationshipDefinition(
            type: RelationType::MorphMany,
            name: 'comments',
            relatedModel: 'App\\Models\\Comment',
            localKeys: [],
            foreignKeys: ['commentable_id', 'commentable_type'],
        );

        // Act
        $method = $relationship->getMethodDefinition();

        // Assert
        expect($method)->toContain('public function comments()')
            ->and($method)->toContain('return $this->morphMany(\\App\\Models\\Comment::class')
            ->and($method)->toContain("'commentable_id'")
            ->and($method)->toContain("'commentable_type'");
    }

    #[Test]
    public function it_gets_required_imports(): void
    {
        // Arrange
        $relationship = new RelationshipDefinition(
            type: RelationType::HasManyThrough,
            name: 'comments',
            relatedModel: 'App\\Models\\Comment',
            localKeys: ['id'],
            foreignKeys: ['post_id'],
            attributes: [
                'through_model' => 'App\\Models\\Post',
            ],
        );

        // Act
        $imports = $relationship->getRequiredImports();

        // Assert
        expect($imports)->toBe([
            'Illuminate\\Database\\Eloquent\\Relations\\HasManyThrough',
            'App\\Models\\Comment',
            'App\\Models\\Post',
        ]);
    }

    #[Test]
    public function it_checks_morph_map_requirement(): void
    {
        // Arrange
        $cases = [
            [RelationType::MorphTo, true],
            [RelationType::MorphOne, true],
            [RelationType::MorphMany, true],
            [RelationType::MorphToMany, true],
            [RelationType::MorphedByMany, true],
            [RelationType::HasOne, false],
            [RelationType::HasMany, false],
            [RelationType::BelongsTo, false],
            [RelationType::BelongsToMany, false],
        ];

        foreach ($cases as [$type, $expected]) {
            // Act
            $relationship = new RelationshipDefinition(
                type: $type,
                name: 'test',
                relatedModel: 'App\\Models\\Test',
                localKeys: ['id'],
                foreignKeys: ['test_id'],
            );

            // Assert
            expect($relationship->requiresMorphMap())
                ->toBe($expected, "Failed asserting that {$type->value} requires morph map");
        }
    }

    #[Test]
    public function it_gets_morph_map_key(): void
    {
        // Arrange
        $relationship = new RelationshipDefinition(
            type: RelationType::MorphTo,
            name: 'commentable',
            relatedModel: '',
            localKeys: ['commentable_id', 'commentable_type'],
            foreignKeys: [],
            attributes: ['morph_key' => 'comment'],
        );

        // Act
        $key = $relationship->getMorphMapKey();

        // Assert
        expect($key)->toBe('comment');
    }

    #[Test]
    public function it_returns_null_for_non_polymorphic_morph_map_key(): void
    {
        // Arrange
        $relationship = new RelationshipDefinition(
            type: RelationType::HasMany,
            name: 'posts',
            relatedModel: 'App\\Models\\Post',
            localKeys: ['id'],
            foreignKeys: ['user_id'],
        );

        // Act
        $key = $relationship->getMorphMapKey();

        // Assert
        expect($key)->toBeNull();
    }
}
