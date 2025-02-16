<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Services\Template;

use Illuminate\Support\Str;
use SAC\EloquentModelGenerator\Contracts\ModelTemplate;
use SAC\EloquentModelGenerator\Support\Definitions\ModelDefinition;

class DefaultModelTemplate implements ModelTemplate {
    /**
     * @inheritDoc
     */
    public function render(ModelDefinition $definition, array $docblock): string {
        $uses = $this->getUses($definition);
        $traits = $this->getTraits($definition);
        $properties = $this->getProperties($definition);
        $relations = $this->getRelations($definition);

        return <<<PHP
            <?php

            declare(strict_types=1);

            namespace {$definition->getNamespace()};

            {$uses}

            /**
             * {$definition->getClassName()} Model
             *
            {$this->formatDocblock($docblock)}
             */
            class {$definition->getClassName()} extends {$this->getBaseClass($definition)}
            {{$traits}
                /**
                 * The table associated with the model.
                 *
                 * @var string
                 */
                protected \$table = '{$definition->getTableName()}';

                {$properties}

                {$relations}
            }
            PHP;
    }

    private function getUses(ModelDefinition $definition): string {
        $uses = [];

        // Add base class
        $baseClass = $definition->getBaseClass() ?? 'Illuminate\\Database\\Eloquent\\Model';
        if ($baseClass !== 'Model') {
            $uses[] = $baseClass;
        }

        // Add soft deletes if needed
        if ($definition->withSoftDeletes()) {
            $uses[] = 'Illuminate\\Database\\Eloquent\\SoftDeletes';
        }

        // Add relation classes if needed
        if ($definition->getRelations()->isNotEmpty()) {
            $uses[] = 'Illuminate\\Database\\Eloquent\\Relations\\{BelongsTo, BelongsToMany, HasMany, HasOne, MorphTo}';
        }

        return 'use ' . implode(";\nuse ", array_unique($uses)) . ';';
    }

    private function getTraits(ModelDefinition $definition): string {
        $traits = [];

        if ($definition->withSoftDeletes()) {
            $traits[] = 'use SoftDeletes;';
        }

        return empty($traits) ? '' : "\n    " . implode("\n    ", $traits) . "\n";
    }

    private function getProperties(ModelDefinition $definition): string {
        $properties = [];

        // Add fillable if needed
        if ($definition->withFillable()) {
            $fillable = $definition->getColumns()
                ->reject(fn($col) => $col->isPrimary())
                ->map(fn($col) => "'{$col->getName()}'")
                ->join(', ');

            $properties[] = <<<PHP
                /**
                 * The attributes that are mass assignable.
                 *
                 * @var array<string>
                 */
                protected \$fillable = [{$fillable}];
                PHP;
        }

        // Add casts if needed
        if ($definition->withCasts()) {
            $casts = $definition->getColumns()
                ->mapWithKeys(fn($col) => [$col->getName() => $col->getCastType()])
                ->filter()
                ->map(fn($type, $name) => "'{$name}' => '{$type}'")
                ->join(', ');

            if (!empty($casts)) {
                $properties[] = <<<PHP
                    /**
                     * The attributes that should be cast.
                     *
                     * @var array<string, string>
                     */
                    protected \$casts = [{$casts}];
                    PHP;
            }
        }

        return empty($properties) ? '' : implode("\n\n    ", $properties) . "\n";
    }

    private function getRelations(ModelDefinition $definition): string {
        return $definition->getRelations()
            ->map(function ($relation) {
                $method = match ($relation->type) {
                    'hasOne' => "return \$this->hasOne({$relation->model}::class, '{$relation->foreignKey}', '{$relation->localKey}');",
                    'hasMany' => "return \$this->hasMany({$relation->model}::class, '{$relation->foreignKey}', '{$relation->localKey}');",
                    'belongsTo' => "return \$this->belongsTo({$relation->model}::class, '{$relation->foreignKey}', '{$relation->localKey}');",
                    'belongsToMany' => "return \$this->belongsToMany({$relation->model}::class, '{$relation->table}', '{$relation->foreignPivotKey}', '{$relation->relatedPivotKey}');",
                    'morphTo' => "return \$this->morphTo();",
                    'morphOne' => "return \$this->morphOne({$relation->model}::class, '{$relation->morphName}');",
                    'morphMany' => "return \$this->morphMany({$relation->model}::class, '{$relation->morphName}');",
                    default => throw new \InvalidArgumentException("Unknown relation type: {$relation->type}"),
                };

                return <<<PHP
                    public function {$relation->name}()
                    {
                        {$method}
                    }
                    PHP;
            })
            ->join("\n\n    ");
    }

    private function formatDocblock(array $docblock): string {
        return empty($docblock) ? '' : ' * ' . implode("\n * ", $docblock) . "\n";
    }

    private function getBaseClass(ModelDefinition $definition): string {
        return Str::afterLast($definition->getBaseClass() ?? 'Illuminate\\Database\\Eloquent\\Model', '\\');
    }
}