<?php

use PhpCsFixer\Config;
use PhpCsFixer\Finder;

$finder = Finder::create()
    ->in([
        __DIR__ . '/src',
        __DIR__ . '/tests',
    ])
    ->name('*.php')
    ->notName('*.blade.php')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true);

$config = new Config();

return $config
    ->setRules([
        // PSR-12 base rules
        '@PSR12' => true,
        '@PHP81Migration' => true,

        // PHP syntax preferences
        'array_syntax' => ['syntax' => 'short'],
        'no_mixed_echo_print' => ['use' => 'echo'],
        'no_multiline_whitespace_around_double_arrow' => true,
        'multiline_whitespace_before_semicolons' => ['strategy' => 'no_multi_line'],
        'no_singleline_whitespace_before_semicolons' => true,
        'semicolon_after_instruction' => true,

        // Import rules
        'ordered_imports' => [
            'sort_algorithm' => 'alpha',
            'imports_order' => ['class', 'function', 'const'],
        ],
        'no_unused_imports' => true,
        'global_namespace_import' => [
            'import_classes' => true,
            'import_constants' => false,
            'import_functions' => false,
        ],

        // Spacing and alignment
        'binary_operator_spaces' => [
            'default' => 'single_space',
            'operators' => [
                '=>' => 'single_space',
                '=' => 'single_space',
            ],
        ],
        'concat_space' => ['spacing' => 'one'],
        'not_operator_with_successor_space' => true,
        'object_operator_without_whitespace' => true,
        'unary_operator_spaces' => true,
        'whitespace_after_comma_in_array' => true,

        // Code structure
        'blank_line_after_namespace' => true,
        'blank_line_after_opening_tag' => true,
        'blank_line_before_statement' => [
            'statements' => [
                'break',
                'continue',
                'declare',
                'return',
                'throw',
                'try',
                'if',
                'switch',
                'case',
                'default',
            ],
        ],
        'braces' => [
            'allow_single_line_anonymous_class_with_empty_body' => true,
            'allow_single_line_closure' => true,
            'position_after_control_structures' => 'same',
            'position_after_functions_and_oop_constructs' => 'next',
        ],
        'class_attributes_separation' => [
            'elements' => [
                'const' => 'one',
                'method' => 'one',
                'property' => 'one',
                'trait_import' => 'none',
            ],
        ],

        // PHPDoc
        'align_multiline_comment' => ['comment_type' => 'phpdocs_only'],
        'no_blank_lines_after_phpdoc' => true,
        'no_empty_phpdoc' => true,
        'phpdoc_add_missing_param_annotation' => ['only_untyped' => true],
        'phpdoc_align' => ['align' => 'left'],
        'phpdoc_indent' => true,
        'phpdoc_inline_tag_normalizer' => true,
        'phpdoc_no_access' => true,
        'phpdoc_no_empty_return' => true,
        'phpdoc_no_package' => true,
        'phpdoc_order' => true,
        'phpdoc_scalar' => true,
        'phpdoc_separation' => true,
        'phpdoc_single_line_var_spacing' => true,
        'phpdoc_trim' => true,
        'phpdoc_types' => true,
        'phpdoc_var_without_name' => true,

        // Function notation
        'lambda_not_used_import' => true,
        'method_argument_space' => [
            'on_multiline' => 'ensure_fully_multiline',
            'keep_multiple_spaces_after_comma' => false,
        ],
        'nullable_type_declaration_for_default_null_value' => true,
        'single_line_throw' => true,

        // Return notation
        'no_useless_return' => true,
        'return_type_declaration' => ['space_before' => 'none'],
        'simplified_null_return' => true,

        // Array notation
        'trailing_comma_in_multiline' => [
            'elements' => ['arrays', 'arguments', 'parameters'],
        ],
        'trim_array_spaces' => true,
        'whitespace_after_comma_in_array' => true,

        // Control structures
        'no_alternative_syntax' => true,
        'no_unneeded_control_parentheses' => true,
        'no_unneeded_curly_braces' => true,
        'switch_case_semicolon_to_colon' => true,
        'switch_case_space' => true,
        'yoda_style' => false,

        // Cast notation
        'cast_spaces' => ['space' => 'single'],
        'lowercase_cast' => true,
        'no_short_bool_cast' => true,
        'modernize_types_casting' => true,

        // Language constructs
        'combine_consecutive_issets' => true,
        'combine_consecutive_unsets' => true,
        'declare_equal_normalize' => ['space' => 'single'],
        'explicit_indirect_variable' => true,
        'single_space_after_construct' => true,

        // PHP tags
        'linebreak_after_opening_tag' => true,
        'no_closing_tag' => true,

        // PHPUnit
        'php_unit_fqcn_annotation' => true,
        'php_unit_method_casing' => ['case' => 'camel_case'],
        'php_unit_test_annotation' => ['style' => 'annotation'],
        'php_unit_test_case_static_method_calls' => ['call_type' => 'this'],

        // Strict mode
        'strict_comparison' => true,
        'strict_param' => true,

        // Doctrine
        'doctrine_annotation_array_assignment' => true,
        'doctrine_annotation_spaces' => true,
    ])
    ->setRiskyAllowed(true)
    ->setFinder($finder)
    ->setCacheFile(__DIR__ . '/build/.php-cs-fixer.cache');
