<?php

namespace SAC\EloquentModelGenerator\Models;

use InvalidArgumentException;

class GeneratedModel
{
    /**
     * Common Laravel validation rules.
     *
     * @var array<string>
     */
    private const COMMON_VALIDATION_RULES = [
        'accepted',
        'active_url',
        'after',
        'after_or_equal',
        'alpha',
        'alpha_dash',
        'alpha_num',
        'array',
        'before',
        'before_or_equal',
        'between',
        'boolean',
        'confirmed',
        'date',
        'date_equals',
        'date_format',
        'different',
        'digits',
        'digits_between',
        'dimensions',
        'distinct',
        'email',
        'ends_with',
        'exists',
        'file',
        'filled',
        'gt',
        'gte',
        'image',
        'in',
        'in_array',
        'integer',
        'ip',
        'ipv4',
        'ipv6',
        'json',
        'lt',
        'lte',
        'max',
        'mimes',
        'mimetypes',
        'min',
        'not_in',
        'not_regex',
        'numeric',
        'present',
        'regex',
        'required',
        'required_if',
        'required_unless',
        'required_with',
        'required_with_all',
        'required_without',
        'required_without_all',
        'same',
        'size',
        'starts_with',
        'string',
        'timezone',
        'unique',
        'url',
        'uuid',
    ];

    /**
     * Valid cast types.
     *
     * @var array<string>
     */
    private const VALID_CAST_TYPES = [
        'array',
        'boolean',
        'collection',
        'date',
        'datetime',
        'decimal',
        'double',
        'encrypted',
        'float',
        'integer',
        'json',
        'object',
        'real',
        'string',
        'timestamp',
    ];

    /**
     * Valid relationship types.
     *
     * @var array<string>
     */
    private const VALID_RELATIONSHIP_TYPES = [
        'hasOne',
        'hasMany',
        'belongsTo',
        'belongsToMany',
        'hasOneThrough',
        'hasManyThrough',
        'morphOne',
        'morphMany',
        'morphTo',
        'morphToMany',
        'morphedByMany',
    ];

    /**
     * The model's fillable attributes.
     *
     * @var array<string>
     */
    private array $fillable = [];

    /**
     * The model's hidden attributes.
     *
     * @var array<string>
     */
    private array $hidden = [];

    /**
     * The model's cast types.
     *
     * @var array<string, string>
     */
    private array $casts = [];

    /**
     * The model's date attributes.
     *
     * @var array<string>
     */
    private array $dates = [];

    /**
     * The validation rules for the model.
     *
     * @var array<string, array<string>|string>
     */
    protected array $validationRules = [];

    /**
     * The model's validation messages.
     *
     * @var array<string, string>
     */
    private array $validationMessages = [];

    /**
     * The model's schema definition.
     *
     * @var array<string, mixed>
     */
    private array $schema = [];

    /**
     * The relationships defined for the model.
     *
     * @var array<string, array{type: string, model: string, foreignKey?: string, localKey?: string, table?: string, pivotColumns?: array<string>}>
     */
    protected array $relationships = [];

    /**
     * Whether the model uses soft deletes.
     */
    private bool $softDeletes = false;

    /**
     * Create a new generated model instance.
     */
    public function __construct(
        private string $className,
        private string $namespace,
        private string $tableName,
        private string $baseClass,
        private string $content
    ) {
        $this->validateClassName($className);
        $this->validateNamespace($namespace);
        $this->validateTableName($tableName);
        $this->validateBaseClass($baseClass);
    }

    /**
     * Validate all array properties.
     *
     * @throws InvalidArgumentException
     */
    private function validateArrays(): void
    {
        $this->validateFillable();
        $this->validateHidden();
        $this->validateCasts();
        $this->validateDates();
        $this->validateValidationRules();
        $this->validateSchema();
        $this->validateRelationships();
    }

    /**
     * Validate fillable array.
     *
     * @throws InvalidArgumentException
     */
    private function validateFillable(): void
    {
        foreach ($this->fillable as $field) {
            if (! is_string($field)) {
                throw new InvalidArgumentException(
                    'Invalid fillable field. All fillable fields must be strings.'
                );
            }
            if (! isset($this->schema[$field])) {
                throw new InvalidArgumentException(
                    "Fillable field '{$field}' does not exist in schema."
                );
            }
        }
    }

