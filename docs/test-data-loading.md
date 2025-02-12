# Test Data Loading

This package provides a robust system for loading test data from JSON and YAML files through the `WithTestData` trait. This feature simplifies the management and usage of test fixtures, making your tests more maintainable and easier to write.

## Installation

The feature is included in the package by default. The YAML support requires the `symfony/yaml` package, which is already included in the dev dependencies.

## Basic Usage

To use the test data loading feature in your tests:

1. Use the `WithTestData` trait in your test class:

```php
use SAC\EloquentModelGenerator\Tests\Support\Traits\WithTestData;

class YourTest extends TestCase
{
    use WithTestData;
}
```

2. Load test data in your tests:

```php
// Load entire file
$userData = $this->loadTestData('models/user.json');

// Load specific key from the data
$fillable = $this->loadTestData('models/user.json', 'fillable');

// Load YAML data
$postData = $this->loadTestData('models/post.yml');
```

## Available Methods

### `loadTestData(string $path, ?string $key = null): mixed`

Automatically detects the file format based on extension and loads the data accordingly.

```php
// Load entire file
$data = $this->loadTestData('models/user.json');

// Load specific section
$relationships = $this->loadTestData('models/user.json', 'relationships');
```

### `loadJsonTestData(string $path, ?string $key = null): mixed`

Specifically loads data from JSON files.

```php
$data = $this->loadJsonTestData('models/user.json');
```

### `loadYamlTestData(string $path, ?string $key = null): mixed`

Specifically loads data from YAML files.

```php
$data = $this->loadYamlTestData('models/post.yml');
```

## File Organization

Test data files should be placed in the `tests/datasets` directory. You can organize files in subdirectories for better structure:

```
tests/
├── datasets/
│   ├── models/
│   │   ├── user.json
│   │   └── post.yml
│   ├── schemas/
│   │   └── database.yml
│   └── fixtures/
│       └── test-data.json
```

## Example Data Files

### JSON Example (user.json)

```json
{
    "name": "User",
    "table": "users",
    "attributes": [
        {
            "name": "id",
            "type": "bigInteger",
            "unsigned": true,
            "autoIncrement": true,
            "primary": true
        }
    ],
    "relationships": {
        "hasMany": [
            {
                "related": "Post",
                "foreignKey": "user_id",
                "localKey": "id"
            }
        ]
    },
    "fillable": ["name", "email"],
    "hidden": ["password"]
}
```

### YAML Example (post.yml)

```yaml
name: Post
table: posts
attributes:
  - name: id
    type: bigInteger
    unsigned: true
    autoIncrement: true
    primary: true
  - name: title
    type: string
    length: 255
    nullable: false

relationships:
  belongsTo:
    - related: User
      foreignKey: user_id
      ownerKey: id

fillable:
  - title
  - content
```

## Error Handling

The trait includes comprehensive error handling:

- Missing files throw `InvalidArgumentException`
- Invalid JSON/YAML content throws `InvalidArgumentException`
- Unsupported file extensions throw `InvalidArgumentException`

Example error handling:

```php
try {
    $data = $this->loadTestData('models/invalid.json');
} catch (InvalidArgumentException $e) {
    // Handle the error
}
```

## Best Practices

1. **File Organization**: Keep test data files organized in meaningful subdirectories.
2. **File Format Choice**:
   - Use JSON for complex data structures and when working with JavaScript/API testing
   - Use YAML for more readable, configuration-style data
3. **Data Reusability**: Structure your test data to be reusable across different tests
4. **Key-based Loading**: Use the key parameter to load specific sections of data when you don't need the entire file

## Integration with Other Features

The test data loading feature integrates well with other package features:

- Model Generation Testing
- Schema Analysis
- Relationship Testing
- Performance Testing

Example integration:

```php
public function test_can_generate_model_from_schema(): void
{
    // Load model schema
    $schema = $this->loadTestData('schemas/user.yml');

    // Generate model
    $model = $this->generator->fromSchema($schema);

    // Load expected result
    $expected = $this->loadTestData('models/user.json');

    // Assert model matches expected structure
    $this->assertModelMatchesSchema($model, $expected);
}
```

## Performance Considerations

- Files are read and parsed on demand
- JSON and YAML parsing is cached internally
- For large files, consider loading only needed sections using the key parameter
- Use JSON for better performance with large data structures
- Use YAML for better readability with smaller datasets
