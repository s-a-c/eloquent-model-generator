<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Services\FixStrategies;

use Illuminate\Support\Facades\File;
use phpDocumentor\Reflection\DocBlockFactory;
use phpDocumentor\Reflection\Types\ContextFactory;
use ReflectionClass;
use Throwable;

class DocBlockFixStrategy implements FixStrategyInterface
{
    public function getName(): string
    {
        return 'DocBlock Fixes';
    }

    public function supportsLevel(int $level): bool
    {
        return $level <= 4;
    }

    public function fix(string $file, string $description): bool
    {
        try {
            $code = File::get($file);
            $factory = DocBlockFactory::createInstance();
            $contextFactory = new ContextFactory;
            $context = $contextFactory->createFromReflector(new ReflectionClass(static::class));
            $modified = $this->updateDocBlocks($code);
            if ($modified !== $code) {
                File::put($file, $modified);

                return true;
            }
        } catch (Throwable) {
            return false;
        }

        return false;
    }

    private function updateDocBlocks(string $code): string
    {
        return $code;
    }
}
