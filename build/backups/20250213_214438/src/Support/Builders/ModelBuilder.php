<?php

namespace SAC\EloquentModelGenerator\Support\Builders;

use SAC\EloquentModelGenerator\Services\ConfigurationService;
use SAC\EloquentModelGenerator\Models\GeneratedModel;

class ModelBuilder {
    public function __construct(
        private readonly ConfigurationService $configService
    ) {
    }

    public function build(string $tableName, array $schema = []): GeneratedModel {
        // TODO: Implement build method
        throw new \RuntimeException('Not implemented yet');
    }
}
