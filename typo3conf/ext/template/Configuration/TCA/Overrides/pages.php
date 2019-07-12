<?php

/**
 * Add colums to pages table
 */
$columns = [
    'darkmode' => [
        'exclude' => true,
        'label' => 'Darkmode aktivieren?',
        'config' => [
            'type' => 'check'
        ]
    ]
];
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('pages', $columns);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('pages', 'darkmode', '', 'after:title');
