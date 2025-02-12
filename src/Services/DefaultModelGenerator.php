<?php

namespace SAC\EloquentModelGenerator\Services;

use SAC\EloquentModelGenerator\Models\GeneratedModel;
use SAC\EloquentModelGenerator\ValueObjects\TableSchema;
use SAC\EloquentModelGenerator\Services\ConfigurationService;
use Illuminate\Support\Str;

class DefaultModelGenerator implements ModelGeneratorInterface {
    public function __construct(
        private readonly ConfigurationService $configService
    ) {
    }

    /**
     * Generate a model from the given schema.
     *
     * @param string $table
     * @param TableSchema $schema
     * @param array<string, mixed> $config
     * @return GeneratedModel
     */
    public function generate(string $table, TableSchema $schema, array $config = []): GeneratedModel {
        $className = $config['class_name'] ?? $this->generateClassName($table);
        $namespace = $config['namespace'] ?? $this->configService->get('namespace', 'App\\Models');
        $baseClass = $config['base_class'] ?? $this->configService->get('base_model_class', 'Illuminate\\Database\\Eloquent\\Model');

        $content = $this->generateModelContent($className, $namespace, $table, $baseClass, $schema);

        return new GeneratedModel(
            className: $className,
            namespace: $namespace,
            tableName: $table,
            baseClass: $baseClass,
            content: $content
        );
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

    /**
     * Generate the model content.
     *
     * @param string $className
     * @param string $namespace
     * @param string $table
     * @param string $baseClass
     * @param TableSchema $schema
     * @return string
     */
    private function generateModelContent(
        string $className,
        string $namespace,
        string $table,
        string $baseClass,
        TableSchema $schema
    ): string {
        $fillable = [];
        $casts = [];
        $dates = [];
        $hidden = [];

        foreach ($schema->getColumns() as $column) {
            if (!$column->isPrimary()) {
                $fillable[] = $column->getName();
            }

            if ($column->getType() === 'datetime' || $column->getType() === 'timestamp') {
                $dates[] = $column->getName();
                $casts[$column->getName()] = 'datetime';
            } elseif ($column->getType() === 'date') {
                $dates[] = $column->getName();
                $casts[$column->getName()] = 'date';
            } elseif ($column->getType() === 'json') {
                $casts[$column->getName()] = 'array';
            } elseif ($column->getType() === 'boolean') {
                $casts[$column->getName()] = 'boolean';
            } elseif ($column->getType() === 'integer') {
                $casts[$column->getName()] = 'integer';
            } elseif ($column->getType() === 'float' || $column->getType() === 'decimal') {
                $casts[$column->getName()] = 'float';
            }
        }

        return <<<PHP
<?php

namespace {$namespace};

use {$baseClass};

class {$className} extends {$baseClass} {
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected \$table = '{$table}';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected \$fillable = {$this->renderArray($fillable)};

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<string>
     */
    protected \$hidden = {$this->renderArray($hidden)};

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected \$casts = {$this->renderArray($casts)};

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array<string>
     */
    protected \$dates = {$this->renderArray($dates)};
}
PHP;
    }

    /**
     * Render an array as a PHP array string.
     *
     * @param array<mixed> $array
     * @return string
     */
    private function renderArray(array $array): string {
        if (empty($array)) {
            return '[]';
        }

        $output = "[\n";
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $value = $this->renderArray($value);
            } elseif (is_string($value)) {
                $value = "'$value'";
            }

            if (is_string($key)) {
                $output .= "        '$key' => $value,\n";
            } else {
                $output .= "        $value,\n";
            }
        }
        $output .= "    ]";

        return $output;
    }
}
