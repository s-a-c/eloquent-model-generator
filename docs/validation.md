# Model Validation

The package provides comprehensive validation support for your generated Eloquent models. This guide covers all validation features and how to use them effectively.

## How Validation Works

The validation system works in three main steps:

1. **Rule Generation**: Based on your schema definition, the package automatically generates appropriate validation rules.
2. **Message Generation**: Clear, consistent error messages are generated following Laravel's conventions.
3. **Integration**: The rules and messages are integrated into your model using Laravel's validation system.

## Basic Validation

### Type-Based Validation

The generator automatically adds appropriate validation rules based on column types:

```php
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
            'email' => true,
        ],
        'age' => [
            'type' => 'integer',
            'unsigned' => true,
        ],
    ],
];
```

This will generate a model with these validation rules:
- `name`: `required|string|max:255`
- `email`: `string|email|unique:table_name,email`
- `age`: `integer|min:0`

### Rule Generation Process

The package follows these steps to generate rules:

1. **Type Analysis**: Determines base rules from column type
2. **Constraint Analysis**: Adds rules based on constraints (nullable, unique, etc.)
3. **Custom Rule Integration**: Merges any custom rules specified
4. **Rule Ordering**: Ensures rules are in logical order (required first, etc.)

### Validation Messages

The generator provides clear, user-friendly validation messages that follow Laravel's conventions. For example:

```php
[
    'name.required' => 'The name field is required.',
    'email.email' => 'The email field must be a valid email address.',
    'age.min' => 'The age field must be at least 0.',
]
```

Messages are automatically formatted to match Laravel's standard format:
- Field references use "The {field} field" format
- Messages end with a period
- Enum choices are listed with commas: "must be one of: value1, value2"

### Message Generation Process

Messages are generated following these principles:

1. **Consistency**: All messages follow the same format
2. **Clarity**: Messages clearly explain what's wrong
3. **Context**: Messages include necessary context (e.g., valid values for enums)
4. **Actionability**: Messages suggest how to fix the error

### Supported Data Types and Their Messages

Each data type has specific validation rules and messages:

| Type     | Rules                         | Example Message                                           | When Used        |
| -------- | ----------------------------- | --------------------------------------------------------- | ---------------- |
| string   | `string`, `max:length`        | "The name field must not be greater than 255 characters." | Text fields      |
| integer  | `integer`, optionally `min:0` | "The age field must be an integer."                       | Whole numbers    |
| decimal  | `numeric`, `decimal:scale`    | "The price field must have 2 decimal places."             | Monetary values  |
| boolean  | `boolean`                     | "The active field must be true or false."                 | True/false flags |
| date     | `date`                        | "The birth_date field must be a valid date."              | Date values      |
| datetime | `date_format:Y-m-d H:i:s`     | "The created_at field must be in the format Y-m-d H:i:s." | Timestamps       |
| enum     | `in:value1,value2`            | "The status field must be one of: active, inactive."      | Fixed options    |
| email    | `email`                       | "The email field must be a valid email address."          | Email addresses  |
| url      | `url`                         | "The website field must be a valid URL."                  | Web addresses    |
| ip       | `ip`                          | "The ip_address field must be a valid IP address."        | IP addresses     |

## Advanced Validation

### Custom Rules

Add custom validation rules using the `rules` key:

```php
'password' => [
    'type' => 'string',
    'rules' => [
        'min:8',
        'regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/',
    ],
    'messages' => [
        'min' => 'Password must be at least 8 characters.',
        'regex' => 'Password must contain at least one letter and one number.',
    ],
],
```

### Custom Messages

Define custom error messages for each validation rule:

```php
'age' => [
    'type' => 'integer',
    'rules' => 'required|integer|between:18,100',
    'messages' => [
        'required' => 'Please provide your age.',
        'integer' => 'Age must be a whole number.',
        'between' => 'Age must be between :min and :max years.',
    ],
],
```

Message placeholders are automatically replaced:
- `:attribute` - Field name
- `:min`, `:max` - For size rules
- `:size` - For exact size rules
- `:values` - For 'in' rules
- `:other` - For 'same' rules

### Enum Validation

For enum fields, the generator creates both validation rules and clear error messages:

```php
'status' => [
    'type' => 'enum',
    'values' => ['active', 'inactive', 'pending'],
    'nullable' => false,
],
```

This generates:
- Rule: `required|in:active,inactive,pending`
- Message: "The status field must be one of: active, inactive, pending."

### Testing Validation Rules

The package provides traits for comprehensive validation testing:

