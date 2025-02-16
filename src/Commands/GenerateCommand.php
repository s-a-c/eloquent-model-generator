<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Commands;

use Illuminate\Console\Command;
use SAC\EloquentModelGenerator\Contracts\ModelGenerator;
use SAC\EloquentModelGenerator\Exceptions\ModelGeneratorException;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class GenerateCommand extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'model:generate
        {table : The table to generate a model for}
        {--namespace=App\\Models : The namespace for the generated model}
        {--path= : The path where the model will be created}
        {--base-class=Illuminate\\Database\\Eloquent\\Model : The base class for the model}
        {--with-soft-deletes : Include soft deletes in the model}
        {--with-validation : Include validation rules in the model}
        {--with-relationships : Include relationships in the model}
        {--force : Force overwrite if the model already exists}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate an Eloquent model from a database table';

    public function __construct(
        private readonly ModelGenerator $generator
    ) {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle(): int {
        try {
            $table = $this->argument('table');
            $this->info("Generating model for table: {$table}");

            // Check if model exists and handle force option
            if ($this->generator->modelExists($table) && !$this->option('force')) {
                $this->error("Model already exists. Use --force to overwrite.");
                return Command::FAILURE;
            }

            // Generate the model
            $this->info('Analyzing table structure...');
            $model = $this->generator->generate($table);

            // Write the model to file
            $path = $this->getModelPath($table);
            file_put_contents($path, $model);

            $this->info("Model generated successfully: {$path}");
            return Command::SUCCESS;
        } catch (ModelGeneratorException $e) {
            $this->error("Failed to generate model: {$e->getMessage()}");
            $this->error($e->getPrevious() ? $e->getPrevious()->getMessage() : '');
            return Command::FAILURE;
        }
    }

    /**
     * Get the path where the model should be created.
     */
    private function getModelPath(string $table): string {
        $namespace = $this->option('namespace');
        $path = $this->option('path') ?: app_path('Models');
        $className = str($table)->singular()->studly();

        $relativePath = str_replace('\\', '/', $namespace);
        return rtrim($path, '/') . '/' . $relativePath . '/' . $className . '.php';
    }

    /**
     * Get the console command arguments.
     *
     * @return array<array{0: string, 1: int|null, 2: string}>
     */
    protected function getArguments(): array {
        return [
            ['table', InputArgument::REQUIRED, 'The table to generate a model for'],
        ];
    }

    /**
     * Get the console command options.
     *
     * @return array<array{0: string, 1: string|null, 2: int|null, 3: string}>
     */
    protected function getOptions(): array {
        return [
            ['namespace', null, InputOption::VALUE_OPTIONAL, 'The namespace for the generated model', 'App\\Models'],
            ['path', null, InputOption::VALUE_OPTIONAL, 'The path where the model will be created'],
            ['base-class', null, InputOption::VALUE_OPTIONAL, 'The base class for the model', 'Illuminate\\Database\\Eloquent\\Model'],
            ['with-soft-deletes', null, InputOption::VALUE_NONE, 'Include soft deletes in the model'],
            ['with-validation', null, InputOption::VALUE_NONE, 'Include validation rules in the model'],
            ['with-relationships', null, InputOption::VALUE_NONE, 'Include relationships in the model'],
            ['force', null, InputOption::VALUE_NONE, 'Force overwrite if the model already exists'],
        ];
    }
}