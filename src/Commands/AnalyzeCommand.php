<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Commands;

use Illuminate\Console\Command;
use SAC\EloquentModelGenerator\Contracts\SchemaAnalyzer;
use SAC\EloquentModelGenerator\Exceptions\ModelGeneratorException;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Yaml\Yaml;

class AnalyzeCommand extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'model:analyze
        {table? : The table to analyze (optional, analyzes all tables if not specified)}
        {--format=text : Output format (text, json, or yaml)}
        {--output= : Output file path}
        {--with-relationships : Include relationship analysis}
        {--with-indexes : Include index analysis}
        {--with-foreign-keys : Include foreign key analysis}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Analyze database table schema for model generation';

    public function __construct(
        private readonly SchemaAnalyzer $analyzer
    ) {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle(): int {
        try {
            $table = $this->argument('table');

            if ($table) {
                return $this->analyzeTable($table);
            }

            return $this->analyzeAllTables();
        } catch (ModelGeneratorException $e) {
            $this->error("Analysis failed: {$e->getMessage()}");
            $this->error($e->getPrevious() ? $e->getPrevious()->getMessage() : '');
            return Command::FAILURE;
        }
    }

    /**
     * Analyze a single table.
     */
    private function analyzeTable(string $table): int {
        $this->info("Analyzing table: {$table}");

        $schema = $this->analyzer->analyze($table);
        $this->outputAnalysis([$table => $schema]);

        return Command::SUCCESS;
    }

    /**
     * Analyze all tables.
     */
    private function analyzeAllTables(): int {
        $this->info('Analyzing all tables...');

        $tables = $this->analyzer->getTables();
        $analysis = [];

        foreach ($tables as $table) {
            $this->line("Analyzing {$table}...");
            $analysis[$table] = $this->analyzer->analyze($table);
        }

        $this->outputAnalysis($analysis);

        return Command::SUCCESS;
    }

    /**
     * Output the analysis results.
     *
     * @param array<string, array<string, mixed>> $analysis
     */
    private function outputAnalysis(array $analysis): void {
        $format = $this->option('format');
        $output = $this->option('output');

        $formatted = match ($format) {
            'json' => json_encode($analysis, JSON_PRETTY_PRINT),
            'yaml' => Yaml::dump($analysis, 4, 2),
            default => $this->formatTextOutput($analysis),
        };

        if ($output) {
            file_put_contents($output, $formatted);
            $this->info("Analysis written to: {$output}");
            return;
        }

        $this->line($formatted);
    }

    /**
     * Format analysis results as text.
     *
     * @param array<string, array<string, mixed>> $analysis
     */
    private function formatTextOutput(array $analysis): string {
        $output = [];

        foreach ($analysis as $table => $schema) {
            $output[] = "Table: {$table}";
            $output[] = str_repeat('-', strlen($table) + 7);

            // Columns
            $output[] = "\nColumns:";
            foreach ($schema['columns'] as $name => $column) {
                $type = $column['type'];
                $nullable = $column['nullable'] ? 'NULL' : 'NOT NULL';
                $default = isset($column['default']) ? "DEFAULT '{$column['default']}'" : '';
                $output[] = "  {$name}: {$type} {$nullable} {$default}";
            }

            // Indexes
            if ($this->option('with-indexes') && isset($schema['indexes'])) {
                $output[] = "\nIndexes:";
                foreach ($schema['indexes'] as $name => $index) {
                    $columns = implode(', ', $index['columns']);
                    $output[] = "  {$name}: {$index['type']} ({$columns})";
                }
            }

            // Foreign Keys
            if ($this->option('with-foreign-keys') && isset($schema['foreignKeys'])) {
                $output[] = "\nForeign Keys:";
                foreach ($schema['foreignKeys'] as $name => $fk) {
                    $columns = implode(', ', array_keys($fk['columns']));
                    $output[] = "  {$name}: REFERENCES {$fk['table']} ({$columns})";
                }
            }

            // Relationships
            if ($this->option('with-relationships') && isset($schema['relations'])) {
                $output[] = "\nRelationships:";
                foreach ($schema['relations'] as $name => $relation) {
                    $output[] = "  {$name}: {$relation['type']} -> {$relation['model']}";
                }
            }

            $output[] = "\n";
        }

        return implode("\n", $output);
    }

    /**
     * Get the console command arguments.
     *
     * @return array<array{0: string, 1: int|null, 2: string}>
     */
    protected function getArguments(): array {
        return [
            ['table', InputArgument::OPTIONAL, 'The table to analyze'],
        ];
    }

    /**
     * Get the console command options.
     *
     * @return array<array{0: string, 1: string|null, 2: int|null, 3: string}>
     */
    protected function getOptions(): array {
        return [
            ['format', null, InputOption::VALUE_OPTIONAL, 'Output format (text, json, or yaml)', 'text'],
            ['output', null, InputOption::VALUE_OPTIONAL, 'Output file path'],
            ['with-relationships', null, InputOption::VALUE_NONE, 'Include relationship analysis'],
            ['with-indexes', null, InputOption::VALUE_NONE, 'Include index analysis'],
            ['with-foreign-keys', null, InputOption::VALUE_NONE, 'Include foreign key analysis'],
        ];
    }
}