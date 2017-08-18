<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function () {
        // configure plugins
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'In2code.Employees',
            'Pi1',
            [
                'Employee' => 'list,list2,create,new,edit,update,detail,suggestAjax'
            ],
            // non-cacheable actions
            [
                'Employee' => 'list,list2,create,new,edit,update,suggestAjax'
            ]
        );

        // define Fluid namespace
        $GLOBALS['TYPO3_CONF_VARS']['SYS']['fluid']['namespaces']['employee'][] = 'In2code\Employees\ViewHelpers';
    }
);
