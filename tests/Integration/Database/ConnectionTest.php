<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests\Integration\Database;

use Orchestra\Testbench\TestCase;
use SAC\EloquentModelGenerator\Services\Schema\{
    MySQLSchemaAnalyzer,
    PostgreSQLSchemaAnalyzer,
    SQLiteSchemaAnalyzer
};
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Connection;

class ConnectionTest extends TestCase {
    protected function getPackageProviders($app): array {
        return [
            'SAC\EloquentModelGenerator\Providers\ModelGeneratorServiceProvider',
        ];
    }

    public function testMySQLConnection(): void {
        // Configure MySQL connection
        config([
            'database.default' => 'mysql',
            'database.connections.mysql' => [
                'driver' => 'mysql',
                'host' => env('DB_HOST', '127.0.0.1'),
                'port' => env('DB_PORT', '3306'),
                'database' => env('DB_DATABASE', 'test_db'),
                'username' => env('DB_USERNAME', 'root'),
                'password' => env('DB_PASSWORD', ''),
            ],
        ]);

        $analyzer = new MySQLSchemaAnalyzer(DB::connection());

        // Create test table
        DB::statement('
            CREATE TABLE IF NOT EXISTS users (
                id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(255) NOT NULL,
                email VARCHAR(255) UNIQUE NOT NULL,
                created_at TIMESTAMP NULL,
                updated_at TIMESTAMP NULL
            )
        ');

        $schema = $analyzer->analyze('users');

        $this->assertArrayHasKey('columns', $schema);
        $this->assertArrayHasKey('relationships', $schema);
        $this->assertArrayHasKey('id', $schema['columns']);
        $this->assertArrayHasKey('name', $schema['columns']);
        $this->assertArrayHasKey('email', $schema['columns']);

        // Clean up
        DB::statement('DROP TABLE IF EXISTS users');
    }

    public function testPostgreSQLConnection(): void {
        // Configure PostgreSQL connection
        config([
            'database.default' => 'pgsql',
            'database.connections.pgsql' => [
                'driver' => 'pgsql',
                'host' => env('DB_HOST', '127.0.0.1'),
                'port' => env('DB_PORT', '5432'),
                'database' => env('DB_DATABASE', 'test_db'),
                'username' => env('DB_USERNAME', 'postgres'),
                'password' => env('DB_PASSWORD', ''),
            ],
        ]);

        $analyzer = new PostgreSQLSchemaAnalyzer(DB::connection());

        // Create test table
        DB::statement('
            CREATE TABLE IF NOT EXISTS users (
                id SERIAL PRIMARY KEY,
                name VARCHAR(255) NOT NULL,
                email VARCHAR(255) UNIQUE NOT NULL,
                created_at TIMESTAMP NULL,
                updated_at TIMESTAMP NULL
            )
        ');

        $schema = $analyzer->analyze('users');

        $this->assertArrayHasKey('columns', $schema);
        $this->assertArrayHasKey('relationships', $schema);
        $this->assertArrayHasKey('id', $schema['columns']);
        $this->assertArrayHasKey('name', $schema['columns']);
        $this->assertArrayHasKey('email', $schema['columns']);

        // Clean up
        DB::statement('DROP TABLE IF EXISTS users');
    }

    public function testSQLiteConnection(): void {
        // Configure SQLite connection
        config([
            'database.default' => 'sqlite',
            'database.connections.sqlite' => [
                'driver' => 'sqlite',
                'database' => ':memory:',
            ],
        ]);

        $analyzer = new SQLiteSchemaAnalyzer(DB::connection());

        // Create test table
        DB::statement('
            CREATE TABLE IF NOT EXISTS users (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                name TEXT NOT NULL,
                email TEXT UNIQUE NOT NULL,
                created_at TIMESTAMP NULL,
                updated_at TIMESTAMP NULL
            )
        ');

        $schema = $analyzer->analyze('users');

        $this->assertArrayHasKey('columns', $schema);
        $this->assertArrayHasKey('relationships', $schema);
        $this->assertArrayHasKey('id', $schema['columns']);
        $this->assertArrayHasKey('name', $schema['columns']);
        $this->assertArrayHasKey('email', $schema['columns']);
    }

    public function testConnectionWithCustomPrefix(): void {
        config([
            'database.default' => 'mysql',
            'database.connections.mysql.prefix' => 'prefix_',
        ]);

        $analyzer = new MySQLSchemaAnalyzer(DB::connection());

        // Create test table
        DB::statement('
            CREATE TABLE IF NOT EXISTS prefix_users (
                id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(255) NOT NULL
            )
        ');

        $schema = $analyzer->analyze('users'); // Should work without prefix

        $this->assertArrayHasKey('columns', $schema);
        $this->assertArrayHasKey('id', $schema['columns']);
        $this->assertArrayHasKey('name', $schema['columns']);

        // Clean up
        DB::statement('DROP TABLE IF EXISTS prefix_users');
    }

    public function testConnectionWithSchema(): void {
        config([
            'database.default' => 'pgsql',
            'database.connections.pgsql.schema' => 'custom_schema',
        ]);

        $analyzer = new PostgreSQLSchemaAnalyzer(DB::connection());

        // Create schema and test table
        DB::statement('CREATE SCHEMA IF NOT EXISTS custom_schema');
        DB::statement('
            CREATE TABLE IF NOT EXISTS custom_schema.users (
                id SERIAL PRIMARY KEY,
                name VARCHAR(255) NOT NULL
            )
        ');

        $schema = $analyzer->analyze('users');

        $this->assertArrayHasKey('columns', $schema);
        $this->assertArrayHasKey('id', $schema['columns']);
        $this->assertArrayHasKey('name', $schema['columns']);

        // Clean up
        DB::statement('DROP TABLE IF EXISTS custom_schema.users');
        DB::statement('DROP SCHEMA IF EXISTS custom_schema');
    }

    public function testConnectionWithReadReplica(): void {
        config([
            'database.default' => 'mysql',
            'database.connections.mysql.read' => [
                'host' => env('DB_READ_HOST', '127.0.0.1'),
            ],
        ]);

        $analyzer = new MySQLSchemaAnalyzer(DB::connection());

        // Create test table on write connection
        DB::statement('
            CREATE TABLE IF NOT EXISTS users (
                id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(255) NOT NULL
            )
        ');

        $schema = $analyzer->analyze('users');

        $this->assertArrayHasKey('columns', $schema);
        $this->assertArrayHasKey('id', $schema['columns']);
        $this->assertArrayHasKey('name', $schema['columns']);

        // Clean up
        DB::statement('DROP TABLE IF EXISTS users');
    }

    public function testConnectionWithUnicode(): void {
        config([
            'database.default' => 'mysql',
            'database.connections.mysql.charset' => 'utf8mb4',
            'database.connections.mysql.collation' => 'utf8mb4_unicode_ci',
        ]);

        $analyzer = new MySQLSchemaAnalyzer(DB::connection());

        // Create test table with unicode columns
        DB::statement('
            CREATE TABLE IF NOT EXISTS users (
                id INT AUTO_INCREMENT PRIMARY KEY,
                名前 VARCHAR(255) NOT NULL,
                电子邮件 VARCHAR(255) NOT NULL
            )
        ');

        $schema = $analyzer->analyze('users');

        $this->assertArrayHasKey('columns', $schema);
        $this->assertArrayHasKey('名前', $schema['columns']);
        $this->assertArrayHasKey('电子邮件', $schema['columns']);

        // Clean up
        DB::statement('DROP TABLE IF EXISTS users');
    }
}