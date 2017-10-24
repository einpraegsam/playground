<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'template',
    'description' => 'Template extension',
    'category' => 'configuration',
    'version' => '1.0.0',
    'author' => 'Alex Kellner',
    'author_email' => 'alexander.kellner@in2code.de',
    'author_company' => 'in2code.de',
    'constraints' => [
        'depends' => [
            'typo3' => '8.7.0-8.99.99',
            'php' => '7.0.0-7.99.99'
        ],
        'conflicts' => [
        ],
        'suggests' => [],
    ]
];
