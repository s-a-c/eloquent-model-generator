<?php

namespace SAC\EloquentModelGenerator\Tests\Integration;

use Orchestra\Testbench\TestCase;

abstract class DatabaseTestCase extends TestCase
{
    protected function defineEnvironment($app): void
    {
        parent::defineEnvironment($app);

        if ($this->getConnectionDriver() === 'mongodb') {
            $app->register(\MongoDB\Laravel\MongoDBServiceProvider::class);
        }

        // Set up database configuration
        $app['config']->set('database.default', $this->getConnectionDriver());
        $app['config']->set(
            'database.connections.'.$this->getConnectionDriver(),
            $this->getConnectionConfig()
        );
    }

    abstract protected function getConnectionDriver(): string;

    abstract protected function getConnectionConfig(): array;
}
