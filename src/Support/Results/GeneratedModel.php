<?php

namespace SAC\EloquentModelGenerator\Support\Results;

class GeneratedModel
{
    /**
     * Create a new generated model result instance.
     */
    public function __construct(
        private readonly string $className,
        private readonly string $namespace,
        private readonly string $tableName,
        private readonly string $baseClass,
        private readonly string $content
    ) {}

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
     * Get the model content.
     */
    public function getContent(): string
    {
        return $this->content;
    }
}
