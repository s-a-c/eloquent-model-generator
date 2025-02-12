<?php

use SAC\EloquentModelGenerator\ModelGenerator;
use SAC\EloquentModelGenerator\Models\GeneratedModel;
use SAC\EloquentModelGenerator\ValueObjects\ModelDefinition;

test('it generates model with correct namespace and structure', function () {
    $generator = createModelGenerator(['namespace' => 'App\\Custom']);
    $definition = new ModelDefinition(
        className: 'User',
        namespace: 'App\\Custom',
        tableName: 'users',
        baseClass: 'Illuminate\\Database\\Eloquent\\Model'
    );
    $model = $generator->generate($definition, getTestSchema());

    expect($model)
        ->toBeInstanceOf(GeneratedModel::class)
        ->and($model->getNamespace())->toBeValidNamespace()->toBe('App\\Custom')
        ->and($model->getContent())
        ->toContain('namespace App\\Custom')
        ->toContain('use Illuminate\\Database\\Eloquent\\Model')
        ->toMatch('/class\s+User\s+extends\s+Model/')
        ->toContain('protected $table = \'users\'')
        ->toContain('protected $fillable = [')
        ->toContain('protected $casts = [');
});

test('it generates model with correct class name and attributes', function () {
    $generator = createModelGenerator();
    $definition = new ModelDefinition(
        className: 'User',
        namespace: 'App\\Models',
        tableName: 'users',
        baseClass: 'Illuminate\\Database\\Eloquent\\Model'
    );
    $model = $generator->generate($definition, getTestSchema());

    expect($model)
        ->toBeInstanceOf(GeneratedModel::class)
        ->and($model->getClassName())->toBeValidClassName()->toBe('User')
        ->and($model->getContent())
        ->toContain('class User extends Model')
        ->toContain('protected $fillable = [')
        ->toContain('\'name\'')
        ->toContain('\'email\'')
        ->toContain('protected $casts = [')
        ->toContain('\'created_at\' => \'datetime\'')
        ->toContain('\'updated_at\' => \'datetime\'');

    // Verify proper import order and uniqueness
    $importMatches = [];
    preg_match_all('/use\s+[^;]+;/', $model->getContent(), $importMatches);
    $imports = $importMatches[0];
    expect($imports)
        ->toHaveCount(count(array_unique($imports)))
        ->and(implode("\n", $imports))->toBe(implode("\n", array_unique($imports)));
});

test('it generates model with proper table definition', function () {
    $generator = createModelGenerator();
    $definition = new ModelDefinition(
        className: 'UserProfile',
        namespace: 'App\\Models',
        tableName: 'user_profiles',
        baseClass: 'Illuminate\\Database\\Eloquent\\Model'
    );
    $model = $generator->generate($definition, getTestSchema());

    expect($model)
        ->toBeInstanceOf(GeneratedModel::class)
        ->and($model->getClassName())->toBe('UserProfile')
        ->and($model->getTableName())->toBe('user_profiles')
        ->and($model->getContent())
        ->toContain('protected $table = \'user_profiles\'')
        ->not->toContain('protected $table = \'user_profile\''); // Should not be singularized
});

test('it handles custom primary key and timestamps', function () {
    $schema = array_merge(getTestSchema(), [
        'primary_key' => 'uuid',
        'timestamps' => false,
    ]);

    $generator = createModelGenerator();
    $definition = new ModelDefinition(
        className: 'User',
        namespace: 'App\\Models',
        tableName: 'users',
        baseClass: 'Illuminate\\Database\\Eloquent\\Model'
    );
    $model = $generator->generate($definition, $schema);

    expect($model->getContent())
        ->toContain('protected $primaryKey = \'uuid\'')
        ->toContain('public $incrementing = false')
        ->toContain('public $timestamps = false')
        ->not->toContain('\'id\'')
        ->not->toContain('\'created_at\'')
        ->not->toContain('\'updated_at\'');
});

test('it generates proper docblock annotations', function () {
    $generator = createModelGenerator();
    $definition = new ModelDefinition(
        className: 'User',
        namespace: 'App\\Models',
        tableName: 'users',
        baseClass: 'Illuminate\\Database\\Eloquent\\Model'
    );
    $model = $generator->generate($definition, getTestSchema());
    $content = $model->getContent();

    // Check class docblock
    expect($content)
        ->toMatch('/\/\*\*[^*]*\*\s*@property\s+int\s+\$id\b/')
        ->toMatch('/\*\s*@property\s+string\s+\$name\b/')
        ->toMatch('/\*\s*@property\s+string\s+\$email\b/')
        ->toMatch('/\*\s*@property\s+\\\\Carbon\\\\Carbon\s+\$created_at\b/')
        ->toMatch('/\*\s*@property\s+\\\\Carbon\\\\Carbon\s+\$updated_at\b/');

    // Check method docblocks
    expect($content)
        ->toMatch('/\/\*\*[^*]*\*\s*@return\s+array<string>\b/')  // getFillable()
        ->toMatch('/\/\*\*[^*]*\*\s*@return\s+string\b/');        // getTable()
});
