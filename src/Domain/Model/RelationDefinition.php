<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Domain\Model;

final class RelationDefinition
{
    public function __construct(
        private readonly string $name,
        private readonly string $type,
        private readonly string $relatedModel,
        private readonly string $foreignKey,
        private readonly string $localKey,
        private readonly ?string $pivotTable = null,
        private readonly array $pivotColumns = []
    ) {}

    public function name(): string
    {
        return $this->name;
    }

    public function type(): string
    {
        return $this->type;
    }

    public function relatedModel(): string
    {
        return $this->relatedModel;
    }

    public function foreignKey(): string
    {
        return $this->foreignKey;
    }

    public function localKey(): string
    {
        return $this->localKey;
    }

    public function pivotTable(): ?string
    {
        return $this->pivotTable;
    }

    public function pivotColumns(): array
    {
        return $this->pivotColumns;
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'type' => $this->type,
            'related_model' => $this->relatedModel,
            'foreign_key' => $this->foreignKey,
            'local_key' => $this->localKey,
            'pivot_table' => $this->pivotTable,
            'pivot_columns' => $this->pivotColumns,
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['name'],
            $data['type'],
            $data['related_model'],
            $data['foreign_key'],
            $data['local_key'],
            $data['pivot_table'] ?? null,
            $data['pivot_columns'] ?? []
        );
    }

    public function isPivotRelation(): bool
    {
        return $this->type === 'belongsToMany' && $this->pivotTable !== null;
    }
}
