<?php

namespace SAC\EloquentModelGenerator\Tests\EdgeCases;

use SAC\EloquentModelGenerator\Tests\TestCase;
use SAC\EloquentModelGenerator\Services\ModelGeneratorService;
use SAC\EloquentModelGenerator\Exceptions\ModelGeneratorException;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;

/**
 * @group edge-cases
 */
class ModelGeneratorEdgeCaseTest extends TestCase {
    private ModelGeneratorService $service;

    protected function setUp(): void {
        parent::setUp();
        $this->service = $this->app->make(ModelGeneratorService::class);
    }

    protected function tearDown(): void {
        Schema::dropIfExists('edge_case_test');
        Schema::dropIfExists('edge_case_related');
        parent::tearDown();
    }

    /**
     * Test handling of a table with no columns (edge case)
     */
    public function test_handles_empty_table(): void {
        Schema::create('edge_case_test', function (Blueprint $table) {
            // Create table with no columns
        });

        $this->expectException(ModelGeneratorException::class);
        $this->expectExceptionMessage("No columns found for table 'edge_case_test'");

        $this->service->generateModel('edge_case_test');
    }

    /**
     * Test handling of column names with special characters
     */
    public function test_handles_special_characters_in_column_names(): void {
        Schema::create('edge_case_test', function (Blueprint $table) {
            $table->id();
            $table->string('special@column');
            $table->string('column-with-dashes');
            $table->string('column.with.dots');
        });

        $model = $this->service->generateModel('edge_case_test');

        $this->assertNotNull($model);
        $this->assertTrue(in_array('special@column', $model->getColumns()->pluck('name')->toArray()));
        $this->assertTrue(in_array('column-with-dashes', $model->getColumns()->pluck('name')->toArray()));
        $this->assertTrue(in_array('column.with.dots', $model->getColumns()->pluck('name')->toArray()));
    }

    /**
     * Test handling of table with maximum MySQL column count (1017 for InnoDB)
     */
    public function test_handles_maximum_column_count(): void {
        Schema::create('edge_case_test', function (Blueprint $table) {
            // Add maximum allowed columns for testing
            for ($i = 0; $i < 1000; $i++) {
                $table->string("column_{$i}")->nullable();
            }
        });

        $model = $this->service->generateModel('edge_case_test');
        $this->assertCount(1000, $model->getColumns());
    }

    /**
     * Test handling of extremely long table names
     */
    public function test_handles_long_table_name(): void {
        $longTableName = str_repeat('a', 64); // MySQL maximum table name length

        Schema::create($longTableName, function (Blueprint $table) {
            $table->id();
        });

        try {
            $model = $this->service->generateModel($longTableName);
            $this->assertNotNull($model);
        } finally {
            Schema::dropIfExists($longTableName);
        }
    }

    /**
     * Test handling of all possible MySQL column types
     */
    public function test_handles_all_column_types(): void {
        Schema::create('edge_case_test', function (Blueprint $table) {
            // Numeric types
            $table->tinyInteger('tiny_int');
            $table->smallInteger('small_int');
            $table->mediumInteger('medium_int');
            $table->integer('int');
            $table->bigInteger('big_int');
            $table->decimal('decimal', 8, 2);
            $table->float('float');
            $table->double('double');

            // String types
            $table->char('char', 100);
            $table->string('string');
            $table->text('text');
            $table->mediumText('medium_text');
            $table->longText('long_text');

            // Binary types
            $table->binary('binary');

            // Date and time types
            $table->date('date');
            $table->datetime('datetime');
            $table->time('time');
            $table->timestamp('timestamp');

            // Special types
            $table->json('json');
            $table->jsonb('jsonb');
            $table->uuid('uuid');
            $table->ipAddress('ip');
            $table->macAddress('mac');
        });

        $model = $this->service->generateModel('edge_case_test');
        $this->assertCount(23, $model->getColumns());
    }

    /**
     * Test handling of circular foreign key relationships
     */
    public function test_handles_circular_relationships(): void {
        Schema::create('edge_case_test', function (Blueprint $table) {
            $table->id();
            $table->foreignId('related_id')->nullable();
        });

        Schema::create('edge_case_related', function (Blueprint $table) {
            $table->id();
            $table->foreignId('test_id')->nullable();
        });

        Schema::table('edge_case_test', function (Blueprint $table) {
            $table->foreign('related_id')->references('id')->on('edge_case_related');
        });

        Schema::table('edge_case_related', function (Blueprint $table) {
            $table->foreign('test_id')->references('id')->on('edge_case_test');
        });

        $model = $this->service->generateModel('edge_case_test', ['with_relationships' => true]);
        $this->assertNotNull($model);
        $this->assertTrue($model->getRelations()->isNotEmpty());
    }

    /**
     * Test handling of reserved PHP keywords as column names
     */
    public function test_handles_reserved_keywords_as_column_names(): void {
        Schema::create('edge_case_test', function (Blueprint $table) {
            $table->id();
            $table->string('class');
            $table->string('function');
            $table->string('interface');
            $table->string('static');
            $table->string('array');
        });

        $model = $this->service->generateModel('edge_case_test');
        $this->assertNotNull($model);
        $this->assertTrue($model->getColumns()->contains(fn($col) => $col->getName() === 'class'));
        $this->assertTrue($model->getColumns()->contains(fn($col) => $col->getName() === 'function'));
    }

    /**
     * Test handling of non-standard character sets and collations
     */
    public function test_handles_non_standard_character_sets(): void {
        DB::statement('CREATE TABLE edge_case_test (
            id INT AUTO_INCREMENT PRIMARY KEY,
            utf8mb4_col VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
            binary_col VARCHAR(255) CHARACTER SET binary,
            custom_col VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_bin
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci');

        $model = $this->service->generateModel('edge_case_test');
        $this->assertNotNull($model);
        $this->assertCount(4, $model->getColumns());
    }
}
