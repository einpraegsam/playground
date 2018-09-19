<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'In2code.Person',
            'Pi1',
            [
                'Person' => 'list'
            ],
            // non-cacheable actions
            [
                'Person' => ''
            ]
        );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    pi1 {
                        icon = ' . \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('person') . 'Resources/Public/Icons/user_plugin_pi1.svg
                        title = LLL:EXT:person/Resources/Private/Language/locallang_db.xlf:tx_person_domain_model_pi1
                        description = LLL:EXT:person/Resources/Private/Language/locallang_db.xlf:tx_person_domain_model_pi1.description
                        tt_content_defValues {
                            CType = list
                            list_type = person_pi1
                        }
                    }
                }
                show = *
            }
       }'
    );
    }
);
