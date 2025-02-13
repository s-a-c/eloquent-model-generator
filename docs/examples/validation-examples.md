# Validation Examples

This guide provides practical examples of common validation scenarios with explanations of how they work.

## Basic Examples

### User Model Example

```php
$schema = [
    'columns' => [
        'username' => [
            'type' => 'string',
            'length' => 50,
            'nullable' => false,
            'unique' => true,
            'rules' => 'alpha_dash',
            'messages' => [
                'required' => 'The username field is required.',
                'unique' => 'This username is already taken.',
                'alpha_dash' => 'The username field may only contain letters, numbers, dashes and underscores.',
            ],
        ],
        'email' => [
            'type' => 'string',
            'unique' => true,
            'email' => true,
            'messages' => [
                'email' => 'The email field must be a valid email address.',
                'unique' => 'This email is already registered.',
            ],
        ],
        'password' => [
            'type' => 'string',
            'rules' => [
                'min:8',
                'regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/',
            ],
            'messages' => [
                'min' => 'The password field must be at least 8 characters.',
                'regex' => 'The password field must include at least one letter, one number, and one special character.',
            ],
        ],
        'age' => [
            'type' => 'integer',
            'unsigned' => true,
            'rules' => 'between:18,100',
            'messages' => [
                'between' => 'The age field must be between :min and :max years.',
            ],
        ],
    ],
];
```

This example demonstrates:
- Username validation with alphanumeric and special character restrictions
- Email validation with uniqueness check
- Password complexity requirements
- Age validation with range checking

### Product Model Example

```php
$schema = [
    'columns' => [
        'name' => [
            'type' => 'string',
            'length' => 100,
            'nullable' => false,
            'messages' => [
                'required' => 'The product name field is required.',
                'max' => 'The product name field cannot exceed :max characters.',
            ],
        ],
        'sku' => [
            'type' => 'string',
            'unique' => true,
            'rules' => 'regex:/^[A-Z]{2}-\d{5}$/',
            'messages' => [
                'unique' => 'This SKU is already in use.',
                'regex' => 'The SKU field must be in format: XX-12345.',
            ],
        ],
        'price' => [
            'type' => 'decimal',
            'precision' => 8,
            'scale' => 2,
            'unsigned' => true,
            'rules' => 'min:0.01',
            'messages' => [
                'min' => 'The price field must be at least :min.',
            ],
        ],
        'status' => [
            'type' => 'enum',
            'values' => ['draft', 'published', 'archived'],
            'nullable' => false,
        ],
    ],
];
```

This example shows:
- Required product name with length limit
- SKU format validation with pattern matching
- Price validation with decimal precision
- Status validation using predefined enum values

## Testing Examples

Here's how to test these validation rules:

```php
use SAC\EloquentModelGenerator\Tests\Support\Traits\AssertModelValidation;

test('validates user registration', function () {
    $model = $this->generator->generate($definition, $schema);

    // Test valid data
    $this->assertValidationPasses($model, [
        'username' => 'john_doe',
        'email' => 'john@example.com',
        'password' => 'SecurePass123!',
        'age' => 25,
    ]);

    // Test invalid username format
    $this->assertValidationFails($model, [
        'username' => 'john@doe',
        'email' => 'john@example.com',
        'password' => 'SecurePass123!',
        'age' => 25,
    ], ['The username field may only contain letters, numbers, dashes and underscores.']);

    // Test invalid password format
    $this->assertValidationFails($model, [
        'username' => 'john_doe',
        'email' => 'john@example.com',
        'password' => 'weak',
        'age' => 25,
    ], ['The password field must be at least 8 characters.']);

    // Test invalid age
    $this->assertValidationFails($model, [
        'username' => 'john_doe',
        'email' => 'john@example.com',
        'password' => 'SecurePass123!',
        'age' => 15,
    ], ['The age field must be between 18 and 100 years.']);
});

test('validates product creation', function () {
    $model = $this->generator->generate($definition, $schema);

    // Test valid data
    $this->assertValidationPasses($model, [
        'name' => 'Premium Widget',
        'sku' => 'WD-12345',
        'price' => 99.99,
        'status' => 'published',
    ]);

    // Test invalid SKU format
    $this->assertValidationFails($model, [
        'name' => 'Premium Widget',
        'sku' => '12345',
        'price' => 99.99,
        'status' => 'published',
    ], ['The SKU field must be in format: XX-12345.']);

    // Test invalid status
    $this->assertValidationFails($model, [
        'name' => 'Premium Widget',
        'sku' => 'WD-12345',
        'price' => 99.99,
        'status' => 'invalid',
    ], ['The status field must be one of: draft, published, archived.']);
});
```

## Advanced Examples

### Form Request Validation

You can use the generated validation rules in Form Request classes:

```php
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class UserRegistrationRequest extends FormRequest
{
    public function rules(): array
    {
        $model = new User();
        return $model->getValidationRules();
    }

    public function messages(): array
    {
        $model = new User();
        return $model->getValidationMessages();
    }
}
```

### Dynamic Validation Rules

You can modify validation rules at runtime:

```php
$schema = [
    'columns' => [
        'email' => [
            'type' => 'string',
            'unique' => true,
            'rules' => ['email', 'unique:users,email,{id}'],
            'messages' => [
                'unique' => 'This email is already registered by another user.',
            ],
        ],
    ],
];

// In your controller
$rules = $model->getValidationRules();
$rules['email'] = str_replace('{id}', $user->id, $rules['email']);
$validator = Validator::make($request->all(), $rules, $model->getValidationMessages());
```

### Conditional Validation

Example of conditional validation rules:

```php
$schema = [
    'columns' => [
        'phone' => [
            'type' => 'string',
            'rules' => [
                'required_unless:email,null',
                'regex:/^\+?[1-9]\d{1,14}$/',
            ],
            'messages' => [
                'required_unless' => 'The phone field is required when email is not provided.',
                'regex' => 'The phone field must be a valid phone number.',
            ],
        ],
        'company' => [
            'type' => 'string',
            'rules' => 'required_if:account_type,business',
            'messages' => [
                'required_if' => 'The company field is required for business accounts.',
            ],
        ],
    ],
];
```

### Array Validation

Example of validating array/JSON fields:

```php
$schema = [
    'columns' => [
        'settings' => [
            'type' => 'json',
            'rules' => [
                'required',
                'array',
                'min:1',
            ],
            'messages' => [
                'array' => 'The settings field must be a valid JSON array.',
                'min' => 'At least one setting is required.',
            ],
        ],
        'permissions' => [
            'type' => 'json',
            'rules' => [
                'array',
                'max:5',
            ],
            'messages' => [
                'array' => 'The permissions field must be a list.',
                'max' => 'Maximum of :max permissions allowed.',
            ],
        ],
    ],
];
```

These examples demonstrate:
1. Basic validation rules and messages
2. Custom validation messages following Laravel conventions
3. Complex validation scenarios
4. Testing validation rules effectively
5. Integration with Laravel's validation system

For more examples and advanced usage, see the [Validation Documentation](../validation.md).
