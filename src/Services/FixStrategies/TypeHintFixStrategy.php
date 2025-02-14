<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Services\FixStrategies;

use Throwable;
use PhpParser\NodeTraverser;
use PhpParser\ParserFactory;
use PhpParser\PrettyPrinter\Standard;
use PhpParser\NodeVisitor\NameResolver;
use Illuminate\Support\Facades\File;

class TypeHintFixStrategy implements FixStrategyInterface {
    public function getName(): string {
        return "Type Hint Fixes";
    }

    public function supportsLevel(int $level): bool {
        return $level >= 5;
    }

    public function fix(string $file, string $description): bool {
        $parser = (new ParserFactory)->create(ParserFactory::PREFER_PHP7);
        $traverser = new NodeTraverser();
        $traverser->addVisitor(new NameResolver());
        try {
            $code = File::get($file);
            $ast = $parser->parse($code);
            if ($ast === null) {
                return false;
            }

            $ast = $traverser->traverse($ast);
            $printer = new Standard();
            $newCode = $printer->prettyPrintFile($ast);
            if ($newCode !== $code) {
                File::put($file, $newCode);
                return true;
            }
        } catch (Throwable) {
            return false;
        }

        return false;
    }
}
