# Eloquent Model Generator

An advanced Eloquent model generator for Laravel with comprehensive static analysis and code quality tools.

## Features

- 🚀 Generate Eloquent models from your database schema
- 📊 Comprehensive static analysis with multiple tools
- 🛠️ Automated code fixes and improvements
- 🎯 Type coverage analysis and improvements
- 🔍 Code quality checks and enforcement
- 📝 Detailed HTML reports
- ⚡ Parallel processing support
- 🔄 CI/CD integration ready

## Requirements

- PHP 8.2 or higher
- Laravel 11.x
- Composer 2.x

## Installation

```bash
composer require sac/eloquent-model-generator
```

## Basic Usage

### Generate Models

```bash
php artisan generate:model TableName
```

### Run Static Analysis

```bash
# Interactive mode
php artisan analyze

# With specific options
php artisan analyze --levels=1,2,3 --directory=src
php artisan analyze --parallel --format=html
```

### Fix Code Issues

```bash
# Interactive mode
php artisan fix

# With specific options
php artisan fix --levels=1,2,3 --all
php artisan fix --dry-run
```

## Configuration

### Available Commands

1. `analyze` - Run static analysis tools
   - Options:
     - `--levels` (-l): Comma-separated list of PHPStan levels to run
     - `--directory` (-d): Directory to analyze
     - `--parallel`: Run tools in parallel
     - `--format`: Output format (html, json, or text)
     - `--ci`: Run in CI mode with stricter checks
     - `--cache`: Enable caching of analysis results
     - `--debug`: Show detailed debug information

2. `fix` - Fix static analysis issues
   - Options:
     - `--levels` (-l): Comma-separated list of PHPStan levels to fix
     - `--all` (-a): Fix all detected issues
     - `--dry-run`: Show what would be fixed without making changes
     - `--no-backup`: Skip creating backups of files
     - `--debug`: Show detailed debug information

### Composer Scripts

```bash
# Run tests
composer test
composer test:coverage
composer test:types
composer test:parallel

# Static Analysis
composer analyze
composer fix
composer phpstan
composer psalm
composer phpmd

# Code Style
composer style
composer cs-check
composer cs-fix
composer phpcs
composer phpcs-fix

# Additional Tools
composer metrics
composer infection
composer rector-dry
composer rector
composer type-coverage
composer class-leak

# Run all checks
composer check-all
```

## Available Tools

- PHPStan (Levels 0-8)
- Psalm
- PHP CS Fixer
- PHP_CodeSniffer
- PHP Mess Detector
- PHPMetrics
- Infection (Mutation Testing)
- Rector
- Type Coverage
- Class Leak

## Reports

Analysis reports are generated in the `build/reports` directory:

- HTML Report (default): Comprehensive visual report
- JSON Report: Machine-readable format
- Text Report: Simple text output
- Metrics Report: Detailed code metrics
- Tool-specific reports (PHPMD, Psalm, etc.)

## Contributing

Please see [CONTRIBUTING.md](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email [security@example.com](mailto:security@example.com) instead of using the issue tracker.

## Credits

- [Your Name](https://github.com/yourusername)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
