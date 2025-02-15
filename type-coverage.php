<?php

declare(strict_types=1);

use TomasVotruba\TypeCoverage\Configuration;

return static function (Configuration $configuration): void {
    $configuration->paths([
        __DIR__.'/src',
    ]);

    // Skip paths that are excluded in PHPStan
    $configuration->skip([
        __DIR__.'/tests/tmp/*',
        __DIR__.'/tests/*',
        __DIR__.'/build/*',
        __DIR__.'/vendor/*',
        '*.blade.php',
    ]);

    // Level 1 appropriate settings
    $configuration->minimalThreshold(30); // Start with a lower threshold at level 1
    $configuration->enableMethodReturnTypeCheck(true); // Always check return types
    $configuration->enablePropertyTypeCheck(false); // Less strict at level 1
    $configuration->enableParameterTypeCheck(false); // Less strict at level 1

    // Skip certain types of classes/methods
    $configuration->skipClasses([
        'SAC\EloquentModelGenerator\ValueObjects\*', // Skip value objects that may use dynamic properties
        'SAC\EloquentModelGenerator\Services\ModelGeneratorTemplateEngine', // Skip template engine with dynamic calls
    ]);
};
