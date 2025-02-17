# Quick Start Guide

This guide will help you quickly get started with the Eloquent Model Generator.

## Basic Usage

### 1. Generate a Single Model

```bash
php artisan model:generate User
```

This will:
- Analyze the `users` table
- Generate a model with proper type hints
- Add relationships
- Include validation rules

### 2. Generate Multiple Models

```bash
php artisan model:generate --all
```

This generates models for all tables in your database.

## Example Output

For a typical users and sessions schema:

```sql
CREATE TABLE users (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    remember_token VARCHAR(100),
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);

CREATE TABLE sessions (
    id VARCHAR(255) PRIMARY KEY,
    user_id BIGINT UNSIGNED,
    ip_address VARCHAR(45),
    user_agent TEXT,
    payload TEXT NOT NULL,
    last_activity INTEGER NOT NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
        ON DELETE CASCADE
);
```

The generator creates:

```php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Session[] $sessions
 */
class User extends Model
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'remember_token',
    ];

    protected $casts = [
        'id' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public static function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|max:255',
            'remember_token' => 'nullable|string|max:100',
        ];
    }

    public function sessions(): HasMany
    {
        return $this->hasMany(Session::class);
    }
}

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property string $id
 * @property int|null $user_id
 * @property string|null $ip_address
 * @property string|null $user_agent
 * @property string $payload
 * @property int $last_activity
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Models\User|null $user
 */
class Session extends Model
{
    protected $fillable = [
        'user_id',
        'ip_address',
        'user_agent',
        'payload',
        'last_activity',
    ];

    protected $casts = [
        'user_id' => 'integer',
        'last_activity' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public static function rules(): array
    {
        return [
            'user_id' => 'nullable|integer|exists:users,id',
            'ip_address' => 'nullable|string|max:45|ip',
            'user_agent' => 'nullable|string',
            'payload' => 'required|string',
            'last_activity' => 'required|integer',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
```

## Common Options

### Custom Path

```bash
php artisan model:generate User --path=app/Models/Auth
```

### Custom Namespace

```bash
php artisan model:generate User --namespace="App\Models\Auth"
```

### Base Class

```bash
php artisan model:generate User --extends="App\Models\BaseModel"
```

### Database Connection

```bash
php artisan model:generate User --connection=mysql
```

## Working with Relationships

The generator automatically detects relationships:

```php
// For a posts table with user_id foreign key
class Post extends Model
{
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

// In the User model
class User extends Model
{
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
```

## Validation Rules

Access generated validation rules:

```php
$rules = User::rules();

// Use with form requests
class StoreUserRequest extends FormRequest
{
    public function rules(): array
    {
        return User::rules();
    }
}
```

## Next Steps

1. Configure [Database Connections](../databases/index.md)
2. Customize [Type Mappings](../reference/type-mappings.md)
3. Add [Custom Types](../advanced/custom-types.md)
4. Set up [Event Listeners](../architecture/event-architecture.md)

## Tips & Tricks

### 1. Dry Run

Preview changes without writing files:

```bash
php artisan model:generate User --dry-run
```

### 2. Force Overwrite

Replace existing models:

```bash
php artisan model:generate User --force
```

### 3. Skip Relationships

Generate without relationships:

```bash
php artisan model:generate User --no-relations
```

### 4. Skip Validation

Generate without validation rules:

```bash
php artisan model:generate User --no-validation
```

## Common Issues

1. **Table Not Found**
   - Check database connection
   - Verify table exists
   - Check table name pluralization

2. **Relationship Detection**
   - Ensure foreign keys are properly defined
   - Check naming conventions
   - Verify database indexes

3. **Type Inference**
   - Review column definitions
   - Check custom type mappings
   - Verify database driver support

## Getting Help

- Read the [Documentation](../index.md)
- Check [FAQs](../reference/faq.md)
- [Open an Issue](https://github.com/SAC/eloquent-model-generator/issues)
