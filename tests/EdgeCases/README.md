# Edge Case Testing Guide

This directory contains tests specifically designed to catch edge cases that might be missed by regular unit tests. These tests help maintain the robustness of the package by explicitly testing boundary conditions and unusual scenarios.

## Edge Case Categories

### 1. Database Structure Edge Cases
- Empty tables
- Maximum column counts (MySQL InnoDB limit)
- Extremely long table names (64 char limit)
- Non-standard character sets and collations
- All possible MySQL column types

### 2. Naming and Character Edge Cases
- Special characters in column names (`@`, `-`, `.`)
- Reserved PHP keywords as column names
- Unicode characters in identifiers
- Maximum length identifiers

### 3. Relationship Edge Cases
- Circular foreign key relationships
- Self-referential relationships
- Multiple foreign keys between same tables
- Complex polymorphic relationships

### 4. Data Type Edge Cases
- All MySQL data types
- Custom column types
- Enum types with special characters
- JSON columns with complex structures
- Binary data handling

## Writing Edge Case Tests

When writing edge case tests, follow these guidelines:

1. **Test Structure**
```php
/**
 * @group edge-cases
 */
class YourEdgeCaseTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        // Set up your test environment
    }

    protected function tearDown(): void
    {
        // Clean up any test artifacts
        parent::tearDown();
    }

    /**
     * @test
     * @group database
     */
    public function handles_specific_edge_case(): void
    {
        // Arrange: Set up your test scenario
        // Act: Execute the functionality
        // Assert: Verify the results
    }
}
```

2. **Best Practices**
   - Always tag tests with `@group edge-cases`
   - Use descriptive test names that explain the edge case
   - Include detailed comments explaining the scenario
   - Clean up test artifacts in tearDown
   - Test both success and failure cases
   - Use data providers for multiple similar edge cases

3. **Example Edge Cases**
```php
// Testing special characters in column names
public function test_handles_special_characters_in_column_names(): void {
    Schema::create('edge_case_test', function (Blueprint $table) {
        $table->id();
        $table->string('special@column');
        $table->string('column-with-dashes');
        $table->string('column.with.dots');
    });

    $model = $this->service->generateModel('edge_case_test');
    $this->assertNotNull($model);
    // Assert column existence and proper handling
}

// Testing circular relationships
public function test_handles_circular_relationships(): void {
    Schema::create('table_a', function (Blueprint $table) {
        $table->id();
        $table->foreignId('b_id');
    });
    Schema::create('table_b', function (Blueprint $table) {
        $table->id();
        $table->foreignId('a_id');
    });
    // Test relationship generation
}
```

## Running Edge Case Tests

1. **Run all edge case tests:**
```bash
composer test:edge
```

2. **Run specific edge case groups:**
```bash
composer test:edge --filter=database
composer test:edge --filter=naming
composer test:edge --filter=relationships
```

3. **Run with coverage:**
```bash
composer test:edge --coverage
```

## Guidelines for New Edge Cases

When adding new edge case tests:

1. **Categorization**
   - Add tests to appropriate category
   - Create new categories if needed
   - Update this documentation

2. **Documentation**
   - Document the edge case scenario
   - Explain why it's important
   - Include example code
   - List potential failure modes

3. **Test Implementation**
   - Use clear, descriptive names
   - Include detailed comments
   - Clean up test data
   - Test both success and failure
   - Consider performance impact

4. **Validation**
   - Verify edge case is realistic
   - Test against multiple DB engines
   - Consider different PHP versions
   - Check for side effects

## Common Edge Case Patterns

1. **Boundary Testing**
   - Empty/null values
   - Maximum lengths
   - Minimum values
   - Type limits

2. **Character Sets**
   - UTF-8 characters
   - Special characters
   - Control characters
   - Multi-byte characters

3. **Database Constraints**
   - Unique constraints
   - Foreign keys
   - Check constraints
   - Default values

4. **Error Conditions**
   - Invalid inputs
   - Database connection issues
   - Permission problems
   - Resource limits

Remember to regularly review and update edge cases as new versions of PHP, MySQL, and Laravel are released.
