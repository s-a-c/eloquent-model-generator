<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Domain\Service;

use SAC\EloquentModelGenerator\Domain\Model\ModelDefinition;
use SAC\EloquentModelGenerator\Domain\Model\Property;
use SAC\EloquentModelGenerator\Domain\Functional\Collection;
use SAC\EloquentModelGenerator\Domain\Functional\Compose;

/**
 * RelationshipDetector service analyzes model definitions to detect
 * and configure Eloquent relationships.
 */
final class RelationshipDetector
{
    /**
     * Common foreign key patterns for relationship detection.
     *
     * @var array<string, string>
     */
    private const FOREIGN_KEY_PATTERNS = [
        '_id$' => 'belongsTo',
        '^parent_id$' => 'belongsTo',
        '^owner_id$' => 'belongsTo'
    ];

    /**
     * Detect relationships for a model definition.
     *
     * @param ModelDefinition $definition The model to analyze
     * @param array<string, ModelDefinition> $allModels All available models
     * @return array<string, array{type: string, model: string, key: string}>
     */
    public function detectRelationships(
        ModelDefinition $definition,
        array $allModels
    ): array {
        return Collection::of($definition->getProperties())
            ->filter(fn(Property $property, string $name): bool =>
                $this->isRelationshipCandidate($name, $property)
            )
            ->map(fn(Property $property, string $name): ?array =>
                $this->analyzeRelationship($name, $property, $definition, $allModels)
            )
            ->filter(fn(?array $relationship): bool => $relationship !== null)
            ->toArray();
    }

    /**
     * Check if a property is a potential relationship.
     */
    private function isRelationshipCandidate(string $name, Property $property): bool
    {
        // Check if the property name matches any relationship patterns
        foreach (self::FOREIGN_KEY_PATTERNS as $pattern => $_) {
            if (preg_match("/{$pattern}/", $name)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Analyze a potential relationship property.
     *
     * @param array<string, ModelDefinition> $allModels
     * @return array{type: string, model: string, key: string}|null
     */
    private function analyzeRelationship(
        string $propertyName,
        Property $property,
        ModelDefinition $definition,
        array $allModels
    ): ?array {
        // Determine relationship type from property name
        $type = $this->determineRelationshipType($propertyName);
        if ($type === null) {
            return null;
        }

        // Try to find the related model
        $relatedModel = $this->findRelatedModel($propertyName, $allModels);
        if ($relatedModel === null) {
            return null;
        }

        return [
            'type' => $type,
            'model' => $relatedModel->getFullyQualifiedName(),
            'key' => $propertyName
        ];
    }

    /**
     * Determine the relationship type from a property name.
     */
    private function determineRelationshipType(string $propertyName): ?string
    {
        foreach (self::FOREIGN_KEY_PATTERNS as $pattern => $type) {
            if (preg_match("/{$pattern}/", $propertyName)) {
                return $type;
            }
        }

        return null;
    }

    /**
     * Find the related model based on the property name.
     *
     * @param array<string, ModelDefinition> $allModels
     */
    private function findRelatedModel(
        string $propertyName,
        array $allModels
    ): ?ModelDefinition {
        // Extract the model name from the property
        // e.g., user_id -> User, parent_id -> self
        $baseName = preg_replace('/_id$/', '', $propertyName);

        if ($baseName === 'parent') {
            return $allModels[array_key_first($allModels)] ?? null;
        }

        // Convert to studly case for class name matching
        $modelName = str_replace('_', '', ucwords($baseName, '_'));

        // Look for matching model
        foreach ($allModels as $model) {
            if ($model->getName() === $modelName) {
                return $model;
            }
        }

        return null;
    }

    /**
     * Generate relationship method code.
     *
     * @param array{type: string, model: string, key: string} $relationship
     */
    public function generateRelationshipMethod(
        string $name,
        array $relationship
    ): string {
        $type = $relationship['type'];
        $model = $relationship['model'];
        $key = $relationship['key'];

        return match ($type) {
            'belongsTo' => $this->generateBelongsToMethod($name, $model, $key),
            'hasMany' => $this->generateHasManyMethod($name, $model, $key),
            'hasOne' => $this->generateHasOneMethod($name, $model, $key),
            default => throw new \InvalidArgumentException("Unknown relationship type: {$type}")
        };
    }

    /**
     * Generate a belongsTo relationship method.
     */
    private function generateBelongsToMethod(
        string $name,
        string $model,
        string $key
    ): string {
        return "    /**\n" .
               "     * Get the {$name} that owns this model.\n" .
               "     */\n" .
               "    public function {$name}()\n" .
               "    {\n" .
               "        return \$this->belongsTo({$model}::class, '{$key}');\n" .
               "    }\n";
    }

    /**
     * Generate a hasMany relationship method.
     */
    private function generateHasManyMethod(
        string $name,
        string $model,
        string $key
    ): string {
        return "    /**\n" .
               "     * Get the {$name} for this model.\n" .
               "     */\n" .
               "    public function {$name}()\n" .
               "    {\n" .
               "        return \$this->hasMany({$model}::class, '{$key}');\n" .
               "    }\n";
    }

    /**
     * Generate a hasOne relationship method.
     */
    private function generateHasOneMethod(
        string $name,
        string $model,
        string $key
    ): string {
        return "    /**\n" .
               "     * Get the {$name} for this model.\n" .
               "     */\n" .
               "    public function {$name}()\n" .
               "    {\n" .
               "        return \$this->hasOne({$model}::class, '{$key}');\n" .
               "    }\n";
    }
}
