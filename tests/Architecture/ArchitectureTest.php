<?php

use PHPat\Selector\Selector;
use PHPat\Test\PHPat;

test('models do not depend on controllers', function () {
    PHPat::rule()
        ->classes(Selector::namespace('SAC\EloquentModelGenerator\Model'))
        ->shouldNotDependOn()
        ->classes(Selector::namespace('SAC\EloquentModelGenerator\Http\Controllers'))
        ->assertIsValid();
});

test('services only depend on contracts', function () {
    PHPat::rule()
        ->classes(Selector::namespace('SAC\EloquentModelGenerator\Services'))
        ->shouldOnlyDependOn()
        ->classes(Selector::namespace('SAC\EloquentModelGenerator\Contracts'))
        ->classes(Selector::namespace('SAC\EloquentModelGenerator\Model'))
        ->assertIsValid();
});

test('contracts do not depend on implementations', function () {
    PHPat::rule()
        ->classes(Selector::namespace('SAC\EloquentModelGenerator\Contracts'))
        ->shouldNotDependOn()
        ->classes(Selector::namespace('SAC\EloquentModelGenerator\Services'))
        ->assertIsValid();
});
