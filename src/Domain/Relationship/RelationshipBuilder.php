<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Domain\Relationship;

use Illuminate\Support\Str;

/**
 * Service for building relationship methods in Eloquent models
 */
final class RelationshipBuilder
{
    /**
     * Build a relationship method
     */
    public function build(Relationship $relationship): string
    {
        return match ($relationship->type()) {
            'belongsTo' => $this->buildBelongsTo($relationship),
            'hasMany' => $this->buildHasMany($relationship),
            'belongsToMany' => $this->buildBelongsToMany($relationship),
            default => throw new UnsupportedRelationshipException(
                sprintf('Unsupported relationship type: %s', $relationship->type())
            ),
        };
    }

    /**
     * Build a belongsTo relationship method
     */
    private function buildBelongsTo(Relationship $relationship): string
    {
        $methodName = Str::camel($relationship->foreignTable());
        $modelClass = Str::studly(Str::singular($relationship->foreignTable()));
        $foreignKey = $relationship->keys()->first();
        $ownerKey = $relationship->getAttribute('owner_key') ?? 'id';

        return <<<PHP
        /**
         * Get the {$methodName} that owns this {$relationship->localTable()}.
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<\\App\\Models\\{$modelClass}, self>
         */
        public function {$methodName}(): \Illuminate\Database\Eloquent\Relations\BelongsTo
        {
            return \$this->belongsTo(\\App\\Models\\{$modelClass}::class, '{$foreignKey}', '{$ownerKey}');
        }
        PHP;
    }

    /**
     * Build a hasMany relationship method
     */
    private function buildHasMany(Relationship $relationship): string
    {
        $methodName = Str::camel(Str::plural($relationship->foreignTable()));
        $modelClass = Str::studly(Str::singular($relationship->foreignTable()));
        $foreignKey = $relationship->keys()->first();
        $localKey = $relationship->getAttribute('local_key') ?? 'id';

        return <<<PHP
        /**
         * Get the {$methodName} for this {$relationship->localTable()}.
         *
         * @return \Illuminate\Database\Eloquent\Relations\HasMany<\\App\\Models\\{$modelClass}>
         */
        public function {$methodName}(): \Illuminate\Database\Eloquent\Relations\HasMany
        {
            return \$this->hasMany(\\App\\Models\\{$modelClass}::class, '{$foreignKey}', '{$localKey}');
        }
        PHP;
    }

    /**
     * Build a belongsToMany relationship method
     */
    private function buildBelongsToMany(Relationship $relationship): string
    {
        $methodName = Str::camel(Str::plural($relationship->foreignTable()));
        $modelClass = Str::studly(Str::singular($relationship->foreignTable()));
        $pivotTable = $relationship->getPivotTable();
        $foreignPivotKey = $relationship->getAttribute('foreign_pivot_key');
        $relatedPivotKey = $relationship->getAttribute('related_pivot_key');

        return <<<PHP
        /**
         * The {$methodName} that belong to this {$relationship->localTable()}.
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<\\App\\Models\\{$modelClass}>
         */
        public function {$methodName}(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
        {
            return \$this->belongsToMany(
                \\App\\Models\\{$modelClass}::class,
                '{$pivotTable}',
                '{$foreignPivotKey}',
                '{$relatedPivotKey}'
            );
        }
        PHP;
    }
}
