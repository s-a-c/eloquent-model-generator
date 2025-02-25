<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Console\Commands;

use Illuminate\Console\Command;
use SAC\EloquentModelGenerator\Contracts\ModelGeneratorInterface;
use SAC\EloquentModelGenerator\Domain\ValueObjects\GenerationResult;
use SAC\EloquentModelGenerator\Exceptions\InvalidConfigurationException;
use SAC\EloquentModelGenerator\Exceptions\ModelGenerationException;
use Throwable;

/**
 * Artisan command for generating Eloquent models.
 */
final class GenerateModelsCommand extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'model:generate
                          {--table= : Generate model for specific table}
                          {--exclude= : Exclude specific tables (comma-separated)}
                          {--path= : Path where models will be generated}
                          {--namespace= : Namespace for generated models}
                          {--with-docs : Generate documentation}
                          {--force : Overwrite existing models}
                          {--analyze : Only analyze schema without generating models}
                          {--no-backup : Skip backing up existing files}
                          {--no-timestamps : Generate models without timestamps}
                          {--with-soft-deletes : Include soft deletes trait}
                          {--with-factory : Generate model factories}';

    /**
     * The console command description.
     */
    protected $description = 'Generate Eloquent models from SQLite database schema';

    public function __construct(
        private readonly ModelGeneratorInterface $generator,
    ) {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        try {
            // Get tables to process
            $tables = $this->getTablesToProcess();

            if (empty($tables)) {
                $this->error('No tables found to process.');

                return self::FAILURE;
            }

            $this->info(sprintf('Found %d tables to process.', count($tables)));

            // If only analyzing, run analysis and return
            if ($this->option('analyze')) {
                return $this->analyzeSchema($tables);
            }

            // Generate models
            $result = $this->generator->generate($tables, [
                'path' => $this->option('path'),
                'namespace' => $this->option('namespace'),
                'with_docs' => $this->option('with-docs'),
                'force' => $this->option('force'),
                'no_backup' => $this->option('no-backup'),
                'no_timestamps' => $this->option('no-timestamps'),
                'with_soft_deletes' => $this->option('with-soft-deletes'),
                'with_factory' => $this->option('with-factory'),
            ]);

            return $this->handleGenerationResult($result);
        } catch (InvalidConfigurationException $e) {
            $this->error('Configuration Error: '.$e->getMessage());
            if ($this->getOutput()->isVerbose()) {
                $this->error('Context: '.json_encode($e->getContext(), JSON_PRETTY_PRINT));
            }

            return self::FAILURE;
        } catch (ModelGenerationException $e) {
            $this->error('Generation Error: '.$e->getMessage());
            if ($this->getOutput()->isVerbose()) {
                $this->error('Stack trace:');
                $this->error($e->getTraceAsString());
            }

            return self::FAILURE;
        } catch (Throwable $e) {
            $this->error('Unexpected Error: '.$e->getMessage());
            if ($this->getOutput()->isVerbose()) {
                $this->error('Stack trace:');
                $this->error($e->getTraceAsString());
            }

            return self::FAILURE;
        }
    }

    /**
     * Get the tables to process based on command options.
     *
     * @return array<string>
     */
    private function getTablesToProcess(): array
    {
        // Get all tables from analyzer
        $tables = $this->generator->analyzeTables();

        // Filter by specific table if provided
        if ($tableName = $this->option('table')) {
            return array_filter(
                array_map(fn ($def) => $def->name, $tables),
                fn ($table) => $table === $tableName
            );
        }

        // Filter excluded tables
        $excludedTables = array_filter(
            explode(',', $this->option('exclude') ?? '')
        );

        return array_filter(
            array_map(fn ($def) => $def->name, $tables),
            fn ($table) => ! in_array($table, $excludedTables, true)
        );
    }

    /**
     * Analyze schema without generating models.
     *
     * @param  array<string>  $tables
     */
    private function analyzeSchema(array $tables): int
    {
        $this->info('Analyzing database schema...');

        $definitions = $this->generator->analyzeTables($tables);

        $rows = [];
        foreach ($definitions as $definition) {
            $rows[] = [
                $definition->name,
                count($definition->columns),
                count($definition->indices),
                count($definition->relationships),
            ];
        }

        $this->table(
            ['Table', 'Columns', 'Indices', 'Relationships'],
            $rows
        );

        return self::SUCCESS;
    }

    /**
     * Handle the generation result and display appropriate output.
     */
    private function handleGenerationResult(GenerationResult $result): int
    {
        // Display errors if any
        if (! empty($result->errors)) {
            $this->error('The following errors occurred during generation:');
            foreach ($result->errors as $error) {
                $this->error("- {$error}");
            }
        }

        // Display success message
        if (! empty($result->generatedFiles)) {
            $this->info('Successfully generated the following files:');
            foreach ($result->generatedFiles as $file) {
                $this->line("- {$file}");
            }
        }

        // Display metadata
        if ($this->getOutput()->isVerbose()) {
            $this->info('Generation Statistics:');
            $this->table(
                ['Metric', 'Value'],
                array_map(
                    fn ($key, $value) => [$key, is_numeric($value) ? number_format($value, 2) : $value],
                    array_keys($result->metadata),
                    array_values($result->metadata)
                )
            );
        }

        return empty($result->errors) ? self::SUCCESS : self::FAILURE;
    }
}
