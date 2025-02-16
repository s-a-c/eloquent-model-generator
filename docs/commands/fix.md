# Fix Command

The `model:fix` command analyzes and fixes common issues in Eloquent models.

## Usage

```bash
php artisan model:fix [model] [options]
```

## Arguments

| Argument | Description                                                                      |
| -------- | -------------------------------------------------------------------------------- |
| `model`  | The name of the model to fix. If omitted, all models will be analyzed and fixed. |

## Options

| Option             | Description                                             |
| ------------------ | ------------------------------------------------------- |
| `--fix-types`      | Fix property type hints                                 |
| `--fix-relations`  | Fix relationship methods                                |
| `--fix-casts`      | Fix attribute casting                                   |
| `--fix-fillable`   | Fix fillable properties                                 |
| `--fix-validation` | Fix validation rules                                    |
| `--fix-phpdoc`     | Fix PHPDoc blocks                                       |
| `--fix-all`        | Apply all available fixes                               |
| `--dry-run`        | Show what would be fixed without making changes         |
| `--interactive`    | Prompt for confirmation before applying each fix        |
| `--force`          | Apply fixes without confirmation                        |
| `--backup`         | Create backup files before applying fixes               |
| `--namespace=`     | The namespace to look for models. Default: "App\Models" |
| `--path=`          | The path to look for models. Default: "app/Models"      |

## Examples

Fix a specific model:
```bash
php artisan model:fix User
```

Fix all models with type hints:
```bash
php artisan model:fix --fix-types
```

Show potential fixes without applying them:
```bash
php artisan model:fix User --dry-run
```

Interactively fix relationships:
```bash
php artisan model:fix --fix-relations --interactive
```

## Fix Types

### Property Type Hints
- Add missing property type declarations
- Update incorrect type hints
- Add nullable type hints
- Fix union types
- Fix array type hints

### Relationship Return Types
- Add method return type declarations
- Fix collection type hints
- Fix model reference types
- Fix nullable relationship types

### PHPDoc Types
- Add missing `@property` tags
- Update incorrect type information
- Add relationship `@property-read` tags
- Fix collection type hints

## Fix Relations

### Method Definitions
- Add missing relationship methods
- Fix incorrect relationship types
- Add proper return type hints
- Fix method visibility

### Foreign Keys
- Fix incorrect foreign key references
- Add missing foreign key definitions
- Fix composite key relationships
- Fix polymorphic relations

### Pivot Tables
- Fix pivot table references
- Add pivot attributes
- Fix pivot model references
- Fix many-to-many relationships

## Fix Casts

### Attribute Casting
- Add missing casts
- Fix incorrect cast types
- Add date/time casts
- Fix JSON casting
- Add enum casting

### Custom Casts
- Fix custom cast class references
- Add missing cast parameters
- Fix inbound/outbound casting
- Fix cast serialization

## Fix Validation

### Validation Rules
- Add missing validation rules
- Fix incorrect rule syntax
- Add conditional validation
- Fix custom validation rules
- Add relationship validation

### Error Messages
- Add custom error messages
- Fix message references
- Add translation keys
- Fix placeholder substitutions

## Performance

### Memory Usage
- Fixes are applied in batches
- Large codebases are processed incrementally
- Memory limit can be configured
- Garbage collection is optimized

### Execution Time
- Parallel processing for multiple files
- Caching of analysis results
- Incremental updates
- Progress reporting

## Error Handling

The command handles several error scenarios:

- Invalid model files
- Parse errors
- Syntax errors
- Permission issues
- Backup failures
- Validation errors

## Backup System

When `--backup` is used:
- Creates timestamped backups
- Stores in `storage/backups/models`
- Maintains backup history
- Provides restore capability

## Interactive Mode

When `--interactive` is used:
- Shows detailed fix description
- Displays before/after comparison
- Allows selective fix application
- Provides undo capability

## Configuration

Fix behavior can be customized in `config/model-generator.php`:

```php
return [
    'fixes' => [
        'backup' => true,
        'interactive' => false,
        'batch_size' => 10,
        'parallel' => true,
        'processes' => 4,
    ],
];
```

## Integration

The fix command integrates with:
- `model:analyze` for issue detection
- `model:generate` for regeneration
- `model:metrics` for quality checks
- IDE tooling for immediate feedback

## Notes

- Fixes are applied atomically
- Changes can be reviewed before applying
- Backup files are created by default
- The command is idempotent
- Fixes maintain code style
- Comments are preserved
- Custom attributes are respected
