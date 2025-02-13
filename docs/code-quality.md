# Code Quality Guide

This guide covers the code quality tools and standards used in the Eloquent Model Generator package.

## Static Analysis Tools

### PHPStan

- Level 8 (maximum) strictness
- Custom rules for Laravel
- Configured via `.phpstan.neon`

```bash
# Run PHPStan
composer phpstan

# Run specific level
php artisan analyze --levels=8
```

### Psalm

- Error level 1 (strictest)
- Laravel plugin enabled
- Type coverage analysis

```bash
# Run Psalm
composer psalm

# With info
composer psalm -- --show-info=true
```

### Type Coverage

- Minimum 90% type coverage
- Return type declarations
- Property type declarations
- Parameter type hints

```bash
# Check type coverage
composer type-coverage
```

### Class Leak

- Checks for proper class dependencies
- Identifies potential architectural issues
- Suggests improvements

```bash
# Run class leak analysis
composer class-leak
```

## Code Style

### PHP CS Fixer

- PSR-12 standard
- Laravel conventions
- Custom rules

```bash
# Check style
composer cs-check

# Fix style
composer cs-fix
```

### PHP_CodeSniffer

- Doctrine coding standard
- Slevomat rules
- Custom sniffs

```bash
# Check style
composer phpcs

# Fix style
composer phpcs-fix
```

## Code Quality Metrics

### PHP Mess Detector

- Complexity checks
- Code size rules
- Naming conventions
- Unused code detection

```bash
# Run PHPMD
composer phpmd
```

### PHPMetrics

- Object-oriented metrics
- Complexity analysis
- Maintainability index
- Dependencies analysis

```bash
# Generate metrics
composer metrics
```

## Testing

### Pest PHP

- Feature tests
- Unit tests
- Integration tests
- Parallel execution

```bash
# Run all tests
composer test

# Run with coverage
composer test:coverage

# Run in parallel
composer test:parallel
```

### Mutation Testing

Using Infection for mutation testing:

```bash
# Run mutation tests
composer infection
```

## Automated Fixes

### Rector

- Automated refactoring
- PHP version upgrades
- Framework-specific rules

```bash
# Check changes
composer rector-dry

# Apply changes
composer rector
```

### Fix Command

Interactive fixing of static analysis issues:

```bash
# Run fixer
php artisan fix

# Dry run
php artisan fix --dry-run
```

## Quality Standards

### Type Safety

1. Strict types declaration
   ```php
   declare(strict_types=1);
   ```

2. Return type declarations
   ```php
   public function getUser(): User
   ```

3. Property type declarations
   ```php
   private string $name;
   ```

### Code Organization

1. PSR-12 compliance
2. Single Responsibility Principle
3. Interface segregation
4. Dependency injection

### Documentation

1. PHPDoc blocks for classes
2. Method documentation
3. Type information
4. Usage examples

### Error Handling

1. Strong type checking
2. Exception handling
3. Logging
4. Validation

## CI Integration

### GitHub Actions

```yaml
name: Quality Checks

on: [push, pull_request]

jobs:
  quality:
    runs-on: ubuntu-latest
    steps:
      - uses: actions/checkout@v2

      - name: Setup PHP
        uses: shivammathur/setup-php@v2
        with:
          php-version: '8.2'

      - name: Install Dependencies
        run: composer install --prefer-dist --no-progress

      - name: Run Tests
        run: composer test:parallel

      - name: Static Analysis
        run: php artisan analyze --ci

      - name: Code Style
        run: composer style
```

## Best Practices

1. **Regular Quality Checks**
   ```bash
   composer check-all
   ```

2. **Pre-commit Hooks**
   ```bash
   composer style
   composer analyze
   ```

3. **Documentation Updates**
   - Keep README.md updated
   - Document new features
   - Update API documentation

4. **Code Review Guidelines**
   - Check type safety
   - Verify test coverage
   - Review static analysis results
   - Ensure style compliance

## Quality Metrics

- Minimum test coverage: 80%
- Minimum type coverage: 90%
- Maximum method complexity: 15
- Maximum class complexity: 50
- Maximum method length: 20 lines
- Maximum class length: 200 lines

## Next Steps

- Review [Testing Guide](testing.md)
- Check [Performance Guide](performance.md)
- Read [Contributing Guide](contributing.md)
- Explore [Advanced Usage](advanced-usage.md)
