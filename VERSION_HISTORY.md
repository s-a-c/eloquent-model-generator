# Version History

## [0.3.0] - 2024-02-13

### Added
- Initial integration of static analysis tools
  - Basic PHPStan setup with level configuration
  - Initial Psalm integration
  - PHP CS Fixer with PSR-12 standard
  - PHP_CodeSniffer with Doctrine standard
  - Basic tooling for PHP Mess Detector, PHPMetrics
  - Initial Rector configuration
  - Type Coverage and Class Leak detection setup
- New `analyze` command foundation
  - Basic CLI interface with Laravel Prompts
  - Initial support for PHPStan levels
  - Basic parallel processing capabilities
  - HTML, JSON, and text output formats
- New `fix` command foundation
  - Basic automated fixing capabilities
  - Initial type hint improvements
  - Code style fixing integration
- Basic configuration system for analysis tools
- Initial documentation structure

### Changed
- Updated minimum PHP version to 8.2
- Updated Laravel requirement to 11.x
- Improved code organization
- Enhanced configuration structure

### Removed
- Support for PHP < 8.2
- Support for Laravel < 11.0
- Legacy configuration formats

### In Progress
- PHPStan level progression (currently at level 1)
- Type coverage improvements
- Documentation completion
- Test coverage expansion
- Additional fix strategies
- CI/CD integration

## [0.2.0] - 2024-02-01

### Added
- Basic model generation functionality
- Initial database schema analysis
- Simple relationship detection
- Basic configuration options
- Core CLI commands

## [0.1.0] - 2024-01-15

### Added
- Initial package structure
- Basic command framework
- Development environment setup
- Initial documentation

[0.3.0]: https://github.com/s-a-c/eloquent-model-generator/compare/v0.2.0...v0.3.0
[0.2.0]: https://github.com/s-a-c/eloquent-model-generator/compare/v0.1.0...v0.2.0
[0.1.0]: https://github.com/s-a-c/eloquent-model-generator/releases/tag/v0.1.0
