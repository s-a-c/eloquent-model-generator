<?php

namespace SAC\EloquentModelGenerator\Support\Definitions;

use Illuminate\Support\Collection;

class ModelDefinition {
    /**
     * @var string
     */
    public string $table;

    /**
     * @var Collection
     */
    public Collection $columns;

    /**
     * @var Collection
     */
    public Collection $relations;

    public function __construct() {
        $this->columns = collect();
        $this->relations = collect();
    }
}
