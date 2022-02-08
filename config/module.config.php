<?php
namespace Citing;

return [
    'view_manager' => [
        'template_path_stack' => [
            OMEKA_PATH . '/modules/Citing/view',
        ],
    ],
    'view_helpers' => [
        'invokables' => [
            'Citing' => View\Helper\Citing::class,
        ]
    ],
    'translator' => [
        'translation_file_patterns' => [
            [
                'type' => 'gettext',
                'base_dir' => dirname(__DIR__) . '/language',
                'pattern' => '%s.mo',
                'text_domain' => null,
            ],
        ],
    ],
];