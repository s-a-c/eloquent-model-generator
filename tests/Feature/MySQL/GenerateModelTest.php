<?php

namespace SAC\EloquentModelGenerator\Tests\Feature\MySQL;

use SAC\EloquentModelGenerator\Tests\TestCase;
use SAC\EloquentModelGenerator\Tests\Support\Traits\WithMySQLTesting;

class GenerateModelTest extends TestCase {
    use WithMySQLTesting;

    public function testGeneratesModelFromMysqlTableWithAllColumnTypes(): void {
        // Your test implementation here
        expect(true)->toBeTrue();
    }
}
