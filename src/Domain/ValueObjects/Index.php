<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Domain\ValueObjects;

/**
 * @immutable
 */
final class Index
{
    public const TYPE_PRIMARY = 'primary';

    public const TYPE_UNIQUE = 'unique';

    public const TYPE_INDEX = 'index';

    public const TYPE_SPATIAL = 'spatial';

    public const TYPE_FULLTEXT = 'fulltext';

    /**
     * @param  array<string>  $columns
     */
    public function __construct(
        public readonly string $name,
        public readonly array $columns,
        public readonly string $type = self::TYPE_INDEX,
        public readonly bool $isUnique = false,
    ) {}

    /**
     * Check if index is primary key.
     */
    public function isPrimary(): bool
    {
        return $this->type === self::TYPE_PRIMARY;
    }

    /**
     * Check if index is spatial.
     */
    public function isSpatial(): bool
    {
        return $this->type === self::TYPE_SPATIAL;
    }

    /**
     * Check if index is fulltext.
     */
    public function isFulltext(): bool
    {
        return $this->type === self::TYPE_FULLTEXT;
    }

    /**
     * Check if index is compound (multiple columns).
     */
    public function isCompound(): bool
    {
        return count($this->columns) > 1;
    }

    /**
     * Get index method name.
     */
    public function getMethodName(): string
    {
        return match ($this->type) {
            self::TYPE_PRIMARY => 'primary',
            self::TYPE_UNIQUE => 'unique',
            self::TYPE_SPATIAL => 'spatial',
            self::TYPE_FULLTEXT => 'fulltext',
            default => 'index',
        };
    }

    /**
     * Get index type for migration.
     */
    public function getMigrationType(): string
    {
        if ($this->isPrimary()) {
            return 'primary';
        }

        if ($this->isUnique) {
            return 'unique';
        }

        if ($this->isSpatial()) {
            return 'spatial';
        }

        if ($this->isFulltext()) {
            return 'fulltext';
        }

        return 'index';
    }

    /**
     * Get index columns as string.
     */
    public function getColumnsString(): string
    {
        return implode(',', $this->columns);
    }

    /**
     * Check if index contains column.
     */
    public function hasColumn(string $column): bool
    {
        return in_array($column, $this->columns, true);
    }
}
