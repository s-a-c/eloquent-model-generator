<?php

namespace SAC\EloquentModelGenerator\Tools;

use SAC\EloquentModelGenerator\Contracts\ConfigurationValidator;

class MetricsConfigurationValidator implements ConfigurationValidator {
    /**
     * Validates the configuration options.
     *
     * @param array $options
     * @return bool
     */
    public function validate(array $options): bool {
        // TODO: Implement the logic to validate the Metrics configuration options.
        return true;
    }
}