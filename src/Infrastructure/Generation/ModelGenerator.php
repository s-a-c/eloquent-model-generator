<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Infrastructure\Generation;

use Illuminate\Support\Str;
use SAC\EloquentModelGenerator\Domain\Database\SchemaDefinition;
use SAC\EloquentModelGenerator\Domain\Database\TableDefinition;

/**
 * Generator for Eloquent model classes
 */
final class ModelGenerator
{
    private ?SchemaDefinition $schema = null;

    /**
     * Set the schema for model generation
     */
    public function withSchema(SchemaDefinition $schema): self
    {
        $clone = clone $this;
        $clone->schema = $schema;
        return $clone;
    }

    /**
     * Generate a model definition for a table
     */
    public function generate(TableDefinition $table): ModelDefinition
    {
        if (!$this->schema) {
            throw new \RuntimeException('Schema must be set before generating models');
        }

        $className = Str::studly(Str::singular($table->name()));
        $namespace = 'App\\Models';

        $definition = ModelDefinition::create($className, $namespace)
            ->withBaseClass('Illuminate\\Database\\Eloquent\\Model')
            ->withProperty('protected $table', $table->name())
            ->withProperty('protected $fillable', $this->getFillable($table));

        // Add timestamps property if needed
        if (!$table->hasColumn('created_at') || !$table->hasColumn('updated_at')) {
            $definition = $definition->withProperty('public $timestamps', false);
        }

        // Add primary key if it's not 'id'
        $primaryKey = $table->primaryKey()->first();
        if ($primaryKey && $primaryKey->name() !== 'id') {
            $definition = $definition->withProperty('protected $primaryKey', $primaryKey->name());
        }

        // Add casts for column types
        $casts = $this->generateCasts($table);
        if (!empty($casts)) {
            $definition = $definition->withProperty('protected $casts', $casts);
        }

        return $definition;
    }

    /**
     * Get fillable columns for the model
     *
     * @return array<string>
     */
    private function getFillable(TableDefinition $table): array
    {
        return $table->columns()
            ->reject(fn ($column) => $column->isPrimaryKey() || $column->isAutoIncrement())
            ->map(fn ($column) => $column->name())
            ->values()
            ->toArray();
    }

    /**
     * Generate casts array for the model
     *
     * @return array<string, string>
     */
    private function generateCasts(TableDefinition $table): array
    {
        $casts = [];

        foreach ($table->columns() as $column) {
            $cast = match ($column->type()) {
                'boolean' => 'boolean',
                'integer' => 'integer',
                'bigint' => 'integer',
                'float', 'double', 'decimal' => 'float',
                'datetime', 'timestamp' => 'datetime',
                'date' => 'date',
                'json', 'jsonb' => 'array',
                default => null,
            };

            if ($cast) {
                $casts[$column->name()] = $cast;
            }
        }

        return $casts;
    }
}
