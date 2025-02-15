<?php

namespace SAC\EloquentModelGenerator\Support\Definitions;

class RelationDefinition
{
    public string $name;

    public string $type;

    public ?string $model;

    public ?string $foreignKey;

    public ?string $localKey;

    public ?string $morphType;

    public function __construct(
        string $name,
        string $type,
        ?string $model = null,
        ?string $foreignKey = null,
        ?string $localKey = null,
        ?string $morphType = null
    ) {
        $this->name = $name;
        $this->type = $type;
        $this->model = $model;
        $this->foreignKey = $foreignKey;
        $this->localKey = $localKey;
        $this->morphType = $morphType;
    }
}
