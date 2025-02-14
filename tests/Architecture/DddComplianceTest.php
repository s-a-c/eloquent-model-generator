<?php

namespace SAC\EloquentModelGenerator\Tests\Architecture;

use PHPUnit\Framework\TestCase;

class DddComplianceTest extends ArchitectureTestCase {
    /**
     * @test
     */
    public function testApplicationLayerOnlyDependsOnDomainLayer(): void {
        $this->assertNamespaceExists($this->getApplicationNamespace());
        $this->assertNamespaceExists($this->getDomainNamespace());

        // TODO: Add proper architecture testing using PHPat or ArchUnit
        $this->markTestIncomplete('Architecture tests to be implemented');
    }

    /**
     * @test
     */
    public function testDomainLayerHasNoExternalDependencies(): void {
        $this->assertNamespaceExists($this->getDomainNamespace());

        // TODO: Add proper architecture testing using PHPat or ArchUnit
        $this->markTestIncomplete('Architecture tests to be implemented');
    }

    /**
     * @test
     */
    public function testInfrastructureLayerImplementsDomainInterfaces(): void {
        $this->assertNamespaceExists($this->getInfrastructureNamespace());
        $this->assertNamespaceExists($this->getDomainNamespace() . '\\Contracts');

        // TODO: Add proper architecture testing using PHPat or ArchUnit
        $this->markTestIncomplete('Architecture tests to be implemented');
    }

    /**
     * @test
     */
    public function testPresentationLayerOnlyDependsOnApplicationLayer(): void {
        $this->assertNamespaceExists($this->getPresentationNamespace());
        $this->assertNamespaceExists($this->getApplicationNamespace());

        // TODO: Add proper architecture testing using PHPat or ArchUnit
        $this->markTestIncomplete('Architecture tests to be implemented');
    }
}
