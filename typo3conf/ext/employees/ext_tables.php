<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function () {

        // Register plugin
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'In2code.Employees',
            'Pi1',
            'Employeelist'
        );

        // Add TypoScript
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
            'employees',
            'Configuration/TypoScript',
            'EmployeeList'
        );

        // Description for Tables an Fields in BE
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
            'tx_employees_domain_model_employee',
            'EXT:employees/Resources/Private/Language/locallang_csh_tx_employees_domain_model_employee.xlf'
        );

        // Add records in BE to normal pages
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages(
            'tx_employees_domain_model_employee'
        );
    }
);
