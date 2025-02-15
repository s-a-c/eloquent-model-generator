<?php

namespace SAC\EloquentModelGenerator\Services;

use RuntimeException;
use SAC\EloquentModelGenerator\Support\Definitions\ModelDefinition;

/**
 * @phpstan-type EventConfig array{
 *     class: class-string,
 *     description?: string,
 *     payload?: array<string, mixed>
 * }
 * @phpstan-type ModelConfig array{
 *     table: non-empty-string,
 *     connection?: non-empty-string,
 *     primaryKey?: non-empty-string,
 *     keyType?: 'int'|'string',
 *     incrementing?: bool,
 *     timestamps?: bool,
 *     dateFormat?: non-empty-string,
 *     with?: array<non-empty-string>,
 *     withCount?: array<non-empty-string>,
 *     perPage?: positive-int,
 *     events?: array<non-empty-string, EventConfig>
 * }
 * @phpstan-type ValidationRule array{
 *     rule: non-empty-string,
 *     parameters?: array<mixed>,
 *     message?: non-empty-string
 * }
 * @phpstan-type ValidationRules array<non-empty-string, array<ValidationRule|non-empty-string>>
 * @phpstan-type ColumnAttributes array{
 *     type: non-empty-string,
 *     length?: positive-int|null,
 *     nullable?: bool,
 *     default?: mixed,
 *     unsigned?: bool,
 *     autoIncrement?: bool,
 *     primary?: bool,
 *     unique?: bool,
 *     comment?: non-empty-string|null,
 *     precision?: positive-int|null,
 *     scale?: int<0, max>|null,
 *     collation?: non-empty-string|null,
 *     charset?: non-empty-string|null,
 *     onUpdate?: non-empty-string|null,
 *     onDelete?: non-empty-string|null,
 *     hidden?: bool,
 *     validation?: ValidationRules,
 *     index?: bool|'unique'|'fulltext'|'spatial',
 *     foreignKey?: array{
 *         table: non-empty-string,
 *         column: non-empty-string,
 *         onDelete?: 'cascade'|'restrict'|'set null'|'no action',
 *         onUpdate?: 'cascade'|'restrict'|'set null'|'no action'
 *     }
 * }
 * @phpstan-type RelationConfig array{
 *     type: non-empty-string,
 *     model: class-string,
 *     foreignKey?: non-empty-string,
 *     localKey?: non-empty-string,
 *     table?: non-empty-string,
 *     morphType?: non-empty-string,
 *     morphClass?: class-string,
 *     pivotTable?: non-empty-string,
 *     pivotColumns?: array<non-empty-string>,
 *     pivotForeignKey?: non-empty-string,
 *     pivotRelatedKey?: non-empty-string,
 *     withTimestamps?: bool,
 *     withPivot?: array<non-empty-string>,
 *     using?: class-string
 * }
 * @phpstan-type IndexConfig array{
 *     type: 'primary'|'unique'|'index'|'fulltext'|'spatial',
 *     columns: array<string>,
 *     name?: string,
 *     algorithm?: string,
 *     options?: array<string, mixed>
 * }
 * @phpstan-type ForeignKeyConfig array{
 *     table: string,
 *     columns: array<string, string>,
 *     onDelete?: string,
 *     onUpdate?: string
 * }
 * @phpstan-type SchemaDefinition array{
 *     columns: array<string, ColumnAttributes>,
 *     relations?: array<string, RelationConfig>,
 *     indexes?: array<string, IndexConfig>,
 *     foreignKeys?: array<string, ForeignKeyConfig>,
 *     timestamps?: bool,
 *     softDeletes?: bool,
 *     primaryKey?: string,
 *     incrementing?: bool,
 *     keyType?: string,
 *     connection?: string,
 *     dateFormat?: string
 * }
 */
class ModelGeneratorTemplateEngine
{
    /**
     * @var array<string, string>
     */
    private array $templates = [];

    /**
     * Create a new template engine instance.
     */
    public function __construct()
    {
        $this->loadTemplates();
    }

    /**
     * Render a model template.
     *
     * @param  array{columns: array<string, array{type: non-empty-string, length?: int<1, max>|null, nullable?: bool, default?: mixed, unsigned?: bool, autoIncrement?: bool, primary?: bool, unique?: bool}>, relations?: array<string, array{type: non-empty-string, model: class-string, foreignKey?: non-empty-string, localKey?: non-empty-string, table?: non-empty-string, morphType?: non-empty-string, morphClass?: class-string, pivotTable?: non-empty-string}>, indexes?: array<string, array{type: 'primary'|'unique'|'index'|'fulltext'|'spatial', columns: array<string>, name?: string, algorithm?: string, options?: array<string, mixed>}>, foreignKeys?: array<string, array{table: string, columns: array<string, string>, onDelete?: string, onUpdate?: string}>, timestamps?: bool, softDeletes?: bool, primaryKey?: string, incrementing?: bool}  $schema
     */
    public function render(ModelDefinition $definition, array $schema): string
    {
        $template = $this->getTemplate('model');

        $fillable = $this->getFillableColumns($schema['columns']);
        $guarded = $this->getGuardedColumns($schema['columns']);
        $casts = $this->getCasts($schema['columns']);
        $dates = $this->getDates($schema['columns']);
        $hidden = $this->getHiddenColumns($schema['columns']);

        $template = $this->addModelProperties($template, $fillable, $guarded, $casts, $dates, $hidden);
        $template = $this->addModelRelations($template, $schema['relations'] ?? []);
        $template = $this->addModelIndexes($template, $schema['indexes'] ?? []);

        return $this->replacePlaceholders($template, [
            'namespace' => $definition->getNamespace(),
            'className' => $definition->getClassName(),
            'tableName' => $definition->getTableName(),
            'baseClass' => $definition->getBaseClass(),
        ]);
    }

