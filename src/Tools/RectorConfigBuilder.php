<?php

namespace StandAloneComplex\EloquentModelGenerator\Tools;

use StandAloneComplex\EloquentModelGenerator\Contracts\AnalysisConfig;
use StandAloneComplex\EloquentModelGenerator\Tools\RectorConfigurationValidator;

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

        return $options;
    }
}