    /**
     * Validate hidden array.
     *
     * @throws InvalidArgumentException
     */
    private function validateHidden(): void
    {
        foreach ($this->hidden as $field) {
            if (! is_string($field)) {
                throw new InvalidArgumentException(
                    'Invalid hidden field. All hidden fields must be strings.'
                );
            }
            if (! isset($this->schema[$field])) {
                throw new InvalidArgumentException(
                    "Hidden field '{$field}' does not exist in schema."
                );
            }
        }
    }

    /**
     * Validate casts array.
     *
     * @throws InvalidArgumentException
     */
    private function validateCasts(): void
    {
        foreach ($this->casts as $field => $type) {
            if (! is_string($field) || ! is_string($type)) {
                throw new InvalidArgumentException(
                    'Invalid cast definition. Both field and type must be strings.'
                );
            }
            if (! isset($this->schema[$field])) {
                throw new InvalidArgumentException(
                    "Cast field '{$field}' does not exist in schema."
                );
            }
            if (! in_array($type, self::VALID_CAST_TYPES, true)) {
                throw new InvalidArgumentException(
                    "Invalid cast type '{$type}' for field '{$field}'. Valid types are: ".implode(', ', self::VALID_CAST_TYPES)
                );
            }
        }
    }

    /**
     * Validate dates array.
     *
     * @throws InvalidArgumentException
     */
    private function validateDates(): void
    {
        foreach ($this->dates as $field) {
            if (! is_string($field)) {
                throw new InvalidArgumentException(
                    'Invalid date field. All date fields must be strings.'
                );
            }
            if (! isset($this->schema[$field])) {
                throw new InvalidArgumentException(
                    "Date field '{$field}' does not exist in schema."
                );
            }
        }
    }

    /**
     * Validate validation rules array.
     *
     * @throws InvalidArgumentException
     */
    private function validateValidationRules(): void
    {
        foreach ($this->validationRules as $field => $rules) {
            if (! is_string($field)) {
                throw new InvalidArgumentException(
                    'Invalid validation rule key. Field name must be a string.'
                );
            }
            if (! isset($this->schema[$field])) {
                throw new InvalidArgumentException(
                    "Validation rules field '{$field}' does not exist in schema."
                );
            }

            // Handle both string and array rule formats
            $ruleArray = is_string($rules) ? explode('|', $rules) : (array) $rules;

            foreach ($ruleArray as $rule) {
                $this->validateSingleRule($field, $rule);
            }
        }
    }

    /**
     * Validate a single validation rule.
     *
     * @param  string|array  $rule
     *
     * @throws InvalidArgumentException
     */
    private function validateSingleRule(string $field, mixed $rule): void
    {
        if (is_array($rule)) {
            if (empty($rule) || ! isset($rule[0]) || ! is_string($rule[0])) {
                throw new InvalidArgumentException(
                    "Invalid validation rule format for field '{$field}'. Rule array must have a string as first element."
                );
            }
            $ruleName = $rule[0];
        } elseif (is_string($rule)) {
            $parts = explode(':', $rule, 2);
            $ruleName = $parts[0];
        } else {
            throw new InvalidArgumentException(
                "Invalid validation rule type for field '{$field}'. Rule must be string or array."
            );
        }

        // Check if it's a common rule or a custom rule class
        if (
            ! in_array($ruleName, self::COMMON_VALIDATION_RULES, true) &&
            ! class_exists($ruleName) &&
            ! str_starts_with($ruleName, 'Rule::')
        ) {
            throw new InvalidArgumentException(
                "Invalid validation rule '{$ruleName}' for field '{$field}'. Rule is not recognized."
            );
        }
    }

    /**
     * Validate schema array.
     *
     * @throws InvalidArgumentException
     */
    private function validateSchema(): void
    {
        foreach ($this->schema as $field => $definition) {
            if (! is_string($field)) {
                throw new InvalidArgumentException(
                    'Invalid schema field name. Field name must be a string.'
                );
            }
            if (! is_array($definition)) {
                throw new InvalidArgumentException(
                    "Invalid schema definition for field '{$field}'. Definition must be an array."
                );
            }
            if (! isset($definition['type']) || ! is_string($definition['type'])) {
                throw new InvalidArgumentException(
                    "Invalid schema definition for field '{$field}'. Type must be specified and must be a string."
                );
            }
            if (isset($definition['nullable']) && ! is_bool($definition['nullable'])) {
                throw new InvalidArgumentException(
                    "Invalid schema definition for field '{$field}'. Nullable must be a boolean."
                );
            }
            if (isset($definition['unique']) && ! is_bool($definition['unique'])) {
                throw new InvalidArgumentException(
                    "Invalid schema definition for field '{$field}'. Unique must be a boolean."
                );
            }
            if (isset($definition['primary']) && ! is_bool($definition['primary'])) {
                throw new InvalidArgumentException(
                    "Invalid schema definition for field '{$field}'. Primary must be a boolean."
                );
            }
        }
    }

