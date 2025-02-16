<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Services\TypeInference;

use Illuminate\Support\Collection;
use SAC\EloquentModelGenerator\Contracts\TypeInference;
use SAC\EloquentModelGenerator\ValueObjects\Column;
use SAC\EloquentModelGenerator\ValueObjects\TableSchema;

class TypeInferenceService implements TypeInference {
    /**
     * Infer PHP type for a column.
     */
    public function inferPhpType(Column $column): string {
        return match ($column->getType()) {
            'integer', 'bigint', 'smallint' => 'int',
            'decimal', 'float', 'double' => 'float',
            'boolean' => 'bool',
            'date', 'datetime', 'timestamp' => '\DateTimeInterface',
            'json', 'jsonb' => 'array',
            default => 'string',
        };
    }

    /**
     * Infer docblock type for a column.
     */
    public function inferDocblockType(Column $column): string {
        $type = $this->inferPhpType($column);

        if ($column->isNullable()) {
            $type = $type . '|null';
        }

        // For enum columns, add the possible values
        if ($column->getEnumValues() !== null) {
            $enumValues = array_map(fn(string $value) => "'$value'", $column->getEnumValues());
            $type .= ' One of: ' . implode(', ', $enumValues);
        }

        return $type;
    }

    /**
     * Infer cast type for a column.
     */
    public function inferCastType(Column $column): string {
        return match ($column->getType()) {
            'integer', 'bigint', 'smallint' => 'integer',
            'decimal' => 'decimal:' . $this->inferDecimalPrecision($column),
            'float', 'double' => 'float',
            'boolean' => 'boolean',
            'date' => 'date',
            'datetime', 'timestamp' => 'datetime',
            'json', 'jsonb' => 'array',
            default => 'string',
        };
    }

    /**
     * Infer validation rules for a column.
     *
     * @return array<string>
     */
    public function inferValidationRules(Column $column): array {
        $rules = [];

        // Required/nullable rule
        if (!$column->isNullable()) {
            $rules[] = 'required';
        } else {
            $rules[] = 'nullable';
        }

        // Type-specific rules
        $rules[] = match ($column->getType()) {
            'integer', 'bigint', 'smallint' => 'integer',
            'decimal', 'float', 'double' => 'numeric',
            'boolean' => 'boolean',
            'date' => 'date',
            'datetime', 'timestamp' => 'date_format:Y-m-d H:i:s',
            'json', 'jsonb' => 'json',
            default => 'string',
        };

        // Length rule for string types
        if (in_array($column->getType(), ['char', 'varchar', 'string', 'text'])) {
            $length = $column->getLength();
            if ($length !== null) {
                $rules[] = "max:{$length}";
            }
        }

        // Unique rule
        if ($column->isUnique()) {
            $rules[] = 'unique';
        }

        // Enum values
        if ($column->getEnumValues() !== null) {
            $rules[] = 'in:' . implode(',', $column->getEnumValues());
        }

        return $rules;
    }

    /**
     * Infer factory type definition for a column.
     */
    public function inferFactoryType(Column $column): string {
        if ($column->getEnumValues() !== null) {
            return 'fake()->randomElement([' . implode(', ', array_map(fn($v) => "'$v'", $column->getEnumValues())) . '])';
        }

        return match ($column->getType()) {
            'integer', 'bigint' => 'fake()->numberBetween(1, 1000000)',
            'smallint' => 'fake()->numberBetween(1, 32767)',
            'decimal', 'float', 'double' => 'fake()->randomFloat(2, 0, 10000)',
            'boolean' => 'fake()->boolean',
            'date' => 'fake()->date()',
            'datetime', 'timestamp' => 'fake()->dateTime()',
            'json', 'jsonb' => '[]',
            'text' => 'fake()->paragraph',
            default => 'fake()->word',
        };
    }

    /**
     * Infer decimal precision for decimal type casting.
     */
    private function inferDecimalPrecision(Column $column): string {
        $length = $column->getLength();
        if ($length === null) {
            return '2'; // Default to 2 decimal places
        }

        // For decimal types, length is often in format "8,2" where 8 is total digits and 2 is decimal places
        if (str_contains((string)$length, ',')) {
            [$total, $places] = explode(',', (string)$length);
            return $places;
        }

        return '2'; // Default to 2 decimal places if no specific precision is found
    }
}