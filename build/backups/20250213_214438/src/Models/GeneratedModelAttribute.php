<?php

namespace SAC\EloquentModelGenerator\Models;

class GeneratedModelAttribute {
    /**
     * Create a new generated model attribute instance.
     *
     * @param string $name
     * @param string $type
     * @param int|null $length
     * @param bool $nullable
     * @param mixed $default
     * @param bool $unsigned
     * @param bool $autoIncrement
     * @param bool $primaryKey
     * @param bool $unique
     */
    public function __construct(
        private readonly string $name,
        private readonly string $type,
        private readonly ?int $length = null,
        private readonly bool $nullable = false,
        private readonly mixed $default = null,
        private readonly bool $unsigned = false,
        private readonly bool $autoIncrement = false,
        private readonly bool $primaryKey = false,
        private readonly bool $unique = false
    ) {
    }

    /**
     * Get the attribute name.
     *
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * Get the attribute type.
     *
     * @return string
     */
    public function getType(): string {
        return $this->type;
    }

    /**
     * Get the attribute length.
     *
     * @return int|null
     */
    public function getLength(): ?int {
        return $this->length;
    }

    /**
     * Check if the attribute is nullable.
     *
     * @return bool
     */
    public function isNullable(): bool {
        return $this->nullable;
    }

    /**
     * Get the attribute default value.
     *
     * @return mixed
     */
    public function getDefault(): mixed {
        return $this->default;
    }

    /**
     * Check if the attribute is unsigned.
     *
     * @return bool
     */
    public function isUnsigned(): bool {
        return $this->unsigned;
    }

    /**
     * Check if the attribute is auto-incrementing.
     *
     * @return bool
     */
    public function isAutoIncrement(): bool {
        return $this->autoIncrement;
    }

    /**
     * Check if the attribute is a primary key.
     *
     * @return bool
     */
    public function isPrimaryKey(): bool {
        return $this->primaryKey;
    }

    /**
     * Check if the attribute is unique.
     *
     * @return bool
     */
    public function isUnique(): bool {
        return $this->unique;
    }
}
