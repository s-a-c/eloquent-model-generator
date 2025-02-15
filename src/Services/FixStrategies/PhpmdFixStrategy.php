<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Services\FixStrategies;

use Symfony\Component\Process\Process;

class PhpmdFixStrategy implements FixStrategyInterface
{
    public function getName(): string
    {
        return 'phpmd';
    }

    public function fix(string $file, string $description): bool
    {
        // PHPMD doesn't have automatic fixes, but we can use Rector rules
        // that correspond to PHPMD issues
        $process = new Process([
            'vendor/bin/rector',
            'process',
            $file,
            '--config=rector-phpmd.php',
            '--no-diffs',
            '--no-progress-bar',
        ]);

        $process->run();

        return $process->isSuccessful();
    }

    public function supportsLevel(int $level): bool
    {
        // PHPMD fixes can be applied at any level
        return true;
    }
}
