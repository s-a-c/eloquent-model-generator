<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Test Directory
    |--------------------------------------------------------------------------
    |
    | This is the directory where your tests are located.
    |
    */
    'testDirectory' => 'tests',

    /*
    |--------------------------------------------------------------------------
    | Default Values
    |--------------------------------------------------------------------------
    |
    | Configure your default test configuration.
    |
    */
    'default' => [
        'databases' => true,
        'migrations' => true,
        'seeds' => false,
        'withoutExceptionHandling' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Parallel Testing
    |--------------------------------------------------------------------------
    |
    | Configure parallel testing settings.
    |
    */
    'parallel' => [
        'enabled' => true,
        'processes' => 4,
        'testTokens' => [
            'unit' => 1,
            'feature' => 2,
            'integration' => 2,
            'performance' => 1,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Coverage
    |--------------------------------------------------------------------------
    |
    | Configure code coverage settings.
    |
    */
    'coverage' => [
        'enabled' => true,
        'includeUncoveredFiles' => true,
        'minPercentage' => 80,
        'excludeFiles' => [
            'tests/*',
            'vendor/*',
            'config/*',
        ],
        'excludeFunctions' => [
            '__construct',
            'register',
            'boot',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins
    |--------------------------------------------------------------------------
    |
    | Configure Pest plugin settings.
    |
    */
    'plugins' => [
        'arch' => [
            'enabled' => true,
            'rules' => [
                'models_in_models_directory',
                'controllers_in_http_directory',
                'value_objects_are_immutable',
            ],
        ],
        'faker' => [
            'enabled' => true,
            'locale' => 'en_US',
        ],
        'stressless' => [
            'enabled' => true,
            'iterations' => 100,
            'timeout' => 60,
        ],
        'type-coverage' => [
            'enabled' => true,
            'minPercentage' => 90,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Performance Testing
    |--------------------------------------------------------------------------
    |
    | Configure performance testing thresholds.
    |
    */
    'performance' => [
        'memory' => [
            'warning' => 50 * 1024 * 1024, // 50MB
            'critical' => 200 * 1024 * 1024, // 200MB
        ],
        'time' => [
            'warning' => 1000, // 1 second
            'critical' => 5000, // 5 seconds
        ],
        'queries' => [
            'warning' => 50,
            'critical' => 100,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Test Groups
    |--------------------------------------------------------------------------
    |
    | Configure test group settings.
    |
    */
    'groups' => [
        'unit' => [
            'directory' => 'Unit',
            'parallel' => true,
        ],
        'feature' => [
            'directory' => 'Feature',
            'parallel' => true,
        ],
        'integration' => [
            'directory' => 'Integration',
            'parallel' => true,
        ],
        'performance' => [
            'directory' => 'Performance',
            'parallel' => false,
        ],
    ],
];
