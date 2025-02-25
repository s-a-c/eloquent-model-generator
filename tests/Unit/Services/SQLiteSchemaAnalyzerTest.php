<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests\Unit\Services;

use PHPUnit\Framework\Attributes\Test;
use SAC\EloquentModelGenerator\Config\ModelGeneratorConfig;
use SAC\EloquentModelGenerator\Domain\Enums\RelationType;
use SAC\EloquentModelGenerator\Services\SQLiteSchemaAnalyzer;
use SAC\EloquentModelGenerator\Tests\TestCase;

final class SQLiteSchemaAnalyzerTest extends TestCase
{
    private SQLiteSchemaAnalyzer $analyzer;

    protected function setUp(): void
    {
        parent::setUp();

        $config = new ModelGeneratorConfig(
            databaseDriver: 'sqlite',
            databasePath: ':memory:',
        );

        $this->analyzer = new SQLiteSchemaAnalyzer($config);
    }

    #[Test]
    public function it_analyzes_table_structure(): void
    {
        // Arrange
        $this->createTestTable('test_table', [
            'name' => 'string',
            'email' => 'string',
            'age' => 'integer',
            'is_active' => 'boolean',
        ]);

        // Act
        $definition = $this->analyzer->analyzeTable('test_table');

        // Assert
        expect($definition)
            ->toBeValidTableDefinition()
            ->and($definition->name)->toBe('test_table')
            ->and($definition->columns)->toHaveCount(7) // id + 4 columns + timestamps
            ->and($definition->indices)->toHaveCount(1) // primary key
            ->and($definition->relationships)->toHaveCount(0);

        // Check column definitions
        $nameColumn = collect($definition->columns)->firstWhere('name', 'name');
        expect($nameColumn)
            ->not->toBeNull()
            ->and($nameColumn->type)->toBe('string')
            ->and($nameColumn->nullable)->toBeFalse();

        $ageColumn = collect($definition->columns)->firstWhere('name', 'age');
        expect($ageColumn)
            ->not->toBeNull()
            ->and($ageColumn->type)->toBe('integer')
            ->and($ageColumn->nullable)->toBeFalse();
    }

    #[Test]
    public function it_detects_foreign_key_relationships(): void
    {
        // Arrange
        $this->createTestTable('users', [
            'name' => 'string',
        ]);

        $this->createTestTable('posts', [
            'user_id' => 'foreignId',
            'title' => 'string',
        ]);

        // Act
        $definition = $this->analyzer->analyzeTable('posts');

        // Assert
        expect($definition->relationships)
            ->toHaveCount(1)
            ->and($definition->relationships[0]->type)->toBe(RelationType::BelongsTo)
            ->and($definition->relationships[0]->name)->toBe('user')
            ->and($definition->relationships[0]->localKeys)->toBe(['user_id'])
            ->and($definition->relationships[0]->foreignKeys)->toBe(['id']);
    }

    #[Test]
    public function it_detects_polymorphic_relationships(): void
    {
        // Arrange
        $this->createTestTable('comments', [
            'commentable_id' => 'unsignedBigInteger',
            'commentable_type' => 'string',
            'content' => 'text',
        ]);

        // Act
        $definition = $this->analyzer->analyzeTable('comments');

        // Assert
        expect($definition->relationships)
            ->toHaveCount(1)
            ->and($definition->relationships[0]->type)->toBe(RelationType::MorphTo)
            ->and($definition->relationships[0]->name)->toBe('commentable')
            ->and($definition->relationships[0]->localKeys)
            ->toBe(['commentable_id', 'commentable_type']);
    }

    #[Test]
    public function it_detects_many_to_many_relationships(): void
    {
        // Arrange
        $this->createTestTable('posts', [
            'title' => 'string',
        ]);

        $this->createTestTable('tags', [
            'name' => 'string',
        ]);

        $this->schema()->create('post_tag', function ($table) {
            $table->foreignId('post_id')->constrained();
            $table->foreignId('tag_id')->constrained();
            $table->timestamps();
        });

        // Act
        $definition = $this->analyzer->analyzeTable('posts');

        // Assert
        $relationship = collect($definition->relationships)
            ->first(fn ($rel) => $rel->type === RelationType::BelongsToMany);

        expect($relationship)
            ->not->toBeNull()
            ->and($relationship->name)->toBe('tags')
            ->and($relationship->table)->toBe('post_tag');
    }

    #[Test]
    public function it_handles_composite_primary_keys(): void
    {
        // Arrange
        $this->schema()->create('role_user', function ($table) {
            $table->foreignId('role_id');
            $table->foreignId('user_id');
            $table->timestamps();
            $table->primary(['role_id', 'user_id']);
        });

        // Act
        $definition = $this->analyzer->analyzeTable('role_user');

        // Assert
        expect($definition->getPrimaryKeys())
            ->toHaveCount(2)
            ->and(collect($definition->getPrimaryKeys())->pluck('name')->all())
            ->toBe(['role_id', 'user_id']);
    }

    #[Test]
    public function it_detects_unique_constraints(): void
    {
        // Arrange
        $this->createTestTable('users', [
            'email' => 'string',
        ]);

        $this->schema()->table('users', function ($table) {
            $table->unique('email');
        });

        // Act
        $definition = $this->analyzer->analyzeTable('users');

        // Assert
        $emailColumn = collect($definition->columns)->firstWhere('name', 'email');
        expect($emailColumn->isUnique)->toBeTrue();

        $uniqueIndex = collect($definition->indices)
            ->first(fn ($idx) => $idx->isUnique && in_array('email', $idx->columns));
        expect($uniqueIndex)->not->toBeNull();
    }

    #[Test]
    public function it_handles_soft_deletes(): void
    {
        // Arrange
        $this->createTestTable('products', [
            'name' => 'string',
            'deleted_at' => 'softDeletes',
        ]);

        // Act
        $definition = $this->analyzer->analyzeTable('products');

        // Assert
        expect($definition->hasSoftDeletes())->toBeTrue();

        $deletedAtColumn = collect($definition->columns)
            ->firstWhere('name', 'deleted_at');
        expect($deletedAtColumn)
            ->not->toBeNull()
            ->and($deletedAtColumn->nullable)->toBeTrue()
            ->and($deletedAtColumn->type)->toBe('datetime');
    }

    #[Test]
    public function it_handles_json_columns(): void
    {
        // Arrange
        $this->createTestTable('settings', [
            'key' => 'string',
            'value' => 'json',
            'metadata' => 'json',
        ]);

        // Act
        $definition = $this->analyzer->analyzeTable('settings');

        // Assert
        $jsonColumns = collect($definition->columns)
            ->filter(fn ($col) => $col->type === 'json');

        expect($jsonColumns)
            ->toHaveCount(2)
            ->and($jsonColumns->pluck('name')->all())
            ->toBe(['value', 'metadata']);
    }

    private function schema()
    {
        return $this->app['db']->connection()->getSchemaBuilder();
    }
}
