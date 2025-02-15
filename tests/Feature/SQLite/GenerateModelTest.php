<?php

use SAC\EloquentModelGenerator\Models\GeneratedModel;
use SAC\EloquentModelGenerator\Tests\Support\Traits\WithSQLiteTesting;
use SAC\EloquentModelGenerator\ValueObjects\ModelDefinition;

uses(WithSQLiteTesting::class);

test('generates model from sqlite table with all column types', function () {
    $schema = [
        'columns' => [
            'id' => ['type' => 'integer', 'autoIncrement' => true],
            'name' => ['type' => 'string'],
            'email' => ['type' => 'string'],
            'created_at' => ['type' => 'timestamp'],
            'updated_at' => ['type' => 'timestamp'],
        ],
        'indexes' => [
            'primary' => ['type' => 'primary', 'columns' => ['id']],
            'email_unique' => ['type' => 'unique', 'columns' => ['email']],
        ],
    ];

    $generator = createModelGenerator();
    $definition = new ModelDefinition(
        className: 'User',
        namespace: 'App\\Models',
        tableName: 'users',
        baseClass: 'Illuminate\\Database\\Eloquent\\Model'
    );

    $model = $generator->generate($definition, $schema);

    expect($model)
        ->toBeInstanceOf(GeneratedModel::class)
        ->and($model->getClassName())->toBe('User')
        ->and($model->getNamespace())->toBe('App\\Models')
        ->and($model->getContent())
        ->toContain('protected $table = \'users\'')
        ->toContain('protected $fillable = [')
        ->toContain('\'name\'')
        ->toContain('\'email\'');
});

test('handles sqlite-specific types correctly', function () {
    $schema = [
        'columns' => [
            'id' => ['type' => 'integer', 'autoIncrement' => true],
            'numeric_col' => ['type' => 'numeric'],
            'blob_data' => ['type' => 'blob'],
            'created_at' => ['type' => 'datetime'],
            'updated_at' => ['type' => 'datetime'],
        ],
        'indexes' => [
            'primary' => ['type' => 'primary', 'columns' => ['id']],
        ],
    ];

    $generator = createModelGenerator();
    $definition = new ModelDefinition(
        className: 'TestModel',
        namespace: 'App\\Models',
        tableName: 'test_table',
        baseClass: 'Illuminate\\Database\\Eloquent\\Model'
    );

    $model = $generator->generate($definition, $schema);

    expect($model->getContent())
        ->toContain('protected $casts = [')
        ->toContain('\'numeric_col\' => \'decimal\'')
        ->toContain('\'blob_data\' => \'binary\'')
        ->toContain('\'created_at\' => \'datetime\'')
        ->toContain('\'updated_at\' => \'datetime\'');
});

test('handles foreign key constraints with sqlite', function () {
    $schema = [
        'columns' => [
            'id' => ['type' => 'integer', 'autoIncrement' => true],
            'user_id' => ['type' => 'integer'],
            'title' => ['type' => 'string'],
            'created_at' => ['type' => 'datetime'],
            'updated_at' => ['type' => 'datetime'],
        ],
        'indexes' => [
            'primary' => ['type' => 'primary', 'columns' => ['id']],
        ],
        'relations' => [
            [
                'name' => 'user',
                'type' => 'belongsTo',
                'foreign_key' => 'user_id',
                'parent_table' => 'users',
            ],
        ],
    ];

    $generator = createModelGenerator();
    $definition = new ModelDefinition(
        className: 'Post',
        namespace: 'App\\Models',
        tableName: 'posts',
        baseClass: 'Illuminate\\Database\\Eloquent\\Model',
        withRelationships: true
    );

    $model = $generator->generate($definition, $schema);

    expect($model->getContent())
        ->toContain('public function user()')
        ->toContain('return $this->belongsTo(User::class');
});

test('handles virtual columns correctly', function () {
    $schema = [
        'columns' => [
            'id' => ['type' => 'integer', 'autoIncrement' => true],
            'price' => ['type' => 'decimal'],
            'tax_rate' => ['type' => 'decimal'],
            'total_price' => [
                'type' => 'decimal',
                'virtual' => true,
                'expression' => 'price * (1 + tax_rate)',
            ],
            'created_at' => ['type' => 'datetime'],
        ],
        'indexes' => [
            'primary' => ['type' => 'primary', 'columns' => ['id']],
        ],
    ];

    $generator = createModelGenerator();
    $definition = new ModelDefinition(
        className: 'Product',
        namespace: 'App\\Models',
        tableName: 'products',
        baseClass: 'Illuminate\\Database\\Eloquent\\Model'
    );

    $model = $generator->generate($definition, $schema);

    expect($model->getContent())
        ->toContain('protected $virtual = [')
        ->toContain('\'total_price\'')
        ->not->toContain('\'total_price\',')  // Should not be in fillable
        ->toContain('public function getTotalPriceAttribute()')
        ->toContain('return $this->price * (1 + $this->tax_rate)');
});

test('handles check constraints correctly', function () {
    $schema = [
        'columns' => [
            'id' => ['type' => 'integer', 'autoIncrement' => true],
            'age' => [
                'type' => 'integer',
                'check' => 'age >= 0 AND age <= 150',
            ],
            'status' => [
                'type' => 'string',
                'check' => "status IN ('active', 'inactive', 'pending')",
            ],
            'created_at' => ['type' => 'datetime'],
        ],
        'indexes' => [
            'primary' => ['type' => 'primary', 'columns' => ['id']],
        ],
    ];

    $generator = createModelGenerator();
    $definition = new ModelDefinition(
        className: 'User',
        namespace: 'App\\Models',
        tableName: 'users',
        baseClass: 'Illuminate\\Database\\Eloquent\\Model'
    );

    $model = $generator->generate($definition, $schema);

    expect($model->getContent())
        ->toContain('protected function validateAge($value)')
        ->toContain('return $value >= 0 && $value <= 150')
        ->toContain('protected function validateStatus($value)')
        ->toContain('return in_array($value, [\'active\', \'inactive\', \'pending\'])')
        ->toContain('protected static function boot()')
        ->toContain('parent::boot()')
        ->toContain('static::saving(function ($model) {');
});
