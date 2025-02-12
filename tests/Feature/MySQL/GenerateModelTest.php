<?php

namespace SAC\EloquentModelGenerator\Tests\Feature\MySQL;

use SAC\EloquentModelGenerator\Tests\TestCase;
use SAC\EloquentModelGenerator\Tests\Support\Traits\WithMySQLTesting;

class GenerateModelTest extends TestCase {
    use WithMySQLTesting;

    public function test_generates_model_from_mysql_table_with_all_column_types(): void {
        // Your test implementation here
        expect(true)->toBeTrue();
    }
}
