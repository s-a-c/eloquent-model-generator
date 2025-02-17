<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests\Feature\Domain\Service;

use SAC\EloquentModelGenerator\Model\ModelDefinition;
use SAC\EloquentModelGenerator\Domain\Service\ModelTemplateService;

test('generates basic model class', function () {
    $model = new ModelDefinition(
        'User',
        'App\\Models',
        'users',
        ['id' => ['type' => 'integer']]
    );

    $service = new ModelTemplateService();
    $content = $service->generateContent($model);

    expect($content)
        ->toContain('declare(strict_types=1);')
        ->toContain('namespace App\\Models;')
        ->toContain('class User extends')
        ->toContain('protected $table = \'users\';')
        ->toContain('protected $fillable = [\'id\'];')
        ->toContain('protected $casts = [')
        ->toContain('\'id\' => \'integer\'');
});

test('generates model with relations', function () {
    $model = new ModelDefinition(
        'User',
        'App\\Models',
        'users',
        ['id' => ['type' => 'integer']],
        [
            'posts' => [
                'type' => 'hasMany',
                'model' => 'Post',
                'foreign_key' => 'user_id',
                'local_key' => 'id'
            ]
        ]
    );

    $service = new ModelTemplateService();
    $content = $service->generateContent($model);

    expect($content)
        ->toContain('use Illuminate\\Database\\Eloquent\\Relations\\HasMany;')
        ->toContain('public function posts(): HasMany')
        ->toContain('return $this->hasMany(Post::class, \'user_id\', \'id\');');
});

test('generates model with various column types', function () {
    $model = new ModelDefinition(
        'Product',
        'App\\Models',
        'products',
        [
            'id' => ['type' => 'integer'],
            'name' => ['type' => 'string'],
            'price' => ['type' => 'decimal'],
            'is_active' => ['type' => 'boolean'],
            'created_at' => ['type' => 'datetime']
        ]
    );

    $service = new ModelTemplateService();
    $content = $service->generateContent($model);

    expect($content)
        ->toContain('\'id\' => \'integer\'')
        ->toContain('\'price\' => \'float\'')
        ->toContain('\'is_active\' => \'boolean\'')
        ->toContain('\'created_at\' => \'datetime\'');
});

test('generates model with belongs to many relation', function () {
    $model = new ModelDefinition(
        'User',
        'App\\Models',
        'users',
        ['id' => ['type' => 'integer']],
        [
            'roles' => [
                'type' => 'belongsToMany',
                'model' => 'Role',
                'foreign_key' => 'user_id',
                'local_key' => 'role_id',
                'pivot_table' => 'role_user'
            ]
        ]
    );

    $service = new ModelTemplateService();
    $content = $service->generateContent($model);

    expect($content)
        ->toContain('use Illuminate\\Database\\Eloquent\\Relations\\BelongsToMany;')
        ->toContain('public function roles(): BelongsToMany')
        ->toContain('return $this->belongsToMany(Role::class, \'role_user\', \'user_id\', \'role_id\');');
});
