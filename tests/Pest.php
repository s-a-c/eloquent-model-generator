<?php

use Illuminate\Support\Facades\DB;
use parallel\Runtime;
use SAC\EloquentModelGenerator\Services\ModelGeneratorService;
use SAC\EloquentModelGenerator\Support\Definitions\ModelDefinition;
use SAC\EloquentModelGenerator\Support\Definitions\RelationDefinition;
use SAC\EloquentModelGenerator\Support\Definitions\SchemaDefinition;
use SAC\EloquentModelGenerator\Tests\TestCase;

/*
|--------------------------------------------------------------------------
| Test Case
|--------------------------------------------------------------------------
|
| The closure you provide to your test functions is always bound to a specific PHPUnit test
| case class. By default, that class is "PHPUnit\Framework\TestCase". Of course, you may
| need to change it using the "uses()" function to bind a different classes or traits.
|
*/

uses(TestCase::class)
    ->beforeEach(function () {
        $this->withoutExceptionHandling();
    })
    ->afterEach(function () {
        // Clean up after each test
    })
    ->in('Unit', 'Feature', 'Integration');

uses(TestCase::class)
    ->beforeEach(function () {
        $this->withoutExceptionHandling();
        $this->artisan('cache:clear');
        $this->artisan('config:clear');
    })
    ->in('Performance');

/*
|--------------------------------------------------------------------------
| Database Platform Groups
|--------------------------------------------------------------------------
|
| Here we define test groups for different database platforms. This allows
| running tests for specific database platforms using the --group option.
| Example: php artisan test --group=mysql
|
*/

uses(SAC\EloquentModelGenerator\Tests\Support\Traits\WithMySQLTesting::class)
    ->group('mysql')
    ->in('Feature/MySQL');

uses(SAC\EloquentModelGenerator\Tests\Support\Traits\WithPostgreSQLTesting::class)
    ->group('pgsql')
    ->in('Feature/PostgreSQL');

uses(SAC\EloquentModelGenerator\Tests\Support\Traits\WithSQLServerTesting::class)
    ->group('sqlsrv')
    ->in('Feature/SQLServer');

uses(SAC\EloquentModelGenerator\Tests\Support\Traits\WithSQLiteTesting::class)
    ->group('sqlite')
    ->in('Feature/SQLite');

/*
|--------------------------------------------------------------------------
| Expectations
|--------------------------------------------------------------------------
|
| When you're writing tests, you often need to check that values meet certain conditions. The
| "expect()" function gives you access to a set of "expectations" methods that you can use
| to assert different things. Of course, you may extend the Expectation API at any time.
|
*/

expect()->extend('toBeValidModelDefinition', function () {
    expect($this->value)
        ->toBeInstanceOf(ModelDefinition::class)
        ->and($this->value->table)
        ->toBeString()
        ->not->toBeEmpty()
        ->and($this->value->columns)
        ->toBeInstanceOf(\Illuminate\Support\Collection::class)
        ->not->toBeEmpty();

    return $this;
});

expect()->extend('toHaveValidSchema', function () {
    expect($this->value)
        ->toBeInstanceOf(SchemaDefinition::class)
        ->and($this->value->table)
        ->toBeString()
        ->not->toBeEmpty()
        ->and($this->value->columns)
        ->toBeInstanceOf(\Illuminate\Support\Collection::class)
        ->not->toBeEmpty()
        ->and($this->value->indexes)
        ->toBeInstanceOf(\Illuminate\Support\Collection::class);

    return $this;
});

expect()->extend('toHaveValidRelations', function () {
    expect($this->value)
        ->toBeInstanceOf(\Illuminate\Support\Collection::class);

    $this->value->each(function ($relation) {
        expect($relation)
            ->toBeInstanceOf(RelationDefinition::class)
            ->and($relation->name)
            ->toBeString()
            ->not->toBeEmpty()
            ->and($relation->type)
            ->toBeString()
            ->toBeIn(['hasOne', 'hasMany', 'belongsTo', 'belongsToMany', 'morphTo', 'morphOne', 'morphMany']);
    });

    return $this;
});

expect()->extend('toHaveValidPerformanceMetrics', function () {
    return $this->value
        ->toBeArray()
        ->toHaveKeys(['time', 'memory', 'result'])
        ->and($this->value['memory'])->toHaveKeys(['used', 'peak'])
        ->and($this->value['time'])->toBeFloat()->toBeGreaterThan(0);
});

expect()->extend('toBeWithinMemoryLimits', function (int $maxUsage, ?int $maxPeak = null) {
    $maxPeak = $maxPeak ?? $maxUsage;

    return $this->value
        ->toHaveKey('memory')
        ->and($this->value['memory']['used'])->toBeLessThan($maxUsage)
        ->and($this->value['memory']['peak'])->toBeLessThan($maxPeak);
});

