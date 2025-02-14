<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Services\FixStrategies;

interface FixStrategyInterface {
    public function getName(): string;

    public function supportsLevel(int $level): bool;

    public function fix(string $file, string $description): bool;
}
