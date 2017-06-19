<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function ($extKey) {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Twofour.TwofourContacts',
            'Pi1',
            [
                'Contact' => 'list,detail'
            ],
            // non-cacheable actions
            [
                'Contact' => 'list'
            ]
        );

        // wizards
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
            'mod {
			wizards.newContentElement.wizardItems.plugins {
				elements {
					pi1 {
						icon = ' . \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($extKey) . 'Resources/Public/Icons/user_plugin_pi1.svg
						title = LLL:EXT:twofour_contacts/Resources/Private/Language/locallang_db.xlf:tx_twofour_contacts_domain_model_pi1
						description = LLL:EXT:twofour_contacts/Resources/Private/Language/locallang_db.xlf:tx_twofour_contacts_domain_model_pi1.description
						tt_content_defValues {
							CType = list
							list_type = twofourcontacts_pi1
						}
					}
				}
				show = *
			}
	   }'
        );
    },
    $_EXTKEY
);
