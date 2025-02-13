<?php

namespace SAC\EloquentModelGenerator\Services;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Str;

class ValidationRuleGenerator {
    /**
     * Generate validation rules for a model based on its schema.
     *
     * @param array $schema
     * @return array<string, string|array>
     */
    public function generateRules(array $schema): array {
        $rules = [];
        $tableName = $schema['table_name'] ?? $schema['tableName'] ?? '';

        foreach ($schema['columns'] as $column => $definition) {
            if ($column === 'id') {
                continue; // Skip primary key
            }

            $columnRules = $this->generateColumnRules($column, $definition, $tableName);
            if (!empty($columnRules)) {
                $rules[$column] = $columnRules;
            }
        }

        return $rules;
    }

    /**
     * Generate validation rules for a specific column.
     *
     * @param string $column
     * @param array $definition
     * @param string $tableName
     * @return string|array
     */
    protected function generateColumnRules(string $column, array $definition, string $tableName): string|array {
        $rules = [];

        // Required/Nullable
        if (!($definition['nullable'] ?? true)) {
            $rules[] = 'required';
        } else {
            $rules[] = 'nullable';
        }

        // Type-specific rules
        $rules = array_merge($rules, $this->getTypeRules($definition));

        // Length/Size rules
        if (isset($definition['length'])) {
            $rules[] = "max:{$definition['length']}";
        }

        // Unique constraint
        if ($definition['unique'] ?? false) {
            $rules[] = empty($tableName) ? 'unique' : "unique:{$tableName},{$column}";
        }

        // Custom rules from schema
        if (isset($definition['rules'])) {
            $customRules = is_array($definition['rules'])
                ? $definition['rules']
                : explode('|', $definition['rules']);
            $rules = array_merge($rules, $customRules);
        }

        return implode('|', array_unique($rules));
    }

    /**
     * Get validation rules based on column type.
     *
     * @param array $definition
     * @return array
     */
    protected function getTypeRules(array $definition): array {
        $type = $definition['type'] ?? 'string';
        $rules = [];

        switch ($type) {
            case 'string':
                $rules[] = 'string';
                break;
            case 'integer':
                $rules[] = 'integer';
                if (isset($definition['unsigned']) && $definition['unsigned']) {
                    $rules[] = 'min:0';
                }
                break;
            case 'decimal':
            case 'float':
                $rules[] = 'numeric';
                if (isset($definition['unsigned']) && $definition['unsigned']) {
                    $rules[] = 'min:0';
                }
                if (isset($definition['scale'])) {
                    $rules[] = "decimal:{$definition['scale']}";
                }
                break;
            case 'boolean':
                $rules[] = 'boolean';
                break;
            case 'date':
                $rules[] = 'date';
                break;
            case 'datetime':
                $rules[] = 'date_format:Y-m-d H:i:s';
                break;
            case 'time':
                $rules[] = 'date_format:H:i:s';
                break;
            case 'json':
                $rules[] = 'json';
                break;
            case 'enum':
                if (isset($definition['values'])) {
                    $values = implode(',', $definition['values']);
                    $rules[] = "in:{$values}";
                }
                break;
            case 'email':
                $rules[] = 'email:rfc,dns';
                break;
            case 'url':
                $rules[] = 'url';
                break;
            case 'ip':
                $rules[] = 'ip';
                break;
            case 'uuid':
                $rules[] = 'uuid';
                break;
        }

        return $rules;
    }

    /**
     * Generate validation messages for a model based on its schema.
     *
     * @param array $schema
     * @return array<string, string>
     */
    public function generateMessages(array $schema): array {
        $messages = [];

        foreach ($schema['columns'] as $column => $definition) {
            if ($column === 'id') {
                continue;
            }

            // Custom messages from schema
            if (isset($definition['messages'])) {
                foreach ($definition['messages'] as $rule => $message) {
                    $messages["{$column}.{$rule}"] = $message;
                }
                continue;
            }

            // Default messages
            $label = Str::title(str_replace('_', ' ', $column));

            if (!($definition['nullable'] ?? true)) {
                $messages["{$column}.required"] = "{$label} is required.";
            }

            if (isset($definition['unique']) && $definition['unique']) {
                $messages["{$column}.unique"] = "{$label} has already been taken.";
            }

            // Type-specific messages
            $this->addTypeSpecificMessages($messages, $column, $label, $definition);
        }

        return $messages;
    }

    /**
     * Add type-specific validation messages.
     *
     * @param array &$messages
     * @param string $column
     * @param string $label
     * @param array $definition
     */
    protected function addTypeSpecificMessages(array &$messages, string $column, string $label, array $definition): void {
        $type = $definition['type'] ?? 'string';

        switch ($type) {
            case 'integer':
                $messages["{$column}.integer"] = "{$label} must be an integer.";
                if (isset($definition['unsigned']) && $definition['unsigned']) {
                    $messages["{$column}.min"] = "{$label} must be at least 0.";
                }
                break;
            case 'decimal':
            case 'float':
                $messages["{$column}.numeric"] = "{$label} must be a number.";
                if (isset($definition['scale'])) {
                    $messages["{$column}.decimal"] = "{$label} must have {$definition['scale']} decimal places.";
                }
                break;
            case 'boolean':
                $messages["{$column}.boolean"] = "{$label} must be true or false.";
                break;
            case 'date':
                $messages["{$column}.date"] = "{$label} must be a valid date.";
                break;
            case 'datetime':
                $messages["{$column}.date_format"] = "{$label} must be in the format Y-m-d H:i:s.";
                break;
            case 'email':
                $messages["{$column}.email"] = "{$label} must be a valid email address.";
                break;
            case 'url':
                $messages["{$column}.url"] = "{$label} must be a valid URL.";
                break;
            case 'ip':
                $messages["{$column}.ip"] = "{$label} must be a valid IP address.";
                break;
            case 'uuid':
                $messages["{$column}.uuid"] = "{$label} must be a valid UUID.";
                break;
            case 'enum':
                if (isset($definition['values'])) {
                    $values = implode(', ', $definition['values']);
                    $messages["{$column}.in"] = "The {$column} field must be one of: {$values}.";
                }
                break;
        }
    }
}
