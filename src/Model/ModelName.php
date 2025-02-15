<?php

namespace SAC\EloquentModelGenerator\Model;

use Illuminate\Support\Str;
use InvalidArgumentException;

class ModelName
{
    private readonly string $name;

    /**
     * Create a new model name instance.
     *
     * @throws InvalidArgumentException
     */
    public function __construct(string $name)
    {
        if (! $this->isValidClassName($name)) {
            throw new InvalidArgumentException('Invalid class name format');
        }

        $this->name = $name;
    }

    /**
     * Create a model name from a table name.
     *
     * @throws InvalidArgumentException
     */
    public static function fromTable(string $table): self
    {
        if ($table === '' || $table === '0') {
            throw new InvalidArgumentException('Table name cannot be empty');
        }

        // Remove leading/trailing underscores and spaces
        $table = trim($table, '_ ');

        // Handle special cases
        if (str_contains($table, '__')) {
            throw new InvalidArgumentException('Table name cannot contain double underscores');
        }

        // Convert snake_case to singular form and ensure lowercase
        $singular = Str::singular(strtolower($table));

        // Convert to StudlyCase
        $name = Str::studly($singular);

        // Special handling for data/datum
        if ($name === 'Datum') {
            $name = 'Data';
        }

        // Special handling for status/statuses
        if (Str::endsWith(strtolower($name), 'status')) {
            $name = 'Status';
        }

        // Special handling for common irregular plurals
        $irregulars = [
            'children' => 'Child',
            'people' => 'Person',
            'men' => 'Man',
            'women' => 'Woman',
            'teeth' => 'Tooth',
            'feet' => 'Foot',
            'geese' => 'Goose',
            'phenomena' => 'Phenomenon',
            'criteria' => 'Criterion',
            'radii' => 'Radius',
        ];

        $lowerTable = strtolower($table);
        if (isset($irregulars[$lowerTable])) {
            $name = $irregulars[$lowerTable];
        }

        return new self($name);
    }

    /**
     * Convert the model name to a string.
     */
    public function toString(): string
    {
        return $this->name;
    }

    /**
     * Check if a string is a valid class name.
     */
    private function isValidClassName(string $name): bool
    {
        // Must start with an uppercase letter
        if (! preg_match('/^[A-Z]/', $name)) {
            return false;
        }

        // Must only contain letters, numbers, and no spaces or special characters
        if (! preg_match('/^[A-Za-z0-9]+$/', $name)) {
            return false;
        }

        // Must not be a PHP reserved word
        $reservedWords = ['List', 'String', 'Class', 'Interface', 'Trait', 'Extends', 'Implements', 'Public', 'Protected', 'Private', 'Abstract', 'Final', 'Static'];

        return ! in_array($name, $reservedWords, true);
    }
}
