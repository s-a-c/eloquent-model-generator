<?php

namespace StandAloneComplex\EloquentModelGenerator\Tools;

use StandAloneComplex\EloquentModelGenerator\Contracts\AnalysisConfig;
use StandAloneComplex\EloquentModelGenerator\Tools\MetricsConfigurationValidator;

class MetricsConfigBuilder implements AnalysisConfig {
    /**
     * Gets the configuration options.
     *
     * @return array
     */
    public function getOptions(): array {
        $options = [
            'report-html' => 'packages/StandAloneComplex/EloquentModelGenerator/build/metrics/report.html',
        ];

        $validator = new MetricsConfigurationValidator();
        if (!$validator->validate($options)) {
            throw new \Exception('Invalid Metrics configuration options.');
        }

        // Load Metrics specific configuration
        $options['failure-condition'] = 'abc > 10'; // Example failure condition

        return $options;
    }
}