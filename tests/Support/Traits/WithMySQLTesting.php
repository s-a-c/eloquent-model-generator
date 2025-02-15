<?php

namespace SAC\EloquentModelGenerator\Tests\Support\Traits;

trait WithMySQLTesting
{
    use WithDatabaseTesting;

    protected function defineEnvironment($app): void
    {
        parent::defineEnvironment($app);

        if (! extension_loaded('pdo_mysql')) {
            $this->markTestSkipped('MySQL extension is not available.');
        }

        $app['config']->set('database.default', 'mysql');
        $app['config']->set('database.connections.mysql', [
            'driver' => 'mysql',
            'host' => env('DB_MYSQL_HOST', '127.0.0.1'),
            'port' => env('DB_MYSQL_PORT', '3306'),
            'database' => env('DB_MYSQL_DATABASE', 'testing'),
            'username' => env('DB_MYSQL_USERNAME', 'root'),
            'password' => env('DB_MYSQL_PASSWORD', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
        ]);

        $this->createTestDatabase(env('DB_MYSQL_DATABASE', 'testing'));
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        $this->dropTestDatabase(env('DB_MYSQL_DATABASE', 'testing'));
    }
}
