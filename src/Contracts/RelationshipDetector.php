<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Contracts;

use SAC\EloquentModelGenerator\ValueObjects\Relationship;
use SAC\EloquentModelGenerator\Exceptions\RelationshipDetectorException;

/**
 * Relationship Detector Interface
 *
 * Defines the contract for detecting relationships between database tables.
 */
interface RelationshipDetector {
    /**
     * Detect all relationships for a given table.
     *
     * @param string $table The table name
     * @return array<Relationship> Array of detected relationships
     * @throws RelationshipDetectorException
     */
    public function detect(string $table): array;
}