<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Contracts;

interface FixStrategy {
    public function canFix(string $error): bool;
    public function fix(string $file, string $error): bool;
    public function getDescription(): string;
    public function getPriority(): int;
}
