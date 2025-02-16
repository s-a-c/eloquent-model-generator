<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Commands;

use Illuminate\Console\Command;
use SAC\EloquentModelGenerator\Contracts\{ModelGenerator, SchemaAnalyzer};
use SAC\EloquentModelGenerator\Exceptions\ModelGeneratorException;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Yaml\Yaml;

class MetricsCommand extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'model:metrics
        {model? : The model to analyze (optional, analyzes all models if not specified)}
        {--format=text : Output format (text, json, or yaml)}
        {--output= : Output file path}
        {--with-complexity : Include cyclomatic complexity metrics}
        {--with-dependencies : Include dependency metrics}
        {--with-inheritance : Include inheritance metrics}
        {--with-all : Include all available metrics}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate metrics for Eloquent models';

    public function __construct(
        private readonly ModelGenerator $generator,
        private readonly SchemaAnalyzer $analyzer
    ) {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle(): int {
        try {
            $model = $this->argument('model');

            if ($model) {
                return $this->analyzeModel($model);
            }

            return $this->analyzeAllModels();
        } catch (ModelGeneratorException $e) {
            $this->error("Metrics collection failed: {$e->getMessage()}");
            $this->error($e->getPrevious() ? $e->getPrevious()->getMessage() : '');
            return Command::FAILURE;
        }
    }

    /**
     * Analyze a single model.
     */
    private function analyzeModel(string $model): int {
        $this->info("Analyzing model: {$model}");

        $metrics = $this->collectMetrics($model);
        $this->outputMetrics([$model => $metrics]);

        return Command::SUCCESS;
    }

    /**
     * Analyze all models.
     */
    private function analyzeAllModels(): int {
        $this->info('Analyzing all models...');

        $tables = $this->analyzer->getTables();
        $metrics = [];

        foreach ($tables as $table) {
            if ($this->generator->modelExists($table)) {
                $this->line("Analyzing model for {$table}...");
                $metrics[$table] = $this->collectMetrics($table);
            }
        }

        $this->outputMetrics($metrics);

        return Command::SUCCESS;
    }

    /**
     * Collect metrics for a model.
     *
     * @return array<string, mixed>
     */
    private function collectMetrics(string $model): array {
        $metrics = [
            'attributes' => $this->collectAttributeMetrics($model),
            'relationships' => $this->collectRelationshipMetrics($model),
        ];

        if ($this->shouldCollectMetric('complexity')) {
            $metrics['complexity'] = $this->collectComplexityMetrics($model);
        }

        if ($this->shouldCollectMetric('dependencies')) {
            $metrics['dependencies'] = $this->collectDependencyMetrics($model);
        }

        if ($this->shouldCollectMetric('inheritance')) {
            $metrics['inheritance'] = $this->collectInheritanceMetrics($model);
        }

        return $metrics;
    }

    /**
     * Collect attribute-related metrics.
     *
     * @return array<string, int>
     */
    private function collectAttributeMetrics(string $model): array {
        $schema = $this->analyzer->analyze($model);

        return [
            'total_attributes' => count($schema['columns']),
            'fillable_attributes' => count(array_filter($schema['columns'], fn($col) => !$col['primary'] && !isset($col['computed']))),
            'computed_attributes' => count(array_filter($schema['columns'], fn($col) => isset($col['computed']))),
            'nullable_attributes' => count(array_filter($schema['columns'], fn($col) => $col['nullable'])),
            'unique_attributes' => count(array_filter($schema['columns'], fn($col) => $col['unique'] ?? false)),
        ];
    }

    /**
     * Collect relationship-related metrics.
     *
     * @return array<string, int>
     */
    private function collectRelationshipMetrics(string $model): array {
        $schema = $this->analyzer->analyze($model);

        $relationships = $schema['relations'] ?? [];
        $types = array_column($relationships, 'type');

        return [
            'total_relationships' => count($relationships),
            'has_one' => count(array_filter($types, fn($type) => $type === 'hasOne')),
            'has_many' => count(array_filter($types, fn($type) => $type === 'hasMany')),
            'belongs_to' => count(array_filter($types, fn($type) => $type === 'belongsTo')),
            'belongs_to_many' => count(array_filter($types, fn($type) => $type === 'belongsToMany')),
            'morph_relationships' => count(array_filter($types, fn($type) => str_starts_with($type, 'morph'))),
        ];
    }

    /**
     * Collect complexity metrics.
     *
     * @return array<string, int>
     */
    private function collectComplexityMetrics(string $model): array {
        // TODO: Implement complexity metrics collection
        return [
            'cyclomatic_complexity' => 0,
            'cognitive_complexity' => 0,
            'maintainability_index' => 0,
        ];
    }

    /**
     * Collect dependency metrics.
     *
     * @return array<string, int>
     */
    private function collectDependencyMetrics(string $model): array {
        // TODO: Implement dependency metrics collection
        return [
            'direct_dependencies' => 0,
            'indirect_dependencies' => 0,
            'dependency_depth' => 0,
        ];
    }

    /**
     * Collect inheritance metrics.
     *
     * @return array<string, int>
     */
    private function collectInheritanceMetrics(string $model): array {
        // TODO: Implement inheritance metrics collection
        return [
            'inheritance_depth' => 0,
            'number_of_children' => 0,
            'methods_inherited' => 0,
        ];
    }

    /**
     * Check if a specific metric should be collected.
     */
    private function shouldCollectMetric(string $metric): bool {
        if ($this->option('with-all')) {
            return true;
        }

        return $this->option("with-{$metric}");
    }

    /**
     * Output the metrics.
     *
     * @param array<string, array<string, mixed>> $metrics
     */
    private function outputMetrics(array $metrics): void {
        $format = $this->option('format');
        $output = $this->option('output');

        $formatted = match ($format) {
            'json' => json_encode($metrics, JSON_PRETTY_PRINT),
            'yaml' => Yaml::dump($metrics, 4, 2),
            default => $this->formatTextOutput($metrics),
        };

        if ($output) {
            file_put_contents($output, $formatted);
            $this->info("Metrics written to: {$output}");
            return;
        }

        $this->line($formatted);
    }

    /**
     * Format metrics as text.
     *
     * @param array<string, array<string, mixed>> $metrics
     */
    private function formatTextOutput(array $metrics): string {
        $output = [];

        foreach ($metrics as $model => $modelMetrics) {
            $output[] = "Model: {$model}";
            $output[] = str_repeat('-', strlen($model) + 7);

            foreach ($modelMetrics as $category => $values) {
                $output[] = "\n{$category}:";
                foreach ($values as $metric => $value) {
                    $metric = str_replace('_', ' ', $metric);
                    $output[] = "  {$metric}: {$value}";
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
            ['model', InputArgument::OPTIONAL, 'The model to analyze'],
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
            ['with-complexity', null, InputOption::VALUE_NONE, 'Include complexity metrics'],
            ['with-dependencies', null, InputOption::VALUE_NONE, 'Include dependency metrics'],
            ['with-inheritance', null, InputOption::VALUE_NONE, 'Include inheritance metrics'],
            ['with-all', null, InputOption::VALUE_NONE, 'Include all available metrics'],
        ];
    }
}