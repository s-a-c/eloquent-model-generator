<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Domain\Database;

use Illuminate\Support\Collection;
use SAC\EloquentModelGenerator\Domain\Relationship\Relationship;

interface DatabaseAdapter
{
    /**
     * Get the complete database schema definition
     */
    public function getSchema(): SchemaDefinition;

    /**
     * Get all columns for a specific table
     *
     * @param string $table The table name
     * @return Collection<Column>
     */
    public function getColumns(string $table): Collection;

    /**
     * Get all relationships for a specific table
     *
     * @param string $table The table name
     * @return Collection<Relationship>
     */
    public function getRelationships(string $table): Collection;

    /**
     * Get all indexes for a specific table
     *
     * @param string $table The table name
     * @return Collection<Index>
     */
    public function getIndexes(string $table): Collection;
}
