<?php

use SAC\EloquentModelGenerator\Tests\Support\Traits\WithSQLiteTesting;
use SAC\EloquentModelGenerator\ValueObjects\ModelDefinition;

uses(WithSQLiteTesting::class);

dataset('validation_rules', [
    'string rules' => [
        'column' => [
            'type' => 'string',
            'length' => 255,
            'nullable' => false,
        ],
        'expected_rules' => 'required|string|max:255',
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
    ],
    'enum rules' => [
        'column' => [
            'type' => 'enum',
            'values' => ['active', 'inactive', 'pending'],
            'nullable' => false,
        ],
        'expected_rules' => 'required|in:active,inactive,pending',
    ],
]);

test('generates correct validation rules', function (array $column, string $expected_rules) {
    $schema = [
        'columns' => [
            'id' => ['type' => 'integer', 'autoIncrement' => true],
            'test_column' => $column,
        ],
        'indexes' => [
            'primary' => ['type' => 'primary', 'columns' => ['id']],
        ],
    ];

    $definition = new ModelDefinition(
        className: 'TestModel',
        namespace: 'App\\Models',
        tableName: 'test_table',
        baseClass: 'Illuminate\\Database\\Eloquent\\Model',
        withValidation: true
    );

    $generator = createModelGenerator();
    $model = $generator->generate($definition, $schema);
    $content = $model->getContent();

    // Verify class structure and traits
    expect($content)
        ->toContain('namespace App\\Models')
        ->toContain('use Illuminate\\Database\\Eloquent\\Model')
        ->toContain('use Illuminate\\Support\\Facades\\Validator')
        ->toMatch('/class\s+TestModel\s+extends\s+Model/');

    // Verify validation method exists with proper structure
    expect($content)
        ->toMatch('/public\s+static\s+function\s+rules\(\)/')
        ->toContain('return [')
        ->toContain('];')
        ->not->toContain('return [];'); // Not empty rules

    // Verify rule definition format
    expect($content)
        ->toMatch('/\'test_column\'\s*=>\s*\'' . preg_quote($expected_rules, '/') . '\'/')
        ->not->toContain('|]')    // No trailing pipe
        ->not->toContain('||')    // No double pipes
        ->not->toContain('|,');   // No pipe before comma

    // Verify each individual rule is present and properly formatted
    $rules = explode('|', $expected_rules);
    foreach ($rules as $rule) {
        expect($content)->toContain($rule);

        // Check rule format based on type
        if (str_contains($rule, ':')) {
            [$ruleName, $params] = explode(':', $rule, 2);
            expect($content)
                ->toContain("'$ruleName:")  // Rule name exists
                ->toContain("$params'")     // Parameters exist
                ->not->toContain("$ruleName:'"); // No space after colon
        }
    }

    // Verify no duplicate rules
    $ruleMatches = [];
    preg_match_all('/\'test_column\'\s*=>\s*\'[^\']+\'/', $content, $ruleMatches);
    expect(count($ruleMatches[0]))->toBe(1); // Only one rule definition

    // Verify rule dependencies
    if (str_contains($expected_rules, 'unique:')) {
        expect($content)->toContain('use Illuminate\\Validation\\Rule');
    }
    if (str_contains($expected_rules, 'exists:')) {
        expect($content)->toContain('use Illuminate\\Validation\\Rule');
    }
})->with('validation_rules');

