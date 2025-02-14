<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Core\Configuration\Option;
use Rector\Core\ValueObject\PhpVersion;
use Rector\Laravel\Set\LaravelSetList;
use Rector\Laravel\Rector\ClassMethod\AddParentRegisterRector;
use Rector\Laravel\Rector\Class_\AddMockConsoleOutputToTestsRector;
use Rector\Laravel\Rector\StaticCall\RouteActionCallableRector;
use Rector\Laravel\Rector\FuncCall\FactoryFuncCallToStaticCallRector;
use Rector\Laravel\Rector\New_\AddGuardToLoginEventRector;
use Rector\Laravel\Rector\StaticCall\Redirect301ToPermanentRedirectRector;
use Rector\Laravel\Rector\Class_\UnifyModelDatesWithCastsRector;
use Rector\Laravel\Rector\FuncCall\RemoveDumpDataDeadCodeRector;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->paths([
        __DIR__ . '/../../src',
    ]);

    $rectorConfig->skip([
        __DIR__ . '/../../tests',
        __DIR__ . '/../../vendor',
    ]);

    // PHP version and features
    $rectorConfig->phpVersion(PhpVersion::PHP_83);
    $rectorConfig->parallel();

    // Configure output format
    $rectorConfig->parameters()->set(Option::OUTPUT_FORMAT, 'json');
    $rectorConfig->parameters()->set(Option::CACHE_DIR, __DIR__ . '/../../build/rector');

    // Laravel sets
    $rectorConfig->sets([
        LaravelSetList::LARAVEL_100,
        LaravelSetList::LARAVEL_CODE_QUALITY,
        LaravelSetList::LARAVEL_ARRAY_STR_FUNCTION_TO_STATIC_CALL,
        LaravelSetList::LARAVEL_LEGACY_FACTORIES_TO_CLASSES,
    ]);

    // Laravel-specific rules
    $rectorConfig->rules([
        AddParentRegisterRector::class,
        AddMockConsoleOutputToTestsRector::class,
        RouteActionCallableRector::class,
        FactoryFuncCallToStaticCallRector::class,
        AddGuardToLoginEventRector::class,
        Redirect301ToPermanentRedirectRector::class,
        UnifyModelDatesWithCastsRector::class,
        RemoveDumpDataDeadCodeRector::class,
    ]);

    // Laravel-specific rules
    $rectorConfig->import([
        __DIR__ . '/../../vendor/rector/rector-laravel/config/sets/laravel-100.php',
        __DIR__ . '/../../vendor/rector/rector-laravel/config/sets/laravel-code-quality.php',
        __DIR__ . '/../../vendor/rector/rector-laravel/config/sets/laravel-array-str-functions-to-static-call.php',
        __DIR__ . '/../../vendor/rector/rector-laravel/config/sets/laravel-legacy-factories-to-classes.php',
    ]);
};
