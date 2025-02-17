# Testing and Static Analysis Principles

## Test Format

All tests must be written in Pest format:

- Located in `tests/Feature` directory
- Using Pest's expressive syntax
- Following Laravel's testing conventions
- Utilizing Pest's expectations API

Example:

```php
test('model has correct properties', function () {
    $model = new ModelDefinition('User', 'App\\Models', 'users');

    expect($model)
        ->toHaveProperty('name', 'User')
        ->toHaveProperty('namespace', 'App\\Models')
        ->toHaveProperty('table', 'users');
});
```

## Test Documentation

All tests and test results must be catalogued in sprint logs:

- Test files and their purposes
- Test cases and assertions
- Test coverage metrics
- Test execution results

Example sprint log entry:

```markdown
### Tests
- tests/Feature/Domain/Model/ModelDefinitionTest.php
  * Test immutability
  * Test property management
  * Test validation rules

### Test Results
Tests:    86 passed (274 assertions)
Duration: 1.95s
```

## Static Analysis

### PHPStan/Larastan

- Must be run at level 8 (maximum strictness)
- Configuration in `phpstan.neon`
- Results must be documented in sprint logs
- Zero errors required for completion

Example configuration:

```neon
parameters:
    level: 8
    paths:
        - src
    checkMissingIterableValueType: true
```

### Psalm

- Must be run at error level 1 (strictest)
- Configuration in `psalm.xml`
- Results must be documented in sprint logs
- Zero errors required for completion

Example configuration:

```xml
<?xml version="1.0"?>
<psalm
    errorLevel="1"
    resolveFromConfigFile="true"
    xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
    xmlns="https://getpsalm.org/schema/config"
>
    <projectFiles>
        <directory name="src" />
    </projectFiles>
</psalm>
```

## Sprint Log Documentation

Each sprint log must include:

- Test Deliverables:

```markdown
### Tests
- tests/Feature/Domain/Type/
  - TypeTest.php
  - AbstractTypeTest.php
  - StringTypeTest.php
```

- Test Results:

```markdown
### Pest Test Results
 PASS  Tests\Feature\Domain\Type\TypeTest
 PASS  Tests\Feature\Domain\Type\AbstractTypeTest
 PASS  Tests\Feature\Domain\Type\StringTypeTest

Tests:    55 passed (187 assertions)
Duration: 1.88s
```

- Static Analysis Results:

```markdown
### Static Analysis
PHPStan level 8 - No errors found!
Psalm level 1 - No errors found!

### Type Coverage
Type coverage: 98.45%
Typed methods:  156/158
Type errors:    0
```

- Git Commands (documented but not executed):

```markdown
### Git Commands
```shell
git add .
git commit -m "feat(tests): add comprehensive test suite" \
-m "- Add Pest tests for all components" \
-m "- Implement static analysis" \
-m "- Achieve full type coverage"
git tag -a v0.3.2-dev.4 -m "Test suite implementation"
```

## Implementation Process

1. Write tests in Pest format
2. Run and document test results
3. Run static analysis:
   - PHPStan/Larastan level 8
   - Psalm error level 1
4. Document all results in sprint log
5. Document (but do not execute) git commands
6. Update sprint log with all deliverables

## Verification

Before marking any sprint task as complete:

1. All tests must pass
2. Static analysis must show zero errors
3. Documentation must be complete
4. Sprint log must include all required sections
