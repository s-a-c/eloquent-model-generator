<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Console\Commands;

use Illuminate\Console\Command;
use SAC\EloquentModelGenerator\Services\ModelGeneratorService;
use Symfony\Component\Console\Output\OutputInterface;

class ListTablesCommand extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'model:list
                          {--connection= : The database connection to use}
                          {--format=table : Output format (table, json, or list)}
                          {--v|verbose : Show additional table information}';

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
    public function handle(): int {
        try {
            // Set database connection if specified
            $connection = $this->option('connection');
            if ($connection) {
                config(['database.default' => $connection]);
            }

            // Get tables
            $tables = $this->modelGeneratorService->getTables();
            if (empty($tables)) {
                $this->info('No tables found in the database.');
                return Command::SUCCESS;
            }

            // Format and display results
            return match ($this->option('format')) {
                'json' => $this->outputJson($tables),
                'list' => $this->outputList($tables),
                default => $this->outputTable($tables),
            };
        } catch (\Exception $e) {
            $this->error('Error listing tables: ' . $e->getMessage());

            if ($this->getOutput()->getVerbosity() >= OutputInterface::VERBOSITY_VERBOSE) {
                $this->error($e->getTraceAsString());
            }

            return Command::FAILURE;
        }
    }

    /**
     * Output tables in JSON format.
     *
     * @param array<string> $tables
     */
    private function outputJson(array $tables): int {
        $this->line(json_encode($tables, JSON_PRETTY_PRINT));
        return Command::SUCCESS;
    }

    /**
     * Output tables in list format.
     *
     * @param array<string> $tables
     */
    private function outputList(array $tables): int {
        foreach ($tables as $table) {
            $this->line($table);
        }
        return Command::SUCCESS;
    }

    /**
     * Output tables in table format.
     *
     * @param array<string> $tables
     */
    private function outputTable(array $tables): int {
        $headers = ['Table Name'];
        if ($this->option('verbose')) {
            $headers[] = 'Columns';
            $headers[] = 'Has Relations';
        }

        $rows = array_map(function ($table) {
            $row = [$table];
            if ($this->option('verbose')) {
                $schema = $this->modelGeneratorService->getTableSchema($table);
                $row[] = count($schema['columns'] ?? []);
                $row[] = !empty($schema['relations']) ? 'Yes' : 'No';
            }
            return $row;
        }, $tables);

        $this->table($headers, $rows);
        return Command::SUCCESS;
    }
}
