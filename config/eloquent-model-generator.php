<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Model Namespace
    |--------------------------------------------------------------------------
    |
    | This value defines the default namespace for generated models.
    | You may change this to any namespace you wish to use.
    |
    */
    'namespace' => 'App\\Models',

    /*
    |--------------------------------------------------------------------------
    | Model Path
    |--------------------------------------------------------------------------
    |
    | This value defines the path where generated models will be placed.
    | The path should be relative to the project root.
    |
    */
    'path' => 'app/Models',

    /*
    |--------------------------------------------------------------------------
    | Type Mappings
    |--------------------------------------------------------------------------
    |
    | Define custom mappings between database column types and PHP types.
    | These mappings will be merged with the default mappings.
    |
    */
    'type_mappings' => [
        // Example:
        // 'enum' => \App\Types\EnumType::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Relationship Detection
    |--------------------------------------------------------------------------
    |
    | Configure how relationships between models are detected.
    |
    */
    'relationships' => [
        // Enable or disable automatic relationship detection
        'auto_detect' => true,

        // Custom patterns for detecting relationships
        'patterns' => [
            // Format: 'pattern' => 'relationship_type'
            '_id$' => 'belongsTo',
            '^parent_id$' => 'belongsTo',
            '^owner_id$' => 'belongsTo',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Model Generation
    |--------------------------------------------------------------------------
    |
    | Configure how models are generated.
    |
    */
    'generation' => [
        // Whether to generate PHPDoc blocks for properties
        'generate_phpdoc' => true,

        // Whether to generate property type hints
        'generate_type_hints' => true,

        // Whether to generate validation rules
        'generate_validation' => true,

        // Whether to generate relationship methods
        'generate_relationships' => true,

        // Whether to generate method docblocks
        'generate_method_docs' => true,

        // Base model class to extend
        'base_model_class' => \Illuminate\Database\Eloquent\Model::class,

        // Traits to include in generated models
        'traits' => [
            // Example:
            // \Illuminate\Database\Eloquent\SoftDeletes::class,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Validation
    |--------------------------------------------------------------------------
    |
    | Configure validation rule generation.
    |
    */
    'validation' => [
        // Whether to generate validation rules in a separate class
        'separate_validator' => false,

        // Namespace for generated validator classes
        'validator_namespace' => 'App\\Models\\Validation',

        // Custom validation rules
        'custom_rules' => [
            // Example:
            // 'phone' => \App\Rules\PhoneNumber::class,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | File Generation
    |--------------------------------------------------------------------------
    |
    | Configure how files are generated.
    |
    */
    'files' => [
        // Whether to backup existing files before overwriting
        'backup' => true,

        // File extension for generated files
        'extension' => '.php',

        // Whether to generate one file per model
        'separate_files' => true,
    ],
];
