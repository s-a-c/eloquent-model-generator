<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests\Unit\Domain\ValueObjects;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\Test;
use SAC\EloquentModelGenerator\Domain\ValueObjects\IndexDefinition;
use SAC\EloquentModelGenerator\Tests\TestCase;

final class IndexDefinitionTest extends TestCase
{
    #[Test]
    public function it_creates_index_definition(): void
    {
        // Act
        $index = new IndexDefinition(
            name: 'users_email_unique',
            columns: ['email'],
            isPrimary: false,
            isUnique: true,
            isForeign: false,
            attributes: ['partial' => true],
        );

        // Assert
        expect($index->name)->toBe('users_email_unique')
            ->and($index->columns)->toBe(['email'])
            ->and($index->isPrimary)->toBeFalse()
            ->and($index->isUnique)->toBeTrue()
            ->and($index->isForeign)->toBeFalse()
            ->and($index->attributes)->toBe(['partial' => true]);
    }

    #[Test]
    public function it_validates_column_names(): void
    {
        // Assert
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Column names must be strings');

        // Act
        new IndexDefinition(
            name: 'test_index',
            columns: ['valid', 123],
        );
    }

    #[Test]
    public function it_validates_column_count(): void
    {
        // Assert
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Index must include at least one column');

        // Act
        new IndexDefinition(
            name: 'test_index',
            columns: [],
        );
    }

    #[Test]
    public function it_validates_primary_key_uniqueness(): void
    {
        // Assert
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Primary key indices must be unique');

        // Act
        new IndexDefinition(
            name: 'test_index',
            columns: ['id'],
            isPrimary: true,
            isUnique: false,
        );
    }

    #[Test]
    public function it_gets_foreign_key_reference(): void
    {
        // Arrange
        $index = new IndexDefinition(
            name: 'fk_posts_user_id',
            columns: ['user_id'],
            isForeign: true,
            attributes: [
                'foreign_table' => 'users',
                'foreign_columns' => ['id'],
                'on_update' => 'CASCADE',
                'on_delete' => 'CASCADE',
            ],
        );

        // Act
        $reference = $index->getForeignKeyReference();

        // Assert
        expect($reference)
            ->not->toBeNull()
            ->and($reference['table'])->toBe('users')
            ->and($reference['columns'])->toBe(['id']);
    }

    #[Test]
    public function it_returns_null_for_non_foreign_key_reference(): void
    {
        // Arrange
        $index = new IndexDefinition(
            name: 'users_email_unique',
            columns: ['email'],
            isUnique: true,
        );

        // Act
        $reference = $index->getForeignKeyReference();

        // Assert
        expect($reference)->toBeNull();
    }

    #[Test]
    public function it_detects_polymorphic_relationships(): void
    {
        // Arrange
        $index = new IndexDefinition(
            name: 'fk_comments_commentable',
            columns: ['commentable_id', 'commentable_type'],
            isForeign: true,
        );

        // Act & Assert
        expect($index->isPolymorphic())->toBeTrue();
    }

    #[Test]
    public function it_identifies_non_polymorphic_relationships(): void
    {
        // Arrange
        $cases = [
            [
                'index' => new IndexDefinition(
                    name: 'fk_posts_user_id',
                    columns: ['user_id'],
                    isForeign: true,
                ),
                'expected' => false,
            ],
            [
                'index' => new IndexDefinition(
                    name: 'users_email_unique',
                    columns: ['email'],
                    isUnique: true,
                ),
                'expected' => false,
            ],
            [
                'index' => new IndexDefinition(
                    name: 'primary',
                    columns: ['id'],
                    isPrimary: true,
                    isUnique: true,
                ),
                'expected' => false,
            ],
        ];

        foreach ($cases as $case) {
            // Act & Assert
            expect($case['index']->isPolymorphic())
                ->toBe($case['expected']);
        }
    }

    #[Test]
    public function it_gets_polymorphic_base_name(): void
    {
        // Arrange
        $index = new IndexDefinition(
            name: 'fk_comments_commentable',
            columns: ['commentable_id', 'commentable_type'],
            isForeign: true,
        );

        // Act
        $baseName = $index->getPolymorphicBaseName();

        // Assert
        expect($baseName)->toBe('commentable');
    }

    #[Test]
    public function it_returns_null_for_non_polymorphic_base_name(): void
    {
        // Arrange
        $index = new IndexDefinition(
            name: 'fk_posts_user_id',
            columns: ['user_id'],
            isForeign: true,
        );

        // Act
        $baseName = $index->getPolymorphicBaseName();

        // Assert
        expect($baseName)->toBeNull();
    }

    #[Test]
    public function it_detects_many_to_many_relationships(): void
    {
        // Arrange
        $index = new IndexDefinition(
            name: 'fk_post_tag_post_id',
            columns: ['post_id'],
            isForeign: true,
            attributes: ['is_pivot' => true],
        );

        // Act & Assert
        expect($index->isManyToMany())->toBeTrue();
    }

    #[Test]
    public function it_gets_relationship_method_name(): void
    {
        // Arrange
        $cases = [
            [
                'index' => new IndexDefinition(
                    name: 'fk_posts_user_id',
                    columns: ['user_id'],
                    isForeign: true,
                    attributes: [
                        'foreign_table' => 'users',
                        'foreign_columns' => ['id'],
                    ],
                ),
                'expected' => 'user',
            ],
            [
                'index' => new IndexDefinition(
                    name: 'fk_comments_commentable',
                    columns: ['commentable_id', 'commentable_type'],
                    isForeign: true,
                ),
                'expected' => 'commentable',
            ],
            [
                'index' => new IndexDefinition(
                    name: 'users_email_unique',
                    columns: ['email'],
                    isUnique: true,
                ),
                'expected' => null,
            ],
        ];

        foreach ($cases as $case) {
            // Act
            $methodName = $case['index']->getRelationshipMethodName();

            // Assert
            expect($methodName)->toBe($case['expected']);
        }
    }
}
