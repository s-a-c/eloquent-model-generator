<?php

declare(strict_types=1);

namespace Tests\Unit\Services;

use PHPUnit\Framework\TestCase;
use SAC\EloquentModelGenerator\Config\ModelGeneratorConfig;
use SAC\EloquentModelGenerator\Services\TypeMapper;

class TypeMapperTest extends TestCase
{

    private TypeMapper $typeMapper;

    private ModelGeneratorConfig $config;

    protected function setUp(): void
    {

        parent::setUp();

        $this->config = new ModelGeneratorConfig(
            environment: 'testing',
            additional: [
                'namespace'  => 'App\\Models',
                'base_class' => '\\Illuminate\\Database\\Eloquent\\Model',
            ],
        );

        $this->typeMapper = new TypeMapper($this->config);
    }

    /** @test */
    public function it_maps_integer_types(): void
    {

        $types = ['integer', 'int', 'smallint', 'tinyint', 'mediumint', 'bigint'];

        foreach ($types as $type)
        {
            $definition = $this->typeMapper->mapColumnType($type);

            $this->assertSame('int', $definition->phpType);
            $this->assertSame('int', $definition->docType);
            $this->assertSame($type, $definition->dbType);
        }
    }

    /** @test */
    public function it_maps_float_types(): void
    {

        $types = ['decimal', 'numeric', 'float', 'double', 'real'];

        foreach ($types as $type)
        {
            $definition = $this->typeMapper->mapColumnType($type);

            $this->assertSame('float', $definition->phpType);
            $this->assertSame('float', $definition->docType);
            $this->assertSame($type, $definition->dbType);
        }
    }

    /** @test */
    public function it_maps_string_types(): void
    {

        $types = ['char', 'varchar', 'text', 'mediumtext', 'longtext'];

        foreach ($types as $type)
        {
            $definition = $this->typeMapper->mapColumnType($type);

            $this->assertSame('string', $definition->phpType);
            $this->assertSame('string', $definition->docType);
            $this->assertSame($type, $definition->dbType);
        }
    }

    /** @test */
    public function it_maps_boolean_types(): void
    {

        $types = ['boolean', 'bool', 'bit'];

        foreach ($types as $type)
        {
            $definition = $this->typeMapper->mapColumnType($type);

            $this->assertSame('bool', $definition->phpType);
            $this->assertSame('bool', $definition->docType);
            $this->assertSame($type, $definition->dbType);
        }
    }

    /** @test */
    public function it_maps_datetime_types(): void
    {

        $definition = $this->typeMapper->mapColumnType('datetime');

        $this->assertSame('string', $definition->phpType);
        $this->assertSame('\DateTime', $definition->docType);
        $this->assertSame('datetime', $definition->dbType);
        $this->assertSame('datetime', $definition->getCastType());
    }

    /** @test */
    public function it_maps_json_types(): void
    {

        $types = ['json', 'jsonb'];

        foreach ($types as $type)
        {
            $definition = $this->typeMapper->mapColumnType($type);

            $this->assertSame('array', $definition->phpType);
            $this->assertSame('array', $definition->docType);
            $this->assertSame($type, $definition->dbType);
            $this->assertSame('json', $definition->getCastType());
        }
    }

    /** @test */
    public function it_maps_binary_types(): void
    {

        $types = ['binary', 'varbinary', 'blob', 'mediumblob', 'longblob'];

        foreach ($types as $type)
        {
            $definition = $this->typeMapper->mapColumnType($type);

            $this->assertSame('string', $definition->phpType);
            $this->assertSame('string', $definition->docType);
            $this->assertSame($type, $definition->dbType);
            $this->assertTrue($definition->hasAttribute('binary'));
        }
    }

    /** @test */
    public function it_handles_length_parameter(): void
    {

        $definition = $this->typeMapper->mapColumnType('varchar(255)');

        $this->assertSame('string', $definition->phpType);
        $this->assertSame(255, $definition->length);
    }

    /** @test */
    public function it_handles_precision_parameter(): void
    {

        $definition = $this->typeMapper->mapColumnType('decimal(10,2)');

        $this->assertSame('float', $definition->phpType);
        $this->assertSame(10, $definition->length);
        $this->assertSame(2, $definition->precision);
    }

    /** @test */
    public function it_supports_custom_type_mappings(): void
    {

        $customMapping = [
            'phpType'    => 'Carbon',
            'docType'    => '\Carbon\Carbon',
            'attributes' => ['cast' => 'custom_datetime'],
        ];

        $config = new ModelGeneratorConfig(
            environment: 'testing',
            additional: [
                'namespace'     => 'App\\Models',
                'base_class'    => '\\Illuminate\\Database\\Eloquent\\Model',
                'type_mappings' => ['custom_date' => $customMapping],
            ],
        );

        $typeMapper = new TypeMapper($config);
        $definition = $typeMapper->mapColumnType('custom_date');

        $this->assertSame('Carbon', $definition->phpType);
        $this->assertSame('\Carbon\Carbon', $definition->docType);
        $this->assertSame('custom_datetime', $definition->getCastType());
    }

    /** @test */
    public function it_defaults_to_string_for_unknown_types(): void
    {

        $definition = $this->typeMapper->mapColumnType('unknown_type');

        $this->assertSame('string', $definition->phpType);
        $this->assertSame('string', $definition->docType);
        $this->assertSame('unknown_type', $definition->dbType);
    }

    /** @test */
    public function it_preserves_additional_attributes(): void
    {

        $attributes = ['nullable' => TRUE, 'comment' => 'Test field'];
        $definition = $this->typeMapper->mapColumnType('varchar', $attributes);

        $this->assertTrue($definition->hasAttribute('nullable'));
        $this->assertSame('Test field', $definition->getAttribute('comment'));
    }

    /** @test */
    public function it_handles_enum_types(): void
    {

        $definition = $this->typeMapper->mapColumnType('enum');

        $this->assertSame('string', $definition->phpType);
        $this->assertSame('string', $definition->docType);
        $this->assertTrue($definition->hasAttribute('enum'));
    }

}
