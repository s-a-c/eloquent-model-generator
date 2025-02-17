<?php

namespace SAC\EloquentModelGenerator\Tools;

use SAC\EloquentModelGenerator\Contracts\AnalysisConfig;
use SAC\EloquentModelGenerator\Tools\PHPStanConfigurationValidator;

class PHPStanConfigBuilder implements AnalysisConfig {
    /**
     * Gets the configuration options.
     *
     * @return array
     */
    public function getOptions(): array {
        $options = [
            'parameters' => [
                'paths' => [
                    'src'
                ],
            ],
            'rules' => [],
        ];

        // Load Laravel best practices rules.
        $laravelBestPracticesRules = require __DIR__ . '/../../config/rules/laravel_best_practices.php';

        $options['rules'] = array_merge($options['rules'], $laravelBestPracticesRules);

        $validator = new PHPStanConfigurationValidator();
        if (!$validator->validate($options)) {
            throw new \Exception('Invalid PHPStan configuration options.');
        }

        return $options;
    }
}