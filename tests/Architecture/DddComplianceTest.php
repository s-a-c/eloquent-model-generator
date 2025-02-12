<?php

namespace SAC\EloquentModelGenerator\Tests\Architecture;

use PHPUnit\Framework\TestCase;

class DddComplianceTest extends ArchitectureTestCase {
    /**
     * @test
     */
    public function application_layer_only_depends_on_domain_layer(): void {
        $this->assertNamespaceExists($this->getApplicationNamespace());
        $this->assertNamespaceExists($this->getDomainNamespace());

        // TODO: Add proper architecture testing using PHPat or ArchUnit
        $this->markTestIncomplete('Architecture tests to be implemented');
    }

    /**
     * @test
     */
    public function domain_layer_has_no_external_dependencies(): void {
        $this->assertNamespaceExists($this->getDomainNamespace());

        // TODO: Add proper architecture testing using PHPat or ArchUnit
        $this->markTestIncomplete('Architecture tests to be implemented');
    }

    /**
     * @test
     */
    public function infrastructure_layer_implements_domain_interfaces(): void {
        $this->assertNamespaceExists($this->getInfrastructureNamespace());
        $this->assertNamespaceExists($this->getDomainNamespace() . '\\Contracts');

        // TODO: Add proper architecture testing using PHPat or ArchUnit
        $this->markTestIncomplete('Architecture tests to be implemented');
    }

    /**
     * @test
     */
    public function presentation_layer_only_depends_on_application_layer(): void {
        $this->assertNamespaceExists($this->getPresentationNamespace());
        $this->assertNamespaceExists($this->getApplicationNamespace());

        // TODO: Add proper architecture testing using PHPat or ArchUnit
        $this->markTestIncomplete('Architecture tests to be implemented');
    }
}
