<?php

namespace SAC\EloquentModelGenerator\Tools;

use SAC\EloquentModelGenerator\Contracts\AnalysisConfig;
use SAC\EloquentModelGenerator\Tools\RectorConfigurationValidator;

class RectorConfigBuilder implements AnalysisConfig {
    /**
     * Gets the configuration options.
     *
     * @return array
     */
    public function getOptions(): array {
        $options = [
            'config' => 'packages/StandAloneComplex/EloquentModelGenerator/rector.php',
        ];

        $validator = new RectorConfigurationValidator();
        if (!$validator->validate($options)) {
            throw new \Exception('Invalid Rector configuration options.');
        }

        // Load Rector specific configuration
        $options['dry-run'] = true; // Enable dry-run mode

        return $options;
    }
}