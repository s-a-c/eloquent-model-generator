<?php

namespace SAC\EloquentModelGenerator\Tests\Support\Traits;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

trait WithDatabaseTesting {
    protected function setUpDatabase(): void {
        $this->createTestDatabase();
        $this->loadMigrations();
    }

    protected function tearDownDatabase(): void {
        Schema::dropAllTables();
        $this->dropTestDatabase();
    }

    protected function createTestDatabase(): void {
        $driver = config('database.default');
        $database = config("database.connections.{$driver}.database");

        switch ($driver) {
            case 'mysql':
                DB::statement("CREATE DATABASE IF NOT EXISTS {$database}");
                break;
            case 'pgsql':
                // Connect to 'postgres' database first to create the test database
                config(["database.connections.pgsql.database" => 'postgres']);
                DB::reconnect();
                DB::statement("CREATE DATABASE {$database}");
                // Reconnect to the test database
                config(["database.connections.pgsql.database" => $database]);
                DB::reconnect();
                break;
            case 'sqlsrv':
                if (!extension_loaded('sqlsrv')) {
                    $this->markTestSkipped('SQL Server extension is not available.');
                }
                DB::statement("IF NOT EXISTS (SELECT * FROM sys.databases WHERE name = '{$database}') CREATE DATABASE [{$database}]");
                break;
        }
    }

    protected function dropTestDatabase(): void {
        $driver = config('database.default');
        $database = config("database.connections.{$driver}.database");

        switch ($driver) {
            case 'mysql':
                DB::statement("DROP DATABASE IF EXISTS {$database}");
                break;
            case 'pgsql':
                // Connect to 'postgres' database first to drop the test database
                config(["database.connections.pgsql.database" => 'postgres']);
                DB::reconnect();
                DB::statement("DROP DATABASE IF EXISTS {$database}");
                break;
            case 'sqlsrv':
                if (extension_loaded('sqlsrv')) {
                    DB::statement("IF EXISTS (SELECT * FROM sys.databases WHERE name = '{$database}') DROP DATABASE [{$database}]");
                }
                break;
        }
    }

    protected function loadMigrations(): void {
        $this->artisan('migrate:fresh');
    }
}
