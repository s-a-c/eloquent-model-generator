<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Analysis Tools Configuration
    |--------------------------------------------------------------------------
    |
    | This file is for configuring the static analysis tools used by the package.
    |
    */

    'analysis' => [
        'phpstan' => [
            'includes' => [
                'vendor/larastan/larastan/extension.neon',
            ],
            'parameters' => [
                'level' => 8,
                'paths' => [
                    dirname(__DIR__) . '/src',
                ],
                'tmpDir' => dirname(__DIR__) . '/build/phpstan',
                'rootDir' => dirname(__DIR__),
                'customRulesetUsed' => true,
                'bootstrapFiles' => [],
                'autoload_files' => [],
                'autoload_directories' => [],
                'scanFiles' => [],
                'scanDirectories' => [],
                'checkModelProperties' => true,
                'checkPhpDocMissingReturn' => true,
                'checkUnionTypes' => true,
                'reportUnmatchedIgnoredErrors' => false,
                'treatPhpDocTypesAsCertain' => false,
                'parallel' => [
                    'maximumNumberOfProcesses' => 1,
                ],
                'excludePaths' => [
                    dirname(__DIR__) . '/tests/tmp/*',
                    dirname(__DIR__) . '/tests/*',
                    dirname(__DIR__) . '/build/*',
                    dirname(__DIR__) . '/vendor/*',
                    '*.blade.php',
                ],
            ],
        ],
    ],
];
