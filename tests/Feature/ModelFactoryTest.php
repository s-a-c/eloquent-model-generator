<?php

use SAC\EloquentModelGenerator\ModelGenerator;
use Illuminate\Support\Facades\File;

test('it generates model factory', function () {
    $generator = createModelGenerator([
        'with_factory' => true
    ]);

    $model = $generator->generate('test_users', getTestSchema());
    $factoryPath = database_path('factories/UserFactory.php');

    expect(File::exists($factoryPath))->toBeTrue()
        ->and(File::get($factoryPath))
        ->toContain('namespace Database\Factories')
        ->toContain('class UserFactory extends Factory')
        ->toContain('public function definition()')
        ->toContain("'name' => fake()->name")
        ->toContain("'email' => fake()->unique()->safeEmail");
});

test('it generates model factory with custom definition', function () {
    $generator = createModelGenerator([
        'with_factory' => true,
        'factory_definition' => [
            'name' => "fake()->name('female')",
            'status' => "fake()->randomElement(['active', 'inactive'])",
        ]
    ]);

    $model = $generator->generate('test_users', getTestSchema());
    $factoryContent = File::get(database_path('factories/UserFactory.php'));

    expect($factoryContent)
        ->toContain("'name' => fake()->name('female')")
        ->toContain("'status' => fake()->randomElement(['active', 'inactive'])");
});
