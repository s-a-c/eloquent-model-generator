<?php

use Illuminate\Events\EventServiceProvider;
use Illuminate\Foundation\Application;
use Illuminate\Log\LogServiceProvider;
use SAC\EloquentModelGenerator\EloquentModelGeneratorServiceProvider;

$app = new Application(dirname(__DIR__));

$app->register(EventServiceProvider::class);
$app->register(LogServiceProvider::class);
$app->register(EloquentModelGeneratorServiceProvider::class);

$app->bind(
    Illuminate\Contracts\Console\Kernel::class,
    Orchestra\Testbench\Console\Kernel::class
);

$app->bind(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    Orchestra\Testbench\Exceptions\Handler::class
);

return $app;
