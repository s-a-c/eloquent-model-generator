<?php

declare(strict_types=1);

namespace SAC\EloquentModelGenerator\Tests\Unit\Services\Template;

use PHPUnit\Framework\TestCase;
use SAC\EloquentModelGenerator\Services\Template\DefaultModelTemplate;
use SAC\EloquentModelGenerator\Support\Definitions\{ModelDefinition, RelationDefinition};
use SAC\EloquentModelGenerator\ValueObjects\Column;
use Illuminate\Support\Collection;

class DefaultModelTemplateTest extends TestCase {
    private DefaultModelTemplate $template;

    protected function setUp(): void {
        parent::setUp();
        $this->template = new DefaultModelTemplate();
    }

    public function testRenderReturnsExpectedModelClass(): void {
        $columns = new Collection([
            new Column(
                name: 'id',
                type: 'integer',
                isPrimary: true,
                isAutoIncrement: true,
                isNullable: false,
                isUnique: true
            ),
            new Column(
                name: 'name',
                type: 'string',
                isPrimary: false,
                isAutoIncrement: false,
                isNullable: false,
                isUnique: false
            ),
        ]);

        $relations = new Collection([
            new RelationDefinition(
                'posts',
                'hasMany',
                'App\\Models\\Post',
                'user_id',
                'id'
            ),
        ]);

        $definition = new ModelDefinition(
            'User',
            'App\\Models',
            $columns,
            $relations,
            'Illuminate\\Database\\Eloquent\\Model',
            false,
            true,
            true,
            'users'
        );

        $docblock = [
            '@property int $id',
            '@property string $name',
        ];

        $result = $this->template->render($definition, $docblock);

        // Verify namespace and class declaration
        $this->assertStringContainsString('namespace App\\Models;', $result);
        $this->assertStringContainsString('use Illuminate\\Database\\Eloquent\\Model;', $result);
        $this->assertStringContainsString('class User extends Model', $result);

        // Verify docblock properties
        $this->assertStringContainsString('@property int $id', $result);
        $this->assertStringContainsString('@property string $name', $result);

        // Verify table name
        $this->assertStringContainsString('protected $table = \'users\';', $result);

        // Verify relationship method
        $this->assertStringContainsString('public function posts()', $result);
        $this->assertStringContainsString('return $this->hasMany(Post::class, \'user_id\', \'id\');', $result);
    }

    public function testRenderWithSoftDeletesIncludesTrait(): void {
        $definition = new ModelDefinition(
            'User',
            'App\\Models',
            new Collection(),
            new Collection(),
            'Illuminate\\Database\\Eloquent\\Model',
            true,
            true,
            true,
            'users'
        );

        $result = $this->template->render($definition, []);

        $this->assertStringContainsString('use Illuminate\\Database\\Eloquent\\SoftDeletes;', $result);
        $this->assertStringContainsString('use SoftDeletes;', $result);
    }

    public function testRenderWithCustomBaseClass(): void {
        $definition = new ModelDefinition(
            'User',
            'App\\Models',
            new Collection(),
            new Collection(),
            'App\\Models\\BaseModel',
            false,
            true,
            true,
            'users'
        );

        $result = $this->template->render($definition, []);

        $this->assertStringContainsString('use App\\Models\\BaseModel;', $result);
        $this->assertStringContainsString('class User extends BaseModel', $result);
    }

    public function testRenderWithMorphRelationships(): void {
        $relations = new Collection([
            new RelationDefinition(
                'images',
                'morphMany',
                'App\\Models\\Image',
                null,
                null,
                'imageable'
            ),
        ]);

        $definition = new ModelDefinition(
            'Post',
            'App\\Models',
            new Collection(),
            $relations,
            'Illuminate\\Database\\Eloquent\\Model',
            false,
            true,
            true,
            'posts'
        );

        $result = $this->template->render($definition, []);

        $this->assertStringContainsString('public function images()', $result);
        $this->assertStringContainsString('return $this->morphMany(Image::class, \'imageable\');', $result);
    }

    public function testRenderWithBelongsToManyRelationship(): void {
        $relations = new Collection([
            new RelationDefinition(
                'roles',
                'belongsToMany',
                'App\\Models\\Role',
                'role_id',
                'id',
                null,
                'role_user',
                'user_id'
            ),
        ]);

        $definition = new ModelDefinition(
            'User',
            'App\\Models',
            new Collection(),
            $relations,
            'Illuminate\\Database\\Eloquent\\Model',
            false,
            true,
            true,
            'users'
        );

        $result = $this->template->render($definition, []);

        $this->assertStringContainsString('public function roles()', $result);
        $this->assertStringContainsString('return $this->belongsToMany(Role::class, \'role_user\', \'user_id\', \'role_id\');', $result);
    }

    public function testRenderWithCustomNamespace(): void {
        $definition = new ModelDefinition(
            'User',
            'Domain\\Models',
            new Collection(),
            new Collection(),
            'Illuminate\\Database\\Eloquent\\Model',
            false,
            true,
            true,
            'users'
        );

        $result = $this->template->render($definition, []);

        $this->assertStringContainsString('namespace Domain\\Models;', $result);
    }
}