<?php

namespace SAC\EloquentModelGenerator\ValueObjects;

class BenchmarkResult {
    public function __construct(
        private float $durationMs,
        private int $memoryPeakBytes,
        private mixed $result = null
    ) {
    }

    public function getDurationMs(): float {
        return $this->durationMs;
    }

    public function getMemoryPeakBytes(): int {
        return $this->memoryPeakBytes;
    }

    public function getResult(): mixed {
        return $this->result;
    }
}
