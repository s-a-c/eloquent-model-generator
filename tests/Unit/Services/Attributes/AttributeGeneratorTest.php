<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests\Unit\Services\Attributes;

use PHPUnit\Framework\TestCase;
use SAC\EloquentModelGenerator\Services\Attributes\AttributeGenerator;
use SAC\EloquentModelGenerator\ValueObjects\Column;
use SAC\EloquentModelGenerator\Exceptions\AttributeGeneratorException;

/**
 * Attribute Generator Test
 *
 * Tests the attribute generator functionality for model generation.
 */
class AttributeGeneratorTest extends TestCase {
    private AttributeGenerator $generator;

    protected function setUp(): void {
        parent::setUp();
        $this->generator = new AttributeGenerator();
    }

    /**
     * @test
     */
    public function testGeneratesAccessors(): void {
        $columns = [
            new Column('data', 'json'),
            new Column('settings', 'array'),
            new Column('config', 'object'),
        ];

        $result = $this->generator->generate($columns);

        $this->assertCount(3, $result['accessors']);
        $this->assertStringContainsString('getDataAttribute', $result['accessors'][0]);
        $this->assertStringContainsString('getSettingsAttribute', $result['accessors'][1]);
        $this->assertStringContainsString('getConfigAttribute', $result['accessors'][2]);
    }

    /**
     * @test
     */
    public function testGeneratesMutators(): void {
        $columns = [
            new Column('email', 'string'),
            new Column('password', 'string'),
            new Column('url', 'string'),
        ];

        $result = $this->generator->generate($columns);

        $this->assertCount(3, $result['mutators']);
        $this->assertStringContainsString('setEmailAttribute', $result['mutators'][0]);
        $this->assertStringContainsString('setPasswordAttribute', $result['mutators'][1]);
        $this->assertStringContainsString('setUrlAttribute', $result['mutators'][2]);
    }

    /**
     * @test
     */
    public function testGeneratesCasts(): void {
        $columns = [
            new Column('is_active', 'boolean'),
            new Column('count', 'integer'),
            new Column('price', 'float'),
            new Column('created_at', 'datetime'),
        ];

        $result = $this->generator->generate($columns);

        $this->assertCount(4, $result['casts']);
        $this->assertSame('boolean', $result['casts']['is_active']);
        $this->assertSame('integer', $result['casts']['count']);
        $this->assertSame('float', $result['casts']['price']);
        $this->assertSame('datetime', $result['casts']['created_at']);
    }

    /**
     * @test
     */
    public function testGeneratesProperties(): void {
        $columns = [
            new Column('id', 'integer', primary: true, autoIncrement: true),
            new Column('name', 'string', nullable: false),
            new Column('description', 'text', nullable: true),
        ];

        $result = $this->generator->generate($columns);

        $this->assertCount(3, $result['properties']);
        $this->assertStringContainsString('protected $id;', $result['properties'][0]);
        $this->assertStringContainsString('@var int', $result['properties'][0]);
        $this->assertStringContainsString('protected $name;', $result['properties'][1]);
        $this->assertStringContainsString('@var string', $result['properties'][1]);
        $this->assertStringContainsString('protected $description;', $result['properties'][2]);
        $this->assertStringContainsString('@var string|null', $result['properties'][2]);
    }

    /**
     * @test
     */
    public function testHandlesCustomCasts(): void {
        $columns = [
            new Column('options', 'json', attributes: ['cast' => 'array']),
            new Column('metadata', 'json', attributes: ['cast' => 'object']),
            new Column('tags', 'json', attributes: ['cast' => 'collection']),
        ];

        $result = $this->generator->generate($columns);

        $this->assertCount(3, $result['casts']);
        $this->assertSame('array', $result['casts']['options']);
        $this->assertSame('object', $result['casts']['metadata']);
        $this->assertSame('collection', $result['casts']['tags']);
    }

    /**
     * @test
     */
    public function testHandlesEncryptedColumns(): void {
        $columns = [
            new Column('secret', 'string', attributes: ['encrypted' => true]),
            new Column('api_key', 'string', attributes: ['encrypted' => true]),
        ];

        $result = $this->generator->generate($columns);

        foreach ($result['accessors'] as $accessor) {
            $this->assertStringContainsString('decrypt(', $accessor);
        }

        foreach ($result['mutators'] as $mutator) {
            $this->assertStringContainsString('encrypt(', $mutator);
        }
    }

    /**
     * @test
     */
    public function testGeneratesDocBlocksWithDefaults(): void {
        $columns = [
            new Column('status', 'string', default: 'active'),
            new Column('points', 'integer', default: 0),
        ];

        $result = $this->generator->generate($columns);

        foreach ($result['properties'] as $property) {
            $this->assertStringContainsString('@var', $property);
            $this->assertStringContainsString('default:', $property);
        }
    }

    /**
     * @test
     */
    public function testHandlesInvalidColumnType(): void {
        $columns = [
            new Column('invalid', 'invalid_type'),
        ];

        $this->expectException(AttributeGeneratorException::class);
        $this->expectExceptionMessage('Invalid column type invalid_type');

        $this->generator->generate($columns);
    }

    /**
     * @test
     */
    public function testGeneratesCompleteModelAttributes(): void {
        $columns = [
            new Column('id', 'integer', primary: true, autoIncrement: true),
            new Column('name', 'string'),
            new Column('email', 'string', unique: true),
            new Column('settings', 'json'),
            new Column('is_active', 'boolean', default: true),
            new Column('created_at', 'datetime'),
        ];

        $result = $this->generator->generate($columns);

        // Check all components are generated
        $this->assertArrayHasKey('accessors', $result);
        $this->assertArrayHasKey('mutators', $result);
        $this->assertArrayHasKey('casts', $result);
        $this->assertArrayHasKey('properties', $result);

        // Verify specific elements
        $this->assertStringContainsString('getSettingsAttribute', $result['accessors'][0]);
        $this->assertStringContainsString('setEmailAttribute', $result['mutators'][0]);
        $this->assertSame('boolean', $result['casts']['is_active']);
        $this->assertSame('datetime', $result['casts']['created_at']);
        $this->assertStringContainsString('@var int', $result['properties'][0]);
    }
}