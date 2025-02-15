<?php

namespace StandAloneComplex\EloquentModelGenerator\Tools;

use StandAloneComplex\EloquentModelGenerator\Contracts\AnalysisConfig;
use StandAloneComplex\EloquentModelGenerator\Tools\PsalmConfigurationValidator;

class PsalmConfigBuilder implements AnalysisConfig {
    /**
     * Gets the configuration options.
     *
     * @return array
     */
    public function getOptions(): array {
        $options = [
            'config' => 'packages/StandAloneComplex/EloquentModelGenerator/psalm.xml',
            'output-format' => 'json',
        ];

        $validator = new PsalmConfigurationValidator();
        if (!$validator->validate($options)) {
            throw new \Exception('Invalid Psalm configuration options.');
        }

        // Load Psalm specific configuration
        $options['level'] = 1; // Set the Psalm level to 1

        return $options;
    }
}