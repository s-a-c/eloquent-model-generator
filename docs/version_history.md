# Version History

## 0.1.0 (Current)

**Release Date:** 2025-02-15

### Features
- Implemented static analysis tools (PHPStan, Psalm, Rector, PHPMD, Metrics, Pint)
- Created configuration builders and error mappers for all analysis tools
- Set up default rules for Laravel best practices, type safety, code quality, and performance
- Implemented configuration validators for all analysis tools

### Breaking Changes
- Requires PHP 8.3+
- Requires Laravel 11.x
- New configuration structure
- Updated tool interfaces

### Support Status

| Version | PHP  | Laravel | Status | Security Until |
| ------- | ---- | ------- | ------ | -------------- |
| 0.1.0   | 8.3+ | 11.x    | Stable | -              |

## [Unreleased]

### Added
- Initial package structure
- Basic documentation
- Analysis tool configurations
    - PHPStan/Larastan setup
    - Psalm integration
    - Rector configuration
    - PHPMD rules
    - PHPMetrics setup
- Error handling system
    - Base exception classes
    - Tool-specific exceptions
    - Error validation
- Documentation
    - Core documentation structure
    - Analysis tools guide
    - Configuration guides
    - Security policy
    - Code of conduct

### Changed
- Updated minimum PHP version to 8.3
- Enhanced error handling
- Improved documentation structure

### Fixed
- Exception handling in tool configurations
- Documentation links and formatting
- Configuration validation

## Release Schedule

### Version 0.1.0
- Alpha: Q1 2024
- Beta: Q2 2024
- RC: Q3 2024
- Stable: Q4 2024

### Long Term Support
- Will begin with 1.0.0 release
- Security updates
- Bug fixes
- Performance improvements
