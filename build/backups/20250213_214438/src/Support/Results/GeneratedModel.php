<?php

namespace SAC\EloquentModelGenerator\Support\Results;

class GeneratedModel {
    /**
     * Create a new generated model result instance.
     *
     * @param string $className
     * @param string $namespace
     * @param string $tableName
     * @param string $baseClass
     * @param string $content
     */
    public function __construct(
        private readonly string $className,
        private readonly string $namespace,
        private readonly string $tableName,
        private readonly string $baseClass,
        private readonly string $content
    ) {
    }

    /**
     * Get the class name.
     *
     * @return string
     */
    public function getClassName(): string {
        return $this->className;
    }

    /**
     * Get the namespace.
     *
     * @return string
     */
    public function getNamespace(): string {
        return $this->namespace;
    }

    /**
     * Get the table name.
     *
     * @return string
     */
    public function getTableName(): string {
        return $this->tableName;
    }

    /**
     * Get the base class.
     *
     * @return string
     */
    public function getBaseClass(): string {
        return $this->baseClass;
    }

    /**
     * Get the model content.
     *
     * @return string
     */
    public function getContent(): string {
        return $this->content;
    }
}
