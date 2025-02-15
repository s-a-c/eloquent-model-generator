<?php

namespace SAC\EloquentModelGenerator\Tests\Support\Traits;

trait WithSQLServerTesting
{
    use WithDatabaseTesting;

    protected function defineEnvironment($app): void
    {
        parent::defineEnvironment($app);

        if (! extension_loaded('pdo_sqlsrv')) {
            $this->markTestSkipped('SQL Server extension is not available.');
        }

        $app['config']->set('database.default', 'sqlsrv');
        $app['config']->set('database.connections.sqlsrv', [
            'driver' => 'sqlsrv',
            'host' => env('DB_SQLSRV_HOST', 'localhost'),
            'port' => env('DB_SQLSRV_PORT', '1433'),
            'database' => env('DB_SQLSRV_DATABASE', 'testing'),
            'username' => env('DB_SQLSRV_USERNAME', 'sa'),
            'password' => env('DB_SQLSRV_PASSWORD', ''),
            'charset' => 'utf8',
            'prefix' => '',
            'trust_server_certificate' => true,
        ]);

        $this->createTestDatabase(env('DB_SQLSRV_DATABASE', 'testing'));
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        $this->dropTestDatabase(env('DB_SQLSRV_DATABASE', 'testing'));
    }
}
