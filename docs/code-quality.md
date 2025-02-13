# Code Quality Guide

This document outlines the code quality tools and practices used in the Eloquent Model Generator package.

## Quick Start

Run all quality checks:
```bash
composer quality        # Run all quality checks
composer quality:ci     # Run CI-specific quality checks
```

Fix common issues:
```bash
composer fix           # Fix all auto-fixable issues
```

## Available Tools

### Static Analysis (PHPStan/Larastan)

We use PHPStan with Larastan for static analysis at level 8 (most strict).

```bash
composer check:types   # Run type checking
```

Key features:
- Full Laravel integration via Larastan
- Strict type checking
- Model property and attribute validation
- Dynamic property checking
- Custom rules for model generation

Configuration: `phpstan.neon`

### Code Style (PHP-CS-Fixer)

We follow PSR-12 standards with additional Laravel-specific rules.

```bash
composer check:style   # Check code style
composer fix:style     # Fix code style issues
```

Key features:
- PSR-12 compliance
- Ordered imports and class elements
- Consistent spacing and formatting
- Type declaration standards
- Laravel conventions

Configuration: `.php-cs-fixer.php`

### Mutation Testing (Infection)

We use Infection for mutation testing to ensure test quality.

```bash
composer test:mutation # Run mutation tests
```

Key features:
- 85% minimum MSI (Mutation Score Indicator)
- 90% minimum covered MSI
- Custom mutator configuration
- Parallel test execution
- Comprehensive reporting

Configuration: `infection.json`

### Code Duplication (PHPCPD)

We check for code duplication using PHP Copy/Paste Detector.

```bash
composer check:duplicates # Check for duplicate code
```

Configuration:
- Minimum 5 lines
- Minimum 70 tokens
- Excludes tests and vendor

### Code Complexity (PHPLOC)

We monitor code complexity and size metrics.

```bash
composer analyze:complexity # Check code complexity
```

Metrics include:
- Lines of code
- Cyclomatic complexity
- Dependencies
- Structure
- Test coverage

### Architecture Testing

We validate architectural decisions and constraints.

```bash
composer test:arch     # Run architecture tests
```

## Continuous Integration

For CI environments, use:

```bash
composer quality:ci    # Run all CI checks
```

This includes:
- Type checking
- Code style validation
- Mutation testing
- Test coverage requirements

## Full Analysis

Run comprehensive analysis:

```bash
composer analyze:all   # Run all analysis tools
```

## Build Process

Complete build process:

```bash
composer build        # Run full build
composer build:clean  # Clean and rebuild
```

The build process includes:
1. Code quality checks
2. Test suite execution
3. Static analysis
4. Complexity analysis
5. Architecture validation

## Configuration Files

- `phpstan.neon` - Static analysis configuration
- `.php-cs-fixer.php` - Code style rules
- `infection.json` - Mutation testing settings
- `composer.json` - Script definitions

## Best Practices

1. **Before Committing**:
   ```bash
   composer check      # Run all checks
   composer fix        # Fix any issues
   ```

2. **Before Pull Request**:
   ```bash
   composer quality    # Full quality check
   ```

3. **Local Development**:
   ```bash
   composer test:watch # Watch for changes
   ```

## Customizing Rules

### PHPStan/Larastan
Modify `phpstan.neon` to:
- Adjust error levels
- Add custom rules
- Configure Laravel-specific checks
- Modify ignored errors

### PHP-CS-Fixer
Modify `.php-cs-fixer.php` to:
- Add custom rules
- Adjust formatting preferences
- Configure file patterns
- Modify excluded paths

### Infection
Modify `infection.json` to:
- Configure mutators
- Adjust thresholds
- Modify test timeout
- Configure parallel execution

## Reporting

All tools generate reports in the `build/` directory:
- PHPStan: `build/phpstan/`
- Infection: `build/infection/`
- Coverage: `build/coverage/`

## Troubleshooting

1. **Memory Issues**:
   ```bash
   # Increase memory limit
   php -d memory_limit=-1 vendor/bin/phpstan analyze
   ```

2. **Timeout Issues**:
   ```bash
   # Increase timeout in infection.json
   "timeout": 60
   ```

3. **Cache Issues**:
   ```bash
   # Clear caches
   rm -rf build/*
   ```
