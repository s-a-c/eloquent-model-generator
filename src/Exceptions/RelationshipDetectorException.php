<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Exceptions;

class RelationshipDetectorException extends ModelGeneratorException {
    public static function detectionFailed(string $table, string $reason): self {
        return new self("Failed to detect relationships for table {$table}: {$reason}");
    }

    public static function invalidRelationship(string $table, string $type): self {
        return new self("Invalid relationship type {$type} for table {$table}");
    }

    public static function missingForeignKey(string $table, string $column): self {
        return new self("Missing foreign key {$column} in table {$table}");
    }

    public static function invalidPivotTable(string $table, string $pivotTable): self {
        return new self("Invalid pivot table {$pivotTable} for table {$table}");
    }

    public static function circularReference(string $table1, string $table2): self {
        return new self("Circular reference detected between tables {$table1} and {$table2}");
    }

    public static function invalidPolymorphicType(string $table, string $column): self {
        return new self("Invalid polymorphic type column {$column} in table {$table}");
    }

    public static function missingPolymorphicId(string $table, string $column): self {
        return new self("Missing polymorphic ID column {$column} in table {$table}");
    }

    public static function invalidMorphableType(string $table, string $type): self {
        return new self("Invalid morphable type {$type} for table {$table}");
    }

    public static function relationshipConflict(string $table, string $relationship): self {
        return new self("Relationship conflict detected in table {$table}: {$relationship}");
    }

    public static function invalidRelationshipName(string $table, string $name): self {
        return new self("Invalid relationship name {$name} for table {$table}");
    }
}