<?php

use SAC\EloquentModelGenerator\Config\GeneratorConfig;

test('it correctly sets and gets namespace', function () {
    $config = new GeneratorConfig([
        'namespace' => 'App\\Custom\\Models',
    ]);

    expect($config->getNamespace())
        ->toBe('App\\Custom\\Models');
});

test('it correctly sets and gets model path', function () {
    $config = new GeneratorConfig([
        'path' => 'app/Custom/Models',
    ]);

    expect($config->getPath())
        ->toBe('app/Custom/Models');
});

test('it uses default values when not specified', function () {
    $config = new GeneratorConfig();

    expect($config)
        ->getNamespace()->toBe('App\\Models')
        ->and(basename($config->getPath()))->toBe('Models')
        ->and(basename(dirname($config->getPath())))->toBe('app');
});
