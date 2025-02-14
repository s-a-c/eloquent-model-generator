<?php

namespace SAC\EloquentModelGenerator\Services;

use SAC\EloquentModelGenerator\Models\GeneratedModel;
use SAC\EloquentModelGenerator\ValueObjects\TableSchema;

interface ModelGeneratorInterface {
    /**
     * Generate a model from the given schema.
     *
     * @param array<string, mixed> $config
     */
    public function generate(string $table, TableSchema $schema, array $config = []): GeneratedModel;
}
