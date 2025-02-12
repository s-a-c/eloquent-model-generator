<?php

namespace SAC\EloquentModelGenerator\Model;

use Illuminate\Support\Str;

class Relations {
    private array $relations = [];

    /**
     * Add a belongs to relation.
     *
     * @param string $name
     * @param string $model
     * @return void
     */
    public function addBelongsTo(string $name, string $model): void {
        $this->relations[] = [
            'type' => 'belongsTo',
            'name' => $name,
            'model' => $model
        ];
    }

    /**
     * Add a has many relation.
     *
     * @param string $name
     * @param string $model
     * @return void
     */
    public function addHasMany(string $name, string $model): void {
        $this->relations[] = [
            'type' => 'hasMany',
            'name' => $name,
            'model' => $model
        ];
    }

    /**
     * Add a many to many relation.
     *
     * @param string $name
     * @param string $model
     * @return void
     */
    public function addManyToMany(string $name, string $model): void {
        $this->relations[] = [
            'type' => 'belongsToMany',
            'name' => $name,
            'model' => $model
        ];
    }

    /**
     * Convert relations to string.
     *
     * @return string
     */
    public function toString(): string {
        $methods = [];
        foreach ($this->relations as $relation) {
            $modelClass = class_basename($relation['model']);
            $methods[] = match ($relation['type']) {
                'belongsTo' => "public function {$relation['name']}() { return \$this->belongsTo({$modelClass}::class); }",
                'hasMany' => "public function {$relation['name']}() { return \$this->hasMany({$modelClass}::class); }",
                'belongsToMany' => "public function {$relation['name']}() { return \$this->belongsToMany({$modelClass}::class); }"
            };
        }
        return implode("\n", $methods);
    }
}
