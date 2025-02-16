<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests\Unit\Services\Resources;

use PHPUnit\Framework\TestCase;
use SAC\EloquentModelGenerator\Services\Resources\ResourceGenerator;
use SAC\EloquentModelGenerator\ValueObjects\Column;
use SAC\EloquentModelGenerator\Exceptions\ResourceGeneratorException;

/**
 * Resource Generator Test
 *
 * Tests the resource generator functionality for API resources.
 */
class ResourceGeneratorTest extends TestCase {
    private ResourceGenerator $generator;

    protected function setUp(): void {
        parent::setUp();
        $this->generator = new ResourceGenerator();
    }

    /**
     * @test
     */
    public function testGeneratesBasicResource(): void {
        $columns = [
            new Column('id', 'integer', primary: true),
            new Column('name', 'string'),
            new Column('email', 'string'),
        ];

        $resource = $this->generator->generate('App\\Models\\User', $columns);

        $this->assertStringContainsString('namespace App\\Http\\Resources;', $resource);
        $this->assertStringContainsString('class UserResource extends JsonResource', $resource);
        $this->assertStringContainsString('public function toArray($request): array', $resource);
        $this->assertStringContainsString("'id' => \$this->id", $resource);
        $this->assertStringContainsString("'name' => \$this->name", $resource);
        $this->assertStringContainsString("'email' => \$this->email", $resource);
    }

    /**
     * @test
     */
    public function testGeneratesResourceWithRelationships(): void {
        $columns = [
            new Column('id', 'integer', primary: true),
            new Column('name', 'string'),
        ];

        $relationships = [
            'hasMany' => ['posts', 'comments'],
            'belongsTo' => ['team'],
        ];

        $resource = $this->generator->generate('App\\Models\\User', $columns, $relationships);

        $this->assertStringContainsString("'posts' => PostResource::collection(\$this->whenLoaded('posts'))", $resource);
        $this->assertStringContainsString("'comments' => CommentResource::collection(\$this->whenLoaded('comments'))", $resource);
        $this->assertStringContainsString("'team' => TeamResource::make(\$this->whenLoaded('team'))", $resource);
    }

    /**
     * @test
     */
    public function testGeneratesResourceWithConditionalFields(): void {
        $columns = [
            new Column('id', 'integer', primary: true),
            new Column('secret_key', 'string'),
        ];

        $conditionalFields = [
            'secret_key' => ['$request->user()->isAdmin()'],
            'internal_data' => ['$this->shouldShowInternalData()'],
        ];

        $resource = $this->generator->generate('App\\Models\\User', $columns, [], $conditionalFields);

        $this->assertStringContainsString('protected function whenSecretKey(Request $request)', $resource);
        $this->assertStringContainsString('protected function whenInternalData(Request $request)', $resource);
        $this->assertStringContainsString('$request->user()->isAdmin()', $resource);
        $this->assertStringContainsString('$this->shouldShowInternalData()', $resource);
    }

    /**
     * @test
     */
    public function testExcludesSensitiveFields(): void {
        $columns = [
            new Column('id', 'integer', primary: true),
            new Column('name', 'string'),
            new Column('password', 'string'),
            new Column('remember_token', 'string'),
        ];

        $resource = $this->generator->generate('App\\Models\\User', $columns);

        $this->assertStringContainsString("'id' => \$this->id", $resource);
        $this->assertStringContainsString("'name' => \$this->name", $resource);
        $this->assertStringNotContainsString('password', $resource);
        $this->assertStringNotContainsString('remember_token', $resource);
    }

    /**
     * @test
     */
    public function testHandlesInvalidModelClass(): void {
        $this->expectException(ResourceGeneratorException::class);
        $this->expectExceptionMessage('Invalid model class: InvalidModel');

        $this->generator->generate('InvalidModel', []);
    }

    /**
     * @test
     */
    public function testHandlesInvalidRelationship(): void {
        $columns = [new Column('id', 'integer', primary: true)];
        $relationships = ['invalid' => ['posts']];

        $this->expectException(ResourceGeneratorException::class);
        $this->expectExceptionMessage('Invalid relationship type invalid');

        $this->generator->generate('App\\Models\\User', $columns, $relationships);
    }

    /**
     * @test
     */
    public function testGeneratesCompleteResource(): void {
        $columns = [
            new Column('id', 'integer', primary: true),
            new Column('name', 'string'),
            new Column('email', 'string'),
            new Column('is_active', 'boolean'),
            new Column('created_at', 'datetime'),
        ];

        $relationships = [
            'hasMany' => ['posts'],
            'belongsTo' => ['team'],
            'hasOne' => ['profile'],
        ];

        $conditionalFields = [
            'email' => ['$request->user()->isAdmin()'],
            'internal_stats' => ['$this->shouldShowStats()'],
        ];

        $resource = $this->generator->generate('App\\Models\\User', $columns, $relationships, $conditionalFields);

        // Check namespace and class definition
        $this->assertStringContainsString('namespace App\\Http\\Resources;', $resource);
        $this->assertStringContainsString('class UserResource extends JsonResource', $resource);
        $this->assertStringContainsString('use App\\Models\\User;', $resource);

        // Check basic fields
        $this->assertStringContainsString("'id' => \$this->id", $resource);
        $this->assertStringContainsString("'name' => \$this->name", $resource);
        $this->assertStringContainsString("'is_active' => \$this->is_active", $resource);
        $this->assertStringContainsString("'created_at' => \$this->created_at", $resource);

        // Check relationships
        $this->assertStringContainsString("'posts' => PostResource::collection(\$this->whenLoaded('posts'))", $resource);
        $this->assertStringContainsString("'team' => TeamResource::make(\$this->whenLoaded('team'))", $resource);
        $this->assertStringContainsString("'profile' => ProfileResource::make(\$this->whenLoaded('profile'))", $resource);

        // Check conditional fields
        $this->assertStringContainsString('protected function whenEmail(Request $request)', $resource);
        $this->assertStringContainsString('protected function whenInternalStats(Request $request)', $resource);
        $this->assertStringContainsString('$request->user()->isAdmin()', $resource);
        $this->assertStringContainsString('$this->shouldShowStats()', $resource);

        // Check doc blocks
        $this->assertStringContainsString('@property-read User $resource', $resource);
        $this->assertStringContainsString('@param Request $request', $resource);
        $this->assertStringContainsString('@return array<string, mixed>', $resource);
    }
}