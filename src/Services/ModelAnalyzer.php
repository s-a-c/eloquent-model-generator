<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Services;

use SAC\EloquentModelGenerator\Model\ModelDefinition;

final class ModelAnalyzer
{
    /**
     * Analyze a model definition and return analysis results
     *
     * @return array{
     *     name: string,
     *     namespace: string,
     *     table: string,
     *     columns: array<string, array>,
     *     relations: array<string, array>,
     *     validation_rules: array<string, array<string>>,
     *     type_hints: array<string, string>
     * }
     */
    public function analyze(ModelDefinition $model): array
    {
        return [
            'name' => $model->getName(),
            'namespace' => $model->getNamespace(),
            'table' => $model->getTableName(),
            'columns' => $this->analyzeColumns($model),
            'relations' => $this->analyzeRelations($model),
            'validation_rules' => $this->generateValidationRules($model),
            'type_hints' => $this->inferTypeHints($model),
        ];
    }

    /**
     * @return array<string, array>
     */
    private function analyzeColumns(ModelDefinition $model): array
    {
        return array_map(
            fn (array $column) => [
                'type' => $column['type'] ?? 'string',
                'nullable' => $column['nullable'] ?? false,
                'default' => $column['default'] ?? null,
            ],
            $model->getColumns()
        );
    }

    /**
     * @return array<string, array>
     */
    private function analyzeRelations(ModelDefinition $model): array
    {
        return array_map(
            fn (array $relation) => [
                'type' => $relation['type'],
                'model' => $relation['model'],
                'foreign_key' => $relation['foreign_key'],
                'local_key' => $relation['local_key'],
            ],
            $model->getRelations()
        );
    }

    /**
     * @return array<string, array<string>>
     */
    private function generateValidationRules(ModelDefinition $model): array
    {
        $rules = [];
        foreach ($model->getColumns() as $column => $definition) {
            $rules[$column] = $this->columnToValidationRules($definition);
        }
        return $rules;
    }

    /**
     * @return array<string>
     */
    private function columnToValidationRules(array $definition): array
    {
        $rules = [];

        if (!($definition['nullable'] ?? false)) {
            $rules[] = 'required';
        }

        switch ($definition['type'] ?? 'string') {
            case 'integer':
                $rules[] = 'integer';
                break;
            case 'decimal':
                $rules[] = 'numeric';
                break;
            case 'boolean':
                $rules[] = 'boolean';
                break;
            case 'date':
                $rules[] = 'date';
                break;
            case 'datetime':
                $rules[] = 'datetime';
                break;
            default:
                $rules[] = 'string';
        }

        return $rules;
    }

    /**
     * @return array<string, string>
     */
    private function inferTypeHints(ModelDefinition $model): array
    {
        $hints = [];
        foreach ($model->getColumns() as $column => $definition) {
            $hints[$column] = $this->columnToTypeHint($definition);
        }
        return $hints;
    }

    private function columnToTypeHint(array $definition): string
    {
        $type = match ($definition['type'] ?? 'string') {
            'integer' => 'int',
            'decimal' => 'float',
            'boolean' => 'bool',
            'date', 'datetime' => '\DateTimeInterface',
            default => 'string'
        };

        return ($definition['nullable'] ?? false) ? "?{$type}" : $type;
    }
}