    /**
     * Validate relationships array.
     *
     * @throws InvalidArgumentException
     */
    private function validateRelationships(): void
    {
        foreach ($this->relationships as $name => $definition) {
            if (! is_string($name)) {
                throw new InvalidArgumentException(
                    'Invalid relationship name. Name must be a string.'
                );
            }
            if (! is_array($definition)) {
                throw new InvalidArgumentException(
                    "Invalid relationship definition for '{$name}'. Definition must be an array."
                );
            }
            if (! isset($definition['type']) || ! is_string($definition['type'])) {
                throw new InvalidArgumentException(
                    "Invalid relationship definition for '{$name}'. Type must be specified and must be a string."
                );
            }
            if (! in_array($definition['type'], self::VALID_RELATIONSHIP_TYPES, true)) {
                throw new InvalidArgumentException(
                    "Invalid relationship type '{$definition['type']}' for '{$name}'. Valid types are: ".implode(', ', self::VALID_RELATIONSHIP_TYPES)
                );
            }
            if (! isset($definition['model']) || ! is_string($definition['model'])) {
                throw new InvalidArgumentException(
                    "Invalid relationship definition for '{$name}'. Model must be specified and must be a string."
                );
            }
            if (! $this->validateModelExists($definition['model'])) {
                throw new InvalidArgumentException(
                    "Invalid relationship definition for '{$name}'. Model class '{$definition['model']}' does not exist."
                );
            }
            if (isset($definition['foreignKey']) && ! is_string($definition['foreignKey'])) {
                throw new InvalidArgumentException(
                    "Invalid relationship definition for '{$name}'. Foreign key must be a string."
                );
            }
            if (isset($definition['localKey']) && ! is_string($definition['localKey'])) {
                throw new InvalidArgumentException(
                    "Invalid relationship definition for '{$name}'. Local key must be a string."
                );
            }
            if (isset($definition['foreignKey']) && ! isset($this->schema[$definition['foreignKey']])) {
                throw new InvalidArgumentException(
                    "Invalid relationship definition for '{$name}'. Foreign key '{$definition['foreignKey']}' does not exist in schema."
                );
            }
            if (isset($definition['localKey']) && ! isset($this->schema[$definition['localKey']])) {
                throw new InvalidArgumentException(
                    "Invalid relationship definition for '{$name}'. Local key '{$definition['localKey']}' does not exist in schema."
                );
            }
        }
    }

    /**
     * Validate that a model class exists.
     */
    private function validateModelExists(string $modelClass): bool
    {
        // Handle fully qualified class names
        if (class_exists($modelClass)) {
            return true;
        }

        // Handle relative class names in the same namespace
        $fullyQualifiedClass = $this->namespace.'\\'.$modelClass;
        if (class_exists($fullyQualifiedClass)) {
            return true;
        }

        // Handle Laravel model namespace
        $laravelModelClass = 'App\\Models\\'.$modelClass;

        return class_exists($laravelModelClass);
    }

    /**
     * Validate the class name.
     *
     * @throws InvalidArgumentException
     */
    private function validateClassName(string $className): void
    {
        if (! preg_match('/^[A-Z][a-zA-Z0-9]*$/', $className)) {
            throw new InvalidArgumentException(
                "Invalid class name '{$className}'. Class name must start with an uppercase letter and contain only alphanumeric characters."
            );
        }
    }

    /**
     * Validate the namespace.
     *
     * @throws InvalidArgumentException
     */
    private function validateNamespace(string $namespace): void
    {
        if (! preg_match('/^[A-Za-z0-9\\\\]+$/', $namespace)) {
            throw new InvalidArgumentException(
                "Invalid namespace '{$namespace}'. Namespace must contain only alphanumeric characters and backslashes."
            );
        }
    }

    /**
     * Validate the table name.
     *
     * @throws InvalidArgumentException
     */
    private function validateTableName(string $tableName): void
    {
        if (! preg_match('/^[a-zA-Z_][a-zA-Z0-9_]*$/', $tableName)) {
            throw new InvalidArgumentException(
                "Invalid table name '{$tableName}'. Table name must start with a letter or underscore and contain only alphanumeric characters and underscores."
            );
        }
    }

