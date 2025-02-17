<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Domain\Service;

use SAC\EloquentModelGenerator\Model\ModelDefinition;
use SAC\EloquentModelGenerator\Domain\Functional\Collection;

/**
 * ModelGenerator service is responsible for generating Eloquent model classes
 * based on ModelDefinition instances.
 */
final class ModelGenerator
{
    /**
     * Generate a model class based on the given definition.
     *
     * @throws \RuntimeException If the model generation fails
     */
    public function generate(ModelDefinition $definition): string
    {
        return Collection::of([
            $this->generateHeader($definition),
            $this->generateClassDefinition($definition),
            $this->generateProperties($definition),
            $this->generateCasts($definition),
            $this->generateFooter(),
        ])
            ->filter(fn(string $part): bool => !empty($part))
            ->reduce(fn(string $carry, string $part): string => $carry . $part . "\n", '');
    }

    /**
     * Generate the file header with namespace and use statements.
     */
    private function generateHeader(ModelDefinition $definition): string
    {
        $namespace = $definition->getNamespace();

        return "<?php\n\n" .
            "declare(strict_types=1);\n\n" .
            "namespace {$namespace};\n\n" .
            "use Illuminate\\Database\\Eloquent\\Model;\n\n";
    }

    /**
     * Generate the class definition.
     */
    private function generateClassDefinition(ModelDefinition $definition): string
    {
        $table = $definition->getTableName();

        return "/**\n" .
            " * @property-read int \$id\n" .
            $this->generatePropertyDocBlocks($definition) .
            " */\n" .
            "class {$definition->getName()} extends Model\n" .
            "{\n" .
            "    /**\n" .
            "     * The table associated with the model.\n" .
            "     *\n" .
            "     * @var string\n" .
            "     */\n" .
            "    protected \$table = '{$table}';\n\n";
    }

    /**
     * Generate property docblocks for IDE support.
     */
    private function generatePropertyDocBlocks(ModelDefinition $definition): string
    {
        return Collection::of($definition->getColumns())
            ->map(fn(array $column, string $name): string =>
                " * @property-read {$this->getPhpType($column)} \${$name}\n"
            )
            ->reduce(fn(string $carry, string $line): string => $carry . $line, '');
    }

    /**
     * Generate property definitions.
     */
    private function generateProperties(ModelDefinition $definition): string
    {
        $fillable = Collection::of($definition->getColumns())
            ->filter(fn(array $column): bool => !($column['primary'] ?? false))
            ->map(fn(array $_, string $name): string => "        '{$name}'")
            ->reduce(fn(string $carry, string $line): string =>
                $carry . $line . ",\n", '');

        if (empty($fillable)) {
            return '';
        }

        return "    /**\n" .
            "     * The attributes that are mass assignable.\n" .
            "     *\n" .
            "     * @var array<string>\n" .
            "     */\n" .
            "    protected \$fillable = [\n" .
            $fillable .
            "    ];\n\n";
    }

    /**
     * Generate cast definitions.
     */
    private function generateCasts(ModelDefinition $definition): string
    {
        $casts = Collection::of($definition->getColumns())
            ->filter(fn(array $column): bool => $this->getEloquentCast($column) !== null)
            ->map(fn(array $column, string $name): string =>
                "        '{$name}' => '{$this->getEloquentCast($column)}'"
            )
            ->reduce(fn(string $carry, string $line): string =>
                $carry . $line . ",\n", '');

        if (empty($casts)) {
            return '';
        }

        return "    /**\n" .
            "     * The attributes that should be cast.\n" .
            "     *\n" .
            "     * @var array<string, string>\n" .
            "     */\n" .
            "    protected \$casts = [\n" .
            $casts .
            "    ];\n";
    }

    /**
     * Generate the class footer.
     */
    private function generateFooter(): string
    {
        return "}\n";
    }

    private function getPhpType(array $column): string
    {
        return match ($column['type']) {
            'integer', 'bigint' => 'int',
            'decimal', 'float', 'double' => 'float',
            'boolean' => 'bool',
            'date', 'datetime' => '\\DateTimeInterface',
            'json' => 'array',
            default => 'string'
        };
    }

    private function getEloquentCast(array $column): ?string
    {
        return match ($column['type']) {
            'integer', 'bigint' => 'integer',
            'decimal', 'float', 'double' => 'float',
            'boolean' => 'boolean',
            'date' => 'date',
            'datetime' => 'datetime',
            'json' => 'array',
            default => null
        };
    }
}
