# Basic Usage

This guide covers the basic usage of the Eloquent Model Generator.

## Command Line Interface

### Generate All Models

```bash
php artisan model:generate
```

This will generate models for all tables in your database (except excluded tables).

### Generate Specific Models

```bash
php artisan model:generate --table=users,posts,comments
```

### Generate with Custom Namespace

```bash
php artisan model:generate --namespace="App\\Domain\\Models"
```

### Generate with Custom Output Path

```bash
php artisan model:generate --output="app/Domain/Models"
```

### Preview Generated Models

```bash
php artisan model:generate --preview
```

This will show the model content without writing files.

## Common Use Cases

### Basic Model Generation

```bash
# Generate model for a single table
php artisan model:generate --table=users

# Generate models for multiple tables
php artisan model:generate --table=users,posts,comments

# Generate all models except specific tables
php artisan model:generate --exclude=migrations,password_resets
```

### Customizing Model Generation

```bash
# Generate with relationships
php artisan model:generate --with-relationships

# Generate with validation rules
php artisan model:generate --with-validation

# Generate with soft deletes
php artisan model:generate --with-soft-deletes

# Generate with all features
php artisan model:generate --with-relationships --with-validation --with-soft-deletes
```

### Output Control

```bash
# Preview models without writing files
php artisan model:generate --preview

# Generate with verbose output
php artisan model:generate -v

# Generate with debug information
php artisan model:generate --debug
```

## Programmatic Usage

### Basic Usage

```php
use SAC\EloquentModelGenerator\ModelGenerator;

public function generate(ModelGenerator $generator)
{
    // Generate a single model
    $model = $generator->generate('users');

    // Generate multiple models
    $models = $generator->generateBatch(['users', 'posts']);
}
```

### With Custom Configuration

```php
use SAC\EloquentModelGenerator\ModelGenerator;
use SAC\EloquentModelGenerator\ValueObjects\ModelDefinition;

public function generateCustom(ModelGenerator $generator)
{
    $definition = new ModelDefinition(
        className: 'User',
        namespace: 'App\\Domain\\Models',
        tableName: 'users',
        withRelationships: true,
        withValidation: true
    );

    $model = $generator->generate($definition);
}
```

## Generated Model Example

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_active' => 'boolean',
    ];

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
```

## Next Steps

- Check [Advanced Usage](./advanced-usage.md) for more complex scenarios
- Review [Configuration](./configuration.md) for customization options
- See [API Reference](./api-reference.md) for detailed method documentation
