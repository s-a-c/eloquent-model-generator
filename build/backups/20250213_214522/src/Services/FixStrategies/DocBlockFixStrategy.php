<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Services\FixStrategies;

use phpDocumentor\Reflection\DocBlockFactory;
use phpDocumentor\Reflection\Types\Context;
use phpDocumentor\Reflection\Types\ContextFactory;
use Illuminate\Support\Facades\File;

class DocBlockFixStrategy implements FixStrategyInterface {
    public function getName(): string {
        return "DocBlock Fixes";
    }
    public function supportsLevel(int $level): bool {
        return $level <= 4;
    }
    public function fix(string $file, string $description): bool {
        try {
            $code = File::get($file);
            $factory = DocBlockFactory::createInstance();
            $contextFactory = new ContextFactory();
            $context = $contextFactory->createFromReflector(new \ReflectionClass(static::class));
            $modified = $this->updateDocBlocks($code, $factory, $context);
            if ($modified !== $code) {
                File::put($file, $modified);
                return true;
            }
        } catch (\Throwable $e) {
            return false;
        }
        return false;
    }
    private function updateDocBlocks(string $code, DocBlockFactory $factory, Context $context): string {
        return $code;
    }
}
