<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests\Unit\Services\TypeInference;

use PHPUnit\Framework\TestCase;
use SAC\EloquentModelGenerator\Services\TypeInference\TypeInferenceService;
use SAC\EloquentModelGenerator\ValueObjects\Column;

class TypeInferenceServiceTest extends TestCase {
    private TypeInferenceService $service;

    protected function setUp(): void {
        parent::setUp();
        $this->service = new TypeInferenceService();
    }

    public function testInferDocblockTypeReturnsExpectedTypes(): void {
        $testCases = [
            // Integer types
            [
                'column' => new Column('id', 'integer', true, true, false, true),
                'expected' => 'int',
            ],
            [
                'column' => new Column('count', 'integer', false, false, true, false),
                'expected' => 'int|null',
            ],
            [
                'column' => new Column('age', 'smallint', false, false, false, false),
                'expected' => 'int',
            ],
            [
                'column' => new Column('views', 'bigint', false, false, true, false),
                'expected' => 'int|null',
            ],

            // String types
            [
                'column' => new Column('name', 'string', false, false, false, false),
                'expected' => 'string',
            ],
            [
                'column' => new Column('description', 'text', false, false, true, false),
                'expected' => 'string|null',
            ],
            [
                'column' => new Column('code', 'char', false, false, false, false),
                'expected' => 'string',
            ],

            // Boolean types
            [
                'column' => new Column('active', 'boolean', false, false, false, false),
                'expected' => 'bool',
            ],
            [
                'column' => new Column('is_admin', 'boolean', false, false, true, false),
                'expected' => 'bool|null',
            ],

            // Float types
            [
                'column' => new Column('price', 'decimal', false, false, false, false),
                'expected' => 'float',
            ],
            [
                'column' => new Column('weight', 'float', false, false, true, false),
                'expected' => 'float|null',
            ],
            [
                'column' => new Column('height', 'double', false, false, false, false),
                'expected' => 'float',
            ],

            // Date/Time types
            [
                'column' => new Column('created_at', 'datetime', false, false, false, false),
                'expected' => '\\Carbon\\Carbon',
            ],
            [
                'column' => new Column('updated_at', 'timestamp', false, false, true, false),
                'expected' => '\\Carbon\\Carbon|null',
            ],
            [
                'column' => new Column('birth_date', 'date', false, false, false, false),
                'expected' => '\\Carbon\\Carbon',
            ],

            // JSON types
            [
                'column' => new Column('metadata', 'json', false, false, false, false),
                'expected' => 'array',
            ],
            [
                'column' => new Column('settings', 'jsonb', false, false, true, false),
                'expected' => 'array|null',
            ],

            // Binary types
            [
                'column' => new Column('data', 'binary', false, false, false, false),
                'expected' => 'resource|string',
            ],
            [
                'column' => new Column('content', 'blob', false, false, true, false),
                'expected' => 'resource|string|null',
            ],

            // Unknown types
            [
                'column' => new Column('custom', 'unknown', false, false, false, false),
                'expected' => 'mixed',
            ],
            [
                'column' => new Column('custom_null', 'unknown', false, false, true, false),
                'expected' => 'mixed|null',
            ],
        ];

        foreach ($testCases as $testCase) {
            $this->assertSame(
                $testCase['expected'],
                $this->service->inferDocblockType($testCase['column']),
                "Failed inferring type for column {$testCase['column']->getName()} of type {$testCase['column']->getType()}"
            );
        }
    }

    public function testInferPhpTypeReturnsExpectedTypes(): void {
        $testCases = [
            // Integer types
            [
                'column' => new Column('id', 'integer', true, true, false, true),
                'expected' => 'int',
            ],
            [
                'column' => new Column('count', 'integer', false, false, true, false),
                'expected' => '?int',
            ],

            // String types
            [
                'column' => new Column('name', 'string', false, false, false, false),
                'expected' => 'string',
            ],
            [
                'column' => new Column('description', 'text', false, false, true, false),
                'expected' => '?string',
            ],

            // Boolean types
            [
                'column' => new Column('active', 'boolean', false, false, false, false),
                'expected' => 'bool',
            ],
            [
                'column' => new Column('is_admin', 'boolean', false, false, true, false),
                'expected' => '?bool',
            ],

            // Float types
            [
                'column' => new Column('price', 'decimal', false, false, false, false),
                'expected' => 'float',
            ],
            [
                'column' => new Column('weight', 'float', false, false, true, false),
                'expected' => '?float',
            ],

            // Date/Time types
            [
                'column' => new Column('created_at', 'datetime', false, false, false, false),
                'expected' => '\\Carbon\\Carbon',
            ],
            [
                'column' => new Column('updated_at', 'timestamp', false, false, true, false),
                'expected' => '?\\Carbon\\Carbon',
            ],

            // JSON types
            [
                'column' => new Column('metadata', 'json', false, false, false, false),
                'expected' => 'array',
            ],
            [
                'column' => new Column('settings', 'jsonb', false, false, true, false),
                'expected' => '?array',
            ],

            // Unknown types
            [
                'column' => new Column('custom', 'unknown', false, false, false, false),
                'expected' => 'mixed',
            ],
            [
                'column' => new Column('custom_null', 'unknown', false, false, true, false),
                'expected' => 'mixed',
            ],
        ];

        foreach ($testCases as $testCase) {
            $this->assertSame(
                $testCase['expected'],
                $this->service->inferPhpType($testCase['column']),
                "Failed inferring PHP type for column {$testCase['column']->getName()} of type {$testCase['column']->getType()}"
            );
        }
    }

    public function testInferCastTypeReturnsExpectedTypes(): void {
        $testCases = [
            // Integer types
            [
                'column' => new Column('id', 'integer', true, true, false, true),
                'expected' => 'integer',
            ],
            [
                'column' => new Column('count', 'integer', false, false, true, false),
                'expected' => 'integer',
            ],

            // String types
            [
                'column' => new Column('name', 'string', false, false, false, false),
                'expected' => 'string',
            ],
            [
                'column' => new Column('description', 'text', false, false, true, false),
                'expected' => 'string',
            ],

            // Boolean types
            [
                'column' => new Column('active', 'boolean', false, false, false, false),
                'expected' => 'boolean',
            ],
            [
                'column' => new Column('is_admin', 'boolean', false, false, true, false),
                'expected' => 'boolean',
            ],

            // Float types
            [
                'column' => new Column('price', 'decimal', false, false, false, false),
                'expected' => 'decimal:2',
            ],
            [
                'column' => new Column('weight', 'float', false, false, true, false),
                'expected' => 'float',
            ],

            // Date/Time types
            [
                'column' => new Column('created_at', 'datetime', false, false, false, false),
                'expected' => 'datetime',
            ],
            [
                'column' => new Column('updated_at', 'timestamp', false, false, true, false),
                'expected' => 'datetime',
            ],

            // JSON types
            [
                'column' => new Column('metadata', 'json', false, false, false, false),
                'expected' => 'array',
            ],
            [
                'column' => new Column('settings', 'jsonb', false, false, true, false),
                'expected' => 'array',
            ],

            // Unknown types
            [
                'column' => new Column('custom', 'unknown', false, false, false, false),
                'expected' => null,
            ],
            [
                'column' => new Column('custom_null', 'unknown', false, false, true, false),
                'expected' => null,
            ],
        ];

        foreach ($testCases as $testCase) {
            $this->assertSame(
                $testCase['expected'],
                $this->service->inferCastType($testCase['column']),
                "Failed inferring cast type for column {$testCase['column']->getName()} of type {$testCase['column']->getType()}"
            );
        }
    }
}