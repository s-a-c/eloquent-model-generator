<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Commands;

use Illuminate\Console\Command;
use SAC\EloquentModelGenerator\Contracts\ModelGenerator;
use SAC\EloquentModelGenerator\Exceptions\ModelGeneratorException;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class FixCommand extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'model:fix
        {model : The model to fix}
        {--dry-run : Show what would be fixed without making changes}
        {--interactive : Prompt for confirmation before applying each fix}
        {--fix-types : Fix property type hints}
        {--fix-relations : Fix relationship methods}
        {--fix-validation : Fix validation rules}
        {--fix-all : Apply all available fixes}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fix issues in an Eloquent model';

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
            $model = $this->argument('model');
            $dryRun = $this->option('dry-run');
            $interactive = $this->option('interactive');

            $this->info("Analyzing model: {$model}");

            // Get fixes to apply
            $fixes = $this->getFixes();
            if (empty($fixes)) {
                $this->warn('No fixes selected. Use --fix-* options to select fixes to apply.');
                return Command::FAILURE;
            }

            // Analyze model and get suggested fixes
            $suggestions = $this->generator->analyzeFixes($model, $fixes);
            if (empty($suggestions)) {
                $this->info('No fixes needed!');
                return Command::SUCCESS;
            }

            // Show fixes
            $this->showSuggestions($suggestions);

            // Stop here if dry run
            if ($dryRun) {
                return Command::SUCCESS;
            }

            // Apply fixes
            $applied = 0;
            foreach ($suggestions as $suggestion) {
                if ($interactive && !$this->confirm("Apply fix: {$suggestion['description']}?")) {
                    continue;
                }

                $this->generator->applyFix($model, $suggestion);
                $applied++;
                $this->info("Applied fix: {$suggestion['description']}");
            }

            $this->info("Applied {$applied} fixes to {$model}");
            return Command::SUCCESS;
        } catch (ModelGeneratorException $e) {
            $this->error("Failed to fix model: {$e->getMessage()}");
            $this->error($e->getPrevious() ? $e->getPrevious()->getMessage() : '');
            return Command::FAILURE;
        }
    }

    /**
     * Get the fixes to apply based on options.
     *
     * @return array<string>
     */
    private function getFixes(): array {
        $fixes = [];

        if ($this->option('fix-all')) {
            return ['types', 'relations', 'validation'];
        }

        if ($this->option('fix-types')) {
            $fixes[] = 'types';
        }

        if ($this->option('fix-relations')) {
            $fixes[] = 'relations';
        }

        if ($this->option('fix-validation')) {
            $fixes[] = 'validation';
        }

        return $fixes;
    }

    /**
     * Show the suggested fixes.
     *
     * @param array<array{
     *     type: string,
     *     description: string,
     *     file: string,
     *     line: int,
     *     current: string,
     *     suggested: string
     * }> $suggestions
     */
    private function showSuggestions(array $suggestions): void {
        $this->line("\nSuggested fixes:");

        foreach ($suggestions as $suggestion) {
            $this->line("\n<fg=yellow>{$suggestion['type']}</> fix in {$suggestion['file']}:{$suggestion['line']}");
            $this->line("<fg=red>- {$suggestion['current']}</>");
            $this->line("<fg=green>+ {$suggestion['suggested']}</>");
            $this->line("  {$suggestion['description']}");
        }

        $this->line('');
    }

    /**
     * Get the console command arguments.
     *
     * @return array<array{0: string, 1: int|null, 2: string}>
     */
    protected function getArguments(): array {
        return [
            ['model', InputArgument::REQUIRED, 'The model to fix'],
        ];
    }

    /**
     * Get the console command options.
     *
     * @return array<array{0: string, 1: string|null, 2: int|null, 3: string}>
     */
    protected function getOptions(): array {
        return [
            ['dry-run', null, InputOption::VALUE_NONE, 'Show what would be fixed without making changes'],
            ['interactive', null, InputOption::VALUE_NONE, 'Prompt for confirmation before applying each fix'],
            ['fix-types', null, InputOption::VALUE_NONE, 'Fix property type hints'],
            ['fix-relations', null, InputOption::VALUE_NONE, 'Fix relationship methods'],
            ['fix-validation', null, InputOption::VALUE_NONE, 'Fix validation rules'],
            ['fix-all', null, InputOption::VALUE_NONE, 'Apply all available fixes'],
        ];
    }
}