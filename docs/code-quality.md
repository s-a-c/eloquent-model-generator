# Code Quality Guide

This document outlines the code quality tools and practices used in the Eloquent Model Generator package.

## Quick Start

Run all quality checks:
```bash
composer check-all    # Run all checks and tests
composer quality      # Run code quality checks only
composer analyse      # Run static analysis only
composer style        # Run style checks only
```

Fix common issues:
```bash
composer cs-fix       # Fix code style issues
composer phpcs-fix    # Fix PHPCS issues
```

## Code Quality Tools

### 1. Static Analysis (PHPStan/Larastan)

We use PHPStan with Larastan at level 8 (most strict) with additional strict rules.

```bash
composer phpstan      # Run PHPStan analysis
composer psalm        # Run Psalm analysis
```

Key features:
- Full Laravel integration with Larastan
- Strict type checking with generics support
- Model property and attribute validation
- Custom rules for model generation
- Path-specific error handling
- Comprehensive null safety checks

Configuration: `phpstan.neon`

### 2. Code Style (PHP-CS-Fixer & PHPCS)

We follow PSR-12 standards with additional rules from Slevomat and Doctrine coding standards.

```bash
composer style        # Run all style checks
composer cs-check     # Check with PHP-CS-Fixer
composer cs-fix       # Fix with PHP-CS-Fixer
composer phpcs        # Check with PHPCS
composer phpcs-fix    # Fix with PHPCS
```

Key Features:
- PSR-12 compliance
- Modern PHP 8.1 features
- Strict type declarations
- Advanced formatting rules
- Comprehensive PHPDoc standards
- Slevomat coding standards integration
- Doctrine coding standards integration

### 3. Code Quality Analysis (PHPMD)

We use PHP Mess Detector with custom rules tailored for model generation:

```bash
composer phpmd        # Run PHP Mess Detector
```

#### Clean Code Rules
- Allows Laravel Facades (DB, Schema, Str)
- Permits boolean flags for model generation options
- Allows else expressions for complex logic
- Enforces strict type declarations
- Requires proper null handling

#### Code Size Rules
- Method limit: 25 methods per class
- Class complexity limit: 100
- Method length limit: 150 lines
- Parameter list limit: 8 parameters
- Nesting level limit: 4 (max 6)

#### Naming Rules
- Short variable exceptions: id, db, up, to
- Maximum variable length: 40 characters
- Allows Laravel convention method names
- Enforces PSR-12 naming conventions

#### Design Rules
- Coupling limit: 25 objects
- Allows necessary inheritance for model generation
- Permits Laravel architectural patterns
- Enforces interface segregation
- Requires proper dependency injection

### 4. Type Safety

Comprehensive type safety measures:
- Strict type declarations required
- Generic type support
- Proper null handling
- Return type declarations
- Parameter type hints
- Property type declarations
- PHPDoc type validation

### 5. Code Metrics

Monitor code quality metrics:

```bash
composer metrics      # Generate code metrics report
```

Tracks:
- Cyclomatic complexity
- Method length
- Class length
- Dependencies
- Type coverage
- Test coverage
- Documentation coverage

### 6. Testing Framework

Comprehensive testing setup with Pest:

```bash
composer test:all     # Run all test suites
composer test:types   # Run type coverage tests
composer test:parallel # Run tests in parallel
```

Features:
- Parallel test execution
- Type coverage analysis
- Performance profiling
- Memory leak detection
- Load testing support
- Stress testing capabilities

## Quality Thresholds

1. **Static Analysis**
   - PHPStan Level: 8 (maximum)
   - Psalm Level: 1 (maximum)
   - No critical errors allowed
   - Custom baseline for model generation specifics
   - Strict null checking enabled
   - Generic type validation required

2. **Code Coverage**
   - Minimum: 80%
   - Target: 90%
   - Critical paths: 100%
   - Type coverage: 90%

3. **Mutation Score**
   - Minimum MSI: 85%
   - Covered MSI: 90%
   - Mutation timeout: 10s

4. **Complexity Limits**
   - Methods per class: 25
   - Class complexity: 100
   - Method length: 150 lines
   - Parameters: 8 per method
   - Coupling: 25 objects
   - Nesting level: 4 (max 6)

## CI Integration

Comprehensive CI workflow:

```bash
composer check-all    # Run all CI checks
```

Includes:
- Static analysis (PHPStan & Psalm)
- Code style checks (PHP-CS-Fixer & PHPCS)
- Mutation testing
- Type coverage analysis
- Performance benchmarks
- Architecture validation

## Development Workflow

1. **Before Committing**:
   ```bash
   composer check-all  # Run all checks
   composer style     # Fix style issues
   ```

2. **Before Pull Request**:
   ```bash
   composer test:all  # Run all tests
   composer analyse   # Run static analysis
   composer metrics   # Generate metrics report
   ```

3. **Local Development**:
   ```bash
   composer test:watch # Watch for changes
   composer test:coverage # Check coverage
   ```

## Configuration Files

### PHPStan/Larastan (`phpstan.neon`)
- Level 8 analysis
- Strict type checking
- Path-specific rules
- Custom error patterns
- Laravel integration

### PHPCS (`phpcs.xml`)
- PSR-12 standard
- Slevomat rules
- Doctrine rules
- Custom sniffs
- Path exclusions

### PHP-CS-Fixer (`.php-cs-fixer.php`)
- PSR-12 standard
- Modern PHP features
- Type declaration rules
- Documentation rules
- Formatting rules

### PHPMD (`phpmd.xml`)
- Clean code rules
- Size thresholds
- Naming conventions
- Design rules
- Custom rulesets

## Reports

All tools generate reports in the `build/` directory:
- Static Analysis: `build/phpstan/`
- Code Coverage: `build/coverage/`
- Type Coverage: `build/type-coverage/`
- Metrics: `build/metrics/`
- Mutation: `build/infection/`
- Performance: `build/performance/`

## Common Issues

1. **False Positives in Model Generation**
   - Dynamic properties are allowed in specific paths
   - Model method calls are permitted
   - Class name generation is excluded from checks
   - Template engine dynamic calls are allowed

2. **Complexity Exceptions**
   - Higher limits for model generation logic
   - Documented exceptions in complex areas
   - Required complexity is allowed with comments
   - Performance-critical sections are exempt

3. **Laravel-Specific Patterns**
   - Facades are permitted in specific paths
   - Dynamic methods are allowed for models
   - Magic methods are documented
   - Schema builder methods are exempted
