<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Ukn.' . $_EXTKEY,
    'Pi1',
    [
        'Person' => 'list,detail,create,new,edit,update,list2,ajax',
    ],
    // non-cacheable actions
    [
        'Person' => 'list,create,new,edit,update,list2,ajax',
    ]
);
