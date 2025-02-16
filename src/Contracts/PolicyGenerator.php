<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Contracts;

use SAC\EloquentModelGenerator\Exceptions\PolicyGeneratorException;

/**
 * Policy Generator Interface
 *
 * Defines the contract for generating model policies.
 */
interface PolicyGenerator {
    /**
     * Generate a policy class for a model.
     *
     * @param string $modelClass The fully qualified model class name
     * @param array<string> $abilities The policy abilities to generate
     * @param array<string, array<string>> $rules Custom authorization rules
     * @return string The policy class definition
     * @throws PolicyGeneratorException
     */
    public function generate(string $modelClass, array $abilities = [], array $rules = []): string;
}