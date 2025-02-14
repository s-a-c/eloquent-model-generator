# Analysis Tools

Static analysis tools ensure code quality and type safety.

## Usage

```bash
# Run all tools
composer analyze

# Individual tools
composer phpstan    # Static analysis
composer psalm     # Type checking
composer rector    # Code improvements
composer phpmd     # Code quality
composer metrics   # Code metrics
```

## Tools

### PHPStan/Larastan
Static analysis with Laravel support.

```yaml
# config/tools/phpstan.neon
parameters:
    level: 8
    paths: [src]
    checkModelProperties: true
```

### Psalm
Type checking and verification.

```xml
<!-- config/tools/psalm.xml -->
<psalm errorLevel="4">
    <plugins>
        <pluginClass class="Psalm\LaravelPlugin\Plugin"/>
    </plugins>
</psalm>
```

### Rector
Automated code improvements.

```php
// config/tools/rector.php
$rectorConfig->sets([
    LevelSetList::UP_TO_PHP_83,
    SetList::CODE_QUALITY,
]);
```

## Error Codes

```php
const ERROR_INVALID_CONFIG = 1;    // Config errors
const ERROR_MISSING_CONFIG = 2;    // Missing config
const ERROR_INVALID_FORMAT = 3;    // Format issues
const ERROR_EXECUTION_FAILED = 4;  // Runtime errors
```

## CI Integration

1. Static analysis (PHPStan, Psalm)
2. Code improvements (Rector)
3. Quality checks (PHPMD, Metrics)

## Customization

```yaml
# custom-phpstan.neon
includes:
    - config/tools/phpstan.neon
parameters:
    # Custom rules
```

See [Advanced Configuration](../config/advanced.md) for details.
