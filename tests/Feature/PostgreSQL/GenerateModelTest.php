<?php

namespace SAC\EloquentModelGenerator\Tests\Feature\PostgreSQL;

use SAC\EloquentModelGenerator\Tests\TestCase;
use SAC\EloquentModelGenerator\Tests\Support\Traits\WithPostgreSQLTesting;
use SAC\EloquentModelGenerator\Models\GeneratedModel;
use SAC\EloquentModelGenerator\ValueObjects\ModelDefinition;

class GenerateModelTest extends TestCase {
    use WithPostgreSQLTesting;

    public function test_generates_model_from_postgresql_table_with_all_column_types(): void {
        $schema = [
            'columns' => [
                'id' => ['type' => 'integer', 'autoIncrement' => true],
                'name' => ['type' => 'string'],
                'email' => ['type' => 'string'],
                'created_at' => ['type' => 'timestamp'],
                'updated_at' => ['type' => 'timestamp'],
            ],
            'indexes' => [
                'primary' => ['type' => 'primary', 'columns' => ['id']],
                'email_unique' => ['type' => 'unique', 'columns' => ['email']],
            ],
        ];

        $generator = createModelGenerator();
        $definition = new ModelDefinition(
            className: 'User',
            namespace: 'App\\Models',
            tableName: 'users',
            baseClass: 'Illuminate\\Database\\Eloquent\\Model'
        );

        $model = $generator->generate($definition, $schema);

        expect($model)
            ->toBeInstanceOf(GeneratedModel::class)
            ->and($model->getClassName())->toBe('User')
            ->and($model->getNamespace())->toBe('App\\Models')
            ->and($model->getContent())
            ->toContain('protected $table = \'users\'')
            ->toContain('protected $fillable = [')
            ->toContain('\'name\'')
            ->toContain('\'email\'');
    }

    public function test_handles_postgresql_specific_types(): void {
        $schema = [
            'columns' => [
                'id' => ['type' => 'integer', 'autoIncrement' => true],
                'json_data' => ['type' => 'jsonb'],
                'enum_status' => ['type' => 'enum', 'values' => ['active', 'inactive']],
                'array_data' => ['type' => 'text[]'],
                'uuid_col' => ['type' => 'uuid'],
                'created_at' => ['type' => 'timestamp with time zone'],
                'updated_at' => ['type' => 'timestamp with time zone'],
            ],
            'indexes' => [
                'primary' => ['type' => 'primary', 'columns' => ['id']],
                'json_idx' => ['type' => 'gin', 'columns' => ['json_data']],
            ],
        ];

        $generator = createModelGenerator();
        $definition = new ModelDefinition(
            className: 'TestModel',
            namespace: 'App\\Models',
            tableName: 'test_table',
            baseClass: 'Illuminate\\Database\\Eloquent\\Model'
        );

        $model = $generator->generate($definition, $schema);

        expect($model->getContent())
            ->toContain('protected $casts = [')
            ->toContain('\'json_data\' => \'array\'')
            ->toContain('\'enum_status\' => \'string\'')
            ->toContain('\'array_data\' => \'array\'')
            ->toContain('\'uuid_col\' => \'string\'')
            ->toContain('\'created_at\' => \'datetime\'')
            ->toContain('\'updated_at\' => \'datetime\'');
    }

    public function test_handles_schema_namespaces(): void {
        $schema = [
            'columns' => [
                'id' => ['type' => 'integer', 'autoIncrement' => true],
                'name' => ['type' => 'string'],
            ],
            'indexes' => [
                'primary' => ['type' => 'primary', 'columns' => ['id']],
            ],
        ];

        $generator = createModelGenerator([
            'namespace' => 'App\\Models\\Public',
            'schema' => 'public'
        ]);

        $definition = new ModelDefinition(
            className: 'TestModel',
            namespace: 'App\\Models\\Public',
            tableName: 'test_table',
            baseClass: 'Illuminate\\Database\\Eloquent\\Model'
        );

        $model = $generator->generate($definition, $schema);

        expect($model->getContent())
            ->toContain('namespace App\\Models\\Public')
            ->toContain('protected $table = \'public.test_table\'');
    }

