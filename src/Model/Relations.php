<?php

namespace SAC\EloquentModelGenerator\Model;

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
     * @var array<string, RelationDefinition>
     */
    private array $relations = [];

    /**
     * Add a relation definition.
     *
     * @param string $name
     * @param RelationDefinition $definition
     * @return void
     */
    public function addRelation(string $name, array $definition): void {
        $this->relations[$name] = $definition;
    }

    /**
     * Get all relations.
     *
     * @return array<string, RelationDefinition>
     */
    public function getRelations(): array {
        return $this->relations;
    }

    /**
     * Get the relation method definition.
     *
     * @param array<string, RelationDefinition> $relations
     * @return string
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
                default => throw new \InvalidArgumentException("Invalid relation type: {$type}")
            };

            $methods[] = $method;
        }

        return implode("\n\n", $methods);
    }
}
