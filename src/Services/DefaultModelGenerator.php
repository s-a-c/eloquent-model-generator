<?php

namespace SAC\EloquentModelGenerator\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use SAC\EloquentModelGenerator\Models\GeneratedModel;
use SAC\EloquentModelGenerator\Support\Definitions\ModelDefinition;
use SAC\EloquentModelGenerator\ValueObjects\TableSchema;

class DefaultModelGenerator implements ModelGeneratorInterface
{
    /**
     * Generate a model.
     *
     * @param  array<string, mixed>  $config
     */
    public function generate(string $table, TableSchema $schema, array $config = []): GeneratedModel
    {
        /** @var array{class_name?: string, namespace?: string, base_class?: string, with_soft_deletes?: bool, with_validation?: bool, with_relationships?: bool} $modelConfig */
        $modelConfig = array_intersect_key($config, array_flip([
            'class_name',
            'namespace',
            'base_class',
            'with_soft_deletes',
            'with_validation',
            'with_relationships',
        ]));

        $definition = new ModelDefinition(
            className: $modelConfig['class_name'] ?? $this->generateClassName($table),
            namespace: $modelConfig['namespace'] ?? 'App\\Models',
            columns: new Collection,
            relations: new Collection,
            baseClass: $modelConfig['base_class'] ?? Model::class,
            withSoftDeletes: $modelConfig['with_soft_deletes'] ?? false,
            withValidation: $modelConfig['with_validation'] ?? false,
            withRelationships: $modelConfig['with_relationships'] ?? true,
            table: $table
        );

        $content = $this->generateModelContent(
            $definition->getClassName(),
            $definition->getNamespace(),
            $definition->getTableName(),
            $definition->getBaseClass(),
            $schema->toArray()
        );

        return new GeneratedModel(
            className: $definition->getClassName(),
            namespace: $definition->getNamespace(),
            tableName: $definition->getTableName(),
            baseClass: $definition->getBaseClass(),
            content: $content
        );
    }

    /**
     * Generate the model content.
     *
     * @param  array{columns: array<string, array{type: string, nullable: bool, default?: mixed, length?: int|null, unsigned?: bool, autoIncrement?: bool, comment?: string|null}>, indexes?: array<string, array{type: string, columns: array<string>}>, foreignKeys?: array<string, array{table: string, columns: array<string, string>}>}  $schema
     */
    protected function generateModelContent(
        string $className,
        string $namespace,
        string $tableName,
        string $baseClass,
        array $schema
    ): string {
        $template = $this->getTemplate();
        $template = str_replace('{{namespace}}', $namespace, $template);
        $template = str_replace('{{className}}', $className, $template);
        $template = str_replace('{{baseClass}}', $baseClass, $template);
        $template = str_replace('{{tableName}}', $tableName, $template);

        $fillable = $this->generateFillable($schema['columns']);
        $template = str_replace('{{fillable}}', $fillable, $template);

        $casts = $this->generateCasts($schema['columns']);

        return str_replace('{{casts}}', $casts, $template);
    }

    /**
     * Get the model template.
     */
    protected function getTemplate(): string
    {
        return <<<'PHP'
<?php

namespace {{namespace}};

use {{baseClass}} as BaseModel;

class {{className}} extends BaseModel
{
    protected $table = '{{tableName}}';

    protected $fillable = [{{fillable}}];

    protected $casts = [{{casts}}];
}
PHP;
    }

    /**
     * Generate the fillable property.
     *
     * @param  array<string, array{type: string, nullable: bool, default?: mixed, length?: int|null, unsigned?: bool, autoIncrement?: bool, comment?: string|null}>  $columns
     */
    protected function generateFillable(array $columns): string
    {
        $fillable = array_keys($columns);

        return "'".implode("', '", $fillable)."'";
    }

    /**
     * Generate the casts property.
     *
     * @param  array<string, array{type: string, nullable: bool, default?: mixed, length?: int|null, unsigned?: bool, autoIncrement?: bool, comment?: string|null}>  $columns
     */
    protected function generateCasts(array $columns): string
    {
        $casts = [];
        foreach ($columns as $name => $column) {
            $type = $this->getCastType($column['type']);
            if ($type !== null) {
                $casts[] = sprintf("'%s' => '%s'", $name, $type);
            }
        }

        return implode(', ', $casts);
    }

    /**
     * Get the cast type for a column.
     */
    protected function getCastType(string $type): ?string
    {
        return match ($type) {
            'integer', 'bigint', 'smallint' => 'integer',
            'decimal', 'float' => 'float',
            'boolean' => 'boolean',
            'date' => 'date',
            'datetime', 'timestamp' => 'datetime',
            'json', 'jsonb' => 'array',
            default => null,
        };
    }

    /**
     * Generate a class name from a table name.
     */
    private function generateClassName(string $table): string
    {
        return Str::studly(Str::singular($table));
    }
}
