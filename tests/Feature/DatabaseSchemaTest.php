<?php

use Illuminate\Support\Facades\Schema;
use SAC\EloquentModelGenerator\Database\SchemaAnalyzer;

test('it correctly analyzes table schema', function () {
    // Create test table
    Schema::create('test_users', function ($table) {
        $table->id();
        $table->string('name');
        $table->string('email')->unique();
        $table->timestamps();
    });

    $analyzer = new SchemaAnalyzer();
    $schema = $analyzer->analyze('test_users');

    expect($schema)
        ->toHaveKey('columns')
        ->toHaveKey('indexes')
        ->and($schema['columns'])
        ->toHaveCount(4)
        ->sequence(
            fn($column) => $column->toBe('id'),
            fn($column) => $column->toBe('name'),
            fn($column) => $column->toBe('email'),
            fn($column) => $column->toBe('created_at')
        );
});

test('it correctly identifies foreign keys', function () {
    Schema::create('test_posts', function ($table) {
        $table->id();
        $table->foreignId('user_id')->constrained('test_users');
        $table->string('title');
        $table->timestamps();
    });

    $analyzer = new SchemaAnalyzer();
    $schema = $analyzer->analyze('test_posts');

    expect($schema['relations'])
        ->toHaveCount(1)
        ->and($schema['relations'][0])
        ->toMatchArray([
            'type' => 'belongsTo',
            'name' => 'user',
            'foreign_key' => 'user_id',
            'parent_table' => 'test_users'
        ]);
});
