<?php

return [
    '__name' => 'lib-slug-history',
    '__version' => '0.0.1',
    '__git' => 'git@github.com:getmim/lib-slug-history.git',
    '__license' => 'MIT',
    '__author' => [
        'name' => 'Iqbal Fauzi',
        'email' => 'iqbalfawz@gmail.com',
        'website' => 'http://iqbalfn.com/'
    ],
    '__files' => [
        'modules/lib-slug-history' => ['install','update','remove']
    ],
    '__dependencies' => [
        'required' => [
            [
                'lib-model' => NULL
            ]
        ],
        'optional' => []
    ],
    'autoload' => [
        'classes' => [
            'LibSlugHistory\\Library' => [
                'type' => 'file',
                'base' => 'modules/lib-slug-history/library'
            ],
            'LibSlugHistory\\Model' => [
                'type' => 'file',
                'base' => 'modules/lib-slug-history/model'
            ]
        ],
        'files' => []
    ]
];