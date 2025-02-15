<?php

namespace SAC\EloquentModelGenerator\Support\Definitions;

use Illuminate\Support\Collection;
use SAC\EloquentModelGenerator\ValueObjects\Column;

/**
 * @phpstan-type ColumnDefinition array{
 *     type: non-empty-string,
 *     nullable: bool,
 *     default?: mixed,
 *     length?: positive-int|null,
 *     unsigned?: bool,
 *     autoIncrement?: bool,
 *     primary?: bool,
 *     unique?: bool,
 *     comment?: non-empty-string|null
 * }
 */
class ModelDefinition
{
    /**
     * @var non-empty-string
     */
    private string $table;

    /**
     * @var Collection<int, Column>
     */
    private Collection $columns;

    /**
     * @var Collection<int, RelationDefinition>
     */
    private Collection $relations;

    /**
     * Create a new model definition instance.
     *
     * @param  non-empty-string  $className
     * @param  non-empty-string  $namespace
     * @param  Collection<int, Column>  $columns
     * @param  Collection<int, RelationDefinition>  $relations
     * @param  class-string|null  $baseClass
     * @param  non-empty-string|null  $table
     */
    public function __construct(
        private string $className,
        private string $namespace,
        Collection $columns,
        Collection $relations,
        private ?string $baseClass = null,
        private bool $withSoftDeletes = false,
        private bool $withValidation = false,
        private bool $withRelationships = false,
        ?string $table = null
    ) {
        $this->columns = $columns;
        $this->relations = $relations;
        if ($table !== null) {
            $this->setTableName($table);
        }
    }

    /**
     * Get the class name.
     *
     * @return non-empty-string
     */
    public function getClassName(): string
    {
        return $this->className;
    }

    /**
     * Get the namespace.
     *
     * @return non-empty-string
     */
    public function getNamespace(): string
    {
        return $this->namespace;
    }

    /**
     * Get the columns.
     *
     * @return Collection<int, Column>
     */
    public function getColumns(): Collection
    {
        return $this->columns;
    }

    /**
     * Get the relations.
     *
     * @return Collection<int, RelationDefinition>
     */
    public function getRelations(): Collection
    {
        return $this->relations;
    }

    /**
     * Get the base class.
     *
     * @return class-string|null
     */
    public function getBaseClass(): ?string
    {
        return $this->baseClass;
    }

    /**
     * Check if soft deletes should be included.
     */
    public function withSoftDeletes(): bool
    {
        return $this->withSoftDeletes;
    }

    /**
     * Check if validation should be included.
     */
    public function withValidation(): bool
    {
        return $this->withValidation;
    }

    /**
     * Check if relationships should be included.
     */
    public function withRelationships(): bool
    {
        return $this->withRelationships;
    }

    /**
     * Get the table name.
     *
     * @return non-empty-string
     *
     * @throws \RuntimeException If table name is not set
     */
    public function getTableName(): string
    {
        if (! isset($this->table)) {
            throw new \RuntimeException('Table name has not been set');
        }

        return $this->table;
    }

    /**
     * Set the table name.
     *
     * @param  non-empty-string  $table
     *
     * @throws \InvalidArgumentException If table name is empty
     */
    public function setTableName(string $table): void
    {
        if (empty($table)) {
            throw new \InvalidArgumentException('Table name cannot be empty');
        }
        /** @var non-empty-string */
        $this->table = $table;
    }
}
