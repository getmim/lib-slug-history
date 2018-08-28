<?php

return [
    'LibSlugHistory\\Model\\SlugHistory' => [
        'fields' => [
            'id' => [
                'type' => 'INT',
                'attrs' => [
                    'unsigned' => true,
                    'primary_key' => true,
                    'auto_increment' => true
                ]
            ],
            'group' => [
                'type' => 'VARCHAR',
                'length' => 50,
                'attrs' => [
                    'null' => false 
                ]
            ],
            'object' => [
                'type' => 'VARCHAR',
                'length' => 100,
                'attrs' => [
                    'null' => false 
                ]
            ],
            'old' => [
                'type' => 'VARCHAR',
                'length' => 255,
                'attrs' => [
                    'null' => false 
                ]
            ],
            'new' => [
                'type' => 'VARCHAR',
                'length' => 255,
                'attrs' => [
                    'null' => false 
                ]
            ],
            'created' => [
                'type' => 'TIMESTAMP',
                'attrs' => [
                    'default' => 'CURRENT_TIMESTAMP'
                ]
            ]
        ],
        'indexes' => [
            'by_group_old' => [
                'fields' => [
                    'group' => [],
                    'old' => []
                ]
            ],
            'by_group_object' => [
                'fields' => [
                    'group' => [],
                    'object' => []
                ]
            ]
        ]
    ]
];