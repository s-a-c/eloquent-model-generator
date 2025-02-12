<?php

namespace SAC\EloquentModelGenerator\Services\Schema;

use Illuminate\Database\ConnectionInterface;
use Illuminate\Database\Schema\Builder;
use Doctrine\DBAL\Schema\AbstractSchemaManager;
use SAC\EloquentModelGenerator\Contracts\SchemaAnalyzer;
use SAC\EloquentModelGenerator\Exceptions\ModelGeneratorSchemaAnalyzerException;

abstract class BaseSchemaAnalyzer implements SchemaAnalyzer {
    /**
     * @var ConnectionInterface
     */
    protected ConnectionInterface $connection;

    /**
     * @var Builder|null
     */
    private ?Builder $schemaBuilder = null;

    /**
     * @var AbstractSchemaManager|null
     */
    private ?AbstractSchemaManager $schemaManager = null;

    /**
     * @param ConnectionInterface $connection
     */
    public function __construct(ConnectionInterface $connection) {
        $this->connection = $connection;
    }

    /**
     * Get the schema builder instance.
     *
     * @return Builder
     */
    protected function getSchemaBuilder(): Builder {
        if ($this->schemaBuilder === null) {
            $this->schemaBuilder = $this->connection->getSchemaBuilder();
        }

        return $this->schemaBuilder;
    }

    /**
     * Get the Doctrine schema manager instance.
     *
     * @return AbstractSchemaManager
     */
    protected function getSchemaManager(): AbstractSchemaManager {
        if ($this->schemaManager === null) {
            $this->schemaManager = $this->connection->getDoctrineSchemaManager();
        }

        return $this->schemaManager;
    }

    /**
     * Get the table prefix.
     *
     * @return string
     */
    protected function getTablePrefix(): string {
        return $this->connection->getTablePrefix();
    }

    /**
     * @inheritDoc
     */
    public function tableExists(string $table): bool {
        return $this->getSchemaBuilder()->hasTable($table);
    }

    /**
     * @inheritDoc
     */
    public function getTables(): array {
        try {
            return $this->getSchemaManager()->listTableNames();
        } catch (\Exception $e) {
            throw new ModelGeneratorSchemaAnalyzerException(
                "Failed to get tables: {$e->getMessage()}",
                0,
                $e
            );
        }
    }

    /**
     * Get the column type mapping.
     *
     * @return array<string, string>
     */
    abstract protected function getTypeMap(): array;

    /**
     * Map database type to PHP type.
     *
     * @param string $databaseType
     * @return string
     */
    protected function mapColumnType(string $databaseType): string {
        $typeMap = $this->getTypeMap();
        $type = strtolower($databaseType);

        return $typeMap[$type] ?? 'string';
    }

    /**
     * Get foreign key definition.
     *
     * @param array<string, mixed> $foreignKey
     * @return array{table: string, column: string}
     */
    protected function getForeignKeyDefinition(array $foreignKey): array {
        return [
            'table' => $foreignKey['foreign_table'],
            'column' => $foreignKey['foreign_column'],
        ];
    }

    /**
     * Determine relationship type based on foreign key.
     *
     * @param array<string, mixed> $foreignKey
     * @return string
     */
    protected function determineRelationshipType(array $foreignKey): string {
        // Default to belongsTo for single foreign keys
        return 'belongsTo';
    }

    /**
     * Get relationship definition.
     *
     * @param array<string, mixed> $foreignKey
     * @return array{type: string, foreignTable: string, foreignKey: string, localKey: string}
     */
    protected function getRelationshipDefinition(array $foreignKey): array {
        return [
            'type' => $this->determineRelationshipType($foreignKey),
            'foreignTable' => $foreignKey['foreign_table'],
            'foreignKey' => $foreignKey['foreign_column'],
            'localKey' => $foreignKey['local_column'],
        ];
    }

    /**
     * Get the cast type for a column type.
     *
     * @param string $type
     * @return string
     */
    protected function getCastType(string $type): string {
        return match ($type) {
            'json' => 'array',
            'datetime', 'timestamp' => 'datetime',
            'decimal' => 'decimal',
            'float', 'double' => 'float',
            'boolean' => 'boolean',
            'integer', 'bigint', 'smallint' => 'integer',
            default => 'string',
        };
    }
}
