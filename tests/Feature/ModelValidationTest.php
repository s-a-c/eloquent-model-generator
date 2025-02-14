<?php

namespace SAC\EloquentModelGenerator\Tests\Feature;

use SAC\EloquentModelGenerator\Tests\TestCase;
use SAC\EloquentModelGenerator\Tests\Support\Traits\AssertModelValidation;
use SAC\EloquentModelGenerator\Support\Definitions\ModelDefinition;
use SAC\EloquentModelGenerator\ModelGenerator;

class ModelValidationTest extends TestCase {
    use AssertModelValidation;

    private ModelGenerator $generator;

    protected function setUp(): void {
        parent::setUp();
        $this->generator = $this->app->make(ModelGenerator::class);
    }

    public function testGeneratesModelWithValidationRules(): void {
        $schema = [
            'columns' => [
                'name' => [
                    'type' => 'string',
                    'length' => 255,
                    'nullable' => false,
                ],
                'email' => [
                    'type' => 'string',
                    'unique' => true,
                    'nullable' => false,
                    'rules' => 'email',
                ],
                'is_active' => [
                    'type' => 'boolean',
                    'nullable' => false,
                ],
            ],
        ];

        $definition = new ModelDefinition(
            'TestModel',
            'App\\Models',
            collect($schema['columns']),
            collect([]),
            null,
            false,
            true,
            false,
            'test_table'
        );

        $model = $this->generator->generate($definition, $schema);

        $expectedRules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:test_users,email',
            'is_active' => 'required|boolean',
        ];

        $this->assertModelHasValidationRules($model, $expectedRules);

        // Test valid data
        $this->assertValidationPasses($model, [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'is_active' => true,
        ]);

        // Test invalid data
        $this->assertValidationFails($model, [
            'name' => '',
            'email' => 'not-an-email',
            'is_active' => 'not-a-boolean',
        ], [
            'The name field is required.',
            'The email field must be a valid email address.',
            'The is active field must be true or false.',
        ]);
    }

    public function testMergesCustomValidationRules(): void {
        $schema = [
            'columns' => [
                'email' => [
                    'type' => 'string',
                    'unique' => true,
                    'nullable' => false,
                    'rules' => ['email', 'unique:users,email,{id}'],
                ],
                'password' => [
                    'type' => 'string',
                    'nullable' => false,
                    'rules' => ['min:8', 'regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/'],
                ],
            ],
        ];

        $definition = new ModelDefinition(
            'TestModel',
            'App\\Models',
            collect($schema['columns']),
            collect([]),
            null,
            false,
            true,
            false,
            'test_table'
        );

        $model = $this->generator->generate($definition, $schema);

        // Test password rules
        $this->assertHasValidationRule($model, 'password', 'min:8');
        $this->assertHasValidationRule($model, 'password', 'regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/');

        // Test password validation
        $this->assertValidationRuleEnforced(
            $model,
            'password',
            'Password123',
            'weak',
            'The password field must be at least 8 characters.'
        );

        // Test email rules
        $this->assertHasValidationRule($model, 'email', 'email');
        $this->assertHasValidationRule($model, 'email', 'unique:users,email,{id}');

        // Test email validation
        $this->assertValidationRuleEnforced(
            $model,
            'email',
            'test@example.com',
            'not-an-email',
            'The email field must be a valid email address.'
        );
    }

    public function testHandlesCustomValidationMessages(): void {
        $schema = [
            'columns' => [
                'age' => [
                    'type' => 'integer',
                    'unsigned' => true,
                    'nullable' => false,
                    'messages' => [
                        'integer' => 'Age must be a whole number.',
                        'min' => 'Age cannot be negative.',
                    ],
                ],
            ],
        ];

        $definition = new ModelDefinition(
            'TestModel',
            'App\\Models',
            collect($schema['columns']),
            collect([]),
            null,
            false,
            true,
            false,
            'test_table'
        );

        $model = $this->generator->generate($definition, $schema);

        $expectedMessages = [
            'age.integer' => 'Age must be a whole number.',
            'age.min' => 'Age cannot be negative.',
        ];

        $this->assertValidationMessages($model, $expectedMessages);

        // Test validation with custom messages
        $this->assertValidationRuleEnforced(
            $model,
            'age',
            25,
            'not-a-number',
            'Age must be a whole number.'
        );
    }
}
