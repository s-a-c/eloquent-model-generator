<?php

namespace SAC\EloquentModelGenerator\Tests\Support\Traits;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

trait WithTestTables
{
    protected array $testTables = [];

    protected function createBasicTestTables(): void
    {
        $this->createTestTable('users', [
            'id' => 'id',
            'name' => 'string',
            'email' => 'string:unique',
            'created_at' => 'timestamp',
            'updated_at' => 'timestamp',
            'deleted_at' => 'timestamp:nullable',
        ]);

        $this->createTestTable('posts', [
            'id' => 'id',
            'user_id' => ['foreign', 'user_id', 'id', 'users'],
            'title' => 'string',
            'content' => 'text:nullable',
            'created_at' => 'timestamp',
            'updated_at' => 'timestamp',
        ]);

        $this->testTables = ['users', 'posts'];
    }

    protected function createComplexTestTables(): void
    {
        $this->createTestTable('categories', [
            'id' => 'id',
            'name' => 'string',
            'parent_id' => 'unsignedBigInteger:nullable',
            'created_at' => 'timestamp',
            'updated_at' => 'timestamp',
        ]);

        $this->createTestTable('products', [
            'id' => 'id',
            'category_id' => ['foreign', 'category_id', 'id', 'categories'],
            'name' => 'string',
            'price' => 'decimal:8,2',
            'created_at' => 'timestamp',
            'updated_at' => 'timestamp',
        ]);

        $this->createTestTable('tags', [
            'id' => 'id',
            'name' => 'string',
            'created_at' => 'timestamp',
            'updated_at' => 'timestamp',
        ]);

        $this->createTestTable('product_tag', [
            'id' => 'id',
            'product_id' => ['foreign', 'product_id', 'id', 'products'],
            'tag_id' => ['foreign', 'tag_id', 'id', 'tags'],
            'created_at' => 'timestamp',
            'updated_at' => 'timestamp',
        ]);

        $this->testTables = array_merge($this->testTables, [
            'categories',
            'products',
            'tags',
            'product_tag',
        ]);
    }

    protected function dropTestTables(): void
    {
        // Drop in reverse order to handle foreign key constraints
        foreach (array_reverse($this->testTables) as $table) {
            Schema::dropIfExists($table);
        }
    }

    protected function createTestTable(string $name, array $columns): void
    {
        Schema::create($name, function (Blueprint $table) use ($columns) {
            foreach ($columns as $column => $type) {
                if (is_array($type)) {
                    // Handle foreign key
                    $table->foreignId($column)
                        ->constrained($type[3])
                        ->onDelete('cascade');
                } else {
                    // Handle regular column
                    $parts = explode(':', $type);
                    $method = array_shift($parts);

                    if ($method === 'id') {
                        $table->id();
                    } else {
                        $columnDefinition = $table->$method($column);

                        foreach ($parts as $modifier) {
                            if ($modifier === 'nullable') {
                                $columnDefinition->nullable();
                            } elseif ($modifier === 'unique') {
                                $columnDefinition->unique();
                            }
                        }
                    }
                }
            }
        });
    }
}
