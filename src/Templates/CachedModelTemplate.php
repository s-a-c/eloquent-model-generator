<?php

namespace SAC\EloquentModelGenerator\Templates;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use SAC\EloquentModelGenerator\Models\GeneratedModel;
use SAC\EloquentModelGenerator\Services\ConfigurationService;

class CachedModelTemplate implements ModelTemplate {
    /**
     * Create a new cached model template instance.
     */
    public function __construct(
        private readonly ConfigurationService $config
    ) {
    }

    /**
     * @inheritDoc
     */
    public function render(GeneratedModel $model): string {
        $cacheKey = $this->getCacheKey($model);

        return Cache::remember($cacheKey, $this->getCacheTtl(), function () use ($model) {
            return View::file($this->getTemplatePath(), [
                'model' => $model,
                'config' => $this->config->all(),
            ])->render();
        });
    }

    /**
     * @inheritDoc
     */
    public function getTemplatePath(): string {
        $path = $this->config->get('templates_path');
        return $path ? $path . '/model.blade.php' : __DIR__ . '/../../resources/templates/model.blade.php';
    }

    /**
     * Get the cache key for a model.
     *
     * @param GeneratedModel $model
     * @return string
     */
    private function getCacheKey(GeneratedModel $model): string {
        return 'model_template:' . md5(serialize($model->toArray()));
    }

    /**
     * Get the cache TTL.
     *
     * @return int
     */
    private function getCacheTtl(): int {
        return $this->config->get('cache.ttl', 3600);
    }
}
