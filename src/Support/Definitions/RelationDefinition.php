<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Support\Definitions;

class RelationDefinition {
    public function __construct(
        public readonly string $name,
        public readonly string $type,
        public readonly string $model,
        public readonly ?string $foreignKey = null,
        public readonly ?string $localKey = null,
        public readonly ?string $morphName = null,
        public readonly ?string $table = null,
        public readonly ?string $foreignPivotKey = null,
        public readonly ?string $relatedPivotKey = null,
        public readonly ?string $parentKey = null,
        public readonly ?string $relatedKey = null
    ) {
    }
}