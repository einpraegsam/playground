<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'BBAW.Cildb',
            'Datalisting',
            [
                'Data' =>'index,show,searchcil'
            ],
            // non-cacheable actions
            [
                'Data' => 'list,show,searchcil'
            ]
        );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    datalisting {
                        iconIdentifier = cildb-plugin-datalisting
                        title = LLL:EXT:cildb/Resources/Private/Language/locallang_db.xlf:tx_cildb_datalisting.name
                        description = LLL:EXT:cildb/Resources/Private/Language/locallang_db.xlf:tx_cildb_datalisting.description
                        tt_content_defValues {
                            CType = list
                            list_type = cildb_datalisting
                        }
                    }
                }
                show = *
            }
       }'
    );
		$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
		
			$iconRegistry->registerIcon(
				'cildb-plugin-datalisting',
				\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
				['source' => 'EXT:cildb/Resources/Public/Icons/user_plugin_datalisting.svg']
			);
		
    }
);


\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
    '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/TSconfig/Page.txt">'
);
