<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function () {
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'In2code.Employees',
            'Pi1',
            [
                'Employee' => 'list'
            ],
            // non-cacheable actions
            [
                'Employee' => ''
            ]
        );
    }
);
