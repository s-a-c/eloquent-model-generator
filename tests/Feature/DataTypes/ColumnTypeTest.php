<?php

use SAC\EloquentModelGenerator\Tests\Traits\{
    UseMySQLConnection,
    UsePostgreSQLConnection,
    UseSQLiteConnection,
    UseSQLServerConnection
};
use SAC\EloquentModelGenerator\ValueObjects\ModelDefinition;

dataset('column_types', [
    'integer types' => [
        'types' => [
            'tinyint' => ['cast' => 'integer'],
            'smallint' => ['cast' => 'integer'],
            'mediumint' => ['cast' => 'integer'],
            'int' => ['cast' => 'integer'],
            'bigint' => ['cast' => 'integer'],
        ],
    ],
    'decimal types' => [
        'types' => [
            'decimal' => ['cast' => 'decimal'],
            'numeric' => ['cast' => 'decimal'],
            'float' => ['cast' => 'float'],
            'double' => ['cast' => 'float'],
            'money' => ['cast' => 'decimal'],
        ],
    ],
    'string types' => [
        'types' => [
            'char' => ['cast' => 'string'],
            'varchar' => ['cast' => 'string'],
            'text' => ['cast' => 'string'],
            'mediumtext' => ['cast' => 'string'],
            'longtext' => ['cast' => 'string'],
        ],
    ],
    'date types' => [
        'types' => [
            'date' => ['cast' => 'date'],
            'datetime' => ['cast' => 'datetime'],
            'timestamp' => ['cast' => 'datetime'],
            'time' => ['cast' => 'datetime'],
        ],
    ],
    'boolean types' => [
        'types' => [
            'boolean' => ['cast' => 'boolean'],
            'bit' => ['cast' => 'boolean'],
        ],
    ],
]);

test('casts column types correctly for each platform', function (array $types) {
    $columns = ['id' => ['type' => 'integer', 'autoIncrement' => true]];
    $casts = [];

    foreach ($types as $type => $config) {
        $columnName = "{$type}_column";
        $columns[$columnName] = ['type' => $type];
        $casts[$columnName] = $config['cast'];
    }

    $schema = [
        'columns' => $columns,
        'indexes' => [
            'primary' => ['type' => 'primary', 'columns' => ['id']],
        ],
    ];

    $definition = new ModelDefinition(
        className: 'TestModel',
        namespace: 'App\\Models',
        tableName: 'test_table',
        baseClass: 'Illuminate\\Database\\Eloquent\\Model'
    );

    $generator = createModelGenerator();
    $model = $generator->generate($definition, $schema);

    foreach ($casts as $column => $castType) {
        expect($model->getContent())
            ->toContain("\'{$column}\' => \'{$castType}\'")
            ->and($model->getContent())
            ->toContain("\'{$column}\'"); // Should be in fillable
    }
})->with('column_types');
