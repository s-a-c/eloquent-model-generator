<?php

namespace SAC\EloquentModelGenerator\Tools;

use SAC\EloquentModelGenerator\Contracts\AnalysisConfig;
use SAC\EloquentModelGenerator\Tools\PHPMDConfigurationValidator;

class PHPMDConfigBuilder implements AnalysisConfig {
    /**
     * Gets the configuration options.
     *
     * @return array
     */
    public function getOptions(): array {
        $options = [
            'rulesets' => ['codesize', 'unusedcode', 'naming'],
        ];

        $validator = new PHPMDConfigurationValidator();
        if (!$validator->validate($options)) {
            throw new \Exception('Invalid PHPMD configuration options.');
        }

        // Load PHPMD specific configuration
        $options['minimumpriority'] = 1; // Set the minimum priority

        return $options;
    }
}