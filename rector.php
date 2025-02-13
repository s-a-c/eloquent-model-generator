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

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->paths([
        __DIR__ . '/src',
    ]);

    // Level 4 appropriate sets
    $rectorConfig->sets([
        LevelSetList::UP_TO_PHP_81,  // Upgrade to PHP 8.1 features
        SetList::DEAD_CODE,          // Remove dead code
        SetList::CODE_QUALITY,       // Improve code quality
        SetList::CODING_STYLE,       // Apply coding style rules
        SetList::TYPE_DECLARATION,   // Add type declarations where possible
        SetList::EARLY_RETURN,       // Convert nested conditions to early returns
    ]);

    // Skip paths that are excluded in PHPStan
    $rectorConfig->skip([
        __DIR__ . '/tests/tmp/*',
        __DIR__ . '/tests/*',
        __DIR__ . '/build/*',
        __DIR__ . '/vendor/*',
        '*.blade.php',
    ]);

    // Rules appropriate for level 4
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
    $rectorConfig->phpVersion(81); // PHP 8.1

    // Skip certain paths for Swiss Knife analysis
    $rectorConfig->skip([
        __DIR__ . '/src/Models/*',
        __DIR__ . '/src/ValueObjects/*',
        __DIR__ . '/src/Config/*',
    ]);

    // Laravel-specific configuration
    $rectorConfig->importNames();
    $rectorConfig->importShortClasses();

    // PHPStan level 4 appropriate settings
    $rectorConfig->phpstanConfig(__DIR__ . '/phpstan.neon');
    $rectorConfig->parallel();
};
