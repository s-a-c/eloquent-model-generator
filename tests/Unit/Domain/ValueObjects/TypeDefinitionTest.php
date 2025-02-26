<?php

declare(strict_types=1);

namespace Tests\Unit\Domain\ValueObjects;

use PHPUnit\Framework\TestCase;
use SAC\EloquentModelGenerator\Domain\ValueObjects\TypeDefinition;

class TypeDefinitionTest extends TestCase
{

    /** @test */
    public function it_creates_type_definition_with_basic_properties(): void
    {

        $type = new TypeDefinition(
            phpType: 'string',
            docType: 'string',
            dbType: 'varchar',
            length: 255,
            precision: NULL,
            attributes: [],
        );

        $this->assertSame('string', $type->phpType);
        $this->assertSame('string', $type->docType);
        $this->assertSame('varchar', $type->dbType);
        $this->assertSame(255, $type->length);
        $this->assertNull($type->precision);
        $this->assertEmpty($type->attributes);
    }

    /** @test */
    public function it_handles_nullable_types(): void
    {

        $type = new TypeDefinition(
            phpType: 'string',
            docType: 'string',
            dbType: 'varchar',
            length: NULL,
            precision: NULL,
            attributes: ['nullable' => TRUE],
        );

        $this->assertSame('null|string', $type->getDocTypeAnnotation());
        $this->assertSame('?string', $type->getPhpTypeDeclaration());
    }

    /** @test */
    public function it_handles_array_types(): void
    {

        $type = new TypeDefinition(
            phpType: 'array',
            docType: 'string',
            dbType: 'json',
            length: NULL,
            precision: NULL,
            attributes: ['isArray' => TRUE],
        );

        $this->assertSame('array<string>', $type->getDocTypeAnnotation());
        $this->assertSame('array', $type->getPhpTypeDeclaration());
    }

    /** @test */
    public function it_handles_datetime_types(): void
    {

        $type = new TypeDefinition(
            phpType: 'string',
            docType: '\DateTime',
            dbType: 'datetime',
            length: NULL,
            precision: NULL,
            attributes: ['cast' => 'datetime'],
        );

        $this->assertSame('\DateTime', $type->getDocTypeAnnotation());
        $this->assertSame('string', $type->getPhpTypeDeclaration());
        $this->assertSame('datetime', $type->getCastType());
    }

    /** @test */
    public function it_handles_numeric_types_with_precision(): void
    {

        $type = new TypeDefinition(
            phpType: 'float',
            docType: 'float',
            dbType: 'decimal',
            length: 10,
            precision: 2,
            attributes: [],
        );

        $this->assertSame('float', $type->getDocTypeAnnotation());
        $this->assertSame('float', $type->getPhpTypeDeclaration());
        $this->assertSame(10, $type->length);
        $this->assertSame(2, $type->precision);
    }

    /** @test */
    public function it_provides_attribute_access_methods(): void
    {

        $type = new TypeDefinition(
            phpType: 'string',
            docType: 'string',
            dbType: 'enum',
            length: NULL,
            precision: NULL,
            attributes: [
                'enum'   => TRUE,
                'values' => ['active', 'inactive'],
            ],
        );

        $this->assertTrue($type->hasAttribute('enum'));
        $this->assertFalse($type->hasAttribute('nonexistent'));
        $this->assertTrue($type->getAttribute('enum'));
        $this->assertSame(['active', 'inactive'], $type->getAttribute('values'));
        $this->assertNull($type->getAttribute('nonexistent'));
        $this->assertSame('default', $type->getAttribute('nonexistent', 'default'));
    }

    /** @test */
    public function it_handles_complex_type_combinations(): void
    {

        $type = new TypeDefinition(
            phpType: 'array',
            docType: '\DateTime',
            dbType: 'json',
            length: NULL,
            precision: NULL,
            attributes: [
                'nullable' => TRUE,
                'isArray'  => TRUE,
                'cast'     => 'datetime',
            ],
        );

        $this->assertSame('null|array<\DateTime>', $type->getDocTypeAnnotation());
        $this->assertSame('?array', $type->getPhpTypeDeclaration());
        $this->assertSame('datetime', $type->getCastType());
    }

}
