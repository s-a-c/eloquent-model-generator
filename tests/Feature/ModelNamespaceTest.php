<?php

use SAC\EloquentModelGenerator\ModelGenerator;
use SAC\EloquentModelGenerator\Models\GeneratedModel;
use SAC\EloquentModelGenerator\ValueObjects\ModelDefinition;
use Illuminate\Support\Facades\File;

test('it generates model in custom namespace with proper structure', function () {
    $generator = createModelGenerator([
        'namespace' => 'App\\Domain\\Models',
        'path' => app_path('Domain/Models')
    ]);

    $definition = new ModelDefinition(
        className: 'User',
        namespace: 'App\\Domain\\Models',
        tableName: 'test_users',
        baseClass: 'Illuminate\\Database\\Eloquent\\Model'
    );
    $model = $generator->generate($definition, getTestSchema());

    // Check model instance
    expect($model)
        ->toBeInstanceOf(GeneratedModel::class)
        ->and($model->getNamespace())->toBe('App\\Domain\\Models')
        ->and($model->getClassName())->toBe('User');

    // Check generated file content
    $content = File::get(app_path('Domain/Models/User.php'));
    expect($content)
        ->toContain('namespace App\\Domain\\Models')
        ->toContain('use Illuminate\\Database\\Eloquent\\Model')
        ->toMatch('/class\s+User\s+extends\s+Model/')
        ->toContain('protected $table = \'test_users\'')
        // Verify proper import order
        ->toMatch('/use\s+[^;]+;\s+use\s+[^;]+;\s+class/');

    // Verify directory structure
    expect(File::isDirectory(app_path('Domain/Models')))->toBeTrue();
});

test('it generates model with custom base class and proper inheritance', function () {
    $generator = createModelGenerator([
        'base_class' => 'App\\Base\\CustomModel'
    ]);

    $definition = new ModelDefinition(
        className: 'User',
        namespace: 'App\\Models',
        tableName: 'test_users',
        baseClass: 'App\\Base\\CustomModel'
    );
    $model = $generator->generate($definition, getTestSchema());

    // Check model instance
    expect($model)
        ->toBeInstanceOf(GeneratedModel::class)
        ->and($model->getBaseClass())->toBe('App\\Base\\CustomModel');

    // Check generated file content
    $content = File::get(app_path('Models/User.php'));
    expect($content)
        ->toContain('use App\\Base\\CustomModel;')
        ->toContain('class User extends CustomModel')
        ->not->toContain('use Illuminate\\Database\\Eloquent\\Model')
        ->not->toContain('extends Model');

    // Verify inheritance chain
    expect($content)
        ->toMatch('/use\s+App\\\\Base\\\\CustomModel;\s+class\s+User\s+extends\s+CustomModel/s');
});

test('it generates model with custom name while maintaining conventions', function () {
    $generator = createModelGenerator([
        'model_name' => 'CustomUser'
    ]);

    $definition = new ModelDefinition(
        className: 'CustomUser',
        namespace: 'App\\Models',
        tableName: 'test_users',
        baseClass: 'Illuminate\\Database\\Eloquent\\Model'
    );
    $model = $generator->generate($definition, getTestSchema());

    // Check model instance
    expect($model)
        ->toBeInstanceOf(GeneratedModel::class)
        ->and($model->getClassName())->toBe('CustomUser')
        ->and($model->getTableName())->toBe('test_users');

    // Check generated file content
    $content = File::get(app_path('Models/CustomUser.php'));
    expect($content)
        ->toContain('class CustomUser extends Model')
        ->toContain('protected $table = \'test_users\'')
        ->toMatch('/class\s+CustomUser\s+extends\s+Model\s+{/');

    // Verify proper PSR-4 autoloading structure
    expect(File::exists(app_path('Models/CustomUser.php')))->toBeTrue();
});

test('it handles nested namespaces correctly', function () {
    $generator = createModelGenerator([
        'namespace' => 'App\\Domain\\Core\\Models',
        'path' => app_path('Domain/Core/Models')
    ]);

    $definition = new ModelDefinition(
        className: 'User',
        namespace: 'App\\Domain\\Core\\Models',
        tableName: 'test_users',
        baseClass: 'Illuminate\\Database\\Eloquent\\Model'
    );
    $model = $generator->generate($definition, getTestSchema());

    // Check model instance
    expect($model)
        ->toBeInstanceOf(GeneratedModel::class)
        ->and($model->getNamespace())->toBe('App\\Domain\\Core\\Models');

    // Check generated file content
    $content = File::get(app_path('Domain/Core/Models/User.php'));
    expect($content)
        ->toContain('namespace App\\Domain\\Core\\Models')
        ->toMatch('/namespace\s+App\\\\Domain\\\\Core\\\\Models;\s+use\s+/');

    // Verify directory structure
    expect(File::isDirectory(app_path('Domain/Core/Models')))->toBeTrue();
    expect(File::exists(app_path('Domain/Core/Models/User.php')))->toBeTrue();
});
