<?php

namespace SAC\EloquentModelGenerator\Tests\Feature\Validation;

use SAC\EloquentModelGenerator\ModelGenerator;
use SAC\EloquentModelGenerator\Tests\Support\Traits\AssertModelValidation;
use SAC\EloquentModelGenerator\Tests\Support\Traits\WithSQLiteTesting;
use SAC\EloquentModelGenerator\ValueObjects\ModelDefinition;

uses(WithSQLiteTesting::class, AssertModelValidation::class);

beforeEach(function () {
    $this->generator = app(ModelGenerator::class);
});

dataset('basic_validation_rules', [
    'string rules' => [
        'column' => [
            'type' => 'string',
            'length' => 255,
            'nullable' => false,
        ],
        'expected_rules' => 'required|string|max:255',
        'valid_data' => 'Test String',
        'invalid_data' => str_repeat('a', 256),
        'error_message' => 'The test column field must not be greater than 255 characters.',
    ],
    'email rules' => [
        'column' => [
            'type' => 'string',
            'length' => 255,
            'unique' => true,
            'nullable' => false,
            'email' => true,
        ],
        'expected_rules' => 'required|email|unique:users,email',
        'valid_data' => 'test@example.com',
        'invalid_data' => 'not-an-email',
        'error_message' => 'The test column field must be a valid email address.',
    ],
    'numeric rules' => [
        'column' => [
            'type' => 'decimal',
            'precision' => 8,
            'scale' => 2,
            'nullable' => false,
            'unsigned' => true,
        ],
        'expected_rules' => 'required|numeric|min:0|decimal:2',
        'valid_data' => 123.45,
        'invalid_data' => -1,
        'error_message' => 'The test column field must be at least 0.',
    ],
    'enum rules' => [
        'column' => [
            'type' => 'enum',
            'values' => ['active', 'inactive', 'pending'],
            'nullable' => false,
        ],
        'expected_rules' => 'required|in:active,inactive,pending',
        'valid_data' => 'active',
        'invalid_data' => 'invalid-status',
        'error_message' => 'The selected test column is invalid.',
    ],
]);

dataset('advanced_validation_rules', [
    'json rules' => [
        'column' => [
            'type' => 'json',
            'nullable' => false,
        ],
        'expected_rules' => 'required|json',
        'valid_data' => '{"key":"value"}',
        'invalid_data' => 'invalid-json',
        'error_message' => 'The test column field must be a valid JSON string.',
    ],
    'date rules' => [
        'column' => [
            'type' => 'date',
            'nullable' => false,
        ],
        'expected_rules' => 'required|date',
        'valid_data' => '2024-03-20',
        'invalid_data' => 'not-a-date',
        'error_message' => 'The test column field must be a valid date.',
    ],
    'url rules' => [
        'column' => [
            'type' => 'string',
            'rules' => 'url',
            'nullable' => false,
        ],
        'expected_rules' => 'required|string|url',
        'valid_data' => 'https://example.com',
        'invalid_data' => 'not-a-url',
        'error_message' => 'The test column field must be a valid URL.',
    ],
    'array rules' => [
        'column' => [
            'type' => 'json',
            'rules' => 'array|min:1',
            'nullable' => false,
        ],
        'expected_rules' => 'required|array|min:1',
        'valid_data' => ['item1'],
        'invalid_data' => [],
        'error_message' => 'The test column field must have at least 1 items.',
    ],
]);

test('generates basic validation rules', function (array $column, string $expected_rules, mixed $valid_data, mixed $invalid_data, string $error_message) {
    $schema = [
        'columns' => [
            'id' => ['type' => 'integer', 'autoIncrement' => true],
            'test_column' => $column,
        ],
    ];

    $definition = new ModelDefinition(
        className: 'TestModel',
        namespace: 'App\\Models',
        tableName: 'test_table',
        baseClass: 'Illuminate\\Database\\Eloquent\\Model',
        withValidation: true
    );

    $model = $this->generator->generate($definition, $schema);

    // Test validation rules are correctly generated
    $this->assertHasValidationRule($model, 'test_column', $expected_rules);

    // Test validation passes with valid data
    $this->assertValidationPasses($model, ['test_column' => $valid_data]);

    // Test validation fails with invalid data
    $this->assertValidationFails($model, ['test_column' => $invalid_data], [$error_message]);
})->with('basic_validation_rules');

test('generates advanced validation rules', function (array $column, string $expected_rules, mixed $valid_data, mixed $invalid_data, string $error_message) {
    $schema = [
        'columns' => [
            'id' => ['type' => 'integer', 'autoIncrement' => true],
            'test_column' => $column,
        ],
    ];

    $definition = new ModelDefinition(
        className: 'TestModel',
        namespace: 'App\\Models',
        tableName: 'test_table',
        baseClass: 'Illuminate\\Database\\Eloquent\\Model',
        withValidation: true
    );

    $model = $this->generator->generate($definition, $schema);

    // Test validation rules are correctly generated
    $this->assertHasValidationRule($model, 'test_column', $expected_rules);

    // Test validation passes with valid data
    $this->assertValidationPasses($model, ['test_column' => $valid_data]);

    // Test validation fails with invalid data
    $this->assertValidationFails($model, ['test_column' => $invalid_data], [$error_message]);
})->with('advanced_validation_rules');

