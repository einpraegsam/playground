<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'In2code.Person',
            'Pi1',
            [
                'Person' => 'list,detail',
            ],
            // non-cacheable actions
            [
                'Person' => 'list'
            ]
        );
    }
);
