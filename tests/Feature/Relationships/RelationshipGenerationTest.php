<?php

use SAC\EloquentModelGenerator\Tests\Support\Traits\WithSQLiteTesting;
use SAC\EloquentModelGenerator\ValueObjects\ModelDefinition;

uses(WithSQLiteTesting::class);

dataset('relationships', [
    'belongs_to' => [
        'relation' => [
            'type' => 'belongsTo',
            'foreign_key' => 'user_id',
            'parent_table' => 'users',
            'parent_model' => 'User',
        ],
        'expected_method' => 'public function user()',
        'expected_relation' => 'return $this->belongsTo(User::class)',
    ],
    'has_many' => [
        'relation' => [
            'type' => 'hasMany',
            'foreign_key' => 'post_id',
            'related_table' => 'comments',
            'related_model' => 'Comment',
        ],
        'expected_method' => 'public function comments()',
        'expected_relation' => 'return $this->hasMany(Comment::class)',
    ],
    'many_to_many' => [
        'relation' => [
            'type' => 'belongsToMany',
            'related_table' => 'roles',
            'related_model' => 'Role',
            'pivot_table' => 'role_user',
        ],
        'expected_method' => 'public function roles()',
        'expected_relation' => 'return $this->belongsToMany(Role::class)',
    ],
    'has_one' => [
        'relation' => [
            'type' => 'hasOne',
            'foreign_key' => 'user_id',
            'related_table' => 'profiles',
            'related_model' => 'Profile',
        ],
        'expected_method' => 'public function profile()',
        'expected_relation' => 'return $this->hasOne(Profile::class)',
    ],
]);

test('generates correct relationship methods', function (array $relation, string $expected_method, string $expected_relation) {
    $schema = [
        'columns' => [
            'id' => ['type' => 'integer', 'autoIncrement' => true],
        ],
        'relations' => [$relation],
    ];

    $definition = new ModelDefinition(
        className: 'TestModel',
        namespace: 'App\\Models',
        tableName: 'test_table',
        baseClass: 'Illuminate\\Database\\Eloquent\\Model',
        withRelationships: true
    );

    $generator = createModelGenerator();
    $model = $generator->generate($definition, $schema);
    $content = $model->getContent();

    // Verify class structure and imports
    expect($content)
        ->toContain('namespace App\\Models')
        ->toContain('use Illuminate\\Database\\Eloquent\\Model')
        ->toContain('use Illuminate\\Database\\Eloquent\\Relations\\')
        ->toMatch('/class\s+TestModel\s+extends\s+Model/');

    // Verify method structure and visibility
    expect($content)
        ->toMatch('/public\s+function\s+'.preg_quote(str_replace('public function ', '', $expected_method), '/').'/')
        ->toMatch('/\s+'.preg_quote($expected_method, '/').'\s*\{/');

    // Verify relation definition and return type
    $relationClass = ucfirst(str_replace(['$this->', '(', ')'], '', $expected_relation));
    expect($content)
        ->toContain($expected_relation)
        ->toMatch('/\s+'.preg_quote($expected_relation, '/').'/')
        ->toContain("use Illuminate\\Database\\Eloquent\\Relations\\$relationClass");

    // Verify proper use statements for related models
    if (isset($relation['related_model'])) {
        expect($content)
            ->toContain("use App\\Models\\{$relation['related_model']}")
            ->toContain("{$relation['related_model']}::class");
    }
    if (isset($relation['parent_model'])) {
        expect($content)
            ->toContain("use App\\Models\\{$relation['parent_model']}")
            ->toContain("{$relation['parent_model']}::class");
    }

    // Verify foreign key definitions and constraints
    if (isset($relation['foreign_key'])) {
        expect($content)
            ->toContain($relation['foreign_key'])
            ->toMatch('/\$this->[^;]+\([^)]*\''.$relation['foreign_key'].'\'[^)]*\)/');
    }

    // Verify proper method formatting
    expect($content)
        ->not->toContain('return$this')  // No spacing issues
        ->not->toContain(';;')           // No double semicolons
        ->not->toContain('(,')           // No empty parameters
        ->not->toContain('::class,)')    // No trailing comma in class reference
        ->not->toContain('return;');     // No empty returns

    // Verify proper import order
    $importMatches = [];
    preg_match_all('/use\s+[^;]+;/', $content, $importMatches);
    $imports = $importMatches[0];
    expect($imports)
        ->toHaveCount(count(array_unique($imports)))
        ->and(implode("\n", $imports))->toBe(implode("\n", array_unique($imports)));
})->with('relationships');

