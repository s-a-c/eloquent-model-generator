<?php

use SAC\EloquentModelGenerator\ModelGenerator;

test('it generates model with validation rules', function () {
    $generator = createModelGenerator([
        'rules' => [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'is_active' => 'boolean'
        ]
    ]);

    $model = $generator->generate('test_users', getTestSchema());

    expect($model->getRules())
        ->toBeArray()
        ->toHaveCount(3)
        ->toMatchArray([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'is_active' => 'boolean'
        ]);
});

test('it merges custom validation rules with defaults', function () {
    $generator = createModelGenerator([
        'rules' => [
            'email' => 'required|email|unique:users,email,{id}',
        ],
        'merge_rules' => true
    ]);

    $model = $generator->generate('test_users', getTestSchema());

    expect($model->getRules())
        ->toHaveKey('email')
        ->toHaveKey('name')
        ->and($model->getRules()['email'])
        ->toBe('required|email|unique:users,email,{id}');
});
