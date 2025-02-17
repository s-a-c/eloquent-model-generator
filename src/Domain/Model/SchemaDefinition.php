<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Domain\Model;

final class SchemaDefinition
{
    /**
     * @param array<string, array{
     *     type: string,
     *     nullable: bool,
     *     default?: mixed,
     *     length?: int|null,
     *     unsigned?: bool,
     *     autoIncrement?: bool,
     *     primary?: bool,
     *     unique?: bool
     * }> $columns
     * @param array<string, array{
     *     type: string,
     *     columns: array<string>,
     *     name?: string,
     *     algorithm?: string,
     *     options?: array<string, mixed>
     * }> $indexes
     * @param array<string, array{
     *     table: string,
     *     columns: array<string, string>,
     *     onDelete?: string,
     *     onUpdate?: string
     * }> $foreignKeys
     */
    public function __construct(
        private readonly string $table,
        private readonly array $columns,
        private readonly array $indexes = [],
        private readonly array $foreignKeys = [],
        private readonly bool $timestamps = true,
        private readonly bool $softDeletes = false,
        private readonly ?string $primaryKey = null,
        private readonly bool $incrementing = true
    ) {}

    public function table(): string
    {
        return $this->table;
    }

    public function columns(): array
    {
        return $this->columns;
    }

    public function indexes(): array
    {
        return $this->indexes;
    }

    public function foreignKeys(): array
    {
        return $this->foreignKeys;
    }

    public function hasTimestamps(): bool
    {
        return $this->timestamps;
    }

    public function hasSoftDeletes(): bool
    {
        return $this->softDeletes;
    }

    public function primaryKey(): ?string
    {
        return $this->primaryKey;
    }

    public function isIncrementing(): bool
    {
        return $this->incrementing;
    }

    public function toArray(): array
    {
        return [
            'table' => $this->table,
            'columns' => $this->columns,
            'indexes' => $this->indexes,
            'foreign_keys' => $this->foreignKeys,
            'timestamps' => $this->timestamps,
            'soft_deletes' => $this->softDeletes,
            'primary_key' => $this->primaryKey,
            'incrementing' => $this->incrementing,
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['table'],
            $data['columns'],
            $data['indexes'] ?? [],
            $data['foreign_keys'] ?? [],
            $data['timestamps'] ?? true,
            $data['soft_deletes'] ?? false,
            $data['primary_key'] ?? null,
            $data['incrementing'] ?? true
        );
    }

    public function hasColumn(string $name): bool
    {
        return isset($this->columns[$name]);
    }

    public function getColumn(string $name): ?array
    {
        return $this->columns[$name] ?? null;
    }

    public function hasIndex(string $name): bool
    {
        return isset($this->indexes[$name]);
    }

    public function getIndex(string $name): ?array
    {
        return $this->indexes[$name] ?? null;
    }

    public function hasForeignKey(string $name): bool
    {
        return isset($this->foreignKeys[$name]);
    }

    public function getForeignKey(string $name): ?array
    {
        return $this->foreignKeys[$name] ?? null;
    }

    public function detectRelations(): array
    {
        $relations = [];

        foreach ($this->foreignKeys as $name => $foreignKey) {
            $relations[$name] = [
                'type' => 'belongsTo',
                'related_model' => $this->tableToModel($foreignKey['table']),
                'foreign_key' => array_key_first($foreignKey['columns']),
                'local_key' => array_values($foreignKey['columns'])[0],
            ];
        }

        return $relations;
    }

    private function tableToModel(string $table): string
    {
        return str_replace('_', '', ucwords($table, '_'));
    }
}
