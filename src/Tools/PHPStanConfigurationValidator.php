<?php

namespace StandAloneComplex\EloquentModelGenerator\Tools;

use StandAloneComplex\EloquentModelGenerator\Contracts\ConfigurationValidator;

class PHPStanConfigurationValidator implements ConfigurationValidator {
    /**
     * Validates the configuration options.
     *
     * @param array $options
     * @return bool
     */
    public function validate(array $options): bool {
        // TODO: Implement the logic to validate the PHPStan configuration options.
        return true;
    }
}