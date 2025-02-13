<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Console;

use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use SAC\EloquentModelGenerator\Console\Commands\AnalyzeCommand;

class Kernel extends ConsoleKernel {
    /**
     * The Artisan commands provided by your application.
     *
     * @var array<class-string>
     */
    protected $commands = [
        AnalyzeCommand::class,
    ];

    /**
     * Register the commands for the application.
     */
    protected function commands(): void {
        $this->load(__DIR__ . '/Commands');
    }
}