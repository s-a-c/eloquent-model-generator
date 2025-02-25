<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Domain\ValueObjects;

use InvalidArgumentException;

/**
 * @immutable
 */
final class RelationshipDefinition
{
    public const TYPE_BELONGS_TO = 'belongsTo';

    public const TYPE_HAS_ONE = 'hasOne';

    public const TYPE_HAS_MANY = 'hasMany';

    public const TYPE_MANY_TO_MANY = 'belongsToMany';

    public const TYPE_MORPH_TO = 'morphTo';

    public const TYPE_MORPH_ONE = 'morphOne';

    public const TYPE_MORPH_MANY = 'morphMany';

    /**
     * @param  array<string>  $localKey
     * @param  array<string>  $foreignKey
     * @param  array<string>|null  $pivotColumns
     */
    public function __construct(
        public readonly string $type,
        public readonly string $name,
        public readonly string $relatedModel,
        public readonly array $localKey,
        public readonly array $foreignKey,
        public readonly bool $polymorphic = false,
        public readonly ?string $morphType = null,
        public readonly ?string $morphId = null,
        public readonly ?string $pivotTable = null,
        public readonly ?array $pivotColumns = null,
        public readonly bool $withTimestamps = false,
    ) {}

    /**
     * Get method definition.
     */
    public function getMethodDefinition(): string
    {
        return match ($this->type) {
            self::TYPE_BELONGS_TO => $this->getBelongsToDefinition(),
            self::TYPE_HAS_ONE => $this->getHasOneDefinition(),
            self::TYPE_HAS_MANY => $this->getHasManyDefinition(),
            self::TYPE_MANY_TO_MANY => $this->getManyToManyDefinition(),
            self::TYPE_MORPH_TO => $this->getMorphToDefinition(),
            self::TYPE_MORPH_ONE => $this->getMorphOneDefinition(),
            self::TYPE_MORPH_MANY => $this->getMorphManyDefinition(),
            default => throw new InvalidArgumentException("Unknown relationship type: {$this->type}"),
        };
    }

    /**
     * Get return type.
     */
    public function getReturnType(): string
    {
        return match ($this->type) {
            self::TYPE_BELONGS_TO => '\\Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
            self::TYPE_HAS_ONE => '\\Illuminate\\Database\\Eloquent\\Relations\\HasOne',
            self::TYPE_HAS_MANY => '\\Illuminate\\Database\\Eloquent\\Relations\\HasMany',
            self::TYPE_MANY_TO_MANY => '\\Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany',
            self::TYPE_MORPH_TO => '\\Illuminate\\Database\\Eloquent\\Relations\\MorphTo',
            self::TYPE_MORPH_ONE => '\\Illuminate\\Database\\Eloquent\\Relations\\MorphOne',
            self::TYPE_MORPH_MANY => '\\Illuminate\\Database\\Eloquent\\Relations\\MorphMany',
            default => throw new InvalidArgumentException("Unknown relationship type: {$this->type}"),
        };
    }

    private function getBelongsToDefinition(): string
    {
        $params = [
            $this->relatedModel.'::class',
            "'".$this->foreignKey[0]."'",
        ];

        if ($this->localKey[0] !== 'id') {
            $params[] = "'".$this->localKey[0]."'";
        }

        return '$this->belongsTo('.implode(', ', $params).')';
    }

    private function getHasOneDefinition(): string
    {
        $params = [
            $this->relatedModel.'::class',
            "'".$this->foreignKey[0]."'",
        ];

        if ($this->localKey[0] !== 'id') {
            $params[] = "'".$this->localKey[0]."'";
        }

        return '$this->hasOne('.implode(', ', $params).')';
    }

    private function getHasManyDefinition(): string
    {
        $params = [
            $this->relatedModel.'::class',
            "'".$this->foreignKey[0]."'",
        ];

        if ($this->localKey[0] !== 'id') {
            $params[] = "'".$this->localKey[0]."'";
        }

        return '$this->hasMany('.implode(', ', $params).')';
    }

    private function getManyToManyDefinition(): string
    {
        $params = [
            $this->relatedModel.'::class',
            "'".$this->pivotTable."'",
            "'".$this->foreignKey[0]."'",
            "'".$this->localKey[0]."'",
        ];

        $definition = '$this->belongsToMany('.implode(', ', $params).')';

        if ($this->withTimestamps) {
            $definition .= '->withTimestamps()';
        }

        if ($this->pivotColumns) {
            $columns = array_map(fn ($col) => "'$col'", $this->pivotColumns);
            $definition .= '->withPivot('.implode(', ', $columns).')';
        }

        return $definition;
    }

    private function getMorphToDefinition(): string
    {
        return '$this->morphTo()';
    }

    private function getMorphOneDefinition(): string
    {
        $params = [
            $this->relatedModel.'::class',
            "'".$this->morphType."'",
            "'".$this->morphId."'",
        ];

        return '$this->morphOne('.implode(', ', $params).')';
    }

    private function getMorphManyDefinition(): string
    {
        $params = [
            $this->relatedModel.'::class',
            "'".$this->morphType."'",
            "'".$this->morphId."'",
        ];

        return '$this->morphMany('.implode(', ', $params).')';
    }
}
