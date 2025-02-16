<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Support\Definitions;

use Illuminate\Support\Collection;

class ModelDefinition {
    public function __construct(
        private readonly string $className,
        private readonly string $namespace,
        private readonly Collection $columns,
        private readonly Collection $relations,
        private readonly ?string $baseClass = null,
        private readonly bool $withSoftDeletes = false,
        private readonly bool $withFillable = true,
        private readonly bool $withCasts = true,
        private readonly ?string $tableName = null
    ) {
    }

    public function getClassName(): string {
        return $this->className;
    }

    public function getNamespace(): string {
        return $this->namespace;
    }

    public function getColumns(): Collection {
        return $this->columns;
    }

    public function getRelations(): Collection {
        return $this->relations;
    }

    public function getBaseClass(): ?string {
        return $this->baseClass;
    }

    public function withSoftDeletes(): bool {
        return $this->withSoftDeletes;
    }

    public function withFillable(): bool {
        return $this->withFillable;
    }

    public function withCasts(): bool {
        return $this->withCasts;
    }

    public function getTableName(): ?string {
        return $this->tableName;
    }
}