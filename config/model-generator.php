<?php

declare(strict_types=1);

return [
    /*
    |--------------------------------------------------------------------------
    | Schema Analysis Configuration
    |--------------------------------------------------------------------------
    |
    | Configure how the schema analyzer processes database tables and relationships.
    | These settings control the behavior of the analysis phase.
    |
    */
    'schema' => [
        // Number of tables to process in each chunk
        'chunk_size' => env('EMG_CHUNK_SIZE', 100),

        // Whether to analyze indexes for relationship detection
        'analyze_indexes' => env('EMG_ANALYZE_INDEXES', true),

        // Whether to detect polymorphic relationships
        'detect_polymorphic' => env('EMG_DETECT_POLYMORPHIC', true),

        // Tables to exclude from analysis
        'exclude_tables' => array_filter(
            explode(',', env('EMG_EXCLUDE_TABLES', 'migrations,failed_jobs,password_resets'))
        ),

        // Columns to ignore during analysis
        'ignore_columns' => array_filter(
            explode(',', env('EMG_IGNORE_COLUMNS', ''))
        ),

        // Table prefix to strip from model names
        'table_prefix' => env('EMG_TABLE_PREFIX', ''),
    ],

    /*
    |--------------------------------------------------------------------------
    | Model Generation Configuration
    |--------------------------------------------------------------------------
    |
    | Configure how models are generated, including namespace, traits,
    | and various code generation options.
    |
    */
    'generation' => [
        // Base namespace for generated models
        'namespace' => env('EMG_MODEL_NAMESPACE', 'App\\Models'),

        // Path where models will be generated
        'path' => env('EMG_MODEL_PATH', 'app/Models'),

        // Base model class
        'base_class' => env('EMG_BASE_CLASS', 'Illuminate\\Database\\Eloquent\\Model'),

        // Default traits to include in generated models
        'traits' => array_filter(
            explode(',', env('EMG_MODEL_TRAITS', ''))
        ),

        // Whether to generate PHPDoc blocks
        'generate_phpdoc' => env('EMG_GENERATE_PHPDOC', true),

        // Whether to generate type hints
        'generate_type_hints' => env('EMG_GENERATE_TYPE_HINTS', true),

        // Whether to generate property definitions
        'generate_properties' => env('EMG_GENERATE_PROPERTIES', true),

        // Whether to generate factories
        'generate_factories' => env('EMG_GENERATE_FACTORIES', true),

        // Whether to backup existing models before overwriting
        'backup_existing' => env('EMG_BACKUP_EXISTING', true),

        // Custom model stub path
        'model_stub' => env('EMG_MODEL_STUB'),

        // Model configuration defaults
        'defaults' => [
            'timestamps' => env('EMG_MODEL_TIMESTAMPS', true),
            'soft_deletes' => env('EMG_MODEL_SOFT_DELETES', false),
            'fillable' => env('EMG_MODEL_FILLABLE', true),
            'guarded' => array_filter(
                explode(',', env('EMG_MODEL_GUARDED', ''))
            ),
            'hidden' => array_filter(
                explode(',', env('EMG_MODEL_HIDDEN', 'password,remember_token'))
            ),
            'casts' => json_decode(
                env('EMG_MODEL_CASTS', '{}'),
                true
            ) ?? [],
            'dates' => array_filter(
                explode(',', env('EMG_MODEL_DATES', ''))
            ),
            'appends' => array_filter(
                explode(',', env('EMG_MODEL_APPENDS', ''))
            ),
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Documentation Configuration
    |--------------------------------------------------------------------------
    |
    | Configure how model documentation is generated.
    |
    */
    'documentation' => [
        // Whether to generate documentation
        'enabled' => env('EMG_GENERATE_DOCS', true),

        // Output path for generated documentation
        'output_path' => env('EMG_DOCS_PATH', 'docs/models'),

        // Whether to generate diagrams
        'generate_diagrams' => env('EMG_GENERATE_DIAGRAMS', true),

        // Whether to include example usage
        'include_examples' => env('EMG_INCLUDE_EXAMPLES', true),

        // Documentation format (markdown/html)
        'format' => env('EMG_DOCS_FORMAT', 'markdown'),

        // Template path for custom documentation
        'template_path' => env('EMG_DOCS_TEMPLATE'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Error Handling Configuration
    |--------------------------------------------------------------------------
    |
    | Configure how errors are handled during model generation.
    |
    */
    'error_handling' => [
        // Whether to continue on errors
        'continue_on_error' => env('EMG_CONTINUE_ON_ERROR', false),

        // Whether to log errors
        'log_errors' => env('EMG_LOG_ERRORS', true),

        // Notification channels for errors
        'notification_channels' => array_filter(
            explode(',', env('EMG_ERROR_CHANNELS', ''))
        ),

        // Email address for error notifications
        'notification_email' => env('EMG_ERROR_EMAIL'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Type Mappings
    |--------------------------------------------------------------------------
    |
    | Define custom mappings between database types and PHP types.
    |
    */
    'type_mappings' => [
        'custom_casts' => json_decode(
            env('EMG_CUSTOM_CASTS', '{}'),
            true
        ) ?? [],
        'custom_mutators' => json_decode(
            env('EMG_CUSTOM_MUTATORS', '{}'),
            true
        ) ?? [],
        'custom_accessors' => json_decode(
            env('EMG_CUSTOM_ACCESSORS', '{}'),
            true
        ) ?? [],
    ],

    /*
    |--------------------------------------------------------------------------
    | Polymorphic Mappings
    |--------------------------------------------------------------------------
    |
    | Define mappings for polymorphic relationships.
    |
    */
    'polymorphic' => [
        'morph_map' => json_decode(
            env('EMG_MORPH_MAP', '{}'),
            true
        ) ?? [],
    ],
];
