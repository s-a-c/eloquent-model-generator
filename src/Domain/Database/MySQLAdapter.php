<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Domain\Database;

use Illuminate\Database\Connection;
use Illuminate\Support\Collection;

/**
 * MySQL implementation of the DatabaseAdapter interface
 */
final class MySQLAdapter implements DatabaseAdapter
{
    public function __construct(
        private readonly Connection $connection,
        private readonly SchemaAnalyzer $analyzer
    ) {
    }

    public function getSchema(): SchemaDefinition
    {
        return $this->analyzer->analyze($this->connection);
    }

    /**
     * @return Collection<Column>
     */
    public function getColumns(string $table): Collection
    {
        return $this->getSchema()
            ->table($table)
            ?->columns()
            ?? collect();
    }

    /**
     * @return Collection<Relationship>
     */
    public function getRelationships(string $table): Collection
    {
        return $this->getSchema()
            ->tableRelationships($table)
            ?? collect();
    }

    /**
     * @return Collection<Index>
     */
    public function getIndexes(string $table): Collection
    {
        return $this->getSchema()
            ->table($table)
            ?->indexes()
            ?? collect();
    }
}
