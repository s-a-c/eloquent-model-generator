# Advanced Usage

This guide covers advanced features and usage patterns of the Eloquent Model Generator.

## Custom Model Attributes

### Defining Custom Attributes

```php
use SAC\EloquentModelGenerator\ModelGenerator;
use SAC\EloquentModelGenerator\ValueObjects\ModelDefinition;

$definition = new ModelDefinition(
    className: 'User',
    namespace: 'App\\Models',
    tableName: 'users',
    attributes: [
        'fillable' => ['name', 'email'],
        'hidden' => ['password'],
        'casts' => [
            'email_verified_at' => 'datetime',
            'settings' => 'array'
        ]
    ]
);

$generator->generate($definition);
```

### Custom Validation Rules

```php
$definition = new ModelDefinition(
    // ...
    validationRules: [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'age' => 'integer|min:18'
    ]
);
```

## Relationship Handling

### Manual Relationship Definition

```php
$definition = new ModelDefinition(
    // ...
    relationships: [
        'posts' => [
            'type' => 'hasMany',
            'model' => 'App\\Models\\Post',
            'foreignKey' => 'user_id',
            'localKey' => 'id'
        ],
        'profile' => [
            'type' => 'hasOne',
            'model' => 'App\\Models\\Profile'
        ]
    ]
);
```

### Relationship Detection Options

```php
use SAC\EloquentModelGenerator\ModelGenerator;

$generator->generate('users', [
    'detect_relationships' => true,
    'relationship_types' => [
        'belongsTo',
        'hasMany',
        'hasOne'
    ],
    'follow_conventions' => true
]);
```

## Parallel Processing

### Basic Parallel Generation

```php
use SAC\EloquentModelGenerator\Services\ParallelModelGeneratorService;

$service = app(ParallelModelGeneratorService::class);

$batch = $service->generateModels(['users', 'posts', 'comments'], [
    'concurrency' => 4,
    'batch_size' => 50
]);

$batch->progress(function ($batch) {
    info("Progress: {$batch->progress()}%");
});
```

### Custom Progress Handling

```php
$service->generateModels($tables)
    ->then(function ($batch) {
        // All models generated
    })
    ->catch(function ($batch) {
        // Handle errors
    })
    ->finally(function () {
        // Cleanup
    });
```

## Event System

### Model Generation Events

```php
use SAC\EloquentModelGenerator\Events\ModelGenerated;

Event::listen(ModelGenerated::class, function ($event) {
    info("Generated model: {$event->model->className}");
});
```

### Custom Event Handlers

```php
class HandleModelGeneration
{
    public function handle(ModelGenerated $event)
    {
        $model = $event->getModel();

        // Post-generation processing
        if ($model->hasValidation()) {
            $this->generateFormRequest($model);
        }
    }
}
```

## Performance Optimization

### Caching

```php
$generator->generate('users', [
    'use_cache' => true,
    'cache_ttl' => 3600, // 1 hour
    'cache_tags' => ['models', 'schema']
]);
```

### Memory Management

```php
$generator->generateBatch($tables, [
    'chunk_size' => 100,
    'memory_limit' => '256M',
    'gc_probability' => 100
]);
```

## Template Customization

### Custom Model Template

```php
$generator->generate('users', [
    'template' => resource_path('templates/model.stub'),
    'template_data' => [
        'author' => 'Your Name',
        'package' => 'Your Package'
    ]
]);
```

### Dynamic Templates

```php
$generator->setTemplateCallback(function ($model) {
    return match ($model->type) {
        'entity' => 'templates/entity.stub',
        'value-object' => 'templates/value-object.stub',
        default => 'templates/model.stub'
    };
});
```

## Next Steps

- Check the [API Reference](./api-reference.md) for detailed method documentation
- Review [Architecture](./architecture.md) for understanding the internals
- See [Configuration](./configuration.md) for all available options
