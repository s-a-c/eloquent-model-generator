<?php

namespace SAC\EloquentModelGenerator\Model;

class Attributes
{
    /**
     * Create a new attributes instance.
     *
     * @param  array<string>  $fillable
     * @param  array<string, string>  $casts
     * @param  array<string>  $dates
     */
    public function __construct(
        private readonly array $fillable = [],
        private readonly array $casts = [],
        private readonly array $dates = []
    ) {}

    /**
     * Convert fillable attributes to string.
     */
    public function toFillable(): string
    {
        if ($this->fillable === []) {
            return 'protected $fillable = [];';
        }

        $fillable = implode("', '", $this->fillable);

        return sprintf("protected \$fillable = ['%s'];", $fillable);
    }

    /**
     * Convert cast attributes to string.
     */
    public function toCasts(): string
    {
        if ($this->casts === []) {
            return 'protected $casts = [];';
        }

        $casts = [];
        foreach ($this->casts as $field => $type) {
            $casts[] = sprintf("'%s' => '%s'", $field, $type);
        }

        return 'protected $casts = ['.implode(', ', $casts).'];';
    }

    /**
     * Convert date attributes to string.
     */
    public function toDates(): string
    {
        if ($this->dates === []) {
            return 'protected $dates = [];';
        }

        $dates = implode("', '", $this->dates);

        return sprintf("protected \$dates = ['%s'];", $dates);
    }
}
