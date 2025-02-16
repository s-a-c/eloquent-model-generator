<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests\Unit\Services\Schema;

use Illuminate\Database\Connection;
use Illuminate\Database\Schema\Builder;
use Mockery;
use Mockery\MockInterface;
use PHPUnit\Framework\TestCase;
use SAC\EloquentModelGenerator\Services\Schema\SQLiteSchemaAnalyzer;
use SAC\EloquentModelGenerator\Exceptions\SchemaAnalyzerException;

/**
 * SQLite Schema Analyzer Test
 *
 * Tests the SQLite schema analyzer functionality including table analysis,
 * relationship detection, and type mapping.
 */
class SQLiteSchemaAnalyzerTest extends TestCase {
    private SQLiteSchemaAnalyzer $analyzer;
    private MockInterface&Connection $connection;

    protected function setUp(): void {
        parent::setUp();
        $this->connection = Mockery::mock(Connection::class);
        $this->analyzer = new SQLiteSchemaAnalyzer($this->connection);
    }

    protected function tearDown(): void {
        Mockery::close();
        parent::tearDown();
    }

    /**
     * @test
     * @group schema
     */
    public function testTableExistsReturnsTrueForExistingTable(): void {
        $this->connection->shouldReceive('selectOne')
            ->once()
            ->with("SELECT name FROM sqlite_master WHERE type='table' AND name = ?", ['users'])
            ->andReturn((object)['name' => 'users']);

        $this->assertTrue($this->analyzer->tableExists('users'));
    }

    /**
     * @test
     * @group schema
     */
    public function testTableExistsReturnsFalseForNonExistentTable(): void {
        $this->connection->shouldReceive('selectOne')
            ->once()
            ->with("SELECT name FROM sqlite_master WHERE type='table' AND name = ?", ['non_existent'])
            ->andReturnNull();

        $this->assertFalse($this->analyzer->tableExists('non_existent'));
    }

    /**
     * @test
     * @group schema
     */
    public function testAnalyzeReturnsExpectedSchema(): void {
        // Mock table existence check
        $this->connection->shouldReceive('selectOne')
            ->once()
            ->with("SELECT name FROM sqlite_master WHERE type='table' AND name = ?", ['users'])
            ->andReturn((object)['name' => 'users']);

        // Mock table info
        $this->connection->shouldReceive('select')
            ->once()
            ->with('PRAGMA table_info(users)')
            ->andReturn([
                (object)[
                    'name' => 'id',
                    'type' => 'INTEGER',
                    'notnull' => 1,
                    'dflt_value' => null,
                    'pk' => 1,
                ],
                (object)[
                    'name' => 'name',
                    'type' => 'TEXT',
                    'notnull' => 1,
                    'dflt_value' => null,
                    'pk' => 0,
                ],
            ]);

        // Mock index info
        $this->connection->shouldReceive('select')
            ->once()
            ->with('PRAGMA index_list(users)')
            ->andReturn([
                (object)[
                    'name' => 'users_email_unique',
                    'unique' => 1,
                ],
            ]);

        // Mock index columns
        $this->connection->shouldReceive('select')
            ->once()
            ->with('PRAGMA index_info(users_email_unique)')
            ->andReturn([
                (object)['name' => 'email'],
            ]);

        // Mock foreign keys
        $this->connection->shouldReceive('select')
            ->once()
            ->with('PRAGMA foreign_key_list(users)')
            ->andReturn([]);

        $schema = $this->analyzer->analyze('users');

        $this->assertArrayHasKey('columns', $schema);
        $this->assertArrayHasKey('relationships', $schema);
        $this->assertArrayHasKey('id', $schema['columns']);
        $this->assertArrayHasKey('name', $schema['columns']);
        $this->assertTrue($schema['columns']['id']['primary']);
        $this->assertTrue($schema['columns']['id']['auto_increment']);
        $this->assertSame('string', $schema['columns']['name']['type']);
    }

