<?php

namespace SAC\EloquentModelGenerator\Templates;

use SAC\EloquentModelGenerator\Models\GeneratedModel;

interface ModelTemplate {
    /**
     * Render a model template.
     *
     * @param GeneratedModel $model
     * @return string
     */
    public function render(GeneratedModel $model): string;

    /**
     * Get the template path.
     *
     * @return string
     */
    public function getTemplatePath(): string;
}
