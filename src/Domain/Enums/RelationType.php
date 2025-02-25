<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Domain\Enums;

enum RelationType: string
{
    case HasOne = 'hasOne';
    case HasMany = 'hasMany';
    case BelongsTo = 'belongsTo';
    case BelongsToMany = 'belongsToMany';
    case HasManyThrough = 'hasManyThrough';
    case HasOneThrough = 'hasOneThrough';
    case MorphTo = 'morphTo';
    case MorphOne = 'morphOne';
    case MorphMany = 'morphMany';
    case MorphToMany = 'morphToMany';
    case MorphedByMany = 'morphedByMany';

    /**
     * Check if the relationship type is polymorphic.
     */
    public function isPolymorphic(): bool
    {
        return match ($this) {
            self::MorphTo,
            self::MorphOne,
            self::MorphMany,
            self::MorphToMany,
            self::MorphedByMany => true,
            default => false,
        };
    }

    /**
     * Check if the relationship type is a "to-many" relationship.
     */
    public function isToMany(): bool
    {
        return match ($this) {
            self::HasMany,
            self::BelongsToMany,
            self::HasManyThrough,
            self::MorphMany,
            self::MorphToMany,
            self::MorphedByMany => true,
            default => false,
        };
    }

    /**
     * Get the method name for this relationship type.
     */
    public function getMethodName(): string
    {
        return lcfirst($this->value);
    }
}
