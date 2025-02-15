<?php

namespace SAC\EloquentModelGenerator\Templates;

use SAC\EloquentModelGenerator\Models\GeneratedModel;

interface ModelTemplate
{
    /**
     * Render a model template.
     */
    public function render(GeneratedModel $model): string;

    /**
     * Get the template path.
     */
    public function getTemplatePath(): string;
}
