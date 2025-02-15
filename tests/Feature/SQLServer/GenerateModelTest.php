<?php

namespace SAC\EloquentModelGenerator\Tests\Feature\SQLServer;

use SAC\EloquentModelGenerator\Models\GeneratedModel;
use SAC\EloquentModelGenerator\Tests\Support\Traits\WithSQLServerTesting;
use SAC\EloquentModelGenerator\Tests\TestCase;
use SAC\EloquentModelGenerator\ValueObjects\ModelDefinition;

class GenerateModelTest extends TestCase
{
    use WithSQLServerTesting;

    public function test_generates_model_from_sqlserver_table_with_all_column_types(): void
    {
        $schema = [
            'columns' => [
                'id' => ['type' => 'integer', 'autoIncrement' => true],
                'name' => ['type' => 'nvarchar', 'length' => 255],
                'email' => ['type' => 'nvarchar', 'length' => 255],
                'created_at' => ['type' => 'datetime2'],
                'updated_at' => ['type' => 'datetime2'],
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

    public function test_handles_sqlserver_specific_types(): void
    {
        $schema = [
            'columns' => [
                'id' => ['type' => 'integer', 'autoIncrement' => true],
                'title' => ['type' => 'nvarchar', 'length' => 'max'],
                'description' => ['type' => 'text'],
                'price' => ['type' => 'decimal', 'precision' => 10, 'scale' => 2],
                'is_active' => ['type' => 'bit'],
                'xml_data' => ['type' => 'xml'],
                'binary_data' => ['type' => 'varbinary', 'length' => 'max'],
                'created_at' => ['type' => 'datetime2'],
                'updated_at' => ['type' => 'datetime2'],
            ],
            'indexes' => [
                'primary' => ['type' => 'primary', 'columns' => ['id']],
            ],
        ];

        $generator = createModelGenerator();
        $definition = new ModelDefinition(
            className: 'Product',
            namespace: 'App\\Models',
            tableName: 'products',
            baseClass: 'Illuminate\\Database\\Eloquent\\Model'
        );

        $model = $generator->generate($definition, $schema);

        expect($model->getContent())
            ->toContain('protected $casts = [')
            ->toContain('\'price\' => \'decimal:2\'')
            ->toContain('\'is_active\' => \'boolean\'')
            ->toContain('\'created_at\' => \'datetime\'')
            ->toContain('\'updated_at\' => \'datetime\'');
    }

    public function test_handles_schema_namespaces(): void
    {
        $schema = [
            'columns' => [
                'id' => ['type' => 'integer', 'autoIncrement' => true],
                'name' => ['type' => 'nvarchar', 'length' => 255],
            ],
            'indexes' => [
                'primary' => ['type' => 'primary', 'columns' => ['id']],
            ],
        ];

        $generator = createModelGenerator([
            'namespace' => 'App\\Models\\Dbo',
            'schema' => 'dbo',
        ]);

        $definition = new ModelDefinition(
            className: 'TestModel',
            namespace: 'App\\Models\\Dbo',
            tableName: 'test_table',
            baseClass: 'Illuminate\\Database\\Eloquent\\Model'
        );

        $model = $generator->generate($definition, $schema);

        expect($model->getContent())
            ->toContain('namespace App\\Models\\Dbo')
            ->toContain('protected $table = \'dbo.test_table\'');
    }

    public function test_handles_nullable_columns(): void
    {
        $schema = [
            'columns' => [
                'id' => ['type' => 'integer', 'autoIncrement' => true],
                'title' => ['type' => 'nvarchar', 'length' => 255, 'nullable' => false],
                'description' => ['type' => 'text', 'nullable' => true],
                'published_at' => ['type' => 'datetime2', 'nullable' => true],
                'metadata' => ['type' => 'nvarchar', 'length' => 'max', 'nullable' => true],
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
            ->toContain('protected $nullable = [')
            ->toContain('\'description\'')
            ->toContain('\'published_at\'')
            ->toContain('\'metadata\'');
    }

    public function test_handles_composite_indexes(): void
    {
        $schema = [
            'columns' => [
                'id' => ['type' => 'integer', 'autoIncrement' => true],
                'tenant_id' => ['type' => 'integer'],
                'slug' => ['type' => 'nvarchar', 'length' => 255],
                'category' => ['type' => 'nvarchar', 'length' => 100],
                'created_at' => ['type' => 'datetime2'],
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

    public function test_handles_default_values(): void
    {
        $schema = [
            'columns' => [
                'id' => ['type' => 'integer', 'autoIncrement' => true],
                'status' => ['type' => 'nvarchar', 'length' => 50, 'default' => 'draft'],
                'is_featured' => ['type' => 'bit', 'default' => 0],
                'sort_order' => ['type' => 'integer', 'default' => 0],
                'created_at' => ['type' => 'datetime2', 'default' => 'GETDATE()'],
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
            ->toContain('protected $casts = [')
            ->toContain('\'is_featured\' => \'boolean\'')
            ->toContain('\'sort_order\' => \'integer\'');
    }
}
