<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests\Integration\Generation;

use Orchestra\Testbench\TestCase;
use SAC\EloquentModelGenerator\Services\Attributes\AttributeGenerator;
use SAC\EloquentModelGenerator\Services\Factories\FactoryGenerator;
use SAC\EloquentModelGenerator\Services\Policies\PolicyGenerator;
use SAC\EloquentModelGenerator\Services\Resources\ResourceGenerator;
use SAC\EloquentModelGenerator\ValueObjects\Column;

/**
 * Model Generation Integration Test Suite
 *
 * Tests the complete model generation functionality,
 * including attributes, factories, policies, and resources.
 */
class ModelGenerationIntegrationTest extends TestCase {
    private AttributeGenerator $attributeGenerator;
    private FactoryGenerator $factoryGenerator;
    private PolicyGenerator $policyGenerator;
    private ResourceGenerator $resourceGenerator;

    protected function setUp(): void {
        parent::setUp();

        $this->attributeGenerator = new AttributeGenerator();
        $this->factoryGenerator = new FactoryGenerator();
        $this->policyGenerator = new PolicyGenerator();
        $this->resourceGenerator = new ResourceGenerator();
    }

    /**
     * @test
     * @group integration
     */
    public function testCompleteModelGeneration(): void {
        // Define test columns
        $columns = [
            new Column('id', 'integer', primary: true, autoIncrement: true),
            new Column('title', 'string'),
            new Column('content', 'text', nullable: true),
            new Column('status', 'string', default: 'draft'),
            new Column('view_count', 'integer', default: 0),
            new Column('metadata', 'json', nullable: true),
            new Column('is_featured', 'boolean', default: false),
            new Column('published_at', 'datetime', nullable: true),
            new Column('created_at', 'datetime'),
            new Column('updated_at', 'datetime'),
        ];

        // Define relationships
        $relationships = [
            'belongsTo' => ['user', 'category'],
            'hasMany' => ['comments', 'revisions'],
            'belongsToMany' => ['tags'],
            'morphMany' => ['likes', 'shares'],
        ];

        // Generate attributes
        $attributes = $this->attributeGenerator->generate($columns);

        // Verify attribute generation
        $this->assertArrayHasKey('accessors', $attributes);
        $this->assertArrayHasKey('mutators', $attributes);
        $this->assertArrayHasKey('casts', $attributes);
        $this->assertArrayHasKey('properties', $attributes);

        // Check specific attributes
        $this->assertContainsAccessor($attributes['accessors'], 'metadata');
        $this->assertContainsMutator($attributes['mutators'], 'status');
        $this->assertArrayHasKey('is_featured', $attributes['casts']);
        $this->assertContainsProperty($attributes['properties'], 'title');

        // Generate factory
        $factory = $this->factoryGenerator->generate('App\\Models\\Post', $columns, $relationships);

        // Verify factory generation
        $this->assertStringContainsString('class PostFactory extends Factory', $factory);
        $this->assertStringContainsString('protected $model = Post::class', $factory);
        $this->assertStringContainsString('public function definition()', $factory);
        $this->assertStringContainsString('public function published()', $factory);
        $this->assertStringContainsString('public function withUser()', $factory);

        // Generate policy
        $abilities = ['publish', 'feature', 'archive'];
        $rules = [
            'adminOnly' => ['$user->isAdmin()'],
            'authorOnly' => ['$user->id === $post->user_id'],
        ];

        $policy = $this->policyGenerator->generate('App\\Models\\Post', $abilities, $rules);

        // Verify policy generation
        $this->assertStringContainsString('class PostPolicy', $policy);
        $this->assertStringContainsString('public function publish(', $policy);
        $this->assertStringContainsString('public function feature(', $policy);
        $this->assertStringContainsString('public function adminOnly(', $policy);
        $this->assertStringContainsString('$user->isAdmin()', $policy);

        // Generate resource
        $conditionalFields = [
            'metadata' => ['$request->user()->isAdmin()'],
            'internal_data' => ['$this->shouldShowInternalData()'],
        ];

        $resource = $this->resourceGenerator->generate('App\\Models\\Post', $columns, $relationships, $conditionalFields);

        // Verify resource generation
        $this->assertStringContainsString('class PostResource extends JsonResource', $resource);
        $this->assertStringContainsString('public function toArray($request)', $resource);
        $this->assertStringContainsString('protected function whenMetadata(', $resource);
        $this->assertStringContainsString('$request->user()->isAdmin()', $resource);
    }

