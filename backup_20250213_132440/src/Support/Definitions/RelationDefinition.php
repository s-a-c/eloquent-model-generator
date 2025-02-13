<?php

namespace SAC\EloquentModelGenerator\Support\Definitions;

class RelationDefinition {
    /**
     * @var string
     */
    public string $name;

    /**
     * @var string
     */
    public string $type;

    /**
     * @var string|null
     */
    public ?string $model;

    /**
     * @var string|null
     */
    public ?string $foreignKey;

    /**
     * @var string|null
     */
    public ?string $localKey;

    /**
     * @var string|null
     */
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
