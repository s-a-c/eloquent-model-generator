<?php

// tests/config/database.php

return [
    'default' => 'testing',
    'connections' => [
        'testing' => [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ],
    ],
];
