<?php

namespace StandAloneComplex\EloquentModelGenerator\Contracts;

interface ConfigurationValidator {
    /**
     * Validates the configuration options.
     *
     * @param array $options
     * @return bool
     */
    public function validate(array $options): bool;
}