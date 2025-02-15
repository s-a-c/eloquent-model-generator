<?php

test('it generates model with custom events', function () {
    $generator = createModelGenerator([
        'events' => [
            'creating' => [
                'generateUuid',
                'setDefaultStatus',
            ],
            'saving' => 'validateCustomRules',
        ],
    ]);

    $model = $generator->generate('test_users', getTestSchema());

    expect($model->getEvents())
        ->toHaveKey('creating')
        ->toHaveKey('saving')
        ->and($model->getEvents()['creating'])
        ->toBeArray()
        ->toHaveCount(2);
});

test('it generates model with observer class', function () {
    $generator = createModelGenerator([
        'observer' => 'App\\Observers\\UserObserver',
    ]);

    $model = $generator->generate('test_users', getTestSchema());

    expect(File::get(app_path('Models/User.php')))
        ->toContain('use App\Observers\UserObserver')
        ->toContain('protected static function boot()')
        ->toContain('static::observe(UserObserver::class)');
});
