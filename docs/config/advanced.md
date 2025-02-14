# Advanced Configuration

Fine-tune model generation and analysis behavior.

## Custom Templates

```php
return [
    'templates' => [
        'model' => resource_path('stubs/model.stub'),
        'relation' => resource_path('stubs/relation.stub'),
        'trait' => resource_path('stubs/trait.stub'),
    ],
];
```

## Type Mappings

```php
return [
    'types' => [
        'mappings' => [
            'timestamp' => 'datetime',
            'tinyint' => 'boolean',
            'json' => 'array',
        ],
        'casts' => [
            'settings' => 'array',
            'options' => 'collection',
            'meta' => 'object',
        ],
    ],
];
```

## Naming Conventions

```php
return [
    'naming' => [
        'relations' => [
            'singular' => true,     // user() vs users()
            'prefix' => '',         // getUser() vs user()
            'suffix' => 'Relation', // userRelation() vs user()
        ],
        'attributes' => [
            'case' => 'snake',      // first_name vs firstName
            'prefix' => '',         // getUserName() vs getName()
        ],
    ],
];
```

## Analysis Rules

```php
return [
    'analysis' => [
        'rules' => [
            'phpstan' => [
                'level' => 8,
                'paths' => ['app/Models'],
            ],
            'psalm' => [
                'errorLevel' => 4,
                'findUnusedCode' => true,
            ],
            'rector' => [
                'sets' => [
                    'code-quality',
                    'type-declaration',
                ],
            ],
        ],
    ],
];
```

See [Analysis Tools](../tools/analysis-tools.md) for detailed tool configuration.
