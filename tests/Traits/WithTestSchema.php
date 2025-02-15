<?php

namespace SAC\EloquentModelGenerator\Tests\Traits;

trait WithTestSchema
{
    protected function getTestSchema(): array
    {
        return [
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
    }
}
