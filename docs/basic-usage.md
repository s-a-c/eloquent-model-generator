# Basic Usage Guide

This guide covers the basic usage of the Eloquent Model Generator package, including model generation, static analysis, and code fixing.

## Model Generation

### Generate a Single Model

```bash
php artisan generate:model --table=users
```

Options:
- `--table`: Specify the table name
- `--connection`: Database connection to use
- `--namespace`: Custom namespace for the model
- `--path`: Custom path for the model file

### Generate Multiple Models

```bash
php artisan generate:model --table=users,posts,comments
```

## Static Analysis

### Run Analysis

```bash
# Interactive mode
php artisan analyze

# With specific options
php artisan analyze --levels=1,2,3 --directory=src
php artisan analyze --parallel --format=html
```

Options:
- `--levels` (-l): Comma-separated list of PHPStan levels to run
- `--directory` (-d): Directory to analyze
- `--parallel`: Run tools in parallel
- `--format`: Output format (html, json, or text)
- `--ci`: Run in CI mode with stricter checks
- `--cache`: Enable caching of analysis results
- `--debug`: Show detailed debug information

### View Reports

Analysis reports are generated in the `build/reports` directory:
- HTML Report (default): `build/reports/report.html`
- JSON Report: `build/reports/report.json`
- Text Report: `build/reports/report.txt`
- Tool-specific reports in `build/reports/tools/`

## Code Fixing

### Fix Code Issues

```bash
# Interactive mode
php artisan fix

# With specific options
php artisan fix --levels=1,2,3 --all
php artisan fix --dry-run
```

Options:
- `--levels` (-l): Comma-separated list of PHPStan levels to fix
- `--all` (-a): Fix all detected issues
- `--dry-run`: Show what would be fixed without making changes
- `--no-backup`: Skip creating backups of files
- `--debug`: Show detailed debug information

### Available Fix Strategies

1. Type Hint Fixer
   - Adds missing return type hints to methods
   - Infers types from method content
   - Creates backups before modifications

## Code Quality Tools

### Run Individual Tools

```bash
# PHPStan
composer phpstan

# Psalm
composer psalm

# PHP CS Fixer
composer cs-fix

# PHP_CodeSniffer
composer phpcs

# PHP Mess Detector
composer phpmd

# Metrics
composer metrics
```

### Run All Checks

```bash
composer check-all
```

This will run:
1. Tests (parallel)
2. Type coverage analysis
3. Static analysis
4. Code style checks
5. Metrics generation

## Composer Scripts

The package provides several composer scripts for common tasks:

```bash
# Testing
composer test              # Run tests
composer test:coverage     # Run tests with coverage
composer test:types       # Run type coverage analysis
composer test:parallel    # Run tests in parallel

# Static Analysis
composer analyze         # Run all static analysis tools
composer fix            # Fix static analysis issues
composer phpstan        # Run PHPStan
composer psalm          # Run Psalm
composer phpmd          # Run PHP Mess Detector

# Code Style
composer style          # Run all code style checks
composer cs-check       # Check code style with PHP-CS-Fixer
composer cs-fix         # Fix code style with PHP-CS-Fixer
composer phpcs          # Check code style with PHP_CodeSniffer
composer phpcs-fix      # Fix code style with PHP_CodeSniffer

# Additional Tools
composer metrics        # Generate code metrics report
composer infection      # Run mutation testing
composer rector-dry     # Run Rector in dry-run mode
composer rector         # Run Rector to apply changes
composer type-coverage  # Run type coverage analysis
composer class-leak     # Run class leak analysis
```

## Best Practices

1. **Always Run Analysis First**
   ```bash
   php artisan analyze
   ```

2. **Review Changes Before Fixing**
   ```bash
   php artisan fix --dry-run
   ```

3. **Keep Backups**
   - Don't use `--no-backup` unless necessary
   - Backups are stored in `build/backup/`

4. **Use Parallel Processing**
   ```bash
   php artisan analyze --parallel
   ```

5. **Regular Quality Checks**
   ```bash
   composer check-all
   ```

## Next Steps

- Read the [Advanced Usage Guide](advanced-usage.md)
- Learn about [Configuration Options](configuration.md)
- Explore [Code Quality Tools](code-quality.md)
- Check [Performance Tips](performance.md)
