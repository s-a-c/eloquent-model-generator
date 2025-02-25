# Static Analysis Guide

## PHPStan Configuration

This package uses PHPStan 2.1 with maximum type safety (level 10) and additional extensions:

```neon
# phpstan.neon
parameters:
    level: 10  # Maximum type safety
    paths:
        - src
        - tests
```

### Extensions

The following PHPStan extensions are configured:

- phpstan/phpstan-strict-rules (^2.0)
- phpstan/phpstan-deprecation-rules (^2.0)
- phpstan/phpstan-phpunit (^2.0)
- phpstan/phpstan-mockery (^2.0)
- larastan/larastan (^3.1)

### Type Safety Features

```php
# Example of strict typing requirements
final class ModelGenerator
{
    /**
     * @param array<string> $tables
     * @param array<string, mixed> $options
     * @return GenerationResult
     * @throws ModelGenerationException
     */
    public function generate(array $tables, array $options = []): GenerationResult
    {
        // Type-safe implementation
    }
}
```

### Running Analysis

Use the provided analysis script:

```bash
# Run full analysis
./analyse.sh

# Options automatically included:
# --level=10
# --memory-limit=2G
# --xdebug
# --debug
# --error-format=prettyJson
# --generate-baseline
```

### Quality Gates

The following checks are enforced:

1. **Type Safety**
   - Generic type validation
   - Template type checking
   - Property initialization
   - Return type verification

2. **Strict Rules**

   ```neon
   strictRules:
       allRules: true
       strictCalls: true
       strictTemplateTypes: true
       strictGenerics: true
   ```

3. **Exception Handling**

   ```neon
   exceptions:
       check:
           missingCheckedExceptionInThrows: true
           tooWideThrowType: true
   ```

4. **PHPStan 2.1 Features**

   ```neon
   treatPhpDocTypesAsCertain: true
   checkAlwaysTrueCheckTypeFunctionCall: true
   checkAlwaysTrueInstanceof: true
   checkAlwaysTrueStrictComparison: true
   ```

### Error Handling

Common error patterns and solutions:

```php
// ❌ Error: Missing type hint
function process($data) {}

// ✅ Fixed: Proper type hints
function process(array $data): void {}

// ❌ Error: Uninitialized property
class Example {
    private string $name;
}

// ✅ Fixed: Constructor initialization
class Example {
    public function __construct(
        private readonly string $name,
    ) {}
}

// ❌ Error: Unsafe null handling
function getName(): ?string {
    return $this->name;
}

// ✅ Fixed: Null safety
function getName(): string {
    return $this->name ?? throw new \RuntimeException('Name not set');
}
```

### Baseline Management

The analysis generates and maintains a baseline:

```bash
# Generate new baseline
./vendor/bin/phpstan analyse --generate-baseline

# Analyze with baseline
./vendor/bin/phpstan analyse --configuration phpstan.neon
```

### CI Integration

Configure in your CI pipeline:

```yaml
# .github/workflows/static-analysis.yml
name: Static Analysis

on: [push, pull_request]

jobs:
  phpstan:
    runs-on: ubuntu-latest
    steps:
      - uses: actions/checkout@v3

      - name: Setup PHP
        uses: shivammathur/setup-php@v2
        with:
          php-version: '8.2'

      - name: Install Dependencies
        run: composer install --prefer-dist --no-progress

      - name: Run PHPStan
        run: ./analyse.sh
```

[← Back to Quality Documentation](index.md)
