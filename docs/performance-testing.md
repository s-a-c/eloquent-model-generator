# Performance Testing Guide

This guide covers the performance testing features available in the Eloquent Model Generator package.

## Overview

The package includes comprehensive performance testing capabilities:
- Query execution time measurement
- Memory usage analysis
- Parallel processing efficiency
- Cache effectiveness testing
- Database connection management
- Template rendering performance
- Stress testing and load testing
- Performance profiling and monitoring
- Database platform-specific testing

## Available Testing Traits

### 1. MeasurePerformance Trait

```php
use SAC\EloquentModelGenerator\Tests\Support\Traits\MeasurePerformance;

class YourTest extends TestCase
{
    use MeasurePerformance;

    public function test_performance(): void
    {
        // Start measuring
        $this->startQueryMeasurement();

        // Your code here
        $result = $this->service->generateModel('users');

        // Get performance metrics
        $metrics = $this->stopQueryMeasurement();

        // Assertions
        $this->assertLessThan(1000, $metrics['total_time']); // 1 second max
        $this->assertLessThan(50 * 1024 * 1024, $metrics['memory_usage']['peak']); // 50MB max
    }
}
```

### 2. WithPerformanceTests Trait

```php
use SAC\EloquentModelGenerator\Tests\Support\Traits\WithPerformanceTests;

class YourTest extends TestCase
{
    use WithPerformanceTests;

    public function test_performance_constraints(): void
    {
        $this->assertPerformanceConstraints(
            maxDurationMs: 1000,
            maxMemoryBytes: 50 * 1024 * 1024,
            operation: fn() => $this->service->generateModel('users'),
            durationMessage: 'Operation should complete within 1 second',
            memoryMessage: 'Memory usage should be less than 50MB'
        );
    }
}
```

### 3. AdvancedPerformanceProfile Trait

```php
use SAC\EloquentModelGenerator\Tests\Support\Traits\AdvancedPerformanceProfile;

class YourTest extends TestCase
{
    use AdvancedPerformanceProfile;

    public function test_complex_operation(): void
    {
        $this->initializeProfiler();

        // Profile model generation
        $this->startProfile('model_generation', 'generation');
        $model = $this->service->generateModel('users');
        $metrics = $this->stopProfile('model_generation');

        // Profile relationship processing
        $this->startProfile('relationship_processing', 'relationships');
        $this->processRelationships($model);
        $metrics = $this->stopProfile('relationship_processing');

        // Get overall statistics
        $stats = $this->getProfileStats();

        // Assert performance requirements
        expect($stats['performance_score'])->toBeGreaterThan(80);
    }
}
```

## Performance Metrics

### 1. Query Performance

The package tracks:
- Total number of queries executed
- Total query execution time
- Average query time
- Slowest query identification
- Query patterns and frequency

```php
$metrics = $this->stopQueryMeasurement();

// Available metrics
$totalQueries = $metrics['total_queries'];
$totalTime = $metrics['total_time'];
$averageTime = $metrics['average_time'];
$slowestQuery = $metrics['slowest_query'];
$slowestTime = $metrics['slowest_time'];
```

### 2. Memory Analysis

Memory metrics include:
- Start memory usage
- End memory usage
- Peak memory usage
- Memory growth rate
- Memory stability analysis

```php
// Memory assertions
$this->assertMemoryUsage(50 * 1024 * 1024); // Current usage < 50MB
$this->assertPeakMemoryUsage(100 * 1024 * 1024); // Peak < 100MB

// Memory stability test
$this->assertMemoryStability(
    operation: fn() => $this->service->generateModel('users'),
    iterations: 10,
    maxGrowthMb: 1.0
);
```

### 3. Cache Performance

Cache effectiveness metrics:
- Cache hit rate
- Cache response time
- Cache memory impact

```php
$this->assertCacheEffectiveness(
    operation: fn() => $this->service->generateModel('users'),
    iterations: 100,
    minHitRatePercent: 90,
    cacheHitThresholdMs: 50
);
```

## Performance Benchmarking

### 1. Single Operation Benchmarks

```php
$benchmark = new Benchmark();
$result = $benchmark->measure(function () {
    return $this->service->generateModel('users');
});

expect($result->getDurationMs())->toBeLessThan(1000);
expect($result->getMemoryPeakBytes())->toBeLessThan(50 * 1024 * 1024);
```

### 2. Parallel Processing Benchmarks

```php
$this->assertParallelEfficiency(
    sequentialOperation: fn() => $this->service->generateBatch($tables),
    parallelOperation: fn() => $this->parallelService->generateModels($tables),
    workerCount: 4,
    minEfficiencyPercent: 80
);
```

### 3. Database Platform Testing

```php
// Test on specific database platform
$this->assertPerformanceConstraints(
    maxDurationMs: 1000,
    maxMemoryBytes: 50 * 1024 * 1024,
    operation: fn() => $this->service->generateModel('users'),
    platform: 'mysql'
);

// Test across all platforms
foreach (['mysql', 'pgsql', 'sqlite', 'sqlsrv'] as $platform) {
    $this->withDatabasePlatform($platform, function () {
        $this->assertPerformanceConstraints(/* ... */);
    });
}
```

## Best Practices

1. **Consistent Environment**
   - Use dedicated test database
   - Clear cache before performance tests
   - Disable debug mode
   - Use consistent test data size

2. **Realistic Scenarios**
   - Test with real-world table structures
   - Include relationship complexity
   - Consider concurrent operations
   - Test with various data volumes

3. **Performance Thresholds**
   - Set realistic time limits
   - Consider environment variations
   - Use relative thresholds when appropriate
   - Document threshold reasoning

4. **Resource Management**
   - Clean up test artifacts
   - Reset database state
   - Clear memory between tests
   - Monitor system resources

## Common Issues and Solutions

1. **Memory Leaks**
   - Use memory profiling tools
   - Monitor memory growth patterns
   - Implement cleanup routines
   - Set appropriate memory limits

2. **Slow Query Performance**
   - Analyze query execution plans
   - Check index usage
   - Monitor database connections
   - Optimize query patterns

3. **Resource Contention**
   - Monitor CPU usage
   - Track I/O operations
   - Manage concurrent operations
   - Balance resource allocation

## Performance Monitoring in Production

1. **Telemetry Integration**
   ```php
   use SAC\EloquentModelGenerator\Services\Telemetry;

   $telemetry = new Telemetry();
   $telemetry->recordMetric('model_generation', [
       'duration' => $metrics['duration'],
       'memory' => $metrics['memory'],
       'model' => $modelName
   ]);
   ```

2. **Alert Thresholds**
   ```php
   $thresholds = [
       'duration' => [
           'warning' => 1000,  // ms
           'critical' => 5000  // ms
       ],
       'memory' => [
           'warning' => 50 * 1024 * 1024,   // 50MB
           'critical' => 200 * 1024 * 1024  // 200MB
       ]
   ];
   ```

3. **Performance Dashboards**
   ```php
   $exporter = new MetricsExporter();
   $exporter->export([
       'timestamp' => now(),
       'metrics' => $metrics,
       'context' => [
           'environment' => app()->environment(),
           'php_version' => PHP_VERSION,
           'memory_limit' => ini_get('memory_limit')
       ]
   ]);
   ```

## Next Steps

- Review the [Testing Guide](./testing.md) for more testing strategies
- Check the [Configuration](./configuration.md) for performance-related settings
- See [Advanced Usage](./advanced-usage.md) for optimization techniques
