<?php
/***************************************************************
 * Extension Manager/Repository config file for ext "powermail".
 ***************************************************************/

$EM_CONF[$_EXTKEY] = [
    'title' => 'template',
    'description' => 'Sitepackage',
    'category' => 'plugin',
    'version' => '1.0.0',
    'module' => '',
    'state' => 'stable',
    'uploadfolder' => 0,
    'clearcacheonload' => 1,
    'author' => 'Alex',
    'author_email' => 'alexander.kellner@in2code.de',
    'author_company' => 'in2code.de',
    'constraints' => [
        'depends' => [
            'typo3' => '8.7.0-9.5.99',
            'php' => '7.0.0-7.99.99'
        ],
        'conflicts' => [
        ],
        'suggests' => [],
    ],
    '_md5_values_when_last_written' => '',
];
