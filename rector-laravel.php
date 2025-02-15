<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use RectorLaravel\Set\LaravelLevelSetList;
use RectorLaravel\Set\LaravelSetList;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->paths([
        __DIR__.'/src/Console/Commands',
        __DIR__.'/src/Models',
    ]);

    $rectorConfig->skip([
        __DIR__.'/tests',
        __DIR__.'/vendor',
    ]);

    $rectorConfig->sets([
        LaravelSetList::LARAVEL_110,
        LaravelLevelSetList::UP_TO_LARAVEL_110,
    ]);

    $rectorConfig->importNames();
    $rectorConfig->parallel();
};
