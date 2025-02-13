<?php

declare(strict_types=1);

use TomasVotruba\ClassLeak\Configuration;

return static function (Configuration $configuration): void {
    $configuration->paths([
        __DIR__ . '/src'
    ]);

    // Skip paths that are excluded in PHPStan
    $configuration->skip([
        __DIR__ . '/tests/tmp/*',
        __DIR__ . '/tests/*',
        __DIR__ . '/build/*',
        __DIR__ . '/vendor/*',
        '*.blade.php',
    ]);

    // Level 1 appropriate settings
    $configuration->reportPrivateClassesOnly(false); // Report all potential leaks at level 1
    $configuration->allowInTests(true);
    $configuration->minLevel(1); // Match PHPStan level

    // Skip certain types of classes
    $configuration->skipClasses([
        'SAC\EloquentModelGenerator\Models\*',
        'SAC\EloquentModelGenerator\Services\*',
        'SAC\EloquentModelGenerator\Console\Commands\*'
    ]);

    $configuration->skipTraits(true); // Skip trait analysis at level 1
    $configuration->skipInterfaces(true); // Skip interface analysis at level 1

    // Allow certain dependency patterns common in Laravel
    $configuration->allowClasses([
        'Illuminate\Support\*',
        'Illuminate\Database\*',
        'Illuminate\Console\*'
    ]);

    // Configure dependency thresholds
    $configuration->maxDependencies(15); // More permissive at level 1
    $configuration->maxPublicDependencies(10);
    $configuration->maxProtectedDependencies(8);
    $configuration->maxPrivateDependencies(5);

    // Reporting settings
    $configuration->reportUnusedDependencies(false); // Less strict at level 1
    $configuration->reportDependencyErrors(true); // Still report major issues
};
