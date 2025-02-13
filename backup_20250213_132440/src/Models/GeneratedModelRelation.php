<?php

namespace SAC\EloquentModelGenerator\Models;

class GeneratedModelRelation {
    /**
     * Create a new generated model relation instance.
     *
     * @param string $name
     * @param string $type
     * @param string $model
     * @param string|null $foreignKey
     * @param string|null $localKey
     * @param array<string, mixed> $parameters
     */
    public function __construct(
        private readonly string $name,
        private readonly string $type,
        private readonly string $model,
        private readonly ?string $foreignKey = null,
        private readonly ?string $localKey = null,
        private readonly array $parameters = []
    ) {
    }

    /**
     * Get the relation name.
     *
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * Get the relation type.
     *
     * @return string
     */
    public function getType(): string {
        return $this->type;
    }

    /**
     * Get the related model.
     *
     * @return string
     */
    public function getModel(): string {
        return $this->model;
    }

    /**
     * Get the foreign key.
     *
     * @return string|null
     */
    public function getForeignKey(): ?string {
        return $this->foreignKey;
    }

    /**
     * Get the local key.
     *
     * @return string|null
     */
    public function getLocalKey(): ?string {
        return $this->localKey;
    }

    /**
     * Get additional parameters.
     *
     * @return array<string, mixed>
     */
    public function getParameters(): array {
        return $this->parameters;
    }

    /**
     * Convert the relation to an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array {
        return [
            'name' => $this->name,
            'type' => $this->type,
            'model' => $this->model,
            'foreignKey' => $this->foreignKey,
            'localKey' => $this->localKey,
            'parameters' => $this->parameters,
        ];
    }
}
