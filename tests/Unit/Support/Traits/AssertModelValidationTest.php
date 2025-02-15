<?php

namespace SAC\EloquentModelGenerator\Tests\Unit\Support\Traits;

use SAC\EloquentModelGenerator\ModelGenerator;
use SAC\EloquentModelGenerator\Tests\Support\Traits\AssertModelValidation;
use SAC\EloquentModelGenerator\Tests\TestCase;
use SAC\EloquentModelGenerator\ValueObjects\ModelDefinition;

class AssertModelValidationTest extends TestCase
{
    use AssertModelValidation;

    private ModelGenerator $generator;

    protected function setUp(): void
    {
        parent::setUp();
        $this->generator = $this->app->make(ModelGenerator::class);
    }

    public function test_assert_model_has_validation_rules(): void
    {
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

        $expectedRules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|unique:test_table,email',
        ];

        $this->assertModelHasValidationRules($model, $expectedRules);
    }

    public function test_validation_passes_with_valid_data(): void
    {
        $schema = [
            'columns' => [
                'age' => [
                    'type' => 'integer',
                    'unsigned' => true,
                    'nullable' => false,
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

        $this->assertValidationPasses($model, ['age' => 25]);
    }

    public function test_validation_fails_with_invalid_data(): void
    {
        $schema = [
            'columns' => [
                'email' => [
                    'type' => 'string',
                    'nullable' => false,
                    'rules' => 'email',
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

        $this->assertValidationFails(
            $model,
            ['email' => 'not-an-email'],
            ['The email field must be a valid email address.']
        );
    }

    public function test_assert_has_validation_rule(): void
    {
        $schema = [
            'columns' => [
                'password' => [
                    'type' => 'string',
                    'nullable' => false,
                    'rules' => ['min:8', 'regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/'],
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

        $this->assertHasValidationRule($model, 'password', 'min:8');
    }

    public function test_validation_rule_enforced(): void
    {
        $schema = [
            'columns' => [
                'status' => [
                    'type' => 'enum',
                    'values' => ['active', 'inactive'],
                    'nullable' => false,
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

        $this->assertValidationRuleEnforced(
            $model,
            'status',
            'active',
            'invalid-status',
            'The status field must be one of: active, inactive.'
        );
    }

    public function test_assert_validation_messages(): void
    {
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
            className: 'TestModel',
            namespace: 'App\\Models',
            tableName: 'test_table',
            withValidation: true
        );

        $model = $this->generator->generate($definition, $schema);

        $expectedMessages = [
            'age.integer' => 'Age must be a whole number.',
            'age.min' => 'Age cannot be negative.',
        ];

        $this->assertValidationMessages($model, $expectedMessages);
    }
}
