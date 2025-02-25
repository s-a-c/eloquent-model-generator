<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests\Unit\Domain\ValueObjects;

use PHPUnit\Framework\Attributes\Test;
use SAC\EloquentModelGenerator\Domain\ValueObjects\ColumnDefinition;
use SAC\EloquentModelGenerator\Tests\TestCase;

final class ColumnDefinitionTest extends TestCase
{
    #[Test]
    public function it_creates_column_definition(): void
    {
        // Act
        $column = new ColumnDefinition(
            name: 'email',
            type: 'string',
            nullable: false,
            default: null,
            isPrimary: false,
            isUnique: true,
            length: 255,
            attributes: ['searchable' => true],
        );

        // Assert
        expect($column->name)->toBe('email')
            ->and($column->type)->toBe('string')
            ->and($column->nullable)->toBeFalse()
            ->and($column->default)->toBeNull()
            ->and($column->isPrimary)->toBeFalse()
            ->and($column->isUnique)->toBeTrue()
            ->and($column->length)->toBe(255)
            ->and($column->attributes)->toBe(['searchable' => true]);
    }

    #[Test]
    public function it_maps_php_types(): void
    {
        // Arrange
        $cases = [
            ['integer', 'int'],
            ['bigint', 'int'],
            ['smallint', 'int'],
            ['decimal', 'float'],
            ['float', 'float'],
            ['boolean', 'bool'],
            ['datetime', '\DateTime'],
            ['date', '\DateTimeInterface'],
            ['json', 'array'],
            ['text', 'string'],
            ['varchar', 'string'],
            ['unknown', 'string'],
        ];

        foreach ($cases as [$dbType, $phpType]) {
            // Act
            $column = new ColumnDefinition('test', $dbType);

            // Assert
            expect($column->getPhpType())
                ->toBe($phpType, "Failed mapping {$dbType} to {$phpType}");
        }
    }

    #[Test]
    public function it_generates_type_hints(): void
    {
        // Arrange
        $cases = [
            [
                'column' => new ColumnDefinition('id', 'integer'),
                'expected' => 'int',
            ],
            [
                'column' => new ColumnDefinition('name', 'string', true),
                'expected' => '?string',
            ],
            [
                'column' => new ColumnDefinition('created_at', 'datetime'),
                'expected' => '\DateTime',
            ],
            [
                'column' => new ColumnDefinition('metadata', 'json', true),
                'expected' => '?array',
            ],
        ];

        foreach ($cases as $case) {
            // Act
            $typeHint = $case['column']->getTypeHint();

            // Assert
            expect($typeHint)->toBe($case['expected']);
        }
    }

    #[Test]
    public function it_generates_docblock_types(): void
    {
        // Arrange
        $cases = [
            [
                'column' => new ColumnDefinition('id', 'integer'),
                'expected' => 'int',
            ],
            [
                'column' => new ColumnDefinition('name', 'string', true),
                'expected' => 'string|null',
            ],
            [
                'column' => new ColumnDefinition('created_at', 'datetime'),
                'expected' => '\DateTime',
            ],
            [
                'column' => new ColumnDefinition('metadata', 'json', true),
                'expected' => 'array|null',
            ],
        ];

        foreach ($cases as $case) {
            // Act
            $docType = $case['column']->getDocblockType();

            // Assert
            expect($docType)->toBe($case['expected']);
        }
    }

    #[Test]
    public function it_determines_cast_types(): void
    {
        // Arrange
        $cases = [
            [
                'column' => new ColumnDefinition('id', 'integer'),
                'expected' => 'integer',
            ],
            [
                'column' => new ColumnDefinition('amount', 'decimal'),
                'expected' => 'float',
            ],
            [
                'column' => new ColumnDefinition('is_active', 'boolean'),
                'expected' => 'boolean',
            ],
            [
                'column' => new ColumnDefinition('created_at', 'datetime'),
                'expected' => 'datetime',
            ],
            [
                'column' => new ColumnDefinition('metadata', 'json'),
                'expected' => 'array',
            ],
            [
                'column' => new ColumnDefinition('name', 'string'),
                'expected' => null,
            ],
        ];

        foreach ($cases as $case) {
            // Act
            $castType = $case['column']->getCastType();

            // Assert
            expect($castType)->toBe($case['expected']);
        }
    }

    #[Test]
    public function it_determines_if_column_should_be_cast(): void
    {
        // Arrange
        $cases = [
            ['integer', true],
            ['decimal', true],
            ['boolean', true],
            ['datetime', true],
            ['json', true],
            ['string', false],
            ['text', false],
        ];

        foreach ($cases as [$type, $shouldCast]) {
            // Act
            $column = new ColumnDefinition('test', $type);

            // Assert
            expect($column->shouldCast())
                ->toBe($shouldCast, "Failed asserting that {$type} should".($shouldCast ? '' : ' not').' be cast');
        }
    }

    #[Test]
    public function it_generates_validation_rules(): void
    {
        // Arrange
        $cases = [
            [
                'column' => new ColumnDefinition('name', 'string', false),
                'expected' => ['required', 'string'],
            ],
            [
                'column' => new ColumnDefinition('email', 'string', true, null, false, true),
                'expected' => ['string', 'unique'],
            ],
            [
                'column' => new ColumnDefinition('age', 'integer', true),
                'expected' => ['integer'],
            ],
            [
                'column' => new ColumnDefinition('bio', 'text', true, null, false, false, 1000),
                'expected' => ['string', 'max:1000'],
            ],
            [
                'column' => new ColumnDefinition('is_active', 'boolean', false),
                'expected' => ['required', 'boolean'],
            ],
            [
                'column' => new ColumnDefinition('created_at', 'datetime', true),
                'expected' => ['date'],
            ],
            [
                'column' => new ColumnDefinition('metadata', 'json', true),
                'expected' => ['array'],
            ],
        ];

        foreach ($cases as $case) {
            // Act
            $rules = $case['column']->getValidationRules();

            // Assert
            expect($rules)->toBe($case['expected']);
        }
    }

    #[Test]
    public function it_handles_custom_attributes(): void
    {
        // Arrange
        $column = new ColumnDefinition(
            name: 'point',
            type: 'point',
            attributes: [
                'cast' => 'App\\Casts\\PointCast',
                'validation' => ['latitude', 'longitude'],
            ],
        );

        // Act & Assert
        expect($column->attributes)
            ->toHaveKey('cast')
            ->toHaveKey('validation')
            ->and($column->attributes['cast'])->toBe('App\\Casts\\PointCast')
            ->and($column->attributes['validation'])->toBe(['latitude', 'longitude']);
    }
}
