<?php

declare(strict_types=1);

namespace Tests\Unit\Services\Relationships\Detectors;

use PHPUnit\Framework\TestCase;
use SAC\EloquentModelGenerator\Config\ModelGeneratorConfig;
use SAC\EloquentModelGenerator\Domain\ValueObjects\ColumnDefinition;
use SAC\EloquentModelGenerator\Domain\ValueObjects\RelationshipDefinition;
use SAC\EloquentModelGenerator\Exceptions\RelationshipDetectionException;
use SAC\EloquentModelGenerator\Services\Relationships\Detectors\MorphToDetector;

class MorphToDetectorTest extends TestCase
{

    private MorphToDetector $detector;

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

        $this->detector = new MorphToDetector($this->config);
    }

    /** @test */
    public function it_detects_morph_to_relationship(): void
    {

        $columns = [
            new ColumnDefinition(
                name: 'id',
                type: 'integer',
                isPrimary: TRUE,
            ),
            new ColumnDefinition(
                name: 'commentable_type',
                type: 'string',
                isPrimary: FALSE,
            ),
            new ColumnDefinition(
                name: 'commentable_id',
                type: 'integer',
                isPrimary: FALSE,
            ),
        ];

        $relationships = $this->detector->detect('comments', $columns);

        $this->assertCount(1, $relationships);
        $this->assertSame(RelationshipDefinition::TYPE_MORPH_TO, $relationships[0]->type);
        $this->assertSame('commentable', $relationships[0]->name);
        $this->assertSame(['commentable_id'], $relationships[0]->localKey);
        $this->assertEmpty($relationships[0]->foreignKey);
        $this->assertTrue($relationships[0]->polymorphic);
        $this->assertSame('commentable_type', $relationships[0]->morphType);
        $this->assertSame('commentable_id', $relationships[0]->morphId);
    }

    /** @test */
    public function it_detects_multiple_morph_to_relationships(): void
    {

        $columns = [
            new ColumnDefinition(
                name: 'id',
                type: 'integer',
                isPrimary: TRUE,
            ),
            new ColumnDefinition(
                name: 'commentable_type',
                type: 'string',
                isPrimary: FALSE,
            ),
            new ColumnDefinition(
                name: 'commentable_id',
                type: 'integer',
                isPrimary: FALSE,
            ),
            new ColumnDefinition(
                name: 'likeable_type',
                type: 'string',
                isPrimary: FALSE,
            ),
            new ColumnDefinition(
                name: 'likeable_id',
                type: 'integer',
                isPrimary: FALSE,
            ),
        ];

        $relationships = $this->detector->detect('interactions', $columns);

        $this->assertCount(2, $relationships);

        // First relationship
        $this->assertSame(RelationshipDefinition::TYPE_MORPH_TO, $relationships[0]->type);
        $this->assertSame('commentable', $relationships[0]->name);
        $this->assertSame(['commentable_id'], $relationships[0]->localKey);
        $this->assertTrue($relationships[0]->polymorphic);

        // Second relationship
        $this->assertSame(RelationshipDefinition::TYPE_MORPH_TO, $relationships[1]->type);
        $this->assertSame('likeable', $relationships[1]->name);
        $this->assertSame(['likeable_id'], $relationships[1]->localKey);
        $this->assertTrue($relationships[1]->polymorphic);
    }

    /** @test */
    public function it_ignores_incomplete_morph_columns(): void
    {

        $columns = [
            new ColumnDefinition(
                name: 'id',
                type: 'integer',
                isPrimary: TRUE,
            ),
            new ColumnDefinition(
                name: 'commentable_type',
                type: 'string',
                isPrimary: FALSE,
            ),
            // Missing commentable_id
        ];

        $relationships = $this->detector->detect('comments', $columns);

        $this->assertEmpty($relationships);
    }

    /** @test */
    public function it_validates_column_types(): void
    {

        $columns = [
            new ColumnDefinition(
                name: 'id',
                type: 'integer',
                isPrimary: TRUE,
            ),
            new ColumnDefinition(
                name: 'invalid_type',
                type: 'integer', // Should be string
                isPrimary: FALSE,
            ),
            new ColumnDefinition(
                name: 'invalid_id',
                type: 'string', // Should be integer
                isPrimary: FALSE,
            ),
        ];

        $relationships = $this->detector->detect('invalid', $columns);

        $this->assertEmpty($relationships);
    }

    /** @test */
    public function it_throws_exception_for_invalid_morph_columns(): void
    {

        $columns = [
            new ColumnDefinition(
                name: 'commentable_type',
                type: 'boolean', // Invalid type
                isPrimary: FALSE,
            ),
            new ColumnDefinition(
                name: 'commentable_id',
                type: 'integer',
                isPrimary: FALSE,
            ),
        ];

        $this->expectException(RelationshipDetectionException::class);
        $this->expectExceptionMessage("Invalid polymorphic relationship for column 'commentable_type' in table 'comments'");

        $this->detector->detect('comments', $columns);
    }

    /** @test */
    public function it_handles_custom_column_types(): void
    {

        $columns = [
            new ColumnDefinition(
                name: 'taggable_type',
                type: 'varchar',
                isPrimary: FALSE,
            ),
            new ColumnDefinition(
                name: 'taggable_id',
                type: 'unsignedBigInteger',
                isPrimary: FALSE,
            ),
        ];

        $relationships = $this->detector->detect('tags', $columns);

        $this->assertCount(1, $relationships);
        $this->assertSame(RelationshipDefinition::TYPE_MORPH_TO, $relationships[0]->type);
        $this->assertSame('taggable', $relationships[0]->name);
    }

}
