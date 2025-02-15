<?php

namespace SAC\EloquentModelGenerator\Templates;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use SAC\EloquentModelGenerator\Models\GeneratedModel;
use SAC\EloquentModelGenerator\Services\ConfigurationService;

class CachedModelTemplate implements ModelTemplate
{
    /**
     * Create a new cached model template instance.
     */
    public function __construct(
        private readonly ConfigurationService $config
    ) {}

    /**
     * Render a model template.
     */
    public function render(GeneratedModel $model): string
    {
        $cacheKey = $this->getCacheKey($model);

        /** @var string */
        return Cache::remember(
            $cacheKey,
            $this->getCacheTtl(),
            function () use ($model): string {
                /** @var string */
                $rendered = View::file(
                    $this->getTemplatePath(),
                    [
                        'model' => $model,
                        'config' => $this->config->all(),
                    ]
                )->render();

                return $rendered;
            }
        );
    }

    /**
     * Get the template path.
     *
     * @return non-empty-string
     */
    public function getTemplatePath(): string
    {
        $path = $this->config->get('templates_path');

        /** @var non-empty-string */
        return $path ? $path.'/model.blade.php' : __DIR__.'/../../resources/templates/model.blade.php';
    }

    /**
     * Get the cache key for a model.
     *
     * @return non-empty-string
     */
    private function getCacheKey(GeneratedModel $model): string
    {
        /** @var non-empty-string */
        return 'model_template:'.md5(serialize($model->toArray()));
    }

    /**
     * Get the cache TTL.
     *
     * @return positive-int
     */
    private function getCacheTtl(): int
    {
        /** @var positive-int */
        return $this->config->get('cache.ttl', 3600);
    }
}
