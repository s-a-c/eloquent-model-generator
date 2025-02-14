<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Support\Fixes;

use PhpParser\PrettyPrinter\Standard;
use PhpParser\Node\Name;
use Throwable;
use PhpParser\Node\Stmt\Return_;
use PhpParser\Node\Expr;
use PhpParser\Node\Scalar\String_;
use PhpParser\Node\Scalar\LNumber;
use PhpParser\Node\Scalar\DNumber;
use PhpParser\Node\Expr\Array_;
use PhpParser\Node\Expr\ConstFetch;
use PhpParser\Error;
use PhpParser\Node;
use PhpParser\Node\Stmt\ClassMethod;
use PhpParser\NodeFinder;
use PhpParser\ParserFactory;
use PhpParser\PrettyPrinter;

class TypeHintFixer extends AbstractFixStrategy {
    protected string $pattern = '/Method (?P<class>[^:]+)::(?P<method>[^(]+)\(\) has no return type specified/';

    protected int $priority = 100;

    protected string $description = 'Fixes missing return type hints on methods';

    private ?NodeFinder $nodeFinder = null;

    private ?Standard $printer = null;

    public function fix(string $file, string $error): bool {
        try {
            $matches = $this->parseError($error);
            $className = $matches['class'];
            $methodName = $matches['method'];

            $code = $this->readFile($file);
            $this->backupFile($file);

            $ast = $this->parseCode($code);
            if (!$ast) {
                return false;
            }

            $method = $this->findMethod($ast, $methodName);
            if (!$method instanceof ClassMethod) {
                return false;
            }

            $inferredType = $this->inferReturnType($method);
            if (!$inferredType) {
                return false;
            }

            $method->returnType = new Name($inferredType);

            $modifiedCode = $this->getPrinter()->prettyPrintFile($ast);
            $this->writeFile($file, $modifiedCode);

            return true;
        } catch (Throwable) {
            $this->restoreFile($file);
            return false;
        }
    }

    private function parseCode(string $code): ?array {
        $parser = (new ParserFactory)->create(ParserFactory::ONLY_PHP7);
        try {
            return $parser->parse($code);
        } catch (Error) {
            return null;
        }
    }

    private function findMethod(array $ast, string $methodName): ?ClassMethod {
        return $this->getNodeFinder()->findFirst($ast, fn(Node $node): bool => $node instanceof ClassMethod && $node->name->toString() === $methodName);
    }

    private function inferReturnType(ClassMethod $method): ?string {
        // Simple return type inference
        $returnNodes = $this->getNodeFinder()->find($method, fn(Node $node): bool => $node instanceof Return_);

        if ($returnNodes === []) {
            return 'void';
        }

        $types = [];
        foreach ($returnNodes as $return) {
            if (!$return->expr) {
                $types[] = 'void';
                continue;
            }

            $type = $this->inferExpressionType($return->expr);
            if ($type) {
                $types[] = $type;
            }
        }

        if ($types === []) {
            return null;
        }

        $types = array_unique($types);
        return count($types) === 1 ? $types[0] : 'mixed';
    }

    private function inferExpressionType(Expr $expr): ?string {
        if ($expr instanceof String_) {
            return 'string';
        }

        if ($expr instanceof LNumber) {
            return 'int';
        }

        if ($expr instanceof DNumber) {
            return 'float';
        }

        if ($expr instanceof Array_) {
            return 'array';
        }

        if ($expr instanceof ConstFetch) {
            if (in_array(strtolower($expr->name->toString()), ['true', 'false'])) {
                return 'bool';
            }

            if (strtolower($expr->name->toString()) === 'null') {
                return 'null';
            }
        }

        return null;
    }

    private function getNodeFinder(): NodeFinder {
        return $this->nodeFinder ??= new NodeFinder;
    }

    private function getPrinter(): Standard {
        return $this->printer ??= new Standard;
    }
}