    /**
     * Load the templates.
     */
    private function loadTemplates(): void
    {
        $this->templates['model'] = <<<'PHP'
<?php

namespace {{namespace}};

use {{baseClass}};

class {{className}} extends {{baseClass}}
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = '{{tableName}}';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [{{fillable}}];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<string>
     */
    protected $hidden = [{{hidden}}];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [{{casts}}];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array<string>
     */
    protected $dates = [{{dates}}];

    {{relations}}
}
PHP;
    }

    /**
     * Get a template by name.
     *
     * @param  non-empty-string  $name
     *
     * @throws RuntimeException If template not found
     */
    private function getTemplate(string $name): string
    {
        if (! isset($this->templates[$name])) {
            throw new RuntimeException(sprintf("Template '%s' not found", $name));
        }

        return $this->templates[$name];
    }

    /**
     * Replace placeholders in a template.
     *
     * @param  array<string, string>  $replacements
     */
    private function replacePlaceholders(string $template, array $replacements): string
    {
        foreach ($replacements as $key => $value) {
            $template = str_replace('{{'.$key.'}}', $value, $template);
        }

        return $template;
    }

    /**
     * Get the fillable columns.
     *
     * @param  array<string, array{type: non-empty-string, length?: int<1, max>|null, nullable?: bool, default?: mixed, unsigned?: bool, autoIncrement?: bool, primary?: bool, unique?: bool}>  $columns
     * @return array<non-empty-string>
     */
    private function getFillableColumns(array $columns): array
    {
        /** @var array<non-empty-string> */
        $fillable = array_filter(
            array_keys($columns),
            fn (string $name): bool => $name !== '' && $name !== '0' && ! ($columns[$name]['primary'] ?? false)
        );

        return $fillable;
    }

    /**
     * Get the guarded columns.
     *
     * @param  array<string, array{type: non-empty-string, length?: int<1, max>|null, nullable?: bool, default?: mixed, unsigned?: bool, autoIncrement?: bool, primary?: bool, unique?: bool}>  $columns
     * @return array<non-empty-string>
     */
    private function getGuardedColumns(array $columns): array
    {
        /** @var array<non-empty-string> */
        $guarded = array_filter(
            array_keys($columns),
            fn (string $name): bool => $name !== '' && $name !== '0' && ($columns[$name]['primary'] ?? false)
        );

        return $guarded;
    }

    /**
     * Get the casts.
     *
     * @param  array<string, array{type: non-empty-string, length?: int<1, max>|null, nullable?: bool, default?: mixed, unsigned?: bool, autoIncrement?: bool, primary?: bool, unique?: bool}>  $columns
     * @return array<non-empty-string, non-empty-string>
     */
    private function getCasts(array $columns): array
    {
        /** @var array<non-empty-string, non-empty-string> */
        $casts = array_filter(
            array_map(
                fn (string $name, array $column): ?array => $name === '' || $name === '0' ? null : [$name => $this->getCastType($column['type'])],
                array_keys($columns),
                array_values($columns)
            )
        );

        return array_merge(...$casts);
    }

    /**
     * Get the dates.
     *
     * @param  array<string, array{type: non-empty-string, length?: int<1, max>|null, nullable?: bool, default?: mixed, unsigned?: bool, autoIncrement?: bool, primary?: bool, unique?: bool}>  $columns
     * @return array<non-empty-string>
     */
    private function getDates(array $columns): array
    {
        /** @var array<non-empty-string> */
        $dates = array_filter(
            array_keys($columns),
            fn (string $name): bool => $name !== '' && $name !== '0' && in_array($columns[$name]['type'], ['date', 'datetime', 'timestamp'], true)
        );

        return $dates;
    }

    /**
     * Get the hidden columns.
     *
     * @param  array<string, array{type: non-empty-string, length?: int<1, max>|null, nullable?: bool, default?: mixed, unsigned?: bool, autoIncrement?: bool, primary?: bool, unique?: bool}>  $columns
     * @return array<non-empty-string>
     */
    private function getHiddenColumns(array $columns): array
    {
        $hidden = [];
        foreach (array_keys($columns) as $name) {
            if (in_array($name, ['password', 'remember_token'], true)) {
                $hidden[] = $name;
            }
        }

        return $hidden;
    }

    /**
     * Get the cast type for a column.
     *
     * @param  non-empty-string  $type
     * @return non-empty-string
     */
    private function getCastType(string $type): string
    {
        return match ($type) {
            'integer', 'bigint', 'smallint' => 'integer',
            'decimal', 'float' => 'float',
            'boolean' => 'boolean',
            'date' => 'date',
            'datetime', 'timestamp' => 'datetime',
            'json', 'jsonb' => 'array',
            default => 'string',
        };
    }

    /**
     * Add model properties to the template.
     *
     * @param  array<non-empty-string>  $fillable
     * @param  array<non-empty-string>  $guarded
     * @param  array<non-empty-string, non-empty-string>  $casts
     * @param  array<non-empty-string>  $dates
     * @param  array<non-empty-string>  $hidden
     */
    private function addModelProperties(
        string $template,
        array $fillable,
        array $guarded,
        array $casts,
        array $dates,
        array $hidden
    ): string {
        $template = str_replace('{{fillable}}', $this->formatArray($fillable), $template);
        $template = str_replace('{{guarded}}', $this->formatArray($guarded), $template);
        $template = str_replace('{{casts}}', $this->formatKeyValueArray($casts), $template);
        $template = str_replace('{{dates}}', $this->formatArray($dates), $template);

        return str_replace('{{hidden}}', $this->formatArray($hidden), $template);
    }

    /**
     * Add model relations to the template.
     *
     * @param  array<string, array{type: non-empty-string, model: class-string, foreignKey?: non-empty-string, localKey?: non-empty-string, table?: non-empty-string, morphType?: non-empty-string, morphClass?: class-string, pivotTable?: non-empty-string}>  $relations
     */
    private function addModelRelations(string $template, array $relations): string
    {
        $relationMethods = [];

        foreach ($relations as $name => $relation) {
            $relationMethods[] = $this->generateRelationMethod($name, $relation);
        }

        return str_replace('{{relations}}', implode("\n\n", $relationMethods), $template);
    }

    /**
     * Add model indexes to the template.
     *
     * @param array<string, array{type: 'primary'|'unique'|'index'|'fulltext'|'spatial', columns: array<string>, name?: string, algorithm?: string, options?: array<string, mixed>} $indexes
     */
    private function addModelIndexes(string $template, array $indexes): string
    {
        $indexMethods = [];

        foreach ($indexes as $name => $index) {
            $indexMethods[] = $this->generateIndexMethod($name, $index);
        }

        return str_replace('{{indexes}}', implode("\n\n", $indexMethods), $template);
    }

    /**
     * Format an array as a PHP array string.
     *
     * @param  array<non-empty-string>  $array
     */
    private function formatArray(array $array): string
    {
        return implode(', ', array_map(fn (string $value): string => sprintf("'%s'", $value), $array));
    }

    /**
     * Format a key-value array as a PHP array string.
     *
     * @param  array<non-empty-string, non-empty-string>  $array
     */
    private function formatKeyValueArray(array $array): string
    {
        $formatted = [];
        foreach ($array as $key => $value) {
            $formatted[] = sprintf("'%s' => '%s'", $key, $value);
        }

        return implode(', ', $formatted);
    }

    /**
     * Generate a relation method.
     *
     * @param  array{type: non-empty-string, model: class-string, foreignKey?: non-empty-string, localKey?: non-empty-string, table?: non-empty-string, morphType?: non-empty-string, morphClass?: class-string, pivotTable?: non-empty-string}  $relation
     */
    private function generateRelationMethod(string $name, array $relation): string
    {
        $method = <<<PHP
    /**
     * Get the {$name} relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\\{$relation['type']}
     */
    public function {$name}()
    {
        return \$this->{$relation['type']}({$relation['model']}::class
PHP;

        if (isset($relation['foreignKey'])) {
            $method .= sprintf(", '%s'", $relation['foreignKey']);
        }

        if (isset($relation['localKey'])) {
            $method .= sprintf(", '%s'", $relation['localKey']);
        }

        $method .= ');';

        return $method."\n    }";
    }

    /**
     * Generate an index method.
     *
     * @param  array{type: 'primary'|'unique'|'index'|'fulltext'|'spatial', columns: array<string>, name?: string, algorithm?: string, options?: array<string, mixed>}  $index
     */
    private function generateIndexMethod(string $name, array $index): string
    {
        $columns = implode(', ', array_map(fn (string $column): string => sprintf("'%s'", $column), $index['columns']));

        return <<<PHP
    /**
     * Get the {$name} index.
     *
     * @return array
     */
    public function get{$name}Index()
    {
        return [
            'type' => '{$index['type']}',
            'columns' => [{$columns}]
        ];
    }
PHP;
    }
}
