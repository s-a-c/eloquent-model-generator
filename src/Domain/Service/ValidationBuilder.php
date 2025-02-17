<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Domain\Service;

use SAC\EloquentModelGenerator\Model\ModelDefinition;

final class ValidationBuilder
{
    public function buildRules(ModelDefinition $model): array
    {
        $rules = [];

        foreach ($model->getColumns() as $name => $column) {
            $columnRules = $this->buildColumnRules($column);
            if (!empty($columnRules)) {
                $rules[$name] = $columnRules;
            }
        }

        return $rules;
    }

    private function buildColumnRules(array $column): array
    {
        $rules = [];

        if (!($column['nullable'] ?? false)) {
            $rules[] = 'required';
        }

        $rules[] = match ($column['type']) {
            'integer', 'bigint' => 'integer',
            'decimal', 'float', 'double' => 'numeric',
            'boolean' => 'boolean',
            'date' => 'date',
            'datetime' => 'datetime',
            'json' => 'json',
            'string', 'text' => 'string',
            default => null
        };

        if (isset($column['length']) && $column['length'] > 0) {
            $rules[] = "max:{$column['length']}";
        }

        if (isset($column['unsigned']) && $column['unsigned']) {
            $rules[] = 'min:0';
        }

        return array_filter($rules);
    }
}