test('generates polymorphic relationships', function () {
    $schema = [
        'columns' => [
            'id' => ['type' => 'integer', 'autoIncrement' => true],
            'imageable_id' => ['type' => 'integer'],
            'imageable_type' => ['type' => 'string'],
        ],
        'relations' => [
            [
                'type' => 'morphTo',
                'name' => 'imageable',
            ],
        ],
    ];

    $definition = new ModelDefinition(
        className: 'Image',
        namespace: 'App\\Models',
        tableName: 'images',
        baseClass: 'Illuminate\\Database\\Eloquent\\Model',
        withRelationships: true
    );

    $generator = createModelGenerator();
    $model = $generator->generate($definition, $schema);
    $content = $model->getContent();

    // Verify class structure and imports
    expect($content)
        ->toContain('use Illuminate\\Database\\Eloquent\\Model')
        ->toContain('use Illuminate\\Database\\Eloquent\\Relations\\MorphTo')
        ->toMatch('/class\s+Image\s+extends\s+Model/');

    // Verify method structure and implementation
    expect($content)
        ->toMatch('/public\s+function\s+imageable\(\)/')
        ->toMatch('/return\s+\$this->morphTo\(\)/');

    // Verify morphable columns and types
    expect($content)
        ->toContain('imageable_id')
        ->toContain('imageable_type')
        ->toMatch('/protected\s+\$casts\s*=\s*\[/')
        ->toMatch('/\'imageable_id\'\s*=>\s*\'integer\'/')
        ->toMatch('/\'imageable_type\'\s*=>\s*\'string\'/');

    // Verify proper formatting and naming
    expect($content)
        ->not->toContain('morphto')      // Incorrect casing
        ->not->toContain('Morphto')      // Incorrect casing
        ->not->toContain('morph_to')     // Incorrect naming
        ->not->toContain('return;')      // No empty returns
        ->not->toContain('morphTo();');  // No empty parameters if required

    // Verify proper docblock
    expect($content)
        ->toMatch('/\/\*\*[^*]*\*\s*@return\s+\\\\Illuminate\\\\Database\\\\Eloquent\\\\Relations\\\\MorphTo/');
});

test('generates relationships with custom pivot attributes', function () {
    $schema = [
        'columns' => [
            'id' => ['type' => 'integer', 'autoIncrement' => true],
        ],
        'relations' => [
            [
                'type' => 'belongsToMany',
                'related_table' => 'roles',
                'related_model' => 'Role',
                'pivot_table' => 'role_user',
                'pivot_columns' => ['expires_at', 'active'],
                'pivot_timestamps' => true,
            ],
        ],
    ];

    $definition = new ModelDefinition(
        className: 'User',
        namespace: 'App\\Models',
        tableName: 'users',
        baseClass: 'Illuminate\\Database\\Eloquent\\Model',
        withRelationships: true
    );

    $generator = createModelGenerator();
    $model = $generator->generate($definition, $schema);
    $content = $model->getContent();

    // Verify class structure and imports
    expect($content)
        ->toContain('use Illuminate\\Database\\Eloquent\\Model')
        ->toContain('use Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany')
        ->toContain('use App\\Models\\Role')
        ->toMatch('/class\s+User\s+extends\s+Model/');

    // Verify method structure and implementation
    expect($content)
        ->toMatch('/public\s+function\s+roles\(\)/')
        ->toMatch('/return\s+\$this->belongsToMany\(Role::class\)/');

    // Verify pivot table and columns
    expect($content)
        ->toContain("'role_user'")
        ->toContain("->withPivot('expires_at', 'active')")
        ->toContain('->withTimestamps()')
        ->not->toContain('role_users')     // Incorrect table name
        ->not->toContain('roles_users');   // Incorrect table name

    // Verify pivot attributes and timestamps
    expect($content)
        ->toMatch('/protected\s+\$casts\s*=\s*\[/')
        ->toMatch('/\'pivot\.expires_at\'\s*=>\s*\'datetime\'/')
        ->toMatch('/\'pivot\.active\'\s*=>\s*\'boolean\'/');

    // Verify proper method chaining
    $methodChainMatches = [];
    preg_match('/return\s+\$this->belongsToMany.*?;/s', $content, $methodChainMatches);
    expect($methodChainMatches[0])
        ->toContain('->withPivot(')
        ->toContain('->withTimestamps()')
        ->not->toContain(';;')           // No double semicolons
        ->not->toContain('->->')         // No double arrows
        ->not->toContain('withPivot()'); // No empty pivot columns

    // Verify proper docblock
    expect($content)
        ->toMatch('/\/\*\*[^*]*\*\s*@return\s+\\\\Illuminate\\\\Database\\\\Eloquent\\\\Relations\\\\BelongsToMany/');
});
