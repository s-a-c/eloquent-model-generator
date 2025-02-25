<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Services;

use Illuminate\Support\Str;
use SAC\EloquentModelGenerator\Config\ModelGeneratorConfig;
use SAC\EloquentModelGenerator\Domain\ValueObjects\ColumnDefinition;
use SAC\EloquentModelGenerator\Domain\ValueObjects\GenerationResult;
use SAC\EloquentModelGenerator\Domain\ValueObjects\TableDefinition;
use SAC\EloquentModelGenerator\Exceptions\ModelGenerationException;
use SAC\EloquentModelGenerator\Services\Contracts\CodeGeneratorInterface;
use Throwable;

/**
 * Service for generating model code.
 */
final readonly class CodeGenerator implements CodeGeneratorInterface
{
    public function __construct(
        private ModelGeneratorConfig $config,
    ) {}

    public function generateModel(TableDefinition $table): GenerationResult
    {
        try {
            $className = $this->generateModelName($table);
            $namespace = $this->config->get('namespace', 'App\\Models');

            $content = [
                '<?php',
                '',
                'declare(strict_types=1);',
                '',
                "namespace {$namespace};",
                '',
            ];

            // Add imports
            $content = [...$content, ...$this->generateImports($table)];

            // Add class definition
            $content[] = '';
            $content = [...$content, ...$this->generatePhpDocBlocks($table)];
            $content[] = "class {$className} extends {$this->config->get('base_class', '\\Illuminate\\Database\\Eloquent\\Model')}";
            $content[] = '{';

            // Add traits
            $traits = $this->generateTraitImports($table);
            if (! empty($traits)) {
                $content[] = '    use '.implode(', ', $traits).';';
                $content[] = '';
            }

            // Add property definitions
            $content = [...$content, ...$this->indentLines($this->generatePropertyDefinitions($table))];

            // Add configuration arrays
            $content = [...$content, ...$this->generateConfigurationArrays($table)];

            // Add relationship methods
            $content = [...$content, ...$this->indentLines($this->generateRelationshipMethods($table))];

            // Add custom methods
            $content = [...$content, ...$this->indentLines($this->generateMethodDefinitions($table))];

            $content[] = '}';
            $content[] = '';

            // Write the file
            $filePath = $this->getModelPath($table);
            $this->ensureDirectoryExists(dirname($filePath));
            file_put_contents($filePath, implode("\n", $content));

            // Generate factory if configured
            if ($this->config->get('generate_factories', true)) {
                $this->generateFactory($table);
            }

            return GenerationResult::success([$filePath]);
        } catch (Throwable $e) {
            throw ModelGenerationException::forFailedGeneration($table->name, $e->getMessage(), $e);
        }
    }

    public function generateDocumentation(TableDefinition $table): GenerationResult
    {
        try {
            $className = $this->generateModelName($table);
            $content = [
                "# {$className}",
                '',
                '## Properties',
                '',
                '| Name | Type | Description |',
                '|------|------|-------------|',
            ];

            foreach ($table->columns as $column) {
                $content[] = "| {$column->name} | {$column->getPhpType()} | |";
            }

            $content[] = '';
            $content[] = '## Relationships';
            $content[] = '';

            foreach ($table->relationships as $relationship) {
                $content[] = "### {$relationship->name}";
                $content[] = '';
                $content[] = "- Type: {$relationship->type->value}";
                $content[] = "- Related Model: {$relationship->relatedModel}";
                $content[] = '';
            }

            $filePath = $this->getDocumentationPath($table);
            $this->ensureDirectoryExists(dirname($filePath));
            file_put_contents($filePath, implode("\n", $content));

            return GenerationResult::success([$filePath]);
        } catch (Throwable $e) {
            throw ModelGenerationException::forFailedGeneration($table->name, $e->getMessage(), $e);
        }
    }

    public function getRequiredImports(TableDefinition $table): array
    {
        $imports = [
            $this->config->get('base_class', '\\Illuminate\\Database\\Eloquent\\Model'),
        ];

        // Add relationship imports
        foreach ($table->relationships as $relationship) {
            $imports[] = "Illuminate\\Database\\Eloquent\\Relations\\{$relationship->type->value}";
            if ($relationship->relatedModel) {
                $imports[] = $relationship->relatedModel;
            }
        }

        // Add trait imports
        $imports = [...$imports, ...$this->generateTraitImports($table)];

        // Add soft deletes if needed
        if ($table->hasSoftDeletes()) {
            $imports[] = 'Illuminate\\Database\\Eloquent\\SoftDeletes';
        }

        return array_unique($imports);
    }

    public function generateRelationshipMethods(TableDefinition $table): array
    {
        $methods = [];
        foreach ($table->relationships as $relationship) {
            $methods[] = $relationship->getMethodDefinition();
        }

        return $methods;
    }

    public function generatePropertyDefinitions(TableDefinition $table): array
    {
        $properties = [];

        // Add table name if different from convention
        if ($table->name !== Str::snake(Str::pluralStudly($this->generateModelName($table)))) {
            $properties[] = "protected \$table = '{$table->name}';";
            $properties[] = '';
        }

        // Add primary key if different from 'id'
        $primaryKeys = $table->getPrimaryKeys();
        if (count($primaryKeys) === 1 && reset($primaryKeys)->name !== 'id') {
            $properties[] = "protected \$primaryKey = '".reset($primaryKeys)->name."';";
            $properties[] = '';
        }

        // Add timestamps property if needed
        if (! $table->hasTimestamps()) {
            $properties[] = 'public const CREATED_AT = null;';
            $properties[] = 'public const UPDATED_AT = null;';
            $properties[] = '';
            $properties[] = 'public \$timestamps = false;';
            $properties[] = '';
        }

        return $properties;
    }

    public function generateMethodDefinitions(TableDefinition $table): array
    {
        $methods = [];

        // Add scope methods
        foreach ($table->columns as $column) {
            if ($column->attributes['searchable'] ?? false) {
                $methods[] = $this->generateScopeMethod($column);
            }
        }

        return $methods;
    }

    public function generateTraitImports(TableDefinition $table): array
    {
        $traits = [];

        if ($table->hasSoftDeletes()) {
            $traits[] = 'SoftDeletes';
        }

        // Add configured traits
        $configuredTraits = $this->config->get('traits', []);
        foreach ($configuredTraits as $trait) {
            $traits[] = class_basename($trait);
        }

        return $traits;
    }

    public function generatePhpDocBlocks(TableDefinition $table): array
    {
        $blocks = [
            '/**',
            ' * '.$this->generateModelName($table).' Model',
            ' *',
        ];

        // Add property definitions
        foreach ($table->columns as $column) {
            $blocks[] = " * @property {$column->getDocblockType()} \${$column->name}";
        }

        // Add relationship definitions
        foreach ($table->relationships as $relationship) {
            $returnType = "\\Illuminate\\Database\\Eloquent\\Relations\\{$relationship->type->value}";
            $blocks[] = " * @method {$returnType} {$relationship->name}()";
        }

        $blocks[] = ' */';

        return $blocks;
    }

    public function generateModelConfiguration(TableDefinition $table): array
    {
        return [
            'fillable' => $table->getFillableColumns(),
            'hidden' => $table->getHiddenColumns(),
            'casts' => $this->generateCasts($table),
            'dates' => $this->generateDates($table),
        ];
    }

    public function generateValidationRules(TableDefinition $table): array
    {
        $rules = [];
        foreach ($table->columns as $column) {
            $rules[$column->name] = $column->getValidationRules();
        }

        return $rules;
    }

    public function generateFactoryDefinition(TableDefinition $table): string
    {
        $className = $this->generateModelName($table);
        $namespace = $this->config->get('namespace', 'App\\Models');

        return <<<PHP
        <?php

        namespace Database\\Factories;

        use Illuminate\\Database\\Eloquent\\Factories\\Factory;
        use {$namespace}\\{$className};

        class {$className}Factory extends Factory
        {
            protected \$model = {$className}::class;

            public function definition(): array
            {
                return [
                    {$this->generateFactoryAttributes($table)}
                ];
            }
        }
        PHP;
    }

    /**
     * Generate the model name from the table definition.
     */
    private function generateModelName(TableDefinition $table): string
    {
        return str_replace('_', '', ucwords(Str::singular($table->name), '_'));
    }

    /**
     * Generate imports section.
     *
     * @return array<string>
     */
    private function generateImports(TableDefinition $table): array
    {
        $imports = $this->getRequiredImports($table);
        sort($imports);

        return array_map(
            fn (string $import) => "use {$import};",
            array_unique($imports)
        );
    }

    /**
     * Generate configuration arrays section.
     *
     * @return array<string>
     */
    private function generateConfigurationArrays(TableDefinition $table): array
    {
        $config = $this->generateModelConfiguration($table);
        $content = [];

        foreach ($config as $key => $values) {
            if (! empty($values)) {
                $arrayContent = array_map(
                    fn ($value) => "        '{$value}',",
                    $values
                );

                $content[] = "    protected \${$key} = [";
                $content = [...$content, ...$arrayContent];
                $content[] = '    ];';
                $content[] = '';
            }
        }

        return $content;
    }

    /**
     * Generate casts array for the model.
     *
     * @return array<string, string>
     */
    private function generateCasts(TableDefinition $table): array
    {
        $casts = [];
        foreach ($table->columns as $column) {
            if ($column->shouldCast()) {
                $casts[$column->name] = $column->getCastType();
            }
        }

        return $casts;
    }

    /**
     * Generate dates array for the model.
     *
     * @return array<string>
     */
    private function generateDates(TableDefinition $table): array
    {
        return array_map(
            fn (ColumnDefinition $column) => $column->name,
            array_filter(
                $table->columns,
                fn (ColumnDefinition $column) => in_array($column->type, ['datetime', 'timestamp', 'date'])
            )
        );
    }

    /**
     * Generate a scope method for a column.
     */
    private function generateScopeMethod(ColumnDefinition $column): string
    {
        $methodName = 'scope'.ucfirst(Str::camel("where_{$column->name}"));

        return <<<PHP
            public function {$methodName}(\$query, \${$column->name})
            {
                return \$query->where('{$column->name}', \${$column->name});
            }
        PHP;
    }

    /**
     * Generate factory attributes.
     */
    private function generateFactoryAttributes(TableDefinition $table): string
    {
        $attributes = [];
        foreach ($table->columns as $column) {
            if (in_array($column->name, ['id', 'created_at', 'updated_at', 'deleted_at'])) {
                continue;
            }

            $faker = $this->getFakerMethod($column);
            $attributes[] = "            '{$column->name}' => \$this->faker->{$faker},";
        }

        return implode("\n", $attributes);
    }

    /**
     * Get the appropriate Faker method for a column.
     */
    private function getFakerMethod(ColumnDefinition $column): string
    {
        return match ($column->type) {
            'string' => 'word',
            'integer' => 'randomNumber',
            'float' => 'randomFloat',
            'boolean' => 'boolean',
            'datetime', 'timestamp' => 'dateTime',
            'date' => 'date',
            'json' => 'json',
            default => 'word',
        };
    }

    /**
     * Get the path for the model file.
     */
    private function getModelPath(TableDefinition $table): string
    {
        $basePath = $this->config->get('path', 'app/Models');

        return $basePath.'/'.$this->generateModelName($table).'.php';
    }

    /**
     * Get the path for the documentation file.
     */
    private function getDocumentationPath(TableDefinition $table): string
    {
        $basePath = $this->config->get('documentation.output_path', 'docs/models');

        return $basePath.'/'.$this->generateModelName($table).'.md';
    }

    /**
     * Ensure a directory exists and is writable.
     *
     * @throws ModelGenerationException
     */
    private function ensureDirectoryExists(string $directory): void
    {
        if (! file_exists($directory)) {
            if (! mkdir($directory, 0755, true)) {
                throw new ModelGenerationException("Failed to create directory: {$directory}");
            }
        }

        if (! is_writable($directory)) {
            throw new ModelGenerationException("Directory is not writable: {$directory}");
        }
    }

    /**
     * Generate a factory file for the model.
     */
    private function generateFactory(TableDefinition $table): void
    {
        $content = $this->generateFactoryDefinition($table);
        $path = database_path('factories/'.$this->generateModelName($table).'Factory.php');

        $this->ensureDirectoryExists(dirname($path));
        file_put_contents($path, $content);
    }

    /**
     * Indent an array of lines.
     *
     * @param  array<string>  $lines
     * @return array<string>
     */
    private function indentLines(array $lines): array
    {
        return array_map(
            fn (string $line) => $line ? '    '.$line : $line,
            $lines
        );
    }
}
