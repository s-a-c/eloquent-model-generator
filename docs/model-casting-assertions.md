# Model Casting Assertions

The package provides a comprehensive set of assertion methods for testing model attribute casting through the `AssertModelCasting` trait. This feature makes it easy to verify that your Eloquent models have the correct attribute cast types.

## Installation

The feature is included in the package by default. No additional installation steps are required.

## Basic Usage

To use the model casting assertions in your tests:

1. Use the `AssertModelCasting` trait in your test class:

```php
use SAC\EloquentModelGenerator\Tests\Support\Traits\AssertModelCasting;

class YourModelTest extends TestCase
{
    use AssertModelCasting;
}
```

2. Write assertions for your model's casts:

```php
public function test_model_has_correct_casts(): void
{
    // Test a single cast
    $this->assertHasCast(User::class, 'email', 'string');

    // Test multiple casts at once
    $this->assertHasCasts(User::class, [
        'is_active' => 'boolean',
        'points' => 'integer',
        'settings' => 'array'
    ]);
}
```

## Available Assertion Methods

### `assertHasCast()`

Verifies that a model attribute has a specific cast type.

```php
$this->assertHasCast($model, 'attribute', 'cast_type', 'optional message');
```

### `assertHasCasts()`

Verifies multiple casts at once.

```php
$this->assertHasCasts($model, [
    'is_active' => 'boolean',
    'points' => 'integer',
    'settings' => 'array'
]);
```

### `assertHasDateCast()`

Specifically for date/datetime casting verification.

```php
// Generic date cast
$this->assertHasDateCast($model, 'created_at');

// Specific format
$this->assertHasDateCast($model, 'birth_date', 'date:Y-m-d');
```

Supports:
- `date`
- `datetime`
- `timestamp`
- `immutable_date`
- `immutable_datetime`

### `assertHasJsonCast()`

Verifies JSON-related casts.

```php
// Basic JSON casts
$this->assertHasJsonCast($model, 'settings');

// With specific class
$this->assertHasJsonCast($model, 'data', AsCollection::class);
```

Supports:
- `array`
- `json`
- `object`
- `collection`
- Custom classes (`AsArrayObject`, `AsCollection`)

### `assertHasEncryptedCast()`

Verifies encrypted attribute casts.

```php
// Basic encryption
$this->assertHasEncryptedCast($model, 'api_token');

// Encrypted with specific type
$this->assertHasEncryptedCast($model, 'settings', AsEncryptedCollection::class);
```

Supports:
- `encrypted`
- `encrypted:array`
- `encrypted:collection`
- `encrypted:object`
- Custom encrypted classes

### `assertHasCustomCast()`

Verifies custom cast class implementations.

```php
$this->assertHasCustomCast($model, 'status', UserStatus::class);
```

## Error Handling

The trait includes comprehensive error handling for common scenarios:

```php
// Non-existent model
$this->assertHasCast('NonExistentModel', 'foo', 'string');
// Throws: "Model class NonExistentModel does not exist"

// Invalid model
$this->assertHasCast($notAModel, 'foo', 'string');
// Throws: "Invalid model provided"

// Missing cast
$this->assertHasCast($model, 'non_existent', 'string');
// Throws exception for missing cast

// Mismatched cast type
$this->assertHasCast($model, 'foo', 'integer');
// Throws exception for type mismatch
```

## Best Practices

1. **Group Related Assertions**
   ```php
   public function test_user_model_casts(): void
   {
       // Basic types
       $this->assertHasCasts(User::class, [
           'is_active' => 'boolean',
           'login_count' => 'integer'
       ]);

       // Dates
       $this->assertHasDateCast(User::class, 'created_at');
       $this->assertHasDateCast(User::class, 'updated_at');

       // JSON data
       $this->assertHasJsonCast(User::class, 'settings');
       $this->assertHasJsonCast(User::class, 'preferences');

       // Encrypted data
       $this->assertHasEncryptedCast(User::class, 'api_token');
   }
   ```

2. **Use Specific Assertions**
   - Use `assertHasDateCast()` for dates instead of `assertHasCast()`
   - Use `assertHasJsonCast()` for JSON/array data
   - Use `assertHasEncryptedCast()` for encrypted attributes

3. **Test Edge Cases**
   ```php
   public function test_handles_custom_formats(): void
   {
       // Custom date format
       $this->assertHasDateCast($model, 'date_field', 'datetime:Y-m-d');

       // Custom JSON structure
       $this->assertHasJsonCast($model, 'json_field', AsArrayObject::class);

       // Custom encryption
       $this->assertHasEncryptedCast($model, 'secret', AsEncryptedCollection::class);
   }
   ```

## Integration with Model Generation

The casting assertions work seamlessly with generated models:

```php
public function test_generated_model_has_correct_casts(): void
{
    // Generate model from schema
    $model = $this->generator->fromSchema([
        'table' => 'users',
        'casts' => [
            'settings' => 'json',
            'is_active' => 'boolean',
            'last_login' => 'datetime'
        ]
    ]);

    // Verify casts
    $this->assertHasJsonCast($model, 'settings');
    $this->assertHasCast($model, 'is_active', 'boolean');
    $this->assertHasDateCast($model, 'last_login');
}
```

## Performance Considerations

- Assertions are performed on the model class definition, not instances
- No database interaction required
- Efficient for testing multiple casts
- Can be used in parallel testing
