# Tool Configurations

## PHPStan Configuration

```neon
# phpstan.neon
parameters:
    level: 10
    paths:
        - src
        - tests
        - config
    checkMissingIterableValueType: true
    checkGenericClassInNonGenericObjectType: true
    checkUninitializedProperties: true
    strictRules:
        allRules: true
    ignoreErrors: []
    excludePaths:
        - vendor/*
    tmpDir: .phpstan
    parallel:
        maximumNumberOfProcesses: 4
```

## PHP_CodeSniffer Configuration

```xml
<?xml version="1.0"?>
<ruleset name="SAC">
    <description>SAC Coding Standard</description>

    <file>src</file>
    <file>tests</file>
    <file>config</file>

    <arg name="basepath" value="."/>
    <arg name="colors"/>
    <arg name="parallel" value="4"/>
    <arg value="spv"/>

    <rule ref="PSR12"/>
    <rule ref="Generic.Arrays.DisallowLongArraySyntax"/>
    <rule ref="Generic.Classes.DuplicateClassName"/>
    <rule ref="Generic.CodeAnalysis.EmptyStatement"/>
    <rule ref="Generic.CodeAnalysis.UnusedFunctionParameter"/>
    <rule ref="Generic.Commenting.DocComment"/>
    <rule ref="Generic.Files.LineLength">
        <properties>
            <property name="lineLimit" value="80"/>
            <property name="absoluteLineLimit" value="120"/>
        </properties>
    </rule>
</ruleset>
```

## StyleCI Configuration

```yaml
# .styleci.yml
preset: psr12
risky: true

enabled:
  - alpha_ordered_imports
  - concat_with_spaces
  - const_separation
  - declare_strict_types
  - dir_constant
  - is_null
  - modernize_types_casting
  - no_empty_comment
  - no_unused_imports
  - ordered_class_elements
  - phpdoc_order
  - strict_comparison
  - strict_param
  - trailing_comma_in_multiline_array

disabled: []

finder:
  exclude:
    - "vendor"
  name:
    - "*.php"
```

## SonarQube Configuration

```properties
# sonar-project.properties
sonar.projectKey=sac-eloquent-model-generator
sonar.projectName=SAC Eloquent Model Generator
sonar.projectVersion=1.0

sonar.sources=src,config
sonar.tests=tests

sonar.php.coverage.reportPaths=coverage.xml
sonar.php.tests.reportPath=junit.xml
sonar.php.phpstan.reportPaths=phpstan-report.json

sonar.qualitygate.wait=true
sonar.qualityProfiles.php=Sonar way
sonar.security.enabled=true
sonar.security.securityHotspots.enabled=true

sonar.coverage.exclusions=tests/**/*
sonar.cpd.exclusions=tests/**/*
```

## PHP-CS-Fixer Configuration

```php
<?php
// .php-cs-fixer.php

$finder = PhpCsFixer\Finder::create()
    ->in([
        __DIR__ . '/src',
        __DIR__ . '/tests',
        __DIR__ . '/config',
    ])
    ->name('*.php')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true);

return (new PhpCsFixer\Config())
    ->setRules([
        '@PSR12' => true,
        '@PHP80Migration:risky' => true,
        '@PHPUnit84Migration:risky' => true,
        'strict_param' => true,
        'array_syntax' => ['syntax' => 'short'],
        'ordered_imports' => ['sort_algorithm' => 'alpha'],
        'no_unused_imports' => true,
        'declare_strict_types' => true,
        'void_return' => true,
        'static_lambda' => true,
        'strict_comparison' => true,
        'strict_param' => true,
        'no_superfluous_phpdoc_tags' => true,
        'phpdoc_align' => true,
        'phpdoc_order' => true,
        'phpdoc_separation' => true,
        'phpdoc_types_order' => [
            'null_adjustment' => 'always_last',
            'sort_algorithm' => 'alpha',
        ],
    ])
    ->setRiskyAllowed(true)
    ->setFinder($finder);
```

## Infection Configuration

```json
{
    "source": {
        "directories": [
            "src"
        ]
    },
    "logs": {
        "text": "infection.log",
        "html": "infection.html",
        "summary": "summary.log",
        "json": "infection.json",
        "perMutator": "per-mutator.md"
    },
    "mutators": {
        "@default": true,
        "@function_signature": true,
        "@number": true,
        "@operator": true,
        "@regex": true,
        "@removal": true,
        "@sort": true,
        "@zero_iteration": true
    },
    "testFramework": "pest",
    "minMsi": 85,
    "minCoveredMsi": 90
}
```

## Pre-commit Hook Configuration

```yaml
# .pre-commit-config.yaml
repos:
  - repo: local
    hooks:
      - id: php-lint
        name: PHP Lint
        entry: php -l
        language: system
        files: \.php$

      - id: phpstan
        name: PHPStan
        entry: vendor/bin/phpstan analyse
        language: system
        files: \.php$
        pass_filenames: false

      - id: phpcs
        name: PHP_CodeSniffer
        entry: vendor/bin/phpcs
        language: system
        files: \.php$

      - id: php-cs-fixer
        name: PHP-CS-Fixer
        entry: vendor/bin/php-cs-fixer fix --dry-run --diff
        language: system
        files: \.php$
```

[← Back to Tooling Audit](tooling-audit.md)
