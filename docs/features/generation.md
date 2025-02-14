# Model Generation

Generate Eloquent models from your database schema.

## Basic Usage

```bash
# Generate all models
php artisan model:generate

# Generate specific models
php artisan model:generate --table=users,posts
```

## Features

### Schema Analysis
- Automatic table detection
- Column type inference
- Index analysis
- Foreign key detection

### Type Inference
```php
// From database column
`users.created_at` TIMESTAMP NULL
// Generated property
protected $casts = [
    'created_at' => 'datetime',
];
```

### Relation Detection
```php
// From foreign key
`posts.user_id` -> `users.id`
// Generated relation
public function user(): BelongsTo
{
    return $this->belongsTo(User::class);
}
```

### Custom Attributes
```php
// Define virtual attributes
protected $appends = [
    'full_name',
];

// Generate accessor
public function getFullNameAttribute(): string
{
    return "{$this->first_name} {$this->last_name}";
}
```

## Configuration

See [Basic Configuration](../config/basic.md) for setup options.
