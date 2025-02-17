# Features

This section details the core features and capabilities of the Eloquent Model Generator.

## Core Features

### [Model Generation](./model-generation.md)
Learn about the model generation process.
- Schema analysis
- Code generation
- File output
- Customization options

### [Type System](./type-system.md)
Understand how types are handled and mapped.
- Database type mapping
- PHP type inference
- Custom types
- Type safety

### [Relationships](./relationships.md)
Explore relationship detection and generation.
- Foreign key analysis
- Relationship types
- Polymorphic relationships
- Custom relationships

## Feature Matrix

| Feature | Basic | Advanced | Enterprise |
|---------|-------|-----------|------------|
| Model Generation | ✓ | ✓ | ✓ |
| Type Inference | ✓ | ✓ | ✓ |
| Basic Relationships | ✓ | ✓ | ✓ |
| Advanced Relationships | - | ✓ | ✓ |
| Custom Types | - | ✓ | ✓ |
| Event System | - | ✓ | ✓ |
| Queue Support | - | - | ✓ |
| Custom Templates | - | - | ✓ |

## Common Use Cases

1. Basic Model Generation
```bash
# Generate from existing table
php artisan model:generate User

# Generate with relationships
php artisan model:generate Post --with-relationships
```

2. Type Safety
```php
// Generated with proper type hints
class User extends Model
{
    protected $casts = [
        'id' => 'integer',
        'active' => 'boolean',
        'settings' => 'array',
    ];
}
```

3. Relationship Mapping
```php
// Automatically detected relationships
class Post extends Model
{
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
```

## Integration Points

- Laravel Migrations
- Database Schema
- Static Analysis Tools
- IDE Support
- Testing Framework

## Best Practices

1. Database Design
   - Use consistent naming
   - Define proper constraints
   - Set appropriate types
   - Document relationships

2. Code Generation
   - Review generated code
   - Customize as needed
   - Version control changes
   - Update tests

3. Type Safety
   - Use strict types
   - Define custom casts
   - Document properties
   - Validate input

## Next Steps

- Explore [Advanced Features](../advanced/index.md)
- Read about [Architecture](../architecture/index.md)
- Check [Development Guide](../development/index.md)
