# SQLite Support Guide

This guide covers the SQLite support features in the Eloquent Model Generator package, including configuration, usage examples, and best practices.

## Table of Contents

1. [Configuration](#configuration)
2. [Schema Analysis](#schema-analysis)
3. [Type Mapping](#type-mapping)
4. [Relationship Detection](#relationship-detection)
5. [Best Practices](#best-practices)
6. [Troubleshooting](#troubleshooting)

## Configuration

### Basic Setup

To use SQLite with the Eloquent Model Generator, configure your database connection in your Laravel `.env` file:

```env
DB_CONNECTION=sqlite
DB_DATABASE=/absolute/path/to/database.sqlite
```

For in-memory SQLite databases (useful for testing):

```env
DB_CONNECTION=sqlite
DB_DATABASE=:memory:
```

### Package Configuration

The package will automatically detect your SQLite connection. No additional configuration is required.

## Schema Analysis

The `SQLiteSchemaAnalyzer` provides comprehensive schema analysis capabilities:

```php
use SAC\EloquentModelGenerator\Services\Schema\SQLiteSchemaAnalyzer;

$analyzer = new SQLiteSchemaAnalyzer(DB::connection());
$schema = $analyzer->analyze('users');
```

### Available Information

The schema analyzer provides:

- Column definitions
- Primary keys
- Foreign keys
- Indexes
- Unique constraints
- Default values
- Nullable status

Example output:

```php
[
    'columns' => [
        'id' => [
            'type' => 'integer',
            'primary' => true,
            'autoIncrement' => true,
        ],
        'name' => [
            'type' => 'string',
            'nullable' => false,
        ],
        // ...
    ],
    'relationships' => [
        // ...
    ],
]
```

## Type Mapping

The `SQLiteTypeMapper` handles conversion between SQLite and PHP types:

```php
use SAC\EloquentModelGenerator\Services\TypeMapping\SQLiteTypeMapper;

$mapper = new SQLiteTypeMapper();
$phpType = $mapper->mapToPhpType('integer', false);  // Returns: 'int'
```

### Supported Types

| SQLite Type | PHP Type       | Cast Type |
| ----------- | -------------- | --------- |
| INTEGER     | int            | integer   |
| TEXT        | string         | string    |
| REAL        | float          | float     |
| BLOB        | resource       | binary    |
| BOOLEAN     | bool           | boolean   |
| DATETIME    | \Carbon\Carbon | datetime  |
| JSON        | array          | array     |

### Custom Type Handling

For custom types or special cases:

```php
$mapper->mapToPhpType('json', true);  // Returns: 'array|null'
$mapper->mapToCastType('json');       // Returns: 'array'
```

## Relationship Detection

The `SQLiteRelationshipDetector` automatically detects relationships:

```php
use SAC\EloquentModelGenerator\Services\Relationships\SQLiteRelationshipDetector;

$detector = new SQLiteRelationshipDetector(DB::connection());
$relationships = $detector->detect('users');
```

### Supported Relationships

- One-to-One
- One-to-Many
- Many-to-Many
- Polymorphic relationships
- Self-referential relationships

Example detection:

```php
[
    [
        'type' => 'hasMany',
        'table' => 'posts',
        'foreignKey' => 'user_id',
        'localKey' => 'id',
    ],
    // ...
]
```

## Best Practices

### Schema Design

1. **Use Appropriate Types**
   - Use INTEGER for IDs and numbers
   - Use TEXT for strings
   - Use REAL for floating-point numbers
   - Use BLOB for binary data

2. **Indexing**
   - Create indexes for frequently queried columns
   - Use unique indexes where appropriate
   - Don't over-index small tables

3. **Relationships**
   - Use consistent naming for foreign keys
   - Follow Laravel conventions for pivot tables
   - Use meaningful names for polymorphic relations

### Performance

1. **Memory Usage**
   - Use appropriate column types
   - Don't store large BLOBs if possible
   - Consider chunking large operations

2. **Query Optimization**
   - Use indexes effectively
   - Keep related data in the same database
   - Use appropriate constraints

### Security

1. **Access Control**
   - Set appropriate file permissions
   - Use absolute paths for database files
   - Backup regularly

2. **Data Validation**
   - Validate input before storage
   - Use prepared statements
   - Handle SQLite-specific escaping

## Troubleshooting

### Common Issues

1. **Database Locked**
   - Ensure all connections are closed
   - Check file permissions
   - Use `PRAGMA busy_timeout`

2. **Type Conversion Issues**
   - Verify column types
   - Check nullable status
   - Use appropriate casts

3. **Relationship Detection Fails**
   - Verify foreign key constraints
   - Check naming conventions
   - Ensure tables exist

### Debug Tips

1. Enable SQLite debugging:
```php
DB::connection()->enableQueryLog();
```

2. Check schema structure:
```php
$tables = DB::connection()->getDoctrineSchemaManager()->listTableNames();
```

3. Verify foreign keys:
```php
$foreignKeys = DB::select("PRAGMA foreign_key_list(table_name)");
```

### Error Messages

| Error                           | Solution                             |
| ------------------------------- | ------------------------------------ |
| "database is locked"            | Wait for other connections to finish |
| "no such table"                 | Check table name and database path   |
| "foreign key constraint failed" | Verify relationship integrity        |

## Additional Resources

- [SQLite Documentation](https://www.sqlite.org/docs.html)
- [Laravel Database Documentation](https://laravel.com/docs/database)
- [Package GitHub Repository](https://github.com/yourusername/eloquent-model-generator)

## Contributing

Found a bug or want to contribute? Please check our [CONTRIBUTING.md](../CONTRIBUTING.md) guide.
