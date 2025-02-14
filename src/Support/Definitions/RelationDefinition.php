<?php

namespace SAC\EloquentModelGenerator\Support\Definitions;

class RelationDefinition {
    public function __construct(public string $name, public string $type, public ?string $model = null, public ?string $foreignKey = null, public ?string $localKey = null, public ?string $morphType = null)
    {
    }
}
