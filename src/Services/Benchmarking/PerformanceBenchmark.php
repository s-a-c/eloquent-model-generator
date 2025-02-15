<?php

namespace SAC\EloquentModelGenerator\Services\Benchmarking;

use RuntimeException;
use SAC\EloquentModelGenerator\Services\Benchmark;

class PerformanceBenchmark extends Benchmark
{
    /**
     * @var array<string, array{start_time: float, start_memory: int, end_time?: float, end_memory?: int, duration?: float, memory_usage?: int}>
     */
    private array $benchmarks = [];

    /**
     * Start a benchmark.
     */
    public function startBenchmark(string $name): void
    {
        $this->benchmarks[$name] = [
            'start_time' => microtime(true),
            'start_memory' => memory_get_usage(true),
        ];
    }

    /**
     * End a benchmark.
     *
     * @return array{duration: float, memory_usage: int}
     *
     * @throws RuntimeException If benchmark was not started
     */
    public function endBenchmark(string $name): array
    {
        if (! isset($this->benchmarks[$name])) {
            throw new RuntimeException(sprintf("Benchmark '%s' was not started", $name));
        }

        $benchmark = $this->benchmarks[$name];
        $endTime = microtime(true);
        $endMemory = memory_get_usage(true);

        $duration = $endTime - $benchmark['start_time'];
        $memoryUsage = $endMemory - $benchmark['start_memory'];

        $this->benchmarks[$name]['end_time'] = $endTime;
        $this->benchmarks[$name]['end_memory'] = $endMemory;
        $this->benchmarks[$name]['duration'] = $duration;
        $this->benchmarks[$name]['memory_usage'] = $memoryUsage;

        return [
            'duration' => $duration,
            'memory_usage' => $memoryUsage,
        ];
    }

    /**
     * Get all benchmarks.
     *
     * @return array<string, array{start_time: float, start_memory: int, end_time?: float, end_memory?: int, duration?: float, memory_usage?: int}>
     */
    public function getBenchmarks(): array
    {
        return $this->benchmarks;
    }
}
