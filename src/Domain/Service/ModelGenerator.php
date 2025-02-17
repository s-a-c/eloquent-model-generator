<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Domain\Service;

use SAC\EloquentModelGenerator\Domain\Model\ModelDefinition;
use SAC\EloquentModelGenerator\Domain\Model\Property;
use SAC\EloquentModelGenerator\Domain\Functional\Collection;
use SAC\EloquentModelGenerator\Domain\Functional\Compose;

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
        $namespace = $definition->getNamespace() ?? 'App\\Models';

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
        $table = $definition->getTable();

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
        return Collection::of($definition->getProperties())
            ->map(fn(Property $property, string $name): string =>
                " * @property-read {$property->getType()->getPhpType()} \${$name}\n"
            )
            ->reduce(fn(string $carry, string $line): string => $carry . $line, '');
    }

    /**
     * Generate property definitions.
     */
    private function generateProperties(ModelDefinition $definition): string
    {
        $fillable = Collection::of($definition->getProperties())
            ->filter(fn(Property $property): bool => !$property->isPrimary())
            ->map(fn(Property $_, string $name): string => "        '{$name}'")
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
        $casts = Collection::of($definition->getProperties())
            ->filter(fn(Property $property): bool => $property->getType()->getEloquentCast() !== null)
            ->map(fn(Property $property, string $name): string =>
                "        '{$name}' => '{$property->getType()->getEloquentCast()}'"
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
}