    public function test_handles_nullable_columns(): void {
        $schema = [
            'columns' => [
                'id' => ['type' => 'integer', 'autoIncrement' => true],
                'title' => ['type' => 'string', 'nullable' => false],
                'description' => ['type' => 'text', 'nullable' => true],
                'published_at' => ['type' => 'timestamp', 'nullable' => true],
                'metadata' => ['type' => 'jsonb', 'nullable' => true],
            ],
            'indexes' => [
                'primary' => ['type' => 'primary', 'columns' => ['id']],
            ],
        ];

        $generator = createModelGenerator();
        $definition = new ModelDefinition(
            className: 'Article',
            namespace: 'App\\Models',
            tableName: 'articles',
            baseClass: 'Illuminate\\Database\\Eloquent\\Model'
        );

        $model = $generator->generate($definition, $schema);

        expect($model->getContent())
            ->toContain('protected $fillable = [')
            ->toContain('\'title\'')
            ->toContain('\'description\'')
            ->toContain('\'published_at\'')
            ->toContain('\'metadata\'')
            ->toContain('protected $casts = [')
            ->toContain('\'published_at\' => \'datetime\'')
            ->toContain('\'metadata\' => \'array\'')
            ->toContain('protected $nullable = [')
            ->toContain('\'description\'')
            ->toContain('\'published_at\'')
            ->toContain('\'metadata\'');
    }

    public function test_handles_composite_indexes(): void {
        $schema = [
            'columns' => [
                'id' => ['type' => 'integer', 'autoIncrement' => true],
                'tenant_id' => ['type' => 'integer'],
                'slug' => ['type' => 'string'],
                'category' => ['type' => 'string'],
                'created_at' => ['type' => 'timestamp'],
            ],
            'indexes' => [
                'primary' => ['type' => 'primary', 'columns' => ['id']],
                'tenant_slug_unique' => ['type' => 'unique', 'columns' => ['tenant_id', 'slug']],
                'category_created_idx' => ['type' => 'index', 'columns' => ['category', 'created_at']],
            ],
        ];

        $generator = createModelGenerator();
        $definition = new ModelDefinition(
            className: 'Post',
            namespace: 'App\\Models',
            tableName: 'posts',
            baseClass: 'Illuminate\\Database\\Eloquent\\Model'
        );

        $model = $generator->generate($definition, $schema);

        expect($model->getContent())
            ->toContain('protected $indexes = [')
            ->toContain('\'tenant_slug_unique\' => [\'tenant_id\', \'slug\']')
            ->toContain('\'category_created_idx\' => [\'category\', \'created_at\']');
    }

    public function test_handles_default_values(): void {
        $schema = [
            'columns' => [
                'id' => ['type' => 'integer', 'autoIncrement' => true],
                'status' => ['type' => 'string', 'default' => 'draft'],
                'is_featured' => ['type' => 'boolean', 'default' => false],
                'sort_order' => ['type' => 'integer', 'default' => 0],
                'config' => ['type' => 'jsonb', 'default' => '{}'],
                'created_at' => ['type' => 'timestamp', 'default' => 'CURRENT_TIMESTAMP'],
            ],
            'indexes' => [
                'primary' => ['type' => 'primary', 'columns' => ['id']],
            ],
        ];

        $generator = createModelGenerator();
        $definition = new ModelDefinition(
            className: 'Article',
            namespace: 'App\\Models',
            tableName: 'articles',
            baseClass: 'Illuminate\\Database\\Eloquent\\Model'
        );

        $model = $generator->generate($definition, $schema);

        expect($model->getContent())
            ->toContain('protected $attributes = [')
            ->toContain('\'status\' => \'draft\'')
            ->toContain('\'is_featured\' => false')
            ->toContain('\'sort_order\' => 0')
            ->toContain('\'config\' => \'{}\'')
            ->toContain('protected $casts = [')
            ->toContain('\'is_featured\' => \'boolean\'')
            ->toContain('\'sort_order\' => \'integer\'')
            ->toContain('\'config\' => \'array\'');
    }
}
