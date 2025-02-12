<?php

use SAC\EloquentModelGenerator\Contracts\ModelGeneratorService;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;

beforeEach(function () {
    $this->service = app(ModelGeneratorService::class);
});

afterEach(function () {
    // Clean up test tables
    Schema::dropIfExists('large_table');
    Schema::dropIfExists('users');
    for ($i = 1; $i <= 10; $i++) {
        Schema::dropIfExists("level_{$i}");
    }
    for ($i = 0; $i < 20; $i++) {
        Schema::dropIfExists("concurrent_table_{$i}");
    }
    Schema::dropIfExists('rapid_test');
    Schema::dropIfExists('edge_case_table');
    Schema::dropIfExists('memory_test');
});

test('handles extremely large tables', function () {
    // Create a table with 1000 columns
    Schema::create('large_table', function (Blueprint $table) {
        $table->id();
        for ($i = 0; $i < 1000; $i++) {
            $table->string("field_{$i}")->nullable();
        }
        $table->timestamps();
    });

    $metrics = withPerformanceMonitoring(
        fn() =>
        $this->service->generateModel('large_table')
    );

    expect($metrics['time'])->toBeLessThan(5000)
        ->and($metrics['memory']['used'])->toBeLessThan(200 * 1024 * 1024)
        ->and($metrics['result'])->toBeValidModelDefinition();
})->group('performance', 'memory-intensive');

test('handles deep relationship chains', function () {
    createDeepRelationshipChain(10);

    $metrics = withPerformanceMonitoring(
        fn() =>
        $this->service->generateModel('level_1', [
            'with_relationships' => true,
            'relationship_depth' => 10
        ])
    );

    expect($metrics['time'])->toBeLessThan(3000)
        ->and($metrics['memory']['used'])->toBeLessThan(150 * 1024 * 1024)
        ->and($metrics['result'])->toBeValidModelDefinition();
})->group('performance', 'relationships');

test('handles circular relationships', function () {
    Schema::create('users', function (Blueprint $table) {
        $table->id();
        $table->foreignId('manager_id')->nullable()->constrained('users');
        $table->timestamps();
    });

    $metrics = withPerformanceMonitoring(
        fn() =>
        $this->service->generateModel('users', [
            'with_relationships' => true
        ])
    );

    expect($metrics['time'])->toBeLessThan(1000)
        ->and($metrics['memory']['used'])->toBeLessThan(50 * 1024 * 1024)
        ->and($metrics['result'])->toBeValidModelDefinition();
})->group('performance', 'relationships');

test('handles concurrent model generation under load', function () {
    // Create multiple tables
    for ($i = 0; $i < 20; $i++) {
        Schema::create("concurrent_table_{$i}", function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
    }

    // Simulate database load
    DB::listen(function ($query) {
        usleep(10000); // Add 10ms delay to each query
    });

    $tables = array_map(fn($i) => "concurrent_table_{$i}", range(0, 19));

    $metrics = withPerformanceMonitoring(function () use ($tables) {
        $results = [];
        foreach ($tables as $table) {
            $results[] = $this->service->generateModel($table);
        }
        return $results;
    });

    expect($metrics['time'])->toBeLessThan(10000)
        ->and($metrics['memory']['used'])->toBeLessThan(300 * 1024 * 1024)
        ->and($metrics['result'])->toBeArray()->toHaveCount(20)
        ->and($metrics['result'][0])->toBeValidModelDefinition();
})->group('performance', 'concurrency');

test('handles rapid successive generations', function () {
    Schema::create('rapid_test', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->timestamps();
    });

    $metrics = withPerformanceMonitoring(function () {
        $memoryGrowth = [];
        for ($i = 0; $i < 100; $i++) {
            $startMemory = memory_get_usage(true);
            $this->service->generateModel('rapid_test');
            $memoryGrowth[] = memory_get_usage(true) - $startMemory;
        }
        return $memoryGrowth;
    });

    $maxGrowth = max($metrics['result']);
    expect($maxGrowth)->toBeLessThan(0.5 * 1024 * 1024); // Less than 0.5MB growth
})->group('performance', 'memory-stability');

test('handles invalid schema gracefully', function () {
    Schema::create('edge_case_table', function (Blueprint $table) {
        $table->id();
        $table->string('name', 65535);
        $table->json('data')->nullable();
        $table->binary('blob')->nullable();
        $table->timestamps();
    });

    $metrics = withPerformanceMonitoring(
        fn() =>
        $this->service->generateModel('edge_case_table')
    );

    expect($metrics['time'])->toBeLessThan(2000)
        ->and($metrics['memory']['used'])->toBeLessThan(100 * 1024 * 1024)
        ->and($metrics['result'])->toBeValidModelDefinition();
})->group('performance', 'edge-cases');

test('handles memory pressure', function () {
    // Create memory pressure
    $memoryHog = array_fill(0, 1000000, str_repeat('a', 100));

    Schema::create('memory_test', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->timestamps();
    });

    $metrics = withPerformanceMonitoring(
        fn() =>
        $this->service->generateModel('memory_test')
    );

    expect($metrics['time'])->toBeLessThan(2000)
        ->and($metrics['memory']['used'])->toBeLessThan(50 * 1024 * 1024)
        ->and($metrics['result'])->toBeValidModelDefinition();

    unset($memoryHog);
})->group('performance', 'memory-pressure');

function createDeepRelationshipChain(int $depth): void {
    for ($i = 1; $i <= $depth; $i++) {
        Schema::create("level_{$i}", function (Blueprint $table) use ($i) {
            $table->id();
            if ($i > 1) {
                $table->foreignId("level_" . ($i - 1) . "_id")->constrained();
            }
            $table->string('name');
            $table->timestamps();
        });
    }
}
