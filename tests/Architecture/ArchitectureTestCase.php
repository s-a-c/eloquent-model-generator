<?php

namespace SAC\EloquentModelGenerator\Tests\Architecture;

use PHPUnit\Framework\TestCase;

abstract class ArchitectureTestCase extends TestCase
{
    protected function getDomainNamespace(): string
    {
        return 'StandAloneComplex\\EloquentModelGenerator\\Domain';
    }

    protected function getApplicationNamespace(): string
    {
        return 'StandAloneComplex\\EloquentModelGenerator\\Application';
    }

    protected function getInfrastructureNamespace(): string
    {
        return 'StandAloneComplex\\EloquentModelGenerator\\Infrastructure';
    }

    protected function getPresentationNamespace(): string
    {
        return 'StandAloneComplex\\EloquentModelGenerator\\Presentation';
    }

    protected function getSupportNamespace(): string
    {
        return 'StandAloneComplex\\EloquentModelGenerator\\Support';
    }

    protected function assertNamespaceExists(string $namespace): void
    {
        $path = $this->namespaceToPath($namespace);
        $this->assertDirectoryExists($path);
    }

    protected function assertClassInNamespace(string $class, string $namespace): void
    {
        $this->assertTrue(
            str_starts_with($class, $namespace),
            sprintf('Class %s should be in namespace %s', $class, $namespace)
        );
    }

    private function namespaceToPath(string $namespace): string
    {
        $basePath = __DIR__.'/../../src/';
        $relativePath = str_replace('StandAloneComplex\\EloquentModelGenerator\\', '', $namespace);

        return $basePath.str_replace('\\', '/', $relativePath);
    }
}
