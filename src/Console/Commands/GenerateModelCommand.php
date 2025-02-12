<?php

namespace SAC\EloquentModelGenerator\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use SAC\EloquentModelGenerator\Services\ModelGeneratorService;
use SAC\EloquentModelGenerator\Infrastructure\Services\ConfigurationService;
use SAC\EloquentModelGenerator\Templates\ModelTemplate;

class GenerateModelCommand extends Command {
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
        private readonly ConfigurationService $configService,
        private readonly ModelTemplate $template
    ) {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle(): int {
        try {
            $table = $this->argument('table');
            $all = $this->option('all');
            $exclude = $this->option('exclude');
            $namespace = $this->option('namespace');
            $output = $this->option('output');

            if (!$table && !$all) {
                $this->error('Table name is required unless --all option is used');
                return 1;
            }

            $config = [];
            if ($namespace) {
                $config['namespace'] = $namespace;
            }
            if ($output) {
                $config['output_path'] = $output;
            }

            if ($all) {
                $tables = $this->modelGeneratorService->getTables();
                if (empty($tables)) {
                    $this->info('No tables found to generate models from.');
                    return 0;
                }

                $tables = array_diff($tables, $exclude);
                foreach ($tables as $table) {
                    $this->generateModel($table, $config);
                }
            } else {
                $this->generateModel($table, $config);
            }

            return 0;
        } catch (\Exception $e) {
            $this->error('Error generating model: ' . $e->getMessage());
            return 1;
        }
    }

    /**
     * Generate a model for a specific table.
     */
    private function generateModel(string $table, array $config): void {
        $model = $this->modelGeneratorService->generateModel($table, $config);

        // Get the output path
        $outputPath = $config['output_path'] ?? $this->configService->get('output_path');

        // Ensure the directory exists
        $directory = dirname($outputPath . '/' . str_replace('\\', '/', $model->getNamespace()) . '/' . $model->getClassName() . '.php');
        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        // Generate the model content
        $content = $this->template->generate($model);

        // Write the file
        $filePath = $model->getFilePath($outputPath);
        File::put($filePath, $content);

        $this->info("Generated model {$model->className} at {$model->getNamespace()}\\{$model->className}");
    }
}
