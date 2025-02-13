<?php

namespace SAC\EloquentModelGenerator\Tests\Unit\Services;

use SAC\EloquentModelGenerator\Services\ValidationRuleGenerator;
use SAC\EloquentModelGenerator\Tests\TestCase;

class ValidationRuleGeneratorTest extends TestCase {
    private ValidationRuleGenerator $generator;

    protected function setUp(): void {
        parent::setUp();
        $this->generator = new ValidationRuleGenerator();
    }

    public function test_generates_rules_for_basic_schema(): void {
        $schema = [
            'columns' => [
                'id' => ['type' => 'integer', 'autoIncrement' => true],
                'name' => ['type' => 'string', 'length' => 255, 'nullable' => false],
                'email' => ['type' => 'string', 'unique' => true, 'nullable' => false],
                'age' => ['type' => 'integer', 'unsigned' => true],
            ],
        ];

        $rules = $this->generator->generateRules($schema);

        expect($rules)
            ->toBeArray()
            ->toHaveCount(3)
            ->and($rules['name'])->toBe('required|string|max:255')
            ->and($rules['email'])->toBe('required|string|unique:,email')
            ->and($rules['age'])->toBe('nullable|integer|min:0');
    }

    public function test_generates_rules_for_numeric_types(): void {
        $schema = [
            'columns' => [
                'price' => [
                    'type' => 'decimal',
                    'scale' => 2,
                    'unsigned' => true,
                    'nullable' => false,
                ],
                'quantity' => [
                    'type' => 'integer',
                    'unsigned' => true,
                    'nullable' => false,
                ],
            ],
        ];

        $rules = $this->generator->generateRules($schema);

        expect($rules)
            ->toBeArray()
            ->toHaveCount(2)
            ->and($rules['price'])->toBe('required|numeric|min:0|decimal:2')
            ->and($rules['quantity'])->toBe('required|integer|min:0');
    }

    public function test_generates_rules_for_dates(): void {
        $schema = [
            'columns' => [
                'birth_date' => ['type' => 'date'],
                'created_at' => ['type' => 'datetime'],
                'opening_time' => ['type' => 'time'],
            ],
        ];

        $rules = $this->generator->generateRules($schema);

        expect($rules)
            ->toBeArray()
            ->toHaveCount(3)
            ->and($rules['birth_date'])->toBe('nullable|date')
            ->and($rules['created_at'])->toBe('nullable|date_format:Y-m-d H:i:s')
            ->and($rules['opening_time'])->toBe('nullable|date_format:H:i:s');
    }

    public function test_generates_rules_for_enum(): void {
        $schema = [
            'columns' => [
                'status' => [
                    'type' => 'enum',
                    'values' => ['active', 'inactive', 'pending'],
                    'nullable' => false,
                ],
            ],
        ];

        $rules = $this->generator->generateRules($schema);

        expect($rules)
            ->toBeArray()
            ->toHaveCount(1)
            ->and($rules['status'])->toBe('required|in:active,inactive,pending');
    }

    public function test_generates_rules_with_custom_rules(): void {
        $schema = [
            'columns' => [
                'password' => [
                    'type' => 'string',
                    'nullable' => false,
                    'rules' => ['min:8', 'regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/'],
                ],
            ],
        ];

        $rules = $this->generator->generateRules($schema);

        expect($rules)
            ->toBeArray()
            ->toHaveCount(1)
            ->and($rules['password'])->toContain('required')
            ->and($rules['password'])->toContain('string')
            ->and($rules['password'])->toContain('min:8')
            ->and($rules['password'])->toContain('regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/');
    }

    public function test_generates_messages_for_basic_schema(): void {
        $schema = [
            'columns' => [
                'name' => ['type' => 'string', 'nullable' => false],
                'email' => ['type' => 'string', 'unique' => true],
                'age' => ['type' => 'integer', 'unsigned' => true],
            ],
        ];

        $messages = $this->generator->generateMessages($schema);

        expect($messages)
            ->toBeArray()
            ->toHaveKey('name.required')
            ->toHaveKey('email.unique')
            ->toHaveKey('age.integer')
            ->and($messages['name.required'])->toBe('Name is required.')
            ->and($messages['email.unique'])->toBe('Email has already been taken.')
            ->and($messages['age.integer'])->toBe('Age must be an integer.');
    }

    public function test_generates_messages_with_custom_messages(): void {
        $schema = [
            'columns' => [
                'email' => [
                    'type' => 'string',
                    'unique' => true,
                    'messages' => [
                        'required' => 'Please enter your email address',
                        'email' => 'Please enter a valid email address',
                        'unique' => 'This email is already registered',
                    ],
                ],
            ],
        ];

        $messages = $this->generator->generateMessages($schema);

        expect($messages)
            ->toBeArray()
            ->toHaveCount(3)
            ->and($messages['email.required'])->toBe('Please enter your email address')
            ->and($messages['email.email'])->toBe('Please enter a valid email address')
            ->and($messages['email.unique'])->toBe('This email is already registered');
    }

    public function test_generates_type_specific_messages(): void {
        $schema = [
            'columns' => [
                'price' => [
                    'type' => 'decimal',
                    'scale' => 2,
                    'unsigned' => true,
                ],
                'status' => [
                    'type' => 'enum',
                    'values' => ['active', 'inactive'],
                ],
                'website' => [
                    'type' => 'url',
                ],
            ],
        ];

        $messages = $this->generator->generateMessages($schema);

        expect($messages)
            ->toBeArray()
            ->toHaveKey('price.numeric')
            ->toHaveKey('price.decimal')
            ->toHaveKey('status.in')
            ->toHaveKey('website.url')
            ->and($messages['price.numeric'])->toBe('Price must be a number.')
            ->and($messages['price.decimal'])->toBe('Price must have 2 decimal places.')
            ->and($messages['status.in'])->toBe('Status must be one of the following: active, inactive.')
            ->and($messages['website.url'])->toBe('Website must be a valid URL.');
    }
}
