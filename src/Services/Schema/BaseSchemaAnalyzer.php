<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Services\Schema;

use Illuminate\Database\Connection;
use Illuminate\Database\ConnectionInterface;
use Illuminate\Database\Schema\Builder;
use SAC\EloquentModelGenerator\Contracts\SchemaAnalyzer;
use SAC\EloquentModelGenerator\Exceptions\ModelGeneratorException;
use Throwable;

abstract class BaseSchemaAnalyzer implements SchemaAnalyzer
{
    private ?Builder $schemaBuilder = null;

    protected string $tablePrefix;

    public function __construct(private readonly ConnectionInterface $connection)
    {
        if (! $connection instanceof Connection) {
            throw new ModelGeneratorException('Connection must be an instance of Illuminate\Database\Connection');
        }

        $this->tablePrefix = $connection->getTablePrefix() ?? '';
    }

    /**
     * Get the schema builder instance.
     */
    public function getSchemaBuilder(): Builder
    {
        if (! $this->schemaBuilder instanceof Builder) {
            if (! $this->connection instanceof Connection) {
                throw new ModelGeneratorException('Connection must be an instance of Illuminate\Database\Connection');
            }

            $this->schemaBuilder = $this->connection->getSchemaBuilder();
        }

        return $this->schemaBuilder;
    }

    /**
     * Get the table prefix.
     */
    public function getTablePrefix(): string
    {
        return $this->tablePrefix;
    }

    /**
     * Get all available tables.
     *
     * @return array<string>
     *
     * @throws ModelGeneratorException
     */
    public function getTables(): array
    {
        try {
            return $this->getSchemaBuilder()->getAllTables();
        } catch (Throwable $throwable) {
            throw new ModelGeneratorException(
                'Failed to get tables: '.$throwable->getMessage(),
                previous: $throwable
            );
        }
    }

    /**
     * Check if a table exists.
     */
    public function hasTable(string $table): bool
    {
        return $this->getSchemaBuilder()->hasTable($table);
    }

    /**
     * Get foreign key definition.
     *
     * @return array{table: string, column: string}
     */
    protected function getForeignKeyDefinition(string $foreignTable, string $foreignColumn): array
    {
        return [
            'table' => $foreignTable,
            'column' => $foreignColumn,
        ];
    }

    /**
     * Get relationship definition.
     *
     * @return array{type: string, foreignTable: string, foreignKey: string, localKey: string}
     */
    protected function getRelationshipDefinition(
        string $type,
        string $foreignTable,
        string $foreignKey,
        string $localKey
    ): array {
        return [
            'type' => $type,
            'foreignTable' => $foreignTable,
            'foreignKey' => $foreignKey,
            'localKey' => $localKey,
        ];
    }

    /**
     * Map database column type to PHP type.
     *
     * @return non-empty-string
     */
    protected function mapColumnType(string $databaseType): string
    {
        return match (strtolower($databaseType)) {
            'bigint', 'int8' => 'integer',
            'integer', 'int', 'int4' => 'integer',
            'smallint', 'int2' => 'integer',
            'decimal', 'numeric', 'real', 'double precision' => 'float',
            'float', 'float4', 'float8' => 'float',
            'boolean', 'bool' => 'boolean',
            'date' => 'date',
            'datetime', 'timestamp' => 'datetime',
            'time' => 'time',
            'char', 'varchar', 'text', 'string' => 'string',
            'json', 'jsonb' => 'json',
            'binary', 'blob', 'mediumblob', 'longblob' => 'binary',
            default => 'string',
        };
    }

    /**
     * Get the cast type for a column type.
     */
    protected function getCastType(string $type): string
    {
        return match ($type) {
            'int', 'integer', 'tinyint', 'smallint', 'mediumint', 'bigint' => 'int',
            'decimal', 'float', 'double', 'real' => 'float',
            'bool', 'boolean' => 'bool',
            'date', 'datetime', 'timestamp' => 'datetime',
            default => 'string',
        };
    }

    /**
     * Check if a table exists.
     */
    public function tableExists(string $table): bool
    {
        return $this->hasTable($table);
    }
}
