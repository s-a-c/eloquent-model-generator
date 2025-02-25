<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Services;

use Illuminate\Database\Connection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use SAC\EloquentModelGenerator\Config\ModelGeneratorConfig;
use SAC\EloquentModelGenerator\Domain\Enums\RelationType;
use SAC\EloquentModelGenerator\Domain\ValueObjects\ColumnDefinition;
use SAC\EloquentModelGenerator\Domain\ValueObjects\IndexDefinition;
use SAC\EloquentModelGenerator\Domain\ValueObjects\RelationshipDefinition;
use SAC\EloquentModelGenerator\Domain\ValueObjects\TableDefinition;
use SAC\EloquentModelGenerator\Exceptions\SchemaAnalysisException;
use SAC\EloquentModelGenerator\Services\Contracts\SchemaAnalyzerInterface;
use Throwable;

/**
 * SQLite-specific implementation of the schema analyzer.
 */
final readonly class SQLiteSchemaAnalyzer implements SchemaAnalyzerInterface
{
    private Connection $connection;

    public function __construct(
        private ModelGeneratorConfig $config,
    ) {
        $this->connection = DB::connection($config->databaseDriver);
    }

    public function analyzeTable(string $table): TableDefinition
    {
        try {
            if (! $this->tableExists($table)) {
                throw SchemaAnalysisException::forFailedAnalysis($table, 'Table does not exist');
            }

            return new TableDefinition(
                name: $table,
                columns: $this->getColumns($table),
                indices: $this->getIndices($table),
                relationships: $this->getRelationships($table),
            );
        } catch (Throwable $e) {
            throw SchemaAnalysisException::forFailedAnalysis($table, $e->getMessage(), $e);
        }
    }

    public function getTables(): array
    {
        try {
            $tables = $this->connection->select("
                SELECT name
                FROM sqlite_master
                WHERE type = 'table'
                AND name NOT LIKE 'sqlite_%'
                ORDER BY name
            ");

            return array_map(fn ($table) => $table->name, $tables);
        } catch (Throwable $e) {
            throw SchemaAnalysisException::forFailedAnalysis('', 'Failed to get tables: '.$e->getMessage(), $e);
        }
    }

    public function tableExists(string $table): bool
    {
        return $this->connection->getSchemaBuilder()->hasTable($table);
    }

    public function getColumns(string $table): array
    {
        try {
            $columns = $this->connection->select("PRAGMA table_info({$table})");
            $result = [];

            foreach ($columns as $column) {
                $result[] = new ColumnDefinition(
                    name: $column->name,
                    type: $this->mapColumnType($column->type),
                    nullable: ! $column->notnull,
                    default: $column->dflt_value,
                    isPrimary: (bool) $column->pk,
                    isUnique: false, // Will be set when processing indices
                    length: $this->extractLength($column->type),
                    attributes: [
                        'original_type' => $column->type,
                        'column_position' => $column->cid,
                    ],
                );
            }

            return $result;
        } catch (Throwable $e) {
            throw SchemaAnalysisException::forFailedAnalysis($table, 'Failed to get columns: '.$e->getMessage(), $e);
        }
    }

    public function getIndices(string $table): array
    {
        try {
            $indices = $this->connection->select("PRAGMA index_list({$table})");
            $result = [];

            foreach ($indices as $index) {
                $indexColumns = $this->connection->select("PRAGMA index_info({$index->name})");

                $result[] = new IndexDefinition(
                    name: $index->name,
                    columns: array_map(fn ($col) => $col->name, $indexColumns),
                    isPrimary: str_contains(mb_strtolower($index->name), 'primary'),
                    isUnique: (bool) $index->unique,
                    isForeign: false, // Will be set when processing foreign keys
                    attributes: [
                        'partial' => (bool) ($index->partial ?? false),
                    ],
                );
            }

            // Add foreign key indices
            $foreignKeys = $this->connection->select("PRAGMA foreign_key_list({$table})");
            foreach ($foreignKeys as $fk) {
                $result[] = new IndexDefinition(
                    name: "fk_{$table}_{$fk->from}",
                    columns: [$fk->from],
                    isPrimary: false,
                    isUnique: false,
                    isForeign: true,
                    attributes: [
                        'foreign_table' => $fk->table,
                        'foreign_columns' => [$fk->to],
                        'on_update' => $fk->on_update,
                        'on_delete' => $fk->on_delete,
                    ],
                );
            }

            return $result;
        } catch (Throwable $e) {
            throw SchemaAnalysisException::forFailedAnalysis($table, 'Failed to get indices: '.$e->getMessage(), $e);
        }
    }

    public function getRelationships(string $table): array
    {
        try {
            $relationships = [];
            $foreignKeys = $this->connection->select("PRAGMA foreign_key_list({$table})");

            // Process foreign keys for relationships
            foreach ($foreignKeys as $fk) {
                $relationships[] = new RelationshipDefinition(
                    type: RelationType::BelongsTo,
                    name: $this->generateMethodName($fk->table),
                    relatedModel: $this->config->get('namespace').'\\'.$this->generateModelName($fk->table),
                    localKeys: [$fk->from],
                    foreignKeys: [$fk->to],
                );
            }

            // Check for potential polymorphic relationships
            $columns = $this->getColumns($table);
            foreach ($columns as $column) {
                if (str_ends_with($column->name, '_type')) {
                    $baseColumn = str_replace('_type', '', $column->name);
                    if ($this->hasColumn($table, "{$baseColumn}_id")) {
                        $relationships[] = new RelationshipDefinition(
                            type: RelationType::MorphTo,
                            name: $baseColumn,
                            relatedModel: '', // Determined at runtime
                            localKeys: ["{$baseColumn}_id", "{$baseColumn}_type"],
                            foreignKeys: [],
                        );
                    }
                }
            }

            return $relationships;
        } catch (Throwable $e) {
            throw SchemaAnalysisException::forFailedAnalysis($table, 'Failed to get relationships: '.$e->getMessage(), $e);
        }
    }

    /**
     * Map SQLite column type to PHP type.
     */
    private function mapColumnType(string $type): string
    {
        return match (mb_strtolower(explode('(', $type)[0])) {
            'integer', 'int' => 'integer',
            'real', 'double', 'float' => 'float',
            'text', 'varchar', 'char' => 'string',
            'blob' => 'binary',
            'boolean', 'bool' => 'boolean',
            'datetime', 'timestamp' => 'datetime',
            'date' => 'date',
            'json' => 'json',
            default => 'string',
        };
    }

    /**
     * Extract length from column type definition.
     */
    private function extractLength(string $type): ?int
    {
        if (preg_match('/\((\d+)\)/', $type, $matches)) {
            return (int) $matches[1];
        }

        return null;
    }

    /**
     * Generate method name for relationship.
     */
    private function generateMethodName(string $table): string
    {
        return lcfirst(str_replace('_', '', ucwords($table, '_')));
    }

    /**
     * Generate model name from table name.
     */
    private function generateModelName(string $table): string
    {
        return str_replace('_', '', ucwords(Str::singular($table), '_'));
    }

    /**
     * Check if a table has a specific column.
     */
    private function hasColumn(string $table, string $column): bool
    {
        $columns = $this->connection->select("PRAGMA table_info({$table})");
        foreach ($columns as $col) {
            if ($col->name === $column) {
                return true;
            }
        }

        return false;
    }
}
