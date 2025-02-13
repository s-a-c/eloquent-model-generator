<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Services\FixStrategies;

use Symfony\Component\Process\Process;

class RectorFixStrategy implements FixStrategyInterface {
    public function getName(): string {
        return "Rector Fixes";
    }

    public function supportsLevel(int $level): bool {
        return true;
    }

    public function fix(string $file, string $description): bool {
        $process = new Process(["vendor/bin/rector", "process", "--config-set=parameters.phpstan.level=" . $this->getLevelFromDescription($description), $file]);
        $process->run();
        return $process->isSuccessful();
    }

    private function getLevelFromDescription(string $description): int {
        if (preg_match("/Level (\d+)/", $description, $matches)) {
            return (int) $matches[1];
        }
        return 0;
    }
}
