<?php

namespace SAC\EloquentModelGenerator\Tests\Integration\Database\Concerns;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use SAC\EloquentModelGenerator\Services\Schema\SchemaAnalyzerInterface;

trait TestsSchemaAnalyzer
{
    /** @test */
    public function it_detects_basic_column_types(): void
    {
        $this->createTestTable('test_types', [
            'id' => 'increments',
            'string_col' => 'string',
            'text_col' => 'text',
            'integer_col' => 'integer',
            'float_col' => 'float',
            'boolean_col' => 'boolean',
            'date_col' => 'date',
            'datetime_col' => 'datetime',
            'timestamp_col' => 'timestamp',
        ]);

        $analyzer = $this->app->make(SchemaAnalyzerInterface::class);
        $schema = $analyzer->analyze('test_types');
        $columns = $schema['columns'];

        $this->assertEquals('string', $columns['string_col']['type']);
        $this->assertEquals('text', $columns['text_col']['type']);
        $this->assertEquals('integer', $columns['integer_col']['type']);
        $this->assertEquals('float', $columns['float_col']['type']);
        $this->assertEquals('boolean', $columns['boolean_col']['type']);
        $this->assertEquals('date', $columns['date_col']['type']);
        $this->assertEquals('datetime', $columns['datetime_col']['type']);
        $this->assertEquals('datetime', $columns['timestamp_col']['type']);
    }

    /** @test */
    public function it_detects_nullable_fields(): void
    {
        $this->createTestTable('test_nullable', [
            'id' => 'increments',
            'required' => 'string',
            'nullable' => ['string', 'nullable'],
        ]);

        $analyzer = $this->app->make(SchemaAnalyzerInterface::class);
        $schema = $analyzer->analyze('test_nullable');
        $columns = $schema['columns'];

        $this->assertFalse($columns['required']['nullable']);
        $this->assertTrue($columns['nullable']['nullable']);
    }

    /** @test */
    public function it_detects_primary_keys(): void
    {
        $this->createTestTable('test_primary', [
            'id' => 'increments',
            'name' => 'string',
        ]);

        $analyzer = $this->app->make(SchemaAnalyzerInterface::class);
        $schema = $analyzer->analyze('test_primary');
        $columns = $schema['columns'];

        $this->assertTrue($columns['id']['primary']);
        $this->assertFalse($columns['name']['primary'] ?? false);
    }

    /** @test */
    public function it_detects_foreign_keys(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories');
            $table->string('title');
        });

        $analyzer = $this->app->make(SchemaAnalyzerInterface::class);
        $schema = $analyzer->analyze('posts');
        $relationships = $schema['relationships'];

        $this->assertArrayHasKey('category', $relationships);
        $this->assertEquals('belongsTo', $relationships['category']['type']);
        $this->assertEquals('categories', $relationships['category']['table']);
    }

    /** @test */
    public function it_detects_indexes(): void
    {
        $this->createTestTable('test_indexes', [
            'id' => 'increments',
            'email' => ['string', 'unique'],
            'username' => ['string', 'index'],
        ]);

        $analyzer = $this->app->make(SchemaAnalyzerInterface::class);
        $schema = $analyzer->analyze('test_indexes');
        $columns = $schema['columns'];

        $this->assertTrue($columns['email']['unique']);
        $this->assertTrue($columns['username']['index']);
    }

    /** @test */
    public function it_handles_empty_tables(): void
    {
        Schema::create('empty_table', function (Blueprint $table) {
            $table->id();
        });

        $analyzer = $this->app->make(SchemaAnalyzerInterface::class);
        $schema = $analyzer->analyze('empty_table');

        $this->assertArrayHasKey('columns', $schema);
        $this->assertCount(1, $schema['columns']);
    }

    /** @test */
    public function it_handles_missing_tables(): void
    {
        $analyzer = $this->app->make(SchemaAnalyzerInterface::class);

        $this->expectException(\StandAloneComplex\EloquentModelGenerator\Exceptions\ModelGeneratorSchemaAnalyzerException::class);
        $this->expectExceptionMessage("Table 'non_existent_table' does not exist");
        $analyzer->analyze('non_existent_table');
    }

    abstract protected function createTestTable(string $name, array $columns): void;
}