    /**
     * @test
     * @group schema
     */
    public function testAnalyzeDetectsRelationships(): void {
        // Mock table existence
        $this->connection->shouldReceive('selectOne')
            ->once()
            ->with("SELECT name FROM sqlite_master WHERE type='table' AND name = ?", ['posts'])
            ->andReturn((object)['name' => 'posts']);

        // Mock table info
        $this->connection->shouldReceive('select')
            ->once()
            ->with('PRAGMA table_info(posts)')
            ->andReturn([
                (object)[
                    'name' => 'id',
                    'type' => 'INTEGER',
                    'notnull' => 1,
                    'dflt_value' => null,
                    'pk' => 1,
                ],
                (object)[
                    'name' => 'user_id',
                    'type' => 'INTEGER',
                    'notnull' => 1,
                    'dflt_value' => null,
                    'pk' => 0,
                ],
            ]);

        // Mock index info
        $this->connection->shouldReceive('select')
            ->once()
            ->with('PRAGMA index_list(posts)')
            ->andReturn([]);

        // Mock foreign keys
        $this->connection->shouldReceive('select')
            ->once()
            ->with('PRAGMA foreign_key_list(posts)')
            ->andReturn([
                (object)[
                    'table' => 'users',
                    'from' => 'user_id',
                    'to' => 'id',
                ],
            ]);

        // Mock index info for relationship check
        $this->connection->shouldReceive('select')
            ->once()
            ->with('PRAGMA index_info(posts_user_id_foreign)')
            ->andReturn([]);

        $schema = $this->analyzer->analyze('posts');

        $this->assertArrayHasKey('relationships', $schema);
        $this->assertCount(2, $schema['relationships']); // belongsTo and inverse
        $this->assertSame('belongsTo', $schema['relationships'][0]['type']);
        $this->assertSame('users', $schema['relationships'][0]['table']);
    }

    /**
     * @test
     * @group schema
     */
    public function testAnalyzeThrowsExceptionForNonExistentTable(): void {
        $this->connection->shouldReceive('selectOne')
            ->once()
            ->with("SELECT name FROM sqlite_master WHERE type='table' AND name = ?", ['non_existent'])
            ->andReturnNull();

        $this->expectException(SchemaAnalyzerException::class);
        $this->expectExceptionMessage('Table non_existent does not exist');

        $this->analyzer->analyze('non_existent');
    }

    /**
     * @test
     * @group schema
     */
    public function testGetTablesReturnsExpectedTables(): void {
        $this->connection->shouldReceive('table->where->whereNotIn->pluck->toArray')
            ->once()
            ->andReturn(['users', 'posts', 'comments']);

        $tables = $this->analyzer->getTables();

        $this->assertCount(3, $tables);
        $this->assertContains('users', $tables);
        $this->assertContains('posts', $tables);
        $this->assertContains('comments', $tables);
    }

    /**
     * @test
     * @group schema
     * @dataProvider columnTypeProvider
     */
    public function testColumnTypeMappingIsCorrect(string $sqliteType, string $expectedType): void {
        // Mock table existence
        $this->connection->shouldReceive('selectOne')
            ->once()
            ->with("SELECT name FROM sqlite_master WHERE type='table' AND name = ?", ['test'])
            ->andReturn((object)['name' => 'test']);

        // Mock table info
        $this->connection->shouldReceive('select')
            ->once()
            ->with('PRAGMA table_info(test)')
            ->andReturn([
                (object)[
                    'name' => 'column',
                    'type' => $sqliteType,
                    'notnull' => 1,
                    'dflt_value' => null,
                    'pk' => 0,
                ],
            ]);

        // Mock index and foreign key info
        $this->connection->shouldReceive('select')
            ->twice()
            ->andReturn([]);

        $schema = $this->analyzer->analyze('test');
        $this->assertSame($expectedType, $schema['columns']['column']['type']);
    }

    /**
     * @return array<array{string, string}>
     */
    public function columnTypeProvider(): array {
        return [
            ['INTEGER', 'integer'],
            ['REAL', 'float'],
            ['TEXT', 'string'],
            ['BLOB', 'binary'],
            ['BOOLEAN', 'boolean'],
            ['DATETIME', 'datetime'],
            ['DATE', 'date'],
            ['TIME', 'time'],
            ['JSON', 'json'],
            ['CUSTOM_TYPE', 'string'], // Default type
        ];
    }
}