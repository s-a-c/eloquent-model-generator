<?php

namespace SAC\EloquentModelGenerator\Tools;

use SAC\EloquentModelGenerator\Contracts\ConfigurationValidator;

class PintConfigurationValidator implements ConfigurationValidator {
    /**
     * Validates the configuration options.
     *
     * @param array $options
     * @return bool
     */
    public function validate(array $options): bool {
        // TODO: Implement the logic to validate the Pint configuration options.
        return true;
    }
}