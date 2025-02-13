<?php

namespace SAC\EloquentModelGenerator\Services;

use SAC\EloquentModelGenerator\Models\GeneratedModel;
use SAC\EloquentModelGenerator\Support\Definitions\ModelDefinition;
use SAC\EloquentModelGenerator\ValueObjects\TableSchema;
use SAC\EloquentModelGenerator\Services\ConfigurationService;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;

class DefaultModelGenerator implements ModelGeneratorInterface {
    public function __construct(
        private readonly ConfigurationService $configService
    ) {
    }

    /**
     * Generate a model.
     *
     * @param string $table
     * @param TableSchema $schema
     * @param array<string, mixed> $config
     * @return GeneratedModel
     */
    public function generate(string $table, TableSchema $schema, array $config = []): GeneratedModel {
        /** @var array{class_name?: string, namespace?: string, base_class?: string, with_soft_deletes?: bool, with_validation?: bool, with_relationships?: bool} $modelConfig */
        $modelConfig = array_intersect_key($config, array_flip([
            'class_name',
            'namespace',
            'base_class',
            'with_soft_deletes',
            'with_validation',
            'with_relationships'
        ]));

        $definition = new ModelDefinition(
            className: $modelConfig['class_name'] ?? $this->generateClassName($table),
            namespace: $modelConfig['namespace'] ?? 'App\\Models',
            columns: new Collection(),
            relations: new Collection(),
            baseClass: $modelConfig['base_class'] ?? 'Illuminate\\Database\\Eloquent\\Model',
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
     * @param string $className
     * @param string $namespace
     * @param string $tableName
     * @param string $baseClass
     * @param array{columns: array<string, array{type: string, nullable: bool, default?: mixed, length?: int|null, unsigned?: bool, autoIncrement?: bool, comment?: string|null}>, indexes?: array<string, array{type: string, columns: array<string>}>, foreignKeys?: array<string, array{table: string, columns: array<string, string>}>} $schema
     * @return string
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
        $template = str_replace('{{casts}}', $casts, $template);

        return $template;
    }

    /**
     * Get the model template.
     *
     * @return string
     */
    protected function getTemplate(): string {
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
     * @param array<string, array{type: string, nullable: bool, default?: mixed, length?: int|null, unsigned?: bool, autoIncrement?: bool, comment?: string|null}> $columns
     * @return string
     */
    protected function generateFillable(array $columns): string {
        $fillable = array_keys($columns);
        return "'" . implode("', '", $fillable) . "'";
    }

    /**
     * Generate the casts property.
     *
     * @param array<string, array{type: string, nullable: bool, default?: mixed, length?: int|null, unsigned?: bool, autoIncrement?: bool, comment?: string|null}> $columns
     * @return string
     */
    protected function generateCasts(array $columns): string {
        $casts = [];
        foreach ($columns as $name => $column) {
            $type = $this->getCastType($column['type']);
            if ($type !== null) {
                $casts[] = "'{$name}' => '{$type}'";
            }
        }
        return implode(', ', $casts);
    }

    /**
     * Get the cast type for a column.
     *
     * @param string $type
     * @return string|null
     */
    protected function getCastType(string $type): ?string {
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
     *
     * @param string $table
     * @return string
     */
    private function generateClassName(string $table): string {
        return Str::studly(Str::singular($table));
    }
}
