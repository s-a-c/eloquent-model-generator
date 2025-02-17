<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Domain\Model;

final class ModelDefinition
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
     *     model: string,
     *     foreign_key: string,
     *     local_key: string,
     *     pivot_table?: string
     * }> $relations
     */
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

    /**
     * @return array<string, array{
     *     type: string,
     *     nullable: bool,
     *     default?: mixed,
     *     length?: int|null,
     *     unsigned?: bool,
     *     autoIncrement?: bool,
     *     primary?: bool,
     *     unique?: bool
     * }>
     */
    public function getColumns(): array
    {
        return $this->columns;
    }

    /**
     * @return array<string, array{
     *     type: string,
     *     model: string,
     *     foreign_key: string,
     *     local_key: string,
     *     pivot_table?: string
     * }>
     */
    public function getRelations(): array
    {
        return $this->relations;
    }

    public function getFullyQualifiedName(): string
    {
        return $this->namespace . '\\' . $this->name;
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'namespace' => $this->namespace,
            'table_name' => $this->tableName,
            'columns' => $this->columns,
            'relations' => $this->relations,
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['name'],
            $data['namespace'],
            $data['table_name'],
            $data['columns'] ?? [],
            $data['relations'] ?? []
        );
    }

    public static function fromSchema(SchemaDefinition $schema, string $namespace): self
    {
        return new self(
            self::tableToModelName($schema->table()),
            $namespace,
            $schema->table(),
            $schema->columns(),
            $schema->detectRelations()
        );
    }

    private static function tableToModelName(string $table): string
    {
        return str_replace('_', '', ucwords($table, '_'));
    }
}
