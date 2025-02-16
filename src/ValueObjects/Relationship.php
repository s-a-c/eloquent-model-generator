<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\ValueObjects;

/**
 * Relationship Value Object
 *
 * Represents a database relationship between tables.
 */
class Relationship {
    /**
     * @param string $type The relationship type (e.g., hasOne, hasMany, belongsTo)
     * @param string|null $table The related table name
     * @param string|null $foreignKey The foreign key column name
     * @param string|null $localKey The local key column name
     * @param string $name The relationship method name
     * @param string|null $pivotTable The pivot table name for many-to-many relationships
     * @param string|null $pivotForeignKey The pivot table foreign key
     * @param string|null $pivotLocalKey The pivot table local key
     * @param string|null $morphType The polymorphic type column
     * @param string|null $morphId The polymorphic ID column
     */
    public function __construct(
        private readonly string $type,
        private readonly ?string $table = null,
        private readonly ?string $foreignKey = null,
        private readonly ?string $localKey = null,
        private readonly string $name = '',
        private readonly ?string $pivotTable = null,
        private readonly ?string $pivotForeignKey = null,
        private readonly ?string $pivotLocalKey = null,
        private readonly ?string $morphType = null,
        private readonly ?string $morphId = null,
    ) {
    }

    /**
     * Get the relationship type.
     *
     * @return string
     */
    public function getType(): string {
        return $this->type;
    }

    /**
     * Get the related table name.
     *
     * @return string|null
     */
    public function getTable(): ?string {
        return $this->table;
    }

    /**
     * Get the foreign key column name.
     *
     * @return string|null
     */
    public function getForeignKey(): ?string {
        return $this->foreignKey;
    }

    /**
     * Get the local key column name.
     *
     * @return string|null
     */
    public function getLocalKey(): ?string {
        return $this->localKey;
    }

    /**
     * Get the relationship method name.
     *
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * Get the pivot table name.
     *
     * @return string|null
     */
    public function getPivotTable(): ?string {
        return $this->pivotTable;
    }

    /**
     * Get the pivot table foreign key.
     *
     * @return string|null
     */
    public function getPivotForeignKey(): ?string {
        return $this->pivotForeignKey;
    }

    /**
     * Get the pivot table local key.
     *
     * @return string|null
     */
    public function getPivotLocalKey(): ?string {
        return $this->pivotLocalKey;
    }

    /**
     * Get the polymorphic type column.
     *
     * @return string|null
     */
    public function getMorphType(): ?string {
        return $this->morphType;
    }

    /**
     * Get the polymorphic ID column.
     *
     * @return string|null
     */
    public function getMorphId(): ?string {
        return $this->morphId;
    }

    /**
     * Check if the relationship is a "belongs to" type.
     *
     * @return bool
     */
    public function isBelongsTo(): bool {
        return $this->type === 'belongsTo';
    }

    /**
     * Check if the relationship is a "has one" type.
     *
     * @return bool
     */
    public function isHasOne(): bool {
        return $this->type === 'hasOne';
    }

    /**
     * Check if the relationship is a "has many" type.
     *
     * @return bool
     */
    public function isHasMany(): bool {
        return $this->type === 'hasMany';
    }

    /**
     * Check if the relationship is a "belongs to many" type.
     *
     * @return bool
     */
    public function isBelongsToMany(): bool {
        return $this->type === 'belongsToMany';
    }

    /**
     * Check if the relationship is polymorphic.
     *
     * @return bool
     */
    public function isPolymorphic(): bool {
        return in_array($this->type, ['morphOne', 'morphMany', 'morphTo'], true);
    }

    /**
     * Check if the relationship uses a pivot table.
     *
     * @return bool
     */
    public function hasPivotTable(): bool {
        return $this->pivotTable !== null;
    }

    /**
     * Get the method definition for this relationship.
     *
     * @return string
     */
    public function getMethodDefinition(): string {
        return match ($this->type) {
            'belongsTo' => $this->getBelongsToDefinition(),
            'hasOne' => $this->getHasOneDefinition(),
            'hasMany' => $this->getHasManyDefinition(),
            'belongsToMany' => $this->getBelongsToManyDefinition(),
            'morphOne', 'morphMany' => $this->getMorphDefinition(),
            'morphTo' => $this->getMorphToDefinition(),
            default => throw new \InvalidArgumentException("Unknown relationship type: {$this->type}"),
        };
    }

    /**
     * Get the method definition for a "belongs to" relationship.
     *
     * @return string
     */
    private function getBelongsToDefinition(): string {
        return "return \$this->belongsTo({$this->table}::class, '{$this->foreignKey}', '{$this->localKey}');";
    }

    /**
     * Get the method definition for a "has one" relationship.
     *
     * @return string
     */
    private function getHasOneDefinition(): string {
        return "return \$this->hasOne({$this->table}::class, '{$this->foreignKey}', '{$this->localKey}');";
    }

    /**
     * Get the method definition for a "has many" relationship.
     *
     * @return string
     */
    private function getHasManyDefinition(): string {
        return "return \$this->hasMany({$this->table}::class, '{$this->foreignKey}', '{$this->localKey}');";
    }

    /**
     * Get the method definition for a "belongs to many" relationship.
     *
     * @return string
     */
    private function getBelongsToManyDefinition(): string {
        return "return \$this->belongsToMany({$this->table}::class, '{$this->pivotTable}', '{$this->pivotForeignKey}', '{$this->pivotLocalKey}');";
    }

    /**
     * Get the method definition for a morphOne/morphMany relationship.
     *
     * @return string
     */
    private function getMorphDefinition(): string {
        $method = $this->type === 'morphOne' ? 'morphOne' : 'morphMany';
        return "return \$this->{$method}({$this->table}::class, '{$this->name}');";
    }

    /**
     * Get the method definition for a morphTo relationship.
     *
     * @return string
     */
    private function getMorphToDefinition(): string {
        return "return \$this->morphTo();";
    }
}