    /**
     * @test
     * @group integration
     */
    public function testGeneratesCompleteModelWithAllFeatures(): void {
        // Define a complex model with all features
        $columns = [
            new Column('id', 'integer', primary: true, autoIncrement: true),
            new Column('user_id', 'integer'),
            new Column('title', 'string'),
            new Column('slug', 'string', unique: true),
            new Column('content', 'text', nullable: true),
            new Column('excerpt', 'string', nullable: true),
            new Column('status', 'string', default: 'draft'),
            new Column('type', 'string', default: 'post'),
            new Column('view_count', 'integer', default: 0),
            new Column('metadata', 'json', nullable: true),
            new Column('settings', 'json', nullable: true),
            new Column('is_featured', 'boolean', default: false),
            new Column('is_sponsored', 'boolean', default: false),
            new Column('published_at', 'datetime', nullable: true),
            new Column('created_at', 'datetime'),
            new Column('updated_at', 'datetime'),
            new Column('deleted_at', 'datetime', nullable: true),
        ];

        $relationships = [
            'belongsTo' => ['user', 'category'],
            'hasOne' => ['featured_image'],
            'hasMany' => ['comments', 'revisions', 'attachments'],
            'belongsToMany' => ['tags', 'topics'],
            'morphMany' => ['likes', 'shares', 'reactions'],
            'morphOne' => ['seo'],
        ];

        // Generate and verify attributes
        $attributes = $this->attributeGenerator->generate($columns);

        $this->assertNotEmpty($attributes['accessors']);
        $this->assertNotEmpty($attributes['mutators']);
        $this->assertNotEmpty($attributes['casts']);
        $this->assertNotEmpty($attributes['properties']);

        // Generate and verify factory
        $factory = $this->factoryGenerator->generate('App\\Models\\Post', $columns, $relationships);

        $this->assertStringContainsString('definition()', $factory);
        $this->assertStringContainsString('published()', $factory);
        $this->assertStringContainsString('featured()', $factory);
        $this->assertStringContainsString('sponsored()', $factory);
        $this->assertStringContainsString('withUser()', $factory);
        $this->assertStringContainsString('withCategory()', $factory);
        $this->assertStringContainsString('withTags()', $factory);

        // Generate and verify policy
        $abilities = [
            'publish',
            'feature',
            'sponsor',
            'archive',
            'restore',
            'manageAttachments',
            'moderateComments',
        ];

        $rules = [
            'adminOnly' => ['$user->isAdmin()'],
            'authorOnly' => ['$user->id === $post->user_id'],
            'editorOnly' => ['$user->hasRole("editor")'],
            'moderatorOnly' => ['$user->hasRole("moderator")'],
        ];

        $policy = $this->policyGenerator->generate('App\\Models\\Post', $abilities, $rules);

        $this->assertStringContainsString('PostPolicy', $policy);
        foreach ($abilities as $ability) {
            $this->assertStringContainsString("public function {$ability}(", $policy);
        }
        foreach ($rules as $rule => $conditions) {
            $this->assertStringContainsString("public function {$rule}(", $policy);
        }

        // Generate and verify resource
        $conditionalFields = [
            'metadata' => ['$request->user()->isAdmin()'],
            'settings' => ['$request->user()->isAdmin()'],
            'internal_metrics' => ['$this->shouldShowMetrics()'],
            'sensitive_data' => ['$request->user()->hasRole("admin")'],
            'draft_content' => ['$request->user()->can("viewDrafts")'],
        ];

        $resource = $this->resourceGenerator->generate('App\\Models\\Post', $columns, $relationships, $conditionalFields);

        $this->assertStringContainsString('PostResource', $resource);
        $this->assertStringContainsString('toArray($request)', $resource);
        foreach ($conditionalFields as $field => $conditions) {
            $this->assertStringContainsString("when" . ucfirst($field), $resource);
        }
        foreach ($relationships as $type => $relations) {
            foreach ($relations as $relation) {
                $this->assertStringContainsString($relation, $resource);
            }
        }
    }

    private function assertContainsAccessor(array $accessors, string $property): void {
        $found = false;
        foreach ($accessors as $accessor) {
            if (strpos($accessor, "get" . ucfirst($property) . "Attribute") !== false) {
                $found = true;
                break;
            }
        }
        $this->assertTrue($found, "Accessor for {$property} not found");
    }

    private function assertContainsMutator(array $mutators, string $property): void {
        $found = false;
        foreach ($mutators as $mutator) {
            if (strpos($mutator, "set" . ucfirst($property) . "Attribute") !== false) {
                $found = true;
                break;
            }
        }
        $this->assertTrue($found, "Mutator for {$property} not found");
    }

    private function assertContainsProperty(array $properties, string $property): void {
        $found = false;
        foreach ($properties as $prop) {
            if (strpos($prop, "\${$property}") !== false) {
                $found = true;
                break;
            }
        }
        $this->assertTrue($found, "Property {$property} not found");
    }
}