<?php

namespace StandAloneComplex\EloquentModelGenerator\Tools;

use StandAloneComplex\EloquentModelGenerator\Contracts\AnalysisConfig;
use StandAloneComplex\EloquentModelGenerator\Tools\PintConfigurationValidator;

class PintConfigBuilder implements AnalysisConfig {
    /**
     * Gets the configuration options.
     *
     * @return array
     */
    public function getOptions(): array {
        $options = [
            'directory' => 'packages/StandAloneComplex/EloquentModelGenerator/src',
        ];

        $validator = new PintConfigurationValidator();
        if (!$validator->validate($options)) {
            throw new \Exception('Invalid Pint configuration options.');
        }

        return $options;
    }
}