# Version History

## 0.1.0 (Current)

**Release Date:** 2025-02-15

**Features:**
- Implemented static analysis tools (PHPStan, Psalm, Rector, PHPMD, Metrics, Pint)
- Created configuration builders and error mappers for all analysis tools
- Set up default rules for Laravel best practices, type safety, code quality, and performance
- Implemented configuration validators for all analysis tools

**Breaking Changes:**
- Requires PHP 8.3+
- Requires Laravel 11.x
- New configuration format (tool-specific configuration files)
- Updated interfaces (AnalysisTool, AnalysisResult, AnalysisConfig, ResultFormatter)

**Support Status**

| Version | PHP  | Laravel | Status | Security Until |
| ------- | ---- | ------- | ------ | -------------- |
| 0.1.0   | 8.3+ | 11.x    | Stable | -              |

For detailed information, see [Documentation](docs/version_history.md).
