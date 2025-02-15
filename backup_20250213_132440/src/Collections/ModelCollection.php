<?php

namespace SAC\EloquentModelGenerator\Collections;

use Illuminate\Support\Collection;
use SAC\EloquentModelGenerator\Models\GeneratedModel;

/**
 * @template TKey of array-key
 * @template TValue of GeneratedModel
 *
 * @extends Collection<TKey, TValue>
 */
class ModelCollection extends Collection
{
    /**
     * Create a new model collection.
     *
     * @param  array<TKey, TValue>  $items
     */
    public function __construct(array $items = [])
    {
        parent::__construct($items);
    }

    /**
     * Get a model by its name
     *
     * @param  string  $name  The name of the model to find
     */
    public function getModel(string $name): ?GeneratedModel
    {
        return $this->first(function (GeneratedModel $model) use ($name): bool {
            return $model->getClassName() === $name;
        });
    }

    /**
     * Add a model to the collection
     *
     * @param  TValue  $model  The model to add
     * @return $this
     */
    public function addModel(GeneratedModel $model): self
    {
        $this->push($model);

        return $this;
    }

    /**
     * Remove a model from the collection
     *
     * @param  string  $name  The name of the model to remove
     * @return static<TKey, TValue>
     */
    public function removeModel(string $name): static
    {
        /** @var static<TKey, TValue> */
        return $this->reject(function (GeneratedModel $model) use ($name): bool {
            return $model->getClassName() === $name;
        });
    }

    /**
     * Get all models in the collection.
     *
     * @return array<TKey, TValue>
     */
    public function getModels(): array
    {
        return $this->all();
    }
}
