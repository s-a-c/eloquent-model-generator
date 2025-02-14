<?php

namespace SAC\EloquentModelGenerator\Tests\Performance\EdgeCases;

use SAC\EloquentModelGenerator\Tests\TestCase;
use SAC\EloquentModelGenerator\Tests\Support\Traits\WithPerformanceTests;
use SAC\EloquentModelGenerator\Tests\Support\Traits\MeasurePerformance;
use SAC\EloquentModelGenerator\Tests\Support\Factories\ModelFactory;

class ModelFactoryPerformanceTest extends TestCase {
    use WithPerformanceTests, MeasurePerformance;

    private ModelFactory $factory;

    protected function setUp(): void {
        parent::setUp();
        $this->factory = new ModelFactory();
        $this->initializePerformanceMeasurement();
    }

    /** @test */
    public function testuhandles_mass_model_definition_creation(): void {
        $this->assertPerformanceConstraints(
            maxDurationMs: 1000,
            maxMemoryBytes: 50 * 1024 * 1024,
            operation: function () {
                for ($i = 0; $i < 1000; $i++) {
                    $this->factory->definition("test_table_{$i}", [
                        'className' => "TestModel{$i}",
                        'namespace' => 'App\\Models\\Generated',
                        'withSoftDeletes' => $i % 2 === 0
                    ]);
                }
            },
            durationMessage: 'Should handle mass model definition creation efficiently',
            memoryMessage: 'Memory usage should be reasonable for mass definitions'
        );
    }

    /** @test */
    public function testuhandles_complex_relationship_definitions(): void {
        // Create a complex relationship graph
        $relationships = [];
        for ($i = 1; $i <= 100; $i++) {
            $relationships["relation_{$i}"] = [
                'type' => $i % 4 === 0 ? 'hasMany' : ($i % 4 === 1 ? 'hasOne' : ($i % 4 === 2 ? 'belongsTo' : 'belongsToMany')),
                'model' => "App\\Models\\Related{$i}",
                'foreignKey' => "related_{$i}_id",
                'localKey' => $i % 2 === 0 ? 'id' : "custom_id_{$i}",
                'pivot' => $i % 4 === 3 ? [
                    'table' => "pivot_table_{$i}",
                    'timestamps' => true,
                    'columns' => ['status', 'order']
                ] : null
            ];
        }

        $this->assertPerformanceConstraints(
            maxDurationMs: 500,
            maxMemoryBytes: 25 * 1024 * 1024,
            operation: fn() => $this->factory->relationshipSchema('test_table', $relationships),
            durationMessage: 'Should handle complex relationship definitions efficiently',
            memoryMessage: 'Memory usage should be reasonable for complex relationships'
        );
    }

    /** @test */
    public function testuhandles_nested_schema_definitions(): void {
        // Create deeply nested schema
        $schema = ['columns' => [], 'indexes' => [], 'relations' => []];

        // Add many columns with various types and constraints
        for ($i = 0; $i < 500; $i++) {
            $schema['columns']["field_{$i}"] = [
                'type' => $i % 10 === 0 ? 'json' : ($i % 10 === 1 ? 'timestamp' : 'string'),
                'nullable' => $i % 2 === 0,
                'default' => $i % 3 === 0 ? "default_{$i}" : null,
                'unique' => $i % 20 === 0,
                'index' => $i % 5 === 0,
                'comment' => "Column {$i} comment"
            ];
        }

        // Add complex indexes
        for ($i = 0; $i < 50; $i++) {
            $schema['indexes']["index_{$i}"] = [
                'type' => $i % 3 === 0 ? 'unique' : 'index',
                'columns' => array_map(
                    fn($j) => "field_{$j}",
                    range($i * 10, $i * 10 + ($i % 5))
                )
            ];
        }

        $this->assertPerformanceConstraints(
            maxDurationMs: 1000,
            maxMemoryBytes: 50 * 1024 * 1024,
            operation: fn() => $this->factory->schema($schema),
            durationMessage: 'Should handle nested schema definitions efficiently',
            memoryMessage: 'Memory usage should be reasonable for nested schemas'
        );
    }

    /** @test */
    public function testuhandles_rapid_schema_modifications(): void {
        $baseSchema = $this->factory->basicSchema('test_table');

        $this->assertMemoryStability(
            operation: function () use ($baseSchema) {
                $schema = $baseSchema;
                for ($i = 0; $i < 100; $i++) {
                    // Modify schema
                    $schema['columns']["field_{$i}"] = [
                        'type' => 'string',
                        'nullable' => true
                    ];
                    $schema['indexes']["index_{$i}"] = [
                        'type' => 'index',
                        'columns' => ["field_{$i}"]
                    ];
                    // Normalize schema
                    $this->factory->schema($schema);
                }
            },
            iterations: 10,
            maxGrowthMb: 0.5
        );
    }

    /** @test */
    public function testuhandles_concurrent_factory_operations(): void {
        $operations = [];
        for ($i = 0; $i < 100; $i++) {
            $operations[] = function () use ($i) {
                match ($i % 4) {
                    0 => $this->factory->definition("table_{$i}"),
                    1 => $this->factory->basicSchema("table_{$i}"),
                    2 => $this->factory->softDeletesSchema("table_{$i}"),
                    3 => $this->factory->relationshipSchema("table_{$i}", [
                        'relation' => ['type' => 'hasMany', 'model' => 'App\\Models\\Related']
                    ])
                };
            };
        }

        $this->assertPerformanceConstraints(
            maxDurationMs: 2000,
            maxMemoryBytes: 100 * 1024 * 1024,
            operation: function () use ($operations) {
                array_map(fn($op) => $op(), $operations);
            },
            durationMessage: 'Should handle concurrent factory operations efficiently',
            memoryMessage: 'Memory usage should be reasonable for concurrent operations'
        );
    }

