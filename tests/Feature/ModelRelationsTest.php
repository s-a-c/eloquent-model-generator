<?php

use SAC\EloquentModelGenerator\ModelGenerator;
use SAC\EloquentModelGenerator\Models\GeneratedModel;
use SAC\EloquentModelGenerator\ValueObjects\ModelDefinition;
use Illuminate\Database\Eloquent\Relations;

test('it generates model with custom relation names and proper method definitions', function () {
    $generator = createModelGenerator([
        'relations' => [
            'test_posts' => [
                'name' => 'articles',
                'type' => 'hasMany',
                'foreign_key' => 'user_id',
                'local_key' => 'id'
            ]
        ]
    ]);

    $definition = new ModelDefinition(
        className: 'User',
        namespace: 'App\\Models',
        tableName: 'test_users',
        baseClass: 'Illuminate\\Database\\Eloquent\\Model'
    );
    $model = $generator->generate($definition, getTestSchema());

    // Check model instance
    expect($model)
        ->toBeInstanceOf(GeneratedModel::class);

    // Check relation method
    expect($model->getContent())
        ->toContain('public function articles()')
        ->toContain('return $this->hasMany(Post::class')
        ->toContain('\'user_id\'')
        ->toContain('\'id\'');

    // Verify proper imports
    expect($model->getContent())
        ->toContain('use Illuminate\\Database\\Eloquent\\Relations\\HasMany')
        ->toContain('use App\\Models\\Post');

    // Verify method docblock
    expect($model->getContent())
        ->toMatch('/\/\*\*[^*]*\*\s*@return\s+\\\\Illuminate\\\\Database\\\\Eloquent\\\\Relations\\\\HasMany/')
        ->toMatch('/\*\s*@return\s+\\\\Illuminate\\\\Database\\\\Eloquent\\\\Relations\\\\HasMany<Post>/');
});

test('it generates model with custom relation types and proper return types', function () {
    $generator = createModelGenerator([
        'relations' => [
            'test_posts' => [
                'type' => 'hasOne',
                'foreign_key' => 'user_id',
                'local_key' => 'id'
            ]
        ]
    ]);

    $definition = new ModelDefinition(
        className: 'User',
        namespace: 'App\\Models',
        tableName: 'test_users',
        baseClass: 'Illuminate\\Database\\Eloquent\\Model'
    );
    $model = $generator->generate($definition, getTestSchema());

    // Check model instance and basic content
    expect($model)
        ->toBeInstanceOf(GeneratedModel::class)
        ->and($model->getContent())
        ->toContain('public function post()')
        ->toContain('return $this->hasOne(Post::class');

    // Verify proper imports and return type
    expect($model->getContent())
        ->toContain('use Illuminate\\Database\\Eloquent\\Relations\\HasOne')
        ->toMatch('/public\s+function\s+post\(\):\s+Relations\\\\HasOne/');

    // Verify method structure
    expect($model->getContent())
        ->toMatch('/public\s+function\s+post\(\)[^{]*\{[^}]*return\s+\$this->hasOne\([^)]+\);\s*\}/s');
});

test('it generates model with custom relation class and proper namespace handling', function () {
    $generator = createModelGenerator([
        'relations' => [
            'test_posts' => [
                'model' => 'App\\Domain\\Models\\Article',
                'type' => 'hasMany'
            ]
        ]
    ]);

    $definition = new ModelDefinition(
        className: 'User',
        namespace: 'App\\Models',
        tableName: 'test_users',
        baseClass: 'Illuminate\\Database\\Eloquent\\Model'
    );
    $model = $generator->generate($definition, getTestSchema());

    // Check model instance
    expect($model)
        ->toBeInstanceOf(GeneratedModel::class);

    // Verify relation definition
    expect($model->getContent())
        ->toContain('use App\\Domain\\Models\\Article')
        ->toContain('return $this->hasMany(Article::class')
        ->not->toContain('App\\Domain\\Models\\Article::class'); // Should use imported class

    // Verify import order
    $importMatches = [];
    preg_match_all('/use\s+[^;]+;/', $model->getContent(), $importMatches);
    $imports = $importMatches[0];
    expect($imports)
        ->toHaveCount(count(array_unique($imports)))
        ->and(implode("\n", $imports))->toBe(implode("\n", array_unique($imports)));
});

test('it generates model with proper polymorphic relations', function () {
    $generator = createModelGenerator([
        'relations' => [
            'images' => [
                'type' => 'morphMany',
                'model' => 'App\\Models\\Image',
                'name' => 'images',
                'morphable' => true
            ]
        ]
    ]);

    $definition = new ModelDefinition(
        className: 'Post',
        namespace: 'App\\Models',
        tableName: 'test_posts',
        baseClass: 'Illuminate\\Database\\Eloquent\\Model'
    );
    $model = $generator->generate($definition, getTestSchema());

    // Check model instance
    expect($model)
        ->toBeInstanceOf(GeneratedModel::class);

    // Verify morphable relation
    expect($model->getContent())
        ->toContain('use Illuminate\\Database\\Eloquent\\Relations\\MorphMany')
        ->toContain('public function images()')
        ->toContain('return $this->morphMany(Image::class')
        ->toContain('\'imageable\'');

    // Verify proper docblock
    expect($model->getContent())
        ->toMatch('/\/\*\*[^*]*\*\s*@return\s+\\\\Illuminate\\\\Database\\\\Eloquent\\\\Relations\\\\MorphMany/')
        ->toMatch('/\*\s*@return\s+\\\\Illuminate\\\\Database\\\\Eloquent\\\\Relations\\\\MorphMany<Image>/');
});

test('it generates model with proper pivot table attributes', function () {
    $generator = createModelGenerator([
        'relations' => [
            'test_roles' => [
                'type' => 'belongsToMany',
                'model' => 'App\\Models\\Role',
                'pivot_table' => 'role_user',
                'pivot_columns' => ['expires_at', 'active'],
                'pivot_timestamps' => true
            ]
        ]
    ]);

    $definition = new ModelDefinition(
        className: 'User',
        namespace: 'App\\Models',
        tableName: 'test_users',
        baseClass: 'Illuminate\\Database\\Eloquent\\Model'
    );
    $model = $generator->generate($definition, getTestSchema());

    // Check model instance
    expect($model)
        ->toBeInstanceOf(GeneratedModel::class);

    // Verify pivot relation
    expect($model->getContent())
        ->toContain('use Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany')
        ->toContain('public function roles()')
        ->toContain('return $this->belongsToMany(Role::class')
        ->toContain('->withPivot(\'expires_at\', \'active\')')
        ->toContain('->withTimestamps()');

    // Verify pivot attributes
    expect($model->getContent())
        ->toMatch('/protected\s+\$casts\s*=\s*\[/')
        ->toMatch('/\'pivot\.expires_at\'\s*=>\s*\'datetime\'/')
        ->toMatch('/\'pivot\.active\'\s*=>\s*\'boolean\'/');

    // Verify proper method chaining
    expect($model->getContent())
        ->toMatch('/return\s+\$this->belongsToMany\([^;]+\)[\s\n]*->withPivot\([^;]+\)[\s\n]*->withTimestamps\(\);/s');
});
