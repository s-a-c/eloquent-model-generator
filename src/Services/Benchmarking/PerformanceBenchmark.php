<?php

namespace SAC\EloquentModelGenerator\Services\Benchmarking;

use SAC\EloquentModelGenerator\Services\Benchmark;
use SAC\EloquentModelGenerator\ValueObjects\BenchmarkResult;
use Illuminate\Support\Facades\DB;

class PerformanceBenchmark extends Benchmark {
    private array $benchmarks = [];

    public function startBenchmark(string $name): void {
        $this->benchmarks[$name] = [
            'start_time' => microtime(true),
            'start_memory' => memory_get_usage(true)
        ];
    }

    public function endBenchmark(string $name): array {
        if (!isset($this->benchmarks[$name])) {
            throw new \InvalidArgumentException("No benchmark started with name: {$name}");
        }

        $start = $this->benchmarks[$name];
        $endTime = microtime(true);
        $endMemory = memory_get_usage(true);

        $metrics = [
            'duration' => ($endTime - $start['start_time']) * 1000,
            'memory_peak' => $endMemory - $start['start_memory'],
            'queries' => count(DB::getQueryLog() ?? [])
        ];

        unset($this->benchmarks[$name]);

        return $metrics;
    }
}
