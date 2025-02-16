<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests\Unit\ValueObjects;

use PHPUnit\Framework\TestCase;
use SAC\EloquentModelGenerator\ValueObjects\Column;

/**
 * Column Value Object Test
 *
 * Tests the Column value object functionality and methods.
 */
class ColumnTest extends TestCase {
    /**
     * @test
     */
    public function testBasicColumnProperties(): void {
        $column = new Column(
            name: 'test_column',
            type: 'string',
            nullable: true,
            primary: false,
            unique: true,
            autoIncrement: false,
            default: 'default_value'
        );

        $this->assertSame('test_column', $column->getName());
        $this->assertSame('string', $column->getType());
        $this->assertTrue($column->isNullable());
        $this->assertFalse($column->isPrimary());
        $this->assertTrue($column->isUnique());
        $this->assertFalse($column->isAutoIncrement());
        $this->assertSame('default_value', $column->getDefault());
    }

    /**
     * @test
     */
    public function testPrimaryKeyColumn(): void {
        $column = new Column(
            name: 'id',
            type: 'integer',
            primary: true,
            autoIncrement: true
        );

        $this->assertTrue($column->isPrimary());
        $this->assertTrue($column->isAutoIncrement());
        $this->assertSame('integer', $column->getType());
    }

    /**
     * @test
     */
    public function testColumnAttributes(): void {
        $attributes = [
            'length' => 255,
            'unsigned' => true,
            'comment' => 'Test column',
        ];

        $column = new Column(
            name: 'test',
            type: 'string',
            attributes: $attributes
        );

        $this->assertSame($attributes, $column->getAttributes());
        $this->assertTrue($column->hasAttribute('length'));
        $this->assertSame(255, $column->getAttribute('length'));
        $this->assertNull($column->getAttribute('nonexistent'));
        $this->assertSame('default', $column->getAttribute('nonexistent', 'default'));
    }

    /**
     * @test
     * @dataProvider migrationDefinitionProvider
     */
    public function testMigrationDefinition(Column $column, string $expected): void {
        $this->assertSame($expected, $column->getMigrationDefinition());
    }

    /**
     * @return array<array{Column, string}>
     */
    public function migrationDefinitionProvider(): array {
        return [
            'Basic string column' => [
                new Column('name', 'string'),
                '$table->string(\'name\');',
            ],
            'Nullable text column' => [
                new Column('description', 'text', nullable: true),
                '$table->text(\'description\')->nullable();',
            ],
            'Unique email column' => [
                new Column('email', 'string', unique: true),
                '$table->string(\'email\')->unique();',
            ],
            'Integer with default' => [
                new Column('count', 'integer', default: 0),
                '$table->integer(\'count\')->default(0);',
            ],
            'Auto-increment ID' => [
                new Column('id', 'integer', primary: true, autoIncrement: true),
                '$table->increments(\'id\');',
            ],
        ];
    }

    /**
     * @test
     * @dataProvider phpTypeProvider
     */
    public function testPhpType(Column $column, string $expected): void {
        $this->assertSame($expected, $column->getPhpType());
    }

    /**
     * @return array<array{Column, string}>
     */
    public function phpTypeProvider(): array {
        return [
            'Integer column' => [
                new Column('count', 'integer'),
                'int',
            ],
            'Nullable string' => [
                new Column('name', 'string', nullable: true),
                'string|null',
            ],
            'Boolean' => [
                new Column('active', 'boolean'),
                'bool',
            ],
            'DateTime' => [
                new Column('created_at', 'datetime'),
                '\Carbon\Carbon',
            ],
            'JSON' => [
                new Column('data', 'json'),
                'array',
            ],
        ];
    }

    /**
     * @test
     */
    public function testHasDefault(): void {
        $withDefault = new Column('test', 'string', default: 'value');
        $withoutDefault = new Column('test', 'string');
        $withNullDefault = new Column('test', 'string', default: null);

        $this->assertTrue($withDefault->hasDefault());
        $this->assertFalse($withoutDefault->hasDefault());
        $this->assertFalse($withNullDefault->hasDefault());
    }

    /**
     * @test
     */
    public function testDocType(): void {
        $column = new Column('created_at', 'datetime', nullable: true);
        $this->assertSame('\Carbon\Carbon|null', $column->getDocType());
    }

    /**
     * @test
     */
    public function testComplexColumn(): void {
        $column = new Column(
            name: 'settings',
            type: 'json',
            nullable: true,
            default: '{}',
            attributes: [
                'comment' => 'User settings',
                'cast' => 'array',
            ]
        );

        $this->assertSame('json', $column->getType());
        $this->assertTrue($column->isNullable());
        $this->assertTrue($column->hasDefault());
        $this->assertSame('{}', $column->getDefault());
        $this->assertSame('array', $column->getAttribute('cast'));
        $this->assertSame('$table->json(\'settings\')->nullable()->default(\'{}\');', $column->getMigrationDefinition());
        $this->assertSame('array|null', $column->getPhpType());
    }
}