<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Jobs\Middleware;

use Illuminate\Contracts\Queue\Job;
use Illuminate\Support\Facades\Redis;

final class RateLimitedJob
{
    public function __construct(
        private readonly int $allowedJobs = 10,
        private readonly int $perSeconds = 60
    ) {}

    public function handle(Job $job, callable $next): void
    {
        Redis::throttle('model-generation')
            ->allow($this->allowedJobs)
            ->every($this->perSeconds)
            ->then(
                fn() => $next($job),
                fn() => $job->release($this->perSeconds)
            );
    }
}
