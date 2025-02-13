<?php

namespace SAC\EloquentModelGenerator\Services;

use SAC\EloquentModelGenerator\ValueObjects\BenchmarkResult;

class Benchmark {
    public function measure(callable $operation): BenchmarkResult {
        $startTime = microtime(true);
        $startMemory = memory_get_usage(true);

        $result = $operation();

        $endTime = microtime(true);
        $endMemory = memory_get_usage(true);

        return new BenchmarkResult(
            durationMs: ($endTime - $startTime) * 1000,
            memoryPeakBytes: $endMemory - $startMemory,
            result: $result
        );
    }
}
