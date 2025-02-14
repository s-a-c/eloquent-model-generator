<?php

namespace SAC\EloquentModelGenerator\Model;

use InvalidArgumentException;
use Illuminate\Support\Str;

/**
 * @phpstan-type RelationType 'hasOne'|'hasMany'|'belongsTo'|'belongsToMany'|'morphTo'|'morphOne'|'morphMany'|'morphToMany'
 * @phpstan-type RelationDefinition array{
 *     type: RelationType,
 *     model: class-string,
 *     name: string,
 *     foreignKey?: string,
 *     localKey?: string,
 *     table?: string,
 *     morphType?: string,
 *     morphClass?: class-string
 * }
 */
class Relations {
    /**
     * @param array<string, array{
     *     type: string,
     *     model: string,
     *     name: string,
     *     foreignKey?: string,
     *     localKey?: string,
     *     table?: string,
     *     pivotColumns?: array<string>
     * }> $relations
     */
    public function __construct(private array $relations = [])
    {
    }

    /**
     * @return array<string, array{
     *     type: string,
     *     model: string,
     *     name: string,
     *     foreignKey?: string,
     *     localKey?: string,
     *     table?: string,
     *     pivotColumns?: array<string>
     * }>
     */
    public function getRelations(): array {
        return $this->relations;
    }

    /**
     * @param array{
     *     type: string,
     *     model: string,
     *     name: string,
     *     foreignKey?: string,
     *     localKey?: string,
     *     table?: string,
     *     pivotColumns?: array<string>
     * } $relation
     */
    public function addRelation(array $relation): void {
        if (!isset($relation['model'], $relation['type'], $relation['name'])) {
            throw new InvalidArgumentException('Relation must have model, type and name fields');
        }

        $modelClass = class_basename($relation['model']);
        $type = strtolower($relation['type']);

        $this->relations[$relation['name']] = match ($type) {
            'hasone' => [
                'type' => 'hasOne',
                'model' => $modelClass,
                'name' => $relation['name']
            ],
            'hasmany' => [
                'type' => 'hasMany',
                'model' => $modelClass,
                'name' => $relation['name']
            ],
            'belongsto' => [
                'type' => 'belongsTo',
                'model' => $modelClass,
                'name' => $relation['name']
            ],
            default => throw new InvalidArgumentException('Unsupported relation type: ' . $type),
        };
    }

    /**
     * Get the relation method definition.
     *
     * @param array<string, RelationDefinition> $relations
     */
    public function getRelationMethods(array $relations): string {
        $methods = [];
        foreach ($relations as $relation) {
            $modelClass = class_basename($relation['model']);
            $type = $relation['type'];
            $name = $relation['name'];

            $method = match ($type) {
                'hasOne' => "public function {$name}() {\n    return \$this->hasOne({$modelClass}::class);\n}",
                'hasMany' => "public function {$name}() {\n    return \$this->hasMany({$modelClass}::class);\n}",
                'belongsTo' => "public function {$name}() {\n    return \$this->belongsTo({$modelClass}::class);\n}",
                'belongsToMany' => "public function {$name}() {\n    return \$this->belongsToMany({$modelClass}::class);\n}",
                'morphTo' => "public function {$name}() {\n    return \$this->morphTo();\n}",
                'morphOne' => "public function {$name}() {\n    return \$this->morphOne({$modelClass}::class);\n}",
                'morphMany' => "public function {$name}() {\n    return \$this->morphMany({$modelClass}::class);\n}",
                'morphToMany' => "public function {$name}() {\n    return \$this->morphToMany({$modelClass}::class);\n}",
                default => throw new InvalidArgumentException('Invalid relation type: ' . $type)
            };

            $methods[] = $method;
        }

        return implode("\n\n", $methods);
    }
}
