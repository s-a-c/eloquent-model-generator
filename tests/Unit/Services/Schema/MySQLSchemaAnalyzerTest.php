<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests\Unit\Services\Schema;

use Illuminate\Database\Connection;
use Illuminate\Database\ConnectionInterface;
use Illuminate\Database\Schema\Builder;
use Illuminate\Support\Facades\DB;
use Mockery;
use Mockery\MockInterface;
use PHPUnit\Framework\TestCase;
use SAC\EloquentModelGenerator\Services\Schema\MySQLSchemaAnalyzer;
use SAC\EloquentModelGenerator\Exceptions\ModelGeneratorSchemaAnalyzerException;
use SAC\EloquentModelGenerator\ValueObjects\Column;

class MySQLSchemaAnalyzerTest extends TestCase {
    private MySQLSchemaAnalyzer $analyzer;
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

        $this->analyzer = new MySQLSchemaAnalyzer($this->connection);
    }

    protected function tearDown(): void {
        Mockery::close();
        parent::tearDown();
    }

    public function testGetColumnsReturnsExpectedColumns(): void {
        $this->connection->shouldReceive('select')
            ->once()
            ->with('SHOW FULL COLUMNS FROM `users`')
            ->andReturn([
                (object) [
                    'Field' => 'id',
                    'Type' => 'int(10) unsigned',
                    'Null' => 'NO',
                    'Key' => 'PRI',
                    'Default' => null,
                    'Extra' => 'auto_increment',
                ],
                (object) [
                    'Field' => 'name',
                    'Type' => 'varchar(255)',
                    'Null' => 'NO',
                    'Key' => '',
                    'Default' => null,
                    'Extra' => '',
                ],
            ]);

        $method = new \ReflectionMethod(MySQLSchemaAnalyzer::class, 'getColumns');
        $method->setAccessible(true);

        $columns = $method->invoke($this->analyzer, 'users');

        $this->assertCount(2, $columns);

        // Verify id column
        $this->assertInstanceOf(Column::class, $columns[0]);
        $this->assertSame('id', $columns[0]->getName());
        $this->assertSame('integer', $columns[0]->getType());
        $this->assertTrue($columns[0]->isPrimary());
        $this->assertTrue($columns[0]->isAutoIncrement());
        $this->assertFalse($columns[0]->isNullable());

        // Verify name column
        $this->assertInstanceOf(Column::class, $columns[1]);
        $this->assertSame('name', $columns[1]->getName());
        $this->assertSame('string', $columns[1]->getType());
        $this->assertFalse($columns[1]->isPrimary());
        $this->assertFalse($columns[1]->isAutoIncrement());
        $this->assertFalse($columns[1]->isNullable());
    }

    public function testGetRelationshipsReturnsExpectedRelationships(): void {
        $this->connection->shouldReceive('select')
            ->once()
            ->with('SELECT * FROM information_schema.KEY_COLUMN_USAGE WHERE TABLE_SCHEMA = DATABASE() AND REFERENCED_TABLE_NAME IS NOT NULL AND TABLE_NAME = ?', ['users'])
            ->andReturn([
                (object) [
                    'COLUMN_NAME' => 'role_id',
                    'REFERENCED_TABLE_NAME' => 'roles',
                    'REFERENCED_COLUMN_NAME' => 'id',
                ],
            ]);

        $method = new \ReflectionMethod(MySQLSchemaAnalyzer::class, 'getRelationships');
        $method->setAccessible(true);

        $relationships = $method->invoke($this->analyzer, 'users');

        $this->assertCount(1, $relationships);
        $this->assertSame([
            'type' => 'belongsTo',
            'foreignTable' => 'roles',
            'foreignKey' => 'role_id',
            'localKey' => 'id',
        ], $relationships[0]);
    }

    public function testGetColumnsThrowsExceptionOnDatabaseError(): void {
        $this->expectException(ModelGeneratorSchemaAnalyzerException::class);
        $this->expectExceptionMessage('Failed to get columns for table users');

        $this->connection->shouldReceive('select')
            ->once()
            ->with('SHOW FULL COLUMNS FROM `users`')
            ->andThrow(new \Exception('Database error'));

        $method = new \ReflectionMethod(MySQLSchemaAnalyzer::class, 'getColumns');
        $method->setAccessible(true);

        $method->invoke($this->analyzer, 'users');
    }

    public function testGetRelationshipsThrowsExceptionOnDatabaseError(): void {
        $this->expectException(ModelGeneratorSchemaAnalyzerException::class);
        $this->expectExceptionMessage('Failed to get relationships for table users');

        $this->connection->shouldReceive('select')
            ->once()
            ->with('SELECT * FROM information_schema.KEY_COLUMN_USAGE WHERE TABLE_SCHEMA = DATABASE() AND REFERENCED_TABLE_NAME IS NOT NULL AND TABLE_NAME = ?', ['users'])
            ->andThrow(new \Exception('Database error'));

        $method = new \ReflectionMethod(MySQLSchemaAnalyzer::class, 'getRelationships');
        $method->setAccessible(true);

        $method->invoke($this->analyzer, 'users');
    }

    public function testParseColumnTypeReturnsExpectedType(): void {
        $method = new \ReflectionMethod(MySQLSchemaAnalyzer::class, 'parseColumnType');
        $method->setAccessible(true);

        $testCases = [
            'int(10)' => 'int',
            'int(10) unsigned' => 'int',
            'bigint(20)' => 'bigint',
            'varchar(255)' => 'varchar',
            'text' => 'text',
            'datetime' => 'datetime',
            'timestamp' => 'timestamp',
            'decimal(8,2)' => 'decimal',
            'enum(\'active\',\'inactive\')' => 'enum',
        ];

        foreach ($testCases as $input => $expected) {
            $this->assertSame(
                $expected,
                $method->invoke($this->analyzer, $input),
                "Failed parsing column type '{$input}'"
            );
        }
    }

    public function testParseColumnLengthReturnsExpectedLength(): void {
        $method = new \ReflectionMethod(MySQLSchemaAnalyzer::class, 'parseColumnLength');
        $method->setAccessible(true);

        $testCases = [
            'int(10)' => 10,
            'int(10) unsigned' => 10,
            'varchar(255)' => 255,
            'decimal(8,2)' => 8,
            'text' => null,
            'datetime' => null,
            'timestamp' => null,
        ];

        foreach ($testCases as $input => $expected) {
            $this->assertSame(
                $expected,
                $method->invoke($this->analyzer, $input),
                "Failed parsing column length '{$input}'"
            );
        }
    }
}