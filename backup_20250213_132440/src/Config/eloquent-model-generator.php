<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Model Namespace
    |--------------------------------------------------------------------------
    |
    | Default namespace for generated models
    |
    */
    'namespace' => 'App\\Models',

    /*
    |--------------------------------------------------------------------------
    | Output Path
    |--------------------------------------------------------------------------
    |
    | Default path where generated models will be placed
    |
    */
    'output_path' => app_path('Models'),

    /*
    |--------------------------------------------------------------------------
    | Base Model Class
    |--------------------------------------------------------------------------
    |
    | Base class that generated models will extend
    |
    */
    'base_model_class' => 'Illuminate\\Database\\Eloquent\\Model',

    /*
    |--------------------------------------------------------------------------
    | Use Base Model
    |--------------------------------------------------------------------------
    |
    | Whether generated models should extend the base model
    |
    */
    'use_base_model' => true,

    /*
    |--------------------------------------------------------------------------
    | Performance Settings
    |--------------------------------------------------------------------------
    |
    | Settings for optimizing model generation performance
    |
    */
    'performance' => [
        'parallel_processing' => true,
        'max_concurrent_jobs' => 4,
        'cache_enabled' => true,
        'chunk_size' => 50,
        'memory_limit' => '256M',
    ],

    /*
    |--------------------------------------------------------------------------
    | Excluded Tables
    |--------------------------------------------------------------------------
    |
    | Tables that should be excluded from model generation
    |
    */
    'excluded_tables' => [
        'migrations',
        'password_resets',
        'failed_jobs',
        'personal_access_tokens',
    ],
];
