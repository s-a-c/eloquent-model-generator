<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests\Unit\Services\Schema;

use SAC\EloquentModelGenerator\Services\Schema\BaseSchemaAnalyzer;
use SAC\EloquentModelGenerator\ValueObjects\Column;

class TestSchemaAnalyzer extends BaseSchemaAnalyzer {
    private array $mockColumns = [];
    private array $mockRelationships = [];

    /**
     * Set mock columns for testing.
     *
     * @param Column[] $columns
     */
    public function setMockColumns(array $columns): void {
        $this->mockColumns = $columns;
    }

    /**
     * Set mock relationships for testing.
     *
     * @param array<array{type: string, foreignTable: string, foreignKey: string, localKey: string}> $relationships
     */
    public function setMockRelationships(array $relationships): void {
        $this->mockRelationships = $relationships;
    }

    /**
     * Get the columns for a table.
     *
     * @return Column[]
     */
    protected function getColumns(string $table): array {
        return $this->mockColumns;
    }

    /**
     * Get relationships for a table.
     *
     * @return array<array{type: string, foreignTable: string, foreignKey: string, localKey: string}>
     */
    protected function getRelationships(string $table): array {
        return $this->mockRelationships;
    }
}