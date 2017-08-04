<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function () {
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Group.Person',
            'Pi1',
            [
                'Person' => 'list,detail,new,create,edit,update'
            ],
            // non-cacheable actions
            [
                'Person' => 'list,new,create,edit,update'
            ]
        );
    }
);
