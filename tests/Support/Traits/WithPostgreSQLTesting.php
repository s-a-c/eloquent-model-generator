<?php

namespace SAC\EloquentModelGenerator\Tests\Support\Traits;

trait WithPostgreSQLTesting {
    use WithDatabaseTesting;

    protected function defineEnvironment($app): void {
        parent::defineEnvironment($app);

        if (!extension_loaded('pdo_pgsql')) {
            $this->markTestSkipped('PostgreSQL extension is not available.');
        }

        $app['config']->set('database.default', 'pgsql');
        $app['config']->set('database.connections.pgsql', [
            'driver' => 'pgsql',
            'host' => env('DB_PGSQL_HOST', '127.0.0.1'),
            'port' => env('DB_PGSQL_PORT', '5432'),
            'database' => env('DB_PGSQL_DATABASE', 'testing'),
            'username' => env('DB_PGSQL_USERNAME', 'postgres'),
            'password' => env('DB_PGSQL_PASSWORD', ''),
            'charset' => 'utf8',
            'prefix' => '',
            'schema' => 'public',
            'sslmode' => 'prefer',
        ]);

        $this->createTestDatabase(env('DB_PGSQL_DATABASE', 'testing'));
    }

    protected function tearDown(): void {
        parent::tearDown();
        $this->dropTestDatabase(env('DB_PGSQL_DATABASE', 'testing'));
    }
}
