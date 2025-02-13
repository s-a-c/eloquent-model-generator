<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Services;

use SAC\EloquentModelGenerator\Contracts\FixStrategy;
use Illuminate\Support\Collection;

class FixStrategyManager {
    /** @var Collection<FixStrategy> */
    private Collection $strategies;

    public function __construct() {
        $this->strategies = collect();
    }

    public function register(FixStrategy $strategy): self {
        $this->strategies->push($strategy);
        return $this;
    }

    public function getStrategiesForError(string $error): Collection {
        return $this->strategies
            ->filter(fn(FixStrategy $strategy) => $strategy->canFix($error))
            ->sortByDesc(fn(FixStrategy $strategy) => $strategy->getPriority());
    }

    public function fixError(string $file, string $error): bool {
        $strategies = $this->getStrategiesForError($error);

        foreach ($strategies as $strategy) {
            if ($strategy->fix($file, $error)) {
                return true;
            }
        }

        return false;
    }

    public function getAvailableStrategies(): Collection {
        return $this->strategies->sortByDesc(fn(FixStrategy $strategy) => $strategy->getPriority());
    }

    public function getStrategyDescriptions(): array {
        return $this->getAvailableStrategies()
            ->map(fn(FixStrategy $strategy) => $strategy->getDescription())
            ->toArray();
    }
}
