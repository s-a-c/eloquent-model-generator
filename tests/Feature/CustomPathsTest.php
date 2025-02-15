<?php

use Illuminate\Support\Facades\File;

beforeEach(function () {
    // Clean up test directories
    collect([
        app_path('Domain/Models'),
        app_path('Domain/Policies'),
        database_path('Domain/Factories'),
    ])->each(function ($path) {
        if (File::exists($path)) {
            File::deleteDirectory($path);
        }
    });
});

test('it generates files in custom paths', function () {
    $generator = createModelGenerator([
        'namespace' => 'App\\Domain\\Models',
        'path' => app_path('Domain/Models'),
        'with_factory' => true,
        'factory_path' => database_path('Domain/Factories'),
        'with_policy' => true,
        'policy_path' => app_path('Domain/Policies'),
    ]);

    $model = $generator->generate('test_users', getTestSchema());

    expect(File::exists(app_path('Domain/Models/User.php')))->toBeTrue()
        ->and(File::exists(database_path('Domain/Factories/UserFactory.php')))->toBeTrue()
        ->and(File::exists(app_path('Domain/Policies/UserPolicy.php')))->toBeTrue();
});

test('it respects custom namespace structure', function () {
    $generator = createModelGenerator([
        'namespace' => 'App\\Domain\\Models\\Admin',
        'path' => app_path('Domain/Models/Admin'),
    ]);

    $model = $generator->generate('test_users', getTestSchema());
    $content = File::get(app_path('Domain/Models/Admin/User.php'));

    expect($content)
        ->toContain('namespace App\Domain\Models\Admin')
        ->toContain('use App\Domain\Models\Admin\User');
});
