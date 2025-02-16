# Performance Testing Guide

This guide covers performance testing for the Eloquent Model Generator package.

## Overview

Performance tests verify the package's efficiency, resource usage, and scalability under various conditions.

## Test Categories

### Large Schema Handling

- Testing with large number of tables
- Testing with tables containing many columns
- Testing complex relationships
- Testing large data sets
- Memory usage optimization

### Batch Processing

- Testing batch model generation
- Testing parallel processing
- Testing incremental updates
- Testing with different batch sizes
- Resource utilization

### Memory Usage

- Testing memory consumption
- Testing memory leaks
- Testing garbage collection
- Testing with memory limits
- Resource cleanup

### Execution Time

- Testing generation speed
- Testing analysis performance
- Testing with timeouts
- Testing concurrent operations
- Performance optimization

## Test Structure

Tests are organized in the `tests/Performance` directory:

```
tests/Performance/
├── LargeSchemaTest.php
├── BatchProcessingTest.php
├── MemoryUsageTest.php
└── ExecutionTimeTest.php
```

## Writing Performance Tests

### Base Test Case

```php
use Orchestra\Testbench\TestCase;
use Illuminate\Support\Facades\DB;

class PerformanceTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        // Set memory limit
        ini_set('memory_limit', '256M');

        // Set execution time limit
        set_time_limit(300);

        // Set up test database
        $this->setupTestDatabase();
    }

    protected function setupTestDatabase(): void
    {
        // Create large test schema
        $this->createLargeSchema();

        // Insert test data
        $this->seedTestData();
    }
}
```

### Testing Large Schemas

```php
public function testLargeSchemaHandling(): void
{
    $startMemory = memory_get_usage(true);
    $startTime = microtime(true);

    // Generate models for large schema
    $this->artisan('model:generate', [
        '--tables' => implode(',', range(1, 100)),
        '--namespace' => 'App\\Models',
    ])->assertSuccessful();

    $memoryUsed = memory_get_usage(true) - $startMemory;
    $timeElapsed = microtime(true) - $startTime;

    // Assert performance metrics
    $this->assertLessThan(100 * 1024 * 1024, $memoryUsed); // 100MB limit
    $this->assertLessThan(60, $timeElapsed); // 60 seconds limit
}
```

### Testing Batch Processing

```php
public function testBatchProcessing(): void
{
    $results = [];

    // Test different batch sizes
    foreach ([10, 50, 100, 500] as $batchSize) {
        $startTime = microtime(true);

        $this->artisan('model:generate', [
            '--tables' => implode(',', range(1, 1000)),
            '--batch-size' => $batchSize,
        ])->assertSuccessful();

        $results[$batchSize] = microtime(true) - $startTime;
    }

    // Analyze optimal batch size
    $this->analyzeBatchResults($results);
}
```

## Performance Metrics

### Memory Metrics

- Peak memory usage
- Memory growth rate
- Garbage collection frequency
- Memory cleanup efficiency
- Memory leaks detection

### Time Metrics

- Total execution time
- Average time per model
- Batch processing speed
- Parallel execution efficiency
- I/O operation time

### Resource Metrics

- CPU usage
- Disk I/O
- Database connections
- Network usage
- Cache utilization

## Benchmarking

### Tools

- Xdebug profiler
- Blackfire.io
- PHP memory_get_usage()
- microtime()
- system resource monitors

### Metrics Collection

```php
class PerformanceMetrics
{
    private $startTime;
    private $startMemory;
    private $measurements = [];

    public function start(): void
    {
        $this->startTime = microtime(true);
        $this->startMemory = memory_get_usage(true);
    }

    public function measure(string $checkpoint): void
    {
        $this->measurements[$checkpoint] = [
            'time' => microtime(true) - $this->startTime,
            'memory' => memory_get_usage(true) - $this->startMemory,
        ];
    }

    public function getReport(): array
    {
        return $this->measurements;
    }
}
```

## Performance Optimization

### Memory Optimization

1. Streaming large datasets
2. Garbage collection control
3. Resource pooling
4. Memory limits
5. Cleanup strategies

Example:
```php
public function testMemoryOptimization(): void
{
    // Enable memory optimization
    config(['model-generator.optimize_memory' => true]);

    $this->artisan('model:generate', [
        '--tables' => 'large_table',
        '--stream' => true,
    ])->assertSuccessful();
}
```

### Time Optimization

1. Parallel processing
2. Batch operations
3. Caching
4. Lazy loading
5. Query optimization

Example:
```php
public function testTimeOptimization(): void
{
    $this->artisan('model:generate', [
        '--tables' => implode(',', range(1, 100)),
        '--parallel' => true,
        '--processes' => 4,
    ])->assertSuccessful();
}
```

## Continuous Monitoring

### Performance Tracking

```php
protected function trackPerformance(callable $operation): array
{
    $metrics = [
        'start_memory' => memory_get_usage(true),
        'start_time' => microtime(true),
        'gc_runs' => gc_collect_cycles(),
    ];

    $operation();

    $metrics['end_memory'] = memory_get_usage(true);
    $metrics['end_time'] = microtime(true);
    $metrics['peak_memory'] = memory_get_peak_usage(true);

    return $metrics;
}
```

### Reporting

Generate performance reports:

```php
protected function generateReport(array $metrics): string
{
    return sprintf(
        "Performance Report:\n" .
        "Memory Usage: %s\n" .
        "Execution Time: %.2f seconds\n" .
        "Peak Memory: %s\n",
        $this->formatBytes($metrics['end_memory'] - $metrics['start_memory']),
        $metrics['end_time'] - $metrics['start_time'],
        $this->formatBytes($metrics['peak_memory'])
    );
}
```

## Best Practices

1. Establish baselines
2. Test incrementally
3. Monitor consistently
4. Document thresholds
5. Automate testing

## Resources

- [PHP Profiling Tools](https://xdebug.org/docs/profiler)
- [Blackfire Documentation](https://blackfire.io/docs)
- [Laravel Performance](https://laravel.com/docs/master/queues)
- [PHPUnit Documentation](https://phpunit.de/documentation.html)
