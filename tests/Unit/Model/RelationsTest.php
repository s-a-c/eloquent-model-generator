<?php

use SAC\EloquentModelGenerator\Model\Relations;

test('it correctly generates belongs to relation', function () {
    $relations = new Relations;
    $relations->addBelongsTo('user', 'App\\Models\\User');

    expect($relations->toString())
        ->toContain('public function user()')
        ->toContain('return $this->belongsTo(User::class');
});

test('it correctly generates has many relation', function () {
    $relations = new Relations;
    $relations->addHasMany('posts', 'App\\Models\\Post');

    expect($relations->toString())
        ->toContain('public function posts()')
        ->toContain('return $this->hasMany(Post::class');
});

test('it correctly generates many to many relation', function () {
    $relations = new Relations;
    $relations->addManyToMany('roles', 'App\\Models\\Role');

    expect($relations->toString())
        ->toContain('public function roles()')
        ->toContain('return $this->belongsToMany(Role::class');
});
