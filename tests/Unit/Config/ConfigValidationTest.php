<?php

use SAC\EloquentModelGenerator\Config\GeneratorConfig;
use SAC\EloquentModelGenerator\Exceptions\InvalidConfigurationException;

test('it validates namespace format', function () {
    expect(fn () => new GeneratorConfig([
        'namespace' => 'Invalid\\\\Namespace\\Format',
    ]))->toThrow(InvalidConfigurationException::class);
});

test('it validates path exists', function () {
    expect(fn () => new GeneratorConfig([
        'path' => '/non/existent/path',
    ]))->toThrow(InvalidConfigurationException::class);
});

test('it validates relation configuration', function () {
    expect(fn () => new GeneratorConfig([
        'relations' => [
            'posts' => [
                'type' => 'invalidRelationType',
            ],
        ],
    ]))->toThrow(InvalidConfigurationException::class);
});
