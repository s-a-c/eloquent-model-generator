<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests\Unit\Services\Schema;

use Illuminate\Database\Connection;
use Illuminate\Database\ConnectionInterface;
use Illuminate\Database\Schema\Builder;
use Mockery;
use Mockery\MockInterface;
use PHPUnit\Framework\TestCase;
use SAC\EloquentModelGenerator\Exceptions\ModelGeneratorSchemaAnalyzerException;
use SAC\EloquentModelGenerator\ValueObjects\Column;

class BaseSchemaAnalyzerTest extends TestCase {
    private TestSchemaAnalyzer $analyzer;
    private MockInterface&ConnectionInterface $connection;
    private MockInterface $schemaBuilder;

    protected function setUp(): void {
        parent::setUp();

        $this->connection = Mockery::mock(Connection::class, ConnectionInterface::class);
        $this->schemaBuilder = Mockery::mock(Builder::class);

        $this->connection->shouldReceive('getTablePrefix')
            ->once()
            ->andReturn('');

        $this->connection->shouldReceive('getSchemaBuilder')
            ->once()
            ->andReturn($this->schemaBuilder);

        $this->analyzer = new TestSchemaAnalyzer($this->connection);
    }

    protected function tearDown(): void {
        Mockery::close();
        parent::tearDown();
    }

    public function testTableExistsReturnsTrueForExistingTable(): void {
        $this->schemaBuilder->shouldReceive('hasTable')
            ->once()
            ->with('users')
            ->andReturn(true);

        $this->assertTrue($this->analyzer->tableExists('users'));
    }

    public function testTableExistsReturnsFalseForNonExistentTable(): void {
        $this->schemaBuilder->shouldReceive('hasTable')
            ->once()
            ->with('non_existent_table')
            ->andReturn(false);

        $this->assertFalse($this->analyzer->tableExists('non_existent_table'));
    }

    public function testAnalyzeThrowsExceptionForNonExistentTable(): void {
        $this->expectException(ModelGeneratorSchemaAnalyzerException::class);
        $this->expectExceptionMessage('Table users does not exist');

        $this->schemaBuilder->shouldReceive('hasTable')
            ->once()
            ->with('users')
            ->andReturn(false);

        $this->analyzer->analyze('users');
    }

    public function testAnalyzeReturnsExpectedSchema(): void {
        $this->schemaBuilder->shouldReceive('hasTable')
            ->once()
            ->with('users')
            ->andReturn(true);

        $columns = [
            new Column(
                name: 'id',
                type: 'integer',
                isPrimary: true,
                isAutoIncrement: true,
                isNullable: false,
                isUnique: true,
                default: null
            ),
            new Column(
                name: 'name',
                type: 'string',
                isPrimary: false,
                isAutoIncrement: false,
                isNullable: false,
                isUnique: false,
                default: null
            ),
        ];

        $relationships = [
            [
                'type' => 'hasMany',
                'foreignTable' => 'posts',
                'foreignKey' => 'user_id',
                'localKey' => 'id',
            ],
        ];

        $this->analyzer->setMockColumns($columns);
        $this->analyzer->setMockRelationships($relationships);

        $result = $this->analyzer->analyze('users');

        $this->assertArrayHasKey('columns', $result);
        $this->assertArrayHasKey('relationships', $result);
        $this->assertCount(2, $result['columns']);
        $this->assertCount(1, $result['relationships']);

        // Verify columns are mapped correctly
        $this->assertArrayHasKey('id', $result['columns']);
        $this->assertArrayHasKey('name', $result['columns']);
        $this->assertSame('integer', $result['columns']['id']['type']);
        $this->assertSame('string', $result['columns']['name']['type']);
        $this->assertTrue($result['columns']['id']['primary']);
        $this->assertFalse($result['columns']['name']['primary']);

        // Verify relationships are mapped correctly
        $this->assertSame($relationships, $result['relationships']);
    }

    public function testGetTablesReturnsExpectedArray(): void {
        $expectedTables = ['users', 'posts', 'comments'];

        $this->schemaBuilder->shouldReceive('getAllTables')
            ->once()
            ->andReturn($expectedTables);

        $result = $this->analyzer->getTables();

        $this->assertSame($expectedTables, $result);
    }

    public function testMapColumnTypeReturnsExpectedTypes(): void {
        $method = new \ReflectionMethod(TestSchemaAnalyzer::class, 'mapColumnType');
        $method->setAccessible(true);

        $testCases = [
            'bigint' => 'integer',
            'int8' => 'integer',
            'integer' => 'integer',
            'int' => 'integer',
            'int4' => 'integer',
            'smallint' => 'integer',
            'int2' => 'integer',
            'decimal' => 'float',
            'numeric' => 'float',
            'real' => 'float',
            'double precision' => 'float',
            'float' => 'float',
            'float4' => 'float',
            'float8' => 'float',
            'boolean' => 'boolean',
            'bool' => 'boolean',
            'date' => 'date',
            'datetime' => 'datetime',
            'timestamp' => 'datetime',
            'time' => 'time',
            'char' => 'string',
            'varchar' => 'string',
            'text' => 'string',
            'string' => 'string',
            'json' => 'json',
            'jsonb' => 'json',
            'binary' => 'binary',
            'blob' => 'binary',
            'mediumblob' => 'binary',
            'longblob' => 'binary',
            'unknown_type' => 'string',
        ];

        foreach ($testCases as $input => $expected) {
            $this->assertSame(
                $expected,
                $method->invoke($this->analyzer, $input),
                "Failed mapping column type '{$input}'"
            );
        }
    }

    public function testGetCastTypeReturnsExpectedTypes(): void {
        $method = new \ReflectionMethod(TestSchemaAnalyzer::class, 'getCastType');
        $method->setAccessible(true);

        $testCases = [
            'int' => 'int',
            'integer' => 'int',
            'tinyint' => 'int',
            'smallint' => 'int',
            'mediumint' => 'int',
            'bigint' => 'int',
            'decimal' => 'float',
            'float' => 'float',
            'double' => 'float',
            'real' => 'float',
            'bool' => 'bool',
            'boolean' => 'bool',
            'date' => 'datetime',
            'datetime' => 'datetime',
            'timestamp' => 'datetime',
            'string' => 'string',
            'text' => 'string',
            'unknown_type' => 'string',
        ];

        foreach ($testCases as $input => $expected) {
            $this->assertSame(
                $expected,
                $method->invoke($this->analyzer, $input),
                "Failed mapping cast type '{$input}'"
            );
        }
    }
}