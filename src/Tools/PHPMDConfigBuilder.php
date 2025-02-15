<?php

namespace StandAloneComplex\EloquentModelGenerator\Tools;

use StandAloneComplex\EloquentModelGenerator\Contracts\AnalysisConfig;
use StandAloneComplex\EloquentModelGenerator\Tools\PHPMDConfigurationValidator;

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

        return $options;
    }
}