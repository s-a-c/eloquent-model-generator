<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests\Integration\Database;

use Orchestra\Testbench\TestCase;
use SAC\EloquentModelGenerator\Services\Schema\SQLiteSchemaAnalyzer;
use SAC\EloquentModelGenerator\Services\TypeMapping\SQLiteTypeMapper;
use SAC\EloquentModelGenerator\Services\Relationships\SQLiteRelationshipDetector;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\QueryException;

/**
 * Database Integration Test Suite
 *
 * Tests database integration features including connection handling,
 * transaction support, and error handling.
 */
class DatabaseIntegrationTest extends TestCase {
    private SQLiteSchemaAnalyzer $schemaAnalyzer;
    private SQLiteTypeMapper $typeMapper;
    private SQLiteRelationshipDetector $relationshipDetector;

    protected function setUp(): void {
        parent::setUp();

        // Configure SQLite
        config(['database.default' => 'sqlite']);
        config(['database.connections.sqlite.database' => ':memory:']);

        $this->schemaAnalyzer = new SQLiteSchemaAnalyzer(DB::connection());
        $this->typeMapper = new SQLiteTypeMapper();
        $this->relationshipDetector = new SQLiteRelationshipDetector(DB::connection());
    }

    /**
     * @test
     * @group integration
     */
    public function testConnectionHandling(): void {
        // Test connection establishment
        $this->assertTrue(DB::connection()->getDatabaseName() === ':memory:');

        // Test connection switching
        config(['database.connections.sqlite_test' => [
            'driver' => 'sqlite',
            'database' => ':memory:',
        ]]);

        DB::purge();
        DB::setDefaultConnection('sqlite_test');

        $this->assertTrue(DB::getDefaultConnection() === 'sqlite_test');
        $this->assertTrue(DB::connection()->getDatabaseName() === ':memory:');
    }

    /**
     * @test
     * @group integration
     */
    public function testTransactionSupport(): void {
        Schema::create('test_transactions', function ($table) {
            $table->id();
            $table->string('name');
        });

        // Test successful transaction
        DB::transaction(function () {
            DB::table('test_transactions')->insert(['name' => 'test1']);
            DB::table('test_transactions')->insert(['name' => 'test2']);
        });

        $this->assertEquals(2, DB::table('test_transactions')->count());

        // Test transaction rollback
        try {
            DB::transaction(function () {
                DB::table('test_transactions')->insert(['name' => 'test3']);
                throw new \Exception('Force rollback');
            });
        } catch (\Exception $e) {
            // Transaction should be rolled back
        }

        $this->assertEquals(2, DB::table('test_transactions')->count());
        $this->assertFalse(DB::table('test_transactions')->where('name', 'test3')->exists());
    }

    /**
     * @test
     * @group integration
     */
    public function testErrorHandling(): void {
        Schema::create('test_errors', function ($table) {
            $table->id();
            $table->string('name')->unique();
        });

        // Test unique constraint violation
        DB::table('test_errors')->insert(['name' => 'unique_name']);

        $this->expectException(QueryException::class);
        DB::table('test_errors')->insert(['name' => 'unique_name']);

        // Test invalid column
        $this->expectException(QueryException::class);
        DB::table('test_errors')->insert(['invalid_column' => 'value']);

        // Test invalid table
        $this->expectException(QueryException::class);
        DB::table('nonexistent_table')->get();
    }

    /**
     * @test
     * @group integration
     */
    public function testLargeDatasetHandling(): void {
        Schema::create('test_large_data', function ($table) {
            $table->id();
            $table->string('data');
        });

        // Insert large dataset
        $data = [];
        for ($i = 0; $i < 1000; $i++) {
            $data[] = ['data' => str_repeat('a', 1000)];
        }

        // Test chunk insertion
        foreach (array_chunk($data, 100) as $chunk) {
            DB::table('test_large_data')->insert($chunk);
        }

        $this->assertEquals(1000, DB::table('test_large_data')->count());

        // Test chunk retrieval
        $count = 0;
        DB::table('test_large_data')->chunk(100, function ($records) use (&$count) {
            $count += count($records);
        });

        $this->assertEquals(1000, $count);
    }

    /**
     * @test
     * @group integration
     */
    public function testConcurrentAccess(): void {
        Schema::create('test_concurrent', function ($table) {
            $table->id();
            $table->integer('counter');
        });

        DB::table('test_concurrent')->insert(['counter' => 0]);

        // Test pessimistic locking
        DB::transaction(function () {
            $record = DB::table('test_concurrent')
                ->lockForUpdate()
                ->first();

            // Simulate some work
            sleep(1);

            DB::table('test_concurrent')
                ->where('id', $record->id)
                ->update(['counter' => $record->counter + 1]);
        });

        $this->assertEquals(1, DB::table('test_concurrent')->first()->counter);
    }

    /**
     * @test
     * @group integration
     */
    public function testQueryLogging(): void {
        DB::enableQueryLog();

        Schema::create('test_logging', function ($table) {
            $table->id();
            $table->string('name');
        });

        DB::table('test_logging')->insert(['name' => 'test']);
        DB::table('test_logging')->where('name', 'test')->first();

        $queryLog = DB::getQueryLog();

        $this->assertNotEmpty($queryLog);
        $this->assertCount(3, $queryLog); // Create table, insert, and select

        DB::disableQueryLog();
    }

    /**
     * @test
     * @group integration
     */
    public function testConnectionPooling(): void {
        $connections = [];

        // Test connection reuse
        for ($i = 0; $i < 5; $i++) {
            $connection = DB::connection();
            $connections[] = spl_object_hash($connection->getPdo());
        }

        // All connections should be the same object
        $this->assertCount(1, array_unique($connections));
    }

    /**
     * @test
     * @group integration
     */
    public function testDatabaseEvents(): void {
        $queries = [];

        // Listen for query events
        DB::listen(function ($query) use (&$queries) {
            $queries[] = $query->sql;
        });

        Schema::create('test_events', function ($table) {
            $table->id();
            $table->string('name');
        });

        DB::table('test_events')->insert(['name' => 'test']);

        $this->assertNotEmpty($queries);
        $this->assertCount(2, $queries); // Create table and insert
    }

    protected function tearDown(): void {
        Schema::dropIfExists('test_transactions');
        Schema::dropIfExists('test_errors');
        Schema::dropIfExists('test_large_data');
        Schema::dropIfExists('test_concurrent');
        Schema::dropIfExists('test_logging');
        Schema::dropIfExists('test_events');

        parent::tearDown();
    }
}