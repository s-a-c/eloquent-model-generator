<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use SAC\EloquentModelGenerator\Services\ModelGeneratorService;
use Symfony\Component\Console\Output\OutputInterface;

class GenerateModelCommand extends Command
{
    private const DEFAULT_OUTPUT_PATH = 'app/Models';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'model:generate {table} {--namespace=} {--base-class=} {--soft-deletes} {--validation} {--relationships}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate an Eloquent model from a database table';

    private readonly ModelGeneratorService $modelGenerator;

    /**
     * Create a new command instance.
     */
    public function __construct(ModelGeneratorService $modelGenerator)
    {
        parent::__construct();
        $this->modelGenerator = $modelGenerator;
    }

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        try {
            $table = $this->argument('table');
            $options = [
                'namespace' => $this->option('namespace'),
                'base_class' => $this->option('base-class'),
                'with_soft_deletes' => $this->option('soft-deletes'),
                'with_validation' => $this->option('validation'),
                'with_relationships' => $this->option('relationships'),
            ];

            $model = $this->modelGenerator->generateModel($table, $options);
            $this->info("Model {$model->getClassName()} generated successfully!");

            return self::SUCCESS;
        } catch (\Throwable $e) {
            $this->error($e->getMessage());

            return self::FAILURE;
        }
    }

    /**
     * Get configuration for model generation.
     *
     * @return array{class_name?: string, namespace?: string, base_class?: string, with_soft_deletes?: bool, with_validation?: bool, with_relationships?: bool, output_path?: string}
     */
    private function getConfig(): array
    {
        $config = [];

        if ($namespace = $this->option('namespace')) {
            $config['namespace'] = is_array($namespace) ? implode('\\', $namespace) : (string) $namespace;
        }

        if ($output = $this->option('output')) {
            $config['output_path'] = is_array($output) ? implode('/', $output) : (string) $output;
        }

        $config['with_soft_deletes'] = $this->option('with-soft-deletes');
        $config['with_validation'] = $this->option('with-validation');
        $config['with_relationships'] = ! $this->option('no-relations');

        return $config;
    }

    /**
     * Generate models for all tables.
     *
     * @param  array{class_name?: string, namespace?: string, base_class?: string, with_soft_deletes?: bool, with_validation?: bool, with_relationships?: bool, output_path?: string}  $config
     */
    private function generateAllModels(array $config): int
    {
        $tables = $this->modelGenerator->getTables();
        if (empty($tables)) {
            $this->info('No tables found to generate models from.');

            return Command::SUCCESS;
        }

        /** @var array<string> $exclude */
        $exclude = array_filter((array) $this->option('exclude'), 'is_string');
        $tables = array_values(array_diff($tables, $exclude));

        $progress = $this->output->createProgressBar(count($tables));
        $progress->start();

        $success = true;
        foreach ($tables as $table) {
            if (! is_string($table)) {
                continue;
            }

            try {
                $this->generateModel($table, $config);
            } catch (\Exception $e) {
                $this->newLine();
                $this->error("Error generating model for table {$table}: ".$e->getMessage());
                $success = false;
            }

            $progress->advance();
        }

        $progress->finish();
        $this->newLine(2);

        return $success ? Command::SUCCESS : Command::FAILURE;
    }

    /**
     * Generate model for a single table.
     *
     * @param  array{class_name?: string, namespace?: string, base_class?: string, with_soft_deletes?: bool, with_validation?: bool, with_relationships?: bool, output_path?: string}  $config
     */
    private function generateSingleModel(string $table, array $config): int
    {
        try {
            $this->generateModel($table, $config);

            return Command::SUCCESS;
        } catch (\Exception $e) {
            $this->error("Error generating model for table {$table}: ".$e->getMessage());

            return Command::FAILURE;
        }
    }

    /**
     * Generate a model for a specific table.
     *
     * @param  array{class_name?: string, namespace?: string, base_class?: string, with_soft_deletes?: bool, with_validation?: bool, with_relationships?: bool, output_path?: string}  $config
     *
     * @throws \Exception If model generation fails
     */
    private function generateModel(string $table, array $config): void
    {
        // Generate the model definition
        $modelConfig = array_diff_key($config, ['output_path' => true]);
        /** @var array{class_name?: string, namespace?: string, base_class?: string, with_soft_deletes?: bool, with_validation?: bool, with_relationships?: bool} $modelConfig */
        $definition = $this->modelGenerator->generateModel($table, $modelConfig);

        // Get the output path
        $outputPath = $config['output_path'] ?? base_path(self::DEFAULT_OUTPUT_PATH);

        // Get the namespace and class name
        $namespace = $definition->getNamespace();
        $className = $definition->getClassName();

        // Check if file exists
        $filePath = $outputPath.'/'.str_replace('\\', '/', $namespace).'/'.$className.'.php';
        if (File::exists($filePath) && ! $this->option('force')) {
            throw new \RuntimeException("Model {$className} already exists. Use --force to overwrite.");
        }

        // Ensure the directory exists
        $directory = dirname($filePath);
        if (! File::exists($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        // Generate the model content
        $schema = $this->modelGenerator->getTableSchema($table);
        /** @var array{columns: array<string, array{type: non-empty-string, length?: int<1, max>|null, nullable?: bool, default?: mixed, unsigned?: bool, autoIncrement?: bool, primary?: bool, unique?: bool}>, relations?: array<string, array{type: non-empty-string, model: class-string, foreignKey?: non-empty-string, localKey?: non-empty-string, table?: non-empty-string, morphType?: non-empty-string, morphClass?: class-string, pivotTable?: non-empty-string}>, indexes?: array<string, array{type: 'primary'|'unique'|'index'|'fulltext'|'spatial', columns: array<string>, name?: string, algorithm?: string, options?: array<string, mixed>}>, foreignKeys?: array<string, array{table: string, columns: array<string, string>, onDelete?: string, onUpdate?: string}>, timestamps?: bool, softDeletes?: bool, primaryKey?: string, incrementing?: bool} $schema */
        $content = $this->templateEngine->render($definition, $schema);

        if (! is_string($content)) {
            throw new \RuntimeException('Failed to generate model content');
        }

        // Write the file
        File::put($filePath, $content);

        if ($this->getOutput()->getVerbosity() >= OutputInterface::VERBOSITY_VERBOSE) {
            $this->info("Generated model {$className} at {$namespace}\\{$className}");
        }
    }
}
