<?php

declare(strict_types=1);

namespace Tests\Unit\Services\Relationships\Detectors;

use PHPUnit\Framework\TestCase;
use SAC\EloquentModelGenerator\Config\ModelGeneratorConfig;
use SAC\EloquentModelGenerator\Domain\ValueObjects\ColumnDefinition;
use SAC\EloquentModelGenerator\Domain\ValueObjects\IndexDefinition;
use SAC\EloquentModelGenerator\Domain\ValueObjects\RelationshipDefinition;
use SAC\EloquentModelGenerator\Exceptions\RelationshipDetectionException;
use SAC\EloquentModelGenerator\Services\Relationships\Detectors\BelongsToDetector;

class BelongsToDetectorTest extends TestCase
{

    private BelongsToDetector $detector;

    private ModelGeneratorConfig $config;

    protected function setUp(): void
    {

        parent::setUp();

        $this->config = new ModelGeneratorConfig(
            environment: 'testing',
            additional: [
                'namespace' => 'App\\Models',
            ],
        );

        $this->detector = new BelongsToDetector($this->config);
    }

    /** @test */
    public function it_detects_belongs_to_relationship(): void
    {

        $columns = [
            new ColumnDefinition(
                name: 'user_id',
                type: 'integer',
                isPrimary: FALSE,
            ),
        ];

        $indices = [
            new IndexDefinition(
                name: 'posts_user_id_foreign',
                columns: ['user_id'],
                isPrimary: FALSE,
                isUnique: FALSE,
                isForeign: TRUE,
                attributes: [
                    'foreign_table'   => 'users',
                    'foreign_columns' => ['id'],
                ],
            ),
        ];

        $relationships = $this->detector->detect('posts', $columns, $indices);

        $this->assertCount(1, $relationships);
        $this->assertSame(RelationshipDefinition::TYPE_BELONGS_TO, $relationships[0]->type);
        $this->assertSame('users', $relationships[0]->name);
        $this->assertSame(['user_id'], $relationships[0]->localKey);
        $this->assertSame(['id'], $relationships[0]->foreignKey);
        $this->assertSame('App\\Models\\Users', $relationships[0]->relatedModel);
    }

    /** @test */
    public function it_detects_multiple_belongs_to_relationships(): void
    {

        $columns = [
            new ColumnDefinition(
                name: 'user_id',
                type: 'integer',
                isPrimary: FALSE,
            ),
            new ColumnDefinition(
                name: 'post_id',
                type: 'integer',
                isPrimary: FALSE,
            ),
        ];

        $indices = [
            new IndexDefinition(
                name: 'comments_user_id_foreign',
                columns: ['user_id'],
                isPrimary: FALSE,
                isUnique: FALSE,
                isForeign: TRUE,
                attributes: [
                    'foreign_table'   => 'users',
                    'foreign_columns' => ['id'],
                ],
            ),
            new IndexDefinition(
                name: 'comments_post_id_foreign',
                columns: ['post_id'],
                isPrimary: FALSE,
                isUnique: FALSE,
                isForeign: TRUE,
                attributes: [
                    'foreign_table'   => 'posts',
                    'foreign_columns' => ['id'],
                ],
            ),
        ];

        $relationships = $this->detector->detect('comments', $columns, $indices);

        $this->assertCount(2, $relationships);

        // First relationship
        $this->assertSame(RelationshipDefinition::TYPE_BELONGS_TO, $relationships[0]->type);
        $this->assertSame('users', $relationships[0]->name);
        $this->assertSame(['user_id'], $relationships[0]->localKey);
        $this->assertSame(['id'], $relationships[0]->foreignKey);

        // Second relationship
        $this->assertSame(RelationshipDefinition::TYPE_BELONGS_TO, $relationships[1]->type);
        $this->assertSame('posts', $relationships[1]->name);
        $this->assertSame(['post_id'], $relationships[1]->localKey);
        $this->assertSame(['id'], $relationships[1]->foreignKey);
    }

    /** @test */
    public function it_throws_exception_for_invalid_foreign_key(): void
    {

        $columns = [
            new ColumnDefinition(
                name: 'invalid_id',
                type: 'integer',
                isPrimary: FALSE,
            ),
        ];

        $indices = [
            new IndexDefinition(
                name: 'invalid_foreign_key',
                columns: ['invalid_id'],
                isPrimary: FALSE,
                isUnique: FALSE,
                isForeign: TRUE,
                attributes: [],
            ),
        ];

        $this->expectException(RelationshipDetectionException::class);
        $this->expectExceptionMessage("Invalid foreign key 'invalid_id' in table 'test'");

        $this->detector->detect('test', $columns, $indices);
    }

    /** @test */
    public function it_ignores_non_foreign_key_columns(): void
    {

        $columns = [
            new ColumnDefinition(
                name: 'id',
                type: 'integer',
                isPrimary: TRUE,
            ),
            new ColumnDefinition(
                name: 'title',
                type: 'string',
                isPrimary: FALSE,
            ),
        ];

        $indices = [
            new IndexDefinition(
                name: 'posts_pkey',
                columns: ['id'],
                isPrimary: TRUE,
                isUnique: TRUE,
                isForeign: FALSE,
            ),
        ];

        $relationships = $this->detector->detect('posts', $columns, $indices);

        $this->assertEmpty($relationships);
    }

    /** @test */
    public function it_handles_composite_foreign_keys(): void
    {

        $columns = [
            new ColumnDefinition(
                name: 'user_type',
                type: 'string',
                isPrimary: FALSE,
            ),
            new ColumnDefinition(
                name: 'user_id',
                type: 'integer',
                isPrimary: FALSE,
            ),
        ];

        $indices = [
            new IndexDefinition(
                name: 'profiles_user_foreign',
                columns: ['user_type', 'user_id'],
                isPrimary: FALSE,
                isUnique: FALSE,
                isForeign: TRUE,
                attributes: [
                    'foreign_table'   => 'users',
                    'foreign_columns' => ['type', 'id'],
                ],
            ),
        ];

        $relationships = $this->detector->detect('profiles', $columns, $indices);

        $this->assertCount(1, $relationships);
        $this->assertSame(RelationshipDefinition::TYPE_BELONGS_TO, $relationships[0]->type);
        $this->assertSame('users', $relationships[0]->name);
        $this->assertSame(['user_type', 'user_id'], $relationships[0]->localKey);
        $this->assertSame(['type', 'id'], $relationships[0]->foreignKey);
    }

}
