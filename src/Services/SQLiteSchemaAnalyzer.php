<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Services;

use Illuminate\Database\Connection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use SAC\EloquentModelGenerator\Config\ModelGeneratorConfig;
use SAC\EloquentModelGenerator\Contracts\SchemaAnalyzerInterface;
use SAC\EloquentModelGenerator\Contracts\TypeMapperInterface;
use SAC\EloquentModelGenerator\Domain\ValueObjects\ColumnDefinition;
use SAC\EloquentModelGenerator\Domain\ValueObjects\IndexDefinition;
use SAC\EloquentModelGenerator\Domain\ValueObjects\RelationshipDefinition;
use SAC\EloquentModelGenerator\Domain\ValueObjects\TableDefinition;
use SAC\EloquentModelGenerator\Exceptions\SchemaAnalysisException;
use Throwable;

/**
 * SQLite-specific implementation of the schema analyzer.
 */
final readonly class SQLiteSchemaAnalyzer implements SchemaAnalyzerInterface
{

    private Connection $connection;

    public function __construct(
        private ModelGeneratorConfig $config,
        private TypeMapperInterface $typeMapper,
    ) {

        $this->connection = DB::connection($config->databaseDriver);
    }

    public function analyzeTable(string $table): TableDefinition
    {

        try
        {
            if (!$this->tableExists($table))
            {
                throw SchemaAnalysisException::forFailedAnalysis($table, 'Table does not exist');
            }

            $columns        = $this->getColumns($table);
            $hasTimestamps  = $this->hasTimestampColumns($columns);
            $hasSoftDeletes = $this->hasSoftDeleteColumn($columns);

            return new TableDefinition(
                name: $table,
                columns: $columns,
                indices: $this->getIndices($table),
                relationships: $this->getRelationships($table),
                timestamps: $hasTimestamps,
                softDeletes: $hasSoftDeletes,
            );
        } catch (Throwable $e)
        {
            throw SchemaAnalysisException::forFailedAnalysis($table, $e->getMessage(), $e);
        }
    }

    public function getTables(): array
    {

        try
        {
            $tables = $this->connection->select("
                SELECT name
                FROM sqlite_master
                WHERE type = 'table'
                AND name NOT LIKE 'sqlite_%'
                ORDER BY name
            ");

            return array_map(

                fn($table) => $table->name,
                $tables,
            );
        } catch (Throwable $e)
        {
            throw SchemaAnalysisException::forFailedAnalysis('', 'Failed to get tables: ' . $e->getMessage(), $e);
        }
    }

    public function tableExists(string $table): bool
    {

        return $this->connection->getSchemaBuilder()->hasTable($table);
    }

    public function getColumns(string $table): array
    {

        try
        {
            $columns = $this->connection->select("PRAGMA table_info({$table})");
            $result  = [];

            foreach ($columns as $column)
            {
                // Map the column type using TypeMapper
                $typeDefinition = $this->typeMapper->mapColumnType($column->type, [
                    'nullable'        => !$column->notnull,
                    'default'         => $column->dflt_value,
                    'primary'         => (bool) $column->pk,
                    'original_type'   => $column->type,
                    'column_position' => $column->cid,
                ]);

                $isTimestamp  = in_array($column->name, ['created_at', 'updated_at'], TRUE);
                $isSoftDelete = $column->name === 'deleted_at';

                $result[] = new ColumnDefinition(
                    name: $column->name,
                    type: $typeDefinition->phpType,
                    nullable: !$column->notnull,
                    default: $column->dflt_value,
                    isPrimary: (bool) $column->pk,
                    isUnique: FALSE, // Will be set when processing indices
                    isTimestamp: $isTimestamp,
                    isSoftDelete: $isSoftDelete,
                    length: $typeDefinition->length,
                    attributes: array_merge(
                        $typeDefinition->attributes,
                        [
                            'doc_type'  => $typeDefinition->docType,
                            'cast_type' => $typeDefinition->getCastType(),
                        ],
                    ),
                );
            }

            return $result;
        } catch (Throwable $e)
        {
            throw SchemaAnalysisException::forFailedAnalysis($table, 'Failed to get columns: ' . $e->getMessage(), $e);
        }
    }

    public function getIndices(string $table): array
    {

        try
        {
            $indices = $this->connection->select("PRAGMA index_list({$table})");
            $result  = [];

            foreach ($indices as $index)
            {
                $indexColumns = $this->connection->select("PRAGMA index_info({$index->name})");

                $result[] = new IndexDefinition(
                    name: $index->name,
                    columns: array_map(

                        fn($col) => $col->name,
                        $indexColumns,
                    ),
                    isPrimary: str_contains(mb_strtolower($index->name), 'primary'),
                    isUnique: (bool) $index->unique,
                    isForeign: FALSE, // Will be set when processing foreign keys
                    attributes: [
                        'partial' => (bool) ($index->partial ?? FALSE),
                    ],
                );
            }

            // Add foreign key indices
            $foreignKeys = $this->connection->select("PRAGMA foreign_key_list({$table})");
            foreach ($foreignKeys as $fk)
            {
                $result[] = new IndexDefinition(
                    name: "fk_{$table}_{$fk->from}",
                    columns: [$fk->from],
                    isPrimary: FALSE,
                    isUnique: FALSE,
                    isForeign: TRUE,
                    attributes: [
                        'foreign_table'   => $fk->table,
                        'foreign_columns' => [$fk->to],
                        'on_update'       => $fk->on_update,
                        'on_delete'       => $fk->on_delete,
                    ],
                );
            }

            return $result;
        } catch (Throwable $e)
        {
            throw SchemaAnalysisException::forFailedAnalysis($table, 'Failed to get indices: ' . $e->getMessage(), $e);
        }
    }

    public function getRelationships(string $table): array
    {

        try
        {
            $relationships = [];
            $foreignKeys   = $this->connection->select("PRAGMA foreign_key_list({$table})");

            // Process foreign keys for relationships
            foreach ($foreignKeys as $fk)
            {
                $relationships[] = new RelationshipDefinition(
                    type: RelationshipDefinition::TYPE_BELONGS_TO,
                    name: $this->generateMethodName($fk->table),
                    relatedModel: $this->config->get('namespace') . '\\' . $this->generateModelName($fk->table),
                    localKey: [$fk->from],
                    foreignKey: [$fk->to],
                );
            }

            // Check for potential polymorphic relationships
            $columns = $this->getColumns($table);
            foreach ($columns as $column)
            {
                if (str_ends_with($column->name, '_type'))
                {
                    $baseColumn = str_replace('_type', '', $column->name);
                    if ($this->hasColumn($table, "{$baseColumn}_id"))
                    {
                        $relationships[] = new RelationshipDefinition(
                            type: RelationshipDefinition::TYPE_MORPH_TO,
                            name: $baseColumn,
                            relatedModel: '', // Determined at runtime
                            localKey: ["{$baseColumn}_id"],
                            foreignKey: [],
                            polymorphic: TRUE,
                            morphType: "{$baseColumn}_type",
                            morphId: "{$baseColumn}_id",
                        );
                    }
                }
            }

            return $relationships;
        } catch (Throwable $e)
        {
            throw SchemaAnalysisException::forFailedAnalysis($table, 'Failed to get relationships: ' . $e->getMessage(), $e);
        }
    }

    /**
     * Check if the table has timestamp columns.
     *
     * @param array<ColumnDefinition> $columns
     */
    private function hasTimestampColumns(array $columns): bool
    {

        $hasCreatedAt = FALSE;
        $hasUpdatedAt = FALSE;

        foreach ($columns as $column)
        {
            if ($column->name === 'created_at')
            {
                $hasCreatedAt = TRUE;
            } elseif ($column->name === 'updated_at')
            {
                $hasUpdatedAt = TRUE;
            }
        }

        return $hasCreatedAt && $hasUpdatedAt;
    }

    /**
     * Check if the table has a soft delete column.
     *
     * @param array<ColumnDefinition> $columns
     */
    private function hasSoftDeleteColumn(array $columns): bool
    {

        foreach ($columns as $column)
        {
            if ($column->name === 'deleted_at')
            {
                return TRUE;
            }
        }

        return FALSE;
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
        foreach ($columns as $col)
        {
            if ($col->name === $column)
            {
                return TRUE;
            }
        }

        return FALSE;
    }

}
