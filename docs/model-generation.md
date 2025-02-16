# Model Generation Guide

This guide covers the model generation features in the Eloquent Model Generator package, including custom attributes, relationships, factories, and policies.

## Table of Contents

1. [Custom Attributes](#custom-attributes)
2. [Relationships](#relationships)
3. [Factories](#factories)
4. [Policies](#policies)
5. [Resources](#resources)
6. [Best Practices](#best-practices)

## Custom Attributes

### Accessor Generation

Generate custom accessors for your model attributes:

```php
use SAC\EloquentModelGenerator\Services\Attributes\AttributeGenerator;

$generator = new AttributeGenerator();
$attributes = $generator->generate($columns);
```

### Available Features

- Automatic accessor generation
- Custom mutator creation
- Type casting
- Property documentation

Example output:

```php
[
    'accessors' => [
        'public function getFullNameAttribute(): string
        {
            return "{$this->first_name} {$this->last_name}";
        }',
    ],
    'mutators' => [
        'public function setEmailAttribute(string $value): void
        {
            $this->attributes[\'email\'] = strtolower($value);
        }',
    ],
    'casts' => [
        'settings' => 'array',
        'is_active' => 'boolean',
    ],
]
```

## Relationships

### Relationship Generation

Generate model relationships based on database schema:

```php
use SAC\EloquentModelGenerator\Services\Relationships\SQLiteRelationshipDetector;

$detector = new SQLiteRelationshipDetector(DB::connection());
$relationships = $detector->detect('users');
```

### Supported Types

- One-to-One relationships
- One-to-Many relationships
- Many-to-Many relationships
- Polymorphic relationships
- Self-referential relationships

Example implementation:

```php
class User extends Model
{
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
```

## Factories

### Factory Generation

Generate model factories with state definitions:

```php
use SAC\EloquentModelGenerator\Services\Factories\FactoryGenerator;

$generator = new FactoryGenerator();
$factory = $generator->generate('App\\Models\\User', $columns, $relationships);
```

### Features

- State definitions
- Relationship handling
- Faker integration
- Custom definitions

Example output:

```php
class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
        ];
    }

    public function active(): static
    {
        return $this->state(['is_active' => true]);
    }
}
```

## Policies

### Policy Generation

Generate model policies with authorization rules:

```php
use SAC\EloquentModelGenerator\Services\Policies\PolicyGenerator;

$generator = new PolicyGenerator();
$policy = $generator->generate('App\\Models\\Post', $abilities, $rules);
```

### Features

- CRUD policy methods
- Custom authorization rules
- Role-based permissions
- Policy documentation

Example output:

```php
class PostPolicy
{
    public function view(User $user, Post $post): bool
    {
        return true;
    }

    public function update(User $user, Post $post): bool
    {
        return $user->id === $post->user_id;
    }
}
```

## Resources

### Resource Generation

Generate API resources with conditional fields:

```php
use SAC\EloquentModelGenerator\Services\Resources\ResourceGenerator;

$generator = new ResourceGenerator();
$resource = $generator->generate('App\\Models\\Post', $columns, $relationships, $conditionalFields);
```

### Features

- Basic resource mapping
- Relationship inclusion
- Conditional fields
- Resource collections

Example output:

```php
class PostResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'user' => UserResource::make($this->whenLoaded('user')),
            'secret' => $this->when($request->user()->isAdmin(), $this->secret),
        ];
    }
}
```

## Best Practices

### Code Organization

1. **Model Structure**
   - Keep models clean and focused
   - Use traits for shared functionality
   - Follow Laravel conventions

2. **Relationship Naming**
   - Use clear, descriptive names
   - Follow Laravel conventions
   - Document complex relationships

3. **Factory States**
   - Create meaningful states
   - Keep states focused
   - Use realistic test data

### Performance

1. **Relationship Loading**
   - Use eager loading when needed
   - Avoid N+1 queries
   - Cache heavy queries

2. **Resource Optimization**
   - Load only needed relationships
   - Use conditional loading
   - Consider pagination

### Security

1. **Policy Implementation**
   - Define clear authorization rules
   - Use role-based permissions
   - Test security measures

2. **Data Access**
   - Validate input data
   - Use proper scopes
   - Implement soft deletes

### Testing

1. **Factory Usage**
   - Create comprehensive tests
   - Use states effectively
   - Test edge cases

2. **Policy Testing**
   - Test all permissions
   - Cover edge cases
   - Test role combinations

## Examples

### Complete Model Generation

```php
// Generate model attributes
$attributes = $attributeGenerator->generate($columns);

// Generate factory
$factory = $factoryGenerator->generate($modelClass, $columns, $relationships);

// Generate policy
$policy = $policyGenerator->generate($modelClass, $abilities, $rules);

// Generate resource
$resource = $resourceGenerator->generate($modelClass, $columns, $relationships, $conditionalFields);
```

### Custom Implementation

```php
// Custom attribute generation
$attributes = $attributeGenerator->generate([
    new Column('full_name', 'string'),
    new Column('email', 'string', unique: true),
    new Column('settings', 'json', nullable: true),
]);

// Custom factory states
$factory = $factoryGenerator->generate('App\\Models\\User', $columns, [
    'states' => [
        'admin' => ['role' => 'admin'],
        'premium' => ['subscription_type' => 'premium'],
    ],
]);

// Custom policy rules
$policy = $policyGenerator->generate('App\\Models\\Post', [
    'publish' => ['$user->hasRole("editor")'],
    'feature' => ['$user->isAdmin()'],
]);
```

## Contributing

Found a bug or want to contribute? Please check our [CONTRIBUTING.md](../CONTRIBUTING.md) guide.
