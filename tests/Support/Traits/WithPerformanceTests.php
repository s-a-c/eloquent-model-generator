<?php

namespace SAC\EloquentModelGenerator\Tests\Support\Traits;

use SAC\EloquentModelGenerator\Services\Benchmark;

trait WithPerformanceTests
{
    protected function assertPerformanceConstraints(
        float $maxDurationMs,
        int $maxMemoryBytes,
        callable $operation,
        string $durationMessage = '',
        string $memoryMessage = ''
    ): void {
        $benchmark = new Benchmark;
        $result = $benchmark->measure($operation);

        $this->assertLessThan(
            $maxDurationMs,
            $result->getDurationMs(),
            $durationMessage ?: "Operation should complete within {$maxDurationMs}ms"
        );

        $this->assertLessThan(
            $maxMemoryBytes,
            $result->getMemoryPeakBytes(),
            $memoryMessage ?: 'Operation should use less than '.($maxMemoryBytes / 1024 / 1024).'MB memory'
        );
    }

    protected function assertParallelEfficiency(
        callable $sequentialOperation,
        callable $parallelOperation,
        int $workerCount,
        float $minEfficiencyPercent
    ): void {
        $benchmark = new Benchmark;

        $sequentialResult = $benchmark->measure($sequentialOperation);
        $parallelResult = $benchmark->measure($parallelOperation);

        $speedup = $sequentialResult->getDurationMs() / $parallelResult->getDurationMs();
        $efficiency = ($speedup / $workerCount) * 100;

        $this->assertGreaterThan(
            $minEfficiencyPercent,
            $efficiency,
            "Parallel efficiency should be greater than {$minEfficiencyPercent}%"
        );
    }

    protected function assertMemoryStability(
        callable $operation,
        int $iterations,
        float $maxGrowthMb = 1.0
    ): void {
        $memoryReadings = [];

        for ($i = 0; $i < $iterations; $i++) {
            $benchmark = new Benchmark;
            $result = $benchmark->measure($operation);
            $memoryReadings[] = $result->getMemoryPeakBytes();
        }

        $memoryGrowth = end($memoryReadings) - reset($memoryReadings);
        $averageGrowthPerIteration = $memoryGrowth / ($iterations - 1);

        $this->assertLessThan(
            $maxGrowthMb * 1024 * 1024,
            $averageGrowthPerIteration,
            "Memory growth per iteration should be less than {$maxGrowthMb}MB"
        );
    }

    protected function assertCacheEffectiveness(
        callable $operation,
        int $iterations,
        float $minHitRatePercent,
        float $cacheHitThresholdMs = 50
    ): void {
        $cacheHits = 0;

        // Warm up cache
        $operation();

        for ($i = 0; $i < $iterations; $i++) {
            $benchmark = new Benchmark;
            $result = $benchmark->measure($operation);

            if ($result->getDurationMs() < $cacheHitThresholdMs) {
                $cacheHits++;
            }
        }

        $hitRate = ($cacheHits / $iterations) * 100;

        $this->assertGreaterThan(
            $minHitRatePercent,
            $hitRate,
            "Cache hit rate should be greater than {$minHitRatePercent}%"
        );
    }
}
