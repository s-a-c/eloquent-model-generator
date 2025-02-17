<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Domain\Database;

use Illuminate\Support\Collection;

/**
 * Immutable value object representing a database schema definition
 */
final class SchemaDefinition
{
    /**
     * @param Collection<TableDefinition> $tables
     * @param Collection<Relationship> $relationships
     */
    private function __construct(
        private readonly Collection $tables,
        private readonly Collection $relationships
    ) {
    }

    /**
     * Named constructor to create a new schema definition
     *
     * @param Collection<TableDefinition> $tables
     * @param Collection<Relationship> $relationships
     */
    public static function create(
        Collection $tables,
        Collection $relationships
    ): self {
        return new self($tables, $relationships);
    }

    /**
     * Get all tables in the schema
     *
     * @return Collection<TableDefinition>
     */
    public function tables(): Collection
    {
        return $this->tables;
    }

    /**
     * Get all relationships in the schema
     *
     * @return Collection<Relationship>
     */
    public function relationships(): Collection
    {
        return $this->relationships;
    }

    /**
     * Get a specific table by name
     */
    public function table(string $name): ?TableDefinition
    {
        return $this->tables->first(fn (TableDefinition $table) => $table->name() === $name);
    }

    /**
     * Get all relationships for a specific table
     *
     * @return Collection<Relationship>
     */
    public function tableRelationships(string $tableName): Collection
    {
        return $this->relationships->filter(
            fn (Relationship $rel) => $rel->localTable() === $tableName
        );
    }
}
