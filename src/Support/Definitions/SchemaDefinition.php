<?php

namespace SAC\EloquentModelGenerator\Support\Definitions;

use Illuminate\Support\Collection;

class SchemaDefinition {
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
    public Collection $indexes;

    public function __construct() {
        $this->columns = collect();
        $this->indexes = collect();
    }
}
