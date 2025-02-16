<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests\Unit\Services\TypeMapping;

use PHPUnit\Framework\TestCase;
use SAC\EloquentModelGenerator\Services\TypeMapping\SQLiteTypeMapper;

/**
 * SQLite Type Mapper Test
 *
 * Tests the SQLite type mapper functionality for mapping database types
 * to PHP types, doc types, and cast types.
 */
class SQLiteTypeMapperTest extends TestCase {
    private SQLiteTypeMapper $mapper;

    protected function setUp(): void {
        parent::setUp();
        $this->mapper = new SQLiteTypeMapper();
    }

    /**
     * @test
     * @dataProvider phpTypeProvider
     */
    public function testMapToPhpType(string $columnType, bool $nullable, string $expected): void {
        $result = $this->mapper->mapToPhpType($columnType, $nullable);
        $this->assertSame($expected, $result);
    }

    /**
     * @return array<array{string, bool, string}>
     */
    public function phpTypeProvider(): array {
        return [
            // Integer types
            ['integer', false, 'int'],
            ['integer', true, 'int|null'],
            ['int', false, 'int'],
            ['bigint', false, 'int'],
            ['smallint', false, 'int'],

            // Float types
            ['real', false, 'float'],
            ['real', true, 'float|null'],
            ['double', false, 'float'],
            ['float', false, 'float'],
            ['decimal', false, 'float'],

            // String types
            ['text', false, 'string'],
            ['text', true, 'string|null'],
            ['varchar', false, 'string'],
            ['char', false, 'string'],
            ['clob', false, 'string'],

            // Boolean type
            ['boolean', false, 'bool'],
            ['boolean', true, 'bool|null'],

            // DateTime types
            ['datetime', false, '\Carbon\Carbon'],
            ['datetime', true, '?\Carbon\Carbon'],
            ['timestamp', false, '\Carbon\Carbon'],
            ['date', false, '\Carbon\Carbon'],

            // JSON type
            ['json', false, 'array'],
            ['json', true, 'array|null'],

            // Binary types
            ['blob', false, 'resource'],
            ['blob', true, 'resource|null'],

            // Types with precision
            ['varchar(255)', false, 'string'],
            ['decimal(10,2)', false, 'float'],
            ['integer(11)', false, 'int'],
        ];
    }

    /**
     * @test
     * @dataProvider docTypeProvider
     */
    public function testMapToDocType(string $columnType, bool $nullable, string $expected): void {
        $result = $this->mapper->mapToDocType($columnType, $nullable);
        $this->assertSame($expected, $result);
    }

    /**
     * @return array<array{string, bool, string}>
     */
    public function docTypeProvider(): array {
        return [
            ['integer', false, 'int'],
            ['integer', true, 'int|null'],
            ['text', false, 'string'],
            ['text', true, 'string|null'],
            ['datetime', false, '\Carbon\Carbon'],
            ['datetime', true, '\Carbon\Carbon|null'],
            ['json', false, 'array'],
            ['json', true, 'array|null'],
        ];
    }

    /**
     * @test
     * @dataProvider castTypeProvider
     */
    public function testMapToCastType(string $columnType, ?string $expected): void {
        $result = $this->mapper->mapToCastType($columnType);
        $this->assertSame($expected, $result);
    }

    /**
     * @return array<array{string, string|null}>
     */
    public function castTypeProvider(): array {
        return [
            ['integer', 'integer'],
            ['real', 'float'],
            ['text', null],
            ['boolean', 'boolean'],
            ['datetime', 'datetime'],
            ['date', 'date'],
            ['time', 'time'],
            ['json', 'array'],
            ['blob', null],
        ];
    }

    /**
     * @test
     * @dataProvider customCastProvider
     */
    public function testRequiresCustomCast(string $columnType, bool $expected): void {
        $result = $this->mapper->requiresCustomCast($columnType);
        $this->assertSame($expected, $result);
    }

    /**
     * @return array<array{string, bool}>
     */
    public function customCastProvider(): array {
        return [
            ['json', true],
            ['array', true],
            ['object', true],
            ['collection', true],
            ['integer', false],
            ['text', false],
            ['datetime', false],
        ];
    }

    /**
     * @test
     * @dataProvider customCastClassProvider
     */
    public function testGetCustomCastClass(string $columnType, ?string $expected): void {
        $result = $this->mapper->getCustomCastClass($columnType);
        $this->assertSame($expected, $result);
    }

    /**
     * @return array<array{string, string|null}>
     */
    public function customCastClassProvider(): array {
        return [
            ['json', 'Illuminate\Database\Eloquent\Casts\AsArrayObject'],
            ['array', 'Illuminate\Database\Eloquent\Casts\AsArrayObject'],
            ['object', 'Illuminate\Database\Eloquent\Casts\AsStringable'],
            ['collection', 'Illuminate\Database\Eloquent\Casts\AsCollection'],
            ['integer', null],
            ['text', null],
            ['datetime', null],
        ];
    }

    /**
     * @test
     */
    public function testHandlesTypesWithPrecision(): void {
        $types = [
            'varchar(255)' => 'string',
            'decimal(10,2)' => 'float',
            'numeric(8,3)' => 'float',
            'integer(11)' => 'int',
        ];

        foreach ($types as $columnType => $expected) {
            $result = $this->mapper->mapToPhpType($columnType);
            $this->assertSame($expected, $result, "Failed mapping {$columnType}");
        }
    }

    /**
     * @test
     */
    public function testHandlesUnknownTypes(): void {
        $types = [
            'custom_type',
            'unknown',
            'nonexistent',
        ];

        foreach ($types as $type) {
            $result = $this->mapper->mapToPhpType($type);
            $this->assertSame('string', $result, "Failed handling unknown type {$type}");
        }
    }

    /**
     * @test
     */
    public function testHandlesCaseInsensitiveTypes(): void {
        $variations = [
            'INTEGER' => 'int',
            'Text' => 'string',
            'DATETIME' => '\Carbon\Carbon',
            'Boolean' => 'bool',
            'JSON' => 'array',
        ];

        foreach ($variations as $type => $expected) {
            $result = $this->mapper->mapToPhpType($type);
            $this->assertSame($expected, $result, "Failed case-insensitive mapping of {$type}");
        }
    }
}