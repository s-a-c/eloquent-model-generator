<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\DeadCode\Rector\ClassMethod\RemoveUselessParamTagRector;
use Rector\DeadCode\Rector\ClassMethod\RemoveUselessReturnTagRector;
use Rector\DeadCode\Rector\Property\RemoveUselessVarTagRector;
use Rector\Php80\Rector\Class_\ClassPropertyAssignToConstructorPromotionRector;
use Rector\Php81\Rector\Property\ReadOnlyPropertyRector;
use Rector\Set\ValueObject\LevelSetList;
use Rector\Set\ValueObject\SetList;
use Rector\TypeDeclaration\Rector\ClassMethod\AddVoidReturnTypeWhereNoReturnRector;
use Rector\TypeDeclaration\Rector\ClassMethod\ReturnTypeFromReturnNewRector;
use Rector\TypeDeclaration\Rector\ClassMethod\ReturnTypeFromStrictTypedCallRector;
use Rector\TypeDeclaration\Rector\Property\TypedPropertyFromStrictConstructorRector;
use Rector\ValueObject\PhpVersion;

return static function (RectorConfig $rectorConfig): void {
    // Set PHP version features
    $rectorConfig->phpVersion(PhpVersion::PHP_83);

    // Paths to analyze
    $rectorConfig->paths([
        __DIR__ . '/src',
    ]);

    $rectorConfig->output('json');
    $rectorConfig->cacheDirectory('build/rector');

    // Skip paths
    $rectorConfig->skip([
        __DIR__ . '/tests',
        __DIR__ . '/vendor',
    ]);

    // Level sets appropriate for PHP 8.3
    $rectorConfig->sets([
        LevelSetList::UP_TO_PHP_83,  // Upgrade to PHP 8.3 features
        SetList::DEAD_CODE,          // Remove dead code
        SetList::CODE_QUALITY,       // Improve code quality
        SetList::CODING_STYLE,       // Apply coding style rules
        SetList::TYPE_DECLARATION,   // Add type declarations where possible
        SetList::EARLY_RETURN,       // Convert nested conditions to early returns
        SetList::PHP_83,             // PHP 8.3 specific rules
    ]);

    // Rules appropriate for PHP 8.3
    $rectorConfig->rules([
        // Type declaration rules
        AddVoidReturnTypeWhereNoReturnRector::class,
        ReturnTypeFromReturnNewRector::class,
        ReturnTypeFromStrictTypedCallRector::class,
        TypedPropertyFromStrictConstructorRector::class,

        // Modern PHP features
        ClassPropertyAssignToConstructorPromotionRector::class,
        ReadOnlyPropertyRector::class,

        // PHPDoc cleanup
        RemoveUselessParamTagRector::class,
        RemoveUselessReturnTagRector::class,
        RemoveUselessVarTagRector::class,
    ]);

    // Configure Swiss Knife
    $rectorConfig->importShortClasses();
    $rectorConfig->parallel();

    // Skip certain paths for Swiss Knife analysis
    $rectorConfig->skip([
        __DIR__ . '/src/Models/*',
        __DIR__ . '/src/ValueObjects/*',
        __DIR__ . '/src/Config/*',
    ]);

    // Laravel-specific configuration
    $rectorConfig->importNames();
    $rectorConfig->importShortClasses();

    // PHPStan level configuration
    $rectorConfig->phpstanConfig(__DIR__ . '/phpstan.neon');
    $rectorConfig->parallel();
};
