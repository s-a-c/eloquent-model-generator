# Static Analysis Tools

This package uses several static analysis tools to ensure code quality and maintainability.

## Quick Start

Run all analysis tools:
```bash
composer analyze
```

Run individual tools:
```bash
composer phpstan   # Static analysis
composer psalm    # Type checking
composer rector   # Code improvements
composer phpmd    # Code quality
composer metrics  # Code metrics
```

## Tools Overview

### PHPStan with Larastan
Static analysis with Laravel-specific rules.

```yaml
# config/tools/phpstan.neon
parameters:
    level: 8              # Maximum strictness
    paths: [src]          # Analyze source only
    checkModelProperties: true
    checkUnionTypes: true
```

### Psalm
Type checking and verification.

```xml
<!-- config/tools/psalm.xml -->
<psalm
    errorLevel="4"
    findUnusedCode="false"
    allowStringToStandInForClass="true"
>
    <plugins>
        <pluginClass class="Psalm\LaravelPlugin\Plugin"/>
    </plugins>
</psalm>
```

### Rector
Automated code improvements in three configurations:
- `rector.php`: Base PHP improvements
- `rector-laravel.php`: Laravel-specific rules
- `rector-type-coverage.php`: Type safety improvements

```php
// config/tools/rector.php
$rectorConfig->sets([
    LevelSetList::UP_TO_PHP_83,
    SetList::CODE_QUALITY,
    SetList::TYPE_DECLARATION,
]);
```

### PHPMD
Code quality and maintainability checks.

```xml
<!-- config/tools/phpmd.xml -->
<ruleset name="Laravel Package PHPMD Ruleset">
    <rule ref="rulesets/cleancode.xml"/>
    <rule ref="rulesets/codesize.xml"/>
    <rule ref="rulesets/naming.xml"/>
</ruleset>
```

### PHPMetrics
Code metrics and analysis reports.

```json
// config/tools/.phpmetrics.json
{
    "includes": ["src"],
    "report": {
        "html": "build/metrics/html",
        "json": "build/metrics/report.json"
    }
}
```

## Error Handling

Standard error codes across all tools:
- `1`: Invalid configuration
- `2`: Missing configuration
- `3`: Invalid format
- `4`: Execution failure

## Suppressing Errors

Use tool-specific annotations when needed:
```php
/** @phpstan-ignore-next-line */
/** @psalm-suppress UndefinedMethod */
/** @phpmd-ignore */
```

## CI Integration

Analysis runs automatically in CI:
1. Static analysis (PHPStan, Psalm)
2. Code improvements (Rector)
3. Quality checks (PHPMD, Metrics)

Failed analysis blocks merges to protected branches.

## Customization

Extend tool configurations:
```yaml
# custom-phpstan.neon
includes:
    - config/tools/phpstan.neon
parameters:
    # Custom rules
```

Run with custom config:
```bash
./vendor/bin/phpstan analyze -c custom-phpstan.neon
```
