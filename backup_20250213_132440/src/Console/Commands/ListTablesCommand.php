<?php

namespace SAC\EloquentModelGenerator\Console\Commands;

use Illuminate\Console\Command;
use SAC\EloquentModelGenerator\Services\ModelGeneratorService;

class ListTablesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'model:list-tables
                          {--connection= : The database connection to use}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List all tables available for model generation';

    /**
     * Create a new command instance.
     */
    public function __construct(
        private readonly ModelGeneratorService $modelGeneratorService
    ) {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        try {
            $connection = $this->option('connection');
            if ($connection) {
                config(['database.default' => $connection]);
            }

            $tables = $this->modelGeneratorService->getTables();

            if (empty($tables)) {
                $this->info('No tables found in the database.');

                return 0;
            }

            $this->table(
                ['Table Name'],
                array_map(fn ($table) => [$table], $tables)
            );

            return 0;
        } catch (\Exception $e) {
            $this->error('Error listing tables: '.$e->getMessage());

            return 1;
        }
    }
}
