<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests\Unit\Domain\Enums;

use PHPUnit\Framework\Attributes\Test;
use SAC\EloquentModelGenerator\Domain\Enums\RelationType;
use SAC\EloquentModelGenerator\Tests\TestCase;

final class RelationTypeTest extends TestCase
{
    #[Test]
    public function it_identifies_polymorphic_relationships(): void
    {
        // Arrange
        $polymorphicTypes = [
            RelationType::MorphTo,
            RelationType::MorphOne,
            RelationType::MorphMany,
            RelationType::MorphToMany,
            RelationType::MorphedByMany,
        ];

        $nonPolymorphicTypes = [
            RelationType::HasOne,
            RelationType::HasMany,
            RelationType::BelongsTo,
            RelationType::BelongsToMany,
            RelationType::HasManyThrough,
            RelationType::HasOneThrough,
        ];

        // Act & Assert
        foreach ($polymorphicTypes as $type) {
            expect($type->isPolymorphic())
                ->toBeTrue("Failed asserting that {$type->value} is polymorphic");
        }

        foreach ($nonPolymorphicTypes as $type) {
            expect($type->isPolymorphic())
                ->toBeFalse("Failed asserting that {$type->value} is not polymorphic");
        }
    }

    #[Test]
    public function it_identifies_to_many_relationships(): void
    {
        // Arrange
        $toManyTypes = [
            RelationType::HasMany,
            RelationType::BelongsToMany,
            RelationType::HasManyThrough,
            RelationType::MorphMany,
            RelationType::MorphToMany,
            RelationType::MorphedByMany,
        ];

        $toOneTypes = [
            RelationType::HasOne,
            RelationType::BelongsTo,
            RelationType::HasOneThrough,
            RelationType::MorphTo,
            RelationType::MorphOne,
        ];

        // Act & Assert
        foreach ($toManyTypes as $type) {
            expect($type->isToMany())
                ->toBeTrue("Failed asserting that {$type->value} is to-many");
        }

        foreach ($toOneTypes as $type) {
            expect($type->isToMany())
                ->toBeFalse("Failed asserting that {$type->value} is not to-many");
        }
    }

    #[Test]
    public function it_generates_method_names(): void
    {
        // Arrange
        $cases = [
            [RelationType::HasOne, 'hasOne'],
            [RelationType::HasMany, 'hasMany'],
            [RelationType::BelongsTo, 'belongsTo'],
            [RelationType::BelongsToMany, 'belongsToMany'],
            [RelationType::HasManyThrough, 'hasManyThrough'],
            [RelationType::HasOneThrough, 'hasOneThrough'],
            [RelationType::MorphTo, 'morphTo'],
            [RelationType::MorphOne, 'morphOne'],
            [RelationType::MorphMany, 'morphMany'],
            [RelationType::MorphToMany, 'morphToMany'],
            [RelationType::MorphedByMany, 'morphedByMany'],
        ];

        foreach ($cases as [$type, $expected]) {
            // Act
            $methodName = $type->getMethodName();

            // Assert
            expect($methodName)->toBe($expected);
        }
    }

    #[Test]
    public function it_has_correct_string_values(): void
    {
        // Arrange
        $cases = [
            [RelationType::HasOne, 'HasOne'],
            [RelationType::HasMany, 'HasMany'],
            [RelationType::BelongsTo, 'BelongsTo'],
            [RelationType::BelongsToMany, 'BelongsToMany'],
            [RelationType::HasManyThrough, 'HasManyThrough'],
            [RelationType::HasOneThrough, 'HasOneThrough'],
            [RelationType::MorphTo, 'MorphTo'],
            [RelationType::MorphOne, 'MorphOne'],
            [RelationType::MorphMany, 'MorphMany'],
            [RelationType::MorphToMany, 'MorphToMany'],
            [RelationType::MorphedByMany, 'MorphedByMany'],
        ];

        foreach ($cases as [$type, $expected]) {
            // Act & Assert
            expect($type->value)->toBe($expected);
        }
    }

    #[Test]
    public function it_has_unique_values(): void
    {
        // Arrange
        $values = array_map(
            fn (RelationType $type) => $type->value,
            RelationType::cases()
        );

        // Act
        $uniqueValues = array_unique($values);

        // Assert
        expect($uniqueValues)->toBe($values);
    }

    #[Test]
    public function it_has_unique_method_names(): void
    {
        // Arrange
        $methodNames = array_map(
            fn (RelationType $type) => $type->getMethodName(),
            RelationType::cases()
        );

        // Act
        $uniqueMethodNames = array_unique($methodNames);

        // Assert
        expect($uniqueMethodNames)->toBe($methodNames);
    }

    #[Test]
    public function it_has_consistent_naming_convention(): void
    {
        foreach (RelationType::cases() as $type) {
            // Assert value follows PascalCase
            expect($type->value)
                ->toMatch('/^[A-Z][a-zA-Z]+$/')
                ->and($type->getMethodName())
                ->toMatch('/^[a-z][a-zA-Z]+$/');
        }
    }
}
