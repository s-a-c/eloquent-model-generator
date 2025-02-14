<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Support\Fixes;

use RuntimeException;
use SAC\EloquentModelGenerator\Contracts\FixStrategy;
use Illuminate\Support\Facades\File;

abstract class AbstractFixStrategy implements FixStrategy {
    protected string $pattern = '';

    protected int $priority = 0;

    protected string $description = '';

    public function canFix(string $error): bool {
        if ($this->pattern === '' || $this->pattern === '0') {
            throw new RuntimeException('Pattern must be defined in child class');
        }

        return (bool) preg_match($this->pattern, $error);
    }

    public function getPriority(): int {
        return $this->priority;
    }

    public function getDescription(): string {
        return $this->description;
    }

    protected function readFile(string $file): string {
        if (!File::exists($file)) {
            throw new RuntimeException('File not found: ' . $file);
        }

        return File::get($file);
    }

    protected function writeFile(string $file, string $content): void {
        File::put($file, $content);
    }

    protected function backupFile(string $file): void {
        $backupFile = $file . '.bak';
        if (!File::exists($file)) {
            throw new RuntimeException('File not found: ' . $file);
        }

        File::copy($file, $backupFile);
    }

    protected function restoreFile(string $file): void {
        $backupFile = $file . '.bak';
        if (!File::exists($backupFile)) {
            throw new RuntimeException('Backup file not found: ' . $backupFile);
        }

        File::move($backupFile, $file);
    }

    protected function parseError(string $error): array {
        if (!preg_match($this->pattern, $error, $matches)) {
            throw new RuntimeException('Error does not match pattern');
        }

        return $matches;
    }
}
