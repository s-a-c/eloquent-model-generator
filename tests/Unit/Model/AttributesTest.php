<?php

use SAC\EloquentModelGenerator\Model\Attributes;

/**
 * @group unit
 */
test('it correctly formats fillable attributes', function () {
    $attributes = new Attributes(['name', 'email']);

    expect($attributes->toFillable())
        ->toBe("protected \$fillable = ['name', 'email'];");
});

test('it correctly formats casts attributes', function () {
    $attributes = new Attributes([], [
        'created_at' => 'datetime',
        'is_active' => 'boolean',
    ]);

    expect($attributes->toCasts())
        ->toBe("protected \$casts = ['created_at' => 'datetime', 'is_active' => 'boolean'];");
});

test('it correctly formats dates attributes', function () {
    $attributes = new Attributes([], [], ['created_at', 'updated_at']);

    expect($attributes->toDates())
        ->toBe("protected \$dates = ['created_at', 'updated_at'];");
});