test('handles custom validation messages', function () {
    $schema = [
        'columns' => [
            'email' => [
                'type' => 'string',
                'unique' => true,
                'email' => true,
                'messages' => [
                    'email' => 'Please enter a valid email address',
                    'unique' => 'This email is already taken',
                    'required' => 'Email address is required',
                ],
            ],
        ],
    ];

    $definition = new ModelDefinition(
        className: 'TestModel',
        namespace: 'App\\Models',
        tableName: 'test_table',
        withValidation: true
    );

    $model = $this->generator->generate($definition, $schema);

    // Test custom messages are set correctly
    $this->assertValidationMessages($model, [
        'email.email' => 'Please enter a valid email address',
        'email.unique' => 'This email is already taken',
        'email.required' => 'Email address is required',
    ]);

    // Test each validation scenario
    $this->assertValidationPasses($model, [
        'email' => 'test@example.com',
    ]);

    $this->assertValidationFails($model, [
        'email' => '',
    ], ['Email address is required']);

    $this->assertValidationFails($model, [
        'email' => 'not-an-email',
    ], ['Please enter a valid email address']);
});

test('handles conditional validation rules', function () {
    $schema = [
        'columns' => [
            'password' => [
                'type' => 'string',
                'rules' => 'required_if:is_active,true|min:8',
                'messages' => [
                    'required_if' => 'Password is required for active users',
                    'min' => 'Password must be at least 8 characters',
                ],
            ],
            'phone' => [
                'type' => 'string',
                'rules' => 'required_unless:email,null|regex:/^\+?[1-9]\d{1,14}$/',
                'messages' => [
                    'required_unless' => 'Phone number is required when email is not provided',
                    'regex' => 'Please enter a valid phone number',
                ],
            ],
        ],
    ];

    $definition = new ModelDefinition(
        className: 'TestModel',
        namespace: 'App\\Models',
        tableName: 'test_table',
        withValidation: true
    );

    $model = $this->generator->generate($definition, $schema);

    // Test password conditional validation
    $this->assertValidationPasses($model, [
        'is_active' => false,
        'password' => null,
    ]);

    $this->assertValidationFails($model, [
        'is_active' => true,
        'password' => null,
    ], ['Password is required for active users']);

    $this->assertValidationFails($model, [
        'is_active' => true,
        'password' => '123',
    ], ['Password must be at least 8 characters']);

    // Test phone conditional validation
    $this->assertValidationPasses($model, [
        'email' => null,
        'phone' => '+1234567890',
    ]);

    $this->assertValidationFails($model, [
        'email' => 'test@example.com',
        'phone' => 'invalid-phone',
    ], ['Please enter a valid phone number']);

    $this->assertValidationFails($model, [
        'email' => null,
        'phone' => null,
    ], ['Phone number is required when email is not provided']);
});

test('handles complex validation scenarios', function () {
    $schema = [
        'columns' => [
            'age' => [
                'type' => 'integer',
                'rules' => 'required|integer|between:18,100',
                'messages' => [
                    'between' => 'Age must be between :min and :max years',
                ],
            ],
            'preferences' => [
                'type' => 'json',
                'rules' => ['required', 'array', 'min:1', 'max:5'],
                'messages' => [
                    'min' => 'At least one preference is required',
                    'max' => 'Maximum of 5 preferences allowed',
                ],
            ],
            'website' => [
                'type' => 'string',
                'rules' => 'nullable|url|active_url',
                'messages' => [
                    'active_url' => 'The website must be accessible',
                ],
            ],
        ],
    ];

    $definition = new ModelDefinition(
        className: 'TestModel',
        namespace: 'App\\Models',
        tableName: 'test_table',
        withValidation: true
    );

    $model = $this->generator->generate($definition, $schema);

    // Test age validation
    $this->assertValidationPasses($model, [
        'age' => 25,
        'preferences' => ['music'],
    ]);

    $this->assertValidationFails($model, [
        'age' => 15,
        'preferences' => ['music'],
    ], ['Age must be between 18 and 100 years']);

    // Test preferences validation
    $this->assertValidationFails($model, [
        'age' => 25,
        'preferences' => [],
    ], ['At least one preference is required']);

    $this->assertValidationFails($model, [
        'age' => 25,
        'preferences' => ['1', '2', '3', '4', '5', '6'],
    ], ['Maximum of 5 preferences allowed']);

    // Test website validation
    $this->assertValidationPasses($model, [
        'age' => 25,
        'preferences' => ['music'],
        'website' => null,
    ]);

    $this->assertValidationPasses($model, [
        'age' => 25,
        'preferences' => ['music'],
        'website' => 'https://example.com',
    ]);

    $this->assertValidationFails($model, [
        'age' => 25,
        'preferences' => ['music'],
        'website' => 'not-a-url',
    ], ['The website field must be a valid URL.']);
});
