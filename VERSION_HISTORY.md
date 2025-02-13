# Version History

## [2.0.0] - 2024-02-13

### Added
- New `analyze` command for comprehensive static analysis
  - Interactive CLI with Laravel Prompts
  - Support for PHPStan levels 0-8
  - Parallel processing capabilities
  - Multiple output formats (HTML, JSON, text)
  - Caching support for faster analysis
  - CI mode for automation
- New `fix` command for automated code fixing
  - Interactive fixing with preview options
  - Backup system for safe modifications
  - Multiple fix strategies
  - Type hint inference and addition
- Comprehensive static analysis tools integration
  - PHPStan with custom Laravel rules
  - Psalm with Laravel plugin
  - PHP CS Fixer with PSR-12 standard
  - PHP_CodeSniffer with Doctrine standard
  - PHP Mess Detector
  - PHPMetrics
  - Infection for mutation testing
  - Rector for automated refactoring
  - Type Coverage analysis
  - Class Leak detection
- Advanced reporting system
  - HTML reports with modern UI
  - JSON reports for CI integration
  - Text reports for quick review
  - Tool-specific detailed reports
- New configuration system for analysis tools
- Backup system for code modifications
- Parallel processing support
- Comprehensive documentation updates

### Changed
- Updated minimum PHP version to 8.2
- Updated Laravel requirement to 11.x
- Improved code organization and structure
- Enhanced error handling and validation
- Updated composer scripts for better workflow
- Modernized configuration structure
- Improved documentation organization

### Removed
- PHPStan baseline (in favor of progressive fixing)
- Support for PHP < 8.2
- Support for Laravel < 11.0
- Legacy configuration formats

### Fixed
- Type safety improvements across the codebase
- Code style consistency
- Documentation accuracy and completeness

## [1.0.0] - 2024-01-01

### Added
- Initial release
- Basic model generation functionality
- Database schema analysis
- Relationship detection
- Basic configuration options
- Simple CLI commands

[2.0.0]: https://github.com/s-a-c/eloquent-model-generator/compare/v1.0.0...v2.0.0
[1.0.0]: https://github.com/s-a-c/eloquent-model-generator/releases/tag/v1.0.0
