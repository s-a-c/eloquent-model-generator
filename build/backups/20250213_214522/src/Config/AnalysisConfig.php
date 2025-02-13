<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Config;

use Illuminate\Support\Facades\File;

class AnalysisConfig {
    public function __construct(
        public readonly string $targetDir,
        public readonly array $levels,
        public readonly array $tools,
        public readonly array $options = [],
        public readonly ?string $cacheKey = null
    ) {
    }

    public static function fromFile(string $path): self {
        if (!File::exists($path)) {
            throw new \RuntimeException("Configuration file not found: {$path}");
        }

        $config = json_decode(File::get($path), true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \RuntimeException('Invalid JSON in configuration file');
        }

        return new self(
            targetDir: $config['targetDir'] ?? '',
            levels: $config['levels'] ?? [],
            tools: $config['tools'] ?? [],
            options: $config['options'] ?? [],
            cacheKey: $config['cacheKey'] ?? null
        );
    }

    public function toFile(string $path): void {
        File::put($path, json_encode([
            'targetDir' => $this->targetDir,
            'levels' => $this->levels,
            'tools' => $this->tools,
            'options' => $this->options,
            'cacheKey' => $this->cacheKey,
        ], JSON_PRETTY_PRINT));
    }

    public function withTargetDir(string $targetDir): self {
        return new self(
            targetDir: $targetDir,
            levels: $this->levels,
            tools: $this->tools,
            options: $this->options,
            cacheKey: $this->cacheKey
        );
    }

    public function withLevels(array $levels): self {
        return new self(
            targetDir: $this->targetDir,
            levels: $levels,
            tools: $this->tools,
            options: $this->options,
            cacheKey: $this->cacheKey
        );
    }

    public function withTools(array $tools): self {
        return new self(
            targetDir: $this->targetDir,
            levels: $this->levels,
            tools: $tools,
            options: $this->options,
            cacheKey: $this->cacheKey
        );
    }

    public function withOptions(array $options): self {
        return new self(
            targetDir: $this->targetDir,
            levels: $this->levels,
            tools: $this->tools,
            options: array_merge($this->options, $options),
            cacheKey: $this->cacheKey
        );
    }

    public function withCacheKey(?string $cacheKey): self {
        return new self(
            targetDir: $this->targetDir,
            levels: $this->levels,
            tools: $this->tools,
            options: $this->options,
            cacheKey: $cacheKey
        );
    }

    public function validate(): void {
        if (empty($this->targetDir)) {
            throw new \InvalidArgumentException('Target directory is required');
        }

        if (!File::isDirectory($this->targetDir)) {
            throw new \InvalidArgumentException("Target directory does not exist: {$this->targetDir}");
        }

        if (empty($this->levels) && empty($this->tools)) {
            throw new \InvalidArgumentException('At least one level or tool must be specified');
        }
    }
}
