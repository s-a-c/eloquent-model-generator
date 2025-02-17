<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Domain\Service;

use SAC\EloquentModelGenerator\Model\ModelDefinition;
use SAC\EloquentModelGenerator\Domain\Model\RelationDefinition;

final class ModelTemplateService
{
    private const BASE_MODEL = 'Illuminate\\Database\\Eloquent\\Model';

    public function generateContent(ModelDefinition $model): string
    {
        $content = $this->generateHeader($model);
        $content .= $this->generateClassDefinition($model);
        $content .= $this->generateProperties($model);
        $content .= $this->generateRelations($model);
        $content .= "}\n";

        return $content;
    }

    private function generateHeader(ModelDefinition $model): string
    {
        return sprintf(
            "<?php\n\ndeclare(strict_types=1);\n\nnamespace %s;\n\n",
            $model->getNamespace()
        );
    }

    private function generateClassDefinition(ModelDefinition $model): string
    {
        $imports = $this->generateImports($model);
        $className = $model->getName();

        return sprintf(
            "%sclass %s extends %s\n{\n",
            $imports,
            $className,
            self::BASE_MODEL
        );
    }

    private function generateImports(ModelDefinition $model): string
    {
        $imports = ['use ' . self::BASE_MODEL . ';'];

        if ($model->getRelations()) {
            $imports[] = 'use Illuminate\\Database\\Eloquent\\Relations\\BelongsTo;';
            $imports[] = 'use Illuminate\\Database\\Eloquent\\Relations\\HasMany;';
            $imports[] = 'use Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany;';
        }

        return implode("\n", $imports) . "\n\n";
    }

    private function generateProperties(ModelDefinition $model): string
    {
        $properties = [];

        // Table name
        $properties[] = sprintf('    protected $table = \'%s\';', $model->getTableName());

        // Fillable
        $fillable = array_keys($model->getColumns());
        $properties[] = sprintf(
            "    protected \$fillable = ['%s'];",
            implode("', '", $fillable)
        );

        // Casts
        $casts = $this->generateCasts($model->getColumns());
        if ($casts) {
            $properties[] = sprintf(
                "    protected \$casts = [%s\n    ];",
                $casts
            );
        }

        return implode("\n\n", $properties) . "\n\n";
    }

    private function generateCasts(array $columns): string
    {
        $casts = [];

        foreach ($columns as $name => $column) {
            $cast = match ($column['type']) {
                'integer' => 'integer',
                'float', 'decimal' => 'float',
                'boolean' => 'boolean',
                'date' => 'date',
                'datetime' => 'datetime',
                'json' => 'array',
                default => null
            };

            if ($cast !== null) {
                $casts[] = sprintf("\n        '%s' => '%s',", $name, $cast);
            }
        }

        return implode('', $casts);
    }

    private function generateRelations(ModelDefinition $model): string
    {
        $relations = [];

        foreach ($model->getRelations() as $relation) {
            $relations[] = $this->generateRelation($relation);
        }

        return implode("\n\n", $relations);
    }

    private function generateRelation(array $relation): string
    {
        $type = $relation['type'];
        $name = lcfirst($relation['model']);

        $method = match ($type) {
            'belongsTo' => $this->generateBelongsToRelation($name, $relation),
            'hasMany' => $this->generateHasManyRelation($name, $relation),
            'belongsToMany' => $this->generateBelongsToManyRelation($name, $relation),
            default => throw new \InvalidArgumentException("Unknown relation type: {$type}")
        };

        return $method;
    }

    private function generateBelongsToRelation(string $name, array $relation): string
    {
        return sprintf(
            "    public function %s(): BelongsTo\n    {\n        return \$this->belongsTo(%s::class, '%s', '%s');\n    }",
            $name,
            $relation['model'],
            $relation['foreign_key'],
            $relation['local_key']
        );
    }

    private function generateHasManyRelation(string $name, array $relation): string
    {
        return sprintf(
            "    public function %s(): HasMany\n    {\n        return \$this->hasMany(%s::class, '%s', '%s');\n    }",
            $name,
            $relation['model'],
            $relation['foreign_key'],
            $relation['local_key']
        );
    }

    private function generateBelongsToManyRelation(string $name, array $relation): string
    {
        return sprintf(
            "    public function %s(): BelongsToMany\n    {\n        return \$this->belongsToMany(%s::class, '%s', '%s', '%s');\n    }",
            $name,
            $relation['model'],
            $relation['pivot_table'],
            $relation['foreign_key'],
            $relation['local_key']
        );
    }
}
