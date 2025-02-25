# Getting Started

## 2.1. System Requirements

Before installing the SAC Eloquent Model Generator, ensure your system meets the following requirements:

- PHP >= 8.2
- Laravel >= 10.0
- SQLite >= 3.8.8
- Composer >= 2.0

### Required PHP Extensions

- PDO SQLite
- JSON
- Tokenizer
- Fileinfo

### Optional Requirements

- Queue system (for background processing)
- Redis (for caching, optional)

## 2.2. Installation

### Via Composer

```bash
composer require s-a-c/eloquent-model-generator
```

### Service Provider Registration

The package will automatically register its service provider in Laravel 5.5+ applications. For older versions, manually add the service provider in `config/app.php`:

```php
'providers' => [
    // ...
    SAC\EloquentModelGenerator\ModelGeneratorServiceProvider::class,
];
```

### Publishing Configuration

```bash
php artisan vendor:publish --provider="SAC\EloquentModelGenerator\ModelGeneratorServiceProvider" --tag="model-generator-config"
```

This will create a `config/model-generator.php` file with the following structure:

```php
return [
    'schema' => [
        'chunk_size' => 100,
        'analyze_indexes' => true,
        'detect_polymorphic' => true,
        'exclude_tables' => ['migrations', 'failed_jobs'],
    ],
    'generation' => [
        'namespace' => 'App\\Models',
        'path' => 'app/Models',
        'base_class' => 'Illuminate\\Database\\Eloquent\\Model',
        'generate_phpdoc' => true,
        'generate_type_hints' => true,
    ],
    'documentation' => [
        'enabled' => true,
        'output_path' => 'docs/models',
        'format' => 'markdown',
    ],
    'error_handling' => [
        'continue_on_error' => false,
        'log_errors' => true,
    ],
];
```

### Publishing Templates (Optional)

```bash
php artisan vendor:publish --provider="SAC\EloquentModelGenerator\ModelGeneratorServiceProvider" --tag="model-generator-stubs"
```

## 2.3. Quick Start Guide

### Basic Usage

1. Ensure your SQLite database is properly configured in `.env`:

```env
DB_CONNECTION=sqlite
DB_DATABASE=/absolute/path/to/database.sqlite
```

2. Generate models for all tables:

```bash
php artisan model:generate
```

3. Generate models for specific tables:

```bash
php artisan model:generate --table=users,posts,comments
```

### Example Output

For a table `users` with the following structure:

```sql
CREATE TABLE users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    remember_token VARCHAR(100),
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);
```

The generator will create:

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 */
class User extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
```

## 2.4. Basic Usage

### Command Line Interface

The package provides several Artisan commands:

```bash
# Generate models for all tables
php artisan model:generate

# Generate models for specific tables
php artisan model:generate --table=users,posts

# Exclude specific tables
php artisan model:generate --exclude=migrations,jobs

# Generate with documentation
php artisan model:generate --with-docs

# Force overwrite existing models
php artisan model:generate --force

# Generate in background queue
php artisan model:generate --queue

# Analyze database schema
php artisan model:analyze

# Generate model documentation
php artisan model:docs
```

### Programmatic Usage

You can also use the generator programmatically:

```php
use SAC\EloquentModelGenerator\Contracts\ModelGeneratorInterface;

class YourService
{
    public function __construct(
        private readonly ModelGeneratorInterface $generator,
    ) {}

    public function generateModels(): void
    {
        // Generate for specific tables
        $result = $this->generator->generate(['users', 'posts']);

        // Generate for all tables
        $tables = $this->generator->analyzeTables();
        $result = $this->generator->generate($tables);

        // Handle results
        foreach ($result->generatedFiles as $file) {
            // Process generated files
        }

        if ($result->hasErrors()) {
            foreach ($result->errors as $error) {
                // Handle errors
            }
        }
    }
}
```

### Event Handling

The package dispatches events that you can listen to:

```php
use SAC\EloquentModelGenerator\Events\ModelGenerationProgressEvent;

class ModelGenerationListener
{
    public function handle(ModelGenerationProgressEvent $event): void
    {
        // Access event data
        $table = $event->table;
        $progress = $event->getProgress();
        $isComplete = $event->isComplete;

        if ($event->isSuccessful()) {
            $result = $event->getResult();
        } else {
            $error = $event->getError();
        }
    }
}
```

[← Back to Overview](./README.md) | [Continue to Technical Design →](./technical-design.md)