```php
use SAC\EloquentModelGenerator\Tests\Support\Traits\AssertModelValidation;

class YourTest extends TestCase
{
    use AssertModelValidation;

    public function test_validation()
    {
        // Test validation rules exist
        $this->assertHasValidationRule($model, 'email', 'required|email');

        // Test validation passes
        $this->assertValidationPasses($model, [
            'email' => 'test@example.com',
        ]);

        // Test validation fails with custom message
        $this->assertValidationFails($model, [
            'email' => 'not-an-email',
        ], ['The email field must be a valid email address.']);

        // Test specific rule enforcement
        $this->assertValidationRuleEnforced(
            $model,
            'status',
            'active',
            'invalid-status',
            'The status field must be one of: active, inactive.'
        );
    }
}
```

## Best Practices

1. **Type Consistency**: Always specify the correct column type to get appropriate validation rules.

2. **Custom Messages**: Provide clear, user-friendly error messages that:
   - Start with "The {field} field"
   - End with a period
   - Use consistent formatting for lists and options
   - Include helpful context for fixing the error

3. **Testing**: Write comprehensive tests that verify both:
   - Rules are correctly generated
   - Error messages match the expected format

4. **Documentation**: Document any custom validation rules in your model's PHPDoc.

## Common Patterns

### Required Fields
```php
'field' => [
    'type' => 'string',
    'nullable' => false,
],
```

### Optional Fields
```php
'field' => [
    'type' => 'string',
    'nullable' => true,
],
```

### Unique Fields
```php
'field' => [
    'type' => 'string',
    'unique' => true,
],
```

### Complex Password Rules
```php
'password' => [
    'type' => 'string',
    'rules' => [
        'required',
        'min:8',
        'regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/',
    ],
    'messages' => [
        'regex' => 'Password must contain at least one letter, one number, and one special character.',
    ],
],
```

## Extending Validation

You can extend the validation functionality by:

1. Adding custom validation rules in your service provider
2. Extending the `ValidationRuleGenerator` class
3. Using Laravel's custom validation rule objects

For more information, see the [Laravel Validation documentation](https://laravel.com/docs/validation).

## Error Handling and Troubleshooting

### Common Validation Issues

1. **Missing Required Fields**
   ```php
   // Problem
   'email' => [
       'type' => 'string',
       'email' => true,
   ]

   // Solution: Add nullable flag
   'email' => [
       'type' => 'string',
       'email' => true,
       'nullable' => false,
   ]
   ```

2. **Incorrect Message Format**
   ```php
   // Problem
   'messages' => [
       'required' => 'Email is needed',  // Wrong format
   ]

   // Solution: Follow Laravel convention
   'messages' => [
       'required' => 'The email field is required.',  // Correct format
   ]
   ```

3. **Enum Value Mismatch**
   ```php
   // Problem
   'status' => [
       'type' => 'enum',
       'values' => ['active', 'inactive'],
       'default' => 'pending',  // Value not in enum list
   ]

   // Solution: Ensure default value is in enum list
   'status' => [
       'type' => 'enum',
       'values' => ['active', 'inactive', 'pending'],
       'default' => 'pending',
   ]
   ```

### Debugging Validation

1. **Check Generated Rules**
   ```php
   $model = $generator->generate($definition, $schema);
   dd($model->getValidationRules());  // View all rules
   ```

2. **Test Validation Messages**
   ```php
   $validator = Validator::make($data, $model->getValidationRules());
   if ($validator->fails()) {
       dd($validator->errors()->all());  // View all error messages
   }
   ```

3. **Verify Rule Generation**
   ```php
   // Use the AssertModelValidation trait
   $this->assertModelHasValidationRules($model, [
       'email' => 'required|email',  // Expected rules
   ]);
   ```

### Integration with Laravel's Validation

1. **Using in Controllers**
   ```php
   public function store(Request $request)
   {
       $model = new YourModel();
       $validator = Validator::make(
           $request->all(),
           $model->getValidationRules(),
           $model->getValidationMessages()
       );

       if ($validator->fails()) {
           return redirect()->back()
               ->withErrors($validator)
               ->withInput();
       }
   }
   ```

2. **Using in Form Requests**
   ```php
   class StoreUserRequest extends FormRequest
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

3. **Custom Validation Logic**
   ```php
   public function withCustomRules(array $data)
   {
       $rules = $this->getValidationRules();

       // Add or modify rules
       $rules['password'] = [
           $rules['password'],
           function ($attribute, $value, $fail) {
               if (common_passwords_contains($value)) {
                   $fail('The password is too common.');
               }
           },
       ];

       return Validator::make($data, $rules, $this->getValidationMessages());
   }
   ```

### Best Practices for Error Handling

1. **Graceful Degradation**
   - Always provide default values where appropriate
   - Handle missing validation rules gracefully
   - Provide clear error messages for developers

2. **Consistent Error Format**
   - Follow Laravel's message format
   - Use proper punctuation and capitalization
   - Include helpful context in messages

3. **Testing Error Cases**
   - Test both valid and invalid data
   - Test edge cases and boundary values
   - Verify error message format

4. **Documentation**
   - Document custom validation rules
   - Explain any special validation requirements
   - Provide examples of valid/invalid values
