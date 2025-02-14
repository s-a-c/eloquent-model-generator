# Model Analysis

Analyze and validate generated Eloquent models.

## Usage

```bash
# Analyze all models
php artisan model:analyze

# Analyze specific models
php artisan model:analyze --model=User,Post
```

## Features

### Static Analysis
- Type checking
- Method validation
- Property verification
- Relation analysis

### Type Safety
```php
// Before analysis
public function posts()
{
    return $this->hasMany(Post::class);
}

// After analysis
public function posts(): HasMany
{
    return $this->hasMany(Post::class);
}
```

### Code Quality
- PSR-12 compliance
- Laravel best practices
- Clean code principles
- Documentation standards

### Metrics
```bash
# View metrics
php artisan model:metrics

# Generate report
php artisan model:metrics --report
```

## Tools

See [Analysis Tools](../tools/analysis-tools.md) for details.