    /**
     * Validate the base class.
     *
     * @throws InvalidArgumentException
     */
    private function validateBaseClass(string $baseClass): void
    {
        if (! preg_match('/^[A-Za-z0-9\\\\]+$/', $baseClass)) {
            throw new InvalidArgumentException(
                "Invalid base class '{$baseClass}'. Base class must contain only alphanumeric characters and backslashes."
            );
        }
    }

    /**
     * Get the class name.
     */
    public function getClassName(): string
    {
        return $this->className;
    }

    /**
     * Get the namespace.
     */
    public function getNamespace(): string
    {
        return $this->namespace;
    }

    /**
     * Get the table name.
     */
    public function getTableName(): string
    {
        return $this->tableName;
    }

    /**
     * Get the base class.
     */
    public function getBaseClass(): string
    {
        return $this->baseClass;
    }

    /**
     * Get the schema.
     *
     * @return array<string, mixed>
     */
    public function getSchema(): array
    {
        return $this->schema;
    }

    /**
     * Get the relationships.
     *
     * @return array<string, array{type: string, model: string, foreignKey?: string, localKey?: string, table?: string, pivotColumns?: array<string>}>
     */
    public function getRelationships(): array
    {
        return $this->relationships;
    }

    /**
     * Get the casts.
     *
     * @return array<string, string>
     */
    public function getCasts(): array
    {
        return $this->casts;
    }

    /**
     * Get the fillable attributes.
     *
     * @return array<string>
     */
    public function getFillable(): array
    {
        return $this->fillable;
    }

    /**
     * Get the hidden attributes.
     *
     * @return array<string>
     */
    public function getHidden(): array
    {
        return $this->hidden;
    }

    /**
     * Get the validation rules.
     *
     * @return array<string, array<string>|string>
     */
    public function getValidationRules(): array
    {
        return $this->validationRules;
    }

    /**
     * Get the dates.
     *
     * @return array<string>
     */
    public function getDates(): array
    {
        return $this->dates;
    }

    /**
     * Check if the model uses soft deletes.
     */
    public function usesSoftDeletes(): bool
    {
        return $this->softDeletes;
    }

    /**
     * Get the file path for this model.
     */
    public function getFilePath(string $basePath): string
    {
        $relativePath = str_replace('\\', '/', $this->namespace);

        return rtrim($basePath, '/').'/'.$relativePath.'/'.$this->className.'.php';
    }

    /**
     * Convert the model to an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'className' => $this->className,
            'namespace' => $this->namespace,
            'tableName' => $this->tableName,
            'baseClass' => $this->baseClass,
            'fillable' => $this->fillable,
            'hidden' => $this->hidden,
            'casts' => $this->casts,
            'dates' => $this->dates,
            'validationRules' => $this->validationRules,
            'useSoftDeletes' => $this->softDeletes,
            'schema' => $this->schema,
            'relationships' => $this->relationships,
        ];
    }

    /**
     * Get the fully qualified class name.
     */
    public function getFullyQualifiedClassName(): string
    {
        return $this->namespace.'\\'.$this->className;
    }

    /**
     * Render the model as a string.
     */
    public function render(): string
    {
        return $this->content;
    }

    /**
     * Set the validation rules.
     *
     * @param  array<string, array<string>|string>  $rules
     */
    public function setValidationRules(array $rules): void
    {
        $this->validateSingleRule($rules);
        $this->validationRules = $rules;
    }

    /**
     * Set the validation messages.
     *
     * @param  array<string, string>  $messages
     */
    public function setValidationMessages(array $messages): void
    {
        $this->validationMessages = $messages;
    }

    /**
     * Get the validation messages.
     *
     * @return array<string, string>
     */
    public function getValidationMessages(): array
    {
        return $this->validationMessages;
    }

    /**
     * Set the model content.
     */
    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    /**
     * Get the model content.
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * Validate array values in validation rules
     *
     * @param  array<string, string|array<string>>  $rules
     */
    protected function validateArrays(array $rules): bool
    {
        foreach ($rules as $field => $rule) {
            if (is_array($rule)) {
                foreach ($rule as $singleRule) {
                    if (! is_string($singleRule)) {
                        return false;
                    }
                }
            } elseif (! is_string($rule)) {
                return false;
            }
        }

        return true;
    }

    /**
     * Validate a single rule
     *
     * @param  string|array<string>  $rule
     */
    protected function validateSingleRule(string $field, $rule): bool
    {
        if (is_array($rule)) {
            return $this->validateArrays([$field => $rule]);
        }

        return is_string($rule);
    }
}
