<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Exceptions;

class SchemaAnalyzerException extends ModelGeneratorException {
    public static function tableNotFound(string $table): self {
        return new self("Table {$table} does not exist");
    }

    public static function columnNotFound(string $table, string $column): self {
        return new self("Column {$column} not found in table {$table}");
    }

    public static function invalidColumnType(string $table, string $column, string $type): self {
        return new self("Invalid column type {$type} for {$column} in table {$table}");
    }

    public static function invalidForeignKey(string $table, string $column, string $referencedTable): self {
        return new self("Invalid foreign key {$column} in table {$table} referencing {$referencedTable}");
    }

    public static function invalidIndex(string $table, string $index): self {
        return new self("Invalid index {$index} in table {$table}");
    }

    public static function databaseConnectionError(string $message): self {
        return new self("Database connection error: {$message}");
    }

    public static function invalidSchemaFormat(string $table): self {
        return new self("Invalid schema format for table {$table}");
    }

    public static function missingPrimaryKey(string $table): self {
        return new self("Missing primary key in table {$table}");
    }

    public static function duplicateColumn(string $table, string $column): self {
        return new self("Duplicate column {$column} in table {$table}");
    }

    public static function circularReference(string $table, string $referencedTable): self {
        return new self("Circular reference detected between tables {$table} and {$referencedTable}");
    }

    public static function invalidMorphType(string $table, string $column): self {
        return new self("Invalid morph type column {$column} in table {$table}");
    }

    public static function invalidTimestampColumn(string $table, string $column): self {
        return new self("Invalid timestamp column {$column} in table {$table}");
    }

    public static function invalidSoftDeleteColumn(string $table): self {
        return new self("Invalid soft delete column in table {$table}");
    }

    public static function invalidEnumValues(string $table, string $column, array $values): self {
        $valuesString = implode(', ', $values);
        return new self("Invalid enum values [{$valuesString}] for column {$column} in table {$table}");
    }

    public static function invalidDefaultValue(string $table, string $column, mixed $value): self {
        $valueString = is_scalar($value) ? (string) $value : gettype($value);
        return new self("Invalid default value {$valueString} for column {$column} in table {$table}");
    }

    public static function unsupportedColumnType(string $table, string $column, string $type): self {
        return new self("Unsupported column type {$type} for {$column} in table {$table}");
    }

    public static function invalidUniqueConstraint(string $table, array $columns): self {
        $columnsString = implode(', ', $columns);
        return new self("Invalid unique constraint for columns [{$columnsString}] in table {$table}");
    }

    public static function invalidNullableColumn(string $table, string $column): self {
        return new self("Invalid nullable setting for column {$column} in table {$table}");
    }

    public static function invalidAutoIncrement(string $table, string $column): self {
        return new self("Invalid auto increment setting for column {$column} in table {$table}");
    }

    public static function invalidPivotTable(string $table, string $relatedTable): self {
        return new self("Invalid pivot table between {$table} and {$relatedTable}");
    }
}