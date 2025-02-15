<?php

declare(strict_types=1);

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
    protected $signature = 'model:list-tables';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List all available database tables';

    public function __construct(private readonly ModelGeneratorService $modelGenerator)
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        try {
            $tables = $this->modelGenerator->getTables();
            $this->table(['Table Name'], array_map(fn ($table) => [$table], $tables));

            return self::SUCCESS;
        } catch (\Throwable $e) {
            $this->error($e->getMessage());

            return self::FAILURE;
        }
    }

    /**
     * Output tables in JSON format.
     *
     * @param  array<string>  $tables
     */
    private function outputJson(array $tables): int
    {
        $this->line(json_encode($tables, JSON_PRETTY_PRINT));

        return Command::SUCCESS;
    }

    /**
     * Output tables in list format.
     *
     * @param  array<string>  $tables
     */
    private function outputList(array $tables): int
    {
        foreach ($tables as $table) {
            $this->line($table);
        }

        return Command::SUCCESS;
    }

    /**
     * Output tables in table format.
     *
     * @param  array<string>  $tables
     */
    private function outputTable(array $tables): int
    {
        $headers = ['Table Name'];
        if ($this->option('verbose')) {
            $headers[] = 'Columns';
            $headers[] = 'Has Relations';
        }

        $rows = array_map(function ($table) {
            $row = [$table];
            if ($this->option('verbose')) {
                $schema = $this->modelGenerator->getTableSchema($table);
                $row[] = count($schema['columns'] ?? []);
                $row[] = ! empty($schema['relations']) ? 'Yes' : 'No';
            }

            return $row;
        }, $tables);

        $this->table($headers, $rows);

        return Command::SUCCESS;
    }
}
