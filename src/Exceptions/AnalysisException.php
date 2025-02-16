<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Exceptions;

class AnalysisException extends ModelGeneratorException {
    protected function validateNotEmpty(string $value, string $name): void {
        if (empty($value)) {
            throw new static("{$name} cannot be empty");
        }
    }

    public static function invalidAnalysisType(string $type): self {
        return new self("Invalid analysis type: {$type}");
    }

    public static function analysisError(string $type, string $message): self {
        return new self("Analysis error in {$type}: {$message}");
    }

    public static function invalidMetric(string $metric): self {
        return new self("Invalid metric: {$metric}");
    }

    public static function invalidThreshold(string $metric, mixed $value): self {
        $valueString = is_scalar($value) ? (string) $value : gettype($value);
        return new self("Invalid threshold value {$valueString} for metric {$metric}");
    }

    public static function metricNotAvailable(string $metric): self {
        return new self("Metric not available: {$metric}");
    }

    public static function analysisTimeout(string $type): self {
        return new self("Analysis timed out for type: {$type}");
    }

    public static function memoryExceeded(string $type): self {
        return new self("Memory limit exceeded during {$type} analysis");
    }

    public static function invalidAnalysisResult(string $type): self {
        return new self("Invalid analysis result for type: {$type}");
    }

    public static function missingDependency(string $type, string $dependency): self {
        return new self("Missing dependency {$dependency} required for {$type} analysis");
    }

    public static function incompatibleAnalysis(string $type1, string $type2): self {
        return new self("Incompatible analysis types: {$type1} and {$type2}");
    }

    public static function invalidAnalysisConfig(string $type, string $config): self {
        return new self("Invalid configuration {$config} for {$type} analysis");
    }

    public static function analysisNotSupported(string $type, string $target): self {
        return new self("Analysis type {$type} not supported for {$target}");
    }
}