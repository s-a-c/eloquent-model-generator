# Advanced Topics

This section covers advanced features and complex use cases of the Eloquent Model Generator.

## Advanced Features

### [Custom Types](./custom-types.md)
Learn how to implement custom type handling.
- Custom type definitions
- Type mapping
- Type casting
- Validation rules

### [Event Sourcing](./event-sourcing.md)
Understand event sourcing implementation.
- Domain events
- Event store
- Event replay
- State reconstruction

### [Performance Optimization](./performance.md)
Optimize generator performance.
- Caching strategies
- Memory management
- Batch processing
- Parallel execution

### [Security Considerations](./security.md)
Implement security best practices.
- Input validation
- Query sanitization
- Access control
- Vulnerability prevention

## Advanced Use Cases

### Custom Type Mapping
```php
// config/eloquent-model-generator.php
return [
    'type_mappings' => [
        'mysql' => [
            'point' => \App\Types\Point::class,
            'geometry' => \App\Types\Geometry::class,
            'json' => \App\Types\JsonObject::class,
        ],
    ],
];

// App/Types/Point.php
final class Point implements TypeDefinition
{
    public function toPHP(): string
    {
        return '\App\ValueObjects\Point';
    }

    public function toCast(): string
    {
        return 'point';
    }
}
```

### Complex Relationships
```php
// Many-to-Many with Pivot Data
class User extends Model
{
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class)
            ->using(RoleUser::class)
            ->withPivot(['expires_at'])
            ->withTimestamps();
    }
}

// Polymorphic Many-to-Many
class Tag extends Model
{
    public function posts(): MorphToMany
    {
        return $this->morphedByMany(Post::class, 'taggable');
    }

    public function videos(): MorphToMany
    {
        return $this->morphedByMany(Video::class, 'taggable');
    }
}
```

### Custom Validation
```php
// Custom Validation Rules
class User extends Model
{
    public static function rules(): array
    {
        return [
            'email' => [
                'required',
                'email',
                new UniqueInTenant,
                new ValidDomain(['company.com']),
            ],
            'settings' => [
                'required',
                'array',
                new ValidSettings,
            ],
        ];
    }
}

// Custom Validation Messages
public static function messages(): array
{
    return [
        'email.unique_in_tenant' => 'Email must be unique within the tenant.',
        'settings.valid_settings' => 'Invalid settings configuration.',
    ];
}
```

### Event Handling
```php
// Event Listeners
class ModelGeneratedListener
{
    public function handle(ModelGenerated $event): void
    {
        // Generate factory
        FactoryGenerator::generate($event->model);

        // Update documentation
        DocumentationGenerator::update($event->model);

        // Trigger analysis
        dispatch(new AnalyzeModelJob($event->model));
    }
}

// Queue Processing
class AnalyzeModelJob implements ShouldQueue
{
    public function handle(ModelAnalyzer $analyzer): void
    {
        $results = $analyzer->analyze($this->model);

        event(new ModelAnalyzed($results));
    }
}
```

## Performance Optimization

### Caching
```php
// Cache Configuration
return [
    'cache' => [
        'enabled' => true,
        'ttl' => 3600,
        'store' => 'redis',
    ],
];

// Cache Implementation
class CachedTypeResolver implements TypeResolver
{
    public function resolveType(Column $column): Type
    {
        return $this->cache->remember(
            $this->getCacheKey($column),
            $this->ttl,
            fn() => $this->resolver->resolveType($column)
        );
    }
}
```

### Batch Processing
```php
// Process in Chunks
class ModelGenerator
{
    public function generateAll(): void
    {
        $this->tables
            ->chunk(100)
            ->each(fn($chunk) => $this->processTables($chunk));
    }
}
```

## Security Considerations

### Input Validation
```php
// Validate Table Names
class GenerateModelCommand extends Command
{
    private function validateTable(string $table): void
    {
        if (!preg_match('/^[a-zA-Z_][a-zA-Z0-9_]*$/', $table)) {
            throw new InvalidArgumentException('Invalid table name');
        }
    }
}
```

### Access Control
```php
// Check Permissions
class DatabaseInspector
{
    public function inspect(string $table): SchemaDefinition
    {
        if (!$this->hasPermission($table)) {
            throw new AccessDeniedException("No permission to access table: {$table}");
        }

        return $this->inspector->inspect($table);
    }
}
```

## Next Steps

- Review [Architecture](../architecture/index.md)
- Check [Development Guide](../development/index.md)
- Explore [Features](../features/index.md)
