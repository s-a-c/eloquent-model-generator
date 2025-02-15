<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Config;

use Illuminate\Support\Facades\File;

class AnalysisConfig
{
    private string $normalizedTargetDir;

    public function __construct(
        public readonly string $targetDir,
        public readonly array $levels = ['8'],
        public readonly array $tools = [],
        public readonly bool $parallel = false,
        public readonly bool $dryRun = false,
    ) {
        // Normalize target directory path
        $this->normalizedTargetDir = str_replace('\\', '/', realpath($targetDir));
        if ($this->normalizedTargetDir === false) {
            throw new \InvalidArgumentException("Invalid target directory: {$targetDir}");
        }
    }

    public function toFile(string $path): void
    {
        file_put_contents($path, json_encode([
            'targetDir' => $this->targetDir,
            'levels' => $this->levels,
            'tools' => $this->tools,
            'parallel' => $this->parallel,
            'dryRun' => $this->dryRun,
        ], JSON_PRETTY_PRINT));
    }

    public static function fromFile(string $path): self
    {
        $data = json_decode(file_get_contents($path), true);

        return new self(
            targetDir: $data['targetDir'],
            levels: $data['levels'],
            tools: $data['tools'],
            parallel: $data['parallel'],
            dryRun: $data['dryRun'],
        );
    }

    public function validate(): void
    {
        if (empty($this->normalizedTargetDir)) {
            throw new \InvalidArgumentException('Target directory is required');
        }

        if (! File::isDirectory($this->normalizedTargetDir)) {
            throw new \InvalidArgumentException("Target directory does not exist: {$this->normalizedTargetDir}");
        }

        if (empty($this->levels)) {
            throw new \InvalidArgumentException('At least one level must be specified');
        }
    }

    public function getTargetDir(): string
    {
        return $this->normalizedTargetDir;
    }

    public function getLevels(): array
    {
        return $this->levels;
    }

    public function getTools(): array
    {
        return $this->tools;
    }

    public function isParallel(): bool
    {
        return $this->parallel;
    }

    public function isDryRun(): bool
    {
        return $this->dryRun;
    }

    public function toArray(): array
    {
        return [
            'targetDir' => $this->normalizedTargetDir,
            'levels' => $this->levels,
            'tools' => $this->tools,
            'parallel' => $this->parallel,
            'dryRun' => $this->dryRun,
        ];
    }
}
