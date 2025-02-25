# Troubleshooting

## 10.1. Common Issues

### Installation Issues

| Issue | Possible Cause | Solution |
|-------|---------------|----------|
| Composer install fails | PHP version mismatch | Ensure PHP 8.2+ is installed |
| Package not found | Invalid repository URL | Verify composer.json configuration |
| Dependency conflicts | Incompatible packages | Check package version constraints |

### Configuration Issues

```mermaid
flowchart TD
    A[Configuration Issue] --> B{Config File Exists?}
    B -->|No| C[Publish Config]
    B -->|Yes| D{Valid Settings?}
    D -->|No| E[Check Format]
    D -->|Yes| F{Environment Set?}
    F -->|No| G[Set Variables]
    F -->|Yes| H[Verify Values]
```

#### Common Configuration Errors

1. **Invalid Database Configuration**

```php
// Incorrect
'database' => [
    'driver' => 'mysql', // Wrong driver
],

// Correct
'database' => [
    'driver' => 'sqlite',
    'database' => database_path('database.sqlite'),
],
```

2. **Invalid Namespace Configuration**

```php
// Incorrect
'namespace' => 'App/Models', // Wrong separator

// Correct
'namespace' => 'App\\Models',
```

### Generation Issues

#### Table Analysis Failures

```mermaid
flowchart TD
    A[Analysis Failure] --> B{Table Exists?}
    B -->|No| C[Check Table Name]
    B -->|Yes| D{Valid Schema?}
    D -->|No| E[Fix Schema]
    D -->|Yes| F{Permissions?}
    F -->|No| G[Grant Access]
    F -->|Yes| H[Check Logs]
```

Common Analysis Errors:

```php
try {
    $generator->analyzeTables();
} catch (SchemaAnalysisException $e) {
    match ($e->getCode()) {
        1001 => 'Table does not exist',
        1002 => 'Invalid column type',
        1003 => 'Missing primary key',
        1004 => 'Circular reference detected',
        default => 'Unknown error',
    };
}
```

#### Code Generation Failures

```mermaid
flowchart TD
    A[Generation Failure] --> B{Write Permission?}
    B -->|No| C[Fix Permissions]
    B -->|Yes| D{Valid Template?}
    D -->|No| E[Check Template]
    D -->|Yes| F{Memory Limit?}
    F -->|Yes| G[Increase Memory]
    F -->|No| H[Check Logs]
```

## 10.2. Error Messages

### Error Categories

1. **Configuration Errors**

```php
InvalidConfigurationException: Missing required option: database_path
Solution: Ensure database path is set in config or .env
```

2. **Schema Analysis Errors**

```php
SchemaAnalysisException: Failed to analyze table 'users': Invalid column type
Solution: Verify table schema and supported column types
```

3. **Generation Errors**

```php
ModelGenerationException: Failed to generate model for table 'posts'
Solution: Check file permissions and template validity
```

### Debug Mode

Enable debug mode for detailed error information:

```php
// config/model-generator.php
return [
    'debug' => true,
    'logging' => [
        'level' => 'debug',
        'separate_channel' => true,
    ],
];
```

## 10.3. Debug Mode

### Enabling Debug Output

```bash
# Via environment variable
MODEL_GENERATOR_DEBUG=true php artisan model:generate

# Via configuration
php artisan model:generate --debug
```

### Debug Information

```php
[
    'context' => [
        'table' => 'users',
        'operation' => 'analysis',
        'timestamp' => '2025-02-24 23:43:46',
    ],
    'memory' => [
        'current' => '24.5 MB',
        'peak' => '32.1 MB',
    ],
    'timing' => [
        'start' => 1708816426.123,
        'end' => 1708816426.456,
        'duration' => 0.333,
    ],
    'stack_trace' => [
        // Stack trace information
    ],
]
```

## 10.4. Support Channels

### Getting Help

1. **GitHub Issues**
   - Report bugs
   - Request features
   - Ask questions

2. **Documentation**
   - [Online Documentation](https://s-a-c.github.io/eloquent-model-generator)
   - [API Reference](https://s-a-c.github.io/eloquent-model-generator/api)

3. **Community Support**
   - [Laravel Forums](https://laravel.io/forum)
   - [Stack Overflow](https://stackoverflow.com/questions/tagged/eloquent-model-generator)

### Reporting Issues

When reporting issues, include:

```markdown
### Environment
- PHP Version: 8.2.x
- Laravel Version: 10.x
- Package Version: 1.x
- Database Type: SQLite
- Operating System: Linux/macOS/Windows

### Description
A clear description of the issue

### Steps to Reproduce
1. Step one
2. Step two
3. Step three

### Expected Behavior
What you expected to happen

### Actual Behavior
What actually happened

### Additional Information
- Error messages
- Stack traces
- Configuration
- Database schema
```

### Support Policy

```mermaid
graph TD
    A[Issue Reported] --> B{Security Issue?}
    B -->|Yes| C[Immediate Priority]
    B -->|No| D{Bug?}
    D -->|Yes| E[High Priority]
    D -->|No| F{Feature Request?}
    F -->|Yes| G[Backlog]
    F -->|No| H[Community Discussion]
```

[← Back to Development Workflow](./development-workflow.md) | [Continue to Contributing →](./contributing.md)
