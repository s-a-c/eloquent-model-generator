<?php

namespace SAC\EloquentModelGenerator\Model;

class Attributes {
    /**
     * Create a new attributes instance.
     *
     * @param array<string> $fillable
     * @param array<string, string> $casts
     * @param array<string> $dates
     */
    public function __construct(
        private array $fillable = [],
        private array $casts = [],
        private array $dates = []
    ) {
    }

    /**
     * Convert fillable attributes to string.
     *
     * @return string
     */
    public function toFillable(): string {
        if (empty($this->fillable)) {
            return "protected \$fillable = [];";
        }
        $fillable = implode("', '", $this->fillable);
        return "protected \$fillable = ['{$fillable}'];";
    }

    /**
     * Convert cast attributes to string.
     *
     * @return string
     */
    public function toCasts(): string {
        if (empty($this->casts)) {
            return "protected \$casts = [];";
        }
        $casts = [];
        foreach ($this->casts as $field => $type) {
            $casts[] = "'{$field}' => '{$type}'";
        }
        return "protected \$casts = [" . implode(', ', $casts) . "];";
    }

    /**
     * Convert date attributes to string.
     *
     * @return string
     */
    public function toDates(): string {
        if (empty($this->dates)) {
            return "protected \$dates = [];";
        }
        $dates = implode("', '", $this->dates);
        return "protected \$dates = ['{$dates}'];";
    }
}
