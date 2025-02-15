<?php

namespace SAC\EloquentModelGenerator\Events;

use SAC\EloquentModelGenerator\Models\GeneratedModel;

class ModelGenerated
{
    /**
     * Create a new model generated event instance.
     */
    public function __construct(
        private readonly GeneratedModel $model
    ) {}

    /**
     * Get the generated model.
     */
    public function getModel(): GeneratedModel
    {
        return $this->model;
    }
}
