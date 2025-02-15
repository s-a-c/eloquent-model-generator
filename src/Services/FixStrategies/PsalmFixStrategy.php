<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Services\FixStrategies;

use Symfony\Component\Process\Process;

class PsalmFixStrategy implements FixStrategyInterface
{
    public function getName(): string
    {
        return 'psalm';
    }

    public function fix(string $file, string $description): bool
    {
        // Use Psalm's auto-fix capabilities
        $process = new Process([
            'vendor/bin/psalm',
            $file,
            '--alter',
            '--issues=all',
            '--no-cache',
            '--no-progress',
        ]);

        $process->run();

        return $process->isSuccessful();
    }

    public function supportsLevel(int $level): bool
    {
        // Psalm fixes can be applied at any level
        return true;
    }
}
