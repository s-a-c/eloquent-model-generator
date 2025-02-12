<?php

use SAC\EloquentModelGenerator\Model\ModelName;

/**
 * @group unit
 */
test('it correctly formats table name to class name', function () {
    $cases = [
        'users' => 'User',
        'blog_posts' => 'BlogPost',
        'user_profiles' => 'UserProfile'
    ];

    foreach ($cases as $table => $expected) {
        $modelName = ModelName::fromTable($table);
        expect($modelName->toString())
            ->toBeString()
            ->toBeValidClassName()
            ->toBe($expected);
    }
});

test('it correctly formats custom model name', function () {
    $validNames = ['User', 'BlogPost', 'UserProfile'];

    foreach ($validNames as $name) {
        $modelName = new ModelName($name);
        expect($modelName->toString())
            ->toBeString()
            ->toBeValidClassName()
            ->toBe($name);
    }
});

test('it throws exception for invalid model names', function () {
    $invalidNames = ['user', '123User', 'User!', 'user_profile'];

    foreach ($invalidNames as $name) {
        expect(fn() => new ModelName($name))
            ->toThrow(\InvalidArgumentException::class);
    }
});

test('it handles edge cases correctly', function () {
    $edgeCases = [
        'user_' => 'User',
        '_user' => 'User',
        'USER_PROFILE' => 'UserProfile',
        'user_profile_' => 'UserProfile',
        '_user_profile' => 'UserProfile'
    ];

    foreach ($edgeCases as $table => $expected) {
        $modelName = ModelName::fromTable($table);
        expect($modelName->toString())
            ->toBeString()
            ->toBeValidClassName()
            ->toBe($expected);
    }
});
