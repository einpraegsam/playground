<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'In2code.Employees',
            'Pi1',
            'Employeelist'
        );

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('employees', 'Configuration/TypoScript', 'EmployeeList');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_employees_domain_model_employee', 'EXT:employees/Resources/Private/Language/locallang_csh_tx_employees_domain_model_employee.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_employees_domain_model_employee');

    }
);
