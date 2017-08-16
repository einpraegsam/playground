<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

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

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    pi1 {
                        icon = ' . \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('employees') . 'Resources/Public/Icons/user_plugin_pi1.svg
                        title = LLL:EXT:employees/Resources/Private/Language/locallang_db.xlf:tx_employees_domain_model_pi1
                        description = LLL:EXT:employees/Resources/Private/Language/locallang_db.xlf:tx_employees_domain_model_pi1.description
                        tt_content_defValues {
                            CType = list
                            list_type = employees_pi1
                        }
                    }
                }
                show = *
            }
       }'
    );
    }
);
