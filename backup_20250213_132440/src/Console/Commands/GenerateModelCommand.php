<?php

namespace SAC\EloquentModelGenerator\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use SAC\EloquentModelGenerator\Services\ModelGeneratorService;
use SAC\EloquentModelGenerator\Services\ModelGeneratorTemplateEngine;

class GenerateModelCommand extends Command
{
    private const DEFAULT_OUTPUT_PATH = 'app/Models';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'model:generate
                          {table? : The table to generate a model for}
                          {--all : Generate models for all tables}
                          {--exclude=* : Tables to exclude from generation}
                          {--namespace= : The namespace for the generated model}
                          {--output= : The output path for the generated model}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate Eloquent model from database table';

    /**
     * Create a new command instance.
     */
    public function __construct(
        private readonly ModelGeneratorService $modelGeneratorService,
        private readonly ModelGeneratorTemplateEngine $templateEngine
    ) {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        try {
            $table = $this->argument('table');
            $all = (bool) $this->option('all');
            /** @var array<string> $exclude */
            $exclude = array_filter((array) $this->option('exclude'), 'is_string');
            $namespace = $this->option('namespace');
            $output = $this->option('output');

            if (! $table && ! $all) {
                $this->error('Table name is required unless --all option is used');

                return 1;
            }

            /** @var array{class_name?: string, namespace?: string, base_class?: string, with_soft_deletes?: bool, with_validation?: bool, with_relationships?: bool, output_path?: string} $config */
            $config = [];
            if ($namespace !== null) {
                $namespace = is_array($namespace) ? implode('\\', $namespace) : (string) $namespace;
                $config['namespace'] = $namespace;
            }
            if ($output !== null) {
                $output = is_array($output) ? implode('/', $output) : (string) $output;
                $config['output_path'] = $output;
            }

            if ($all) {
                $tables = $this->modelGeneratorService->getTables();
                if (empty($tables)) {
                    $this->info('No tables found to generate models from.');

                    return 0;
                }

                $tables = array_values(array_diff($tables, $exclude));
                foreach ($tables as $table) {
                    if (is_string($table)) {
                        $this->generateModel($table, $config);
                    }
                }
            } elseif (is_string($table)) {
                $this->generateModel($table, $config);
            }

            return 0;
        } catch (\Exception $e) {
            $this->error('Error generating model: '.$e->getMessage());

            return 1;
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
        $definition = $this->modelGeneratorService->generateModel($table, $modelConfig);

        // Get the output path
        $outputPath = $config['output_path'] ?? base_path(self::DEFAULT_OUTPUT_PATH);

        // Get the namespace and class name
        $namespace = $definition->getNamespace();
        $className = $definition->getClassName();

        // Ensure the directory exists
        $directory = dirname($outputPath.'/'.str_replace('\\', '/', $namespace).'/'.$className.'.php');
        if (! File::exists($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        // Generate the model content
        $schema = $this->modelGeneratorService->getTableSchema($table);
        /** @var array{columns: array<string, array{type: non-empty-string, length?: int<1, max>|null, nullable?: bool, default?: mixed, unsigned?: bool, autoIncrement?: bool, primary?: bool, unique?: bool}>, relations?: array<string, array{type: non-empty-string, model: class-string, foreignKey?: non-empty-string, localKey?: non-empty-string, table?: non-empty-string, morphType?: non-empty-string, morphClass?: class-string, pivotTable?: non-empty-string}>, indexes?: array<string, array{type: 'primary'|'unique'|'index'|'fulltext'|'spatial', columns: array<string>, name?: string, algorithm?: string, options?: array<string, mixed>}>, foreignKeys?: array<string, array{table: string, columns: array<string, string>, onDelete?: string, onUpdate?: string}>, timestamps?: bool, softDeletes?: bool, primaryKey?: string, incrementing?: bool} $schema */
        $content = $this->templateEngine->render($definition, $schema);

        if (! is_string($content)) {
            throw new \RuntimeException('Failed to generate model content');
        }

        // Write the file
        $filePath = $outputPath.'/'.str_replace('\\', '/', $namespace).'/'.$className.'.php';
        File::put($filePath, $content);

        $this->info("Generated model {$className} at {$namespace}\\{$className}");
    }
}
