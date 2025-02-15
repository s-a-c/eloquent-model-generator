<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Services;

use SAC\EloquentModelGenerator\Services\FixStrategies\FixStrategyInterface;

class FixStrategyManager
{
    /**
     * @var array<string, FixStrategyInterface>
     */
    private array $strategies = [];

    public function __construct()
    {
        // Removed automatic registration
    }

    /**
     * Register a fix strategy.
     */
    public function registerStrategy(string $name, FixStrategyInterface $strategy): void
    {
        $this->strategies[$name] = $strategy;
    }

    /**
     * Get all registered strategies for a specific PHPStan level.
     *
     * @return array<FixStrategyInterface>
     */
    public function getStrategiesForLevel(int $level): array
    {
        $levelStrategies = [];

        foreach ($this->strategies as $strategy) {
            if ($strategy->supportsLevel($level)) {
                $levelStrategies[] = $strategy;
            }
        }

        return $levelStrategies;
    }
}
