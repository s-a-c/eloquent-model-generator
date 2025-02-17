<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\ServiceProvider;
use SAC\EloquentModelGenerator\EventSourcing\DatabaseEventStore;
use SAC\EloquentModelGenerator\EventSourcing\EventStore;
use SAC\EloquentModelGenerator\Services\ModelAnalyzer;
use SAC\EloquentModelGenerator\Subscribers\ModelGenerationSubscriber;

final class GeneratorServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(EventStore::class, DatabaseEventStore::class);

        $this->app->when(DatabaseEventStore::class)
            ->needs('$table')
            ->give('domain_events');

        $this->app->singleton(ModelAnalyzer::class);
    }

    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');

        Event::subscribe(ModelGenerationSubscriber::class);

        Queue::looping(function () {
            while (DB::transactionLevel() > 0) {
                DB::rollBack();
            }
        });

        Queue::failing(function ($event) {
            logger()->error('Queue job failed', [
                'connection' => $event->connectionName,
                'job' => $event->job->getName(),
                'exception' => $event->exception->getMessage(),
            ]);
        });
    }
}
