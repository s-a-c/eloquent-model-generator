# Analyze Command

The `model:analyze` command analyzes database schema and provides detailed information about tables, columns, and relationships.

## Usage

```bash
php artisan model:analyze [table] [options]
```

## Arguments

| Argument | Description                                                                |
| -------- | -------------------------------------------------------------------------- |
| `table`  | The name of the table to analyze. If omitted, all tables will be analyzed. |

## Options

| Option                 | Description                                       |
| ---------------------- | ------------------------------------------------- |
| `--format=`            | Output format (text, json, yaml). Default: "text" |
| `--output=`            | Write output to file instead of stdout            |
| `--with-relationships` | Include relationship analysis                     |
| `--with-indexes`       | Include index analysis                            |
| `--with-foreign-keys`  | Include foreign key analysis                      |
| `--with-all`           | Include all available analysis types              |
| `--detailed`           | Include detailed information in the analysis      |
| `--schema=`            | Database schema to analyze (PostgreSQL only)      |
| `--timeout=`           | Analysis timeout in seconds. Default: 60          |
| `--memory-limit=`      | Memory limit for analysis. Default: "256M"        |

## Examples

Analyze a specific table:
```bash
php artisan model:analyze users
```

Analyze all tables with relationships:
```bash
php artisan model:analyze --with-relationships
```

Output analysis in JSON format:
```bash
php artisan model:analyze users --format=json
```

Save analysis to file:
```bash
php artisan model:analyze users --output=analysis.json
```

## Output Format

### Text Format (Default)

```
Table: users
Columns:
  - id: integer NOT NULL PRIMARY KEY AUTO_INCREMENT
  - name: varchar(255) NOT NULL
  - email: varchar(255) NOT NULL UNIQUE
  - created_at: timestamp NULL
  - updated_at: timestamp NULL

Relationships:
  - hasMany: posts (foreign_key: user_id)
  - hasOne: profile (foreign_key: user_id)
  - belongsToMany: roles (pivot: role_user)

Indexes:
  - PRIMARY KEY: id
  - UNIQUE: email
  - INDEX: created_at
```

### JSON Format

```json
{
  "table": "users",
  "columns": {
    "id": {
      "type": "integer",
      "nullable": false,
      "primary": true,
      "auto_increment": true
    },
    "name": {
      "type": "varchar",
      "length": 255,
      "nullable": false
    }
  },
  "relationships": [
    {
      "type": "hasMany",
      "table": "posts",
      "foreign_key": "user_id"
    }
  ]
}
```

### YAML Format

```yaml
table: users
columns:
  id:
    type: integer
    nullable: false
    primary: true
    auto_increment: true
  name:
    type: varchar
    length: 255
    nullable: false
relationships:
  - type: hasMany
    table: posts
    foreign_key: user_id
```

## Analysis Types

### Column Analysis
- Data types
- Nullability
- Default values
- Column modifiers
- Comments and metadata

### Relationship Analysis
- Foreign keys
- Pivot tables
- Polymorphic relations
- Self-referential relations
- Composite keys

### Index Analysis
- Primary keys
- Unique indexes
- Regular indexes
- Composite indexes
- Spatial indexes

### Foreign Key Analysis
- Referenced tables
- Referenced columns
- On delete actions
- On update actions
- Constraint names

## Performance Considerations

- Use `--timeout` for long-running analyses
- Use `--memory-limit` for large schemas
- Analysis is performed in chunks for large tables
- Indexes are cached for repeated analyses
- Relationship detection can be resource-intensive

## Error Handling

The command handles several error scenarios:

- Database connection failures
- Invalid table names
- Schema access permissions
- Memory exhaustion
- Timeout conditions
- Invalid foreign key configurations

## Integration

The analysis output can be used by:

- `model:generate` command for model generation
- `model:fix` command for model fixes
- `model:metrics` command for metrics collection
- External tools via JSON/YAML output

## Configuration

Analysis behavior can be customized in `config/model-generator.php`:

```php
return [
    'analysis' => [
        'timeout' => 60,
        'memory_limit' => '256M',
        'chunk_size' => 1000,
        'cache_duration' => 3600,
    ],
];
```

## Notes

- Analysis results are cached by default
- The command supports MySQL, PostgreSQL, and SQLite
- Analysis can be performed on views and materialized views
- Column comments are preserved in the analysis
- The command is non-destructive and read-only
