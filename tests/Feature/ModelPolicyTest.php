<?php

use SAC\EloquentModelGenerator\ModelGenerator;
use Illuminate\Support\Facades\File;

test('it generates model policy', function () {
    $generator = createModelGenerator([
        'with_policy' => true
    ]);

    $model = $generator->generate('test_users', getTestSchema());
    $policyPath = app_path('Policies/UserPolicy.php');

    expect(File::exists($policyPath))->toBeTrue()
        ->and(File::get($policyPath))
        ->toContain('namespace App\Policies')
        ->toContain('class UserPolicy')
        ->toContain('public function viewAny(User $user)')
        ->toContain('public function create(User $user)')
        ->toContain('public function update(User $user, User $model)');
});

test('it generates model policy with custom methods', function () {
    $generator = createModelGenerator([
        'with_policy' => true,
        'policy_methods' => [
            'publish' => 'return $user->isAdmin();',
            'archive' => 'return $user->can("archive_users");'
        ]
    ]);

    $model = $generator->generate('test_users', getTestSchema());
    $policyContent = File::get(app_path('Policies/UserPolicy.php'));

    expect($policyContent)
        ->toContain('public function publish(User $user)')
        ->toContain('return $user->isAdmin()')
        ->toContain('public function archive(User $user)')
        ->toContain('return $user->can("archive_users")');
});
