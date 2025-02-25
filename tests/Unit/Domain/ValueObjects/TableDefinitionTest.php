<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests\Unit\Domain\ValueObjects;

use InvalidArgumentException;
use PHPUnit\Framework\Attributes\Test;
use SAC\EloquentModelGenerator\Domain\Enums\RelationType;
use SAC\EloquentModelGenerator\Domain\ValueObjects\ColumnDefinition;
use SAC\EloquentModelGenerator\Domain\ValueObjects\IndexDefinition;
use SAC\EloquentModelGenerator\Domain\ValueObjects\RelationshipDefinition;
use SAC\EloquentModelGenerator\Domain\ValueObjects\TableDefinition;
use SAC\EloquentModelGenerator\Tests\TestCase;

final class TableDefinitionTest extends TestCase
{
    #[Test]
    public function it_creates_table_definition(): void
    {
        // Arrange
        $columns = [
            new ColumnDefinition('id', 'integer', false, null, true),
            new ColumnDefinition('name', 'string'),
            new ColumnDefinition('email', 'string', false, null, false, true),
        ];

        $indices = [
            new IndexDefinition('primary', ['id'], true),
            new IndexDefinition('users_email_unique', ['email'], false, true),
        ];

        $relationships = [
            new RelationshipDefinition(
                RelationType::HasMany,
                'posts',
                'App\\Models\\Post',
                ['id'],
                ['user_id']
            ),
        ];

        // Act
        $table = new TableDefinition(
            name: 'users',
            columns: $columns,
            indices: $indices,
            relationships: $relationships,
            attributes: ['namespace' => 'App\\Models'],
        );

        // Assert
        expect($table->name)->toBe('users')
            ->and($table->columns)->toBe($columns)
            ->and($table->indices)->toBe($indices)
            ->and($table->relationships)->toBe($relationships)
            ->and($table->attributes)->toBe(['namespace' => 'App\\Models']);
    }

    #[Test]
    public function it_validates_column_definitions(): void
    {
        // Assert
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Columns must be instances of ColumnDefinition');

        // Act
        new TableDefinition(
            name: 'users',
            columns: ['invalid'],
        );
    }

    #[Test]
    public function it_validates_index_definitions(): void
    {
        // Assert
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Indices must be instances of IndexDefinition');

        // Act
        new TableDefinition(
            name: 'users',
            columns: [new ColumnDefinition('id', 'integer')],
            indices: ['invalid'],
        );
    }

    #[Test]
    public function it_validates_relationship_definitions(): void
    {
        // Assert
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Relationships must be instances of RelationshipDefinition');

        // Act
        new TableDefinition(
            name: 'users',
            columns: [new ColumnDefinition('id', 'integer')],
            relationships: ['invalid'],
        );
    }

    #[Test]
    public function it_gets_model_name(): void
    {
        // Arrange
        $table = new TableDefinition(
            name: 'blog_posts',
            columns: [new ColumnDefinition('id', 'integer')],
        );

        // Act
        $modelName = $table->getModelName();

        // Assert
        expect($modelName)->toBe('BlogPost');
    }

    #[Test]
    public function it_gets_namespace(): void
    {
        // Arrange
        $table = new TableDefinition(
            name: 'users',
            columns: [new ColumnDefinition('id', 'integer')],
            attributes: ['namespace' => 'App\\Domain\\Models'],
        );

        // Act
        $namespace = $table->getNamespace();

        // Assert
        expect($namespace)->toBe('App\\Domain\\Models');
    }

    #[Test]
    public function it_gets_primary_keys(): void
    {
        // Arrange
        $idColumn = new ColumnDefinition('id', 'integer', false, null, true);
        $nameColumn = new ColumnDefinition('name', 'string');

        $table = new TableDefinition(
            name: 'users',
            columns: [$idColumn, $nameColumn],
        );

        // Act
        $primaryKeys = $table->getPrimaryKeys();

        // Assert
        expect($primaryKeys)
            ->toHaveCount(1)
            ->and($primaryKeys[0])->toBe($idColumn);
    }

    #[Test]
    public function it_gets_foreign_keys(): void
    {
        // Arrange
        $relationship = new RelationshipDefinition(
            RelationType::BelongsTo,
            'user',
            'App\\Models\\User',
            ['user_id'],
            ['id']
        );

        $table = new TableDefinition(
            name: 'posts',
            columns: [new ColumnDefinition('id', 'integer')],
            relationships: [$relationship],
        );

        // Act
        $foreignKeys = $table->getForeignKeys();

        // Assert
        expect($foreignKeys)
            ->toHaveCount(1)
            ->and($foreignKeys[0])->toBe($relationship);
    }

    #[Test]
    public function it_gets_polymorphic_relations(): void
    {
        // Arrange
        $relationship = new RelationshipDefinition(
            RelationType::MorphTo,
            'commentable',
            '',
            ['commentable_id', 'commentable_type'],
            []
        );

        $table = new TableDefinition(
            name: 'comments',
            columns: [new ColumnDefinition('id', 'integer')],
            relationships: [$relationship],
        );

        // Act
        $polymorphic = $table->getPolymorphicRelations();

        // Assert
        expect($polymorphic)
            ->toHaveCount(1)
            ->and($polymorphic[0])->toBe($relationship);
    }

    #[Test]
    public function it_checks_timestamps(): void
    {
        // Arrange
        $table = new TableDefinition(
            name: 'users',
            columns: [
                new ColumnDefinition('id', 'integer'),
                new ColumnDefinition('created_at', 'datetime'),
                new ColumnDefinition('updated_at', 'datetime'),
            ],
        );

        // Act & Assert
        expect($table->hasTimestamps())->toBeTrue();
    }

    #[Test]
    public function it_checks_soft_deletes(): void
    {
        // Arrange
        $table = new TableDefinition(
            name: 'users',
            columns: [
                new ColumnDefinition('id', 'integer'),
                new ColumnDefinition('deleted_at', 'datetime', true),
            ],
        );

        // Act & Assert
        expect($table->hasSoftDeletes())->toBeTrue();
    }

    #[Test]
    public function it_checks_column_existence(): void
    {
        // Arrange
        $table = new TableDefinition(
            name: 'users',
            columns: [
                new ColumnDefinition('id', 'integer'),
                new ColumnDefinition('name', 'string'),
            ],
        );

        // Act & Assert
        expect($table->hasColumn('name'))->toBeTrue()
            ->and($table->hasColumn('email'))->toBeFalse();
    }

    #[Test]
    public function it_gets_fillable_columns(): void
    {
        // Arrange
        $table = new TableDefinition(
            name: 'users',
            columns: [
                new ColumnDefinition('id', 'integer', false, null, true),
                new ColumnDefinition('name', 'string'),
                new ColumnDefinition('email', 'string'),
                new ColumnDefinition('created_at', 'datetime'),
                new ColumnDefinition('updated_at', 'datetime'),
            ],
        );

        // Act
        $fillable = $table->getFillableColumns();

        // Assert
        expect($fillable)
            ->toBe(['name', 'email']);
    }

    #[Test]
    public function it_gets_hidden_columns(): void
    {
        // Arrange
        $table = new TableDefinition(
            name: 'users',
            columns: [
                new ColumnDefinition('id', 'integer'),
                new ColumnDefinition('name', 'string'),
                new ColumnDefinition('password', 'string'),
                new ColumnDefinition('remember_token', 'string'),
            ],
        );

        // Act
        $hidden = $table->getHiddenColumns();

        // Assert
        expect($hidden)
            ->toBe(['password', 'remember_token']);
    }
}
