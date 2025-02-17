<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Domain\Relationship;

use Illuminate\Support\Collection;

/**
 * Immutable value object representing a database relationship
 */
final class Relationship
{
    /**
     * @param string $type Relationship type (belongsTo, hasMany, etc.)
     * @param string $localTable Local table name
     * @param string $foreignTable Foreign table name
     * @param Collection<string> $keys Key columns involved in the relationship
     * @param array<string, mixed> $attributes Additional attributes
     */
    private function __construct(
        private readonly string $type,
        private readonly string $localTable,
        private readonly string $foreignTable,
        private readonly Collection $keys,
        private readonly array $attributes = []
    ) {
    }

    /**
     * Create a belongsTo relationship
     */
    public static function belongsTo(
        string $localTable,
        string $foreignTable,
        string $foreignKey,
        ?string $ownerKey = null
    ): self {
        return new self(
            'belongsTo',
            $localTable,
            $foreignTable,
            collect([$foreignKey]),
            ['owner_key' => $ownerKey]
        );
    }

    /**
     * Create a hasMany relationship
     */
    public static function hasMany(
        string $localTable,
        string $foreignTable,
        string $foreignKey,
        ?string $localKey = null
    ): self {
        return new self(
            'hasMany',
            $localTable,
            $foreignTable,
            collect([$foreignKey]),
            ['local_key' => $localKey]
        );
    }

    /**
     * Create a belongsToMany relationship
     */
    public static function belongsToMany(
        string $localTable,
        string $foreignTable,
        string $pivotTable,
        string $foreignPivotKey,
        string $relatedPivotKey
    ): self {
        return new self(
            'belongsToMany',
            $localTable,
            $foreignTable,
            collect([$foreignPivotKey, $relatedPivotKey]),
            [
                'pivot_table' => $pivotTable,
                'foreign_pivot_key' => $foreignPivotKey,
                'related_pivot_key' => $relatedPivotKey
            ]
        );
    }

    public function type(): string
    {
        return $this->type;
    }

    public function localTable(): string
    {
        return $this->localTable;
    }

    public function foreignTable(): string
    {
        return $this->foreignTable;
    }

    /**
     * @return Collection<string>
     */
    public function keys(): Collection
    {
        return $this->keys;
    }

    /**
     * @return array<string, mixed>
     */
    public function attributes(): array
    {
        return $this->attributes;
    }

    public function getAttribute(string $key): mixed
    {
        return $this->attributes[$key] ?? null;
    }

    public function isPivotRelationship(): bool
    {
        return $this->type === 'belongsToMany';
    }

    public function getPivotTable(): ?string
    {
        return $this->getAttribute('pivot_table');
    }
}