    /** @test */
    public function testuhandles_schema_inheritance_chain(): void {
        $schemas = [];
        $currentSchema = $this->factory->basicSchema('base_table');

        $this->assertPerformanceConstraints(
            maxDurationMs: 1000,
            maxMemoryBytes: 50 * 1024 * 1024,
            operation: function () use (&$schemas, $currentSchema) {
                // Create inheritance chain of schemas
                for ($i = 0; $i < 50; $i++) {
                    $currentSchema = array_merge_recursive($currentSchema, [
                        'columns' => [
                            "inherited_field_{$i}" => [
                                'type' => 'string',
                                'nullable' => true
                            ]
                        ],
                        'indexes' => [
                            "inherited_index_{$i}" => [
                                'type' => 'index',
                                'columns' => ["inherited_field_{$i}"]
                            ]
                        ]
                    ]);
                    $schemas[] = $this->factory->schema($currentSchema);
                }
            },
            durationMessage: 'Should handle schema inheritance chain efficiently',
            memoryMessage: 'Memory usage should be reasonable for inheritance chains'
        );
    }

    /** @test */
    public function testuhandles_extreme_polymorphic_relationships(): void {
        $relationships = [];
        // Create a complex polymorphic relationship network
        for ($i = 1; $i <= 50; $i++) {
            $relationships["morphable_{$i}"] = [
                'type' => 'morphTo',
                'name' => "morphable_{$i}"
            ];

            $relationships["morph_many_{$i}"] = [
                'type' => 'morphMany',
                'model' => "App\\Models\\MorphTarget{$i}",
                'name' => "morphable_{$i}"
            ];

            $relationships["morph_to_many_{$i}"] = [
                'type' => 'morphToMany',
                'model' => "App\\Models\\MorphPivot{$i}",
                'name' => "morphable_{$i}",
                'pivot' => [
                    'table' => "morph_pivot_{$i}",
                    'timestamps' => true,
                    'columns' => ['status', 'meta_data', 'settings']
                ]
            ];
        }

        $this->assertPerformanceConstraints(
            maxDurationMs: 1000,
            maxMemoryBytes: 50 * 1024 * 1024,
            operation: fn() => $this->factory->relationshipSchema('polymorphic_test', $relationships),
            durationMessage: 'Should handle extreme polymorphic relationships efficiently',
            memoryMessage: 'Memory usage should be reasonable for complex polymorphic relationships'
        );
    }

    /** @test */
    public function testuhandles_nested_json_schema_definitions(): void {
        $schema = ['columns' => [], 'indexes' => []];

        // Create deeply nested JSON columns
        for ($i = 0; $i < 100; $i++) {
            $nestedJson = [];
            for ($j = 0; $j < 10; $j++) {
                $nestedJson["level_{$j}"] = [
                    "field_{$j}" => [
                        "sub_field_{$j}" => [
                            "data_{$j}" => [
                                "type" => "string",
                                "nullable" => true,
                                "validation" => [
                                    "rules" => ["required", "string", "max:255"],
                                    "messages" => ["required" => "Field is required"]
                                ]
                            ]
                        ]
                    ]
                ];
            }

            $schema['columns']["json_column_{$i}"] = [
                'type' => 'json',
                'nullable' => false,
                'default' => json_encode($nestedJson),
                'comment' => "Nested JSON column {$i}"
            ];
        }

        $this->assertPerformanceConstraints(
            maxDurationMs: 2000,
            maxMemoryBytes: 75 * 1024 * 1024,
            operation: fn() => $this->factory->schema($schema),
            durationMessage: 'Should handle deeply nested JSON schema definitions efficiently',
            memoryMessage: 'Memory usage should be reasonable for complex JSON schemas'
        );
    }

    /** @test */
    public function testuhandles_dynamic_attribute_casting(): void {
        $schema = ['columns' => []];
        $castTypes = [
            'array',
            'boolean',
            'collection',
            'date',
            'datetime',
            'decimal',
            'double',
            'encrypted',
            'float',
            'integer',
            'object',
            'real',
            'string',
            'timestamp'
        ];

        // Create columns with various cast types and custom cast classes
        for ($i = 0; $i < 200; $i++) {
            $castType = $castTypes[$i % count($castTypes)];
            $customCast = $i % 3 === 0;

            $schema['columns']["cast_column_{$i}"] = [
                'type' => 'string',
                'cast' => $customCast ? [
                    'type' => "App\\Casts\\Custom{$castType}Cast",
                    'parameters' => [
                        'precision' => $i,
                        'format' => 'Y-m-d H:i:s',
                        'timezone' => 'UTC'
                    ]
                ] : $castType,
                'nullable' => $i % 2 === 0,
                'default' => null
            ];
        }

        $this->assertPerformanceConstraints(
            maxDurationMs: 1500,
            maxMemoryBytes: 60 * 1024 * 1024,
            operation: fn() => $this->factory->schema($schema),
            durationMessage: 'Should handle dynamic attribute casting efficiently',
            memoryMessage: 'Memory usage should be reasonable for complex casting'
        );
    }
}
