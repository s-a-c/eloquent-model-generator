<?php

declare(strict_types=1);

namespace Tests\Unit\Services;

use Illuminate\Database\Connection;
use Illuminate\Database\Schema\Builder;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use SAC\EloquentModelGenerator\Config\ModelGeneratorConfig;
use SAC\EloquentModelGenerator\Contracts\TypeMapperInterface;
use SAC\EloquentModelGenerator\Domain\ValueObjects\TypeDefinition;
use SAC\EloquentModelGenerator\Services\SQLiteSchemaAnalyzer;

class SQLiteSchemaAnalyzerTest extends TestCase
{
    private SQLiteSchemaAnalyzer $analyzer;
    private ModelGeneratorConfig $config;
    private TypeMapperInterface&MockObject $typeMapper;
    private Connection&MockObject $connection;
    private Builder&MockObject $schemaBuilder;

    protected function setUp(): void
    {
        parent::setUp();

        // Create mock objects
        $this->connection = $this->getMockBuilder(Connection::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->schemaBuilder = $this->getMockBuilder(Builder::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->connection->expects($this->any())
            ->method('getSchemaBuilder')
            ->willReturn($this->schemaBuilder);

        DB::shouldReceive('connection')
            ->andReturn($this->connection);

        // Create config with test values
        $this->config = new ModelGeneratorConfig(
            environment: 'testing',
            databaseDriver: 'sqlite',
            additional: [
                'namespace' => 'App\\Models',
                'base_class' => '\\Illuminate\\Database\\Eloquent\\Model',
            ]
        );

        // Create type mapper mock
        $this->typeMapper = $this->getMockBuilder(TypeMapperInterface::class)
            ->getMock();

        $this->analyzer = new SQLiteSchemaAnalyzer($this->config, $this->typeMapper);
    }

    /** @test */
    public function it_analyzes_table_structure(): void
    {
        // Set up expectations
        $this->schemaBuilder->expects($this->once())
            ->method('hasTable')
            ->with('users')
            ->willReturn(true);

        $this->connection->expects($this->exactly(4))
            ->method('select')
            ->willReturnMap([
                ["PRAGMA table_info(users)", [], $this->getTestColumns()],
                ["PRAGMA index_list(users)", [], $this->getTestIndices()],
                ["PRAGMA index_info(users_email_unique)", [], $this->getTestIndexColumns()],
                ["PRAGMA foreign_key_list(users)", [], $this->getTestForeignKeys()],
            ]);

        $this->typeMapper->expects($this->any())
            ->method('mapColumnType')
            ->willReturn(new TypeDefinition(
                phpType: 'string',
                docType: 'string',
                dbType: 'varchar',
                length: 255,
                precision: null,
                attributes: []
            ));

        $table = $this->analyzer->analyzeTable('users');

        $this->assertSame('users', $table->name);
        $this->assertCount(5, $table->columns);
        $this->assertTrue($table->timestamps);
        $this->assertTrue($table->softDeletes);
    }

    /** @test */
    public function it_detects_relationships(): void
    {
        // Set up expectations
        $this->schemaBuilder->expects($this->once())
            ->method('hasTable')
            ->with('posts')
            ->willReturn(true);

        $this->connection->expects($this->exactly(3))
            ->method('select')
            ->willReturnMap([
                ["PRAGMA table_info(posts)", [], $this->getTestColumns()],
                ["PRAGMA index_list(posts)", [], []],
                ["PRAGMA foreign_key_list(posts)", [], [
                    (object) [
                        'from' => 'user_id',
                        'to' => 'id',
                        'table' => 'users',
                        'on_update' => 'CASCADE',
                        'on_delete' => 'CASCADE',
                    ],
                ]],
            ]);

        $this->typeMapper->expects($this->any())
            ->method('mapColumnType')
            ->willReturn(new TypeDefinition(
                phpType: 'string',
                docType: 'string',
                dbType: 'varchar',
                length: 255,
                precision: null,
                attributes: []
            ));

        $table = $this->analyzer->analyzeTable('posts');
        $relationships = $table->relationships;

        $this->assertCount(1, $relationships);
        $this->assertSame('belongsTo', $relationships[0]->type);
        $this->assertSame('users', $relationships[0]->name);
    }

    /** @test */
    public function it_detects_polymorphic_relationships(): void
    {
        // Set up expectations
        $this->schemaBuilder->expects($this->once())
            ->method('hasTable')
            ->with('comments')
            ->willReturn(true);

        $this->connection->expects($this->exactly(3))
            ->method('select')
            ->willReturnMap([
                ["PRAGMA table_info(comments)", [], [
                    (object) ['name' => 'id', 'type' => 'integer', 'notnull' => 1, 'dflt_value' => null, 'pk' => 1],
                    (object) ['name' => 'commentable_id', 'type' => 'integer', 'notnull' => 1, 'dflt_value' => null, 'pk' => 0],
                    (object) ['name' => 'commentable_type', 'type' => 'varchar', 'notnull' => 1, 'dflt_value' => null, 'pk' => 0],
                ]],
                ["PRAGMA index_list(comments)", [], []],
                ["PRAGMA foreign_key_list(comments)", [], []],
            ]);

        $this->typeMapper->expects($this->any())
            ->method('mapColumnType')
            ->willReturn(new TypeDefinition(
                phpType: 'string',
                docType: 'string',
                dbType: 'varchar',
                length: 255,
                precision: null,
                attributes: []
            ));

        $table = $this->analyzer->analyzeTable('comments');
        $relationships = $table->relationships;

        $this->assertCount(1, $relationships);
        $this->assertSame('morphTo', $relationships[0]->type);
        $this->assertSame('commentable', $relationships[0]->name);
    }

    private function getTestColumns(): array
    {
        return [
            (object) ['name' => 'id', 'type' => 'integer', 'notnull' => 1, 'dflt_value' => null, 'pk' => 1],
            (object) ['name' => 'email', 'type' => 'varchar', 'notnull' => 1, 'dflt_value' => null, 'pk' => 0],
            (object) ['name' => 'created_at', 'type' => 'datetime', 'notnull' => 0, 'dflt_value' => null, 'pk' => 0],
            (object) ['name' => 'updated_at', 'type' => 'datetime', 'notnull' => 0, 'dflt_value' => null, 'pk' => 0],
            (object) ['name' => 'deleted_at', 'type' => 'datetime', 'notnull' => 0, 'dflt_value' => null, 'pk' => 0],
        ];
    }

    private function getTestIndices(): array
    {
        return [
            (object) [
                'name' => 'users_email_unique',
                'unique' => 1,
                'partial' => 0,
            ],
        ];
    }

    private function getTestIndexColumns(): array
    {
        return [
            (object) ['name' => 'email'],
        ];
    }

    private function getTestForeignKeys(): array
    {
        return [];
    }
}