test('generates custom validation messages', function () {
    $schema = [
        'columns' => [
            'id' => ['type' => 'integer', 'autoIncrement' => true],
            'email' => [
                'type' => 'string',
                'unique' => true,
                'email' => true,
                'messages' => [
                    'email' => 'Please enter a valid email address',
                    'unique' => 'This email is already taken',
                ],
            ],
        ],
    ];

    $definition = new ModelDefinition(
        className: 'TestModel',
        namespace: 'App\\Models',
        tableName: 'test_table',
        baseClass: 'Illuminate\\Database\\Eloquent\\Model',
        withValidation: true
    );

    $generator = createModelGenerator();
    $model = $generator->generate($definition, $schema);
    $content = $model->getContent();

    // Verify messages method exists with proper structure
    expect($content)
        ->toMatch('/public\s+static\s+function\s+messages\(\)/')
        ->toContain('return [')
        ->toContain('];')
        ->not->toContain('return [];');

    // Verify message definitions
    expect($content)
        ->toMatch('/\'email\.email\'\s*=>\s*\'Please enter a valid email address\'/')
        ->toMatch('/\'email\.unique\'\s*=>\s*\'This email is already taken\'/');

    // Verify message format
    expect($content)
        ->not->toContain('...')   // No ellipsis in messages
        ->not->toContain('[]')    // No empty arrays
        ->not->toContain('""')    // No empty strings
        ->not->toContain("''");   // No empty strings

    // Verify message structure
    $messageMatches = [];
    preg_match_all('/\'[^\']+\'\s*=>\s*\'[^\']+\'/', $content, $messageMatches);
    foreach ($messageMatches[0] as $message) {
        expect($message)
            ->toMatch('/\'[a-z0-9_]+\.[a-z0-9_]+\'\s*=>\s*\'[^\']+\'/')  // Proper format
            ->not->toContain('->');  // No arrow syntax in messages
    }

    // Verify no duplicate messages
    $uniqueMessages = array_unique($messageMatches[0]);
    expect($messageMatches[0])->toBe($uniqueMessages);
});

test('handles conditional validation rules', function () {
    $schema = [
        'columns' => [
            'id' => ['type' => 'integer', 'autoIncrement' => true],
            'password' => [
                'type' => 'string',
                'rules' => 'required_if:is_active,true|min:8',
            ],
            'phone' => [
                'type' => 'string',
                'rules' => 'required_unless:email,null',
            ],
        ],
    ];

    $definition = new ModelDefinition(
        className: 'TestModel',
        namespace: 'App\\Models',
        tableName: 'test_table',
        baseClass: 'Illuminate\\Database\\Eloquent\\Model',
        withValidation: true
    );

    $generator = createModelGenerator();
    $model = $generator->generate($definition, $schema);
    $content = $model->getContent();

    // Verify conditional rules structure
    expect($content)
        ->toMatch('/\'password\'\s*=>\s*\'required_if:is_active,true\|min:8\'/')
        ->toMatch('/\'phone\'\s*=>\s*\'required_unless:email,null\'/');

    // Verify rule dependencies and references
    expect($content)
        ->toContain('is_active')  // Referenced field exists
        ->toContain('email')      // Referenced field exists
        ->toContain('min:8');     // Parameter exists

    // Verify rule format and structure
    expect($content)
        ->not->toContain(',,')     // No empty parameters
        ->not->toContain('||')     // No double pipes
        ->not->toContain(':,')     // No empty conditions
        ->not->toContain('if:,')   // No empty condition values
        ->not->toContain('unless:,'); // No empty condition values

    // Verify proper rule ordering
    $ruleMatches = [];
    preg_match_all('/\'(password|phone)\'\s*=>\s*\'[^\']+\'/', $content, $ruleMatches);
    expect(count($ruleMatches[0]))->toBe(2); // Two rule definitions

    // Verify each conditional rule
    foreach ($ruleMatches[0] as $rule) {
        if (str_contains($rule, 'required_if')) {
            expect($rule)
                ->toContain('required_if:')
                ->toContain(',true')
                ->not->toContain('required_if:,');
        }
        if (str_contains($rule, 'required_unless')) {
            expect($rule)
                ->toContain('required_unless:')
                ->toContain(',null')
                ->not->toContain('required_unless:,');
        }
    }

    // Verify proper import of validation components
    expect($content)
        ->toContain('use Illuminate\\Validation\\Rule')
        ->toContain('use Illuminate\\Support\\Facades\\Validator');
});
