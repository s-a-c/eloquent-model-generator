# Generate Command

The `model:generate` command generates Eloquent model classes from your database schema.

## Usage

```bash
php artisan model:generate [table] [options]
```

## Arguments

| Argument | Description                                                                                         |
| -------- | --------------------------------------------------------------------------------------------------- |
| `table`  | The name of the table to generate a model for. If omitted, models will be generated for all tables. |

## Options

| Option                 | Description                                                                        |
| ---------------------- | ---------------------------------------------------------------------------------- |
| `--namespace=`         | The namespace for the generated models. Default: "App\Models"                      |
| `--path=`              | The path where models will be created. Default: "app/Models"                       |
| `--base-class=`        | The base class for generated models. Default: "Illuminate\Database\Eloquent\Model" |
| `--with-soft-deletes`  | Include soft delete functionality in generated models                              |
| `--with-timestamps`    | Include timestamp functionality in generated models (default: true)                |
| `--with-validation`    | Include validation rules in generated models                                       |
| `--with-relationships` | Include relationships in generated models (default: true)                          |
| `--with-fillable`      | Include fillable properties in generated models (default: true)                    |
| `--with-casts`         | Include attribute casting in generated models (default: true)                      |
| `--force`              | Overwrite existing models                                                          |
| `--batch-size=`        | Number of models to generate in each batch. Default: 100                           |
| `--parallel`           | Generate models in parallel using multiple processes                               |
| `--processes=`         | Number of parallel processes to use (requires --parallel)                          |
| `--optimize-memory`    | Enable memory optimization for large schemas                                       |
| `--stream`             | Use streaming for large datasets                                                   |
| `--gc-strategy=`       | Garbage collection strategy (disable, auto, aggressive)                            |
| `--use-cache`          | Use cached schema information if available                                         |
| `--incremental`        | Only generate models for new or modified tables                                    |
| `--progressive`        | Generate models one at a time with progress tracking                               |
| `--optimized`          | Use optimized generation mode for better performance                               |

## Examples

Generate a model for a specific table:
```bash
php artisan model:generate users
```

Generate models for all tables with relationships:
```bash
php artisan model:generate --with-relationships
```

Generate models in a custom namespace:
```bash
php artisan model:generate users --namespace="Domain\Models"
```

Generate models with soft deletes:
```bash
php artisan model:generate users --with-soft-deletes
```

Generate models in parallel:
```bash
php artisan model:generate --parallel --processes=4
```

## Performance Considerations

### Memory Usage

The command includes several options for managing memory usage:

- Use `--optimize-memory` for large schemas
- Use `--stream` for large datasets
- Use `--batch-size` to control the number of models generated at once
- Use `--gc-strategy` to control garbage collection behavior

### Execution Time

To improve execution time:

- Use `--parallel` with multiple processes
- Use `--optimized` mode
- Use `--use-cache` to leverage cached schema information
- Use `--incremental` for updates to existing models

## Error Handling

The command handles several error scenarios:

- Table does not exist
- Invalid namespace format
- Permission denied when writing files
- Memory limit exceeded
- Execution timeout
- Database connection errors

Errors are reported with clear messages and, where possible, suggestions for resolution.

## Output

The command provides detailed output including:

- Progress information
- Generated model details
- Relationship detection results
- Performance metrics
- Warning and error messages

## Configuration

The command behavior can be customized through the `config/model-generator.php` configuration file:

```php
return [
    'namespace' => 'App\\Models',
    'path' => 'app/Models',
    'base_class' => 'Illuminate\\Database\\Eloquent\\Model',
    'with_soft_deletes' => false,
    'with_timestamps' => true,
    'with_validation' => false,
    'with_relationships' => true,
    'with_fillable' => true,
    'with_casts' => true,
];
```

## Related Commands

- `model:analyze` - Analyze database schema
- `model:fix` - Fix model issues
- `model:metrics` - Generate model metrics

## Notes

- The command automatically creates directories if they don't exist
- Existing models can be backed up before overwriting with `--force`
- The command supports both MySQL and PostgreSQL databases
- Generated models include PHPDoc blocks for IDE support
- Relationship detection is recursive by default
