<?php

namespace StandAloneComplex\EloquentModelGenerator\Tools;

use StandAloneComplex\EloquentModelGenerator\Contracts\ConfigurationValidator;

class PHPMDConfigurationValidator implements ConfigurationValidator {
    /**
     * Validates the configuration options.
     *
     * @param array $options
     * @return bool
     */
    public function validate(array $options): bool {
        // TODO: Implement the logic to validate the PHPMD configuration options.
        return true;
    }
}