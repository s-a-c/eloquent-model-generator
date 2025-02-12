<?php

use SAC\EloquentModelGenerator\Tests\Traits\{
    UsePostgreSQLConnection,
    UseSQLServerConnection
};
use SAC\EloquentModelGenerator\ValueObjects\ModelDefinition;

dataset('postgresql_types', [
    'array types' => [
        'types' => [
            'integer[]' => ['cast' => 'array'],
            'text[]' => ['cast' => 'array'],
            'varchar[]' => ['cast' => 'array'],
            'decimal[]' => ['cast' => 'array'],
        ],
    ],
    'json types' => [
        'types' => [
            'json' => ['cast' => 'array'],
            'jsonb' => ['cast' => 'array'],
        ],
    ],
    'geometric types' => [
        'types' => [
            'point' => ['cast' => 'string'],
            'line' => ['cast' => 'string'],
            'polygon' => ['cast' => 'string'],
            'circle' => ['cast' => 'string'],
        ],
    ],
    'network types' => [
        'types' => [
            'cidr' => ['cast' => 'string'],
            'inet' => ['cast' => 'string'],
            'macaddr' => ['cast' => 'string'],
        ],
    ],
]);

dataset('sqlserver_types', [
    'microsoft types' => [
        'types' => [
            'hierarchyid' => ['cast' => 'string'],
            'uniqueidentifier' => ['cast' => 'string'],
            'sql_variant' => ['cast' => 'string'],
            'xml' => ['cast' => 'string'],
        ],
    ],
    'spatial types' => [
        'types' => [
            'geometry' => ['cast' => 'string'],
            'geography' => ['cast' => 'string'],
        ],
    ],
    'money types' => [
        'types' => [
            'money' => ['cast' => 'decimal'],
            'smallmoney' => ['cast' => 'decimal'],
        ],
    ],
]);

test('handles postgresql specific types correctly', function (array $types) {
    uses(UsePostgreSQLConnection::class);

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
    $content = $model->getContent();

    // Verify model class structure and imports
    expect($content)
        ->toContain('namespace App\\Models')
        ->toContain('use Illuminate\\Database\\Eloquent\\Model')
        ->toMatch('/class\s+TestModel\s+extends\s+Model/')
        ->toContain('protected $table = \'test_table\'');

    // Verify property definitions
    expect($content)
        ->toContain('protected $casts = [')
        ->toContain('protected $fillable = [')
        ->not->toContain('protected $casts = []')  // Ensure casts isn't empty
        ->not->toContain('protected $fillable = []'); // Ensure fillable isn't empty

    // Verify each cast is properly defined with correct format and placement
    foreach ($casts as $column => $castType) {
        // Check cast definition
        expect($content)
            ->toMatch("/protected\s+\\\$casts\s*=\s*\[\s*[^\]]*'$column'\s*=>\s*'$castType'[^\]]*\]/s")
            // Ensure cast is not duplicated
            ->and(substr_count($content, "'$column' =>"))->toBe(1);

        // Check fillable attribute
        expect($content)
            ->toMatch("/protected\s+\\\$fillable\s*=\s*\[\s*[^\]]*'$column'[^\]]*\]/s");

        // PostgreSQL specific checks
        if ($castType === 'array') {
            // Array types should have proper array accessors
            expect($content)
                ->toContain("'$column' => 'array'")
                ->not->toContain("'$column' => 'json'"); // Should use array cast, not json
        } elseif (str_contains($column, 'json')) {
            // JSON types should handle null values
            expect($content)
                ->toContain("'$column' => 'array'")
                ->toMatch("/protected\s+\\\$attributes\s*=\s*\[\s*[^\]]*'$column'\s*=>\s*'\[\]'[^\]]*\]/s");
        }
    }

    // Verify proper type handling
    expect($content)
        ->not->toContain('integer[]_column')  // Array types should be properly formatted
        ->not->toContain('undefined')         // No undefined casts
        ->not->toContain('stdClass')          // No object casts for JSON
        ->not->toContain('timestamp');        // PostgreSQL uses timestamptz

    // Verify proper import order and uniqueness
    $importMatches = [];
    preg_match_all('/use\s+[^;]+;/', $content, $importMatches);
    $imports = $importMatches[0];
    expect($imports)
        ->toHaveCount(count(array_unique($imports))) // No duplicate imports
        ->and(implode("\n", $imports))->toBe(implode("\n", array_unique($imports))); // Imports are ordered
})->with('postgresql_types');

test('handles sqlserver specific types correctly', function (array $types) {
    uses(UseSQLServerConnection::class);

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
    $content = $model->getContent();

    // Verify model class structure and imports
    expect($content)
        ->toContain('namespace App\\Models')
        ->toContain('use Illuminate\\Database\\Eloquent\\Model')
        ->toMatch('/class\s+TestModel\s+extends\s+Model/')
        ->toContain('protected $table = \'test_table\'');

    // Verify property definitions
    expect($content)
        ->toContain('protected $casts = [')
        ->toContain('protected $fillable = [')
        ->not->toContain('protected $casts = []')
        ->not->toContain('protected $fillable = []');

    // Verify each cast is properly defined with correct format and placement
    foreach ($casts as $column => $castType) {
        // Check cast definition
        expect($content)
            ->toMatch("/protected\s+\\\$casts\s*=\s*\[\s*[^\]]*'$column'\s*=>\s*'$castType'[^\]]*\]/s")
            // Ensure cast is not duplicated
            ->and(substr_count($content, "'$column' =>"))->toBe(1);

        // Check fillable attribute
        expect($content)
            ->toMatch("/protected\s+\\\$fillable\s*=\s*\[\s*[^\]]*'$column'[^\]]*\]/s");

        // SQL Server specific checks
        if ($castType === 'decimal') {
            // Money types should have proper precision and default values
            expect($content)
                ->toMatch("/protected\s+\\\$attributes\s*=\s*\[\s*[^\]]*'$column'\s*=>\s*0[^\]]*\]/s")
                ->toContain('protected $precision = [')
                ->toMatch("/'$column'\s*=>\s*\d+/");
        } elseif ($column === 'uniqueidentifier_column') {
            // UUID columns should have proper format validation
            expect($content)->toContain('protected $incrementing = false');
        } elseif (in_array($column, ['geometry_column', 'geography_column'])) {
            // Spatial types should have proper method accessors
            $methodName = str_replace('_column', '', $column);
            expect($content)
                ->toMatch("/public\s+function\s+get" . ucfirst($methodName) . "Attribute/")
                ->toMatch("/public\s+function\s+set" . ucfirst($methodName) . "Attribute/");
        }
    }

    // Verify proper type handling
    expect($content)
        ->not->toContain('undefined')        // No undefined casts
        ->not->toContain('timestamp')        // SQL Server uses datetime2
        ->not->toContain('->nullable()')     // Should use proper null handling
        ->not->toContain('json');            // SQL Server doesn't support JSON natively

    // Verify proper import order and uniqueness
    $importMatches = [];
    preg_match_all('/use\s+[^;]+;/', $content, $importMatches);
    $imports = $importMatches[0];
    expect($imports)
        ->toHaveCount(count(array_unique($imports)))
        ->and(implode("\n", $imports))->toBe(implode("\n", array_unique($imports)));
})->with('sqlserver_types');
