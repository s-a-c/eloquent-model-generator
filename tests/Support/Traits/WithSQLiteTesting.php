<?php

namespace SAC\EloquentModelGenerator\Tests\Support\Traits;

trait WithSQLiteTesting
{
    use WithDatabaseTesting;

    protected function defineEnvironment($app): void
    {
        parent::defineEnvironment($app);

        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
            'foreign_key_constraints' => true,
        ]);
    }
}
