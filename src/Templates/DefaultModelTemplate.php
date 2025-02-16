<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Templates;

use Illuminate\Support\Facades\Cache;
use SAC\EloquentModelGenerator\Models\GeneratedModel;
use SAC\EloquentModelGenerator\Services\ConfigurationService;

class DefaultModelTemplate implements ModelTemplate {
    private const TEMPLATE_PATH = __DIR__ . '/stubs/model.stub';
    private const CACHE_TTL = 3600; // 1 hour

    public function __construct(
        private readonly ConfigurationService $config
    ) {
    }

    /**
     * Render a model template.
     */
    public function render(GeneratedModel $model): string {
        $cacheKey = $this->getCacheKey($model);

        return Cache::remember(
            $cacheKey,
            $this->getCacheTtl(),
            function () use ($model): string {
                return $this->renderTemplate($model);
            }
        );
    }

    /**
     * Get the template path.
     */
    public function getTemplatePath(): string {
        $path = $this->config->get('templates_path');

        return $path ? $path . '/model.stub' : self::TEMPLATE_PATH;
    }

    /**
     * Get the cache key for a model.
     */
    private function getCacheKey(GeneratedModel $model): string {
        return 'model_template:' . md5(serialize($model->toArray()));
    }

    /**
     * Get the cache TTL.
     */
    private function getCacheTtl(): int {
        return $this->config->get('cache.ttl', self::CACHE_TTL);
    }

    /**
     * Render the template with model data.
     */
    private function renderTemplate(GeneratedModel $model): string {
        $template = file_get_contents($this->getTemplatePath());

        return strtr($template, [
            '{{ namespace }}' => $model->getNamespace(),
            '{{ parent }}' => $model->getBaseClass(),
            '{{ softDeletes }}' => $model->usesSoftDeletes() ? "use Illuminate\\Database\\Eloquent\\SoftDeletes;\n" : '',
            '{{ class }}' => $model->getClassName(),
            '{{ table }}' => $model->getTableName(),
            '{{ fillable }}' => $this->arrayToString($model->getFillable()),
            '{{ hidden }}' => $this->arrayToString($model->getHidden()),
            '{{ casts }}' => $this->arrayToString($model->getCasts()),
            '{{ dates }}' => $this->arrayToString($model->getDates()),
            '{{ rules }}' => $this->arrayToString($model->getValidationRules()),
            '{{ relationships }}' => $this->buildRelationships($model),
        ]);
    }

    /**
     * Convert an array to its string representation.
     *
     * @param array<mixed> $array
     */
    private function arrayToString(array $array): string {
        if (empty($array)) {
            return '[]';
        }

        $items = [];
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $value = $this->arrayToString($value);
            } elseif (is_string($value)) {
                $value = "'$value'";
            } elseif (is_bool($value)) {
                $value = $value ? 'true' : 'false';
            } elseif ($value === null) {
                $value = 'null';
            }

            if (is_string($key)) {
                $items[] = "'$key' => $value";
            } else {
                $items[] = $value;
            }
        }

        return "[\n        " . implode(",\n        ", $items) . "\n    ]";
    }

    /**
     * Build relationship methods.
     */
    private function buildRelationships(GeneratedModel $model): string {
        $relationships = $model->getRelationships();
        if (empty($relationships)) {
            return '';
        }

        $methods = [];
        foreach ($relationships as $name => $relation) {
            $method = $this->buildRelationshipMethod($name, $relation);
            if ($method !== null) {
                $methods[] = $method;
            }
        }

        return "\n" . implode("\n\n", $methods);
    }

    /**
     * Build a relationship method.
     *
     * @param array{
     *     type: string,
     *     model: string,
     *     foreignKey?: string,
     *     localKey?: string,
     *     table?: string,
     *     pivotColumns?: array<string>
     * } $relation
     */
    private function buildRelationshipMethod(string $name, array $relation): ?string {
        $method = match ($relation['type']) {
            'hasOne' => $this->buildHasOneMethod($relation),
            'hasMany' => $this->buildHasManyMethod($relation),
            'belongsTo' => $this->buildBelongsToMethod($relation),
            'belongsToMany' => $this->buildBelongsToManyMethod($relation),
            'morphTo' => 'return $this->morphTo();',
            default => null,
        };

        if ($method === null) {
            return null;
        }

        return <<<PHP
            /**
             * Get the {$name} relationship.
             */
            public function {$name}()
            {
                {$method}
            }
        PHP;
    }

    /**
     * Build a hasOne relationship method.
     *
     * @param array{model: string, foreignKey?: string, localKey?: string} $relation
     */
    private function buildHasOneMethod(array $relation): string {
        $params = array_filter([
            $relation['model'] . '::class',
            isset($relation['foreignKey']) ? "'{$relation['foreignKey']}'" : null,
            isset($relation['localKey']) ? "'{$relation['localKey']}'" : null,
        ]);

        return 'return $this->hasOne(' . implode(', ', $params) . ');';
    }

    /**
     * Build a hasMany relationship method.
     *
     * @param array{model: string, foreignKey?: string, localKey?: string} $relation
     */
    private function buildHasManyMethod(array $relation): string {
        $params = array_filter([
            $relation['model'] . '::class',
            isset($relation['foreignKey']) ? "'{$relation['foreignKey']}'" : null,
            isset($relation['localKey']) ? "'{$relation['localKey']}'" : null,
        ]);

        return 'return $this->hasMany(' . implode(', ', $params) . ');';
    }

    /**
     * Build a belongsTo relationship method.
     *
     * @param array{model: string, foreignKey?: string, localKey?: string} $relation
     */
    private function buildBelongsToMethod(array $relation): string {
        $params = array_filter([
            $relation['model'] . '::class',
            isset($relation['foreignKey']) ? "'{$relation['foreignKey']}'" : null,
            isset($relation['localKey']) ? "'{$relation['localKey']}'" : null,
        ]);

        return 'return $this->belongsTo(' . implode(', ', $params) . ');';
    }

    /**
     * Build a belongsToMany relationship method.
     *
     * @param array{
     *     model: string,
     *     table?: string,
     *     foreignKey?: string,
     *     localKey?: string,
     *     pivotColumns?: array<string>
     * } $relation
     */
    private function buildBelongsToManyMethod(array $relation): string {
        $params = array_filter([
            $relation['model'] . '::class',
            isset($relation['table']) ? "'{$relation['table']}'" : null,
            isset($relation['foreignKey']) ? "'{$relation['foreignKey']}'" : null,
            isset($relation['localKey']) ? "'{$relation['localKey']}'" : null,
        ]);

        $method = 'return $this->belongsToMany(' . implode(', ', $params) . ')';

        if (isset($relation['pivotColumns'])) {
            $pivotColumns = array_map(fn($col) => "'$col'", $relation['pivotColumns']);
            $method .= '->withPivot(' . implode(', ', $pivotColumns) . ')';
        }

        return $method . ';';
    }
}