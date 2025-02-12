<?php

dataset('basic_models', [
    'simple_user' => [
        'table' => 'users',
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
    ],
    'post_with_relations' => [
        'table' => 'posts',
        'columns' => [
            'id' => ['type' => 'integer', 'autoIncrement' => true],
            'user_id' => ['type' => 'integer'],
            'title' => ['type' => 'string'],
            'content' => ['type' => 'text'],
            'published_at' => ['type' => 'timestamp', 'nullable' => true],
            'created_at' => ['type' => 'timestamp'],
            'updated_at' => ['type' => 'timestamp'],
        ],
        'indexes' => [
            'primary' => ['type' => 'primary', 'columns' => ['id']],
            'user_id_foreign' => ['type' => 'foreign', 'columns' => ['user_id']],
        ],
        'relations' => [
            'user' => ['type' => 'belongsTo', 'model' => 'App\\Models\\User'],
            'comments' => ['type' => 'hasMany', 'model' => 'App\\Models\\Comment'],
        ],
    ],
]);

dataset('complex_models', [
    'polymorphic_comment' => [
        'table' => 'comments',
        'columns' => [
            'id' => ['type' => 'integer', 'autoIncrement' => true],
            'commentable_id' => ['type' => 'integer'],
            'commentable_type' => ['type' => 'string'],
            'user_id' => ['type' => 'integer'],
            'content' => ['type' => 'text'],
            'created_at' => ['type' => 'timestamp'],
            'updated_at' => ['type' => 'timestamp'],
        ],
        'indexes' => [
            'primary' => ['type' => 'primary', 'columns' => ['id']],
            'commentable' => ['type' => 'index', 'columns' => ['commentable_id', 'commentable_type']],
            'user_id_foreign' => ['type' => 'foreign', 'columns' => ['user_id']],
        ],
        'relations' => [
            'commentable' => ['type' => 'morphTo'],
            'user' => ['type' => 'belongsTo', 'model' => 'App\\Models\\User'],
        ],
    ],
    'pivot_table' => [
        'table' => 'taggables',
        'columns' => [
            'tag_id' => ['type' => 'integer'],
            'taggable_id' => ['type' => 'integer'],
            'taggable_type' => ['type' => 'string'],
            'created_at' => ['type' => 'timestamp'],
            'updated_at' => ['type' => 'timestamp'],
        ],
        'indexes' => [
            'tag_id_foreign' => ['type' => 'foreign', 'columns' => ['tag_id']],
            'taggable' => ['type' => 'index', 'columns' => ['taggable_id', 'taggable_type']],
        ],
    ],
]);

dataset('edge_case_models', [
    'all_column_types' => [
        'table' => 'all_types',
        'columns' => [
            'id' => ['type' => 'integer', 'autoIncrement' => true],
            'tiny_int' => ['type' => 'tinyInteger'],
            'small_int' => ['type' => 'smallInteger'],
            'medium_int' => ['type' => 'mediumInteger'],
            'big_int' => ['type' => 'bigInteger'],
            'unsigned_int' => ['type' => 'integer', 'unsigned' => true],
            'float_col' => ['type' => 'float'],
            'double_col' => ['type' => 'double'],
            'decimal_col' => ['type' => 'decimal', 'total' => 8, 'places' => 2],
            'char_col' => ['type' => 'char', 'length' => 10],
            'string_col' => ['type' => 'string', 'length' => 255],
            'text_col' => ['type' => 'text'],
            'medium_text' => ['type' => 'mediumText'],
            'long_text' => ['type' => 'longText'],
            'json_col' => ['type' => 'json'],
            'jsonb_col' => ['type' => 'jsonb'],
            'binary_col' => ['type' => 'binary'],
            'uuid_col' => ['type' => 'uuid'],
            'ip_address' => ['type' => 'ipAddress'],
            'mac_address' => ['type' => 'macAddress'],
            'year_col' => ['type' => 'year'],
            'date_col' => ['type' => 'date'],
            'datetime_col' => ['type' => 'datetime'],
            'timestamp_col' => ['type' => 'timestamp'],
            'time_col' => ['type' => 'time'],
            'enum_col' => ['type' => 'enum', 'allowed' => ['option1', 'option2']],
            'geometry_col' => ['type' => 'geometry'],
            'point_col' => ['type' => 'point'],
            'linestring_col' => ['type' => 'linestring'],
            'polygon_col' => ['type' => 'polygon'],
            'created_at' => ['type' => 'timestamp'],
            'updated_at' => ['type' => 'timestamp'],
        ],
    ],
    'all_index_types' => [
        'table' => 'all_indexes',
        'columns' => [
            'id' => ['type' => 'integer', 'autoIncrement' => true],
            'unique_col' => ['type' => 'string'],
            'index_col' => ['type' => 'string'],
            'spatial_col' => ['type' => 'point'],
            'fulltext_col' => ['type' => 'text'],
            'composite_col1' => ['type' => 'string'],
            'composite_col2' => ['type' => 'string'],
            'created_at' => ['type' => 'timestamp'],
            'updated_at' => ['type' => 'timestamp'],
        ],
        'indexes' => [
            'primary' => ['type' => 'primary', 'columns' => ['id']],
            'unique_idx' => ['type' => 'unique', 'columns' => ['unique_col']],
            'normal_idx' => ['type' => 'index', 'columns' => ['index_col']],
            'spatial_idx' => ['type' => 'spatial', 'columns' => ['spatial_col']],
            'fulltext_idx' => ['type' => 'fulltext', 'columns' => ['fulltext_col']],
            'composite_idx' => ['type' => 'index', 'columns' => ['composite_col1', 'composite_col2']],
        ],
    ],
]);
