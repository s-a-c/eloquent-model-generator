<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Default Namespace
    |--------------------------------------------------------------------------
    |
    | The default namespace for generated models.
    |
    */
    'namespace' => env('EMG_NAMESPACE', 'App\\Models'),

    /*
    |--------------------------------------------------------------------------
    | Output Path
    |--------------------------------------------------------------------------
    |
    | The path where generated models will be saved, relative to the application
    | base path.
    |
    */
    'output_path' => env('EMG_OUTPUT_PATH', 'app/Models'),

    /*
    |--------------------------------------------------------------------------
    | Base Model Class
    |--------------------------------------------------------------------------
    |
    | The base class for generated models.
    |
    */
    'base_class' => env('EMG_BASE_CLASS', 'Illuminate\\Database\\Eloquent\\Model'),

    /*
    |--------------------------------------------------------------------------
    | Model Generation Options
    |--------------------------------------------------------------------------
    |
    | Configure various aspects of model generation.
    |
    */
    'with_relationships' => env('EMG_WITH_RELATIONSHIPS', true),
    'with_validation' => env('EMG_WITH_VALIDATION', true),
    'with_soft_deletes' => env('EMG_WITH_SOFT_DELETES', false),

    /*
    |--------------------------------------------------------------------------
    | Table Filtering
    |--------------------------------------------------------------------------
    |
    | Configure which tables to include or exclude from model generation.
    |
    */
    'exclude_tables' => array_filter(
        explode(',', env('EMG_EXCLUDE_TABLES', 'migrations,failed_jobs,password_resets,personal_access_tokens'))
    ),

    'only_tables' => array_filter(
        explode(',', env('EMG_ONLY_TABLES', ''))
    ),

    /*
    |--------------------------------------------------------------------------
    | Performance Options
    |--------------------------------------------------------------------------
    |
    | Configure performance-related settings.
    |
    */
    'use_cache' => env('EMG_USE_CACHE', true),
    'cache_ttl' => env('EMG_CACHE_TTL', 3600),
    'concurrency' => env('EMG_CONCURRENCY', 4),

    /*
    |--------------------------------------------------------------------------
    | Database Analysis Settings
    |--------------------------------------------------------------------------
    |
    | Configure how the generator analyzes your database schema.
    |
    */
    'analysis' => [
        'foreign_keys' => env('EMG_ANALYZE_FOREIGN_KEYS', true),
        'indexes' => env('EMG_ANALYZE_INDEXES', true),
        'column_types' => env('EMG_ANALYZE_COLUMN_TYPES', true),
    ],

    /*
    |--------------------------------------------------------------------------
    | Code Style Settings
    |--------------------------------------------------------------------------
    |
    | Configure the code style of generated models.
    |
    */
    'style' => [
        'psr12_compliance' => env('EMG_PSR12_COMPLIANCE', true),
        'with_docblocks' => env('EMG_WITH_DOCBLOCKS', true),
        'with_type_hints' => env('EMG_WITH_TYPE_HINTS', true),
    ],

    /*
    |--------------------------------------------------------------------------
    | Relationship Settings
    |--------------------------------------------------------------------------
    |
    | Configure how relationships are detected and generated.
    |
    */
    'relationships' => [
        'detect_polymorphic' => env('EMG_DETECT_POLYMORPHIC', true),
        'detect_many_to_many' => env('EMG_DETECT_MANY_TO_MANY', true),
        'detect_has_through' => env('EMG_DETECT_HAS_THROUGH', true),
    ],

    /*
    |--------------------------------------------------------------------------
    | Validation Settings
    |--------------------------------------------------------------------------
    |
    | Configure how validation rules are generated.
    |
    */
    'validation' => [
        'from_database_rules' => env('EMG_VALIDATION_FROM_DB_RULES', true),
        'include_form_request' => env('EMG_VALIDATION_INCLUDE_FORMREQUEST', true),
    ],

    /*
    |--------------------------------------------------------------------------
    | Cache Settings
    |--------------------------------------------------------------------------
    |
    | Configure the caching behavior of the generator.
    |
    */
    'cache' => [
        'driver' => env('EMG_CACHE_DRIVER', 'file'),
        'prefix' => env('EMG_CACHE_PREFIX', 'model_generator_'),
    ],
];
