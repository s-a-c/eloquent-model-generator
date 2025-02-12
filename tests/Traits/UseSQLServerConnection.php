<?php

namespace SAC\EloquentModelGenerator\Tests\Traits;

trait UseSQLServerConnection {
    protected function defineEnvironment($app): void {
        $app['config']->set('database.default', 'sqlsrv');
        $app['config']->set('database.connections.sqlsrv', [
            'driver' => 'sqlsrv',
            'host' => env('DB_SQLSRV_HOST', '127.0.0.1'),
            'port' => env('DB_SQLSRV_PORT', '1433'),
            'database' => env('DB_SQLSRV_DATABASE', 'testing'),
            'username' => env('DB_SQLSRV_USERNAME', 'sa'),
            'password' => env('DB_SQLSRV_PASSWORD', ''),
            'charset' => 'utf8',
            'prefix' => '',
            'trust_server_certificate' => true,
        ]);
    }
}
