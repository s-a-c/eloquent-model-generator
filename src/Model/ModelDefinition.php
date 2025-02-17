<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Model;

final class ModelDefinition
{
    public function __construct(
        private readonly string $name,
        private readonly string $namespace,
        private readonly string $tableName,
        private readonly array $columns = [],
        private readonly array $relations = []
    ) {}

    public function getName(): string
    {
        return $this->name;
    }

    public function getNamespace(): string
    {
        return $this->namespace;
    }

    public function getTableName(): string
    {
        return $this->tableName;
    }

    public function getColumns(): array
    {
        return $this->columns;
    }

    public function getRelations(): array
    {
        return $this->relations;
    }

    public function getFullyQualifiedName(): string
    {
        return $this->namespace . '\\' . $this->name;
    }
}
