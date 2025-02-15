<?php

use SAC\EloquentModelGenerator\Models\GeneratedModel;
use SAC\EloquentModelGenerator\ValueObjects\ModelDefinition;

test('it generates model with custom fillable attributes and proper validation', function () {
    $generator = createModelGenerator([
        'fillable' => ['name', 'email', 'is_active'],
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
        ->toBeInstanceOf(GeneratedModel::class)
        ->and($model->getContent())
        ->toContain('protected $fillable = [')
        ->toContain('\'name\'')
        ->toContain('\'email\'')
        ->toContain('\'is_active\'')
        ->not->toContain('\'password\'')
        ->not->toContain('\'id\''); // Primary key should not be fillable

    // Verify fillable array format
    expect($model->getContent())
        ->toMatch('/protected\s+\$fillable\s*=\s*\[\s*[\'"]name[\'"]\s*,\s*[\'"]email[\'"]\s*,\s*[\'"]is_active[\'"]\s*\];/');

    // Verify no duplicates in fillable
    $fillableMatches = [];
    preg_match('/protected\s+\$fillable\s*=\s*\[(.*?)\];/s', $model->getContent(), $fillableMatches);
    $fillableItems = array_map('trim', explode(',', $fillableMatches[1] ?? ''));
    expect($fillableItems)->toHaveCount(count(array_unique($fillableItems)));
});

test('it generates model with custom casts and proper type handling', function () {
    $generator = createModelGenerator([
        'casts' => [
            'is_active' => 'boolean',
            'settings' => 'array',
            'price' => 'decimal:2',
            'metadata' => 'json',
            'options' => 'collection',
        ],
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
        ->toBeInstanceOf(GeneratedModel::class)
        ->and($model->getContent())
        ->toContain('protected $casts = [')
        ->toContain('\'is_active\' => \'boolean\'')
        ->toContain('\'settings\' => \'array\'')
        ->toContain('\'price\' => \'decimal:2\'')
        ->toContain('\'metadata\' => \'json\'')
        ->toContain('\'options\' => \'collection\'');

    // Verify cast definitions
    expect($model->getContent())
        ->toMatch('/protected\s+\$casts\s*=\s*\[/')
        ->not->toContain('datetime:') // Default datetime format should not be specified
        ->not->toContain('timestamp:') // Default timestamp format should not be specified
        ->not->toContain(';;')        // No double semicolons
        ->not->toContain(',,')        // No double commas
        ->not->toContain('[]');       // No empty arrays

    // Verify proper import for collection cast
    expect($model->getContent())
        ->toContain('use Illuminate\\Support\\Collection');

    // Verify no duplicate casts
    $castMatches = [];
    preg_match('/protected\s+\$casts\s*=\s*\[(.*?)\];/s', $model->getContent(), $castMatches);
    $castItems = array_map('trim', explode(',', $castMatches[1] ?? ''));
    expect($castItems)->toHaveCount(count(array_unique($castItems)));
});

test('it generates model with custom dates and proper Carbon handling', function () {
    $generator = createModelGenerator([
        'dates' => ['published_at', 'reviewed_at'],
        'date_format' => 'Y-m-d H:i:s.u',
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
        ->toBeInstanceOf(GeneratedModel::class)
        ->and($model->getContent())
        ->toContain('protected $dates = [')
        ->toContain('\'published_at\'')
        ->toContain('\'reviewed_at\'')
        ->toContain('protected $dateFormat = \'Y-m-d H:i:s.u\'');

    // Verify Carbon import and type hints
    expect($model->getContent())
        ->toContain('use Carbon\\Carbon')
        ->toMatch('/\*\s*@property\s+\\\\Carbon\\\\Carbon\s+\$published_at\b/')
        ->toMatch('/\*\s*@property\s+\\\\Carbon\\\\Carbon\s+\$reviewed_at\b/');

    // Verify date mutators
    expect($model->getContent())
        ->toMatch('/public\s+function\s+getPublishedAtAttribute/')
        ->toMatch('/public\s+function\s+setPublishedAtAttribute/');

    // Verify no duplicate dates
    $dateMatches = [];
    preg_match('/protected\s+\$dates\s*=\s*\[(.*?)\];/s', $model->getContent(), $dateMatches);
    $dateItems = array_map('trim', explode(',', $dateMatches[1] ?? ''));
    expect($dateItems)->toHaveCount(count(array_unique($dateItems)));
});

test('it handles attribute modifiers correctly', function () {
    $generator = createModelGenerator([
        'modifiers' => [
            'name' => 'trim|uppercase',
            'email' => 'trim|lowercase',
            'status' => 'uppercase',
        ],
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

    // Verify attribute modifiers
    expect($model->getContent())
        ->toMatch('/public\s+function\s+setNameAttribute/')
        ->toMatch('/public\s+function\s+setEmailAttribute/')
        ->toMatch('/public\s+function\s+setStatusAttribute/')
        ->toContain('strtoupper($value)')
        ->toContain('strtolower($value)')
        ->toContain('trim($value)');

    // Verify modifier order
    expect($model->getContent())
        ->toMatch('/trim.*strtoupper/s')  // trim should be applied before uppercase
        ->toMatch('/trim.*strtolower/s'); // trim should be applied before lowercase
});