expect()->extend('toBeWithinTimeLimit', function (int $maxMilliseconds) {
    return $this->value
        ->toHaveKey('time')
        ->and($this->value['time'])->toBeLessThan($maxMilliseconds);
});

expect()->extend('toBeStableUnderLoad', function (callable $operation, int $iterations = 100) {
    $memoryUsage = [];
    $times = [];

    for ($i = 0; $i < $iterations; $i++) {
        $metrics = withPerformanceMonitoring($operation);
        $memoryUsage[] = $metrics['memory']['used'];
        $times[] = $metrics['time'];
    }

    $memoryGrowth = end($memoryUsage) - reset($memoryUsage);
    $timeVariance = stats_standard_deviation($times);

    return $this->and($memoryGrowth)->toBeLessThan(1024 * 1024) // Less than 1MB growth
        ->and($timeVariance)->toBeLessThan(100); // Less than 100ms variance
});

expect()->extend('toBeThreadSafe', function (callable $operation, int $threads = 4) {
    $results = [];
    $errors = [];

    $pool = [];
    for ($i = 0; $i < $threads; $i++) {
        $pool[] = async(function () use ($operation) {
            try {
                return $operation();
            } catch (\Throwable $e) {
                return ['error' => $e->getMessage()];
            }
        });
    }

    foreach ($pool as $promise) {
        $result = await($promise);
        if (isset($result['error'])) {
            $errors[] = $result['error'];
        } else {
            $results[] = $result;
        }
    }

    return $this->and($errors)->toBeEmpty()
        ->and($results)->toHaveCount($threads);
});

expect()->extend('toBeValidClassName', function () {
    expect($this->value)
        ->toBeString()
        ->toMatch('/^[A-Z][a-zA-Z0-9_]*$/')
        ->not->toContain('__');

    return $this;
});

/*
|--------------------------------------------------------------------------
| Functions
|--------------------------------------------------------------------------
|
| While Pest is very powerful out-of-the-box, you may have some testing code specific to your
| project that you don't want to repeat in every file. Here you can also expose helpers as
| global functions to help you to reduce the number of lines of code in your test files.
|
*/

/*
|--------------------------------------------------------------------------
| Helper Functions
|--------------------------------------------------------------------------
*/

function createModelGenerator(array $config = []): ModelGeneratorService
{
    $app = app();

    return $app->make(ModelGeneratorService::class, [
        'config' => array_merge([
            'namespace' => 'App\\Models',
            'path' => app_path('Models'),
        ], $config),
    ]);
}

function getTestSchema(): array
{
    return [
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
}

function createTestTable(string $name, ?callable $callback = null): void
{
    $schema = app('db')->connection()->getSchemaBuilder();

    $schema->create($name, function ($table) use ($callback) {
        $table->id();
        $table->timestamps();

        if ($callback) {
            $callback($table);
        }
    });
}

function dropTestTable(string $name): void
{
    $schema = app('db')->connection()->getSchemaBuilder();
    $schema->dropIfExists($name);
}

function createTestModel(string $tableName, array $attributes = []): array
{
    return [
        'tableName' => $tableName,
        'className' => str($tableName)->studly()->singular()->toString(),
        'namespace' => 'App\\Models',
        'baseClass' => 'Illuminate\\Database\\Eloquent\\Model',
        'withSoftDeletes' => false,
        ...$attributes,
    ];
}

function assertValidModelDefinition($definition): void
{
    expect($definition)->toBeValidModelDefinition();
}

function assertValidSchema($schema): void
{
    expect($schema)->toHaveValidSchema();
}

function assertValidRelations($schema): void
{
    expect($schema)->toHaveValidRelations();
}

function withPerformanceMonitoring(callable $operation): array
{
    $startTime = microtime(true);
    $startMemory = memory_get_usage();

    $result = $operation();

    $endTime = microtime(true);
    $endMemory = memory_get_usage();
    $peakMemory = memory_get_peak_usage();

    return [
        'time' => ($endTime - $startTime) * 1000, // Convert to milliseconds
        'memory' => [
            'used' => $endMemory - $startMemory,
            'peak' => $peakMemory,
        ],
        'result' => $result,
    ];
}

function withQueryMonitoring(callable $operation): array
{
    DB::enableQueryLog();
    $result = $operation();
    $queries = DB::getQueryLog();
    DB::disableQueryLog();

    return [
        'queries' => [
            'count' => count($queries),
            'log' => $queries,
        ],
        'result' => $result,
    ];
}

function stats_standard_deviation(array $numbers): float
{
    $count = count($numbers);
    if ($count < 2) {
        return 0.0;
    }

    $mean = array_sum($numbers) / $count;
    $squaredDifferences = array_map(function ($number) use ($mean) {
        return pow($number - $mean, 2);
    }, $numbers);

    return sqrt(array_sum($squaredDifferences) / ($count - 1));
}

function async(callable $operation): Runtime
{
    $runtime = new Runtime;

    return $runtime->run($operation);
}

function await($promise)
{
    return $promise->value();
}
